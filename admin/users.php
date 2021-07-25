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
//FIELDS DETAILS
@$fullname = sanitize($_POST['name']);
@$email = sanitize($_POST['email']);
@$role = sanitize($_POST['role']);
@$password = sanitize($_POST['password']);
@$password2 = sanitize($_POST['password2']);
@$joinDate = date("Y-m-d H:m:i");


//CODE TO REGISTER A NEW ADMINISTRATOR
if (isset($_POST['add'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['role']) && !empty($_POST['password'])) {
        if ($_POST['password'] == $_POST['password2']) {

            //HASHING THE PASSWORD FOR SECURITY
            $password = password_hash($password, PASSWORD_DEFAULT);
            //INSERT QUERY REGISTERING NEW ADMIN TO THE DATABASE
            $name = $_FILES['file']['name'];
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            // Select file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");

            if (in_array($imageFileType, $extensions_arr)) {
                // Upload file
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
                    // Insert record
                    $sql = "INSERT INTO users (`full_name`, `email`, `password`, `join_date`, `permissions`, `photo`) VALUES('$fullname','$email','$password','$joinDate','$role','$name')";
                    $insert = $db->query($sql);
                    $_SESSION['add_admin'] = 'New user successfully added!';
                    header("Location: users.php");
                }
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
<div class="w3-container w3-main" style="margin-left:200px">

    <div class="row">
        <div class="col-md-6">

            <h3 class="">New user Form</h3>
            <hr>
            <form action="users.php" method="POST" class="form" id="add_user" enctype='multipart/form-data'>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" value="<?= (isset($_GET['edit'])) ? '' . $edit['full_name'] . '' : '' . $fullname . ''; ?>" name="name" class="form-control" placeholder="Full name*">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="email" value="<?= (isset($_GET['edit'])) ? '' . $edit['email'] . '' : '' . $email . ''; ?>" name="email" class="form-control" placeholder="User email*">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="file" name="file" id="file">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="role">User role*:</label>
                        <select id="permission" name="role" class="form-control">
                            <option value="" selected>select a user role</option>
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="editor,admin">Editor & Admin</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password*">
                </div>
                <div class="col-sm-6 form-group">
                    <input type="password" name="password2" class="form-control" placeholder="Confirm password*">
                </div>
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-info" name="<?= (isset($_GET['edit'])) ? 'edit' : 'add'; ?>" value="<?= (isset($_GET['edit'])) ? 'Edit user' : 'Add user'; ?>">
                    <?php if (isset($_GET['edit'])) : ?>
                        <a href="users.php" class="btn btn-info" name="">Cancel</a>
                    <?php endif; ?>
                </div>
            </form>

        </div>
        <div class="col-md-6">
            <h3>User's table</h3>

            <table class="table table-striped table-condensed table-bordered">
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
                                <a href="users.php?delete=<?= $rows['id']; ?>" class="w3-btn w3-small w3-red"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="users.php?edit=<?= $rows['id']; ?>" class="w3-btn w3-small w3-blue"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

