<?php
require_once 'core/core.php';
include 'includes/header.php';

?>

<main>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <div class="page_contact">

    
        <div class="bloc1">
                <h1>
                    <a href="mailto:muriel.coutellier67@gmail.com?subject=Prise de contact" class="bloc1_lien_first_child" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">muriel.coutellier67@gmail.com</a> <br>
                    </h1>
                    <h1>
                    <a href="https://www.instagram.com/" target="_blank" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="200" data-aos-duration="2000" >Instagram</a> <br>
                    </h1>
                    <h1>
                    <a href="tel:+33777240109" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-delay="300" data-aos-duration="2000">+33777240109</a>
                    </h1>
        </div>
        <div class="bloc2" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="3000" data-aos-delay="400">
                <a href="mailto:muriel.coutellier67@gmail.com"> Prise <br>
                 de contact <span></a>
        </div>
    </div>
</main>

<script>
    document.body.style.backgroundColor="#9A4747";

    let bouton = document.querySelector(".bouton_desktop");
    bouton.style.backgroundColor="#FCF7EC";

    let boutonText= document.querySelector(".bouton_desktop a");
    boutonText.style.color="#9A4747";

    document.body.style.overflow="hidden";

    
    let bloc1lien = document.querySelector(".bloc1_lien_first_child")
    let width = document.body.clientWidth;
    let boutonResp = document.querySelector(".bouton_responsive");
    if (width<450) {
        boutonResp.style.display = "none";
        bloc1lien.innerHTML="Email"
    }  
</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

