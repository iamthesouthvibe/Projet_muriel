<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');
if (!is_logged_in()) {
  login_error_check();
}

include 'includes/header.php';
include 'includes/navigation.php';


//FIELD VARIABLES
@$title = sanitize($_POST['title']);
@$subtitles = sanitize($_POST['subtitles']);
@$date = sanitize($_POST['date']);
@$location_t = sanitize($_POST['location']);
@$sdetails = sanitize($_POST['sdetails']);
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

  $fileName3 = @$_FILES['file3']['name'];
  $ext3 = strtolower(substr($fileName3, strpos($fileName3, '.') + 1));
  $fileName3 = md5(microtime()) . '.' . $ext3;
  $type3 = @$_FILES['file3']['type'];
  $tmp_name3 = @$_FILES['file3']['tmp_name'];

  if (($ext3 == 'jpg') || ($ext3 == 'jpeg') || ($ext3 == 'png') || ($ext3 == 'gif')) {
    $location3 = $_SERVER['DOCUMENT_ROOT'] . '/images/';
    move_uploaded_file($tmp_name3, $location3 . $fileName3);
  } else {
    // echo '<div class="w3-center w3-red">The image type must be jpg, jpeg, gif, or png.</div></br>';
  }
}

//INSERTING THE EVENT INFORMATION IN THE DATABASE
if (isset($_POST['add'])) {
  if (!empty($_POST['title']) && !empty($_POST['subtitles']) && !empty($_POST['date']) && !empty($_POST['location']) && !empty($_POST['sdetails'])) {
    $image = 'images/' . $fileName;
    $image2 = 'images/' . $fileName2;
    $image3 = 'images/' . $fileName3;
    //INSERTING EVENT DETAILS IN THE DATABASE
    $sql = "INSERT INTO tourism (`title`, `subtitles`, `photo`, `photo_2`, `photo_3`, `location`,`details`, `date`)
                    VALUES ('$title','$subtitles','$image','$image2','$image3', '$location_t','$sdetails','$date') ";

    $query_run = $db->query($sql);
    if ($query_run) {
      $_SESSION['added_event'] = '<div class="w3-center w3-green">Tour Event successfully added!</div></br>';
    } else {
      printf("Erreur : %s\n", $db->error);
    }

    header("Location: tours.php");
  } else {
    '<span class="form_error">Please fill in all fields.</span></br>';
  }
}
//RUNNING UPDATE IF EDITING
else if (isset($_POST['update'])) {
  if (
    !empty($_POST['title']) && !empty($_POST['subtitles']) && !empty($_POST['date']) &&
    !empty($_POST['location']) && !empty($_POST['sdetails'])
  ) {

    @$image = 'images/' . $fileName;
    @$image2 = 'images/' . $fileName2;
    @$image3 = 'images/' . $fileName3;
    $toEditID = $_GET['edit'];
    $sqlSelect = $db->query("SELECT * FROM tourism WHERE id = '$toEditID' ");
    $row = mysqli_fetch_assoc($sqlSelect);

    if ($row['photo'] == '' || $row['photo_2'] == '' || $row['photo_3'] == '') {
      $query = $db->query("UPDATE tourism SET `title`='$title', `subtitles`='$subtitles', `photo`='$image', `photo_2`='$image2',`photo_3`='$image3',
      `location`='$location_t', `details`='$sdetails', `date`='$date'  WHERE id = '$toEditID' ");
    } else {
      $query = $db->query("UPDATE tourism SET`title`='$title', `subtitles`='$subtitles',
      `location`='$location_t', `details`='$sdetails', `date`='$date'  WHERE id = '$toEditID' ");
    }

    $update = $db->query($query);
    header("Location: tours.php");
  } else {
    echo '<div class="w3-center w3-red">Please fill in all fields.</div></br>';
  }
}

//CODE TO EDIT AN events
if (isset($_GET['edit'])) {
  $toEditID = $_GET['edit'];
  $sql = "SELECT * FROM tourism WHERE id = '$toEditID' ";
  $result = $db->query($sql);
  $rows = mysqli_fetch_assoc($result);
}

//Canceling EDITING
if (isset($_GET['cancelEdit'])) {
  unset($_SESSION['edit']);
  header("Location: tours.php");
}

//DELETING IMAGE
if (isset($_GET['delete_image'])) {
  $toEditID = $_GET['delete_image'];
  $sql1 = $db->query("SELECT * FROM tourism WHERE id = '$toEditID'");
  $fetch = mysqli_fetch_assoc($sql1);
  $imageURL = $_SERVER['DOCUMENT_ROOT'] . '/ht' . $fetch['photo'];
  $imageUR2 = $_SERVER['DOCUMENT_ROOT'] . '/ht' . $fetch['photo_2'];
  $imageURL3 = $_SERVER['DOCUMENT_ROOT'] . '/ht' . $fetch['photo_3'];
  unlink($imageURL);
  unlink($imageURL2);
  unlink($imageURL3);
  ##################################################################
  $sql = "UPDATE tourism SET `photo` = '$imageURL', `photo_2` = '$imageUR2', `photo_3` = '$imageURL3' WHERE id = '$toEditID' ";
  $db->query($sql);
  header("Location: add_tour.php?edit=$toEditID");
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
    <h1><?= (isset($toEditID)) ? '' . 'Modifier une rubrique' . '' : 'Ajouter une rubrique'; ?></h1>
    <img src="../assets/png/LOGO_ANCIEN.png" alt="Logo Muriel">
  </div>
  <div class="admin_page_addtours">
    <form method="POST" enctype="multipart/form-data" id="form" name="form" onsubmit="return validate();">
      <div class="form_addtours_top">
        <div class="form-control">
          <label for="title">Titre</label>
          <br>
          <input type="text" name="title" value="<?= (isset($toEditID)) ? '' . $rows['title'] . '' : ''; ?>" placeholder="Titre" id="title">
          <br>
          <small>Error Message</small>
        </div>

        <div class="form-control">
          <label for="subtitles">Sous-titre</label>
          <br>
          <input type="text" name="subtitles" id="subtitle" value="<?= (isset($toEditID)) ? '' . $rows['subtitles'] . '' : ''; ?>" placeholder="event topic">
          <br>
          <small>Error Message</small>
        </div>

        <div class="form-control">
          <label for="location">Lieu </label>
          <br>
          <input type="text" id="lieu" name="location" value="<?= (isset($toEditID)) ? '' . $rows['location'] . '' : ''; ?>" placeholder="venue">
          <br>
          <small>Error Message</small>
        </div>

        <div class="form-control">
          <label for="date">Date</label>
          <br>
          <input type="date" id="date" name="date" value="<?= (isset($toEditID)) ? '' . $rows['date'] . '' : ''; ?>">
          <br>
          <small>Error Message</small>
        </div>
      </div>

      <div class="form_addtours_middle">
        <div class="form-control">
          <?php if (!@$rows['photo'] || @$rows['photo'] == '') : ?>
            <label for="file">Photo:</label>
            <br>
            <input type="file" name="file" id="file" value="<?= (isset($toEditID)) ? '' . $rows['photo'] . '' : ''; ?>">
            <br>
            <small>Error Message</small>
          <?php endif;  ?>
        </div>

        <div class="form-control">
          <?php if (!@$rows['photo_2'] || @$rows['photo_2'] == '') : ?>
            <label for="file2">Photo:</label>
            <br>
            <input type="file" name="file2" id="file2">
            <br>
            <small>Error Message</small>
          <?php endif;  ?>
        </div>

        <div class="form-control">
          <?php if (!@$rows['photo_3'] || @$rows['photo_3'] == '') : ?>
            <label for="file3">Photo:</label>
            <br>
            <input type="file" name="file3" id="file3">
            <br>
            <small>Error Message</small>
          <?php endif;  ?>
        </div>
      </div>
      <div class="form_addtours_bottom">
        <div class="form-control">
          <label for="sdetails">Description:</label>
          <br>
          <textarea name="sdetails" id="description" col="20" rows="5"><?= (isset($toEditID)) ? '' . $rows['details'] . '' : ''; ?></textarea>
          <br>
          <small>Error Message</small>
        </div>

        <input type="submit" name="<?= (isset($toEditID)) ? 'update' : 'add'; ?>" value="<?= (isset($toEditID)) ? 'Edit Tour' : 'Add Tour'; ?>" class="submit_button"><br>
        <?php
        if (isset($toEditID)) {
          echo '<br>';
          echo ' <a href="add_tour.php?cancelEdit=' . $toEditID . '" type="button" name="cancelEdit" class="submit_button">Cancel Edit</a>';
        } ?>
      </div>
    </form>
  </div>
</div>


<script src="./js/checkform.js"></script>