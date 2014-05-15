<div class="row">

<h2>成功案例</h2>	
<table class="table table-hover">
 	<tr class="success"><th>姓名</th>
	<th>贷款额</th>
	<th>贷款申请时间</th>
	<th>放款金额</th>
	<th>贷款期限</th>
	</tr>
<?php

if($successloan_item)
{
	$row = $successloan_item;
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
}
?>
</table>

</div>

