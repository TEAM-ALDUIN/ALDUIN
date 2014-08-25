<?php
$vm = new stdClass();
$requiredFields = ["username", "password", "password2"];
$notSet = checkRequired($requiredFields, $_POST);


if(count($notSet) == 0){
    $vm->Username = $_POST["username"];
    $vm->Password = $_POST["password"];
    $vm->Password2 = $_POST["password2"];
    $vm->PasswordsMatch = $vm->Password == $vm->Password2;
}
else{
    $vm->ErrorMessage = "Missing required fields";
    $vm->NotSet = $notSet;
}

$db = new mysqli('localhost','martin','martin', 'gallery') or die('No Server or database');
//mysqli_query($db, 'SET NAMES utf8');

//execute the SQL query and return records
$result = mysql_query("SELECT UserName FROM users WHERE UserName = '$vm->Username'");

echo(var_dump($result));



function checkRequired($keys, $data){
    $notSet = array();

    foreach($keys as $key){
        if(isset($data[$key]) == false){
            array_push($notSet, $key);
        }
    }
    return $notSet;
}

?>

<div>
    <span>This is a simple test</span>

    <?php
    if($vm->PasswordsMatch){
    }


    ?>


</div>

