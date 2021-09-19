<?php
require_once 'core/core.php';
include 'includes/header.php';

$roomID = $_GET['maison'];
$select = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}' ");
$maison = mysqli_fetch_assoc($select);
?>

<style>
    .qhero_page_reservation_2 {
        position: absolute;
        left: 50%;
        -ms-transform: translateX(-50%);
        -webkit-transform: translate(-50%, 0%);
        transform: translate(-50%, 0%);
        display: block;
        margin-top: 10vh;
    }

    .qhero_page_reservation_2 h1 {
        text-align: center;
    }

    .qhero_page_reservation_2 .col {
        display: flex;
        gap: 100px;
    }

    .qhero_page_reservation_2 .row {
        margin-bottom: 50px;
    }

    .qhero_page_reservation_2 .row .input_row {
        display: flex;
    }
</style>

<div class="qhero_page_reservation_2">
    <h1>Votre maison : <?= $maison['shortName']; ?></h1>
    <form action="reservation-2.php?room=<?= $roomID ?>" method="POST">
        <div class="row">
            <div class="col">
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Check-in date:</label>
                        <input type="date" class="form-control" name="in_date">
                    </div>
                    <br>
                    <div class="input_row">
                        <label class="form-control-label">Check-out date:</label>
                        <input type="date" class="form-control" name="out_date">
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">People:</label>
                        <input type="number" class="form-control" max="5" name="people">
                        <br>
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">child:</label>
                        <input type="number" class="form-control" max="5" name="people">
                    </div>
                </div>
                <div>
                    <label for="">Commentaire additionel</label>
                    <textarea name="" id="" cols="30" rows="5"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Check-in date:</label>
                        <input type="date" class="form-control" name="in_date">
                    </div>
                    <br>
                    <div class="input_row">
                        <label class="form-control-label">Check-out date:</label>
                        <input type="date" class="form-control" name="out_date">
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">People:</label>
                        <input type="number" class="form-control" max="5" name="people">
                        <br>
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">child:</label>
                        <input type="number" class="form-control" max="5" name="people">
                    </div>
                </div>
                <div>
                    <label for="">Commentaire additionel</label>
                    <textarea name="" id="" cols="30" rows="5"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>