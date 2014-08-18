<?php
include_once('common.php');
$err_password = "";
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-check'])) {
    if ($_POST['password'] === $_POST['password-check']) {
        $username = htmlentities($_POST['username']);

        $options = ['cost' => 11,];
        $passwordFromPost = $_POST['password'];
        $hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
        //TODO:insert into database...
        mysqli_query($db,'Insert into Users(UserName, Pass) VALUES("ttitto79","ttitto89")');
        $in= mysqli_query($db,'Select Username, Pass from Users');
        print_r( $in->fetch_assoc());
    } else {
        $err_password .= "Password doesn't match! ";
        exit;
    }

}