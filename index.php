<?php
require_once 'core/core.php';
include 'includes/header.php';

$sql = $db->query("SELECT * FROM rooms LIMIT 4");

?>

<style>
  .style_h1_accueil span {
    display: inline-block;
    transform: translateY(100%);
  }
</style>


<main>

  <link rel="icon" type="assets/png/favicon.jpg" href="/favicon.jpg"/>

  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!--  ######Ceci est la partie Html de la page d'accueil. Raccorder le back par la suite.##### -->
  <div class="qhero">
    <div class="qhero_page_accueil">
      <h1 class="style_h1_accueil" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000" data-aos-delay="0"> “Laissez-vous séduire par un univers d’élégance <br> et de douceur.<br> 4 maisons, 4 ambiances le
        <br> regard d’une femme”
      </h1>
      <h2 class="style_h2_accueil" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000" data-aos-delay="200">Je veux créer des maisons pour faire rêver, des maisons qui soient comme des personnalités, surprenantes, inattendues, accueillantes et généreuses. Où l’on ait envie de rester et de revenir, comme pour poursuivre une conversation interrompue trop tôt. </h2>
      <div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000" data-aos-delay="400">
        <svg width="40px" viewBox="0 0 14.334 24.75" class="scroll_anim">
          <circle class="circle-1" fill="black" cx="7.167" cy="6" r="1.2" />
          <circle class="circle-2" fill="black" cx="7.167" cy="6" r="1.2" />
          <path stroke="black" fill="transparent" stroke-width="0.5" d="M7.167,0.5C3.485,0.5,0.5,3.485,0.5,7.167v10.416                   c0,3.682,2.985,6.667,6.667,6.667s6.667-2.985,6.667-6.667V7.167C13.834,3.485,10.849,0.5,7.167,0.5z" />
        </svg>
      </div>
    </div>
  </div>



  <!-- Swiper -->
  <div class="swiper mySwiper swiperHover">
    <div class="swiper-wrapper">
      <?php while ($room = $sql->fetch(PDO::FETCH_ASSOC)) :


        $nb_mots2 = 42;
        $var2 = $room['details'];
        $tab2 = explode(' ', $var2, $nb_mots2 + 1);
        unset($tab2[$nb_mots2]);
        $shortDesc = implode(' ', $tab2);
      ?>
        <div class="swiper-slide">
          <img src="<?= $room['photo']; ?>" alt="" srcset="">
          <div class="swiper-slide-titre">
            <h2 data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000" data-aos-delay="0"><?= $room['shortName']; ?></h2>
            <p data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000" data-aos-delay="200"><?= $shortDesc . '...'; ?></p>
            <button data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000" data-aos-delay="400"><a class="waitBeforeNavigate" href="maison.php?room=<?= $room['id']; ?>">Découvrir</a></button>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>

  </div>

  <!--  ######Ceci est la section Muriel.##### -->

  <div class="section_muriel">
    <div>
      <img src="assets/jpg/MURIEL-PROFIL.jpeg" alt="Photo Profil Muriel" class="img_muriel" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000" data-aos-delay="100">
    </div>
    <div class="section_muriel_titre_text">
      <h2 class="titre_section_muriel" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000" data-aos-delay="200">Muriel</h2>
      <p class="texte_section_muriel" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="500">Je quittai à 20 ans la métropole pour la Martinique, par amour et par désir d’aventures. Avec mon compagnon, nous sommes arrivés là-bas avec nos seules valises et envies de conquérir le monde. De débrouilles en petits boulots, incertains du lendemain, nous avons finalement passé 21 ans sur cette île aux mille couleurs et saveurs. Inspirée par cette terre où se rencontrent les cultures, où se métissent les imaginations, je me suis prise d’une véritable passion pour habiller les murs de ma maison de toutes ces influences.<br> <br>
        Quand j’ai eu envie d’explorer d’autres horizons, Narbonne fut comme une évidence. J’y retrouvais le soleil, la mer, la générosité joyeuse de ses habitants. Rien ne me plaît tant que le contraste. J’aime chiner dans les greniers et les brocantes, trouver des meubles auxquels redonner vie. Je ponce, je peins, je détourne. J’aime cette petite étincelle d’étonnement que provoque la rencontre entre un objet design et une bricole restaurée sur mes murs.<br><br>
        Je veux créer des maisons pour faire rêver, des maisons qui soient comme des personnalités, surprenantes, inattendues, accueillantes et généreuses. Où l’on ait envie de rester et de revenir, comme pour poursuivre une conversation interrompue trop tôt. </p>
    </div>
  </div>

  <?php
  include "includes/cursor.php";
  include("./includes/footer.php"); ?>
</main>




<!-- Swiper JS -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    /*autoHeight: true,*/
    loop: true,
    resizeObserver: false,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
    }
  });

  let swiperHoverRight = document.querySelector('.swiperHover .swiper-button-next ')

  swiperHoverRight.addEventListener('mouseenter', function(e) {
    cursor.classList.add('cursor_active_right');
    cursor2.classList.add('cursor2_active_right');
  })

  swiperHoverRight.addEventListener('mouseleave', function(e) {
    cursor.classList.remove('cursor_active_right');
    cursor2.classList.remove('cursor2_active_right');
  })



  let swiperHoverLeft = document.querySelector('.swiperHover .swiper-button-prev ')

  swiperHoverLeft.addEventListener('mouseenter', function(e) {
    cursor.classList.add('cursor_active_left');
    cursor2.classList.add('cursor2_active_left');
  })

  swiperHoverLeft.addEventListener('mouseleave', function(e) {
    cursor.classList.remove('cursor_active_left');
    cursor2.classList.remove('cursor2_active_left');
  })

  AOS.init();
</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
  function waitBeforeNavigate(ev) {
    ev.preventDefault(); // prevent default anchor behavior
    const goTo = this.getAttribute("href"); // store anchor href

    setTimeout(function() {
      window.location = goTo;
    }, 1000); // time in ms

    document.body.style.opacity = "0"
  };

  document.querySelectorAll(".waitBeforeNavigate")
    .forEach(EL => EL.addEventListener("click", waitBeforeNavigate));
</script>