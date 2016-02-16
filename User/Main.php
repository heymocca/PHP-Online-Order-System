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
<script type="text/javascript">
ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
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
$sql = "select * from hat limit 0,6";
$service = new HatService();
$hats = $service->GetRows($sql);
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