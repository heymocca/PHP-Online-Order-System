<?php require_once 'include.php';AdminCheck();?>
<?php
global $arr_header;
global $key_id;
global $img;
global $ititle;
$img = "hat_path";
$ititle = "hat_description";
$key_id = "hat_id";
$arr_header = array(
		"hat_title"=>"Hat title",
		"hat_path"=>"Image",
		"category_title"=>"Category title",
		"hat_price"=>"Hat price",
		"suppliers"=>"Supplier name",
		"hat_search_keyword"=>"Keyword",
		"is_hot_sale"=>"Hot sale");

global $needEdit;
$needEdit=false;
//global $editUrl;
//$editUrl = "Login.php";
global $service_list;
global $totalCount;
global $curPage;
global $totalPage;

$service_list = new SupplierService();
$totalCount = $service_list->GetCount("select count(*) from hat");
$totalPage = $service_list->GetTotalPage($totalCount);
$curPage = $service_list->GetCurrentPage($totalPage);
$sql = " select h.*, c.category_title, ";
$sql .= " (select group_concat( t.supplier_name ) from (select m.map_hat_id, s.supplier_name from map_hat_supplier m, supplier s  where m.map_supplier_id = s.supplier_id ) t where t.map_hat_id =h.hat_id) as suppliers";
$sql .= "  from hat h, category c where h.hat_category_id = c.category_id order by h.hat_id";
$sql = $service_list->SetPaging($sql, $curPage);
global $rows;
$rows = $service_list->GetRows($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CRAZY HATS</title>
<link rel="stylesheet" href="../css/style2.css" type="text/css" />
<script src="../js/Common.js" type="text/javascript"></script>
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
<div id="content" class="float_r">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					
					<td width="5" valign="bottom" class="navigation">&nbsp;
						
					</td>
					<td valign="bottom" class="navigation">
						Product Management--Display Hat
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<form  id="pageForm" method="post" action="DisplayHat.php">
<table width="100%">
<tr>
	<td width="100%" height="26">
        <input type="button" id="btnNew" class="submit_btn" value="Add New Hat" 
         onclick="goToEditPage('AddHat.php')"/>
    </td>
</tr>
</table>

<br/>
<?php 
include_once 'DataGrid.php';
?>

</form>
</body>
</html>
