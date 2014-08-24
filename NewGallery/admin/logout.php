<?php
mb_internal_encoding('utf8');
session_start();
session_destroy();
echo "Вие излязохте от системата!";
header('Location: http://tsetso.net/alduin/admin/login.php');