<?php
require_once 'core/core.php';
include 'includes/header.php';

$id_blog = $_GET['blog'];
// Requete SQL -> Selectionne tout dans la table tourism
$sql = $db->query("SELECT * FROM tourism WHERE id = {$id_blog}");

// On va chercher nos données 
$blog = $sql->fetch(PDO::FETCH_ASSOC);

$shortDes1 = substr($blog['details'], 0, 280);
$shortDes2 = substr($blog['details'], 0, 600);
$shortDes3 = substr($blog['details'], 600, 5000);
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
                <div class="image_gauche-blog-unit" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200">
                    <img src="<?= $blog['photo']; ?>" alt="Photo Maison Gauche">
                </div>
                <div class="image_gauche-blog-unit" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200">
                    <img src="<?= $blog['photo_2']; ?>" alt="Photo Maison Gauche">
                </div>
            </div>
        </div>
        <div class="container_presentation_blog-unit_colonne_droite" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200">
            <div class="texte-droite-blog-unit">
                <p>
                    <?= ($blog['details'] != '') ? $shortDes2 : ''; ?>...
                </p>
            </div>
            <h4 class="texte-droite-blog-unit-citation"> <?= ($blog['citation'] != '') ? '"' . $blog['citation'] . '"' : ''; ?></h4>
            <p>
                <?= ($blog['details'] != '') ? $shortDes3 : ''; ?>
            </p>
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