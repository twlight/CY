//投资损益
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
			 
		$('<li>' + 
		  '�?10股派<span class="cash">' + ($( this ).siblings(".addBonus").val() || 0) + 
		  '</span>' +  $( this ).siblings(".defaultUnit").html() + '，�?<span class="deliver">' + ($( this ).siblings(".addAmt").val() || 0 ) + 
		  '</span>股，转增<span class="add">' + ($( this ).siblings(".addAmt2").val() || 0 ) + '</span>�?' + 
		  '</li>')
		  .appendTo( $(this).siblings("ul") );
		  
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
	
	//沪市A�?
	$("#tabs-1 form").submit( function( e ){
		e.preventDefault();
		/*
		买入价格(�?)=P0
		买入数量(�?)=V0
		卖出�?/现价(�?)=P1
		卖出数量(�?)=V1
		
		派现(�?/10�?)=i
		送股(�?/10�?)=d
		转增(�?/10�?)=m
		
		红利税税�?(%)=T
		印花税税�?(%)=t
		佣金比例(%)=y
		过户费费�?(%)=b
		结算费费�?(%)=c		

		买入总成�?(�?)=B(含税费支�?)
		持有期间所获派现净�?(�?)=X(扣除税费支出)
		获得派现的当期股�?(�?)=V
		卖出净收入�?(�?)=S(扣除税费支出)
		剩余股份数量(�?)＝Vr
		
		如果Vr不等�?0�?
		账面损益(�?)=I
		报酬率r(%)=(I-B+X)/B*100%
		
		如果Vr�?0,
		投资净损益(�?)=Ic
		报酬率R(%)=(Ic-B+X)/B*100%
		*/
		var s = $(this),
			P0 = parseFloat( s.find(".buyPrice").val() ),
			V = V0 = parseFloat( s.find(".buyAmt").val() ),
			P1 = parseFloat( s.find(".sellPrice").val() ),
			V1 = parseFloat( s.find(".sellAmt").val() ),
			
			T = parseFloat( s.find(".dividendTax").val() ) / 100,
			t = parseFloat( s.find(".stampTax").val() ) / 100,
			y = parseFloat( s.find(".brokerRate").val() ) / 100 ,
			b = parseFloat( s.find(".transferFee").val() ),
			bonus = 0, dt = 0
			; 
		
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
		
		if ( V1 > V ){
			dialog("您输入的 股票卖出数量 超出拥有的股票数量�?");
			s.find(".sellAmt").focus();
			return false;
		}
		
		var B = P0 * V0 + Math.max( P0 * V0 * b, 1 ) + Math.max( P0 * V0 * y, 5 ),
			tf = Math.max( V1* b/1000, 1 ) + Math.max( V0 * b/1000, 1 ), 
			st = P1 * V1 * t,
			baB = Math.max( P0 * V0 * y, 5 ),
			baS = Math.max( P1 * V1 * y, 5 ),
			ba = baB + baS,
			sum = tf + st + ba + dt,
			Ic = V * P1 - sum - V0 * P0 + bonus,
			R = Ic / B * 100;
		
		var o = $(this).parent().siblings(".output").find("table");
		o.find(".transferFeeOut").val( tf.toFixed(2) );
		o.find(".stampTaxOut").val( st.toFixed(2) );
		o.find(".brokerAmt").val( ba.toFixed(2) );
		if (checked && bonus > 0 ) {
			o.find(".dividendTaxOutTr").show();
			o.find(".dividendTaxOut").val(dt.toFixed(2));
		}
		else 
			o.find(".dividendTaxOutTr").hide();
			
		o.find(".sumAmt").val( sum.toFixed(2) );
		
		if (checked && bonus > 0) {
			o.find(".dividendAmtTr").show();
			o.find(".dividendAmt").val(bonus.toFixed(2));
		}
		else 
			o.find(".dividendAmtTr").hide();
			
		o.find(".plAmt").val( Ic.toFixed(2) );
		o.find(".plRatio").val( R.toFixed(2) );
	} );

	//沪市B�?
	$("#tabs-2 form").submit( function( e ){
		e.preventDefault();
		
		var s = $(this),
			P0 = parseFloat( s.find(".buyPrice").val() ),
			V = V0 = parseFloat( s.find(".buyAmt").val() ),
			P1 = parseFloat( s.find(".sellPrice").val() ),
			V1 = parseFloat( s.find(".sellAmt").val() ),
			
			T = parseFloat( s.find(".dividendTax").val() ) / 100,
			t = parseFloat( s.find(".stampTax").val() ) / 100,
			y = parseFloat( s.find(".brokerRate").val() ) / 100 ,
			b = parseFloat( s.find(".transferFee").val() ) / 100,
			bonus = 0, dt = 0
			; 
		
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
		if ( V1 > V ){
			dialog("您输入的 股票卖出数量 超出拥有的股票数量�?");
			s.find(".sellAmt").focus();
			return false;
		}		
		var B = P0 * V0 + P0 * V0 * b + Math.max( P0 * V0 * y, 1 ),
			tf = P1 * V1 * b + P0 * V0 * b, 
			st = P1 * V1 * t,
			ba = Math.max( P0 * V0 * y, 1 ) + Math.max( P1 * V1 * y, 1 ),
			sum = tf + st + ba + dt,
			Ic = V * P1 - sum - V0 * P0 + bonus,
			R = Ic / B * 100;
		
		var o = $(this).parent().siblings(".output").find("table");
		o.find(".transferFeeOut").val( tf.toFixed(2) );
		o.find(".stampTaxOut").val( st.toFixed(2) );
		o.find(".brokerAmt").val( ba.toFixed(2) );
		if (checked && bonus > 0 ) {
			o.find(".dividendTaxOutTr").show();
			o.find(".dividendTaxOut").val(dt.toFixed(2));
		}
		else 
			o.find(".dividendTaxOutTr").hide();
			
		o.find(".sumAmt").val( sum.toFixed(2) );
		
		if (checked && bonus > 0) {
			o.find(".dividendAmtTr").show();
			o.find(".dividendAmt").val(bonus.toFixed(2));
		}
		else 
			o.find(".dividendAmtTr").hide();
			
		o.find(".plAmt").val( Ic.toFixed(2) );
		o.find(".plAmtRMB").val( (Ic * fxUSD) .toFixed(2) );
		o.find(".plRatio").val( R.toFixed(2) );
	} );

	//深市A�?
	$("#tabs-3 form").submit( function( e ){
		e.preventDefault();
		
		var s = $(this),
			P0 = parseFloat( s.find(".buyPrice").val() ),
			V = V0 = parseFloat( s.find(".buyAmt").val() ),
			P1 = parseFloat( s.find(".sellPrice").val() ),
			V1 = parseFloat( s.find(".sellAmt").val() ),
			
			T = parseFloat( s.find(".dividendTax").val() ) / 100,
			t = parseFloat( s.find(".stampTax").val() ) / 100,
			y = parseFloat( s.find(".brokerRate").val() ) / 100 ,
			bonus = 0, dt = 0
			; 
		
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
		if ( V1 > V ){
			dialog("您输入的 股票卖出数量 超出拥有的股票数量�?");
			s.find(".sellAmt").focus();
			return false;
		}		
		var B = P0 * V0 + Math.max( P0 * V0 * y, 5 ),
			st = P1 * V1 * t,
			ba = Math.max( P0 * V0 * y, 5 ) + Math.max( P1 * V1 * y, 5 ),
			sum = st + ba + dt,
			Ic = V * P1 - sum - V0 * P0 + bonus,
			R = Ic / B * 100;
		
		var o = $(this).parent().siblings(".output").find("table");
		o.find(".stampTaxOut").val( st.toFixed(2) );
		o.find(".brokerAmt").val( ba.toFixed(2) );
		if (checked && bonus > 0 ) {
			o.find(".dividendTaxOutTr").show();
			o.find(".dividendTaxOut").val(dt.toFixed(2));
		}
		else 
			o.find(".dividendTaxOutTr").hide();
			
		o.find(".sumAmt").val( sum.toFixed(2) );
		
		if (checked && bonus > 0) {
			o.find(".dividendAmtTr").show();
			o.find(".dividendAmt").val(bonus.toFixed(2));
		}
		else 
			o.find(".dividendAmtTr").hide();
			
		o.find(".plAmt").val( Ic.toFixed(2) );
		o.find(".plRatio").val( R.toFixed(2) );
	} );	

	//深市B�?
	$("#tabs-4 form").submit( function( e ){
		e.preventDefault();
		
		var s = $(this),
			P0 = parseFloat( s.find(".buyPrice").val() ),
			V = V0 = parseFloat( s.find(".buyAmt").val() ),
			P1 = parseFloat( s.find(".sellPrice").val() ),
			V1 = parseFloat( s.find(".sellAmt").val() ),
			
			T = parseFloat( s.find(".dividendTax").val() ) / 100,
			t = parseFloat( s.find(".stampTax").val() ) / 100,
			y = parseFloat( s.find(".brokerRate").val() ) / 100 ,
			b = parseFloat( s.find(".transferFee").val() ) / 100,
			bonus = 0, dt = 0
			; 
		
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
		if ( V1 > V ){
			dialog("您输入的 股票卖出数量 超出拥有的股票数量�?");
			s.find(".sellAmt").focus();
			return false;
		}		
		var B = P0 * V0 + P0 * V0 * b + Math.max( P0 * V0 * y, 5 ),
			tf = P1 * V1 * b + P0 * V0 * b, 
			st = P1 * V1 * t,
			ba = Math.max( P0 * V0 * y, 5 ) + Math.max( P1 * V1 * y, 5 ),
			sum = tf + st + ba + dt,
			Ic = V * P1 - sum - V0 * P0 + bonus,
			R = Ic / B * 100;
		
		var o = $(this).parent().siblings(".output").find("table");
		o.find(".transferFeeOut").val( tf.toFixed(2) );
		o.find(".stampTaxOut").val( st.toFixed(2) );
		o.find(".brokerAmt").val( ba.toFixed(2) );
		if (checked && bonus > 0 ) {
			o.find(".dividendTaxOutTr").show();
			o.find(".dividendTaxOut").val(dt.toFixed(2));
		}
		else 
			o.find(".dividendTaxOutTr").hide();
			
		o.find(".sumAmt").val( sum.toFixed(2) );
		
		if (checked && bonus > 0) {
			o.find(".dividendAmtTr").show();
			o.find(".dividendAmt").val(bonus.toFixed(2));
		}
		else 
			o.find(".dividendAmtTr").hide();
			
		o.find(".plAmt").val( Ic.toFixed(2) );
		o.find(".plAmtRMB").val( (Ic * fxHKD) .toFixed(2) );
		o.find(".plRatio").val( R.toFixed(2) );
	} );
	
		
} );
