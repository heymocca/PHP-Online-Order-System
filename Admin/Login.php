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
<script type="text/javascript" src="../js/Validation.js"></script>
<script type="text/javascript">
        function into_system(event) {
            if (event.keyCode == 13) {
            	loginSubmit();
            }
        }

        function loginSubmit() {
            if(validation())
            	loginForm.submit();
        }
</script>
</head>
<body>
<?php
session_start();
if(isset($_GET['logout'])){
	unset($_SESSION['admin']);
}

global $msg;
if(isset($_POST['txtAdminName'])){
require_once '../inc/BusinessLayer.inc.php';
	$username = $_POST['txtAdminName'];
	$password = $_POST['txtPassword'];
	try{
		$service = new LoginService();
		$result=$service->getRow($username, $password);
		if($result){
			$_SESSION["admin"] = $result;
			header("Location: Main.php");
		}else{
			$msg = 'User name or password is incorrect!';
		}
	}catch (Exception $e){
		echo $e->getMessage();
		
	}
}
?>
<div id="body_wrapper">
<div id="wrapper">
<div id="header">
<!-- Header -->
  <div id="site_title"><h1><a href="../User/Main.php" target="_blank">Online Shoes Store</a></h1></div>
  <div id="header_right">
      <p>
     <?php 
      
      if(isset($_SESSION["admin"])){
          echo '<a href="Main.php?logout=true" id="logout"> Logout</a> | ';
      
      }else
      {
          echo'
          <a href="Login.php" id="login">Login</a> | ';
          }
          echo'<a href="../User/Main.php" >Back To Crazy Hat</a>';
      ?>
      </p>
  </div>
  <div class="cleaner"></div>
</div> <!-- END of header -->
<div id="main">
<div id="sidebar" class="float_l"></div>
<form id="loginForm" action="Login.php" method="post">
        <div id="content" class="float_r">
        	<h3>Admin Login</h3>
            <table>
            <p><label></label><span id="showSpan" ></span><?php echo $msg;?></p>
            <tr>
            	<td width="100">Admin Name:</td>
                <td><input type="text" name="txtAdminName" id="txtAdminName" class="inputUserName" onkeydown="into_system(event)" validate="check" /></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
             <tr>
            	<td>Password:</td>
                <td><input type="password" id="txtPassword" name="txtPassword"  class="inputPwd" onkeydown="into_system(event)" validate="check"/></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
            	<td colspan="2" style="text-align:center">
                <input type="submit" value="Login" id="btnLogin" name="btnLogin"  class="submit_btn" onclick="loginSubmit()" /></td>
            </tr>
            </table>
        
            
        </div>
</form>
<div class="cleaner"></div>
</div>
</div>
</div>
</body>
</html>