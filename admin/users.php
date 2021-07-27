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
@$password2 = $_POST['password2'];
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
    } else {
        echo '<div class="w3-red w3-center"> All fields with an asterisks are required!</div> ';
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


<div class="admin_page">
    <div class="header_admin">
        <h1>Utilisateurs</h1>
        <img src="../assets/png/LOGO_ANCIEN.png" alt="Logo Muriel">
    </div>
    <div class="admin_page_users">
        <div class="table_users">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Roles</th>
                        <th>Last login</th>
                        <th>Actions</th>
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
                                <a href="users.php?delete=<?= $rows['id']; ?>"><span></span></a>
                                <a href="users.php?edit=<?= $rows['id']; ?>"><span></span></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="form_users">
            <form action="users.php" method="POST" class="form" id="add_user" enctype='multipart/form-data'>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" value="<?= (isset($_GET['edit'])) ? '' . $edit['full_name'] . '' : '' . $fullname . ''; ?>" name="fullname" placeholder="Full name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="email" value="<?= (isset($_GET['edit'])) ? '' . $edit['email'] . '' : '' . $email . ''; ?>" name="email" placeholder="User email">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="file" name="file" id="file">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="role">User role:</label>
                        <select id="permission" name="role">
                            <option value="" selected>select a user role</option>
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="editor,admin">Editor & Admin</option>
                        </select>
                    </div>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="col-sm-6 form-group">
                    <input type="password" name="password2" placeholder="Confirm password">
                </div>
                <div>
                    <input type="submit" name="<?= (isset($_GET['edit'])) ? 'edit' : 'add'; ?>" value="<?= (isset($_GET['edit'])) ? 'Edit user' : 'Add user'; ?>">
                    <?php if (isset($_GET['edit'])) : ?>
                        <a href="users.php" class="btn btn-info" name="">Cancel</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>