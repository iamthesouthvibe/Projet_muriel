<?php
require_once 'core/core.php';
include 'includes/header.php';

$select = $db->query("SELECT * FROM products");
?>

<main>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Section accueil -->
    <div class="qhero_page_produits">
        <div class="qhero_entree_page_produits">
            <div class="div_h1_titre">
                <h1 class="h1_titre" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    Nos Articles
                </h1>
            </div>
            <div class="div_h3_text_presentation_produits" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="250">
                <h3 class="h3_titre">
                    Sed rutrum vulputate dapibus. Vivamus id tincidunt eros, in suscipit quam. Praesent aliquet justo auctor urna feugiat, luctus aliquam odio pharetra. Fusce iaculis mauris sem. Donec varius urna libero, sit amet tincidunt enim laoreet ut. Donec non sem pharetra, ullamcorper nibh in, lacinia risus. Proin rutrum egestas massa, a cursus diam interdum ac.
                </h3>
            </div>
        </div>
    </div>

    <!-- Section boutons de filtre -->

    <div class="section_boutons_filtre">
        <div class="boutons_maisons">
            <button class="bouton_selection_maison" class="bouton_selection_maison" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="100"><a href="">Martinique</a></button>
            <button class="bouton_selection_maison" class="bouton_selection_maison" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200"><a href="">Pyrénnées</a></button>
            <button class="bouton_selection_maison" class="bouton_selection_maison" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="300"><a href="">Gruissan</a></button>
            <button class="bouton_selection_maison" class="bouton_selection_maison" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="400"><a href="">Narbonne</a></button>
        </div>
        <div class="bouton_articles">
            <button class="bouton_selection_maison bouton_agrandie" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="500"><a href="">Tous nos Articles</a></button>
        </div>
    </div>

    <!-- Section produits -->

    <div class="espace_flexbox_produit_02">
        <?php while ($product = $select->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="espace_produit_02">
                <a class="waitBeforeNavigate" href="">
                    <img data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="500" data-aos-delay="100" src="<?= $product['photo_p']; ?>" alt="Thumbnail du produit">
                </a>
                <a class="waitBeforeNavigate" href="">
                    <h6 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="500" data-aos-delay="200"><?= $product['price_p']; ?></h6>
                </a>
                <a class="waitBeforeNavigate" href="">
                    <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="400" data-aos-delay="300"><?= $product['name_p']; ?></h5>
                </a>
                <a class="waitBeforeNavigate" href="" class="lien_achat" >Acheter →</a>
            </div>
        <?php endwhile; ?>
    </div>



    <?php
    include "includes/cursor.php";
    include("./includes/footer.php"); ?>

</main>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();


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