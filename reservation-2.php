<?php
require_once 'core/core.php';
include 'includes/header.php';

$roomID = $_GET['maison'];
$select = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}' ");
$maison = mysqli_fetch_assoc($select);
?>

<style>
    .header_right button {
        display: none;
    }

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
        margin-bottom: 50px;
        color: #9A4747;
        font-family: ITCGaramondStd-BkNarrow;
    }

    .qhero_page_reservation_2 h1 span {
        font-family: NeueMontreal-Bold;
    }

    .qhero_page_reservation_2 .col {
        display: flex;
        gap: 120px;
    }

    .qhero_page_reservation_2 .row {
        margin-bottom: 50px;
    }

    .qhero_page_reservation_2 .row .input_row {
        display: flex;
        margin-bottom: 20px;
    }

    .qhero_page_reservation_2 .row .input_row label {
        color: #9A4747;
        font-family: ITCGaramondStd-BkNarrow;
        margin-right: 15px;
    }

    .qhero_page_reservation_2 .row .input_row input {
        border: none;
        border-bottom: solid 1px #9A4747;
        background-color: #FCF7EC;
        color: #9A4747;
    }

    input[type="text" i],
    input[type="date" i],
    input[type="mail" i],
    input[type="tel" i],
    input[type="number" i] {
    padding: 1px 2px;
    font-size: 18px;
    font-family: NeueMontreal-Bold;
}

.qhero_page_reservation_2 .col_price {
    text-align: center;
}

.qhero_page_reservation_2 .col_price h3 {
    color: #9A4747;
    font-family: ITCGaramondStd-BkNarrow;
    margin: 0;
}

.qhero_page_reservation_2 .col_price h4 {
    color: #9A4747;
    margin: 0;
    font-size: 18px;
    font-family: NeueMontreal-Bold;
}

.qhero_page_reservation_2 .col_price .submit {
    width: 300px;
        height: 35px;
        background: #9A4747;
        border-radius: 40px;
        border: none;
        font-size: 23px;
        color: #FCF7EC;
        text-decoration: none;
}
</style>

<div class="qhero_page_reservation_2">
    <h1>Votre maison : <span> <?= $maison['shortName']; ?></span></h1>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Check-in</label>
                        <input type="date" class="form-control" name="in_date">
                    </div>
               
                    <div class="input_row">
                        <label class="form-control-label">Check-out</label>
                        <input type="date" class="form-control" name="out_date">
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">People</label>
                        <input type="number" class="form-control" max="5" name="people">
                    
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">child</label>
                        <input type="number" class="form-control" max="5" name="people">
                    </div>
                </div>
                <div class="input_row">
                    <label for="">Commentaire additionel</label>
                    <textarea name="" id="" cols="30" rows="5"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Nom</label>
                        <input type="text" class="form-control" name="in_date">
                    </div>
                 
                    <div class="input_row">
                        <label class="form-control-label">Adresse</label>
                        <input type="text" class="form-control" name="out_date">
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Pays</label>
                        <input type="text" class="form-control" max="5" name="people">
              
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">Code postal</label>
                        <input type="number" class="form-control" max="5" name="people">
                    </div>
                </div>
                <div>
                    <div class="input_row">
                        <label class="form-control-label">Email</label>
                        <input type="mail" class="form-control" max="5" name="people">
                      
                    </div>
                    <div class="input_row">
                        <label class="form-control-label">Telephone</label>
                        <input type="tel" class="form-control" max="5" name="people">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col_price">
                <h3>Prix total : </h3>
                <h4>450$</h4>
            </div>
        </div>

        <div class="row">
            <div class="col_price">
                <input type="submit" value="Demande de réservation" class="submit">
            </div>
        </div>
    </form>
</div>