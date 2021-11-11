<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
if (!is_logged_in()) {
    login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';
#header("Location: events.p$tour

$sql = $db->query("SELECT * FROM tourism");

if (isset($_GET['delete'])) {
    $toDeleteTours = $_GET['delete'];
    $sql1 = $db->query("SELECT * FROM tourism WHERE id = '$toDeleteTours' LIMIT 1");
    $fetch = $sql1->fetch(PDO::FETCH_ASSOC);
    /*$imageURL = $_SERVER['DOCUMENT_ROOT'].'/images/'.$fetch['photo'];
        $imageURL2 = $_SERVER['DOCUMENT_ROOT'].'/images/'.$fetch['photo_2'];
        $imageURL3 = $_SERVER['DOCUMENT_ROOT'].'/images/'.$fetch['photo_3'];
        unlink($imageURL);
        unlink($imageURL2);
        unlink($imageURL3);*/
    ##################################################################
    $sql = "DELETE FROM tourism WHERE id = '$toDeleteTours' ";
    $db->query($sql);
    header("Location: tours.php");
}


?>

<div class="admin_page">
    <div class="header_admin">
        <h1>Rubriques</h1>
        <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
    </div>
    <div class="admin_page_tours">
        <?php while ($tour = $sql->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="admin_page_tours_container">
                <div class="admin_page_tours_title">
                    <h2><?= $tour['title']; ?></h2>
                </div>
                <div class="admin_page_tours_action">
                    <a href="tours.php?delete=<?= $tour['id']; ?>"><i class='bx bx-trash'></i></a>
                </div>
            </div>
        <?php endwhile; ?>
        <a href="add_tour.php"><img src="/assets/png/button_add.png" alt=""></a>
    </div>
</div>