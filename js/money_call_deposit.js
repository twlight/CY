/**
 * @Title@ 通知锟斤拷锟�
 */

$( function(){

	$("#notifyType").buttonset();
	
	//鍒╃巼闅忛€氱煡绫诲瀷鑰屾敼鍙�
	$("input[name='radio']").change( function(){
		eval("var tmp=window.notifyYearDate" + $("input[name='radio']:checked").val() );
		$("#yearRate").val( tmp );
	} ).change();	

	//浼嶄竾鍏冨厓璧峰瓨
	$("#saveAmt").blur( function(){
		var v = parseFloat( this.value );
		if( v < 50000 ){
			$(this).addClass("error");
		}else{
			$(this).removeClass("error");
		}
	} );
	
	//
	$("#intAmt").submit( function( e ){
		e.preventDefault();
		
		var A = parseFloat( $("#saveAmt").val() ),
			R = parseFloat($("#yearRate").val()) /100 /360,
			D1 = Date.get( $("#saveDate").val() ),
			expand = parseInt( $("input[name='radio']:checked").val() ),
			D2 = Date.get( $("#fetchDate").val() ),
			diff = Math.abs( Date.diff(D2, D1) ),
			N = diff + expand,
			IR = parseFloat( window.interestRate ),
			B =0, Y= 0
			;
		
		if ( diff < expand ){
			dialog( "娉ㄦ剰锛氭彁鍙栨棩鏈熼』浠嶽" + (new Date( D2.getTime() + 24*3600 * 1000 * expand ).serialize()) +"]璧锋墠鑳戒韩鍙楅€氱煡瀛樻鍒╃巼銆�"  );
			return false;
		}
		
		B = A + A * R * N * (1-IR);
		Y = A * R * N * IR;
		
		$("#edTaxSum").val( Y.toFixed(2) );
		$("#fullSum").val( B.toFixed(2) );
	} );
	
} );
