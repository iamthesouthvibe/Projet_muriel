    <?php
    require_once 'core/core.php';
    include 'fonctions/fonctionMail.php';

    define('SITE_KEY', '6LcTkzsdAAAAAFvkJyptozb6tb9kEguW_-mlB8z2');
    define('SECRET_KEY', '6LcTkzsdAAAAAH-LhZiao2CaT0KXywsY_-Q6kiwR');

    $roomID = $_GET['maison'];

    // var_dump($id);
    if ($roomID  == '') {
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
        $dates = array();
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
    /**
     * Fonction pour recuperer le captch sous forme de json
     */
    function getCaptcha($SecretKey)
    {
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }


    if (isset($_GET['maison'])) {
        $roomID = $_GET['maison'];

        ####################################################################################
        if (isset($_POST['checkin'])) {

            $Return = getCaptcha($_POST['g-recaptcha-response']);
            // var_dump($Return);
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
                        $current_date = date("Y-m-d");
                        $zip = $_POST['zip'];

                        $message = '<h1>Vous avez une demande de résérvation au nom de '  . $name  .  ' pour la maison ' . $maison['room_number']  . '</h1> <br>
                                    <h2>Date de la reservation : du ' . $checkin .  ' au ' . $checkout . '</h2> <br>
                                    <p>Email : ' . $email . ' Téléphone : ' . $phone . '</p>
                                    <p>Nombre d\'adultes : ' . $people  . ' Nombre d\'enfants : ' .  $child . '</p>
                                    <p>Adresse : ' . $address  . ' Pays : ' .  $pays . '</p>
                                    <p>Message : ' . $comm . '</p>';

                        $messageClient = '<p>Bonjour,<br><br> vous avez fait une demande de réservation pour la maison ' . $maison['room_number']  . ' du ' . $checkin . '  au ' . $checkout .
                            ' <br> Votre demande a bien été pris en compte, je reviens vers vous d\'ici 3 jours. <br><br>  Cordialement,<br><br>  Muriel Home’s</p>';


                        if ($checkin >= $current_date) {
                            if ($checkout >= $checkin) {

                                $insert = "INSERT INTO `reservations` (`name`, `checkin`, `checkout`, `phone`, `people`, `email`, `children`,`address`, `commentaire`, `zip`, `id_rooms`) VALUES ('$name', '$checkin', '$checkout', '$phone', '$people', '$email', '$child', '$address', '$comm', '$zip', '$roomID')";
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
                                echo '<p class="text-center alert alert-danger">Date de départ non valide fournie. Veuillez éviter d\'utiliser une date passée.</p>';
                            }
                        } else {
                            echo '<p class="text-center alert alert-danger">Date de départ non valide fournie. Veuillez éviter d\'utiliser une date passée.</p>';
                        }
                    }
                } else {
                    header('Location: page-404.php');
                }
            } else {
                echo 'u re a robot';
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
            margin-bottom: 50px;
            color: #9A4747;
            font-family: ITCGaramondStd-BkNarrow;
            font-style: normal;
            font-weight: normal;
        }

        .qhero_page_reservation_2 h1 span {
            font-family: neue_montrealregular;
            font-style: normal;
            font-weight: bold;
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
            width: 357px;
            float: right;
        }

        .ajustement-margin-top {
            margin-top: 40px;
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
        <h1 data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="0" data-aos-duration="2000" data-aos-once="true">Votre maison : <span> <?= $maison['shortName']; ?> , <?= $maison['lieu']; ?> </span></h1>
        <form action="" method="POST" id="myForm" class="form-control" name="register" onsubmit="return validate();">
            <div class="row" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="500" data-aos-duration="2000" data-aos-once="true">
                <div class="col">
                    <div>
                        <div class="input_row">
                            <label for=txtFromDate1>Arrivée</label><br>
                            <input type="text" name="txtFromDate1" id="txtFromDate1" class="home-input" />
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
                    </div>
                </div>
            </div>
            <div class="ajustement-margin-top">
                <div class="row finalPrice prix-nuit-div" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="1000" data-aos-duration="2000" data-aos-once="true">
                    <div class="col_price">
                        <h3>À partir de</h3>
                        <h4><?= $maison['price']; ?>€/nuit</h4>
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
    <script src="js/reservation-2.js"></script>
    <script src="js/datepicker-fr.js"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LcTkzsdAAAAAFvkJyptozb6tb9kEguW_-mlB8z2', {
                action: 'submit'
            }).then(function(token) {
                // console.log(token);
                document.getElementById('g-recaptcha-response').value = token;
            });
        });

        $(function() {

            var unavailableDates = <?php echo $fulldate ?>;
            console.log(unavailableDates);

            function unavailable(date) {
                ymd = ("0" + date.getDate()).slice(-2) + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();

                if ($.inArray(ymd, unavailableDates) < 0) {

                    return [true, "enabled", "Available"];

                } else {
                    return [false, "red", "Booked Out"];
                }
            }

            $('#txtFromDate1').datepicker({
                beforeShowDay: unavailable,
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText) {
                    $("#txtFromDate1").val(dateText);
                }
            });

            $('#txtFromDate2').datepicker({
                beforeShowDay: unavailable,
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText) {
                    $("#txtFromDate2").val(dateText);
                }
            });
            $.datepicker.setDefaults($.datepicker.regional["fr"]);
        });
    </script>