<?php include_once 'include.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRAZY HATS - Contact Us</title>
<meta name="description" content="CRAZY HATS" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
<link rel="stylesheet" href="../css/ddsmoothmenu.css" type="text/css" />
<script type="text/javascript" src="../js/Common.js"></script>
</head>
<body>
<div id="body_wrapper">
  <div id="wrapper">
<?php include_once 'Header.php';?> 
	<div id="main">
<?php include_once 'Category.php';?>
 <div id="content" class="float_r">
        <h1>Contact Us</h1>
        <iframe frameborder="0" height="400px" id="theframe" scrolling="no" src="GoogleMap.php" width="90%"></iframe>
        <div class="content_half float_l">
            <p></p>
            <div id="contact_form">
               <form method="post" name="contact" action="#">
                    
                    <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                    <div class="cleaner h10"></div>
                    <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                    <div class="cleaner h10"></div>
                    
                    <label for="phone">Phone:</label> <input type="text" name="phone" id="phone" class="input_field" />
                    <div class="cleaner h10"></div>
    
                    <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                    <div class="cleaner h10"></div>
                    
                    <input type="submit" class="submit_btn" name="submit" id="submit" value="Send" />
                    
                </form>
            </div>
        </div>
    <div class="content_half float_r">
    <p></p>
        <h5>Primary Office</h5>
        139 Carrington Rd <br />
        Mount Albert, Auckland 1025<br /><br />
        Phone: 09-815 4321<br />
        Email: <a href="mailto:info@yourcompany.com">info@crazyhats.com</a><br/>
        <div class="cleaner h40"></div>
    </div>
    </div> 
    <div class="cleaner"></div>
    </div>
<?php include_once 'Footer.php';?>
  </div>
</div>
</body>
</html>