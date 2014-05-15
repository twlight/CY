<div class="row">
<div class="col-md-8">
<h2>成功案例</h2><a href="http://localhost/index.php/mainpage/getnormaluser" >查看更多</a>	
<table class="table table-hover">
 	<tr class="success"><th>姓名</th>
	<th>贷款额</th>
	<th>贷款申请时间</th>
	<th>放款金额</th>
	<th>贷款期限</th>
	<th>点击查看</th>
	</tr>
<?php
foreach($successloan_item as $row)
{	
	echo "<tr><td>";
	echo $row['username'];
	echo "</div></td>";
	echo "<td>";
	echo  $row['loan_amount'];
	echo "</td>";
	
	echo "<td>";
	echo  $row['posttime'];
	echo "</td>";
	
	echo "<td>";
	echo  $row['loan_amount'];
	echo "</td>";
	
	echo "<td>";
	echo  $row['loan_period'];
	echo "</td>";
	
	echo "<td>";
	echo "<a href=\"http://localhost/index.php/mainpage/getnormaluser/".$row['userid']."\">";
	echo "<input type="."\"button\""." class = \""."btn btn-primary\""."value=\"点击查看\">";
	echo "</input></a></div>";
	echo "</td>";
}
?>
</table>
</div>

