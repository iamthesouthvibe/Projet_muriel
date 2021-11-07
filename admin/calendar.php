<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
//LOGGED IN CHECK
if (!is_logged_in()) {
    login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';


$sql = "SELECT * FROM rooms INNER JOIN calendar WHERE rooms.id = calendar.id_rooms AND calendar.id > 5";
$result = $db->query($sql);

if (isset($_GET['delete'])) {
    $toDelete = $_GET['delete'];
    $sql = $db->query("DELETE FROM calendar WHERE id = '$toDelete' ");
    header("Location: calendar.php");
}
?>

<div class="admin_page">
    <div class="header_admin">
        <h1>Réservations</h1>
        <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
    </div>

    <div class="admin_page_reserv">
        <table class="table table-striped table-condensed table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Maison</th>
                    <th>Checkin</th>
                    <th>Checkout</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($rows = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?= $rows['libelle']; ?></td>
                        <td><?= $rows['room_number']; ?></td>
                        <td><?= $rows['checkin']; ?></td>
                        <td><?= $rows['checkout']; ?></td>
                        <td><?= $rows['email']; ?></td>
                        <td><?= $rows['phone']; ?></td>
                        <td>
                            <a href="calendar.php?delete=<?= $rows['id']; ?>"><i class='bx bx-trash'></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <a href="add_calendar.php"><img src="/assets/png/button_add.png" alt=""></a>
</div>