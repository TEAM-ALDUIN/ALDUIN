<?php
include_once('../inc/register.php');
?>
<form method="post" action="templates/register.php" id="frm-register">
    <fieldset>
        <legend>Register</legend>
        <label for="username">Username</label>
        <input type="text" name="username" id="username"/>
        <span class="error"><?php echo $err_username;?></span><br/>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"/>
        <span class="error"><?php echo $err_password;?></span><br/>
        <label for="password-check">Password</label>
        <input type="password" name="password-check" id="password-check"/>
        <span class="error"><?php echo $err_password_check;?></span><br/>
        <input type="submit" value="Register"/>
    </fieldset>
</form>