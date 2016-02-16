<?php include_once 'include.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRAZY HATS - User Account</title>
<meta name="description" content="CRAZY HATS" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<link rel="stylesheet" href="../css/ddsmoothmenu.css" type="text/css" />

<?php include_once 'include.php';?>
<?php 
customerCheck();
if(isset($_GET["checkout"])){
	$os = new OrderService();
	if($os->InseterOrder()!=0){
		if(isset($_SESSION[constant("SESSION_CART")])){
			$mcart = $_SESSION[constant("SESSION_CART")];
			if(isset($mcart))
				$mcart->clearCart();
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
CRAZY HATS
</title>
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<script type="text/javascript" src="../js/Common.js"></script>
<script type="text/javascript" >
	function select_order(value){
		window.location.href = "MyOrder.php?orderAction="+value;
	}
</script>
</head>
<body>
<?php
global $customer;
global $orders;
global $order;
global $orderItems;
global $order_id;
$customer = $_SESSION["customer"];
$custId = $customer->CustId;

$oService = new OrderService();
$sql = "select o.*,(round(o.order_subtotal + ( o.order_gst * o.order_subtotal /100 ),2)) AS order_grandtotal
		 from `order` o where o.order_customer_id = '".$custId."' order by o.order_id desc";
$orders = $oService->GetRows($sql);

if(isset($_GET["orderAction"])){
	$order_id = $_GET["orderAction"];
}else{
	if($orders){
		$order_id = $orders[0]["order_id"];
	}
}

if($order_id){
	$itemService = new OrderItemService();
	$sql = "select o.*, round((o.item_quantity*o.item_price),2) as item_subtotal,h.hat_title from order_item o,hat h where o.item_hat_id=h.hat_id and item_order_id='".$order_id."'";
	$orderItems = $itemService->GetRows($sql);
}

?>
<div id="body_wrapper">
  <div id="wrapper">
<?php include_once 'Header.php';?>
	<div id="main">
<?php include_once 'Category.php';?>
<div id="content" class="float_r">
  <h4>User Account</h4>
  <table style=" width:200px; border:1px">
    <tr height="30">
      <td nowrap="nowrap" style="text-align:left;"><font style="font-weight:bold;" >User Name:</font></td>
      <td nowrap="nowrap" style="text-align:left;"><span id="name" class="spanMargin" >
	  <?php echo $customer->CustName;?></span>
      </td>
    </tr>
    <tr height="30">
      <td nowrap="nowrap" style="text-align:left;"><font style="font-weight:bold;" >Password:</font></td>
      <td nowrap="nowrap" style="text-align:left;"><span id="pwd" class="spanMargin">
      <?php echo $customer->Password;?></span>
      </td>
    </tr>
    <tr height="30">
      <td nowrap="nowrap" style="text-align:left;"><font style="font-weight:bold;" >Home Phone:</font></td>
      <td nowrap="nowrap" style="text-align:left;"><span id="home"  class="spanMargin">
      <?php echo $customer->HomePhone;?></span>
      </td>
    </tr>
    <tr height="30">
      <td nowrap="nowrap" style="text-align:left;"><font style="font-weight:bold;" >Work Phone:</font></td>
      <td nowrap="nowrap" style="text-align:left;"><span id="work"  class="spanMargin">
      <?php echo $customer->WorkPhone;?></span>
      </td>
    </tr>
    <tr height="30">
      <td nowrap="nowrap" style="text-align:left;"><font style="font-weight:bold;" >Mobile Phone:</font></td>
      <td nowrap="nowrap" style="text-align:left;"><span id="mobile"  class="spanMargin">
      <?php echo $customer->MobilePhone;?></span>
      </td>
    </tr>
    </tr>
    <tr height="30">
      <td nowrap="nowrap" style="text-align:left;"><font style="font-weight:bold;" >User Email:</font></td>
      <td nowrap="nowrap" style="text-align:left;"><span id="email"  class="spanMargin">
      <?php echo $customer->Email;?></span>
      </td>
    </tr>
  </table> 
  <br />
  <h4>Order List: 
   <?php 
	 if(!$orders){
		echo "<font style='font-weight:bold;' >You have no orders</font>";
	 }else{
		 echo '<select id="orders" name="orders" style="width:150px;"';
		 echo ' onchange="select_order(this.value)">';
		 foreach($orders as $value){
			echo '<option value="'.$value['order_id'].'" ';
			if($order_id && $order_id == $value['order_id']){
				echo "selected='selected'";
				$order = $value;
			}
			echo '>'.$value['order_number'].'</option>';
		 }
		 echo'</select>';
	 }
   ?>
  </h4>
   <table style=" width:200px; border:1px">
    <tr height="30">
      <td nowrap="nowrap" style="text-align:left;"><font style="font-weight:bold;" >Order Number:</font></td>
      <td nowrap="nowrap" style="text-align:left;"><span id="orderNum" >
	  <?php if($order){ echo $order["order_number"]; }?></span
      ></td>
    </tr>
    <tr height="30">
      <td nowrap="nowrap" style="text-align:left;"><font style="font-weight:bold;" >Order Status:</font></td>
      <td nowrap="nowrap" style="text-align:left;"><span id="OrderStatus" >
	  <?php if($order){ echo $order["order_status"]; }?></span>
      </td>
    </tr>
    <tr height="30">
      <td nowrap="nowrap" style="text-align:left;"><font style="font-weight:bold;" >Total Cost:</font></td>
      <td nowrap="nowrap" style="text-align:left;"><span id="subtotal" >
	  <?php if($order){ echo $order["order_grandtotal"]; }?></span>
      </td>
    </tr>
  </table>
  
  
  
     
  </div>
<div class="cleaner"></div>
</div>
<?php include_once 'Footer.php';?>
  </div>
</div>
</body>
</html>