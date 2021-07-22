<?php
require_once 'core/core.php';
include 'includes/header.php';
include "includes/cursor.php";

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


<main>
  <!--  ######Ceci est la partie Html de la page d'accueil. Raccorder le back par la suite.##### -->
  <div class="qhero">
    <div class="qhero_page_accueil">
      <h1 class="style_h1_accueil">“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.”</h1>
      <h2 class="style_h2_accueil">Sed rutrum vulputate dapibus. Vivamus id tincidunt eros, in suscipit quam. Praesent aliquet justo auctor urna feugiat, luctus aliquam odio pharetra. Fusce iaculis mauris sem. Donec varius urna libero, sit amet tincidunt enim laoreet ut. Donec non sem pharetra, ullamcorper nibh in, lacinia risus. Proin rutrum egestas massa, a cursus diam interdum ac. </h2>

      <section id="section10" class="demo">
        <a href="#thanks"><span></span>Scroll</a>
      </section>
    </div>
  </div>


  <!--  ######Ceci est le caroussel de la page d'accueil. Raccorder le back par la suite.##### -->

  <div class="swiper-container mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">Grand Large
        <img src="assets/jpg/images page d'accueil/Villa-grande-Anse-Martinique02.jpg" alt="Photo Maison Grand Large Martinique">
      </div>
      <div class="swiper-slide">Slide 2
        <img src="assets/jpg/images page d'accueil/Villa-grande-Anse-Martinique02.jpg" alt="Photo Maison Grand Large Martinique">
      </div>
      <div class="swiper-slide">Slide 3
        <img src="assets/jpg/images page d'accueil/Villa-grande-Anse-Martinique02.jpg" alt="Photo Maison Grand Large Martinique">
      </div>
      <div class="swiper-slide">Slide 4
        <img src="assets/jpg/images page d'accueil/Villa-grande-Anse-Martinique02.jpg" alt="Photo Maison Grand Large Martinique">
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>

  <!--  ######Ceci est la section Muriel.##### -->

  <div class="section_muriel">
    <div>
      <img src="assets/jpg/Muriel.png" alt="Photo Profil Muriel" class="img_muriel">
    </div>
    <div class="section_muriel_titre_text">
      <h2 class="titre_section_muriel">Muriel</h2>
      <p class="texte_section_muriel">Je quittai à 20 ans la métropole pour la Martinique, par amour et par désir d’aventures. Avec mon compagnon, nous sommes arrivés là-bas avec nos seules valises et envies de conquérir le monde. De débrouilles en petits boulots, incertains du lendemain, nous avons finalement passé 21 ans sur cette île aux mille couleurs et saveurs. Inspirée par cette terre où se rencontrent les cultures, où se métissent les imaginations, je me suis prise d’une véritable passion pour habiller les murs de ma maison de toutes ces influences.<br> <br>
        Quand j’ai eu envie d’explorer d’autres horizons, Narbonne fut comme une évidence. J’y retrouvais le soleil, la mer, la générosité joyeuse de ses habitants. Rien ne me plaît tant que le contraste. J’aime chiner dans les greniers et les brocantes, trouver des meubles auxquels redonner vie. Je ponce, je peins, je détourne. J’aime cette petite étincelle d’étonnement que provoque la rencontre entre un objet design et une bricole restaurée sur mes murs.<br><br>
        Je veux créer des maisons pour faire rêver, des maisons qui soient comme des personnalités, surprenantes, inattendues, accueillantes et généreuses. Où l’on ait envie de rester et de revenir, comme pour poursuivre une conversation interrompue trop tôt.son de charme situé au coeur de la martinique. </p>
    </div>
  </div>


</main>



<!-- Footer -->
<footer class="py-5 bg-inverse">
  <div class="container">
    <p class="m-0 text-center ">Copyright &copy; Hotel & Tourism</p>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    cssMode: false,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
    },
    keyboard: true,
  });
</script>