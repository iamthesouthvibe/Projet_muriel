<?php
require_once 'core/core.php';
include 'includes/header.php';

?>

<div class="page-404" id="testFade">
    <div class="div_2_page-404">
        <div class="div_titre_404">
            <h1 class="h1_titre_404">
                404
            </h1>
        </div>
        <div class="div_text_404">
            <h2 class="h2_text_404">
                Page non trouvée
            </h2>
        </div>
    </div>
        <div class="div_bouton_retour_home">
        <button class="bouton_retour_home"><a href="index.php">Retour à l'Accueil</a></button>
        </div>  
</div>

<script>
    document.body.style.backgroundColor="#9A4747";

    let bouton = document.querySelector(".bouton_desktop");
    bouton.style.display="none";

    let boutonText= document.querySelector(".bouton_desktop a");
    boutonText.style.display="none";

    document.body.style.overflow="hidden";
</script>