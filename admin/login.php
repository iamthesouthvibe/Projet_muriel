<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<link rel="stylesheet" href="../style/style.css">

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
include '../helpers/helpers.php';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
//Removing blank spaces from both ends of the Password or email
$email = trim($email);
$password = trim($password);
$hashed = password_hash($password, PASSWORD_DEFAULT);

?>

<div class="login_page">
    <div class="login_page_header">
        <a href="/index.php"><img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo muriel home"></a>
    </div>
    <?php
    if (isset($_POST['login'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo '<div">Email and password are required to proceed.</div>';
        } else {
            //Ensuring password is 6 or more characters long
            if (strlen($password) < 6) {
                echo '<div>password must be at least 6 characters</div>';
            } else {
                //Check if Email exists in database
                $sql = $db->query("SELECT * FROM users WHERE email = '$email' ");
                $user = $sql->fetch(PDO::FETCH_ASSOC);
                $count = $sql->rowCount();

                if ($count < 1) {
                    echo '<div>email not found in database.</div>';
                } else {
                    if (password_verify($hashed, $user['password'])) {
                        echo '<div>The password you entered was incorrect, please try again.</div>';
                    } else {
                        //FINALLY LOG THE USER IN
                        $userID = $user['id'];
                        login($userID);
                        header("Location: index.php");
                    }
                }
            }
        }
    }
    ?>


    <div class="login_page_container">
        <div class="login_page_container_title">
            <h1>Bienvenue sur l’espace connexion “Admin”</h1>
            <p>Bienvenue sur la page d'administration, connectez-vous pour accéder aux fonctions d'administrateur. Sur cette page, il sera possible de consulter les reservations, d'ajouter des produits/artciles,
                de modifier des produits/artciles, de supprimer des produits/artciles, et bien plus de fonctions..</p>
        </div>

        <form action="login.php" method="post" class="form_login">
            <div class="form_login_email">
                <label for="email">Email:</label>
                <br>
                <input placeholder="Email here..." value="<?= $email; ?>" name="email" type="email" required />
            </div>

            <div class="form_login_password">
                <label for="password">Mot de passe :</label>
                <br>
                <input type="password" name="password" />
            </div>


            <input type="submit" name="login" value="Connexion" class="form_input-login" required />
        </form>

        <div class="login_page_container_return">
            <a href="/index.php">Si vous n’etes pas administrateur veuillez appuyer ici</a>
        </div>
    </div>
</div>