<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/core.php';
require_once('../helpers/helpers.php');

if (!is_logged_in()) {
    login_error_check();
}
if (!permission()) {
    permission_error();
}

include 'includes/header.php';
include 'includes/navigation.php';
$sql = "SELECT * FROM users";
$result = $db->query($sql);
#################################
$row_count = 1; ####//Row Counter
#################################
// FIELDS DETAILS
@$fullname = $_POST['fullname'];
@$email = $_POST['email'];
@$role = $_POST['role'];
@$password = $_POST['password'];
@$password2 =$_POST['password2'];
@$joinDate = date("Y-m-d H:m:i");

//CODE TO REGISTER A NEW ADMINISTRATOR
if (isset($_POST['add'])) {
    if (!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['role']) && !empty($_POST['password']) && !empty($_FILES["file"]["name"])) {
        if ($_POST['password'] == $_POST['password2']) {

            //HASHING THE PASSWORD FOR SECURITY
            $password = password_hash($password, PASSWORD_DEFAULT);
            //INSERT QUERY REGISTERING NEW ADMIN TO THE DATABASE
            $fileName = $_FILES['file']['name'];
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
            $target_file = $target_dir . basename($_FILES["file"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $extensions_arr = array("jpg", "jpeg", "png", "gif");

            if (in_array($imageFileType, $extensions_arr)) {
                // Upload file
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $fileName)) {
                    // Insert record
                        $sql = "INSERT INTO users (`full_name`, `email`, `password`, `join_date`, `permissions`, `photo`) VALUES('$fullname','$email','$password','$joinDate' ,'$role','$fileName')";
                        $insert = $db->query($sql);
                
                        if ($insert) {
                            $_SESSION['add_admin'] = 'New user successfully added!';
                            header("Location: users.php");
                        } else {
                            printf("Erreur : %s\n", $db->error);
                        }
                }
            } else {
                echo '<div>Extiensions acceptées : png, gif, jpg, jpeg</div>';
            }
        } else {
            echo '<div class="w3-red w3-center"> Passwords do not match!</div> ';
        }
    } 
}

//CODE TO DELETE A DATABASE USER
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $toDeleteID = $_GET['delete'];
    $delete = $db->query("DELETE FROM users WHERE id = '$toDeleteID' ");
    $_SESSION['add_admin'] = 'User successfully deleted!';
    header("Location: users.php");
}
//CODE TO EDIT A USER (UPDATE DATABASE)
if (isset($_GET['edit']) && !empty($_GET['edit'])) {
    $toEditID = $_GET['edit'];
    $myedit = $db->query("SELECT * FROM users WHERE id = '$toEditID' ");
    $edit = mysqli_fetch_assoc($myedit);
}

?>
<style>
  .form-control small {
    opacity: 0;
  }

  .form-control.error small {
    opacity: 1;
  }
</style>

<div class="admin_page">
    <div class="header_admin">
        <h1>Utilisateurs</h1>
        <img src="../assets/png/LOGO_02_PNG_NOIR.png" alt="Logo Muriel">
    </div>
    <div class="admin_page_users">
        <div class="table_users">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Roles</th>
                        <th>Dernière connexion</th>
                        <th>Supp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($rows = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= $row_count++; ?></td>
                            <td><?= $rows['full_name']; ?></td>
                            <td><?= $rows['permissions']; ?></td>
                            <td><?= $rows['last_login']; ?></td>
                            <td>
                                <a href="users.php?delete=<?= $rows['id']; ?>"><i class='bx bx-trash'></i></a>
                                <a href="users.php?edit=<?= $rows['id']; ?>"><span></span></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="form_users">
            <form action="users.php" method="POST" class="form" id="add_user" enctype='multipart/form-data' onsubmit="return validate();">
            <h2>Ajouter un nouveau utilisateur</h2>
                <div class="form-control form_users_top">
                    <div>
                        <label for="fullname">Nom complet</label>
                        <br>
                        <input type="text" value="<?= (isset($_GET['edit'])) ? '' . $edit['full_name'] . '' : '' . $fullname . ''; ?>" name="fullname" id="fullname" placeholder="" >
                        <br>
                        <small>Error Message</small>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <br>
                        <input type="email" value="<?= (isset($_GET['edit'])) ? '' . $edit['email'] . '' : '' . $email . ''; ?>" name="email" id="email" placeholder="" >
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
                <div class="form-control form_users_middle">
                    <div>
                        <label for="file">Photo</label>
                        <br>
                        <input type="file" name="file" id="file">
                        <br>
                        <small>Error Message</small>
                    </div>
                    <div>
                        <label for="role">Role</label>
                        <br>
                        <select id="permission" name="role">
                            <option value="" selected>Selectionne un role</option>
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="editor,admin">Editor & Admin</option>
                        </select>
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
                <div class="form-control form_users_bottom">
                    <div>
                        <label for="password">Mot de passe</label>
                        <br>
                        <input type="password" name="password" id="password" placeholder="">
                        <br>
                        <small>Error Message</small>
                    </div>
                    <div>
                        <label for="password2">Confirmer</label>
                        <br>
                        <input type="password" name="password2" id="password2" placeholder="Confirm password">
                        <br>
                        <small>Error Message</small>
                    </div>
                </div>
                <div>
                    <input type="submit" name="<?= (isset($_GET['edit'])) ? 'edit' : 'add'; ?>" value="<?= (isset($_GET['edit'])) ? 'Edit user' : 'Add user'; ?>" class="submit_button">
                    <?php if (isset($_GET['edit'])) : ?>
                        <a href="users.php" class="btn btn-info" name="">Cancel</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./js/checkform_users.js"></script>