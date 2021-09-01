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
            <nav class="nav_menu_deroulant">
                <ul class="ul_menu_deroulant">
                    <li class="menu_deroulant_taille"><a href="#">Taille &ensp; &ensp; &ensp; &ensp; &ensp;</a>
                        <ul class="sous">
                            <li><a href="#">Small</a></li>
                            <li><a href="#">Medium</a></li>
                            <li><a href="#">Large</a></li>
                        </ul>
                    </li>
                    <li class="menu_deroulant_quantite"><a href="#">Quantité &ensp; &ensp; &ensp; &ensp; &ensp;</a>
                        <ul class="sous">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">9</a></li>
                            <li><a href="#">10</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="bouton_acheter_produits_unit_div">
                <button class="bouton_acheter_produits_unit"><a href="">Acheter</a></button>
            </div>
        </div>
    </div>


    <?php
    include "includes/cursor.php";
    include("./includes/footer.php"); ?>

</main>