<?php include_once 'include.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRAZY HATS</title>
<meta name="keywords" content="CRAZY HATS" />
<meta name="description" content="CRAZY HATS" />
<title>CRAZY HATS</title>
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<link rel="stylesheet" href="../css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/ddsmoothmenu.css" type="text/css" />
<script type="text/javascript" src="../js/Common.js"></script>
<script type="text/javascript" src="../User/js/jquery.min.js"></script>
<script type="text/javascript" src="../User/js/ddsmoothmenu.js"></script>
     <script type="text/javascript">

         $(document).ready(function () {
             window.onload = function () {
                 document.getElementById("mainIframe").height = ($(window).height() - 83 - 35) + "px";
                 mouseClick(document.getElementById("firstTd"), 'DisplayHat.php');
             }

             $("a").click(function () {
                 var id = $(this).text();
                 var url = document.getElementById(id).value;
                 document.getElementById("mainIframe").src = $(this).attr("name") + url;
             });
         });

         var currentTd;
		 
         function mouseClick(td, url) {
             
             currentTd = td;
             //window.parent.mainFrame.location = url;
             document.getElementById("mainIframe").src = url;
         }
         function logout(url) {
             window.location.href = url+"?logout=true";
         }
     </script>
</head>

<body>

<div id="body_wrapper">
<div id="wrapper">

	<div id="header">
    	<div id="site_title"><h1><a href="../User/Main.php" target="_blank">Online Shopping Store</a></h1></div>
        <div id="header_right">
        	<p>
           <?php 
			
			if(isset($_SESSION["admin"])){
            	echo '<a href="Login.php?logout=true" id="logout"> Logout</a> | ';
            
			}else
			{
				echo'
				<a href="Login.php" id="login">Login</a> | ';
				}
				echo'<a href="../User/Main.php" >Back To Crazy Hat</a>';
			?>
            </p>
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of header -->
   
   
    
    <div id="main">
    <table id="mainTable" cellpadding="0" cellspacing="0" width="100%" align="center" border="1"  style="text-align:center">
    <tr valign="top">
       <td valign="top" width="190">
           
		    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr >
				    <td height="23" onclick="mouseClick(this, 'DisplayHat.php');" style="cursor:pointer;" class="submit_btn"                     title="">
                    <strong>Hat Management</strong>
                    </td>
			    </tr>
                <tr>
				    <td><hr></td>
			    </tr>
                <tr>
				    <td height="23" onclick="mouseClick(this, 'DisplayCategory.php');" style="cursor:pointer;" class="submit_btn"
                     title="">
                    <strong>Category Management</strong>
                    </td>
			    </tr>
                <tr>
				     <td><hr></td>
			    </tr>
                <tr>
				    <td height="23" id="firstTd" onclick="mouseClick(this, 'DisplaySupplier.php');" style="cursor:pointer;" class="submit_btn"
                     title="">
                   <strong>Supplier Management</strong>
                    </td>
			    </tr>
			    <tr>
				    <td><hr></td>
			    </tr>
			    
                <tr>
				    <td height="23" onclick="mouseClick(this, 'DisplayCustomer.php');" style="cursor:pointer;" class="submit_btn"
                     title="">
                    <strong>Customer Management</strong>
                    </td>
			    </tr>
                <tr>
				    <td><hr></td>
			    </tr>
                <tr>
				    <td height="23" onclick="mouseClick(this, 'DisplayOrder.php');" style="cursor:pointer;" class="submit_btn"
                     title="">
                    <strong>Order Management</strong>
                    </td>
			    </tr>
                <tr>
				    <td><hr></td>
			    </tr>
		    </table>
		 </td>
        <td>
            <iframe id="mainIframe" name="mainIframe" frameborder="0" width="100%"></iframe>
        </td>
     </tr>
   </table>
        <div class="cleaner"></div>
    </div> <!-- END of main -->
</div> <!-- END of wrapper -->
</div> <!-- END of body_wrapper -->

</body>
</html>
