<?php
/*
    require_once $_SERVER['DOCUMENT_ROOT'].'/core/core.php';
    include 'includes/header.php';
    include '../helpers/helpers.php';
    $email = (isset($_POST['email']))?$_POST['email'] :'' ;
    $password = (isset($_POST['password']))?$_POST['password'] :'' ;
    //Removing blank spaces from both ends of the Password or email
    $email = trim($email);
    $password = trim($password);
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    */
?>
<!--
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
              <h3 class="text-center w3-text-white">Hotel & Tourism</h3>
                <div id="admin_login" style="margin-top:60px;" class="w3-card-12 w3-padding-large w3-white"> -->
<?php
/* if(isset($_POST['login'])){
                      if(empty($_POST['email']) || empty($_POST['password'])){
                        echo '<div class="w3-text-red text-center">Email and password are required to proceed.</div>';
                      } else {
                          //Ensuring password is 6 or more characters long
                          if(strlen($password) < 6){
                            echo '<div class="w3-text-red text-center">password must be at least 6 characters</div>';
                            } else {
                             //Check if Email exists in database
                              $sql = $db->query("SELECT * FROM users WHERE email = '$email' ");
                              $user = mysqli_fetch_assoc($sql);
                              $count = mysqli_num_rows($sql);
                              if ($count < 1){
                                echo '<div class="w3-text-red text-center">email not found in database.</div>';
                              } else {
                                if(password_verify($hashed, $user['password'])){
                                    echo '<div class="w3-text-red text-center">The password you entered was incorrect, please try again.</div>';
                                }else {
                                    //FINALLY LOG THE USER IN
                                    $userID = $user['id'];
                                    login($userID);
                                    header("Location: index.php");
                                }
                              }
                          }
                      }
                    }*/

?>
<!--
                    <h3 class="text-center"></h3>
                    <form role="form" action="login.php" method="post">
                        <div class="form-group" >
                            <label for="email">Email:</label>
                            <input placeholder="Email here..." value="<?= $email; ?>" name="email" type="email" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Password here..."/>
                        </div>
                        <input type="submit" name="login" class="w3-btn w3-indigo w3-btn-block w3-ripple" value="Login"/>
                    </form>
                    <br>
                </div>

            </div>
            <div class="col-md-3"></div>

        </div>
    </div>


</body>
</html>-->

<style>
    .login_page_header {
        height: 5vh;
        width: 100vw;
    }

    .login_page_header img {
        width: 90px;
        height: 39px;
    }
</style>



<div class="login_page">
    <div class="login_page_header">
        <a href=""><img src="../assets/png/LOGO_ANCIEN.png" alt="Logo muriel home"></a>
    </div>

    <div class="login_page_container">
        <div class="login_page_container_title">
            <h1>Bienvenue sur l’espace connexion “Admin”</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident atque illum, ipsa qui exercitationem aperiam nisi suscipit fuga ex
                deserunt eligendi aspernatur rerum tempora a nemo, ullam tenetur consequatur? Tenetur.</p>
        </div>

        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input placeholder="Email here..." value="" name="email" type="email" />

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" />

            <input type="submit" name="login" value="Connexion" />
        </form>

        <div class="login_page_container_return">
            <h3>Si vous n’etes pas administaretru veuillez appuiyez ici </h3>
        </div>
    </div>
</div>