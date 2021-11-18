<?php
require_once 'core/core.php';
include 'includes/header.php';

$sql = $db->query("SELECT * FROM rooms");
?>
<style>
    body {
        background-color: #9A4747;
    }

    .header_right button {
        display: none;
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

    .qhero_page_reservation option .test-hover:hover {
        transition-duration: 500ms;
        background-color: black;
        color: red;
    }

    .test-hover:hover {
        transition-duration: 500ms;
        background-color: black;
        color: red;
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
        cursor: pointer;
    }

    @media screen and (max-width: 450px) {

        /* responsive de la page reservation 1 */
        .qhero_page_reservation form {
            text-align: center;
        }

        .qhero_page_reservation select {
            margin-right: 0px;
        }

        .qhero_page_reservation input {
            margin-top: 110px;
        }
    }
</style>

<main>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <div class="qhero_page_reservation">
        <div class="form" data-aos="fade" data-aos-anchor-placement="bottom-bottom" data-aos-duration="1000" data-aos-delay="500">
            <div class="input">
                <form method="get" autocomplete="off" action="reservation-2.php">
                    <select name="maison" class="test">
                        <option value="" selected="true" disabled="disabled">Votre maison</option>
                        <?php while ($room = $sql->fetch(PDO::FETCH_ASSOC)) : ?>

                            <option class="test-hover" value="<?= $room['id']; ?>"><?= $room['shortName']; ?>, <?= $room['lieu']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <input type="submit" value="Vérifier les disponibilités" class="button">
                </form>
            </div>
        </div>
    </div>
</main>
<script src="js/reservation.js"></script>