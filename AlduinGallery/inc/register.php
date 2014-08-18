<?php
include_once('common.php');
$err_password = "";
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-check'])) {
    if ($_POST['password'] === $_POST['password-check']) {
        $username = htmlentities(['username']);
        $options = ['cost' => 11,];
        $passwordFromPost = $_POST['password'];
        $hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
        //TODO:insert into database...
        mysqli_query($db,'INSERT INTO Users (Username, Pass) VALUES ('.$username.','.$hash.')');
    } else {
        $err_password .= "Password doesn't match! ";
        exit;
    }

}