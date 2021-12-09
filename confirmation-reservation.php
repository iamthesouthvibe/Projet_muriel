<?php
require_once 'core/core.php';
include 'includes/header.php';

$resaID = $_GET['id'];

$sql2 = $db->query("SELECT *
FROM reservations
INNER JOIN rooms
WHERE reservations.id_rooms = rooms.id AND reservations.id = '{$resaID}'");

$reservation = $sql2->fetch(PDO::FETCH_ASSOC);

// Creating timestamp from given date
$timestamp = strtotime($reservation['checkin']);
// Creating new date format from that timestamp
$new_checkin = date("d-m-Y", $timestamp);


// Creating timestamp from given date
$timestamp2 = strtotime($reservation['checkout']);
// Creating new date format from that timestamp
$new_checkout = date("d-m-Y", $timestamp2);

ini_set("display_errors", 1);
date_default_timezone_set('Europe/Paris');
$date_debut = strtotime($reservation['checkin']);
$date_fin = strtotime($reservation['checkout']); ?>
<div class="qhero_page_confirmation">
    <h1 class="style_h1_confirmation">Demande <br>envoyée !</h1>
    <h2 class="style_h2_confirmation">Je reviens vers vous sous 3 jours par retour de mail. <br> Un mail de confirmation récapitulatif vous a été envoyé, vérifiez vos spams si besoin.</h2>
</div>
<div class="section_prix-total">
    <h4>Prix Total environ</h4>
    <h5><?= $reservation['price']; ?>€</h5>
</div>
<div class="section_recapitulatif">
    <h3 class="style_h3_confirmation_reservation">Récapitulatif</h3>

    <p class="style_texte_recapitulatif"><?= $reservation['room_number'] ?> <br>
        <?= $new_checkin ?> au <?= $new_checkout ?> <br>
        <?= $reservation['people'] ?> Personnes <br>
        <?= $reservation['name'] ?> <br>
        <?= $reservation['email'] ?> <br>
        <?= $reservation['commentaire'] ?>
    </p> <br>
</div>

<script src="js/confirmation-reservation.js"></script>