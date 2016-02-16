<?php require_once 'include.php';AdminCheck();?>
<?php
global $arr_header;
global $key_id;
$key_id = "category_id";
$arr_header = array(
		"category_title"=>"category title");

global $needEdit;
$needEdit=false;
//global $editUrl;
//$editUrl = "Login.php";
global $service_list;
global $totalCount;
global $curPage;
global $totalPage;



$service_list = new CategoryService();
global $rows;
$totalCount = $service_list->GetCount("select count(*) from category");
$totalPage = $service_list->GetTotalPage($totalCount);
$curPage = $service_list->GetCurrentPage($totalPage);
$sql = " select * from category ";
$sql = $service_list->SetPaging($sql, $curPage);
$rows = $service_list->GetRows($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CRAZY HATS</title>
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
						Category Management--Display Category
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<form  id="pageForm" method="post" action="Display.php">
<table width="100%">
<tr>
	<td width="100%" height="26">
        <input type="button" id="btnNew" value="Add Category" 
        class="submit_btn" onclick="goToEditPage('AddCategory.php')"/>
    </td>
</tr>
</table>
</div>
<br/>
<?php 
include_once 'DataGrid.php';
?>

</form>
</body>
</html>
