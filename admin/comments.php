<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/core/core.php';
require_once('../helpers/helpers.php');
   //LOGGED IN CHECK
   if(!is_logged_in()){
       login_error_check();
   }

   include 'includes/header.php';
   include 'includes/navigation.php';
   $sql = "SELECT * FROM comments ORDER BY id_rooms";
   $result = $db->query($sql);
   $row_count = 1;

   if(isset($_GET['delete'])){
     $toDelete = $_GET['delete'];
     $sql = $db->query("DELETE FROM comments WHERE id = '$toDelete'");
     header("Location: comments.php");
   }

 ?>
<div class="w3-container w3-main" style="margin-left:200px">
  <header class="w3-container w3-purple">
   <span class="w3-opennav w3-xlarge w3-hide-large" onclick="w3_open()">☰</span>
   <h2 class="text-center">Comments</h2>
 </header>
  <div class="col-md-12">
    <br>
    <h2 class="text-center">All Comments</h2>
    <br />
  </div>
<div class="col-md-12">
  <table class="table table-striped table-condensed table-bordered">
      <thead>
          <tr>
              <th>#</th>
              <th>Name</th>
              <th>Title of comment</th>
              <th>Date</th>
              <th>Comment</th>
              <th>Id House</th>
          </tr>
      </thead>
      <tbody>
      <?php while($rows = mysqli_fetch_assoc($result)): ?>
          <tr>
              <td><?= $row_count++; ?></td>
              <td><?=$rows['fullname']; ?></td>
              <td><?=$rows['title_c']; ?></td>
              <td><?=$rows['date_c']; ?></td>
              <td><?=$rows['comment']; ?></td>
              <td><?=$rows['id_rooms']; ?></td>
              <td>
                  <a href="comments.php?delete=<?=$rows['id'];?>" class="w3-btn w3-small w3-red"><span class="glyphicon glyphicon-trash"></span></a>

              </td>
          </tr>
        <?php endwhile;?>
      </tbody>
  </table>
</div>



</div>