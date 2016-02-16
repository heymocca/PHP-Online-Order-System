<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>Categories</h3>   
                <div class="content"> 
                     <?php
					$cservice = new CategoryService();
					$category = $cservice->CategorysForSite();
					foreach($category as $row){
						echo "<ul class='sidebar_list' style='margin-left:10px'><li class='first'>";
						echo "<a href='DisplayCategory.php?cateName=".urlencode($row["category_title"])."&cateId=".urlencode($row["category_id"])."' >".$row["category_title"]."</a>";
						echo "</li></ul>";
					}
					?>
                </div>
            </div>
        </div>