<?php
session_start();
$db=mysqli_connect('hook.icnhost.net','ttitto4_alduin','alduin','ttitto4_gallery') or die('No Server or database');
mysqli_query($db, 'SET NAMES utf8');

