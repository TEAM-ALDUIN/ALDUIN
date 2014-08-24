    <form id="login" method="POST" action="">
        <fieldset> 
            <pre> <?php echo $message ?> </pre>
            Потрбител: <input name="username" type="text" value="<?php echo stripslashes($username) ?>">
            <br/> <br/>Парола: <input name="password" type="password" value="<?php echo $password ?>">
            <br/> <br/> <input type="submit" value="OK">
         </fieldset>
    </form>
