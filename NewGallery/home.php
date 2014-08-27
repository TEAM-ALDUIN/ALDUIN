<?php
//include 'common.php';

$folder = "images/1";
//where to store the images
switch ($_GET['gal']) {
    case 2:
        $folder = "admin/images/2";
        break;
    case 3:
        $folder = "admin/images/3";
        break;
    case 4:
        $folder = "admin/images/4";
        break;
    default : $folder = "admin/images/1";
}

//get images from folder
$img_array = glob($folder."/*.*");
//var_dump($img_array);
arsort($img_array); //sort images by last uploaded
//



?>

<!DOCTYPE HTML">

<head>
<html>
<meta charset="UTF-8" />
<title>..:: ALDUIN GALLERY::..</title>
<!--<link rel="stylesheet"href="css/styles.css" />-->
<!--<style type="text/css">-->
<!--body {-->
<!--    width:500px;-->
<!--    margin:20px auto 0px auto;-->
<!--    font-family: Geneva, Arial, Helvetica, sans-serif;-->
<!--}-->
<!--</style>-->
<script type="text/javascript" src="http://tsetso.net/chess/js/prototype.js"></script>
<script type="text/javascript" src="http://tsetso.net/chess/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="http://tsetso.net/chess/js/lightbox.js"></script>
<link rel="stylesheet" href="http://tsetso.net/chess/css/lightbox.css" type="text/css" media="screen" />

<script type="text/javascript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body>

<?php include_once "admin/header.php";?>

<p> GALLERY <?php echo $_GET['gal']; ?></p> <!-- Name og gallery-->

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">




<?php if (empty($_GET[add])) { ?>
    <tr>
      <td>  </td>
    </tr>
<?php } ?>

<!--show gallery-->
<?php if (empty($_GET[add]) && count($img_array)) { ?>
    <?php foreach($img_array as $key => $value) {
    $str = explode("_",$value); //split image file name to get caption
    $caption = base64_decode($str[1]); //get caption
    ?>

<!--		<img src="--><?php //echo $value; ?><!--" width="100" />-->


<a href="<?php echo $value; ?>" rel="lightbox[roadtrip]" title="<?php if ($caption) { ?><b><?php echo $caption; ?></b><?php } ?>"><img src="<?php echo $value; ?>" width="200" height="138" ></a>


<?php } ?>
<?php } ?>
<!--end show gallery-->



</form>
<?php include_once "admin/footer.php";?>

</body>
</html>