<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
if (!is_logged_in()) {
    login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';

$select = "SELECT distinct id_rooms, room_number FROM comments INNER JOIN rooms ON comments.id_rooms = rooms.id";
$result = $db->query($select);

@$idRooms = $_POST['maison'];
@$fullname = $_POST['name'];
@$date = $_POST['date'];
@$comm = $_POST['comm'];

if (isset($_POST['add'])) {
    if (!empty($fullname) && !empty($date) && !empty($comm) && !empty($idRooms)) {
        $sql = "INSERT INTO comments (`fullname`, `date_c`, `comment`, `id_rooms`)
                    VALUES ('$fullname','$date','$comm','$idRooms')";

        $insert = $db->query($sql);
        if ($insert) {
            header("Location: comments.php");
        } else {
            echo 'error';
        }
    } else {
        echo 'Veuillez remplir tous les champs';
    }
}

?>

<div class="admin_page">
    <div class="header_admin">
        <h1>Ajouter un commentaire</h1>
        <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
    </div>
    <div class="admin_page_addcomm">
        <form class="container-area" method="POST" enctype="multipart/form-data">
           <div class="area1"> 
               <label for="">Votre maison :</label>
            <select class="margin-commentaire" name="maison" id="">
                <?php while ($test = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                    <option value="<?= $test['id_rooms']; ?>"><?= $test['room_number']; ?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <label for="name">Nom complet : </label>
            <input type="text" name="name" id="" required>
            <br>
            <label for="">Mois et année : </label>
            <input type="text" name="date" id="" required>
            </div>
            <div class="area2">
            
            <label for="">Commentaire : </label>
            <textarea name="comm" id="" cols="30" rows="10" required></textarea>
            <input class="margin-ajouter"  type="submit" name="add" value="Ajouter">
            </div>
        </form>
    </div>
</div>