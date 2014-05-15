
$( function(){

	//当期收益�?
	$("#rateForm").submit( function( e ){
		e.preventDefault();
		
		var M = parseFloat( $("#billAmt").val() ),
			C = parseFloat($("#billRate").val()) / 100,
			S = parseFloat($("#marketAmt").val());		
		
		//付息债券当期收益�?(Current Yield)=C/P=(面额*票面收益�?)/债券市价*100%。“当期”指当前所处的付息周期�?
		var R = (M * C )/S * 100;
		
		$("#CurrentRate").val( R.toFixed(2) );
	} );
	
/*
	“固定利率债券收益率”的计算器“持有期间”、“持有到期”两种计算当中，“持有期间付息期数”输入项需要限制输入�?
	
	对于“持有到期”收益率计算，允许输入的范围�?
	[(到期日期-买入日期)/365] * f - 1 �? n �? [(到期日期-买入日期)/365] * f + 1
	
	其中�?
	(1) f = 年付息频�?
	(2) 当“[(到期日期-买入日期)/365] * f”小�?1，取0，大�?1，取正整�?
*/
	
	//持有期间
	$("#periodForm").submit( function( e ){
		e.preventDefault();
		
		var M = parseFloat( $("#billAmt2").val() ),
			IR = parseFloat($("#billRate2").val()),
			P0 = parseFloat( $("#buyAmt2").val() ),
			P1 = parseFloat( $("#sellAmt2").val() ),
			f = parseInt( $("#freq2").val() ),
			n = parseInt( $("#count2").val() ),
			D1 = Date.get( $("#buyDate2").val() ),
			D2 = Date.get( $("#sellDate2").val() ),
			diff = Date.diff(D2, D1),
			Y = A = R = C = 0
			;		
		
		Y = diff/ 365;
		var limit  = Math.floor( Y * f );
		if ( n > limit + 1 || n < limit - 1 ){
			dialog("请输入正确的付息期数�?");
			$("#count2").val("");	
			return false;
		}
		
		C = M * IR / 100;
		TC = M * IR / 100 /f * n;		
		if ( Y > 1 ){
			//计算复利
			//P0=C/y*(1-1/(1+y)^n)+P1/(1+y)^n
			R = getRate( n, P0, P1, C, f, diff );
			A = P1 + TC;
		}else{
			//单利
			//付息债券持有期间收益�?=[(出售�?-买入�?+持有期间利息)/买入价]/ 持有年数 *100�?
			R = ((P1 - P0 + TC)/P0) / Y;
			A = P1 + TC;
		}
		
		$("#ownYear2").val( Y.toFixed(2) );
		$("#totalAmt2").val( A.toFixed(2) );
		$("#irr2").val( (R* 100).toFixed(2) );
		
	} );	
	
	//持有到期
	$("#dueForm").submit( function( e ){
		e.preventDefault();
		
		var P1 = M = parseFloat( $("#billAmt3").val() ),
			IR = parseFloat($("#billRate3").val()),
			P0 = parseFloat( $("#buyAmt3").val() ),
			f = parseInt( $("#freq3").val() ),
			n = parseInt( $("#count3").val() ),
			D1 = Date.get( $("#buyDate3").val() ),
			D2 = Date.get( $("#sellDate3").val() ),
			diff = Date.diff(D2, D1),
			Y = A = R = C = 0
			;		
		Y = diff/ 365;
		var limit  = Math.floor( Y * f );
		if ( n > limit + 1 || n < limit - 1 ){
			dialog("请输入正确的付息期数�?");
			$("#count3").val("");	
			return false;
		}
		
		C = M * IR / 100;
		TC = M * IR / 100 /f * n;		
		if ( Y > 1 ){
			//计算复利
			//P0=C/y*(1-1/(1+y)^n)+P1/(1+y)^n
			R = getRate( n, P0, M, C, f, diff );
			A = P1 + TC;
		}else{
			//单利
			//付息债券持有期间收益�?=(面额+持有到期利息-买入�?)/(买入�?*剩余年数)*100�?
			R = ((M - P0 + TC)/P0) / Y;
			A = P1 + TC;
		}
		
		$("#ownYear3").val( Y.toFixed(2) );
		$("#totalAmt3").val( A.toFixed(2) );
		$("#irr3").val( (R* 100).toFixed(2) );
		
	} );	

	function getRate( n, P0, P1, C, f, diff )
	{
		var d = parseInt( ( diff +1 ) % (365 / f) );
		var W = d / (365/f);
		
		//累加
		function calc( n, y, C, f, W, M ){
			var SUM = 0;
			for (var i = 0; i < n; i++) {
				SUM += (C/f) / Math.pow( 1+y/f, W + i );
			}	
			SUM += M/ Math.pow( 1 + y/f, W + n -1 );
			
			return SUM;			
		}
		
		//初始参数
		var UP = 5, DOWN = 0.001, limit = 0.0001, X0 = (UP - DOWN)/2, PV = 0;
		
		do
		{
			PV = calc( n, X0, C, f, W, P1 );
			if ( PV == 0 ) 
				return "--";
			//取中�?	
			if ( PV < P0 ) 
			{
				UP = X0;
				X0 = (UP + DOWN)/2;
			}else{
				DOWN = X0;
				X0 = (UP + DOWN)/2;
			}
		}while ( (Math.abs(PV-P0)>0.001) && (Math.abs(UP-DOWN)>limit) )
		
		return X0;
	}	
} );