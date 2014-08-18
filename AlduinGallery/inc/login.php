<?php
include_once('../inc/common.php');
if($_SESSION['is_logged']!==true){
    if(isset($_POST['username']) && isset($_POST['password'])){
        $pass_from_post=$_POST['password'];

    }
}