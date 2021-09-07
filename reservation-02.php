<?php
require_once 'core/core.php';
include 'includes/header.php';

?>

<main>


    <div id="bouton_envoyer_demande_div">
        <button class="bouton_envoyer_demande"><p>Demande de Réservation</p></button>
    </div>
    <div class="lds-ellipsis" id="loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="bouton_confirmation_demande_div">
        <button class="bouton_confirmation_demande" id="confirmation_demande"><a href="">Demande envoyée !</a>
            <p>Nous revenons vers vous au plus vite</p>
        </button>

    </div>

</main>

<script>
    document.body.style.backgroundColor = "#9A4747";

    let bouton = document.querySelector(".bouton_desktop");
    bouton.style.display = "none";


    document.getElementById("bouton_envoyer_demande_div").onclick = function() {
        fun()
    };

    function fun() {
        document.getElementById("bouton_envoyer_demande_div").style.display = "none";
        document.getElementById("loader").style.display = "inline-block";
        
    }

    const apparition_timer = document.getElementById('confirmation_demande');
    const bouton_envoyer_demande_div = document.getElementById('bouton_envoyer_demande_div');
    apparition_timer.style.display = 'none';
    if (bouton_envoyer_demande_div.clicked == true) {
        setTimeout(() => {
            apparition_timer.style.display = 'block';
      }, 6000);
    } else {
        apparition_timer.style.display = 'none';
    }
</script>