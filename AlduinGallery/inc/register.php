<?php
include_once('common.php');
$err_password = "";
$err_password_check = "";
$err_username = "";
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-check'])) {


    if ($_POST['username'] === '') {
        $err_username = "Username is required! ";
    } elseif ($_POST['password'] === '') {
        $err_password .= "Password field is required";
    } elseif ($_POST['password-check'] === '') {
        $err_password_check .= "Password check field is required! ";
    } elseif ($_POST['password'] !== $_POST['password-check']) {
        $err_password_check .= "Password check field must match the password field! ";
    } else {
        $username = htmlentities($_POST['username']);
        $options = ['cost' => 11,];
        $passwordFromPost = $_POST['password'];
        $hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
        mysqli_query($db, 'Insert into Users(UserName, Pass) VALUES("' . $username . '","' . $hash . '")');
        header('Location: ../index.php');
    }
}