<?php
require_once 'core/core.php';
include 'includes/header.php';

/*

$sql = $db->query("SELECT * FROM rooms LIMIT 4");
$tourSQL = $db->query("SELECT * FROM tourism LIMIT 4");
?>


    <!-- Content section -->
    <section class="py-5">
      <div class="container">
        <h1>Homes Muriel etst branch</h1><hr />
      <div class="row">

      <?php  while($room = mysqli_fetch_assoc($sql)): ?>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <h4 class="text-center"><?=$room['room_number'];?></h4>
            <img src="<?=$room['photo'];?>" class="img-responsive" alt="room" width="100%" height="200px">
            <section class="text-justify">
              <p>
                <?=$room['details'];?>
              </p>
              <a href="details.php?room=<?= $room['id']; ?>" class="btn btn-block btn-primary">More Details</a>
            </section>
          </div>

    <?php endwhile; ?>
      </div>
    </section>
    -->

    <!-- Content section -->
    <section class="py-5">
      <div class="container">
        <h1>Tourism</h1>
        <div class="row">

        <?php while($tour = mysqli_fetch_assoc($tourSQL)): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
              <h4 class="text-center"><?=$tour['title'];?></h4>
              <img src="<?=$tour['photo'];?>" class="img-responsive" alt="room" width="100%" height="200px">
              <section class="text-justify">
                <p>
                  <?=$tour['details'];?>
                </p>
                <a href="tour.php?tour=<?= $tour['id']; ?>" class="btn btn-block btn-primary">More Details</a>
              </section>
            </div>

      <?php endwhile; ?>
        </div>
      </div>
    </section> */

    ?>


<!--  ######Ceci est la partie Html de la page d'accueil. Raccorder le back par la suite.##### -->

<div class="container_page_accueil">

  <h1 class="style_h1_accueil">“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.”</h1>

  <h2 class="style_h2_accueil">Sed rutrum vulputate dapibus. Vivamus id tincidunt eros, in suscipit quam. Praesent aliquet justo auctor urna feugiat, luctus aliquam odio pharetra. Fusce iaculis mauris sem. Donec varius urna libero, sit amet tincidunt enim laoreet ut. Donec non sem pharetra, ullamcorper nibh in, lacinia risus. Proin rutrum egestas massa, a cursus diam interdum ac. </h2>

  <img src = "../assets/svg/Scroll-Desktopsvg.svg" alt="Symbole Scroll SVG" class="style_scroll_SVG_accueil"/>

</div>








    <!-- Footer -->
    <footer class="py-5 bg-inverse">
      <div class="container">
        <p class="m-0 text-center ">Copyright &copy; Hotel & Tourism</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
