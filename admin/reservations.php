<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
//LOGGED IN CHECK
if (!is_logged_in()) {
  login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';
$sql = "SELECT * FROM rooms INNER JOIN reservations WHERE rooms.id = reservations.id_rooms ORDER BY reservations.id DESC";
$result = $db->query($sql);
$row_count = 1;


if (isset($_GET['delete'])) {
  $toDelete = $_GET['delete'];
  $sql = $db->query("DELETE FROM reservations WHERE id = '$toDelete' ");
  header("Location: reservations.php");
}

?>

<div class="admin_page">
  <div class="header_admin">
    <h1>Demande de reservations</h1>
    <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
  </div>
  <div class="admin_page_reserv">
    <table class="table table-striped table-condensed table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Maison</th>
          <th>Nom</th>
          <th>Checkin</th>
          <th>Checkout</th>
          <th>Téléphone</th>
          <th>Adultes</th>
          <th>Enfants</th>
          <th>Email</th>
          <th>Prix total</th>

          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($rows = $result->fetch(PDO::FETCH_ASSOC)) : ?>
          <tr>
            <td><?= $row_count++; ?></td>
            <td><?= $rows['room_number']; ?></td>
            <td><?= $rows['name']; ?></td>
            <td><?= $rows['checkin']; ?></td>
            <td><?= $rows['checkout']; ?></td>
            <td><?= $rows['phone']; ?></td>
            <td><?= $rows['people']; ?></td>
            <td><?= $rows['children']; ?></td>
            <td><?= $rows['email']; ?></td>
            <?php
            ini_set("display_errors", 1);
            date_default_timezone_set('Europe/Paris');
            $date_debut = strtotime($rows['checkin']);
            $date_fin = strtotime($rows['checkout']);
            $nbJour = round(($date_fin - $date_debut) / 60 / 60 / 24, 0); ?>
            <td><?= $nbJour * $rows['price']; ?>€</td>

            <td>
              <a href="reservations.php?delete=<?= $rows['id']; ?>"><i class='bx bx-trash'></i></a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>