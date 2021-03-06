<?php
//$db = new PDO('mysql:host=localhost;dbname=hotel_db', 'root', 'root');
$db = new PDO('mysql:host=kp3dv.myd.infomaniak.com;dbname=kp3dv_murielv1', 'kp3dv_murielv1ut', 'EC_N7oIwyY9', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if (!$db) {
    echo 'Could not establish database connection, please review your settings';
}

// require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

session_start();

if (isset($_SESSION['casf_user'])) {
    $userID = $_SESSION['casf_user'];
    $sql = $db->query("SELECT * FROM users WHERE id = '$userID' ");
    $user_info = $sql->fetch(PDO::FETCH_ASSOC);
    $fn = explode(' ', $user_info['full_name']);
    @$user_info['first'] = $fn[0];
    @$user_info['last'] = $fn[1];
}

if (isset($_SESSION['error_flash'])) {
    echo '<div class="w3-black w3-center">' . $_SESSION['error_flash'] . '</div> ';
    unset($_SESSION['error_flash']);
}

if (isset($_SESSION['user_adding_error'])) {
    echo '<div class="w3-red w3-center">' . $_SESSION['user_adding_error'] . '</div> ';
    unset($_SESSION['user_adding_error']);
}

if (isset($_SESSION['logged_in'])) {
    echo '<div>' . $_SESSION['logged_in'] . '</div> ';
    unset($_SESSION['logged_in']);
}

if (isset($_SESSION['tour_success'])) {
    echo '<div class="w3-green w3-center">' . $_SESSION['tour_success'] . '</div> ';
    unset($_SESSION['tour_success']);
}

if (isset($_SESSION['room_success'])) {
    echo '<div class="w3-green w3-center">' . $_SESSION['room_success'] . '</div> ';
    unset($_SESSION['room_success']);
}

if (isset($_SESSION['add_admin'])) {
    echo '<div class="w3-green w3-center">' . $_SESSION['add_admin'] . '</div> ';
    unset($_SESSION['add_admin']);
}

if (isset($_SESSION['permission_error'])) {
    echo '<div class="w3-red w3-center">' . $_SESSION['permission_error'] . '</div> ';
    unset($_SESSION['permission_error']);
}
