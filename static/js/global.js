// JavaScript Document
Date.get = function( str ){
	var arr = str.split("-"),
		d = new Date();
	
	d.setFullYear( arr[0], arr[1] - 1, arr[2] );
	d.setHours(0,0,0,0);
	return d;
}
Date.prototype.serialize = function(){
	var m = this.getMonth() + 1;
	return this.getFullYear() + "-" + (m > 9 ? m : "0"+m ) + "-" + this.getDate();
}
Date.diff = function( date1, date2  ){
	//����Ȼ����
	return Math.floor( (date1.getTime() - date2.getTime()) / (1000 * 3600 * 24) );
	//����
	var year=date1.getFullYear() - date2.getFullYear();
	var month=date1.getMonth() - date2.getMonth();
	var day=date1.getDate() - date2.getDate();				
	return year*12*30+month*30+day;
}

//input.error
function message(){
	$("input[title]").tooltip({
        tip: '#tooltip',  
		//position: "center right", 
        offset: [5, 2]
        //effect: 'slide',
    }); 	
}

function dialog( msg ){
	if ( msg ){
		$("#dialog-modal").html( msg ).dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
		});
	}
}

$( function(){
	
	var lt = $("#loadTable").children("tbody").empty(), hrr = window.houseLoanRateRight;
	if ( hrr )
		for (var i=0; i<hrr.length; i++) {
			$("<tr>").html( "<td class='L'>" + hrr[i][0] + "</td><td class='R'>" + hrr[i][1] + "%</td><td class='R'>" + hrr[i][2] + "%</td>" )
				.appendTo( lt );	
		}	
	
	var arrayList = ["RMBUSD", "RMBHKD", "RMBJPY", "RMBAUD", "RMBGBP"],
		url = "http://hq.sinajs.cn/_=123&list=" + arrayList.join(","),
		fxTable = $("#fxTable");
	
	(function(){
		$.getScript( url, function(){
			var bd = fxTable.children("tbody").empty();
			for (var i=0; i<arrayList.length; i++) {
				var code = window[ "hq_str_" + arrayList[i] ]; 
				if ( code ){
					var arr = code.split(",");
					$("<tr>").html( "<td class='L'>" + arr[0] + "</td><td class='R'>" + arr[1] + "</td><td class='R'>" + arr[2] + "</td>" )
						.appendTo( bd );
				}
			}			
		} );
		//5Сʱ��ѯһ��
		setTimeout( arguments.callee,  5 * 60 * 1000 );
		
	})();	
} );

$( function(){
	//����Ϣ˰ʱ����ע��
	if ( window.interestRate == 0 )
		$("#taxTr").text( $("#taxTr").text() + "(�ݲ�����)" );
		
	//��ϸ
	var minH=20, desc = $("#desc"), maxH = desc.height();
	if (minH >= maxH) 
		$("#detail").hide();
	else {
		desc.height( minH );
		$("#detail").toggle(function(){
			desc.animate({
				height: maxH
			});
			$(this).text("[����]");
		}, function(){
			desc.animate({
				height: minH
			});
			$(this).text("[��ϸ]");
		});
	}
	
	//����
	//$("#accordion").accordion();	
	
	//����ѡ����
	$("#types").tabs();
		
	//��ʼ������
	$.datepicker.setDefaults($.datepicker.regional['zh-CN']);
	$.datepicker.setDefaults({
	   dateFormat: 'yy-mm-dd',
	   showAnim : "",
	   showOptions: {direction: 'right' },
	   showOn: 'both',
	   changeMonth: true,
	   changeYear: true,
	   buttonImageOnly: true,
	   buttonImage: 'http://finance.sina.com.cn/calc/images/date-trigger.gif',
	   buttonText: 'Calendar' });
	
	$("input.uidate").datepicker();
	$("input.nowdate").datepicker( 'setDate' , new Date() );
	
	//��̬��ʾ
	message();
	
	//��������
	$(".uinumber").keyup( function(){
		var v = this.value;
		var matches = /\d+(\.\d*)?/.exec( v );
		if ( matches && matches[0] != undefined )
			this.value = matches[0];
		else
			this.value = "";	
	} );
	
	$(".require").keyup( function(){
		if ( $(this).val() != "" ){
			$(this).removeClass("error");
		}
	} ).change( function(){
		if ( $(this).val() != "" ){
			$(this).removeClass("error");
		}		
	} );
			
	//verify form
	//���д���������ʱ ����false
	//$("form.verify").submit( function( e ){
	//����FORM����У��
	$(".contant form").submit( function( e ){
		//�ж��Ƿ�Ϊ������
		var tip =  "�����Ϊ�ա�";
		$(this).find(".require").each( function(){
			if ( $(this).val() == "" ){
				this.title = tip + this.title.replace(tip, "");
				
				$(this).addClass("error").tooltip({
			        tip: '#tooltip',  
			        offset: [5, 2]
			    });;
			}
		} );
		
		var wrongs = $(this).find(".error");
		if (wrongs.length > 0) {
			$(wrongs[0]).focus();
			e.stopImmediatePropagation();
			return false;
		}
	} );
} );
