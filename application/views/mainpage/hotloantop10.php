
<h2>热门贷款</h2><a href="<?php echo base_url('/index.php/hotloan');?>" >查看更多</a>	
<table class="table table-hover">
 	<tr class="success"><th>银行</th>
	<th>产品特色</th>
	<th>点击查看</th>
	</tr>
<?php
foreach($top10loan_item as $row)
{	
	echo "<tr><td>";
	echo "<div><img src='/static/img/bank".$row['bankid'].".jpg'>";
	echo $row['bankid'];
	echo "</div></td>";
	echo "<td>";
	echo  $row['loanspecial'];
	  
	echo "</td>";
	echo "<td>";
	
	echo "<a href=";
	echo "/index.php/hotloan/get_loan/".$row['loanid'];
	echo "\>";
	
	echo "<input type="."\"button\""." class = \""."btn btn-primary\""."value=\"点击查看\">";
	echo "</input></a></div>";
	echo "</td>";
}
?>
</table>

