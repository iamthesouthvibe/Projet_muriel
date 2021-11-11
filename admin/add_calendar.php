<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
//LOGGED IN CHECK
if (!is_logged_in()) {
    login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';

$idRoom = $_GET['maison'];
$sql = ("SELECT * FROM calendar WHERE id_rooms = $idRoom");

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


$sql = "SELECT * FROM rooms WHERE id = $idRoom";
$result = $db->query($sql);


// Get les data
@$name = $_POST['name'];
@$rooms =  (int)$_POST['maison'];
@$phone = $_POST['phone'];
@$email = $_POST['mail'];
@$checkin = $_POST['txtFromDate1'];
@$checkout = $_POST['txtFromDate2'];


// On envoie les données
if (isset($_POST['add'])) {
    if (!empty($name) && !empty($rooms) && !empty($phone) && !empty($email) && !empty($checkin) && !empty($checkout)) {
        $sql2 = "INSERT INTO calendar (`libelle`,`email`, `phone`, `checkin`, `checkout`, `id_rooms`)
                    VALUES ('$name','$email','$phone','$checkin','$checkout', '$rooms')";

        $insert = $db->prepare($sql2);
        $insert->execute();

        if ($insert) {
            header("Location: calendar.php");
        } else {
            echo 'error';
        }
    }
}

?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/humanity/jquery-ui.css" type="text/css">
<style>
    .ui-widget-header {
        border: 1px solid #d49768;
        background: #b15e6d 50% 50% repeat-x;
        color: #ffffff;
        font-weight: normal;
    }

    .admin_page-addcalendar {
        margin-top: 40px;
    }

    .admin_page-addcalendar input {
        background-color: #FCF7EC;
        border: none;
        border-bottom: solid 1px;
    }

    .admin_page-addcalendar label {
        font-family: ITCGaramondStd-BkNarrow;
        color: #9a4747;
        font-size: 22px;
    }

    .admin_page-addcalendar-row {
        margin-bottom: 50px;
        display: flex;
        gap: 120px;
    }

    .admin_page-addcalendar .button-ajout {
        position: relative;
        height: 30px;
        width: 154px;
        border: none !important;
        border-radius: 40px;
        background-color: #9A4747 !important;
        color: #FCF7EC;
        font-size: 17px;
    }

    .admin_page-addcalendar-block {
        display: flex;
        flex-direction: column;
    }
</style>
<div class="admin_page">
    <div class="header_admin">
        <h1>Ajouter une réservation au calendrier</h1>
        <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
    </div>

    <form action="" method="post" class="admin_page-addcalendar">
        <div class="admin_page-addcalendar-row">
            <div class="admin_page-addcalendar-block">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="admin_page-addcalendar-block">
                <label for="maison">Maison :</label>
                <select name="maison" id="">
                    <?php while ($maison_name = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                        <option value="<?php echo $maison_name['id'] ?>"><?php echo $maison_name['room_number'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="admin_page-addcalendar-block">
                <label for="mail">Email</label>
                <input type="email" name="mail" id="mail">
            </div>
        </div>

        <div class="admin_page-addcalendar-row">
            <div class="admin_page-addcalendar-block">
                <label for="phone">Téléphone :</label>
                <input type="text" name="phone" id="phone">
            </div>
            <div class="admin_page-addcalendar-block">
                <label for=txtFromDate1>Checkin</label>
                <input type="text" name="txtFromDate1" id="txtFromDate1" style="width:79px;" required />
            </div>
            <div class="admin_page-addcalendar-block">
                <label for=txtFromDate2>Checkout</label>
                <input type="text" name="txtFromDate2" id="txtFromDate2" style="width:79px;" required />
            </div>
        </div>
        <input type="submit" value="Ajouter" name="add" class="button-ajout">
    </form>
</div>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
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
</script>