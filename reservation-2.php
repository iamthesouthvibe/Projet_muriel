<?php
require_once 'core/core.php';
include 'includes/header.php';

$roomID = $_GET['maison'];
$select = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}' ");
$maison = mysqli_fetch_assoc($select);

if (isset($_GET['maison'])) {
    $roomID = $_GET['maison'];

    ####################################################################################
    if (isset($_POST['checkin'])) {
        if (!empty($_POST['name']) && !empty($_POST['in_date']) && !empty($_POST['out_date']) && !empty($_POST['phone']) && !empty($_POST['people'])) {

            $name = $_POST['name'];
            $checkin = $_POST['in_date'];
            $checkout = $_POST['out_date'];
            $phone = $_POST['phone'];
            $people = $_POST['people'];
            $child = $_POST['children'];
            $email = $_POST['email'];
            @$address = $_POST['adress'];
            $pays = $_POST['pays'];
            $comm = $_POST['commentaire'];
            $current_date = date("Y-m-d");
            $zip = $_POST['zip'];

            if ($checkin >= $current_date) {
                if ($checkout >= $checkin) {
                    $insert = "INSERT INTO `reservations` (`name`, `checkin`, `checkout`, `phone`, `people`, `email`, `children`,`address`, `commentaire`, `zip`, `id_rooms`) VALUES ('$name', '$checkin', '$checkout', '$phone', '$people', '$email', '$child', '$address', '$comm', '$zip', '$roomID')";

                    $save = $db->query($insert);

                    if ($save) {
                        echo "Demande de Reservation ! Je reviens vers vous d'ici 3 jours";
                    }
                } else {
                    echo '<p class="text-center alert alert-danger">Date de départ non valide fournie. Veuillez éviter d\'utiliser une date passée.
                    </p>';
                }
            } else {
                echo '<p class="text-center alert alert-danger">Invalid Check-in date provided. Please avoid using a past date.</p>';
            }
        } else {
            echo '<br /> All fields are required!';
        }
    }
}
?>

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
    }

    .qhero_page_reservation_2 h1 {
        text-align: center;
        margin-bottom: 50px;
        color: #9A4747;
        font-family: ITCGaramondStd-BkNarrow;
    }

    .qhero_page_reservation_2 h1 span {
        font-family: NeueMontreal-Bold;
    }

    .qhero_page_reservation_2 .col {
        display: flex;
        gap: 120px;
    }

    .qhero_page_reservation_2 .row {
        margin-bottom: 50px;
    }

    .qhero_page_reservation_2 .row .input_row {
        display: flex;
        margin-bottom: 20px;
    }

    .qhero_page_reservation_2 .row .input_row label {
        color: #9A4747;
        font-family: ITCGaramondStd-BkNarrow;
        margin-right: 15px;
    }

    .qhero_page_reservation_2 .row .input_row input {
        border: none;
        border-bottom: solid 1px #9A4747;
        background-color: #FCF7EC;
        color: #9A4747;
    }

    .qhero_page_reservation_2 .row .input_row textarea {
        color: #9A4747;
        font-size: 18px;
        font-family: NeueMontreal-Bold;
    }

    input[type="text"i],
    input[type="date"i],
    input[type="mail"i],
    input[type="tel"i],
    input[type="number"i] {
        padding: 1px 2px;
        font-size: 18px;
        font-family: NeueMontreal-Bold;
    }

    .qhero_page_reservation_2 .col_price {
        text-align: center;
    }

    .qhero_page_reservation_2 .col_price h3 {
        color: #9A4747;
        font-family: ITCGaramondStd-BkNarrow;
        margin: 0;
    }

    .qhero_page_reservation_2 .col_price h4 {
        color: #9A4747;
        margin: 0;
        font-size: 18px;
        font-family: NeueMontreal-Bold;
    }

    .qhero_page_reservation_2 .col_price .submit {
        width: 300px;
        height: 35px;
        background: #9A4747;
        border-radius: 40px;
        border: none;
        font-size: 23px;
        color: #FCF7EC;
        text-decoration: none;
    }

    @media screen and (max-width: 450px) {

        .qhero_page_reservation_2 .col {
            display: block;
        }

        .qhero_page_reservation_2 .row .input_row {
            display: block;
        }

        .qhero_page_reservation_2 .row .input_row label {
            font-size: 25px;
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
    }
</style>

<div class="qhero_page_reservation_2">
    <h1>Votre maison : <span> <?= $maison['shortName']; ?></span></h1>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Check-in</label>
                        <input type="date" class="form-control" name="in_date" required>
                    </div>

                    <div class="input_row">
                        <label class="form-control-label">Check-out</label>
                        <input type="date" class="form-control" name="out_date" required>
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">People</label>
                        <input type="number" class="form-control" max="10" min="0" name="people" required>

                    </div>
                    <div class="input_row">
                        <label class="form-control-label">child</label>
                        <input type="number" class="form-control" max="10" min="0" name="children" required>
                    </div>
                </div>
                <div class="input_row">
                    <label for="">Commentaire</label>
                    <textarea name="commentaire" id="" cols="30" rows="5"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Nom</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="input_row">
                        <label class="form-control-label">Adresse</label>
                        <input type="text" class="form-control" name="adress" required>
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Pays</label>
                        <input type="text" class="form-control" max="5" name="pays" required>

                    </div>
                    <div class="input_row">
                        <label class="form-control-label">Code postal</label>
                        <input type="" class="form-control" name="zip" required>
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Email</label>
                        <input type="mail" class="form-control" max="5" name="email" required>

                    </div>
                    <div class="input_row">
                        <label class="form-control-label">Telephone</label>
                        <input type="tel" class="form-control" max="5" name="phone" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row finalPrice">
            <div class="col_price">
                <h3>Prix total : </h3>
                <h4>450$</h4>
            </div>
        </div>

        <div class="row">
            <div class="col_price reservationFinale">
                <input type="submit" name="checkin" value="Demande de réservation" class="submit">
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('bouton_responsive').style.display = 'none';
</script>