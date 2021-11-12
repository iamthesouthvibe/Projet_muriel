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
@$intro = sanitize($_POST['intro']);
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
  $size = @$_FILES['file']['size'];

  if (($ext == 'jpg') || ($ext == 'jpeg') || ($ext == 'png') || ($ext == 'gif')) {
    $location = $_SERVER['DOCUMENT_ROOT'] . '/images/';
    move_uploaded_file($tmp_name, $location . $fileName);
  } else {
    echo 'Image trop lourd ou pas au bon format';
  }

  $location = $_SERVER['DOCUMENT_ROOT'] . '/images/';
  move_uploaded_file($tmp_name, $location . $fileName);

  $fileName2 = @$_FILES['file2']['name'];
  $ext2 = strtolower(substr($fileName2, strpos($fileName2, '.') + 1));
  $fileName2 = md5(microtime()) . '.' . $ext2;
  $type2 = @$_FILES['file2']['type'];
  $tmp_name2 = @$_FILES['file2']['tmp_name'];

  if (($ext2 == 'jpg') || ($ext2 == 'jpeg') || ($ext2 == 'png') || ($ext2 == 'gif')) {
    $location2 = $_SERVER['DOCUMENT_ROOT'] . '/images/';
    move_uploaded_file($tmp_name2, $location2 . $fileName2);
  } else {
    echo 'Image trop lourd ou pas au bon format';
  }

  $location2 = $_SERVER['DOCUMENT_ROOT'] . '/images/';
  move_uploaded_file($tmp_name2, $location2 . $fileName2);
}

//INSERTING THE EVENT INFORMATION IN THE DATABASE
if (isset($_POST['add'])) {
  if (!empty($_POST['title']) && !empty($_POST['subtitles']) && !empty($_POST['date']) && !empty($_POST['location']) && !empty($_POST['sdetails'])) {
    $image = 'images/' . $fileName;
    $image2 = 'images/' . $fileName2;


    //INSERTING EVENT DETAILS IN THE DATABASE
    $sql = "INSERT INTO tourism (`title`, `citation`, `photo`, `photo_2`, `location`,`details`, `intro` ,`date`, `id_rooms`) VALUES ('$title','$subtitles','$image','$image2', '$location_t','$sdetails', '$intro' ,'$date', '$id_rooms') ";
    $query_run = $db->query($sql);

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
          <label for="intro">Texte introductif :</label>
          <br>
          <textarea name="intro" id="intro" col="5" rows="2" required></textarea>
          <br>
          <small>Error Message</small>
        </div>
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