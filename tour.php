<?php

require_once 'core/core.php';
include 'includes/header.php';
include 'includes/navigation.php';

if(isset($_GET['tour'])) {
  $tourID = $_GET['tour'];
  $select = $db->query("SELECT * FROM tourism WHERE id = '{$tourID}' ");
  $s = $db->query("SELECT * FROM tourism WHERE id = '{$tourID}' ");
  $data = mysqli_fetch_assoc($s);
####################################################################################

if(isset($_POST['reserve'])) {
  if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['people']) && isset($_POST['number'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $people = $_POST['people'];
        $phone = $_POST['number'];

      $save = $db->query("INSERT INTO tour_reserves (tour_id,reservations,cus_name,`email`,`phone`)
                            VALUES ('$tourID','$people','$name','$email','$phone')");

      if($save){
        $newReservations = $data['reservations'] - $people;
        $update = $db->query("UPDATE tourism SET reservations = '$newReservations' WHERE id = '$tourID' ");
      }
      $_SESSION['tour_success'] = 'Reservation successfully made!';
      header("Location: tour.php?tour=$tourID ");


  } else {
    echo 'All fields are required!';
  }
}


} elseif( !(isset($_GET['tour'])) || $_GET['tour']=='' ) {
  header("Location: tourism.php");
}

?>

     <!-- Room details -->
<div class="container">
    <?php while($tour = mysqli_fetch_assoc($select)): ?>
       <div class="page-header">
         <h2 class="text-center"><?= $tour['title']; ?></h2>
       </div>

       <div class="row">
         <div class="col-md-6">
           <img class="" style="width:100%; height:400px" src="<?= $tour['photo']; ?>">
           <img class="" style="width:100%; height:400px" src="<?= $tour['photo_2']; ?>">
           <img class="" style="width:100%; height:400px" src="<?= $tour['photo_3']; ?>">
         </div>

         <!-- Right collumn for details -->
         <div class="col-md-6">
           <hr />
           <p><?= $tour['subtitles']; ?></p>
           <p><b>Location:</b> <?= $tour['location']; ?></p>
           <p><b>Date de l'article :</b> <?= $tour['date']; ?></p>
           <p><b>Description :</b> <?= $tour['details']; ?></p>
           <hr />

         </div>
       </div>
<?php endwhile; ?>

        </div>

<br /><br /><br /><br />
