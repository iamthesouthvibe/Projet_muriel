<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/humanity/jquery-ui.css" type="text/css">

<?php
require_once 'core/core.php';
include 'includes/header.php';

$roomID = $_GET['maison'];

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


$flat = array_merge(...$date);
$fulldate = json_encode($flat);

$roomID = $_GET['maison'];
$select = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}' ");
$maison = $select->fetch(PDO::FETCH_ASSOC);


if (isset($_GET['maison'])) {
    $roomID = $_GET['maison'];

    ####################################################################################
    if (isset($_POST['checkin'])) {
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


            if ($checkin >= $current_date) {
                if ($checkout >= $checkin) {
                    $insert = "INSERT INTO `reservations` (`name`, `checkin`, `checkout`, `phone`, `people`, `email`, `children`,`address`, `commentaire`, `zip`, `id_rooms`) VALUES ('$name', '$checkin', '$checkout', '$phone', '$people', '$email', '$child', '$address', '$comm', '$zip', '$roomID')";

                    $save = $db->query($insert);

                    if ($save) {
                        $id = $db->lastInsertId();
                        header('Location: confirmation-reservation.php?id=' . $id);
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
        transform: translate(0px, 7px);
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

    .ui-widget-header {
        border: 1px solid #d49768;
        background: #b15e6d 50% 50% repeat-x;
        color: #ffffff;
        font-weight: bold;
    }



    .input_row small {
        opacity: 0;
    }

    .input_row.error small {
        opacity: 1;
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
    <form action="" method="POST" id="myForm" class="form-control" name="register" onsubmit="return validate();">
        <div class="row">
            <div class="col">
                <div>
                    <div class="input_row">
                        <label for=txtFromDate1><strong>Checkin :</strong></label>
                        <input type="text" name="txtFromDate1" id="txtFromDate1" class="home-input" style="width:79px;" />
                        <br>
                        <small>Error Message</small>
                    </div>

                    <div class="input_row">
                        <label for=txtFromDate2><strong>Checkout :</strong></label>
                        <input type="text" name="txtFromDate2" id="txtFromDate2" class="home-input" style="width:79px;" />
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">People</label>
                        <input type="number" class="form-control" max="10" min="0" name="people" id="people">
                        <br>
                        <small>Error Message</small>
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">child</label>
                        <input type="number" class="form-control" max="10" min="0" name="children" id="child">
                        <br>
                        <small>Error Message</small>
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
                        <input type="text" class="form-control" name="name" id="name">
                        <br>
                        <small>Error Message</small>
                    </div>

                    <div class="input_row">
                        <label class="form-control-label">Adresse</label>
                        <input type="text" class="form-control" name="adress" id="adress">
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Pays</label>
                        <input type="text" class="form-control" max="5" name="pays" id="pays">
                        <br>
                        <small>Error Message</small>
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">Code postal</label>
                        <input type="" class="form-control" name="zip" id="zip">
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Email</label>
                        <input type="mail" class="form-control" max="5" name="email" id="email">
                        <br>
                        <small>Error Message</small>
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">Telephone</label>
                        <input type="tel" class="form-control" max="5" name="phone" id="phone">
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row finalPrice">
            <div class="col_price">
                <h3>Prix par nuit</h3>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="js/reservation-2.js"></script>
<script>
    document.getElementById('bouton_responsive').style.display = 'none';

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
    });


    const form = document.getElementById("form");
    const name = document.getElementById("name");
    const adress = document.getElementById("adress");
    const date1 = document.getElementById("txtFromDate1");
    const date2 = document.getElementById('txtFromDate2');
    const people = document.getElementById('people');
    const child = document.getElementById('child');
    const pays = document.getElementById('pays');
    const zip = document.getElementById('zip');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');


    //Show input error message

    function showError(input, message) {
        const formControl = input.parentElement;
        formControl.className = "input_row error";
        const small = formControl.querySelector("small");
        small.innerText = message;
        return input;
    }

    //show success message

    function showSuccess(input) {
        const formControl = input.parentElement;
        formControl.className = "input_row success";
        return input;
    }

    function checkRequired(input) {
        if (input.value.trim() === "") {
            return showError(input, `Ce champ est obligatoire`);
        }
        return showSuccess(input);
    }

    //get field name
    function getFieldName(input) {
        return input.id.charAt(0).toUpperCase() + input.id.slice(1);
    }

    function validate() {
        let checkValue = checkRequired(name);
        let checkSub = checkRequired(adress);
        let checkDate1 = checkRequired(date1);
        let checkDate2 = checkRequired(date2);
        let checkPeople = checkRequired(people);
        let checkChild = checkRequired(child);
        let checkCountry = checkRequired(pays);
        let checkZip = checkRequired(zip);
        let checkEmail = checkRequired(email);
        let checkPhone = checkRequired(phone);

        if (checkValue.value && checkSub.value && checkDate1 && checkDate2 && checkPeople && checkChild && checkCountry && checkZip && checkEmail && checkPhone) {
            return true;
        } else {
            return false;
        }
    }
</script>