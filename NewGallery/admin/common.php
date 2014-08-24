<?php
session_start();
  if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}
mysql_connect("localhost","tsetso_alduin","alduin") or die("Няма връзка със сървера!");
mysql_select_db("tsetso_alduin") or die("Няма връзка с БД!");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET SESSION collation_connection = 'utf8_general_ ci'");
define("NUMPERM", 5);