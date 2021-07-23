<?php
require_once 'core/core.php';
include 'includes/header.php';

?>

<div class="page_contact">

    <div class="bloc1">
            <ul>
                <li>
                <a href="">muriel.coutellier67@gmail.com </a> 
                </li>
                <li>
                <a href="">Instagram</a> 
                </li>
                <li>
                <a href="">+33777240109</a>
                </li>
            </ul>
    </div>
    <div class="bloc2">
            <a href="">Prise <br>
            de contact</a>
    </div>

</div>

<script>
    document.body.style.backgroundColor="#9A4747";

    let bouton = document.querySelector(".bouton_desktop");
    bouton.style.backgroundColor="#FCF7EC";

    let boutonText= document.querySelector(".bouton_desktop a");
    boutonText.style.color="#9A4747";

    document.body.style.overflow="hidden";
 
    let width = document.body.clientWidth;
    let boutonResp = document.querySelector(".bouton_responsive");
    if (width<450) {
        boutonResp.style.display = "none";
    }

    let 
</script>