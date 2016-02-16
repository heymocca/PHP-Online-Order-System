<?php require_once 'include.php';AdminCheck();?>
<?php
global $arr_header;
global $key_id;
$key_id = "customer_id";
$arr_header = array(
		"customer_name"=>"Customer name", 
		"customer_password"=>"Password",
		"customer_home_phone"=>"Home phone", 
		"customer_work_phone"=>"Work phoe",
		"customer_mobile_phone"=>"Mobile phone",
		"customer_fax_number"=>"Fax number",
		"customer_email"=>"Email",
		"customer_status"=>"Status");

global $needEdit;
$needEdit=true;
global $editUrl;
$editUrl = "DisplayCustomer.php";
global $service_list;
global $totalCount;
global $curPage;
global $totalPage;

$service_list = new SupplierService();
$totalCount = $service_list->GetCount("select count(*) from customer");
$totalPage = $service_list->GetTotalPage($totalCount);
$curPage = $service_list->GetCurrentPage($totalPage);
$sql = " select * from customer ";
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
						Customer Management--Display Customer
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<form  id="pageForm" name="pageForm" method="post" action="DisplayCustomer.php">
<?php 
include_once 'DataGrid.php';
?>
</form>
</body>
</html>

<?php 
if( isset($_GET["customer_id"]) ){
	$custId = $_GET['customer_id'];
	$service = new CustomerService();
	$id = $service->UpdateStatus($custId);
	if($id!=0){
		alertRedirect(true,'DisplayCustomer.php');
	}else{
	alertRedirect(false,'DisplayCustomer.php');}
}
?>
