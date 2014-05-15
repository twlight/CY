//保本卖出�?
$( function(){

	$("input.resetbtn").button();
	
	//点击CHECKBOX
	$(".distribute").click( function(){
		var list = $(this).parents("form").children(".disList");
		if (this.checked == "checked" || this.checked == true) {
			list.show();
			$(this).parent().parent().children().css("border-bottom","none");
		}
		else {
			list.hide();
			$(this).parent().parent().children().css("border-bottom","");
		}	
	} );
	//查询
	var urlBones = "http://money.finance.sina.com.cn/corp/go.php/vISSUE_ShareBonus/stockid/@code@.phtml";
	$("input.query").click( function(){
		var v = $( this ).siblings(".code").val();
		if ( v.length == 8 ){
			window.open( urlBones.replace("@code@", v.substring( 2 ) ), "bones" );
		}
	} );
	
	$(".disList input.resetbtn").click( function(){
		var v1 = $( this ).siblings(".addBonus").val(),
			v2 = $( this ).siblings(".addAmt").val(),
			v3 = $( this ).siblings(".addAmt2").val();
		
		if ( (v1 == "" || v1 == 0) &&
			 (v2 == "" || v2 == 0) &&
			 (v3 == "" || v3 == 0) )
			 return false;
			 
		$("<li>" + 
		  '�?10股派<span class="cash">' + ($( this ).siblings(".addBonus").val() || 0) + 
		  '</span>' +  $( this ).siblings(".defaultUnit").html() + '，�?<span class="deliver">' + ($( this ).siblings(".addAmt").val() || 0 ) + 
		  '</span>股，转增<span class="add">' + ($( this ).siblings(".addAmt2").val() || 0 ) + '</span>�?' + 
		  "</li>").appendTo( $(this).siblings("ul") );
		  
		$( this ).siblings(".addBonus, .addAmt, .addAmt2, .addBonusUSD, .addBonusHKD").val("");  
	} );
	
	//重置按钮
	$(":reset").click( function(){
		$(this).parent().parent().find(".disList ul").empty();
	} );

	var fxUSD = parseFloat( window.hq_str_RMBUSD.split(",")[3] ) / 100, 
		fxHKD = parseFloat( window.hq_str_RMBHKD.split(",")[3] ) / 100;
	//人民币转化为美元
	$("input.addBonusUSD").keyup( function(){
		var v = parseFloat( $(this).val() );
		if ( v > 0 )
			$( this ).siblings( ".addBonus" ).val( (v / fxUSD).toFixed(2) );
	} );
	$("#tabs-2 addBonus").blur( function(){
		if ( $(this).val() != "" )
			$( this ).siblings( ".addBonusUSD" ).val( "" );
	} );
	
	//人民币转化为港元
	$("input.addBonusHKD").keyup( function(){
		var v = parseFloat( $(this).val() );
		if ( v > 0 )
			$( this ).siblings( ".addBonus" ).val( (v / fxHKD).toFixed(2) );
	} );
	$("#tabs-4 addBonus").blur( function(){
		if ( $(this).val() != "" )
			$( this ).siblings( ".addBonusHKD" ).val( "" );
	} );	
	
	function getPriceA( P0, V0, V, bonus, dt, t, y, b, max  )
	{
		max = max || 5;
		//累加
		function calc( P, P0, V0, V, bonus, dt, t, y, b, max ){
			return ( P0 * V0 + Math.max( max, P0 * V0 * y ) + (b != 0 ? Math.max( 1, V0 * b /1000 ) : 0)         
						+ P * V * t + Math.max( max, P * V * y ) + (b != 0 ? Math.max( 1, V * b/1000 ) : 0)  - bonus + dt
					) / P; 		
		}
		
		//初始参数
		var UP = P0 * 50, DOWN = 0.001, limit = 0.0001, X0 = (UP - DOWN)/2, Vt = 0;
		
		do
		{
			Vt = calc( X0, P0, V0, V, bonus, dt, t, y, b, max );
			//取中�?	
			if ( Vt < V ) 
			{
				UP = X0;
				X0 = (UP + DOWN)/2;
			}else{
				DOWN = X0;
				X0 = (UP + DOWN)/2;
			}
		}while ( (Math.abs(Vt-V)>0.001) && (Math.abs(UP-DOWN)>limit) )
		
		return X0;
	}
		
	function getPrice( P0, V0, V, bonus, dt, t, y, b, max  )
	{
		max = max || 5;
		//累加
		function calc( P, P0, V0, V, bonus, dt, t, y, b, max ){
			return ( P0 * V0 + Math.max( max, P0 * V0 * y ) + (b != 0 ? Math.max( 1, P0 * V0 * b ) : 0)         
						+ P * V * t + Math.max( max, P * V * y ) + (b != 0 ? Math.max( 1, P * V * b ) : 0)  - bonus + dt
					) / P; 		
		}
		
		//初始参数
		var UP = P0 * 50, DOWN = 0.001, limit = 0.0001, X0 = (UP - DOWN)/2, Vt = 0;
		
		do
		{
			Vt = calc( X0, P0, V0, V, bonus, dt, t, y, b, max );
			//取中�?	
			if ( Vt < V ) 
			{
				UP = X0;
				X0 = (UP + DOWN)/2;
			}else{
				DOWN = X0;
				X0 = (UP + DOWN)/2;
			}
		}while ( (Math.abs(Vt-V)>0.001) && (Math.abs(UP-DOWN)>limit) )
		
		return X0;
	}	
	//沪市A�?
	$("#tabs-1 form, #tabs-3 form, #tabs-4 form").submit( function( e ){
		e.preventDefault();
		
		var s = $(this),
			P0 = parseFloat( s.find(".buyPrice").val() ),
			V = V0 = parseFloat( s.find(".buyAmt").val() ),
			
			T = parseFloat( s.find(".dividendTax").val() ) / 100,
			t = parseFloat( s.find(".stampTax").val() ) / 100,
			y = parseFloat( s.find(".brokerRate").val() ) / 100 ,
			b = parseFloat( s.find(".transferFee").val() ),
			bonus = 0, dt = 0, P = 0
			; 
		if ( isNaN(b) ) b = 0;
		if ( isNaN(T) ) T = 0;
				
		var checked =s.find("input.distribute:checked").length > 0, bonusList = [];
		if (checked) {
			s.find(".disList ul li").each(function(){
				var s = $(this);
				bonusList.push([parseFloat(s.children(".cash").html()), parseFloat(s.children(".deliver").html()), parseFloat(s.children(".add").html())])
			});
			
			for (var i=0; i<bonusList.length; i++) {
				var item = bonusList[i];
				if (item[0] && !item[1]) {
					bonus += V / 10 * bonusList[i][0] * (1 - T);
					dt += V / 10 * bonusList[i][0] * T;
				}
				V += V /10 * (item[2] + item[1]); 
			};			
		}
		
		P = getPriceA( P0, V0, V, bonus, dt, t, y, b );
		
		var o = $(this).parent().siblings(".output").find("table");
		o.find(".protect").val( P.toFixed(2) );
	} );

	//沪市B�?
	$("#tabs-2 form").submit( function( e ){
		e.preventDefault();
		
		var s = $(this),
			P0 = parseFloat( s.find(".buyPrice").val() ),
			V = V0 = parseFloat( s.find(".buyAmt").val() ),
			
			T = parseFloat( s.find(".dividendTax").val() ) / 100,
			t = parseFloat( s.find(".stampTax").val() ) / 100,
			y = parseFloat( s.find(".brokerRate").val() ) / 100 ,
			b = parseFloat( s.find(".transferFee").val() ) / 100,
			bonus = 0, dt = 0, P = 0
			; 
		if ( isNaN(b) ) b = 0;
		if ( isNaN(T) ) T = 0;
				
		var checked =s.find("input.distribute:checked").length > 0, bonusList = [];
		if (checked) {
			s.find(".disList ul li").each(function(){
				var s = $(this);
				bonusList.push([parseFloat(s.children(".cash").html()), parseFloat(s.children(".deliver").html()), parseFloat(s.children(".add").html())])
			});
			
			for (var i=0; i<bonusList.length; i++) {
				var item = bonusList[i];
				if (item[0] && !item[1]) {
					bonus += V / 10 * bonusList[i][0] * (1 - T);
					dt += V / 10 * bonusList[i][0] * T;
				}
				V += V /10 * (item[2] + item[1]); 
			};			
		}
		
		P = getPrice( P0, V0, V, bonus, dt, t, y, b, 1 );
		
		var o = $(this).parent().siblings(".output").find("table");
		o.find(".protect").val( P.toFixed(2) );
	} );

} );
