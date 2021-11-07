<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
//LOGGED IN CHECK
if (!is_logged_in()) {
    login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';

$sql = "SELECT * FROM rooms";
$result = $db->query($sql);


// Get les data
@$name = $_POST['name'];
@$rooms =  (int)$_POST['maison'];
@$phone = $_POST['phone'];
@$email = $_POST['mail'];
@$checkin = $_POST['checkin'];
@$checkout = $_POST['checkout'];


// On envoie les données
if (isset($_POST['add'])) {
    if (!empty($name) && !empty($rooms) && !empty($phone) && !empty($email) && !empty($checkin) && !empty($checkout)) {
        $sql2 = "INSERT INTO calendar (`libelle`,`email`, `phone`, `checkin`, `checkout`, `id_rooms`)
                    VALUES ('$name','$email','$phone','$checkin','$checkout', '$rooms')";

        $insert = $db->prepare($sql2);
        $insert->execute();

        if ($insert) {
            var_dump($insert);
            // header("Location: calendar.php");
        } else {
            echo 'error';
        }
    }
}

?>
<div class="admin_page">
    <div class="header_admin">
        <h1>Ajouter une reservation</h1>
        <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
    </div>

    <form action="" method="post">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" required>

        <select name="maison" id="">
            <?php while ($maison_name = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                <option value="<?php echo $maison_name['id'] ?>"><?php echo $maison_name['room_number'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail" required>

        <label for="phone">Téléphone :</label>
        <input type="text" name="phone" id="phone" required>

        <label for="checkin">Checkin</label>
        <input type="date" name="checkin" id="checkin" required>

        <label for="checkout">Checkout</label>
        <input type="date" name="checkout" id="checkout" required>

        <input type="submit" value="Ajouter" name="add">

    </form>
</div>

<script>
    option_value = document.querySelector('select option').value;
    console.log(option_value);
</script>