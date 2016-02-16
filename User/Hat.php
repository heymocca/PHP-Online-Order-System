<?php include_once 'include.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRAZY HATS - Product Detail</title>
<meta name="keywords" content="CRAZY HATS" />
<meta name="description" content="CRAZY HATS" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<link rel="stylesheet" href="../css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/ddsmoothmenu.css" type="text/css" />
<script type="text/javascript" src="../js/Common.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
</head>

<body>
<div id="body_wrapper">
<div id="wrapper">
<?php 
if(isset($_GET["hatId"])){
	$hatId = $_GET["hatId"];
	$service = new HatService();
	$sql = "select h.hat_id,h.hat_path,h.hat_description,h.hat_price,c.category_title,h.hat_title,c.category_id, ";
	$sql.=" (select group_concat( t.supplier_name ) from (select m.map_hat_id, s.supplier_name from map_hat_supplier m, supplier s where m.map_supplier_id = s.supplier_id ) t where t.map_hat_id =h.hat_id) as suppliers ";
	$sql.=" from hat h, category c where h.hat_category_id = c.category_id and hat_id='".$hatId."'";
	$rows = $service->GetRows($sql);
	global $hat;
	$hat = $rows[0];
	$nav = "&gt; <a href='DisplayCategory.php?cateName=".urlencode($hat["category_title"])."&cateId=".urlencode($hat["category_id"])."'>".$hat["category_title"]."</a>";
	$nav .="&gt; <span>".$hat["hat_title"]."</span>";
}
?>
<?php include_once 'Header.php';?>
<div id="main">
<?php include_once 'Category.php';?>

<form  id="form1" action="MyCart.php" method="post">
 <div id="content" class="float_r">
      <h3>Hat Detail</h3>
      <div class="content_half float_l">
      <img src="../<?php echo $hat["hat_path"]?>" alt="image" />
      </div>
      <div class="content_half float_r" >
          <table>
          	   <tr height="30">
                  <td width="60"><strong>Hat ID:</strong></td>
                  <td><?php echo $hat["hat_id"]?></td>
              </tr>
              <tr height="30">
                  <td width="60"><strong>Name:</strong></td>
                  <td><?php echo $hat["hat_title"]?></td>
              </tr>
              <tr height="30">
                  <td><strong>Price:</strong></td>
                  <td>$<?php echo $hat["hat_price"]?></td>
              </tr>
              <tr height="30">
                  <td><strong>Category:</strong></td>
                  <td><?php echo $hat["category_title"]?></td>
              </tr>
              <tr height="30">
                  <td><strong>Supplier:</strong></td>
                  <td><?php echo $hat["suppliers"]?></td>
              </tr>
          </table>
          <div class="cleaner h20"></div>
          <p><input type="hidden" id="hat_id" name="hat_id" value="<?php echo $hat["hat_id"]?>"/></p>
          <p><input type="submit" id="btnCart" name="btnCart" class="submit_btn" value="add to cart"/></p>
      </div>
      <div class="cleaner h30"></div>      
      <h5>Product Description</h5>
      <p><?php echo $hat["hat_description"]?></p>	
      </div>
     </form> 
<div class="cleaner"></div>       
</div>

<?php include_once 'Footer.php';?>
</div>
</div>
</body>
</html>