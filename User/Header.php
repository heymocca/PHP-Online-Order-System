
	<div id="header">
    	<div id="site_title"><h1><a href="Main.php">Online Shopping Store</a></h1></div>
        <div id="header_right">
        	<p>
           <?php 
			echo'
            <a href="Main.php" >Home</a>  |
            <a href="MyCart.php" >Shopping Cart</a> |
            <a href="MyOrder.php" >My Account</a> |
            <a href="Contact.php" >Contact Us </a> |';
			if(isset($_SESSION["customer"])){
            	echo '<a href="Main.php?logout=true" id="logout"> Logout</a> |';
            
			}else
			{
				echo'
				<a href="Login.php" id="login">Login</a> |
				<a href="Register.php"  id="register">Register</a> |';
				}
			?>
            </p>
            <p>
            	<span><strong>Welcome:&nbsp;<span class="lh"><?php if(isset($_SESSION["customer"])){echo $_SESSION["customer"]->CustName;}?></span></strong></span>
			</p>
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of header -->
    
    <div id="menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="Main.php" class="selected">Home</a></li>
                <li><a href="DisplayAllHats.php">Products</a></li>
                <li><a href="About.php">About</a></li>
                <li><a href="Contact.php">Contact Us</a></li>
                <li><a href="../Admin/Login.php" target="_blank">Admin Login</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
        <div id="search">
            <form action="#" method="get">
              <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of menubar -->

