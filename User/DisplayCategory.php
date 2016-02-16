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
global $hats;
if(isset($_GET["cateId"])){
	$id = urldecode($_GET["cateId"]);
	$nav = "&gt; <span>".urldecode($_GET["cateName"])."</span>";
	$sql = "select * from hat h, category c where h.hat_category_id=c.category_id and c.category_id='".$id."'";
	$service = new HatService();
	$hats = $service->GetRows($sql);
}
?>
<div id="body_wrapper">
<div id="wrapper">
<?php include_once 'Header.php';?>
<div id="main">
<?php include_once 'Category.php';?>
<?php include_once 'DisplayHat.php';?>
<div class="cleaner"></div>
</div>
<?php include_once 'Footer.php';?>
</div>
</div>
</body>
</html>