<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
if (!is_logged_in()) {
  login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';

$sql2 = $db->query("SELECT * FROM rooms");


//FIELD VARIABLES
@$title = sanitize($_POST['title']);
@$subtitles = sanitize($_POST['subtitles']);
@$date = sanitize($_POST['date']);
@$location_t = sanitize($_POST['location']);
@$sdetails = sanitize($_POST['sdetails']);
@$id_rooms = sanitize($_POST['maison']);
//The function nl2br() reserves line breaks
// @$fdetails = nl2br($_POST['fdetails']);

//VALIDATING AND MOVING OF FILE FROM TEMPORAL LOCATION TO INTENDED LOCATION
if (!empty($_FILES)) {
  $fileName = @$_FILES['file']['name'];
  $ext = strtolower(substr($fileName, strpos($fileName, '.') + 1));
  $fileName = md5(microtime()) . '.' . $ext;
  $type = @$_FILES['file']['type'];
  $tmp_name = @$_FILES['file']['tmp_name'];


  if (($ext == 'jpg') || ($ext == 'jpeg') || ($ext == 'png') || ($ext == 'gif')) {
    $location = $_SERVER['DOCUMENT_ROOT'] . '/images/';
    move_uploaded_file($tmp_name, $location . $fileName);
  } else {
    // echo '<div class="w3-center w3-red">The image type must be jpg, jpeg, gif, or png.</div></br>';
  }

  $fileName2 = @$_FILES['file2']['name'];
  $ext2 = strtolower(substr($fileName2, strpos($fileName2, '.') + 1));
  $fileName2 = md5(microtime()) . '.' . $ext2;
  $type2 = @$_FILES['file2']['type'];
  $tmp_name2 = @$_FILES['file2']['tmp_name'];

  if (($ext2 == 'jpg') || ($ext2 == 'jpeg') || ($ext2 == 'png') || ($ext2 == 'gif')) {
    $location2 = $_SERVER['DOCUMENT_ROOT'] . '/images/';
    move_uploaded_file($tmp_name2, $location2 . $fileName2);
  } else {
    //echo '<div class="w3-center w3-red">The image type must be jpg, jpeg, gif, or png.</div></br>';
  }
}

//INSERTING THE EVENT INFORMATION IN THE DATABASE
if (isset($_POST['add'])) {
  if (!empty($_POST['title']) && !empty($_POST['subtitles']) && !empty($_POST['date']) && !empty($_POST['location']) && !empty($_POST['sdetails'])) {
    $image = 'images/' . $fileName;
    $image2 = 'images/' . $fileName2;


    //INSERTING EVENT DETAILS IN THE DATABASE
    $sql = "INSERT INTO tourism (`title`, `citation`, `photo`, `photo_2`, `location`,`details`, `date`, `id_rooms`) VALUES ('$title','$subtitles','$image','$image2', '$location_t','$sdetails','$date', '$id_rooms') ";
    $query_run = $db->query($sql);
    var_dump($_POST);
    var_dump($query_run);
    exit;
    if ($query_run) {
      $_SESSION['added_event'] = '<div class="w3-center w3-green">Tour Event successfully added!</div></br>';
      header("Location: tours.php");
    } else {
      var_dump($_POST);
    }
  } else {
    var_dump($_POST);
    $error = '<span class="form_error">Please fill in all fields.</span></br>';
  }
}

?>
<!--
<div class="w3-container w3-main" style="margin-left:200px">
  <header class="w3-container w3-purple">
    <span class="w3-opennav w3-xlarge w3-hide-large" onclick="w3_open()">☰</span>
    <h2 class="text-center">Add a tour</h2>
  </header>
  <br />

  <div class="row col-sm-12">
    <a href="tours.php" class="btn btn-md btn-primary pull-right">Go to tours</a>
  </div>
  <br><br>
  <div class="row">

    <div class="col-md-9 w3-padding">

      <form class="form" method="POST" action="" enctype="multipart/form-data">

        <div class="col-sm-3 form-group">
          <label for="title">Title:</label>
          <input type="text" name="title" value="<?= (isset($toEditID)) ? '' . $rows['title'] . '' : ''; ?>" class="form-control" placeholder="event topic">
        </div>

        <div class="col-sm-3 form-group">
          <label for="subtitles">Sous-Title:</label>
          <input type="text" name="subtitles" value="<?= (isset($toEditID)) ? '' . $rows['subtitles'] . '' : ''; ?>" class="form-control" placeholder="event topic">
        </div>

        <div class="col-sm-3 form-group">
          <label for="location">Location:</label>
          <input type="text" name="location" class="form-control" value="<?= (isset($toEditID)) ? '' . $rows['location'] . '' : ''; ?>" placeholder="venue">
        </div>

        <div class="col-sm-3 form-group">
          <label for="date">Date:</label>
          <input type="date" name="date" value="<?= (isset($toEditID)) ? '' . $rows['date'] . '' : ''; ?>" class="form-control">
        </div>

        <?php if (!@$rows['photo'] || @$rows['photo'] == '') : ?>
          <div class="col-sm-3 form-group">
            <label for="file">Photo:</label>
            <input type="file" class="form-control" name="file" id="file">
          </div>
        <?php endif;  ?>

        <?php if (!@$rows['photo_2'] || @$rows['photo_2'] == '') : ?>
          <div class="col-sm-3 form-group">
            <label for="file2">Photo:</label>
            <input type="file" class="form-control" name="file2" id="file">
          </div>
        <?php endif;  ?>

        <?php if (!@$rows['photo_3'] || @$rows['photo_3'] == '') : ?>
          <div class="col-sm-3 form-group">
            <label for="file3">Photo:</label>
            <input type="file" class="form-control" name="file3" id="file">
          </div>
        <?php endif;  ?>


        <div class="col-sm-6 form-group">
          <label for="sdetails">Description:</label>
          <textarea name="sdetails" class="form-control" col="20" rows="5"><?= (isset($toEditID)) ? '' . $rows['details'] . '' : ''; ?></textarea>
        </div>

        <div class="col-sm-12">
          <input type="submit" name="<?= (isset($toEditID)) ? 'update' : 'add'; ?>" value="<?= (isset($toEditID)) ? 'Edit Tour' : 'Add Tour'; ?>" class="w3-btn w3-indigo w3-btn-block"><br>
          <?php
          if (isset($toEditID)) {
            echo '<br>';
            echo ' <a href="add_tour.php?cancelEdit=' . $toEditID . '" type="button" name="cancelEdit" class="w3-btn w3-orange w3-btn-block">Cancel Edit</a>';
          }
          ?>
        </div>
      </form>
    </div>
    <div class="col-md-3">
      <?php if (isset($toEditID) && !$rows['photo'] != ' ') : ?>
        <figure>
          <h3>Event Image</h3>
          <img src="../<?= $rows['photo']; ?>" alt="event image" class="img-responsive">
          <figcaption>
            <a href="add_tour.php?delete_image=<?= $toEditID; ?>" class="w3-text-red">Delete Photo</a>
          </figcaption>
        </figure>
        
        <figure>
          <h3>Event Image</h3>
          <img src="../<?= $rows['photo_2']; ?>" alt="event image" class="img-responsive">
          <figcaption>
            <a href="add_tour.php?delete_image=<?= $toEditID; ?>" class="w3-text-red">Delete Photo</a>
          </figcaption>
        </figure>
        
        <figure>
          <h3>Event Image</h3>
          <img src="../<?= $rows['photo_3']; ?>" alt="event image" class="img-responsive">
          <figcaption>
            <a href="add_tour.php?delete_image=<?= $toEditID; ?>" class="w3-text-red">Delete Photo</a>
          </figcaption>
        </figure>
      <?php endif; ?>
    </div>
  </div>
</div>
      -->

<style>
  .form-control small {
    opacity: 0;
  }

  .form-control.error small {
    opacity: 1;
  }
</style>

<div class="admin_page">
  <div class="header_admin">
    <h1>Ajouter une rubrique</h1>
    <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
  </div>
  <div class="admin_page_addtours">
    <form method="POST" enctype="multipart/form-data" id="form" name="form" onsubmit="return validate();">
      <div class="form_addtours_top">
        <div class="form-control">
          <label for="title">Titre</label>
          <br>
          <input type="text" name="title" value="" placeholder="Titre" id="title" required>
          <br>
          <small>Error Message</small>
        </div>

        <div class="form-control">
          <label for="subtitles">Citation</label>
          <br>
          <input type="text" name="subtitles" id="subtitle" placeholder="Citation">
          <br>
          <small>Error Message</small>
        </div>

        <div class="form-control">
          <label for="location">Lieu </label>
          <br>
          <input type="text" id="lieu" name="location" placeholder="Lieu">
          <br>
          <small>Error Message</small>
        </div>

        <div class="form-control">
          <label for="date">Date</label>
          <br>
          <input type="date" id="date" name="date">
          <br>
          <small>Error Message</small>
        </div>
      </div>

      <div class="form_addtours_middle">
        <div class="form-control">
          <select name="maison" id="" class="test" required>
            <option value="" selected="true" disabled="disabled">Votre maison</option>
            <?php while ($room = $sql2->fetch(PDO::FETCH_ASSOC)) : ?>

              <option class="test-hover" value="<?= $room['id']; ?>"><?= $room['shortName']; ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-control">
          <label for="file">Photo:</label>
          <br>
          <input type="file" name="file" id="file" required>
          <br>
          <small>Error Message</small>
        </div>

        <div class="form-control">
          <label for="file2">Photo:</label>
          <br>
          <input type="file" name="file2" id="file2" required>
          <br>
          <small>Error Message</small>
        </div>
      </div>
      <div class="form_addtours_bottom">
        <div class="form-control">
          <label for="sdetails">Description:</label>
          <br>
          <textarea name="sdetails" id="description" col="20" rows="5" required></textarea>
          <br>
          <small>Error Message</small>
        </div>

        <input type="submit" name="add" value="Ajouter" class="submit_button"><br>
      </div>
    </form>
  </div>
</div>