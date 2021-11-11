<?php
require_once 'core/core.php';
include 'includes/header.php';

$select = $db->query("SELECT * FROM tourism ORDER BY id desc");
?>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<main>
    <!-- Section accueil -->
    <div class="qhero_page_produits">
        <div class="qhero_entree_page_produits">
            <div class="div_h1_titre">
                <h1 class="h1_titre" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000">
                    Notre Blog
                </h1>
            </div>
            <div class="div_h3_text_presentation_produits" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000" data-aos-delay="250">
                <h3 class="h3_titre">
                    Sed rutrum vulputate dapibus. Vivamus id tincidunt eros, in suscipit quam. Praesent aliquet justo auctor urna feugiat, luctus aliquam odio pharetra. Fusce iaculis mauris sem. Donec varius urna libero, sit amet tincidunt enim laoreet ut. Donec non sem pharetra, ullamcorper nibh in, lacinia risus. Proin rutrum egestas massa, a cursus diam interdum ac.
                </h3>
            </div>
        </div>
    </div>

    <!-- Section boutons de filtre -->


    <form action="blog.php" method="post" class="section_boutons_filtre">
        <div class="boutons_maisons">
            <input type="submit" value="Martinique" name="martinique" class="bouton_selection_maison" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="100">
            <input type="submit" value="Pyrénnées" name="pyrennees" class="bouton_selection_maison" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="200">
            <input type="submit" value="Gruissan" name="gruissan" class="bouton_selection_maison" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="300">
            <input type="submit" value="Narbonne" name="narbonne" class="bouton_selection_maison" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="400">
        </div>
        <div class="bouton_articles">
            <input type="submit" value="Tous nos articles" name="all" class="bouton_selection_maison bouton_agrandie" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="500">
        </div>
    </form>


    <!-- Section produits -->


    <?php if (isset($_POST['all'])) : ?>
        <div class="espace_flexbox_produit_02">
            <?php while ($product = $select->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="espace_produit_02">
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $product['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="600">
                        <img src="<?= $product['photo']; ?>" alt="Thumbnail du produit">
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $product['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="700">
                        <h6><?= $product['title']; ?></h6>
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $product['id'] ?>" class="lien_achat" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="900">Lire l'article →</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php elseif (isset($_POST['martinique'])) :  ?>
        <?php $selectMarti = $db->query("SELECT * FROM tourism WHERE id_rooms = '23' ORDER BY id desc"); ?>
        <div class="espace_flexbox_produit_02">
            <?php while ($productMarti = $selectMarti->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="espace_produit_02">
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productMarti['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="600">
                        <img src="<?= $productMarti['photo']; ?>" alt="Thumbnail du produit">
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productMarti['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="700">
                        <h6><?= $productMarti['title']; ?></h6>
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productMarti['id'] ?>" class="lien_achat" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="900">Lire l'article →</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php elseif (isset($_POST['pyrennees'])) :  ?>
        <?php $selectPy = $db->query("SELECT * FROM tourism WHERE id_rooms = '26' ORDER BY id desc"); ?>
        <div class="espace_flexbox_produit_02">
            <?php while ($productPy = $selectPy->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="espace_produit_02">
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productPy['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="600">
                        <img src="<?= $productPy['photo']; ?>" alt="Thumbnail du produit">
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productPy['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="700">
                        <h6><?= $productPy['title']; ?></h6>
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productPy['id'] ?>" class="lien_achat" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="900">Lire l'article →</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php elseif (isset($_POST['gruissan'])) :  ?>
        <?php $selectGr = $db->query("SELECT * FROM tourism WHERE id_rooms = '24' ORDER BY id desc"); ?>
        <div class="espace_flexbox_produit_02">
            <?php while ($productGr = $selectGr->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="espace_produit_02">
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productGr['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="600">
                        <img src="<?= $productGr['photo']; ?>" alt="Thumbnail du produit">
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productGr['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="700">
                        <h6><?= $productGr['title']; ?></h6>
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productGr['id'] ?>" class="lien_achat" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="900">Lire l'article →</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php elseif (isset($_POST['narbonne'])) :  ?>
        <?php $selectNa = $db->query("SELECT * FROM tourism WHERE id_rooms = '25' ORDER BY id desc"); ?>
        <div class="espace_flexbox_produit_02">
            <?php while ($productNa = $selectNa->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="espace_produit_02">
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productNa['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="600">
                        <img src="<?= $productNa['photo']; ?>" alt="Thumbnail du produit">
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productNa['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="700">
                        <h6><?= $productNa['title']; ?></h6>
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $productNa['id'] ?>" class="lien_achat" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="900">Lire l'article →</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <div class="espace_flexbox_produit_02">
            <?php while ($product = $select->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="espace_produit_02">
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $product['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="600">
                        <img src="<?= $product['photo']; ?>" alt="Thumbnail du produit">
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $product['id'] ?>" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="700">
                        <h6><?= $product['title']; ?></h6>
                    </a>
                    <a class="waitBeforeNavigate" href="blog-unit.php?blog=<?= $product['id'] ?>" class="lien_achat" data-aos="fade" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" data-aos-delay="900">Lire l'article →</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>



</main>



<?php
include "includes/cursor.php";
include("./includes/footer.php");

?>

<script src="js/aos.js"></script>
<script src="js/blog.js"></script>