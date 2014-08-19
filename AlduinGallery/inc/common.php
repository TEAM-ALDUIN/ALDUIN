<?php
session_start();
$db=mysqli_connect('localhost','ttitto4_alduin','alduin','ttitto4_gallery') or die('No Server or database');
mysqli_query($db, 'SET NAMES utf8');

