<?php include_once 'include.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
CRAZY HATS
</title>
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<link rel="stylesheet" href="../css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/ddsmoothmenu.css" type="text/css" />
<script type="text/javascript" src="../js/Common.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>

</head>
<body>
<?php 
$nav = "";
if(isset($_GET["logout"])){
	if(isset($_SESSION["customer"])){
		unset($_SESSION["customer"]);
	}
}

global $hats;
$sql = "select * from hat";
$service = new HatService();
$hats = $service->GetRows($sql);
?>
<div id="body_wrapper">
<div id="wrapper">
<?php include_once 'Header.php';?>
<div id="main">
<?php include_once 'Category.php';?>
     <div id="content" class="float_r">
        	<h1>All Products</h1>
            <?php
	        	
	        	if($hats){
		        	foreach($hats as $hat){
			        	echo "<div class='product_box'>";
			        	echo"<p>";
			        	echo"<a href='Hat.php?hatId=".$hat["hat_id"]."' title='".$hat["hat_title"]."'>";
			        	echo"<img src='../".$hat["hat_path"]."' alt='hat image' />";
			        	echo"</a></p>";
			        	echo"<p><a href='Hat.php?hatId=".$hat["hat_id"]."' title='".$hat["hat_title"]."'>".$hat["hat_title"]."</a>";
			        	echo"<br />";
			        	echo"<span class='lh'>$".$hat["hat_price"]."</span></p></div>";			        	
		        	}
	        	}
			  ?>
        </div> 



<div class="cleaner"></div>
</div>
<?php include_once 'Footer.php';?>
</div>
</div>
</body>
</html>