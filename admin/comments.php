<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
//LOGGED IN CHECK
if (!is_logged_in()) {
  login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';

$sql = "SELECT * FROM rooms INNER JOIN comments WHERE rooms.id = comments.id_rooms ORDER BY comments.id_rooms ";
$result = $db->query($sql);
$row_count = 1;

if (isset($_GET['delete'])) {
  $toDelete = $_GET['delete'];
  $sql = $db->query("DELETE FROM comments WHERE id = '$toDelete'");
  header("Location: comments.php");
}

?>
<div class="admin_page">
  <div class="header_admin">
    <h1>Commentaires</h1>
    <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
  </div>
  <div class="admin_page_comments">
    <table class="">
      <thead>
        <tr>
          <th>#</th>
          <th>Maison</th>
          <th>Nom</th>
          <th>Date</th>
          <th>Commentaire</th>
          <th>Supp</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($rows = $result->fetch(PDO::FETCH_ASSOC)) : ?>
          <tr>
            <td><?= $row_count++; ?></td>
            <td><?= $rows['room_number']; ?></td>
            <td><?= $rows['fullname']; ?></td>
            <td><?= $rows['date_c']; ?></td>
            <td><?= $rows['comment']; ?></td>
            <td>
              <a href="comments.php?delete=<?= $rows['id']; ?>"><i class='bx bx-trash'></i></a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <a href="add_commentaire.php"><img src="/assets/png/button_add.png" alt=""></a>
  </div>
</div>