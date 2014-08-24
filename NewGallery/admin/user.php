<?php
include 'common.php';
include 'templates/header.html';
$dinmenu = <<<SM
      <div class="h_dinmenu">
        <ul>

SM;

if (isset($_SESSION['permission'][0])) { 
$dinmenu .= <<<SM
          <li> <a href="user.php?new" title="Добави потребител" name="erow"> Добави потребител </a> </li>

SM;
}
$dinmenu .= <<<SM
          <li> <a href="index.php" title="Обратно в главното мяню"> Главно меню </a> </li>
        </ul>
      </div>

SM;
echo $dinmenu;
echo "Потребител: " . $_SESSION['username'];
echo "<br/> <br/>";
if (isset($_SESSION['permission'][0])) { //Потребител с администраторски права
  $allusers = <<<USR

      <form id="tbluser" method="post" action="">
        <table border="1" align="center" cellpadding="2" cellspacing="0">
          <tr>
            <th width="30"> ID </th>
            <th width="300"> Име на потребителя </th>
            <th width="80"> Администр. </th>
            <th width="80"> Приемане </th>
            <th width="80"> Продажби </th>
            <th width="80"> Връщане </th>
            <th width="80"> Справки+ </th>
          </tr>

USR;
$res=mysql_query("SELECT * FROM users");
while ($row=mysql_fetch_array($res, MYSQL_ASSOC)) {
  $userid=$row['id'];
  $username=$row['username'];
  $permission = unserialize($row['permission']);
  for ($i=0;$i<NUMPERM;$i++) {
    if (isset($permission[$i])) {
      $permission[$i]='<img src="/images/yes.gif">';
    }
    else {
      $permission[$i]='<img src="/images/no.gif">';
    }
  }
  $allusers .=<<<USR
 
  <tr>
   <th align="right"> $userid </th>
   <td> <input type="submit" name="erow" value="$username"> </td>
   <td align="center"> $permission[0] </td>
   <td align="center"> $permission[1] </td>
   <td align="center"> $permission[2] </td>
   <td align="center"> $permission[3] </td>
   <td align="center"> $permission[4] </td>
  </tr>
USR;
}

  $allusers .=<<<USR
        </table>
      </form>

USR;
  echo $allusers;
  
  if (isset($_POST['erow']) || isset($_GET['new']) || isset($_POST['username'])) {
    $message="";
    $user="";
    $pass="";
    $povpass="";
    $editid=0;
    $permission = array();
    if (isset($_POST['erow'])) {
      $user=addslashes($_POST['erow']);
      $res=mysql_query("SELECT * FROM users WHERE username='$user'");
      $edit = mysql_fetch_assoc($res);
      $editid=$edit['id'];
      $permission=unserialize($edit['permission']);
    }
    if (isset($_POST['username'])) {
      $user=addslashes($_POST['username']);
      $pass=addslashes($_POST['password']);
      $povpass=addslashes($_POST['povpassword']);
      $editid=$_POST['id'];
      if (isset($_POST['permission'])){ //Разрешено е поне едно от правата
        $permission = $_POST['permission'];
      }
      else {                            //Няма разрешено нито едно от правата
        $permission = array();
      }
      if ($user==""){
        $message="Въведете име";
      }
      if ($message=="" && $pass!=$povpass) {
        $message="Паролата не съвпада с повторената";
      }
      if ($message=="") {
        $res = mysql_query("SELECT * FROM users");
        $bradm=0;
        while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
          if ($row['username']==$user && $row['id']!=$editid) {
            $message="Вече съществува такъв потребител";
          }
          $arradm=unserialize($row['permission']);
          if (isset($arradm[0]) && $editid!=$row['id']) {
            $bradm++;
          }
        }
      }
      if ($message=="" && $bradm==0 && !isset($permission[0])) {
        $message="Няма да остане администратор";
      }
      if ($message=="") {
        $serperm=serialize($permission);
        if ($editid==0) {
          mysql_query("INSERT INTO users (username, password, permission) VALUES ('$user', md5('$pass'), '$serperm')");
//          or die(mysql_error());
        }
        else {
          if ($pass=="") {
            mysql_query("UPDATE users SET username='$user', permission='$serperm' WHERE id='$editid'");
          }
          else {
            mysql_query("UPDATE users SET username='$user', permission='$serperm', password=md5('$pass') WHERE id='$editid'");
          }
        }
        header('Location: user.php');
      }
    }
    for ($i=0;$i<NUMPERM;$i++) {
      if (isset($permission[$i])) {
        $permission[$i]='checked';
      }
      else {
        $permission[$i]='';
      }
    }
    include 'templates/userform.html';
  }
}
else {  //Потребител без администраторски права
  for ($i=1;$i<NUMPERM;$i++) {
   if (isset($_SESSION['permission'][$i])) {
     $serperm[$i]='<img src="images/yes.gif">';
   }
   else {
     $serperm[$i]='<img src="images/no.gif">';
   }
  }
  $thisuser= <<<USR
    $serperm[1] Приемане на книги <br/><br/>
    $serperm[2] Продажба на книги <br/><br/>
    $serperm[3] Връщане на книги <br/><br/>
    $serperm[4] Справки+ 
USR;
  $message="";
  $currpass="";
  $newpass="";
  $reppass="";
  if (isset($_POST['currpass'])) { 
    $currpass=$_POST['currpass'];
    $newpass=$_POST['newpass'];
    $reppass=$_POST['reppass'];
    $message="";
    if ($newpass=="") { //Не е въведена нова парола
      $message="Въведете нова парола!";
    }
    if ($message=="" && $newpass!=$reppass) { //Повторената парола не съвпада
      $message="Повторената парола не съвпада!";
    }
    if ($message=="") { //Новата и повторената парола съвпадат
      $userid=$_SESSION['userid'];
      $res=mysql_query("SELECT * FROM users WHERE id='$userid'");
      $edit=  mysql_fetch_assoc($res);
      if (md5($currpass)!=$edit['password']) { //Старата парола не съвпада
        $message="Невярна стара парола!";
      }
      else {
        mysql_query("UPDATE users SET password=md5('$reppass') WHERE id='$userid'");
        $message="Паролата ви е сменена успешно!";
      }
    }  
  }
  include 'templates/nonadmin.html';
}


include 'templates/footer.html';
