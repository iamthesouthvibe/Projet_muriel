<?php
require_once 'core/core.php';
include 'includes/header.php';

$roomID = $_GET['room'];

if ($roomID == '') {
    header('Location: page-404.php');
} elseif ($roomID !== '23' && $roomID !== '24' && $roomID !== '25' && $roomID !== '26') {
    header('Location: page-404.php');
}
$select = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}' ");

$selectBlog = $db->query("SELECT * FROM tourism WHERE id_rooms = '{$roomID}' LIMIT 3")
?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<main>
    <?php while ($room = $select->fetch(PDO::FETCH_ASSOC)) :

        $shortDes = substr($room['details'], 0, 280)
    ?>
        <!-- Section accueil -->
        <div class="qhero_page_maison">
            <div class="qhero_entree_page_maison">
                <div class="div_h1_titre" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="0">
                    <h1 class="h1_titre">
                        <?= $room['room_number']; ?>
                    </h1>
                </div>
                <div class="div_h2_sous_titre" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200">
                    <h2 class="h2_sous_titre">
                        <?= $room['lieu']; ?>
                    </h2>
                </div>
                <div class="div_h3_text_presentation" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="400">
                    <h3 class="h3_titre">
                        <?= $shortDes . '...'; ?>
                    </h3>
                </div>
            </div>
            <div class="boutton_scroll">
                <svg data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="600" width="40px" viewBox="0 0 14.334 24.75" class="scroll_anim">
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
                    <p>
                        <?= $room['details']; ?>
                    </p>
                    <div class="image_gauche" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200">
                        <img src="<?= $room['photo4']; ?>" alt="Photo Maison">
                    </div>
                    <p>
                        <?= $room['details2']; ?>
                    </p>
                </div>
            </div>
            <div class="container_presentation_maison_droite">
                <div class="text-droite" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="0">
                    <p> <?= $room['details3']; ?></p>
                </div>
                <div class="image_droite" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="0">
                    <img src="<?= $room['photo7']; ?>" alt="Photo Maison">
                </div>
            </div>
        </div>

        <!-- Swiper Photos maison-->



        <!-- Swiper -->
        <div class="carousel_maison" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
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





        <!-- Swiper Activités-->
        <div class="carousel_and_map">
            <div class="carousel_maison_03" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                <div class="swiper mySwiper swiperHover">
                    <h4>Informations
                    </h4>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <p><?= $room['eq1']; ?></p>
                            <p><?= $room['eq2']; ?></p>
                            <p><?= $room['eq3']; ?></p>
                            <p><?= $room['eq4']; ?></p>
                            <p><?= $room['eq5']; ?></p>
                            <p><?= $room['eq6']; ?></p>
                            <p><?= $room['eq7']; ?></p>
                            <p><?= $room['eq8']; ?></p>
                            <p><?= $room['eq9']; ?></p>
                            <p><?= $room['eq10']; ?></p>
                            <p><?= $room['eq11']; ?></p>
                            <p><?= $room['eq12']; ?></p>
                            <p><?= $room['eq13']; ?></p>
                            <p><?= $room['eq14']; ?></p>
                        </div>
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

            <div class="mapouter" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="200" data-aos-duration="1000">

                <div class="gmap_canvas">
                    <iframe width="700px" height="799" id="gmap_canvas" src="https://maps.google.com/maps?q=<?= $room['lieu']; ?>&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://getasearch.com"></a><br>
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
        <?php if ($selectBlog != '') : ?>
            <div class="container_blog">
                <div class="titre_section_blog">
                    <h4 class="titre_section_blog_h4" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        Espace Partage
                    </h4>
                </div>
                <div class="espace_flexbox_blog">
                    <?php while ($blog = $selectBlog->fetch(PDO::FETCH_ASSOC)) : ?>
                        <div class="espace_article_blog">
                            <img src="<?= $blog['photo']; ?>" alt="Thumbnail du blog" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                            <h6 class="element_textuel_blog" data-aos="fade" data-aos-anchor-placement="top-bottom"><?= $blog['date']; ?></h6>
                            <h5 class="element_textuel_blog" data-aos="fade" data-aos-anchor-placement="top-bottom"><?= $blog['title']; ?></h5>
                            <a class="waitBeforeNavigate" class="element_textuel_blog" href="blog-unit.php?blog=<?= $blog['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom">Lire l'article →</a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="lien_page_blog" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    <a class="waitBeforeNavigate" href="blog.php">Voir tous les articles →</a>
                </div>
            </div>
        <?php endif; ?>
        <!-- Section Produits -->
        <!--

        <div class="container_produit">
            <div class="titre_section_produit">
                <h4 class="titre_section_produit_h4" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    Nos Produits
                </h4>
            </div>
            <div class="espace_flexbox_produit">
                <?php
                $select3 = $db->query("SELECT * FROM products WHERE rooms_id = '{$roomID}' LIMIT 3");
                while ($prod = $select3->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <div class="espace_produit">
                        <img src="<?= $prod['photo_p']; ?>" alt="Thumbnail du blog" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <h6 class="element_textuel_produit" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"><?= $prod['price_p']; ?></h6>
                        <h5 class="element_textuel_produit" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"><?= $prod['name_p']; ?></h5>
                        <a class="waitBeforeNavigate" class="element_textuel_produit" href="" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">Acheter →</a>
                    </div>
                <?php endwhile; ?>

            </div>
            <div class="lien_page_produit" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                <a class="waitBeforeNavigate" href="">Voir tous les produits →</a>
            </div>

        </div>
                -->
    <?php endwhile; ?>

    <!-- Ligne séparator -->

    <!-- <div class="ligne_separator" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"></div> -->

    <!-- Section Commentaires -->

    <?php
    $select2 = $db->query("SELECT * FROM comments WHERE id_rooms = '{$roomID}' ORDER BY id DESC ");
    ?>
    <div class="container_commentaire">
        <?php while ($comm = $select2->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="bloc_commentaire">
                <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">“<?= $comm["comment"] ?>”</h5>
                <div class="sous_bloc_commentaire">
                    <img src="assets/svg/5_stars.svg" alt="5 stars svg" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    <h6 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" class="infos_commentaire"><?= $comm['fullname'] . " - " . $comm['date_c']; ?></h6>
                </div>
            </div>
        <?php endwhile; ?>
    </div>



    <?php
    include "includes/cursor.php";
    include("./includes/footer.php"); ?>

</main>


<!-- Swiper JS -->
<script src="js/aos.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="js/maison.js"></script>