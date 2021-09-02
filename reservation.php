<?php
require_once 'core/core.php';
include 'includes/header.php';

?>

<main>

    <div class="page_reservation">
        <nav class="nav_menu_deroulant_reservation">
            <ul class="ul_menu_deroulant_reservation">
                <li class="menu_deroulant_taille_reservation"><a href="#">Votre Maison &ensp; &ensp; &ensp; &ensp; &ensp;</a>
                    <ul class="sous_reservation">
                        <li class="reglage-margin-top-menu-deroulant"><a href="#">Villa Grand Large - Martinique </a></li>
                        <li><a href="#">La Maison Roma - Narbonne</a></li>
                        <li><a href="#">Le Grain de Sable - Gruissan</a></li>
                        <li><a href="#">Maison Chacun son Rêve - Pyrénées</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="bouton_verifier_dispo_div">
            <button class="bouton_verifier_dispo"><a href="">Vérifier la disponibilité</a></button>
        </div>

    </div>


</main>

<script>
    document.body.style.backgroundColor = "#9A4747";

    let bouton = document.querySelector(".bouton_desktop");
    bouton.style.display = "none";
</script>