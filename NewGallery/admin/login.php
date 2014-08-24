<?php
session_start();
mysql_connect("localhost","tsetso_alduin","alduin") or die("Няма връзка със сървера!");
mysql_select_db("tsetso_alduin") or die("Няма връзка с БД!");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET SESSION collation_connection = 'utf8_general_ ci'");
    include "header.php";
    $username="";
    $password="";
    $message="";
    if (isset($_POST['username'])) { //Натиснат бутон ок
        $username=addslashes($_POST['username']);
        $password=$_POST['password'];
        $res = mysql_query("SELECT * FROM Users WHERE UserName='$username'");
        if ($res !== false) { //Заявката е изпълнена успешно
            if (mysql_num_rows($res)== 0) { //Имаме 0 потрбители с такова име
                $message="Няма такъв потребител";
            }
            else { //Има потребител с такова име
              $row = mysql_fetch_assoc($res);
                if ($row['Pass'] <> md5($password)) { //Паролата не е въведена правилно
                    $message="Грешна парола";
                }
                else {        //Има такъв потребител с такава парола
                  //$_SESSION['userid'] = $row['id'];
                  $_SESSION['username'] = $row['UserName'];
                  //$_SESSION['permission'] = unserialize($row['permission']);
		 header('Location: http://tsetso.net/alduin/admin/index.php');
                }
            }
        }
    }
    include 'form.php';
    include 'footer.php';

