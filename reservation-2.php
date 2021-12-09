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
                if (!empty($_POST['name']) && !empty($_POST['txtFromDate1']) && !empty($_POST['txtFromDate2']) && !empty($_POST['phone']) && !empty($_POST['people'])) {
                    $name = $_POST['name'];
                    $checkin = $_POST['txtFromDate1'];
                    $checkout = $_POST['txtFromDate2'];
                    $phone = $_POST['phone'];
                    $people = $_POST['people'];
                    $child = $_POST['children'];
                    $email = $_POST['email'];
                    @$address = $_POST['adress'];
                    $pays = $_POST['pays'];
                    $comm = $_POST['commentaire'];
                    $current_date = date('d-m-Y');
                    $zip = $_POST['zip'];
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
                                <p>Email : ' . $email . '<br> Téléphone : ' . $phone . '</p>
                                <p>Nombre d\'adultes : ' . $people . '<br> Nombre d\'enfants : ' . $child . '</p>
                                <p>Adresse : ' . $address . ' Pays : ' . $pays . '</p>
                                <p>Message : ' . $comm . '</p>';

                    // $messageClient = '<p><strong>Madame, Monsieur,</strong><br><br> Nous vous accusons réception de la demande de réservation que vous avez effectuée pour la maison <strong>' . $maison['room_number'] . '</strong> au nom de <strong>' . $name . '</strong>. Nous avons pris bonne note que votre arrivée serai prévue pour le <strong>' . $new_checkin . '</strong> et le départ prévue pour le <strong>' . $new_checkout . '</strong>. Il s\'agit d\'un séjour pour <strong>' . $nbrPersonnes . '</strong> personnes.<br><br>Je reviens vers vous d\'ici 3 jours afin de procéder à la confirmation de votre réservation.
                    //     <br><br>  Cordialement,<br><br>  Muriel Home’s</p>';

                    $messageClient = '<p><strong>Madame, Monsieur,</strong><br><br> 
                Je vous remercie pour votre demande d\'information concernant la villa <strong>"' . $maisom['room_number'] . '"</strong> pour la période du <strong>' . $new_checkin . '</strong>  au <strong>' . $new_checkout . '</strong>  pour <strong>' . $nbrPersonnes . '</strong> personnes. <br><br>
                Je reviens vers vous au plus vite afin de vous confirmer les tarifs et disponibilités</p>.
                <br><br>
                Bien à vous,
                <br><br>
                Muriel';

                    if (strtotime($new_checkin) >= ($current_date)) {
                        if (strtotime($new_checkout) >= strtotime($new_checkin)) {
                            $datecheck = DateTime::createFromFormat('d-m-Y', $new_checkin);
                            $dateFormat = $datecheck->format('Y-m-d');

                            $datecheckout = DateTime::createFromFormat('d-m-Y', $new_checkout);
                            $dateFormat2 = $datecheckout->format('Y-m-d');

                            $insert = "INSERT INTO `reservations` (`name`, `checkin`, `checkout`, `phone`, `people`, `email`, `children`,`address`, `commentaire`, `zip`, `pays` ,`price`, `id_rooms`) VALUES ('$name', '$dateFormat', '$dateFormat2', '$phone', '$people', '$email', '$child', '$address', '$comm', '$zip', '$pays' ,'$price', '$roomID')";
                            $save = $db->query($insert);

                            if ($save) {
                                // ini_set("error_reporting", E_ALL);
                                // ini_set("display_errors", "1");
                                $id = $db->lastInsertId();
                                // sendMail($message);
                                // sendMail2($messageClient, $email);
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

<style>
    .header_right button {
        display: none;
    }

    .qhero_page_reservation_2 {
        position: absolute;
        left: 50%;
        -ms-transform: translateX(-50%);
        -webkit-transform: translate(-50%, 0%);
        transform: translate(-50%, 0%);
        display: block;
        margin-top: 10vh;
        max-width: 1100px;

    }

    .qhero_page_reservation_2 h1 {
        text-align: center;
        margin-bottom: 15px;
        color: #9A4747;
        font-family: ITCGaramondStd-BkNarrow;
        font-style: normal;
        font-weight: normal;
        margin-top: 10px;
    }

    .qhero_page_reservation_2 h1 span {
        font-family: neue_montrealregular;
        font-style: normal;
        font-weight: bold;
        line-height: 0;
    }

    .qhero_page_reservation_2 h2 {
        font-family: neue_montrealbold;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        color: #9A4747;
        text-align: center;
        margin-bottom: 50px;
    }

    .qhero_page_reservation_2 .col {
        display: flex;
        gap: 120px;
    }

    .qhero_page_reservation_2 .row {
        /* margin-bottom: 50px; */
    }

    .qhero_page_reservation_2 .row .input_row {
        display: block;
        margin-bottom: 20px;
    }

    .qhero_page_reservation_2 .row .input_row label {
        color: #9A4747;
        font-family: ITCGaramondStd-BkNarrow;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        margin-right: 15px;
        transform: translate(0px, 7px);
        min-width: 400px;
    }

    .qhero_page_reservation_2 .row .input_row input {
        border: none;
        border-bottom: solid 1px #9A4747;
        background-color: #EDE4D4;
        color: #9A4747;
        min-width: 280px;

    }

    .qhero_page_reservation_2 .row .input_row textarea {
        color: #9A4747;
        font-size: 24px;
        font-family: neue_montrealbold;
        font-style: normal;
        font-weight: normal;
        height: 130px;
        width: 290px;

        border: none;
        background: #FCF7EC;

    }

    input[type="text"i],
    input[type="date"i],
    input[type="mail"i],
    input[type="tel"i],
    input[type="number"i] {
        padding: 1px 2px;
        font-size: 24px;
        font-family: neue_montrealbold;
        font-style: normal;
        font-weight: normal;
    }

    .qhero_page_reservation_2 .col_price {
        text-align: center;
    }

    .qhero_page_reservation_2 .col_price h3 {
        color: #9A4747;
        font-family: ITCGaramondStd-BkNarrow;
        font-style: normal;
        font-weight: normal;
        margin: 0;
    }

    .qhero_page_reservation_2 .col_price h4 {
        color: #9A4747;
        margin: 0;
        font-size: 24px;
        font-family: neue_montrealbold;
        font-style: normal;
        font-weight: normal;
    }

    .qhero_page_reservation_2 .col_price .submit {
        width: 357px;
        height: 41px;
        background: #9A4747;
        border-radius: 40px;
        border: none;
        font-size: 25px;
        color: #FCF7EC;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .qhero_page_reservation_2 .col_price .submit:hover {
        border: solid 1px #9a4747;
        background: #FCF7EC;
        color: #9A4747;
    }

    .ui-widget-header {
        /* Ca c'est la parti au dessus avec les deux fleches */
        border: 1px solid #d49768;
        background: #9a4747 50% 50% repeat-x;
        color: #FCF7EC;
        font-weight: normal;
    }



    .input_row small {
        opacity: 0;
    }

    .input_row.error small {
        opacity: 1;
    }

    .prix-nuit-div {
        width: 100px;
        float: left;
    }

    .boutton-reservation-finale {
        width: 415px;
        float: right;
    }

    .ajustement-margin-top {
        margin-top: 20px;
    }

    .enabled {
        /* Ca c'est le contour de chaque case jour */
        background: none;
    }

    .ui-state-default,
    .ui-widget-content .ui-state-default,
    .ui-widget-header .ui-state-default,
    .ui-button,
    html .ui-button.ui-state-disabled:hover,
    html .ui-button.ui-state-disabled:active {
        /* Ca c'est le fond de chaque case jour */
        /* background: red; */



    }

    /* ça ce sont les cadres autour des nombres dans le calendrier* et la couleur de la font du nombre séléctionné */
    .ui-state-highlight,
    .ui-widget-content .ui-state-highlight,
    .ui-widget-header .ui-state-highlight {
        border: 2px solid #d97373;
        background: none;
        color: #9A4747;
    }

    /* ça c'est la couleur de fond du jour d'aujourd'hui*/
    .ui-state-highlight,
    .ui-widget-content .ui-state-highlight,
    .ui-widget-header .ui-state-highlight {
        /*background: #959595;*/
        background: red;
    }

    /* permet de changer la couleur de la font des nombres du calendrier (sauf celui du jour meme ainsi que le fond et le bord */
    .ui-state-default,
    .ui-widget-content .ui-state-default,
    .ui-widget-header .ui-state-default,
    .ui-button,
    html,
    html .ui-button.ui-state-disabled:active {
        border: none;
        background: #ede4d4;
        font-weight: normal;
        color: #9a4747;
        border-radius: 3px;
        padding-right: 10px;
    }


    .ui-button.ui-state-disabled:hover {
        background: red;
    }

    .ui-widget-content {
        color: #9a4747;
    }

    .ui-widget-header {
        border: none;
    }

    .ui-widget-content {
        background: #ede4d4;
    }

    .ui-widget.ui-widget-content {
        border: 2px solid #cdc3b7;
    }

    .ui-datepicker {
        padding: 0;
    }

    .ui-corner-all,
    .ui-corner-top,
    .ui-corner-right,
    .ui-corner-tr {
        border-top-right-radius: 1px;
    }

    .ui-corner-all,
    .ui-corner-top,
    .ui-corner-left,
    .ui-corner-tl {
        border-top-left-radius: 1px;
    }

    .ui-corner-all,
    .ui-corner-bottom,
    .ui-corner-right,
    .ui-corner-br {
        border-bottom-right-radius: 1px;
    }

    .ui-corner-all,
    .ui-corner-bottom,
    .ui-corner-left,
    .ui-corner-bl {
        border-bottom-left-radius: 1px;
    }

    /*  hover background */
    .enabled:hover .ui-state-default {
        background: #e2d8c7;
        transition-duration: 500ms;
    }

    .ui-state-hover,
    .ui-widget-content .ui-state-hover,
    .ui-widget-header .ui-state-hover,
    .ui-button:hover {
        border: none;
        background: #f5f0e5;
        transition-duration: 500ms;

    }

    /* .ui-state-focus  .ui-widget-content  {
        background : red;
    }*/


    /* .ui-widget-header .ui-icon {
    background-image: url(assets/png/noun_Next_2810810.png); 
}*/

    input:focus,
    select:focus,
    textarea:focus,
    button:focus {
        outline: none;
    }

    .qhero_page_reservation_2 .col_price .submit {
        width: 415px;
    }

    @media screen and (max-width: 450px) {

        .qhero_page_reservation_2 {
            max-width: 90vw;
        }

        .qhero_page_reservation_2 .col {
            display: block;
        }

        .qhero_page_reservation_2 .row .input_row {
            display: block;
        }

        .qhero_page_reservation_2 .row .input_row label {
            font-size: 25px;
            min-width: 0px
        }

        .qhero_page_reservation_2 .row {
            margin-bottom: 0px;
        }

        .finalPrice {
            margin-top: 70px;
        }

        .reservationFinale {
            margin-top: 70px;
            margin-bottom: 100px;
        }

        .qhero_page_reservation_2 h1 {
            font-size: 35px;
        }


        .qhero_page_reservation_2 .col_price h3 {
            font-size: 35px;
        }

        .qhero_page_reservation_2 .col_price h4 {
            font-size: 22px;
        }

        .qhero_page_reservation_2 .row .input_row input {
            width: 90vw;
            min-width: 0px;
        }

        .qhero_page_reservation_2 .row .input_row textarea {
            width: 89vw;
            border: none;
            background: #FCF7EC;
        }

        .qhero_page_reservation_2 .col_price .submit {
            transform: translate(-8px, 0px);
            width: 355px;
            height: 39px;
            font-size: 22px;
        }

        .prix-nuit-div {
            width: auto;
            float: none;
        }

        .boutton-reservation-finale {
            width: auto;
            float: none;
        }

    }
</style>

<div class="qhero_page_reservation_2">
    <h1 data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="0" data-aos-duration="2000" data-aos-once="true">Votre maison : <span> <?php echo $maison['shortName']; ?> , <?php echo $maison['lieu']; ?> </span></h1>
    <?php if ($roomID == '23') {  ?>
        <h2 data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="100" data-aos-duration="2000" data-aos-once="true">Location à partir de 7 jours</h2>
    <?php } elseif ($roomID == '26') { ?>
        <h2 data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="100" data-aos-duration="2000" data-aos-once="true">Uniquement à la semaine toute l'année</h2>
    <?php } else { ?>
        <h2 data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="100" data-aos-duration="2000" data-aos-once="true">Location uniquement à la semaine pour la période de juillet et août</h2>
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
                        <label class="form-control-label">Enfants</label><br>
                        <input type="number" class="form-control" max="10" min="0" name="children" id="child">
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
                <div class="input_row">
                    <label for="">Commentaire</label><br>
                    <textarea name="commentaire" id="" cols="30" rows="5"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="2000" data-aos-once="true">
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Nom</label><br>
                        <input type="text" class="form-control" name="name" id="name">
                        <br>
                        <small>Error Message</small>
                    </div>

                    <div class="input_row">
                        <label class="form-control-label">Adresse</label><br>
                        <input type="text" class="form-control" name="adress" id="adress">
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Pays</label><br>
                        <input type="text" class="form-control" max="5" name="pays" id="pays">
                        <br>
                        <small>Error Message</small>
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">Code postal</label><br>
                        <input type="text" class="form-control" name="zip" id="zip">
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Email</label><br>
                        <input type="mail" class="form-control" max="5" name="email" id="email">
                        <br>
                        <small>Error Message</small>
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">Téléphone</label><br>
                        <input type="tel" class="form-control" max="5" name="phone" id="phone">
                        <br>
                        <small>Error Message</small>
                    </div>
                    <input type="hidden" name="price" id='price_input'>
                </div>
            </div>
        </div>
        <div class="ajustement-margin-top">
            <div class="row finalPrice prix-nuit-div" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="2000" data-aos-once="true">
                <div class="col_price">
                    <h3>À partir de</h3>
                    <h4></h4>
                </div>
            </div>
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
    $(function() {

        var unavailableDates = <?php echo $fulldate; ?>;

        var room = <?php echo $roomID; ?>;

        // Check les disponibilités 
        function unavailable(date) {
            ymd = ("0" + date.getDate()).slice(-2) + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();

            if ($.inArray(ymd, unavailableDates) < 0) {

                return [true, "enabled", "Available"];

            } else {
                return [false, "red", "Booked Out"];
            }
        }

        // Inititalisation datepicker pour checkin
        $('#txtFromDate1').datepicker({
            beforeShowDay: unavailable,
            dateFormat: 'dd-mm-yy',
            minDate: 0,
            onSelect: function(dateText) {
                $("#txtFromDate1").val(dateText);

                // Check si c'est l'id de la maison correspond à 25 (Jolie maison de ville)
                if (room.toString() == 25) {
                    returnPriceMaisonVille();
                }
                // Check si c'est l'id de la maison correspond à 24 (Chalet Bord de Mer)
                else if (room.toString() == 24) {
                    returnPriceChaletMer();
                }
                // Check si c'est l'id de la maison correspond à 26 (Chalet montagne)
                else if (room.toString() == 26) {
                    returnPriceChaletMontagne();
                }
                // Check si c'est l'id de la maison correspond à 23 (Villa grand large)
                else if (room.toString() == 23) {
                    returnPriceGrandLarge();
                }

            }
        });

        // Inititalisation datepicker pour checkout
        $('#txtFromDate2').datepicker({
            beforeShowDay: unavailable,
            dateFormat: 'dd-mm-yy',
            minDate: 0,
            onSelect: function(dateText) {
                $("#txtFromDate2").val(dateText);

                // Check si c'est l'id de la maison correspond à 25 (Jolie maison de ville)
                if (room.toString() == 25) {
                    returnPriceMaisonVille();
                }
                // Check si c'est l'id de la maison correspond à 24 (Chalet Bord de Mer)
                else if (room.toString() == 24) {
                    returnPriceChaletMer();
                }
                // Check si c'est l'id de la maison correspond à 26 (Chalet montagne)
                else if (room.toString() == 26) {
                    returnPriceChaletMontagne();
                }
                // Check si c'est l'id de la maison correspond à 23 (Villa grand large)
                else if (room.toString() == 23) {
                    returnPriceGrandLarge();
                }
            }
        });
        $.datepicker.setDefaults($.datepicker.regional["fr"]);


    });

    /** 
     * @from= date debut de periode
     * @to = date debut de periode
     * @price = prix en fonction de la periode
     */
    function dateCheck(from2, to2, price) {

        var fDate, lDate, cDate;

        fDate = jQuery.datepicker.formatDate('dd-mm-yy', from2); // MM/DD/yy firstdate
        cDate = jQuery.datepicker.parseDate('dd-mm-yy', $('#txtFromDate1').val()); // date from form
        lDate = jQuery.datepicker.formatDate('dd-mm-yy', to2); // MM/DD/yy

        var dateFrom = fDate.split("-");
        var dateTo = lDate.split("-");

        var from = new Date(dateFrom[2], parseInt(dateFrom[1]) - 1, dateFrom[0]); // -1 because months are from 0 to 11
        var to = new Date(dateTo[2], parseInt(dateTo[1]) - 1, dateTo[0]);

        /* Calcul le nombre de jour entre la date d'arrivée et le départ */
        var d1 = $('#txtFromDate1').datepicker('getDate');
        var d2 = $('#txtFromDate2').datepicker('getDate');

        var oneDay = 24 * 60 * 60 * 1000;
        var diff = 0;
        if (d1.getTime() < d2.getTime()) {

            diff = Math.round(Math.abs((d2.getTime() - d1.getTime()) / (oneDay)));

        } else {
            $('.col_price h4').html('Date non valide');
            return false;

        }
        //

        /** Renvoie le prix en fonction du nombre de jour et de la periodec*/
        if ((cDate <= to && cDate >= from)) {

            // Rempli la valeur de l'input price
            $('input[name="price"]').attr('value', price * diff);

            //Affiche le prix dans un élément du dom
            $('.col_price h4').html((diff * price) + '€');

        } else {
            return false
        }
        //
    }
    //

    function returnPriceMaisonVille() {

        // 2022
        dateCheck(new Date('12-08-21'), new Date('01-02-22'), '210');
        dateCheck(new Date('01-03-22'), new Date('02-03-22'), '180'); // MM/DD/yy
        dateCheck(new Date('02-04-22'), new Date('03-06-22'), '210');
        dateCheck(new Date('03-07-22'), new Date('04-07-22'), '180');
        dateCheck(new Date('04-08-22'), new Date('05-08-22'), '210');
        dateCheck(new Date('05-09-22'), new Date('05-24-22'), '180');
        dateCheck(new Date('05-25-22'), new Date('05-29-22'), '210');
        dateCheck(new Date('05-30-22'), new Date('06-30-22'), '180');
        dateCheck(new Date('07-01-22'), new Date('11-13-22'), '210');
        dateCheck(new Date('11-14-22'), new Date('12-15-22'), '180');
        dateCheck(new Date('12-16-22'), new Date('01-02-23'), '210');

        // 2023
        dateCheck(new Date('01-03-23'), new Date('02-03-23'), '180'); // MM/DD/yy
        dateCheck(new Date('02-04-23'), new Date('03-06-23'), '210');
        dateCheck(new Date('03-07-23'), new Date('04-07-23'), '180');
        dateCheck(new Date('04-08-23'), new Date('05-08-23'), '210');
        dateCheck(new Date('05-09-23'), new Date('05-24-23'), '180');
        dateCheck(new Date('05-25-23'), new Date('05-29-23'), '210');
        dateCheck(new Date('05-30-23'), new Date('06-30-23'), '180');
        dateCheck(new Date('07-01-23'), new Date('11-13-23'), '210');
        dateCheck(new Date('11-14-23'), new Date('12-15-23'), '180');
        dateCheck(new Date('12-16-23'), new Date('01-02-24'), '210');
    }

    function returnPriceChaletMer() {

        // 2022
        dateCheck(new Date('12-08-21'), new Date('01-02-22'), '230');
        dateCheck(new Date('01-03-22'), new Date('02-03-22'), '210'); // MM/DD/yy
        dateCheck(new Date('02-04-22'), new Date('03-06-22'), '230');
        dateCheck(new Date('03-07-22'), new Date('04-07-22'), '210');
        dateCheck(new Date('04-08-22'), new Date('05-08-22'), '230');
        dateCheck(new Date('05-09-22'), new Date('05-24-22'), '210');
        dateCheck(new Date('05-25-22'), new Date('05-29-22'), '230');
        dateCheck(new Date('05-30-22'), new Date('06-30-22'), '210');
        dateCheck(new Date('07-01-22'), new Date('11-13-22'), '230');
        dateCheck(new Date('11-14-22'), new Date('12-15-22'), '210');
        dateCheck(new Date('12-16-22'), new Date('01-02-23'), '230');

        // 2023
        dateCheck(new Date('01-03-23'), new Date('02-03-23'), '210'); // MM/DD/yy
        dateCheck(new Date('02-04-23'), new Date('03-06-23'), '230');
        dateCheck(new Date('03-07-23'), new Date('04-07-23'), '210');
        dateCheck(new Date('04-08-23'), new Date('05-08-23'), '230');
        dateCheck(new Date('05-09-23'), new Date('05-24-23'), '210');
        dateCheck(new Date('05-25-23'), new Date('05-29-23'), '230');
        dateCheck(new Date('05-30-23'), new Date('06-30-23'), '210');
        dateCheck(new Date('07-01-23'), new Date('11-13-23'), '230');
        dateCheck(new Date('11-14-23'), new Date('12-15-23'), '210');
        dateCheck(new Date('12-16-23'), new Date('01-02-24'), '230');
    }

    function returnPriceChaletMontagne() {

        // 2022
        dateCheck(new Date('12-08-21'), new Date('01-02-22'), '420');
        dateCheck(new Date('01-03-22'), new Date('02-03-22'), '357'); // MM/DD/yy
        dateCheck(new Date('02-04-22'), new Date('03-06-22'), '420');
        dateCheck(new Date('03-07-22'), new Date('04-07-22'), '357');
        dateCheck(new Date('04-08-22'), new Date('05-08-22'), '420');
        dateCheck(new Date('05-09-22'), new Date('12-16-22'), '357');
        dateCheck(new Date('12-17-22'), new Date('01-02-23'), '420');

        // 2023
        dateCheck(new Date('01-03-23'), new Date('02-03-23'), '357'); // MM/DD/yy
        dateCheck(new Date('02-04-23'), new Date('03-06-23'), '420');
        dateCheck(new Date('03-07-23'), new Date('04-07-23'), '357');
        dateCheck(new Date('04-08-23'), new Date('05-08-23'), '420');
        dateCheck(new Date('05-09-23'), new Date('12-16-23'), '357');
        dateCheck(new Date('12-17-23'), new Date('01-02-24'), '420');

    }

    function returnPriceGrandLarge() {

        // 2022
        dateCheck(new Date('12-17-21'), new Date('01-02-22'), '740');
        dateCheck(new Date('01-02-22'), new Date('05-07-22'), '640'); // MM/DD/yy
        dateCheck(new Date('05-08-22'), new Date('05-21-22'), '530');
        dateCheck(new Date('05-22-22'), new Date('06-04-22'), '640');
        dateCheck(new Date('06-05-22'), new Date('07-02-22'), '530');
        dateCheck(new Date('07-03-22'), new Date('09-03-22'), '640');
        dateCheck(new Date('09-04-22'), new Date('10-21-22'), '530');
        dateCheck(new Date('10-22-22'), new Date('11-12-22'), '640');
        dateCheck(new Date('11-13-22'), new Date('12-16-22'), '530');
        dateCheck(new Date('12-17-22'), new Date('01-01-23'), '740');

        // 2023
        dateCheck(new Date('01-02-23'), new Date('05-07-23'), '640'); // MM/DD/yy
        dateCheck(new Date('05-08-23'), new Date('05-21-23'), '530');
        dateCheck(new Date('05-22-23'), new Date('06-04-23'), '640');
        dateCheck(new Date('06-05-23'), new Date('07-02-23'), '530');
        dateCheck(new Date('07-03-23'), new Date('09-03-23'), '640');
        dateCheck(new Date('09-04-23'), new Date('10-21-23'), '530');
        dateCheck(new Date('10-22-23'), new Date('11-12-23'), '640');
        dateCheck(new Date('11-13-23'), new Date('12-16-23'), '530');
        dateCheck(new Date('12-17-23'), new Date('01-01-24'), '740');
    }
</script>
<?php include "includes/cursor.php"; ?>