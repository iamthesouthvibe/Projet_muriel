<?php
require_once 'core/core.php';
include 'includes/header.php';

$id_blog = $_GET['blog'];

if ($id_blog == '') {
    header('Location: page-404.php');
}
// Requete SQL -> Selectionne tout dans la table tourism
$sql = $db->query("SELECT * FROM tourism WHERE id = {$id_blog}");

// On va chercher nos données 
$blog = $sql->fetch(PDO::FETCH_ASSOC);

function wordCutString($str, $start = 0, $words = 15)
{
    $arr = preg_split("/[\s]+/",  $str, $words + 1);
    $arr = array_slice($arr, $start, $words);
    return join(' ', $arr);
}

$test = wordCutString($blog['details'], 0, 100);

$test2 = wordCutString($blog['details'], 100, 250);


?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<main>
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
                    <?= ($blog['intro']  != '') ? $blog['intro'] : ''; ?>
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
        <div class="container_presentation_blog-unit_colonne_droite" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="700">
            <div class="texte-droite-blog-unit">
                <p>
                    <?= ($blog['details'] != '') ? $test : ''; ?>...
                </p>
            </div>
            <h4 class="texte-droite-blog-unit-citation"> <?= ($blog['citation'] != '') ? '"' . $blog['citation'] . '"' : ''; ?></h4>
            <p>
                <?= ($blog['details'] != '') ? $test2 : ''; ?>
            </p>
        </div>
    </div>


</main>

<?php
include "includes/cursor.php";
include("./includes/footer.php");
?>

<script src="js/aos.js"></script>