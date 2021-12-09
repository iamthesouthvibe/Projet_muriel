<?php
require_once 'vendor/autoload.php';
require_once 'core/core.php';
include 'fonctions/fonctionMail.php';

define('SITE_KEY', '6LewOlodAAAAAC2IoZg-Ye76rGW_Pgrh8weg7tm-');
define('SECRET_KEY', '6LewOlodAAAAAII2nhQu25dNzXhFz0_-XhO5G9nD');

$roomID = $_GET['maison'];

// var_dump($id);
if ($roomID == '') {
    header('Location: page-404.php');
}

$sql = ("SELECT * FROM calendar WHERE id_rooms = '{$roomID}'");

foreach ($db->query($sql) as $row) {
    $check = $row['checkin'];
    $checkout = $row['checkout'];

    $date[] = displayDates($check, $checkout);
}

function displayDates($date1, $date2, $format = 'd-m-Y')
{
    $dates = [];
    $current = strtotime($date1);
    $date2 = strtotime($date2);
    $stepVal = '+1 day';
    while ($current <= $date2) {
        $dates[] = date($format, $current);
        $current = strtotime($stepVal, $current);
    }

    return $dates;
}

if (isset($date)) {
    $flat = array_merge(...$date);
    $fulldate = json_encode($flat);
}

$roomID = $_GET['maison'];
$select = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}' ");
$maison = $select->fetch(PDO::FETCH_ASSOC);

if ($roomID !== $maison['id']) {
    header('Location: page-404.php');
}


//:TODO : Mettre cette fonction dans une fichier php à part
/*
* Fonction pour recuperer le captch sous forme de json
*/
function getCaptcha($SecretKey)
{
    $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response={$SecretKey}");
    $Return = json_decode($Response);
    return $Return;
}
//

if (isset($_GET['maison'])) {
    $roomID = $_GET['maison'];

    if (isset($_POST['checkin'])) {
        $Return = getCaptcha($_POST['g-recaptcha-response']);

        if ($Return->success == true && $Return->score > 0.5) {
            if (isset($_POST['url']) && $_POST['url'] == '') {
                if (!empty($_POST['name']) && !empty($_POST['txtFromDate1']) && !empty($_POST['txtFromDate2']) && !empty($_POST['people'])) {
                    $name = $_POST['name'];
                    $checkin = $_POST['txtFromDate1'];
                    $checkout = $_POST['txtFromDate2'];
                    $people = $_POST['people'];
                    $email = $_POST['email'];
                    $comm = $_POST['commentaire'];
                    $current_date = date('d-m-Y');
                    $price = $_POST['price'];
                    $nbrPersonnes = intval($child) + intval($people);

                    // Creating timestamp from given date
                    $timestamp = strtotime($checkin);
                    // Creating new date format from that timestamp
                    $new_checkin = date('d-m-Y', $timestamp);

                    // Creating timestamp from given date
                    $timestamp2 = strtotime($checkout);
                    // Creating new date format from that timestamp
                    $new_checkout = date('d-m-Y', $timestamp2);

                    $message = '<h1>Vous avez une demande de réservation au nom de ' . $name . ' pour la maison ' . $maison['room_number'] . '</h1> <br>
                                <h2>Date de la reservation : du ' . $new_checkin . ' au ' . $new_checkout . '</h2> <br>
                                <p>Email : ' . $email . '</p>
                                <p>Nombre d\'adultes : ' . $people . '</p>
                                <p>Message : ' . $comm . '</p>';

                    $messageClient = '<p><strong>Madame, Monsieur,</strong><br><br> 
                                        Je vous remercie pour votre demande d\'information concernant la villa <strong> ' . $maison['room_number'] . '</strong> pour la période du <strong>' . $new_checkin . '</strong>  au <strong>' . $new_checkout . '</strong>  pour <strong>' . $nbrPersonnes . '</strong> personnes. <br><br>
                                        Je reviens vers vous au plus vite afin de vous confirmer les tarifs et disponibilités.
                                        <br><br>
                                        Bien à vous,
                                        <br><br>
                                        Muriel</p>';

                    if (strtotime($new_checkin) >= ($current_date)) {
                        if (strtotime($new_checkout) >= strtotime($new_checkin)) {
                            $datecheck = DateTime::createFromFormat('d-m-Y', $new_checkin);
                            $dateFormat = $datecheck->format('Y-m-d');

                            $datecheckout = DateTime::createFromFormat('d-m-Y', $new_checkout);
                            $dateFormat2 = $datecheckout->format('Y-m-d');

                            $insert = "INSERT INTO `reservations` (`name`, `checkin`, `checkout`,  `people`, `email`, `commentaire`, `price`, `id_rooms`) VALUES ('$name', '$dateFormat', '$dateFormat2', '$people', '$email', '$comm', '$price', '$roomID')";
                            $save = $db->query($insert);

                            if ($save) {
                                ini_set("error_reporting", E_ALL);
                                ini_set("display_errors", "1");
                                $id = $db->lastInsertId();
                                sendMail($message);
                                sendMail2($messageClient, $email);
                                header('Location: confirmation-reservation.php?id=' . $id);
                            } else {
                                echo 'erreur';
                            }
                        } else {
                            echo '<p class="text-center alert alert-danger">Date de retour non valide fournie. Veuillez éviter d\'utiliser une date passée.</p>';
                        }
                    } else {
                        echo '<p class="text-center alert alert-danger">Date de départ non valide fournie. Veuillez éviter d\'utiliser une date passée.</p>';
                    }
                }
            } else {
                header('Location: page-404.php');
            }
        }
    }
}

