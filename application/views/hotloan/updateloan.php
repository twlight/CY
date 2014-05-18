<h2>热门贷款</h2>	
<table class="table table-hover">
 	<tr class="success"><th>银行</th>
	<th>产品特色</th>
	<th>点击修改</th>
	</tr>
<?php
foreach($hotloan_item as $row)
{	
	echo "<tr><td>";
	echo "<div><img src='/static/img/bank".$row['bankid'].".jpg'>";
	//echo $row['bankid'];
	echo "</div></td>";
	echo "<td>";
	echo  $row['loanspecial'];
	echo "</td>";
	echo "<td>";

	echo "<a href=";
	echo base_url('index.php/hotloan/update_loan/'.$row['loanid']);
	echo ">";
	
	echo "<input type="."\"button\""." class = \""."btn btn-primary btn-danger\""."value=\"点击修改\">";
	echo "</input></a></div>";
	echo "</td>";
}
?>
</table>

<h2>热门贷款</h2>
<table class="table table-hover">
 	<tr class="success"><th>银行</th>
	<th>贷款特色</th>
	<th>贷款利率</th>
	<th>贷款范围</th>
	<th>额外费用</th>
	<th>还款方式</th>
	<th>放款时间</th>
	<th>贷款简介</th>
	<th>申请条件</th>
	<th>贷款所需材料</th>
	<th>申请条件</th>
	<th>其他</th>
	</tr>



