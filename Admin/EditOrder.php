<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php require_once 'include.php';AdminCheck();?>
<html>
<head >
    <title>CRAZY HATS</title>
    <link rel="stylesheet" href="../css/style2.css" type="text/css" />
    <script src="../js/Validation.js" type="text/javascript"></script>
    <script src="../js/Common.js" type="text/javascript"></script>
    <script type="text/javascript">
        function save(){
            if(!validation()){
				return false;
            }
            return true;
        }
    </script>
    <style type="text/css">
.submit_btn { 
	padding: 5px 12px; 
	text-align: center; 
	text-decoration: none; 
	font-weight: bold;
	background-color: #404040; 
	border: 1px solid #fff; 
	color: #fff; 
	font-size:12px; 
	cursor: pointer;
}
</style>
</head>
<body>
<?php
global $order;
$orderId = $_GET["order_id"];
$service = new OrderService();
$sql = "select *, (round(o.order_subtotal + ( o.order_gst * o.order_subtotal /100 ),2)) AS order_grandtotal from `order` o,customer c where o.order_customer_id = c.customer_id and o.order_id='".$orderId."'";
$orows = $service->GetRows($sql);
if(count($orows)!=0){
	$order = $orows[0];
}
?>
<div id="content" class="float_r">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						
						<td style="width:5px" valign="bottom" class="navigation">&nbsp;
							
						</td>
						<td valign="bottom" class="navigation">
                            Category Management--Edit Category
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

<form id="editForm" action="DisplayOrder.php" method="post" >
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
                        <td>
						    <table width="100%" border='0' cellpadding="0" cellspacing="0">
							    <tr>
									<td style="height:26px"  class="toolBar">
                             			<input  type="submit" id="btnSave" name="btnSave" class="submit_btn" onsubmit="return save()" value="Save"/>
									</td>
                                    <td style="height:26px;width:80%" class="toolBar">
									</td>
							  </tr>
                              <tr>
									<td class="typeField" bgcolor="#FCFBF8"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span ID="lblStatus" >Order Status:</span>
                                    </td>
                                    <td class="typeField" bgcolor="#FCFBF8"  height="30"  style="width:80%" >
                                    

							     	<select id="selStatus" name="selStatus"  
                                    class="other100" style="margin-bottom:2px;margin-top:4px;" 
                                     onchange="select_change(this.value,'txtEditStatus')">
                                    <option value="waiting" <?php if($order["order_status"]=="waiting"){echo "selected='selected'";}?> >waiting</option>
                                    <option value="shipped" <?php if($order["order_status"]=="shipped"){echo "selected='selected'";}?>>shipped</option>
                                    </select>
                                    <br />
                                    <input type="hidden"
                                    id="txtEditStatus" name="txtEditStatus" value="<?php echo $order["order_status"]?>" />
                                    
					          	   </td>
                                   
					         </tr>
                             <tr>
                                    <td class="typeField" bgcolor="#FCFBF8"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span ID="lblOrderId" >Order Number:</span>
                                    </td>
                                    <td class="typeField" bgcolor="#FCFBF8"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditOrderNumber" name="txtEditOrderNumber"
                                      disabled="disabled" maxlength="20" class="text200" value="<?php echo $order["order_number"]?>" />
					          	   </td>
                             </tr>

                              <tr>
                                    
									<td class="typeField" bgcolor="#FCFBF8"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span ID="lblTitle" >Customer Name:</span>
                                    </td>
                                    <td class="typeField" bgcolor="#FCFBF8"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditName" name="txtEditName"
                                      disabled="disabled" maxlength="50" class="text200" value="<?php echo $order["customer_name"]?>" />
					          	   </td>
                                </tr>
                                 <tr>
									<td class="typeField" bgcolor="#FCFBF8"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span ID="Label3" >Order GST</span>
                                    </td>
                                    <td class="typeField" bgcolor="#FCFBF8"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditGst" name="txtEditGst"
                                      disabled="disabled" maxlength="20" class="text100" value="<?php echo $order["order_gst"]?>" />
					          	   </td>
					         </tr>

                              <tr>
									<td class="typeField" bgcolor="#FCFBF8"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span ID="lblSubtotal" >Order Subtotal:</span>
                                    </td>
                                    <td class="typeField" bgcolor="#FCFBF8"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditSubtotal" name="txtEditSubtotal"
                                      disabled="disabled" maxlength="20" class="text200" value="<?php echo $order["order_subtotal"]?>" />
					          	   </td>
                                   </tr>
                                 <tr>
									<td class="typeField" bgcolor="#FCFBF8"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span ID="Label4" >Grand total:</span>
                                    </td>
                                    <td class="typeField" bgcolor="#FCFBF8"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditGrandTotal" name="txtEditGrandTotal"
                                      disabled="disabled" maxlength="20" class="text200" value="<?php echo $order["order_grandtotal"]?>" />
					          	   </td>
					         </tr>

                            </table>
                        </td>
					</tr>
			  </table>
			</td>
		</tr>
    </table>
   <input type="hidden" name="orderId" id="orderId" value="<?php echo $order["order_id"]?>" >
    </form>
     <?php 
    global $orderItems;
    if($order){
    	$itemService = new OrderItemService();
    	$sql = "select o.*, round((o.item_quantity*o.item_price),2) as item_subtotal,h.hat_title from order_item o,hat h where o.item_hat_id=h.hat_id and item_order_id='".$order["order_id"]."'";
    	$orderItems = $itemService->GetRows($sql);
    }
    ?>
    <br/>
    <div id="div1" style="overflow: hidden">
    	<div id="div2">
            <font>&nbsp;&nbsp;&nbsp;Order items:</font>
                <table class="border" id="pgList_gvList" style="color:#333333;width:100%;border-collapse:collapse;">
                    <tr class="tableHeader">
                        <th align='left' scope='col'>Hat Name</th>
                        <th align='left' scope='col'>Price</th>
                        <th align='left' scope='col'>Quantity</th>
                        <th align='left' scope='col'>SubTotal</th>
                    </tr>
                    <?php
                    $i=0;
                    if($orderItems){
	                    foreach( $orderItems as $item ){
							if($i%2==0){
								echo "<tr class='odd'>";
							}else{
								echo "<tr class='even'>";
							}
	                    	echo "<td>".$item["hat_title"]."</td>";
	                    	echo "<td>".$item["item_price"]."</td>";
	                    	echo "<td>".$item["item_quantity"]."</td>";
	                    	echo "<td>".$item["item_subtotal"]."</td>";
	                    	echo "</tr>";
	                    	$i++;
	                    }
                    }
                    ?>
                </table>
     </div>
</body>
</html>

