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
    <img src="../assets/png/LOGO_03_PNG_NOIR.png" alt="Logo Muriel">
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
        <?php while ($rows = $result->fetch(PDO::FETCH_ASSOC)) :

          // Creating timestamp from given date
          $timestamp = strtotime($rows['checkin']);
          // Creating new date format from that timestamp
          $new_checkin = date("d-m-Y", $timestamp);

          // Creating timestamp from given date
          $timestamp2 = strtotime($rows['checkout']);
          // Creating new date format from that timestamp
          $new_checkout = date("d-m-Y", $timestamp2);

        ?>
          <tr>
            <td><?= $row_count++; ?></td>
            <td><?= $rows['room_number']; ?></td>
            <td><?= $rows['name']; ?></td>
            <td><?= $new_checkin; ?></td>
            <td><?= $new_checkout; ?></td>
            <td><?= $rows['phone']; ?></td>
            <td><?= $rows['people']; ?></td>
            <td><?= $rows['children']; ?></td>
            <td><?= $rows['email']; ?></td>
            <td><?= $rows['price']; ?>€</td>

            <td>
              <a href="reservations.php?delete=<?= $rows['id']; ?>" onclick="return confirm('Vous êtes sur le point de supprimer une demande de réservation')"><i class='bx bx-trash'></i></a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>