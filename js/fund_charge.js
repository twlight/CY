
$( function(){

	$("#optType").buttonset();

	//利率随操作类型而改�?
	$("input[name='radio']").change( function(){
		eval("var tmp=window.fundRate" + this.value );
		$("#chargeRate").val( tmp );
	} ).change();
	
	//计算
	$("#intAmt").submit( function( e ){
		e.preventDefault();
		
		var P = parseFloat( $("#price").val() ),
			N = parseFloat($("#count").val()),
			T = $("input[name='radio']:checked").val(),
			R = parseFloat($("#chargeRate").val())/100,
			S =0 , F = 0
			;
		//F 费率 S 总额
		F = N * P * R;
		S = N * P * ( 1 + R );
		
		$("#total").val( S.toFixed(2) );
		$("#fee").val(  F.toFixed(2) );
		
	} );
	
} );
