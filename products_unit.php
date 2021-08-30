<?php
require_once 'core/core.php';
include 'includes/header.php';
?>


<main>

    <!-- Section accueil -->
    <div class="qhero_page_produits_unit">
        <div class="qhero_entree_page_produits_unit">
            <div class="div_h1_titre">
                <h1 class="h1_titre">
                    Nom du produit
                </h1>
            </div>
        </div>
    </div>

    <!-- Section Présentation du produit -->

    <div class="section_presentation_produits_unit">
        <div class="image_produits_unit">
            <img src="assets/jpg/products/product_example.png" alt="">
        </div>
        <div class="infos_techniques_produits_unit">
            <h2 class="titre_produits_units">
                Titre du Produit
            </h2>
            <h5 class="prix_produits_unit">
                Prix
            </h5>
            <h3 class="texte_presentation_produits_unit">
                Je quittai à 20 ans la métropole pour la Martinique, par amour et par désir d’aventures. Avec mon compagnon, nous sommes arrivés là-bas avec nos seules valises et envies de conquérir le monde. De débrouilles en petits boulots, incertains du lendemain, nous avons finalement passé 21 ans sur cette île aux mille couleurs et
            </h3>
            <div class="menu_deroulant_taille">
                <h4>Taille</h4>
                <img src="assets/svg/Polygon 1.svg" alt="">
            </div>
            <div class="menu_deroulant_quantite">
                <h4>Quantité</h4>
                <img src="assets/svg/Polygon 1.svg" alt="">
            </div>
            <div class="bouton_acheter_produits_unit_div">
                <button class="bouton_acheter_produits_unit"><a href="">Acheter</a></button>
            </div>
        </div>
    </div>


    <?php
    include "includes/cursor.php";
    include("./includes/footer.php"); ?>

</main>