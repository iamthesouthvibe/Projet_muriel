<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
//LOGGED IN CHECK
if (!is_logged_in()) {
    login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';
$sql = $db->query("SELECT * FROM rooms");
?>
<div class="admin_page">
    <div class="header_admin">
        <h1>Choisir une maison</h1>
        <img src="../assets/png/LOGO_03_PNG_NOIR.png" alt="Logo Muriel">
    </div>
    <form class="admin_page-calendar-choice" data-aos="fade" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000" method="get" action="add_calendar.php">
        <select name="maison" id="" class="test" required>
            <option value="" selected="true" disabled="disabled">Votre maison</option>
            <?php while ($room = $sql->fetch(PDO::FETCH_ASSOC)) : ?>

                <option class="test-hover" value="<?= $room['id']; ?>"><?= $room['shortName']; ?></option>
            <?php endwhile; ?>
        </select>
        <input type="submit" value="Choisir" class="button">
    </form>
</div>