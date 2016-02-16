<?php include_once 'include.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRAZY HATS - Shopping Cart</title>
<meta name="description" content="CRAZY HATS" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<link rel="stylesheet" href="../css/ddsmoothmenu.css" type="text/css" />

<script type="text/javascript" src="../js/Common.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
function deleteItem(value) {
	document.getElementById("curType").value = "delete";
	document.getElementById("curId").value = value;
	form1.submit();
}
function moreLessItem(type, value) {
	document.getElementById("curType").value = type;
	document.getElementById("curId").value = value;
	form1.submit();
}
function addToOrders() {

	if (document.getElementById("isNull").value == 0) {
		alert("Please add one item at least, then check out !");
		return false;
	}
	if (!confirm('Are you sure you want to check out?')) {
		return false;
	} else {
		checkout();
	}
}
function continueShopping(){
	window.location.href = "Main.php";
}
function checkout(){
	window.location.href = "MyOrder.php?checkout=true";
}
</script>
</head>

<body>
<div id="body_wrapper">
<div id="wrapper">
<?php 
$mcart;
if(isset($_SESSION[constant("SESSION_CART")])){
	$mcart = $_SESSION[constant("SESSION_CART")];
}

if(isset($_GET["deleteAll"])){
	if(isset($mcart))
		$mcart->clearCart();
}

if(isset($_POST["curType"])){
	$type = $_POST["curType"];
	$id = $_POST["curId"];
	if($type=="addToOrder"){
		
	}else{
		if(isset($mcart))
			$mcart->OperateCart($id,$type);
	}
}

if(isset($_POST["btnCart"])){
	$hat_id = $_POST["hat_id"];
	$sql = "select * from hat where hat_id='".$hat_id."'";
	$hatservice = new HatService();
	$list = $hatservice->GetRows($sql);
	if($list){
		$hat = new Hat();
		$hat->HatId=$list[0]["hat_id"];		
		$hat->HatName=$list[0]["hat_title"];
		$hat->Price=$list[0]["hat_price"];
		$hat->ImgUrl=$list[0]["hat_path"];
		$hat->Quantity=1;
		if(isset($mcart)){
			$mcart->AddHat($hat);
		}else{
			$mcart = new MyCart();
			$mcart->AddHat($hat);
			$_SESSION[constant("SESSION_CART")] = $mcart;
		}
		
	}
	
}

?>
<?php 
$nav = "&gt; <span>My Cart</span>";
?>
<?php include_once 'Header.php';?>
<div id="main">
<?php include_once 'Category.php';?>
<form id="form1" method="post">	
        <div id="content" class="float_r">
        	<h1>Shopping Cart</h1>
        	<table width="680px" cellspacing="0" cellpadding="5" style="text-align:center" >
                   	  <tr bgcolor="#ddd">
                        	<th width="148" align="center">Image </th> 
                        	<th width="152" align="center">Name </th> 
                       	  	<th width="81" align="center">Price </th> 
                        	<th width="105" align="center">Quantity </th> 
                        	<th width="55" align="center">Total </th> 
                        	<th width="77" align="center">Delete </th> 
                      </tr>
                      
                       <?php
                global $cart;
                if(isset($_SESSION[constant("SESSION_CART")])){
					$cart = $_SESSION[constant("SESSION_CART")];
					if($cart->list){
		                foreach($cart->list as $hat){
		                	echo "<tr>";
		                	echo "<td><a href='../".$hat->ImgUrl."' target='_blank' title='Click to enlarge'><img src='../".$hat->ImgUrl."' width='100' /></a></td>";
		                	echo "<td>".$hat->HatName."</td>";
		                	echo "<td>$".$hat->Price."</td>";
		                	echo "<td>";
		                	echo "<input type=\"button\" value=\"-\" class=\"lless\" onclick=\"moreLessItem('less','".$hat->HatId."')\"  title='Click to decrease quantity'/> ";
		                	echo " <input size='2' type='text' style='text-align:center' readonly='readonly' value='".$hat->Quantity."'/>";
		                	echo " <input type=\"button\" value=\"+\" class=\"lmore\" onclick=\"moreLessItem('more','".$hat->HatId."')\"  title='Click to increase quantity'/>";
		                	echo "</td>";
		                	echo "<td>$".$hat->GetSubTotal()."</td>";
		                	echo "<td>";
							echo "<input type=\"button\" onclick=\"deleteItem(".$hat->HatId.")\" title=\"Delete current row\" value=\"delete\" class=\"submit_btn\"/>";
		                	echo "</td>";
		                	echo "</tr>";
		                }
	                }
                }
                ?>
					</table>
                    <table width="680px" cellspacing="0" cellpadding="5">
                    <tr>
                    <td><input type="hidden" id="curId" name="curId" />
           	 			<input type="hidden" id="curType" name="curType" /></td>
                    </tr>
                     <tr >
                        	<div id="CartTotal"  style="padding-top:10px;text-align:right; background:#ddd; font-weight:bold; height:30px;" class="bread" style="text-align: right; margin-top:10px;">
        SubTotal:&nbsp;&nbsp;<span class="lh"  id="subTotal"><?php if($cart) echo "$".$cart->subTotal;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Grand Total (include GST:<?php echo constant("GST")."%";?>):&nbsp;&nbsp;
        <span class="lh"  id="totalCost"><?php if($cart) echo "$".$cart->totalCost;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="MyCart.php?deleteAll=yes" class="blue">Delete All Hats Above</a>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
						</tr>
                    </table>
                    <input id="isNull" type="hidden" value="<?php if($cart) echo $cart->totalCount;?>"/>
                    <div style="float:right;  margin-top: 20px;">
					<input type="button" id="btnCheckOut" name="btnCheckOut" class="submit_btn" onclick="addToOrders()"  style="float:right; margin-right:20px; margin-top:0px;" value="Proceed to check out"/>
    	<input type="button" id="shopping" name="shopping" class="submit_btn" onclick="continueShopping()"  style="float:right; margin-right:20px; margin-top:0px;" value="Continue shopping"/>
                    	
                    </div>
			</div>
        <div class="cleaner"></div>
    </div>
    

 </form>   
<?php include_once 'Footer.php';?>
</div>
</div>
</body>
</html>
<?php 
if(isset($_GET["checkout"])){
	echo "<script type='text/javascript'>addToOrders();</script>";
}
?>