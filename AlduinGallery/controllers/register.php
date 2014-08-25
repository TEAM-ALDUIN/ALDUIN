<?php
include_once('../inc/register.php');

$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET")
{
    if(isset($_GET["username"]))
    {
        echo("This was a get request" . $_GET["username"]);
    }
}
else if($method == "POST")
{
    echo("This was a post request");
}
else
{
    echo("This was " . $method . "request");
}

function generateRandomString($length = 255) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+<>?|":}{';
    $randomString = '';
    $len = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $len)];
    }
    return $randomString;
}



?>
<form id="frm-register">
    <fieldset>
        <legend>Register</legend>
        <label for="username">Username</label>
        <input type="text" name="username" id="username"/>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"/>
        <label for="password2">Confirm Password</label>
        <input type="password" name="password2"/>
        <input type="submit" value="Register"/>
    </fieldset>
</form>