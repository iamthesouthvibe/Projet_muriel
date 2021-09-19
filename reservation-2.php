<?php
require_once 'core/core.php';
include 'includes/header.php';

$roomID = $_GET['maison'];
$select = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}' ");

echo($roomID);
?>

