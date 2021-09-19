<?php
require_once 'core/core.php';
include 'includes/header.php';

$sql = $db->query("SELECT * FROM rooms LIMIT 4");
?>
<style>
    body {
        background-color: #9A4747;
    }

    .qhero_page_reservation {
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translateX(-50%) translateY(-50%);
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        display: flex;
    }

    .qhero_page_reservation select {
        border: none;
        border-bottom: solid 1px;
        background-color: #9A4747;
        margin-right: 50px;
        color: #FCF7EC;
        width: 200px;
        line-height: 2;
        font-size: 20px;
        font-family: ITCGaramondStd-BkNarrow;
    }

    .qhero_page_reservation input {
        width: 300px;
        height: 35px;
        background: #FCF7EC;
        border-radius: 40px;
        border: none;
        font-size: 23px;
        color: #9A4747;
        text-decoration: none;
    }
</style>

<div class="qhero_page_reservation">
    <div class="form">
        <div class="input">
            <form method="get" action="reservation-2.php">
                <select name="maison" id="">
                    <option value="" selected="true" disabled="disabled">Votre maison</option>
                    <?php while ($room = mysqli_fetch_assoc($sql)) : ?>
                        <option value="<?= $room['id']; ?>"><?= $room['shortName']; ?></option>
                    <?php endwhile; ?>
                </select>
                <input type="submit" value="Vérifier les disponibilités">
            </form>
        </div>
    </div>
</div>

