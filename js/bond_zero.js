//整存整取
$( function(){

	//票面收益�?
	$("#rateForm").submit( function( e ){
		e.preventDefault();
		
		var B = parseFloat( $("#billAmt").val() ),
			S = parseFloat($("#sellAmt").val()),
			Y = parseInt($("#limitYear").val());		
		
		//其票面收益率(Coupon Rate)=(面额-发行�?)/(发行�?*债券期限)*100%�?
		var R = (B-S)/(S * Y) * 100;
		
		$("#CouponRate").val( R.toFixed(2) );
	} );
	
	//持有期间
	$("#periodForm").submit( function( e ){
		e.preventDefault();
		
		var B = parseFloat( $("#buyAmt").val() ),
			S = parseFloat($("#sellAmt2").val()),
			D1 = Date.get( $("#buyDate").val() ),
			D2 = Date.get( $("#sellDate").val() ),
			diff = Date.diff(D2, D1),
			Y = A = R = 0
			;		
		
		Y = parseFloat( (diff/ 365).toFixed(2) );
		if ( Y > 1 ){
			//计算复利
			//考虑复利的持有期间收益率算法：设债券买入价格=P0，每期利�?=C，剩余计息期�?=n，持有年�?=D/365，债券卖出价格=P1，年付息频次=f，令P0=(P1+C*n)/(1+y)^n，当债券为零息债券时，上式变为P0=P1/(1+y)^(D/365)，此一元方程的�?--y即为持有期间收益率，也称每个付息周期的“殖利率”，y*f为年殖利率�?
			R = Math.pow( S/ B, 1/ Y ) - 1;
			A = S;
		}else{
			//单利
			//零息债券持有期间收益�?=(出售�?-买入�?)/买入�?*持有年数*100%。其中，天数与年数的转换采用1�?=365天�?
			R = ((S - B) /B) / ( diff / 365 );
			A = S;
		}
		
		$("#ownYear").val( Y.toFixed(2) );
		$("#totalAmt").val( A.toFixed(2) );
		$("#irr").val( (R * 100).toFixed(2) );
		
	} );	
	
	//持有到期
	$("#dueForm").submit( function( e ){
		e.preventDefault();
		
		var P = parseFloat( $("#buyAmt3").val() ),
			M = parseFloat($("#billAmt3").val()),
			D1 = Date.get( $("#buyDate3").val() ),
			D2 = Date.get( $("#sellDate3").val() ),
			diff = Date.diff(D2, D1),
			Y = A = R = 0
			;		
		
		Y = parseFloat( (diff/ 365).toFixed(2) );
		if ( Y > 1 ){
			//计算复利
			//P=M/(1+y)^(D/365)
			R = Math.pow( M/ P, 1/ Y ) - 1;
			A = M;
		}else{
			//单利
			//持有到期收益�?(单利)=(面额-买入�?)/(买入�?*剩余年数)*100%
			R = ((M - P) /P ) / (diff/ 365);
			A = M;
		}
		
		$("#ownYear3").val( Y.toFixed(2) );
		$("#totalAmt3").val( A.toFixed(2) );
		$("#irr3").val( (R * 100).toFixed(2) );
		
	} );	
	
} );