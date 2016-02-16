<?php include_once 'include.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CRAZY HATS - Register</title>
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<link rel="stylesheet" href="../css/ddsmoothmenu.css" type="text/css" />
<script type="text/javascript" src="../js/Common.js"></script>
<script type="text/javascript" src="../js/Validation.js"></script>
<script type="text/javascript">
    function save() {
        var flag = validation();
        if (flag == false) {
            return flag;
        }
		if (document.getElementById("customerName").value == ""){
			flag = false;
			document.getElementById("msg").innerHTML = "please type your name.";			
			return flag;
			}
        if (document.getElementById("home").value == "" && document.getElementById("mobile").value == ""
           && document.getElementById("work").value == "") {
            flag = false;
            document.getElementById("msg").innerHTML = "one of (home phone,work phone and mobile phone) is compulsory !";
            setCss(document.getElementById("home"));
            return flag;
        }

        if (document.getElementById("customerPassword").value != document.getElementById("PasswordAgain").value)
        {
            flag = false;
            document.getElementById("msg").innerHTML = "twice input in password are not match !";
            setCss(document.getElementById("customerPassword"));
            return flag;
        }
        if (flag) {
            document.getElementById("msg").innerHTML = " please wait,operation is being processed... ";
        }

        return flag;
    }
</script>
</head>
<body>
<?php 
global $msg;
$msg='';
if(isset($_POST["btnRegister"])){
	$userName = $_POST['customerName'];
	$password = $_POST['customerPassword'];
	$home = $_POST['home'];
	$work = $_POST['work'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$service = new CustomerService();
	$sqln = "select * from customer where customer_name='$userName'";
	$num = $service ->GetCount($sqln);
	if($num > 0)
	{
		 echo 'aa';
		$flag = false;
		$msg = "This user name has been exsited.";
		}else{
	$sql = " insert into customer ";
	$dataArray = array(
			"customer_name"=>"'".$userName."'",
			"customer_password"=>"'".$password."'",
			"customer_home_phone"=>"'".$home."'",
			"customer_work_phone"=>"'".$work."'",
			"customer_mobile_phone"=>"'".$mobile."'",
			"customer_email"=>"'".$email."'",
			"customer_status"=>"'available'",
	);
	$sql.=$service->GetInsertSQL($dataArray);
	$id = $service->saveCustomer($sql, $email,$userName,$password);
	if($id!=0){//ok
		Redirect("Login.php?register=ok");
	}else{
		
	}
}
}
?>
<div id="body_wrapper">
  <div id="wrapper">
<?php include_once 'Header.php';?>
	<div id="main">
<?php include_once 'Category.php';?>
        <form id="Form1" method="post" class="form" >
<div id="content" class="float_r">
    <h3>User Register</h3>
    <p><span id="msg"  style="color:Red"><?php echo $msg;?></span></p>
      <table>
      <tr>
          <td width="100">User Name:</td>
          <td><input type="text" id="customerName" name="customerName" validate="required"  maxlength="50"/></td>
          <td><font color="red">*</font></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
          <td width="100">Password:</td>
          <td><input type="password" id="customerPassword" name="customerPassword" validate="required"  maxlength="20"/></td>
          <td><font color="red">*</font></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
          <td width="100">Confirm Password:</td>
          <td><input type="password" id="PasswordAgain" name="PasswordAgain" validate="required"  maxlength="20"/></td>
          <td><font color="red">*</font></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
      <td width="100">Home Phone:</td>
          <td><input type="text" id="home" name="home" validate="phone" maxlength="20"/></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
      <td width="100">Work Phone:</td>
          <td><input type="text" id="work" name="work" validate="phone" maxlength="20" /></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
      <td width="100">Mobile Phone:</td>
          <td><input type="text" id="mobile" name="mobile"  validate="required,phone" maxlength="20"/></td>
          <td><font color="red">*</font></td>
      </tr>
      <tr><td>&nbsp;</td></tr> 
      <td width="100">Email:</td>
          <td><input type="text" id="email" name="email" validate="required,email" maxlength="50"/></td>
          <td><font color="red">*</font></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      
      <tr>
          <td colspan="2" style="text-align:center">
          <input type="submit" id="btnRegister" value="Register" name="btnRegister" onclick="return save()" class="submit_btn" />
          </td>
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