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

$selectBlog = $db->query("SELECT * FROM tourism WHERE id_rooms = '{$roomID}' LIMIT 2")
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
                    <p> <?= $room['details3']; ?></p>
                </div>
            </div>
            <div class="container_presentation_maison_droite">
                <div class="text-droite" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="0">
                    <p><?= $room['details2']; ?></p>
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
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo2']; ?>" alt="" srcset="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo3']; ?>" alt="" srcset="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo4']; ?>" alt="" srcset="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo5']; ?>" alt="" srcset="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo6']; ?>" alt="" srcset="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo7']; ?>" alt="" srcset="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo8']; ?>" alt="" srcset="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo9']; ?>" alt="" srcset="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo10']; ?>" alt="" srcset="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= $room['photo11']; ?>" alt="" srcset="">
                    </div>
                    <?php if (!empty($room['photo12'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo12']; ?>" alt="" srcset="">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo13'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo13']; ?>" alt="" srcset="">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo14'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo14']; ?>" alt="" srcset="">
                        </div>
                    <?php endif ?>
                    <?php if (!empty($room['photo15'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo15']; ?>" alt="" srcset="">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo16'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo16']; ?>" alt="" srcset="">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo17'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo17']; ?>" alt="" srcset="">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo18'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo18']; ?>" alt="" srcset="">
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
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo21'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo21']; ?>" alt="" srcset="">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo22'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo22']; ?>" alt="" srcset="">
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($room['photo23'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo23']; ?>" alt="" srcset="">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($room['photo24'])) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $room['photo24']; ?>" alt="" srcset="">
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
            <div class="infos-techniques-maison" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                <h4>Informations</h4>
                <div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/people1.svg"> </img>
                        <p><?= $room['eq1']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/CHAMBRES.svg"> </img>
                        <p><?= $room['eq2']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/SALLE_DE_BAIN.svg"> </img>
                        <p><?= $room['eq3']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/TERRASSE.svg"> </img>
                        <p><?= $room['eq4']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/PISCINE.svg"> </img>
                        <p><?= $room['eq5']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/CARBET.svg"> </img>
                        <p><?= $room['eq6']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/PARKING2.svg"> </img>
                        <p><?= $room['eq7']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/GARDEN.svg"> </img>
                        <p><?= $room['eq8']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/BARBECUE.svg"> </img>
                        <p><?= $room['eq9']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/KITCHEN.svg"> </img>
                        <p><?= $room['eq10']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/WIFI.svg"> </img>
                        <p><?= $room['eq11']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/CLIMATISEUR.svg"> </img>
                        <p><?= $room['eq12']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/TOILETS.svg"> </img>
                        <p><?= $room['eq13']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/SALON.svg"> </img>
                        <p><?= $room['eq14']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/BUANDERIE.svg"> </img>
                        <p><?= $room['eq15']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/CENTRE-VILLE.svg"> </img>
                        <p><?= $room['eq16']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/CHEMINEE.svg"> </img>
                        <p><?= $room['eq17']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/ENTRY.svg"> </img>
                        <p><?= $room['eq18']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/RANGEMENT_SKIS.svg"> </img>
                        <p><?= $room['eq19']; ?></p>
                    </div>
                    <div class="set-icon-text">
                        <img src="assets/svg/ICONS_TECHNIQUE_MAISON/PISTES-SKI.svg"> </img>
                        <p><?= $room['eq20']; ?></p>
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