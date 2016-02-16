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
<div id="content" class="float_r">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						
						<td style="width:5px" valign="bottom" class="navigation">&nbsp;
							
						</td>
						<td valign="bottom" class="navigation">
                            Supplier Management--Add Supplier
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

<form id="editForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
                        <td>
						    <table width="100%" border='0' cellpadding="0" cellspacing="0">
							  </tr>
                              <tr>
									<td class="typeField"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span>Supplier Name:</span>
                                    </td>
                                    <td class="typeField"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditName" name="txtEditName"
                                      validate="required" maxlength="50" class="text300"/>
                                    <font color="red">*</font>
                                    <font id="txtEditNameError" color="red"></font>
					          	   </td>
					         </tr>

                              <tr>
									<td class="typeField"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span>Home Phone:</span>
                                    </td>
                                    <td class="typeField"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditHomePhone" name="txtEditHomePhone"
                                      validate="phone" maxlength="20" class="text200"/>
                                    <font id="txtEditHomePhoneError" color="red"></font>
					          	   </td>
					         </tr>

                              <tr>
									<td class="typeField"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span>Work Phone:</span>
                                    </td>
                                    <td class="typeField"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditWorkPhone" name="txtEditWorkPhone"
                                      validate="phone" maxlength="20" class="text200"/>
                                    <font id="txtEditWorkPhoneError" color="red"></font>
					          	   </td>
					         </tr>

                             <tr>
									<td class="typeField"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span>Mobile Phone:</span>
                                    </td>
                                    <td class="typeField"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditMobilePhone" name="txtEditMobilePhone"
                                      validate="required,mobile" maxlength="20" class="text200"/>
                                    <font color="red">*</font>
                                    <font id="txtEditMobilePhoneError" color="red"></font>
					          	   </td>
					         </tr>

                             <tr>
									<td class="typeField"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span>Fax Number:</span>
                                    </td>
                                    <td class="typeField"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditFaxNumber" name="txtEditFaxNumber"
                                      validate="phone" maxlength="20" class="text200"/>
                                    <font id="txtEditFaxNumberError" color="red"></font>
					          	   </td>
					         </tr>
                              <tr>
									<td class="typeField"  height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span>Address:</span>
                                    </td>
                                    <td class="typeField"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditSupplierAddress" name="txtEditSupplierAddress"
                                      validate="required" maxlength="100" class="text400"/>
                                    <font color="red">*</font>
                                    <font id="txtEditSupplierAddressError" color="red"></font>
					          	   </td>
					         </tr>
                             <tr>
									<td style="height:26px">
                                     <input  type="submit" id="btnSave" name="btnSave" class="submit_btn" onclick="return save()" value="Save"/>
									</td>
                                    <td style="height:26px;width:80%" >
									</td>


                            </table>
                        </td>
					</tr>
			  </table>
			</td>
		</tr>
    </table>

   
    <input id="supplier_id" type="hidden" value=""  />
    </form>
     </div>
</body>
</html>

<?php
if(isset($_POST['btnSave']))
{
	$service = new SupplierService();
	$sql = ' insert into supplier ';
	
	$name = $_POST["txtEditName"];
	$home = $_POST["txtEditHomePhone"];
	$work = $_POST["txtEditWorkPhone"];
	$mobile = $_POST["txtEditMobilePhone"];
	$fax = $_POST["txtEditFaxNumber"];
	$address = $_POST["txtEditSupplierAddress"];
	
	
	$dataArray = array(
		"supplier_name"=>"'".$name."'",
		"supplier_home_phone"=>"'".$home."'",
		"supplier_work_phone"=>"'".$work."'",
		"supplier_mobile_phone"=>"'".$mobile."'",
		"supplier_fax_number"=>"'".$fax."'",
		"supplier_address"=>"'".$address."'"
		);
	$sql.=$service->GetInsertSQL($dataArray);
	$id = $service->save($sql);
	if($id!=0){
		alertRedirect(true,'DisplaySupplier.php');
	}else{
	alertRedirect(false,'DisplaySupplier.php');
	}
}

?>