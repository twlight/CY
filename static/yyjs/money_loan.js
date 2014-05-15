//整存整取
$( function(){

	$("#payType").buttonset();
	$("#yearRate").val( window.loadRate );
	
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
		
	// x ^ y
	function power( x, y ){
		var t = x;
		while( y-- > 1 ){
			t *= x;
		}
		return t;
	}
	
	//提交表单
	$("#lumpSmall").submit( function( e ){
		e.preventDefault();
		
		var  ct = $("#container");
		ct.children("dd").remove();
				
		var M = parseFloat( $("#loadAmt").val() ),
			Y = parseInt( $("#years").val() ),
			type = $("input[name='radio']:checked").val(),
			R = parseFloat($("#yearRate").val()) /100 /12 //月利率
			;
		
		var list = [], C =0, B=0, D=0, I = 0, A = 0, N = getTerm(), totalInt = 0, totalAmt = 0;
		
		if ( R == 0 )
			type = "2";
			
		if (type == "1") {
			//等额本息
			//Ci= M×（R％÷12）×（1+ R％÷12）N÷[（1+ R％÷12）N—1]
			C = M * R * power( 1 + R, N ) / ( power( 1+R, N ) -1 );
			totalAmt = C * N;
			for (var i=0; i< N ; i++) {
				// I = 剩余本金 × 月利率
				D = i == 0 ? M : list[ i-1 ][3]; //剩余本金
				I = D * R;
				totalInt += I;
				list.push( [ I, C-I, C, D-( C-I )] );	
			}			
		}else if (type == "2"){
			//等额本金
			B = M / N;
			for (var i=0; i< N ; i++) {
				// Ai = M×（N－i+1）÷N×（R％÷12）
				D = i == 0 ? M : list[ i-1 ][3]; 
				I = D * R;
				totalInt += I;
				totalAmt += B+I;
				list.push( [ I, B, B+I, D-B] );	
			}			
		}
		
		var oFrag=document.createDocumentFragment();
		for (var i=0; i<list.length; i++) {
			var tmp = $("<dd>").html(  "<div>" + (i+1) + "</div>" +
										"<div>" + list[i][2].toFixed(2) + "</div>" +
										"<div>" + list[i][0].toFixed(2) + "</div>" +
									   "<div>" + list[i][1].toFixed(2) + "</div>" +
										"<div>" + Math.abs(list[i][3]).toFixed(2) + "</div>" +	
										"<div class='clear'></div>")[0];
			oFrag.appendChild( tmp );				
		}
		$(".list").height( 200 );
		ct.append( oFrag );
		
		$("#intAmt").val( totalInt.toFixed(2) );
		$("#fullAmt").val( totalAmt.toFixed(2) );
		
		window.scrollTo( 0, 250 );
	} );
	
} );
