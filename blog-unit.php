<?php
require_once 'core/core.php';
include 'includes/header.php';

// Requete SQL -> Selectionne tout dans la table tourism
$sql = $db->query("SELECT * FROM tourism ");

// On va chercher nos données 
$blog = $sql->fetch(PDO::FETCH_ASSOC);

$shortDes1 = substr($blog['details'], 0, 280);
$shortDes2 = substr($blog['details'], 280, 600);
?>

<main>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <!-- Section accueil -->
    <div class="qhero_page_blog-unit">
        <div class="qhero_entree_page_blog-unit">
            <div class="div_h1_titre_blog-unit">
                <h1 class="h1_titre_blog-unit" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    <?= ($blog['title']  != '') ? $blog['title'] : 'Rubrique'; ?>
                </h1>
            </div>
            <div class="div_h2_date_blog-unit" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="100">
                <h2 class="h2_date_blog-unit">
                    <?= ($blog['date']  != '') ? $blog['date'] : ''; ?>
                </h2>
            </div>
            <div class="div_h3_text_presentation_blog-unit">
                <h3 class="h3_titre-blog-unit" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200">
                    <?= ($blog['details'] != '') ? $shortDes1 : ''; ?>...
                </h3>
            </div>
        </div>
    </div>

    <!-- Section presentation maison -->
    <div class="container_presentation_blog-unit">
        <div class="container_presentation_blog-unit_colonne_gauche">
            <div class="texte_gauche-blog-unit" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="500">
                <p>
                    <?= ($blog['details'] != '') ? $shortDes2 : ''; ?>...
                </p>
                <div class="image_gauche-blog-unit" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200">
                    <img src="assets/jpg/images page d'accueil/Villa-grande-Anse-Martinique02.jpg" alt="Photo Maison Gauche">
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus aliquet turpis, ut laoreet nisl imperdiet a. Sed at iaculis metus. Curabitur lobortis, neque porttitor tempus elementum, lectus tortor volutpat nisi, et consectetur tellus nunc eu turpis. Morbi rhoncus at nisi sed eleifend. Vivamus finibus nibh ipsum, et malesuada est ullamcorper nec. Phasellus pellentesque arcu at nunc tincidunt, id hendrerit arcu varius. Donec imperdiet condimentum lacus, ac maximus tortor tempus sit amet. Mauris tempor turpis ac sapien euismod feugiat. Nam at dolor a augue feugiat scelerisque non in sem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris at est lacus. Nulla hendrerit, lectus ut vestibulum imperdiet, est dolor aliquet libero, at gravida magna lectus nec metus. Nam vitae finibus ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

                    Maecenas ullamcorper condimentum gravida. Etiam efficitur ut mi at consequat. Nullam eu magna quis dui maximus vehicula. Ut semper, leo ut sagittis volutpat, leo felis suscipit risus, nec laoreet elit quam ac sapien. Donec vel purus mauris. Vivamus urna orci, porta sit amet odio eu, scelerisque posuere arcu. Donec dignissim magna vel rhoncus pulvinar.
                </p>
            </div>
        </div>
        <div class="container_presentation_blog-unit_colonne_droite" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200">
            <div class="texte-droite-blog-unit">
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus aliquet turpis, ut laoreet nisl imperdiet a. Sed at iaculis metus. Curabitur lobortis, neque porttitor tempus elementum, lectus tortor volutpat nisi, et consectetur tellus nunc eu turpis. Morbi rhoncus at nisi sed eleifend. Vivamus finibus nibh ipsum, et malesuada est ullamcorper nec. Phasellus pellentesque arcu at nunc tincidunt, id hendrerit arcu varius. Donec imperdiet condimentum lacus, ac maximus tortor tempus sit amet. Mauris tempor turpis ac sapien euismod feugiat. Nam at dolor a augue feugiat scelerisque non in sem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris at est lacus. Nulla hendrerit, lectus ut vestibulum imperdiet, est dolor aliquet libero, at gravida magna lectus nec metus. Nam vitae finibus ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

                    Maecenas ullamcorper condimentum gravida. Etiam efficitur ut mi at consequat. Nullam eu magna quis dui maximus vehicula. Ut semper, leo ut sagittis volutpat, leo felis suscipit risus, nec laoreet elit quam ac sapien. Donec vel purus mauris. Vivamus urna orci, porta sit amet odio eu, scelerisque posuere arcu. Donec dignissim magna vel rhoncus pulvinar.

                </p>
            </div>
            <div class="image_droite-blog-unit" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200">
                <img src="assets/jpg/images page d'accueil/Villa-grande-Anse-Martinique02.jpg" alt="Photo Maison Droite">
            </div>
        </div>
    </div>


</main>

<?php
include "includes/cursor.php";
include("./includes/footer.php");
?>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>