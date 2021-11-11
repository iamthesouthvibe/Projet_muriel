<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
if (!is_logged_in()) {
  login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';


$id = $_GET['edit'];
$get = $db->query("SELECT * FROM rooms WHERE id = '{$id}' ");
$edit = $get->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['update'])) {
  if (!empty($_POST['price'])) {

    $price = $_POST['price'];



    $toEditID = $_GET['edit'];
    $sqlSelect = $db->query("SELECT * FROM rooms WHERE id = '$toEditID' ");
    $row = $sqlSelect->fetch(PDO::FETCH_ASSOC);

    $query = $db->query("UPDATE rooms SET `price`='$price' WHERE id = '$toEditID' ");


    $update = $db->query($query);
    header("Location: rooms.php");
  } else {
    echo '<div class="w3-center w3-red">Veuillez rentrer un prix </div></br>';
  }
}

?>
<div class="admin_page">
  <div class="header_admin">
    <h1><?= $edit['room_number'] ?> </h1>
    <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
  </div>
  <form class="admin_page-addcalendar" action="#" method="post" enctype="multipart/form-data">

    <div class="form- col-md-2">
      <label>Prix par nuit</label>
      <br>
      <input type="text" class="form-control" value="<?= $edit['price'] ?>" name="price">
    </div>

    <div class="margin-top-page-addroom">
      <label></label>
      <input type="submit" value="Changer le prix" name="update" class="button-ajout ">
    </div>
  </form>
</div>
<script>
  function w3_open() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
  }

  function w3_close() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
  }
</script>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>

</html>