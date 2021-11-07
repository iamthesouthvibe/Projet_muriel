<?php
require_once 'core/core.php';
include 'includes/header.php';

$resaID = $_GET['id'];

$sql2 = $db->query("SELECT *
FROM reservations
INNER JOIN rooms
WHERE reservations.id_rooms = rooms.id AND reservations.id = '{$resaID}'");

$reservation = $sql2->fetch(PDO::FETCH_ASSOC);


ini_set("display_errors", 1);
date_default_timezone_set('Europe/Paris');
$date_debut = strtotime($reservation['checkin']);
$date_fin = strtotime($reservation['checkout']);
$nbJour = round(($date_fin - $date_debut) / 60 / 60 / 24, 0);


?>
<div class="qhero_page_confirmation">
    <h1 class="style_h1_confirmation">Réservation <br>envoyée !</h1>
    <h2 class="style_h2_confirmation">Je reviens vers vous sous 3 jours par retour de mail pour confirmation et signature du contrat.</h2>
</div>
<div class="section_recapitulatif">
    <h3 class="style_h3_confirmation_reservation">Récapitulatif</h3>

    <p class="style_texte_recapitulatif"><?= $reservation['room_number'] ?> <br>
        <?= $reservation['checkin'] ?> - <?= $reservation['checkout'] ?> <br>
        <?= $reservation['people'] ?> Adultes <br>
        <?= $reservation['children'] ?> Enfants <br>
        <?= $reservation['name'] ?> <br>
        <?= $reservation['address'] ?> <?= $reservation['zip'] ?> Gaillard <br>
        <?= $reservation['email'] ?> <br>
        <?= $reservation['phone'] ?> <br>
        <?= $reservation['commentaire'] ?>
    </p> <br>
</div>
<div class="section_prix-total">
    <h4>Prix Total</h4>
    <h5><?= $nbJour * $reservation['price']; ?>€</h5>

</div>








<script>
    document.getElementById('bouton_responsive').style.display = 'none';
    document.getElementById('bouton_desktop').style.display = 'none';
</script>