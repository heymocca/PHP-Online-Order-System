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
        	 var flag = validation();
        	 if(!flag)
            	 return flag;
             if (document.getElementById("txtEditUrl").value == "") {
                flag = false;
                document.getElementById("txtEditUrlError").innerHTML = "This is a required item";
             }
            
             return flag;
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
                            Product Management--Add New Hat
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

<form id="editForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
                        <td>
						    <table width="100%" border='0' cellpadding="0" cellspacing="0">
							  </tr>
                              <tr>
									<td class="typeField"  height="30">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="front">Hat Title:</span>
                                    </td>
                                    <td class="typeField"  height="30" style="width:80%" >
							     	<input type="text" id="txtEditTitle" name="txtEditTitle"
                                      validate="required" maxlength="200" class="text400"/>
                                     <font color="red">*</font>
                                    <font id="txtEditTitleError" color="red"></font>
					          	   </td>
					         </tr>
                             <tr>
									<td class="typeField"  height="30">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="front">Hat Image:</span>
                                    </td>

                                    <td class="typeField"  height="30" style="width:80%" >
							     	<input type="file" id="txtEditUrl" name="txtEditUrl" 
                                     class="other200"/>
                                    <font color="red">*</font>
                                    <font id="txtEditUrlError" color="red"></font>
                                    <input type="hidden" name="imageUrl" id="imageUrl" value="" />
					          	   </td>
					         </tr>
                             
                             <tr>
									<td class="typeField"  height="30">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="front">Hat Price:</span>
                                    </td>
                                    <td class="typeField"  height="30" style="width:80%" >
							     	<input type="text" id="txtEditPrice" name="txtEditPrice" 
                                     validate="required,dollar" maxlength="7" class="text50" />
                                    <font color="red">*</font>
                                    <font id="txtEditPriceError" color="red"></font>
					          	   </td>
					         </tr>
                             <tr>
									<td class="typeField"  height="30">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="front">Hat Cagetory:</span>
                                    </td>
                                    <td class="typeField"  height="30" style="width:80%" >
							     	<select id="selCategory" name="selCategory"  
                                    class="other300" onchange="select_change(this.value,'txtEditCatetoryId')">
                                    <?php 
                                    	global $cid;	
                                    	$cid = showOptions("select * from category");
                                    ?>
                                    </select>
                                    <font color="red">*</font>
                                    <font id="txtEditCatetoryIdError" color="red"></font>
                                    <input type="hidden" id="txtEditCatetoryId" name="txtEditCatetoryId" value="<?php echo $cid?>" />
					          	   </td>
					         </tr>
                             <tr>
									<td class="typeField"  height="30">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="front">Hat Suppliers:
                                    </span>
                                    </td>
                                    <td class="typeField"  height="30" style="width:80%; " >
                                    <select id="suppliers"   class="other300" style="margin-top:2px"
                                     onchange="select_change(this.value,'txtEditSupplierId')">
                                    <?php 
                                    	showOptions("select * from supplier");
                                    ?>
                                    </select>
                                    <font color="red">*</font>
                                    <font id="suppliers_idsError" color="red"></font>
                                    <input type="hidden" id="txtEditSupplierId" name="txtEditSupplierId" value="<?php echo $sid?>" />
					          	   </td>
					         </tr>
                             <tr>
									<td class="typeField"  height="30" >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="front">Search Keyword:</span>
                                   </td>
                                    <td class="typeField" height="30" style="width:80%">
							     	<input type="text" id="txtEditKeyword" name="txtEditKeyword" 
                                     validate="required" maxlength="100" class="text300" />
                                    <font color="red">*</font>
                                    <font id="txtEditKeywordError" color="red"></font>
					          	   </td>
					         </tr>
                             <tr>
									<td class="typeField"  height="30" >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="front">Is Hot Sale:</span>
                                   </td>
                                    <td class="typeField" height="30" style="width:80%">
							     	<select id="selhot" name="selhot"  
                                    class="other100" onchange="select_change(this.value,'ishotsale')">
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                    </select>
                                    <input type="hidden" id="ishotsale" name="ishotsale" value="yes"/>
					          	   </td>
					         </tr>
                             <tr>
									<td class="typeField" height="30">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span class="front">Description:</span>
                                    </td>
                                    <td class="typeField"  height="30" style="width:80%" >
							     	<textarea id="txtEditDesc" name="txtEditDesc" onpropertychange="checkLength(this,1000);" oninput="checkLength(this,1000);"
                                     validate="required" rows="15" cols="60" 
                                    style=" margin-top:5px; margin-bottom:5px" ></textarea>
                                    <font color="red">*</font>
                                    <font id="txtEditDescError" color="red"></font>
					          	   </td>
					         </tr>
                             <tr><p></p>
									<td style="height:26px" style="text-align:center">
                                     <input  type="submit" id="btnSave" name="btnSave"  class="submit_btn" onclick="return save()" value="Save"/>
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
	
	$path = constant("IMG_PATH");
	$name = date('YmdHis').floor(microtime()*10000);
	$name.=rand(100,999);
	$pathinfo = pathinfo($_FILES["txtEditUrl"]["name"]);
	$name.=".".$pathinfo['extension'];
	
	
	move_uploaded_file($_FILES["txtEditUrl"]["tmp_name"],"../".$path."/".$name);
	
	
	$path.="/".$name;
	
	$service = new HatService();
	$sql = ' insert into hat ';
	$url = $path;
	$title = $_POST["txtEditTitle"];
	$price = $_POST["txtEditPrice"];
	$category = $_POST["txtEditCatetoryId"];
	$suppliers = $_POST["txtEditSupplierId"];
	$keyword = $_POST["txtEditKeyword"];
	$hot = $_POST["ishotsale"];
	$descr = $_POST["txtEditDesc"];
	
	$dataArray = array(
		"hat_title"=>"'".$title."'",
		"hat_category_id"=>"'".$category."'",
		"hat_price"=>"'".$price."'",
		"hat_description"=>"'".$descr."'",
		"hat_search_keyword"=>"'".$keyword."'",
		"is_hot_sale"=>"'".$hot."'",
		"hat_path"=>"'".$url."'"
		);
	$sql.=$service->GetInsertSQL($dataArray);
	$id = $service->SaveHat($sql,$suppliers);
	if($id!=0){
		alertRedirect(true,'DisplayHat.php');
	}else{
	alertRedirect(false,'DisplayHat.php');
	}
}

?>
