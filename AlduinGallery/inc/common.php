<?php
session_start();
$db=mysqli_connect('localhost','root','ttitto79','gallery') or die('No Server or database');
mysqli_query($db, 'SET NAMES utf8');

