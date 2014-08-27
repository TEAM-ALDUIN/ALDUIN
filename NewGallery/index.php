<?php
//include 'common.php';

$folder = "images/1";
//where to store the images

        $folder1 = "admin/images/1";
   
        $folder2 = "admin/images/2";
    
        $folder3 = "admin/images/3";
    


//get images from folder
$img_array1 = glob($folder1."/*.*");
$img_array2 = glob($folder2."/*.*");
$img_array3 = glob($folder3."/*.*");
//echo $img_array1[0];
//echo $img_array2[0];
//echo $img_array3[0]
//var_dump($img_array);
//arsort($img_array); //sort images by last uploaded
//





?>

<!DOCTYPE html>
<html>
<head>
    <title></title>





</head>
<body>
<a href="http://tsetso.net/alduin/home.php?gal=1" rel="lightbox[roadtrip]" title="GALLERY 1"><img src="<?php echo $img_array1[0] ; ?>" width="200" height="138" ></a>
<a href="http://tsetso.net/alduin/home.php?gal=2" rel="lightbox[roadtrip]" title="GALLERY 2"><img src="<?php echo $img_array2[0] ; ?>" width="200" height="138" ></a>
<a href="http://tsetso.net/alduin/home.php?gal=3" rel="lightbox[roadtrip]" title="GALLERY 3"><img src="<?php echo $img_array3[0] ; ?>" width="200" height="138" ></a>
<?php
echo $img_array[0];
?>

<!--show gallery-->
<?php if (empty($_GET[add]) && count($img_array)) { ?>
 <?php foreach($img_array as $key => $value) {

?>



<?php } ?>
<?php } ?>
<!--end show gallery-->
<?php
include("lp_source.php");
?>

<div>
<center>

<br>
<table width="600" border="0"><tr><td align=right>

</td></tr><tr><td align=right>	

</td></tr><tr><td>

<div class="subhead"><?php echo($mainstr); ?></div>

<div class="text"><?php echo($question); ?>
</div>

<div class="text"><?php if($votingstep==1) { echo($step1str); }
			if($votingstep==2) { echo($step2str); }
			if($votingstep==3) { echo($step3str); }
			?>
</div>

<div class="text">Number of votes: <?php echo($totalvotes); ?>
</div>


</div>

</td></tr>


</table></center>

</div>



</body>
</html>