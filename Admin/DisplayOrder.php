<?php require_once 'include.php';AdminCheck();?>
<?php
global $arr_header;
global $key_id;
$key_id = "order_id";
$arr_header = array(
		"order_number"=>"Order number", 
		"customer_name"=>"Customer name",
		"order_gst"=>"GST", 
		"order_subtotal"=>"Subtotal",
		"order_grandtotal"=>"Grand Total",
		"order_status"=>"Order Status"
		);

global $needEdit;
$needEdit=true;
global $editUrl;
$editUrl = "EditOrder.php";
global $service_list;
global $totalCount;
global $curPage;
global $totalPage;

$service_list = new SupplierService();
$totalCount = $service_list->GetCount("select count(*) from `order`");
$totalPage = $service_list->GetTotalPage($totalCount);
$curPage = $service_list->GetCurrentPage($totalPage);
$sql = " select o.*,(round(o.order_subtotal + ( o.order_gst * o.order_subtotal /100 ),2)) AS order_grandtotal
		,c.customer_name from `order` o, customer c 
		where o.order_customer_id = c.customer_id ";
$sql = $service_list->SetPaging($sql, $curPage);
global $rows;
$rows = $service_list->GetRows($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CRAZY HATS</title>
<script src="../js/Common.js" type="text/javascript"></script>
</head>
<body>
<div id="content" class="float_r">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					
					<td width="5" valign="bottom" class="navigation">&nbsp;
						
					</td>
					<td valign="bottom" class="navigation">
						Order Management--Display Order
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<form  id="pageForm" name="pageForm" method="post" action="DisplayOrder.php">
<?php 
include_once 'DataGrid.php';
?>
</form>
</body>
</html>

<?php 
if( isset($_POST["btnSave"]) ){
	$oId = $_POST['orderId'];
	$status = $_POST['txtEditStatus'];
	$service = new OrderService();
	$id = $service->UpdateStatus($oId,$status);
	if($id!=0){
		alertRedirect(true,'DisplayOrder.php');
	}else{
	alertRedirect(false,'DisplayOrder.php');
	}
}
?>
