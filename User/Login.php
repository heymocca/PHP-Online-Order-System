<?php include_once 'include.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRAZY HATS - User Login</title>
<meta name="description" content="CRAZY HATS" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<link rel="stylesheet" href="../css/ddsmoothmenu.css" type="text/css" />
<script type="text/javascript" src="../js/Common.js"></script>
<script type="text/javascript">
 function check(){
	return validation();
 }
  function Register(){
	window.location.assign("Register.php")
 }
</script>
</head>
<body>
<?php 
global $msg;
$msg='';
if(isset($_POST["btnLogin"])){
	$userName = $_POST['customerName'];
	$password = $_POST['customerPassword'];
	$service = new LoginService();
	$flag = $service->loginForSite($userName, $password);
	if($flag==1){//ok
		Redirect("MyOrder.php");
	}else if($flag==2){//disabled
		$msg = "<font color='red'>Sorry, your account has been disabled !</font>";
	}else{//wrong username
		$msg = "<font color='red'>User name or password is incorrect!</font>";
	}
}
if(isset($_GET["register"])){
	$msg = "<font color='green'>Congratulations, register is successful !</font>";
}
?>
<div id="body_wrapper">
  <div id="wrapper">
<?php include_once 'Header.php';?>
	<div id="main">
<?php include_once 'Category.php';?>
<form id="form1" method="post">	
        <div id="content" class="float_r">
        	<h3>User Login</h3>
            <table>
            <p><label></label><span id="showSpan" ></span><?php echo $msg;?></p>
            <tr>
            	<td width="100">User Name:</td>
                <td><input type="text" id="customerName" name="customerName" class="text"  validate="check"/></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
             <tr>
            	<td>Password:</td>
                <td><input type="password" id="customerPassword" name="customerPassword" class="text" validate="check" /></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
            	<td colspan="2" style="text-align:center">
                <input type="submit" value="Login" id="btnLogin" name="btnLogin"  class="submit_btn" onclick="return check()" />				&nbsp;&nbsp;&nbsp;
                <input type="button" value="Register" id="btnReg" name="btnReg"  class="submit_btn" onclick="Register()" /></td>
            </tr>
            </table>
        
            
        </div>
</form>
<div class="cleaner"></div>
</div>
<?php include_once 'Footer.php';?>
  </div>
</div>
</body>
</html>