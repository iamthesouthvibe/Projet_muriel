<?php
require_once 'core/core.php';
include 'includes/header.php';
?>

<main>

    <!-- Section accueil -->
    <div class="qhero_page_produits">
        <div class="qhero_entree_page_produits">
            <div class="div_h1_titre">
                <h1 class="h1_titre">
                    Nos Articles
                </h1>
            </div>
            <div class="div_h3_text_presentation_produits">
                <h3 class="h3_titre">
                    Sed rutrum vulputate dapibus. Vivamus id tincidunt eros, in suscipit quam. Praesent aliquet justo auctor urna feugiat, luctus aliquam odio pharetra. Fusce iaculis mauris sem. Donec varius urna libero, sit amet tincidunt enim laoreet ut. Donec non sem pharetra, ullamcorper nibh in, lacinia risus. Proin rutrum egestas massa, a cursus diam interdum ac.
                </h3>
            </div>
        </div>
    </div>

    <!-- Section boutons de filtre -->

    <div class="section_boutons_filtre">
        <div class="boutons_maisons">
            <button class="bouton_selection_maison"><a href="">Martinique</a></button>
            <button class="bouton_selection_maison"><a href="">Pyrénnées</a></button>
            <button class="bouton_selection_maison"><a href="">Gruissan</a></button>
            <button class="bouton_selection_maison"><a href="">Narbonne</a></button>
        </div>
        <div class="bouton_articles">
            <button class="bouton_selection_maison bouton_agrandie"><a href="">Tous nos Articles</a></button>
        </div>
    </div>

    <!-- Section produits -->

    <div class="espace_flexbox_produit_02">
        <div class="espace_produit_02">
            <a href="">
                <img src="assets/jpg/products/product_example.png" alt="Thumbnail du produit">
            </a>
            <a href="">
                <h6>Prix du Produit</h6>
            </a>
            <a href="">
                <h5>Titre du Produit</h5>
            </a>
            <a href="" class="lien_achat">Acheter →</a>
        </div>
        <div class="espace_produit_02">
            <a href="">
                <img src="assets/jpg/products/product_example.png" alt="Thumbnail du produit">
            </a>
            <a href="">
                <h6>Prix du Produit</h6>
            </a>
            <a href="">
                <h5>Titre du Produit</h5>
            </a>
            <a href="" class="lien_achat">Acheter →</a>
        </div>
        <div class="espace_produit_02">
            <a href="">
                <img src="assets/jpg/products/product_example.png" alt="Thumbnail du produit">
            </a>
            <a href="">
                <h6>Prix du Produit</h6>
            </a>
            <a href="">
                <h5>Titre du Produit</h5>
            </a>
            <a href="" class="lien_achat">Acheter →</a>
        </div>
    </div>



    <?php
    include "includes/cursor.php";
    include("./includes/footer.php"); ?>

    <script>
        let bouton = document.querySelector(".bouton_selection_maison");
        let boutonLink = document.querySelector(".bouton_selection_maison a");
        bouton.addEventListener("mouseenter", function(){
            bouton.style.backgroundColor="#9A4747";
            boutonLink.style.color="#9A4747";
        })
    </script>

</main>