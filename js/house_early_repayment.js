
$( function(){

	$("#loadType, #payType, #dealType, #oriPayType").buttonset();
	
	var buzzRateSel = $("#buzzRateSel"), counRateSel = $("#counRateSel"), years = $("#years"),
		buzzRate = $("#buzzRate"), counRate = $("#counRate");
		
	//动态生成利率下拉框
	for( var key in window.houseLoanCounRate ){
		var item = window.houseLoanCounRate[ key ];
		var opt = $("<option value='" + key + "'>").text( item.title );
		if ( item.isdefault )
			opt.attr("selected", "selected" );
			
		counRateSel.append( opt );			
	}	
	for( var key in window.houseLoanBuzzRate ){
		var item = window.houseLoanBuzzRate[ key ];
		var opt = $("<option value='" + key + "'>").text( item.title );
		if ( item.isdefault )
			opt.attr("selected", "selected" );
		
		buzzRateSel.append( opt );		
	}

	//动态更改利�?	
	buzzRateSel.change( function(){
		var v = buzzRateSel.val(), y = parseInt( years.val() ) <= 5 ? 0 : 1 ;
		if ( v == "-1" )
			buzzRate.val("0.00");
		else	
			buzzRate.val( (window.houseLoanBuzzRate[ v ].rate[ y ] * 100).toFixed(2) );	
	} );
	counRateSel.change( function(){
		var v = counRateSel.val(), y = parseInt(years.val() ) <= 5 ? 0 : 1 ;
		if ( v == "-1"  )
			counRate.val("0.00");
		else	
			counRate.val( (window.houseLoanCounRate[ v ].rate[ y ] * 100).toFixed(2) );	
	} );
	years.change( function(){
		counRateSel.change();
		buzzRateSel.change();
	} ).change();
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
	
	//当利率更改后反馈下拉�?
	buzzRate.blur( function(){
		counRate.find("option:selected").removeAttr("selected");
		var v = $(this).val(), y = parseInt( years.val() ) <= 5 ? 0 : 1;
		for( var key in houseLoanBuzzRate ){
			if ( (houseLoanBuzzRate[key].rate[ y ] * 100).toFixed(2) == v ){
				buzzRate.find("option[value='"+ key +"']").attr("selected", "selected" );
				return;				
			}
		}
	});
	counRate.blur( function(){
		counRate.find("option:selected").removeAttr("selected");
		var v = counRate.val(), y = parseInt( years.val() ) <= 5 ? 0 : 1;
		for( var key in houseLoanCounRate ){
			if ( (houseLoanCounRate[key].rate[ y ] * 100).toFixed(2) == v ){
				counRate.find("option[value='"+ key +"']").attr("selected", "selected" );
				return;				
			}
		}
	});		
	
	//隐藏不必须的�?
	 $("input[name='radio']").change( function(){
	 	var v = $("input[name='radio']:checked").val();
		if ( v == "1" ){
			$(".buzzTr").show();
			$(".counTr").hide();
		}else if ( v == "2" ){
			$(".buzzTr").hide();
			$(".counTr").show();
		}
	 } ).change();
	 		
	 $("input[name='radioPay']").change( function(){
	 	var v = $("input[name='radioPay']:checked").val();
		if ( v == "2" ){
			$("#earlyAmtTr, #dealTypeTr, #nextMonAmtTr, #newLastDateTr").show();
		}else {
			$("#earlyAmtTr, #dealTypeTr, #nextMonAmtTr, #newLastDateTr").hide();
		}
	 } ).change();
	
	//提交表单
	$("#houseLoan").submit( function( e ){
		e.preventDefault();
		
		var A = parseFloat( $("#loadAmt").val() ) * 10000,
			W = parseFloat( $("#earlyAmt").val() ) * 10000,
			N = getTerm(),
			
			payType = $("input[name='radioPay']:checked").val(),
			loadType = $("input[name='radio']:checked").val(),
			oriPayType = $("input[name='radioOriPay']:checked").val(),
			payType	= $("input[name='radioPay']:checked").val(),
			dealType = $("input[name='radioDeal']:checked").val(),
			
			firstYear = parseInt( $("#firstYear").val() ),
			firstMonth = parseInt( $("#firstMonth").val() ),
			earlyYear = parseInt( $("#earlyYear").val() ),
			earlyMonth = parseInt( $("#earlyMonth").val() ),
			
			BR = parseFloat( buzzRate.val() ) /100 /12,
			CR = parseFloat( counRate.val() ) /100 /12,
			R = loadType == "1" ? BR : CR
			;
		
		var totalInt = totalAmt = buzzIntAmt = counIntAmt = 0,
			T = SIA = NLD = CMA = NMA = PIA = PSA = PCA =0 ;
		n = (earlyYear - firstYear) * 12 + earlyMonth - firstMonth - 1;
	
		if (n > N) {
			alert("您输入的预计提前还款时间有误，请检查�?");
			return;
		}
		//LIST  [偿还利息,偿还本金,偿还本息,剩余本金]	
		if (oriPayType == "1") {
			//等额本息
			List = averageInterest( N, A, R);
		}else if (oriPayType == "2"){
			//等额本金
			List = averageCapital( N, A, R);
		}
		
		for (var i=0; i<=n; i++) {
				PIA +=  List[i][0];
				PCA += List[i][1];
				PSA += List[i][2];
		}		
		for (var i=n+2; i<List.length; i++) {
				SIA +=  List[i][0];
		}			
		if ( payType == "1"){
			//一次性还�?
			NLD = setDate( earlyYear , earlyMonth );
			CMA = A - (PSA - PIA) + List[ n+1 ][ 0 ]; 
			//$("#nextMonAmtTr, #newLastDateTr").hide(); 
			
		}else{
			//部分提前还款
			//$("#nextMonAmtTr, #newLastDateTr").show(); 
			
			CMA = W + List[ n+1 ][ 2 ];
			var J = A - PCA - W - List[ n+1 ][ 1 ] ;
			if ( dealType == "1"){
				//缩短还款期限,月还款额不变
				if ( oriPayType == "1" ){
					//等额本息
					NMA = List[ n+1 ][ 2 ];
					//T=Log�?1+ r ％）[A÷（A－J×r％）] A为月还款�?
					T = Math.ceil( Math.log( NMA / ( NMA - J * R ) ) / Math.log( 1+ R ) );
					//var tmp=0, intAmt = 0;
					var arr = averageInterest( T, J, R ), d = 0;
					NMA = arr[0][2];
					for (var i=0; i<arr.length; i++) {
							d += arr[i][0];
					}
					SIA = SIA - d;	
					var tm =  earlyMonth + T % 12;
					var y =  earlyYear + parseInt(T / 12) + parseInt( tm / 12 );
					NLD = setDate( y,  tm % 12  );	
				 }else if( oriPayType == "2" ){
				 	//等额本金
					//月还款额不变是指月还款的本金不变
					var F = List[0][1], d = 0;
					var T = Math.ceil( J / F );
					
					for (var i=0; i<T; i++) {
						d += (J - F*i) * R;
					}
					SIA = SIA - d;										
					NMA = F + J * R;  
					var tm =  earlyMonth + T % 12;
					var y =  earlyYear + parseInt(T / 12) + parseInt( tm / 12 );
					NLD = setDate( y,  tm % 12  );
				 }
			}else{
				//减少月还款额,还款期限不变
				if ( oriPayType == "1" ){
					//等额本息
					NLD = setDate( Math.floor( firstYear + N / 12), firstMonth-1 );
					T = N - n - 2;
					var arr = averageInterest( T, J, R ), d = 0;
					NMA = arr[0][2];
					for (var i=0; i<arr.length; i++) {
							d += arr[i][0];
					}					
					SIA = SIA - d;							
				 }else if( oriPayType == "2" ){
				 	//等额本金
					T = N - n - 2;
					var F = J / T , d = 0;
					
					for (var i=0; i<T; i++) {
						d += (J - F*i) * R;
					}
					SIA = SIA - d;										
					NMA = F + J * R;  
					NLD = setDate( Math.floor( firstYear + N / 12), firstMonth-1 );					
				 }				
			}
		}
		
		$("#payedIntAmt").val( PIA.toFixed(2) );
		$("#payedSumAmt").val( PSA.toFixed(2) );
		$("#saveIntAmt").val( SIA.toFixed(2) );
		$("#newLastDate").val( NLD );
		$("#curMonAmt").val( CMA.toFixed(2) );
		$("#nextMonAmt").val( NMA.toFixed(2) );
	} );
	
	function setDate( y, m ){
		return y + "�?" + m + "�?";
	}
	
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
		if (isNaN(C)) C = 0;
		for (var i=0; i< N ; i++) {
			// I = 剩余本金 × 月利�?
			D = i == 0 ? M : list[ i-1 ][3]; //剩余本金
			var I = D * R ;
			list.push( [ I, C-I, C, D-( C-I )] );	
		}	
		return list;			
	}	
} );
