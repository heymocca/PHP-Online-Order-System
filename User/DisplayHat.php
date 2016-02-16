     <div id="content" class="float_r">
        	<div id="slider-wrapper">
                <div id="slider" class="nivoSlider">
                    <img src="../images/slider/02.jpg" alt="" />
                    <img src="../images/slider/03.jpg" alt="" />
                    <img src="../images/slider/04.jpg" alt="" />
                </div>
            </div>
            <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
            <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
            <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script>
            <?php
	        	
	        	if($hats){
		        	foreach($hats as $hat){
			        	echo "<div class='product_box'>";
			        	echo"<p>";
			        	echo"<a href='Hat.php?hatId=".$hat["hat_id"]."' title='".$hat["hat_title"]."'>";
			        	echo"<img src='../".$hat["hat_path"]."' alt='hat image' />";
			        	echo"</a></p>";
			        	echo"<p><a href='Hat.php?hatId=".$hat["hat_id"]."' title='".$hat["hat_title"]."'>".$hat["hat_title"]."</a>";
			        	echo"<br />";
			        	echo"<span class='lh'>$".$hat["hat_price"]."</span></p></div>";
		        	}
	        	}
			  ?>
        </div> 

