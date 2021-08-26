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
                <img src="assets/jpg/products/product_example.png" alt="Thumbnail du produit">
                <h6 class="element_textuel_produit_02">Prix du Produit</h6>
                <h5 class="element_textuel_produit_02">Titre du Produit</h5>
                <a class="element_textuel_produit_02" href="">Acheter →</a>
            </div>
            <div class="espace_produit espace_produit_02">
                <img src="assets/jpg/products/product_example.png" alt="Thumbnail du produit">
                <h6>Prix du Produit</h6>
                <h5>Titre du Produit</h5>
                <a href="">Acheter →</a>
            </div>
            <div class="espace_produit_02 espace_produit_02">
                <img src="assets/jpg/products/product_example.png" alt="Thumbnail du produit">
                <h6>Prix du Produit</h6>
                <h5>Titre du Produit</h5>
                <a href="">Acheter →</a>
            </div>
        </div>



    <?php
    include "includes/cursor.php";
    include("./includes/footer.php"); ?>

</main> 