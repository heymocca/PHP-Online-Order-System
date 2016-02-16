<link href="../css/style2.css" type="text/css" rel="stylesheet" />
<div id="div1" style="overflow: hidden">
	<div id="pgList_pagerTable">
    <table class="pagerDiv">
        <tr>
        <td style="text-align:right; padding-bottom:3px;">
        Total count:<span id="lblTotalCount"> [<?php echo $totalCount ?>] </span>
                /Total page:<span id="lblTotalPageCount"> [<?php echo $totalPage ?>] </span>
                Current page:<span id="lblcurrentPage"> [<?php echo $curPage ?>] </span>
         </td>
         <td style="text-align:right;width:100px;">
            <input type="submit" name="btnFirstPage" value="|<" id="btnFirstPage" title="first page" class="first" />
            <input type="submit" name="btnPreviousPage" value="<<" id="btnPreviousPage" title="previous page" class="prev" /> 
            <input type="submit" name="btnNextPage" value=">>" id="btnNextPage" title="next page" class="next" />
            <input type="submit" name="btnLastPage" value=">|" id="btnLastPage" title="last page" class="last" />&nbsp;&nbsp;
          	<input type="hidden" id="currentPage" name="currentPage" value="<?php echo $curPage ?>"/> 
        </td>
        </tr>
        </table>
    </div>
    <div id="div2">
        <table class="border" id="pgList_gvList" style="color:#333333;width:100%;border-collapse:collapse;text-align:center">
        
        <tr class="tableHeader">
        <?php

        foreach ($arr_header as $value){
            echo "<th align='center'' scope='col'>&nbsp;&nbsp;".$value."</th>";
        }        if($needEdit){
        	echo "<th align='center' scope='col' style='width:120px;'><span id='pgList_gvList_lblEdit' class='link'>&nbsp;&nbsp;Change Status</span></th>";
        }
        echo "</tr>";
        $i=0;
        if($rows){
	        foreach($rows as $row){
				if($i%2==0){
					echo "<tr class='odd'>";
				}else{
					echo "<tr class='even'>";
				}

				foreach($arr_header as $key=>$value){
					if(isset($img) && $img==$key){
						echo "<td align='center'><img title='".$row[$ititle]."' style='cursor:pointer;' width='20' height='20' src='../".$row[$key]."'></img></td>";
					}else{
						echo "<td>&nbsp;&nbsp;".$row[$key]."</td>";
					}
					
				}				if($needEdit){
					echo "<td align='center' scope='col' style='width:120px;'>&nbsp;&nbsp;";
					echo "<a href='".$editUrl."?".$key_id."=".$row[$key_id]."'>Edit</a>";
					echo "</td>";
				}
				echo "</tr>";
				$i++;
	        }
        }
        
        ?>
        
        </table>
    </div>
</div>