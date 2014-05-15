
$( function(){

	$("#loanType").buttonset();
	
	var years = $("#years"), month = $("#month");
	//计算期次
	function getTerm(){
		return parseInt(years.val() || "0") * 12 + parseInt(month.val() || "0");
	}
	years.keyup( function(){
		$("#term").text( getTerm() );
	} );
	month.change( function(){
		$("#term").text( getTerm() );
	} );
		
	//提交表单
	$("#houseLoan").submit( function( e ){
		e.preventDefault();
		
		var  ct = $("#container");
		ct.children("dd").remove();
				
		var M = parseFloat( $("#loadAmt").val() ) * 10000,
			N = getTerm(),
			loanType = $("input[name='radioPay']:checked").val(),
			
			P = Date.get( $("#firstDate").val() ),
			R = parseFloat($("#firstRate").val()) /100 /12,
			
			Q1 = Date.get( $("#newDate1").val() ),
			Q2 = Date.get( $("#newDate2").val() ),
			Q3 = Date.get( $("#newDate3").val() ),
			
			R1 = parseFloat($("#newRate1").val()) /100 /12,
			R2 = parseFloat($("#newRate2").val()) /100 /12,
			R3 = parseFloat($("#newRate3").val()) /100 /12
			;
		
		var totalInt = totalAmt = 0, 
			List = [], section = [], changeAmt = [];
	
		section.push( [ P, R ] );
		section.push( [ Q1, R1 ] );
		if ( !isNaN(R2) && R2 > 0 && !isNaN( +Q2 ) ) section.push( [ Q2, R2 ] );
		if ( !isNaN(R3) && R3 > 0 && !isNaN( +Q3 )) section.push( [ Q3, R3 ] );
		
		var generator = loanType == "1" ? averageInterest : averageCapital;
		
		var start = P, diff = 0, SA = 0;
		for (var i=1; i<= section.length; i++) {
			if ( i < section.length )
				var d = section[i][0], 
					diff = ( d.getFullYear() - start.getFullYear() ) * 12 + d.getMonth() - start.getMonth() ;	
			else
				diff = N;
			
			//计算上一阶段的还款计�?
			var tmpList = generator( N, M, section[i-1][1] );
			List = List.concat( tmpList.slice(0, diff ) );
			
			changeAmt.push( tmpList[0][2] );
			
			M = tmpList[diff-1][3];
			start = d;		
			N -= diff;
		}		
	
		var y = P.getFullYear(), m = P.getMonth() + 1;
		function getDate( i ){
			var t = ( (m+i)%12 == 0 ? 12 : (m+i)%12 );
			t = t > 9 ? t : ("0" + t); 
			return (i+1) + ".&nbsp;" + ( y + parseInt( (m + i)/12 ) ) + "-" + t;
		}
		
		var oFrag=document.createDocumentFragment();
		for (var i=0; i<List.length; i++) {
			var tmp = $("<dd>").html(  "<div>" + getDate( i ) + "</div>" +
										"<div>" + List[i][2].toFixed(2) + "</div>" +
										"<div>" + List[i][0].toFixed(2) + "</div>" +
									   "<div>" + List[i][1].toFixed(2) + "</div>" +
										"<div>" + Math.abs(List[i][3]).toFixed(2) + "</div>" +	
										"<div class='clear'></div>")[0];
			oFrag.appendChild( tmp );	
			
			totalInt += List[i][0];
			totalAmt += List[i][2];			
		}
		$(".list").height( 200 );
		ct.append( oFrag );
		
		$("#changeAmt1").val( (changeAmt[1] || 0).toFixed(2)  );
		if ( changeAmt[2] ){
			$("#changeAmt2Tr").show();
			$("#changeAmt2").val( (changeAmt[2] || 0).toFixed(2)  );
		}else{
			$("#changeAmt2Tr").hide();
		}
		if ( changeAmt[3] ){
			$("#changeAmt3Tr").show();
			$("#changeAmt3").val( (changeAmt[3] || 0).toFixed(2)  );
		}else{
			$("#changeAmt3Tr").hide();
		}
		
		$("#oriAmt").val( List[0][2].toFixed(2) );
		$("#intAmt").val( totalInt.toFixed(2) );
		$("#fullAmt").val( totalAmt.toFixed(2) );
		
		window.scrollTo( 0, 350 );
	} );
	
	//等额本金
	function averageCapital( N, M, R ){
		var list = [];
		var B = M / N, D = M;
		for (var i=0; i< N ; i++) {
			// Ai = M×（N－i+1）÷N×（R％�?12�?
			D = i == 0 ? M : list[ i-1 ][3]; 
			var I = D * R ;
			list.push( [ I, B, B+I, D-B] );	
		}
		return list;			
	}
	
	//等额本息
	function averageInterest( N, M, R ){
		if ( R == 0 )
			return averageCapital( N, M, R );
		var list = [];
		//Ci= M×（R％�?12）×（1+ R％�?12）N÷[�?1+ R％�?12）N�?1]
		var C = M * R * Math.pow( 1 + R, N ) / ( Math.pow( 1+R, N ) -1 ), D = 0;
		for (var i=0; i< N ; i++) {
			// I = 剩余本金 × 月利�?
			D = i == 0 ? M : list[ i-1 ][3]; //剩余本金
			var I = D * R ;
			list.push( [ I, C-I, C, D-( C-I )] );	
		}	
		return list;			
	}	
} );
