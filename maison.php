<?php
require_once 'core/core.php';
include 'includes/header.php';

$roomID = $_GET['room'];
$select = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}' ");
?>


<main>
    <?php while ($room = $select->fetch(PDO::FETCH_ASSOC)) :

        $shortDes = substr($room['details'], 0, 280)
    ?>
        <!-- Section accueil -->
        <div class="qhero_page_maison">
            <div class="qhero_entree_page_maison">
                <div class="div_h1_titre">
                    <h1 class="h1_titre">
                        <?= $room['room_number']; ?>
                    </h1>
                </div>
                <div class="div_h2_sous_titre">
                    <h2 class="h2_sous_titre">
                        <?= $room['lieu']; ?>
                    </h2>
                </div>
                <div class="div_h3_text_presentation">
                    <h3 class="h3_titre">
                        <?= $shortDes . '...'; ?>
                    </h3>
                </div>
            </div>
            <div class="boutton_scroll">
                <svg width="40px" viewBox="0 0 14.334 24.75" class="scroll_anim">
                    <circle class="circle-1" fill="black" cx="7.167" cy="6" r="1.2" />
                    <circle class="circle-2" fill="black" cx="7.167" cy="6" r="1.2" />
                    <path stroke="black" fill="transparent" stroke-width="0.5" d="M7.167,0.5C3.485,0.5,0.5,3.485,0.5,7.167v10.416                   c0,3.682,2.985,6.667,6.667,6.667s6.667-2.985,6.667-6.667V7.167C13.834,3.485,10.849,0.5,7.167,0.5z" />
                </svg>
            </div>
        </div>

        <!-- Section presentation maison -->
        <div class="container_presentation_maison">
            <div class="container_presentation_maison_gauche">
                <div class="text_gauche">
                    <?php
                    $shortDescription2 = substr($room['details'], 0, 250);
                    $shortDescription3 = substr($room['details'], 251, 500);
                    $shortDescription4 = substr($room['details'], 501, -1);
                    ?>
                    <p>
                        <?= $room['details']; ?>
                    </p>
                    <div class="image_gauche">
                        <img src="<?= $room['photo4']; ?>" alt="Photo Maison">
                    </div>
                    <p>
                        <?= $room['details2']; ?>
                    </p>
                </div>
            </div>
            <div class="container_presentation_maison_droite">
                <div class="text-droite">
                    <p> <?= $room['details3']; ?></p>
                </div>
                <div class="image_droite">
                    <img src="<?= $room['photo7']; ?>" alt="Photo Maison">
                </div>
            </div>
        </div>

        <!-- Swiper Photos maison-->

        <!-- Swiper -->
        <div class="carousel_maison">
            <div class="swiper mySwiper swiperHover">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?= $room['photo']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des']; ?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo2']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des2']; ?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo3']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des3']; ?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo4']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des4']; ?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo5']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des5']; ?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo6']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des6']; ?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo7']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des7']; ?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo8']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des8']; ?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo9']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des9']; ?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo10']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des10']; ?></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo11']; ?>" alt="" srcset="">
                        <div class="swiper-slide-titre">
                            <p><?= $room['photo_des11']; ?></p>
                        </div>
                    </div>
                    <?php if (!empty($room['photo12'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo12']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des12']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo13'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo13']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des13']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo14'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo14']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des14']; ?></p>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if (!empty($room['photo15'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo15']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des15']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo16'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo16']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des16']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo17'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo17']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des17']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo18'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo18']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des18']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo19'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo19']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des19']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo20'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo20']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des20']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo21'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo21']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des21']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo22'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo22']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des22']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($room['photo23'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo23']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des23']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo24'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo24']; ?>" alt="" srcset="">
                            <div class="swiper-slide-titre">
                                <p><?= $room['photo_des24']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
        </div>




        <!-- Swiper Infos techniques maison-->

        <div class="carousel_maison_02">
            <div class="swiper mySwiper swiperHover">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="vide_flexBox">
                            <p></p>
                        </div>
                        <div class="bloc_text_slider">
                            <p><?= $room['eq1']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq2']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq3']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq4']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq5']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq6']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq7']; ?></p>
                        </div>
                        <div class="vide_flexBox">
                            <p></p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="vide_flexBox">
                            <p></p>
                        </div>
                        <div class="bloc_text_slider">
                            <p><?= $room['eq8']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq9']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq10']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq11']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq12']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq13']; ?></p>
                        </div>
                        <div class="separator">
                            <p></p>
                        </div>
                        <div>
                            <p><?= $room['eq14']; ?></p>
                        </div>
                        <div class="vide_flexBox">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        <!-- Swiper Activités-->
        <div class="carousel_and_map">
            <div class="carousel_maison_03">
                <div class="swiper mySwiper swiperHover">
                    <h4>Activités <div class="swiper-button-next"></div>
                    </h4>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <p><?= $room['act1']; ?></p>
                            <p><?= $room['act2']; ?></p>
                            <p><?= $room['act3']; ?></p>
                            <p><?= $room['act4']; ?></p>
                            <p><?= $room['act5']; ?></p>
                            <p><?= $room['act6']; ?></p>
                            <p><?= $room['act7']; ?></p>
                            <p><?= $room['act8']; ?></p>
                            <p><?= $room['act9']; ?></p>
                            <p><?= $room['act10']; ?></p>
                            <p><?= $room['act11']; ?></p>
                            <p><?= $room['act12']; ?></p>
                            <p><?= $room['act13']; ?></p>
                            <p><?= $room['act14']; ?></p>
                            <p><?= $room['act15']; ?></p>
                            <p><?= $room['act16']; ?></p>
                            <p><?= $room['act17']; ?></p>
                        </div>
                        <div class="swiper-slide">
                            <p><?= $room['inte1']; ?></p>
                            <p><?= $room['inte2']; ?></p>
                            <p><?= $room['inte3']; ?></p>
                            <p><?= $room['inte4']; ?></p>
                            <p><?= $room['inte5']; ?></p>
                            <p><?= $room['inte6']; ?></p>
                            <p><?= $room['inte7']; ?></p>
                            <p><?= $room['inte8']; ?></p>
                            <p><?= $room['inte9']; ?></p>
                            <p><?= $room['inte10']; ?></p>
                            <p><?= $room['inte11']; ?></p>
                        </div>
                        <div class="swiper-slide">
                            <p><?= $room['dist1']; ?></p>
                            <p><?= $room['dist2']; ?></p>
                            <p><?= $room['dist3']; ?></p>
                            <p><?= $room['dist4']; ?></p>
                            <p><?= $room['dist5']; ?></p>
                            <p><?= $room['dist6']; ?></p>
                            <p><?= $room['dist7']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="700px" height="799" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://getasearch.com"></a><br>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 659px;
                            width: 700px;
                        }
                    </style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;

                            width: 100%;

                            padding-bottom: 56.25%;

                            position: relative;

                            height: 200px;
                        }

                        .gmap_canvas iframe {
                            left: 0;

                            top: 0;

                            height: 100%;

                            width: 100%;

                            position: absolute;
                        }

                        .carousel_maison img {
                            filter: none;
                        }

                        @media screen and (max-width: 450px) {
                            .mapouter {
                                height: 400px;
                            }
                        }
                    </style>
                </div>
            </div>


        </div>



        <!-- Section articles blog -->

        <div class="container_blog">
            <div class="titre_section_blog">
                <h4 class="titre_section_blog_h4">
                    Espace Partage
                </h4>
            </div>
            <div class="espace_flexbox_blog">
                <div class="espace_article_blog">
                    <img src="assets/jpg/maison_photo_01.jpg" alt="Thumbnail du blog">
                    <h6 class="element_textuel_blog">Date de l'article</h6>
                    <h5 class="element_textuel_blog">Titre de l'article</h5>
                    <a class="element_textuel_blog" href="">Lire l'article →</a>
                </div>
                <div class="espace_article_blog espace_article_blog_02">
                    <img src="assets/jpg/maison_photo_01.jpg" alt="Thumbnail du blog">
                    <h6>Date de l'article</h6>
                    <h5>Titre de l'article</h5>
                    <a href="">Lire l'article →</a>
                </div>
                <div class="espace_article_blog espace_article_blog_02">
                    <img src="assets/jpg/maison_photo_01.jpg" alt="Thumbnail du blog">
                    <h6>Date de l'article</h6>
                    <h5>Titre de l'article</h5>
                    <a href="">Lire l'article →</a>
                </div>
            </div>
            <div class="lien_page_blog">
                <a href="">Voir tous les articles →</a>
            </div>
        </div>
        <!-- Section Produits -->

        <div class="container_produit">
            <div class="titre_section_produit">
                <h4 class="titre_section_produit_h4">
                    Nos Produits
                </h4>
            </div>
            <div class="espace_flexbox_produit">
                <?php
                $select3 = $db->query("SELECT * FROM products WHERE rooms_id = '{$roomID}' LIMIT 3");
                while ($prod = $select3->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <div class="espace_produit">
                        <img src="<?= $prod['photo_p']; ?>" alt="Thumbnail du blog">
                        <h6 class="element_textuel_produit"><?= $prod['price_p']; ?></h6>
                        <h5 class="element_textuel_produit"><?= $prod['name_p']; ?></h5>
                        <a class="element_textuel_produit" href="">Acheter →</a>
                    </div>
                <?php endwhile; ?>

            </div>
            <div class="lien_page_produit">
                <a href="">Voir tous les produits →</a>
            </div>

        </div>
    <?php endwhile; ?>

    <!-- Ligne séparator -->

    <div class="ligne_separator"></div>

    <!-- Section Commentaires -->

    <?php
    $select2 = $db->query("SELECT * FROM comments WHERE id_rooms = '{$roomID}' ORDER BY id DESC ");
    ?>
    <div class="container_commentaire">
        <?php while ($comm = $select2->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="bloc_commentaire">
                <h5>“<?= $comm["comment"] ?>”</h5>
                <div class="sous_bloc_commentaire">
                    <img src="assets/svg/5_stars.svg" alt="5 stars svg">
                    <h6 class="infos_commentaire"><?= $comm['fullname'] . " - " . $comm['date_c']; ?></h6>
                </div>
            </div>
        <?php endwhile; ?>
    </div>



    <?php
    include "includes/cursor.php";
    include("./includes/footer.php"); ?>

</main>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        resizeObserver: false,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        }
    });

    let swiperHoverRight = document.querySelector('.swiperHover .swiper-button-next ')

    swiperHoverRight.addEventListener('mouseenter', function(e) {
        cursor.classList.add('cursor_active_right_maison');
        cursor2.classList.add('cursor2_active_right');
    })

    swiperHoverRight.addEventListener('mouseleave', function(e) {
        cursor.classList.remove('cursor_active_right_maison');
        cursor2.classList.remove('cursor2_active_right');
    })



    let swiperHoverLeft = document.querySelector('.swiperHover .swiper-button-prev ')

    swiperHoverLeft.addEventListener('mouseenter', function(e) {
        cursor.classList.add('cursor_active_left_maison');
        cursor2.classList.add('cursor2_active_left');
    })

    swiperHoverLeft.addEventListener('mouseleave', function(e) {
        cursor.classList.remove('cursor_active_left_maison');
        cursor2.classList.remove('cursor2_active_left');
    })


    let pagination = document.querySelectorAll('.swiper-pagination-bullet');

    for (let i = 0; i < pagination.length; i++) {
        pagination[i].style.backgroundColor = "white";
    }

    let swiperButtonNext = document.querySelector('.swiper-button-next')
    swiperButtonNext.style.width = "50%";

    let swiperButtonPrev = document.querySelector('.swiper-button-prev')
    swiperButtonPrev.style.width = "50%";

    let swiperContainerHeight = document.querySelector('.swiper-container')
    swiperContainerHeight.style.height = "90vh";



    var swiper2 = new Swiper(".carousel_maison_02 .mySwiper", {
        loop: true,
        resizeObserver: false,
        watchOverflow: false,
        pagination: {
            el: ".swiper-pagination",
        }
    });

    var swiper3 = new Swiper(".carousel_maison_03 .mySwiper", {
        loop: true,
        resizeObserver: false,
        watchOverflow: false,
        navigation: {
            nextEl: ".swiper-button-next",
        },
    });
</script>