include 'includes/header.php';
?>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/humanity/jquery-ui.css" type="text/css">
<link rel="stylesheet" href="style/reservation-2.css">

<div class="qhero_page_reservation_2">
    <h1 data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="0" data-aos-duration="2000" data-aos-once="true">Votre maison : <span> <?php echo $maison['shortName']; ?> , <?php echo $maison['lieu']; ?> </span></h1>
    <?php if ($roomID == '23') {  ?>
        <h2 data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="100" data-aos-duration="2000" data-aos-once="true">Location à partir de 7 jours</h2>
    <?php } elseif ($roomID == '26') { ?>
        <h2 data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="100" data-aos-duration="2000" data-aos-once="true">Uniquement à la semaine toute l'année</h2>
    <?php } else { ?>
        <h2 data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="100" data-aos-duration="2000" data-aos-once="true">Location uniquement à la semaine pour la période de juillet et août, sinon 2 nuits minimum</h2>
    <?php } ?>
    <form action="" method="POST" id="myForm" class="form-control" name="register" onsubmit="return validate();" autocomplete="off">
        <div class="row" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="2000" data-aos-once="true">
            <div class="col">
                <div>
                    <div class="input_row">
                        <label for=txtFromDate1>Arrivée</label><br>
                        <input type="text" name="txtFromDate1" id="txtFromDate1" class="home-input txtFromDate1" />
                        <br>
                        <small>Error Message</small>
                    </div>

                    <p style="display:none;"><input type="text" name="url" /></p>

                    <div class="input_row">
                        <label for=txtFromDate2>Départ</label><br>
                        <input type="text" name="txtFromDate2" id="txtFromDate2" class="home-input" />
                        <br>
                        <small>Error Message</small>
                    </div>

                    <div class="row finalPrice prix-nuit-div" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="2000" data-aos-once="true">
                        <div class="col_price">
                            <?php if ($roomID == '23') :  ?>
                                <h3>À partir de</h3>
                            <?php else : ?>
                                <h3>Prix total</h3>
                            <?php endif; ?>
                            <h4></h4>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Adultes</label><br>
                        <input type="number" class="form-control" max="10" min="0" name="people" id="people">
                        <br>
                        <div></div>
                        <small>Error Message</small>
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">Nom</label><br>
                        <input type="text" class="form-control" name="name" id="name">
                        <br>
                        <small>Error Message</small>
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">Email</label><br>
                        <input type="mail" class="form-control" max="5" name="email" id="email">
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label for="">Commentaire</label><br>
                        <textarea name="commentaire" id="" cols="30" rows="5"></textarea>
                    </div>
                    <input type="hidden" name="price" id='price_input'>
                </div>
            </div>
        </div>
        <div class="ajustement-margin-top">

            <div><input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response"></div>

            <div class="row boutton-reservation-finale" - data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="1500" data-aos-duration="2000" data-aos-once="true">
                <div class="col_price reservationFinale">
                    <input type="submit" name="checkin" value="Demande de renseignements →" class="submit">
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LewOlodAAAAAC2IoZg-Ye76rGW_Pgrh8weg7tm-"></script>
<script src="js/reservation-2.js"></script>
<script src="js/datepicker-fr.js"></script>
<script>
    var unavailableDates = <?php echo $fulldate; ?>;

    var room = <?php echo $roomID; ?>;
</script>
<script src="js/calendrierDate.js"></script>
<?php include "includes/cursor.php"; ?>