<?php
include 'common.php';

$folder = "images/1";
//where to store the images
switch ($_GET['gal']) {
    case 2:
        $folder = "images/2";
        break;
    case 3:
        $folder = "images/3";
        break;
    case 4:
        $folder = "images/4";
        break;
     default : $folder = "images/1";
}



//create the folder if it doesn't exist
if (!dir($folder)) {
    mkdir($folder,0777);
}

//get images from folder
$img_array = glob($folder."/*.*");
//var_dump($img_array);
arsort($img_array); //sort images by last uploaded
//

//redirect to add if no images in gallery
//echo($folder);
if (!count($img_array) && empty($_GET[add])) {
    header('Location: home.php?add=1&gal='.$_GET['gal']); die;
}

//upload image
if ($_FILES[image][size] > 0) {

    //get file extension
    $ext = end(explode(".",$_FILES[image][name]));

    //only allow jpg, png or bmp
    if (strtolower($ext) == 'jpg' || strtolower($ext) == 'png' || strtolower($ext) == 'bmp') {
        $tmp = $_FILES[image][tmp_name];
        //give the file a unique name that can be split to show caption.  (time_caption_name).extension
        $new = "$folder/".time()."_".base64_encode($_POST[caption])."_".base64_encode($_FILES[image][name]).".$ext";
        move_uploaded_file($tmp,$new);
    }

    //redirect
    header('Location: home.php?gal='.$_GET['gal']); die;
}



//delete an image
if (!empty($_GET[delete])) {

    $image = $_GET[delete];
    if (file_exists(base64_decode($image))) {
        unlink(base64_decode($image));
    }

    //redirect
    header('Location: home.php?gal='.$_GET['gal']); die;

}
//

?>

<!DOCTYPE HTML">

<head>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..:: ALDUIN GALLERY::..</title>
<link rel="stylesheet"href="css/styles.css" />
<style type="text/css"> 
body { 
    width:500px; 
    margin:20px auto 0px auto; 
    font-family: Geneva, Arial, Helvetica, sans-serif;
} 
</style> 
 
</head>

<body>

<h1>PHP Photo Gallery ALDUIN TEAM</h1>

<p> GALLERY <?php echo $_GET['gal']; ?></p> <!-- Name og gallery-->
<a class="menu"  href="http://tsetso.net/alduin/admin/">BACK TO HOME</a>   
<a href="home.php?add=1&gal=<?php echo($_GET['gal']) ?>">ADD IMAGE</a>
<a onass="menu" <a  href="http://tsetso.net/alduin/admin/logout.php">EXIT</a>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="500" border="0" cellpadding="10" cellspacing="0">

<!--upload form-->
<?php if (!empty($_GET[add])) { ?>
    <tr>
      <td style="border:1px dotted #CCCCCC" bgcolor="#EBEBEB"><strong style="font-size:18px">Add an image</strong><br />
        <br />
        <strong>Caption</strong><br />
          <input name="caption" type="text" id="caption" size="50" maxlength="50" />
        <br />
        <br />
          <strong>Image</strong><br />
        <input name="image" type="file" id="image" />
      <br />
      <br />
      <input type="submit" name="Submit" value="Submit" />
      <?php if (count($img_array)) { ?>or <a href="home.php?gal=<?php echo $_GET['gal'] ?>">Back to gallery</a><?php } ?></td>
    </tr>
<?php } ?>
<!--end upload form-->

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
        <tr>
		<td bgcolor="#EBEBEB"><img src="<?php echo $value; ?>" width="500" /><?php if ($caption) { ?><br /><b><?php echo $caption; ?></b><?php } ?> <br /> 
<a onclick="javascript:return confirm('Are you sure?')" href="home.php?delete=<?php echo base64_encode($value); ?>&gal=<?php echo $_GET['gal'] ?>">DELETE IMAGE</a>
        </td>
    </tr>

<?php } ?>
<?php } ?>
<!--end show gallery-->
</table>
</form>


</body>
</html>