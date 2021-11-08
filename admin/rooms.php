<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
if (!is_logged_in()) {
    login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';
#header("Location: events.php");

$sql = $db->query("SELECT * FROM rooms"); ?>

<div class="admin_page">
    <div class="header_admin">
        <h1>Maisons</h1>
        <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
    </div>
    <div class="admin_page_maison">
        <?php while ($room = $sql->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="admin_page_maison_container">
                <img src="/<?= $room['photo']; ?>" alt="" srcset="">
                <div class="admin_page_maison_title">
                    <h2><?= $room['room_number']; ?></h2>
                    <button><a href="add_room.php?edit=<?= $room['id'] ?>">Modifier</a></button>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>