<?php
include_once('common.php');
$err_password = "";
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-check'])) {
    if ($_POST['password'] === $_POST['password-check']) {
        $username = htmlentities($_POST['username']);
            //TODO: check if the inserted user already exists
        $options = ['cost' => 11,];
        $passwordFromPost = $_POST['password'];
        $hash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
        mysqli_query($db,'Insert into Users(UserName, Pass) VALUES("'.$username.'","'.$hash.'")');
    } else {
        $err_password .= "Password doesn't match! ";
    }

}