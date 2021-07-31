<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
if (!is_logged_in()) {
    login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';
#header("Location: events.p$tour

$sql = $db->query("SELECT * FROM products");

if (isset($_GET['delete'])) {
    $toDeleteTours = $_GET['delete'];
    $sql1 = $db->query("SELECT * FROM products WHERE id = '$toDeleteTours' LIMIT 1");
    $fetch = mysqli_fetch_assoc($sql1);
    /*$imageURL = $_SERVER['DOCUMENT_ROOT'].'/images/'.$fetch['photo'];
        $imageURL2 = $_SERVER['DOCUMENT_ROOT'].'/images/'.$fetch['photo_2'];
        $imageURL3 = $_SERVER['DOCUMENT_ROOT'].'/images/'.$fetch['photo_3'];
        unlink($imageURL);
        unlink($imageURL2);
        unlink($imageURL3);*/
    ##################################################################
    $sql = "DELETE FROM products WHERE id = '$toDeleteTours' ";
    $db->query($sql);
    header("Location: tours.php");
}


?>

<div class="admin_page">
    <div class="header_admin">
        <h1>Articles</h1>
        <img src="../assets/png/LOGO_ANCIEN.png" alt="Logo Muriel">
    </div>
    <div class="admin_page_tours">
    <?php while ($tour = mysqli_fetch_assoc($sql)) : ?>
        <div class="admin_page_tours_container">
            <div class="admin_page_tours_title">
                <h2><?= $tour['name_p']; ?></h2>
            </div>
            <div class="admin_page_tours_action">
                <a href="add_tour.php?edit=<?= $tour['id_p']; ?>"><i class='bx bx-edit' ></i></a>
                <a href="tours.php?delete=<?= $tour['id_p']; ?>"><i class='bx bx-trash' ></i></a>
            </div>
        </div>
        <?php endwhile; ?>
        <a href="add_product.php"><img src="/assets/png/button_add.png" alt=""></a>
    </div>
</div>