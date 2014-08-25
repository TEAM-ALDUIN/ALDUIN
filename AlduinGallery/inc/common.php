<?php
session_start();
$db= mysqli_connect('localhost','martin','martin', 'gallery') or die('No Server or database');
//mysqli_query($db, 'SET NAMES utf8');

//execute the SQL query and return records
$result = mysql_query("SELECT UserName FROM users WHERE UserName = ''");



echo "Connected to MySQL";

