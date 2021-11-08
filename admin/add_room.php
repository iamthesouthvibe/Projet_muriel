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

<div class="w3-container w3-main" style="margin-left:200px">
  <br />
  <form class="form" action="#" method="post" enctype="multipart/form-data">
    <h1>
      <h1><?= $edit['room_number'] ?> </h1>

      <div class="form-group col-md-2">
        <label>Prix par nuit</label>
        <input type="text" class="form-control" value="<?= $edit['price'] ?>" name="price">
      </div>

      <div class="form-group col-md-4">
        <label></label>
        <input type="submit" class="btn btn-block btn-lg btn-success" value="Changer le prix" name="update">
      </div>

      <?php if (isset($_GET['edit']) && !empty($_GET['edit'])) : ?>
        <div class="form-group col-md-4">
          <label></label>
          <a class="btn btn-block btn-danger btn-lg" href="rooms.php">Retour</a>
        </div>


      <?php endif; ?>

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