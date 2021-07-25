<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
if (!is_logged_in()) {
    login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';
#header("Location: events.php");

$sql = $db->query("SELECT * FROM rooms");

if (isset($_GET['delete'])) {
    $toDeleteRoom = $_GET['delete'];
    $sql1 = $db->query("SELECT * FROM rooms WHERE id = '$toDeleteRoom' LIMIT 1");
    $fetch = mysqli_fetch_assoc($sql1);
    /*
        $imageURL = $_SERVER['DOCUMENT_ROOT'].'/'.$fetch['photo'];
        unlink($imageURL);*/
    ##################################################################
    $sql = "DELETE FROM rooms WHERE id = '$toDeleteRoom' ";
    $db->query($sql);
    header("Location: rooms.php");
}


?>
<!--
<div class="w3-container w3-main" style="margin-left:200px;" >

    <div class="row"><br />
        <div class="col-md-12">
            <a href="add_room.php" class="btn btn-primary pull-right">Add a room</a>
        </div>

        <?php // while($room = mysqli_fetch_assoc($sql)): 
        ?>
            <div class="col-md-3">
                <h3 class="text-center"><?= $room['room_number']; ?></h3>
                <img src="../<?= $room['photo']; ?>" class="img-thumbnail" style="width:100%; height:200px" alt="pic">
                <div class="section">
                    <section>
                        <p><?= $room['details']; ?></p>
                    </section>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="add_room.php?edit=<?= $room['id']; ?>" class="btn btn-primary btn-block ">Edit</a>
                    </div>
                    <div class="col-md-6">
                         <a href="rooms.php?delete=<?= $room['id']; ?>" class="btn btn-danger btn-block">Delete</a>
                    </div>
                </div>
            </div>
        <?php // endwhile; 
        ?>

    </div>
    <br /><br />
</div>
        -->

<div class="admin_page">
    <div class="header_admin">
        <h1>Maisons</h1>
        <img src="../assets/png/LOGO_ANCIEN.png" alt="Logo Muriel">
    </div>
    <div class="admin_page_maison">
        <div class="admin_page_maison_container">
            <img src="/assets/jpg/images page d'accueil/Villa-grande-Anse-Martinique02.jpg" alt="" srcset="">
            <div class="admin_page_maison_title">
                <h2>Villa Grande</h2>
                <button><a href="">Modifier</a></button>
            </div>
        </div>
        <div class="admin_page_maison_container">
            <img src="/assets/jpg/images page d'accueil/Villa-grande-Anse-Martinique02.jpg" alt="" srcset="">
            <div class="admin_page_maison_title">
                <h2>Villa Grande</h2>
                <button><a href="">Modifier</a></button>
            </div>
        </div>
       <div class="admin_page_maison_container">
            <img src="/assets/jpg/images page d'accueil/Villa-grande-Anse-Martinique02.jpg" alt="" srcset="">
            <div class="admin_page_maison_title">
                <h2>Villa Grande</h2>
                <button><a href="">Modifier</a></button>
            </div>
        </div>
        <div class="admin_page_maison_container">
            <img src="/assets/jpg/images page d'accueil/Villa-grande-Anse-Martinique02.jpg" alt="" srcset="">
            <div class="admin_page_maison_title">
                <h2>Villa Grande</h2>
                <button><a href="">Modifier</a></button>
            </div>
        </div>
    </div>
</div>