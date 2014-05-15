

<!DOCTYPE html>
<!-- saved from url=(0036)http://ruepay.com/calc/hottol-1.html -->
<html  lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<meta  charset="UTF-8">
		<title>融易宝--你身边的贷款助手</title>
		<meta  name="description"  content="贷款。">
<script  type="text/javascript"  src="/static/js/jquery.min.js"></script>

<script  type="text/javascript"  src="/static/js/wb.js"></script>
<link  rel="stylesheet"  href="/static/css/calculate.css">

<link  rel="stylesheet"  href="/static/css/all.css">

<link  rel="stylesheet"  href="/static/css/calcu.css">

<script  type="text/javascript">
 //详细
$( function(){
var minH=20, desc = $("#desc"), maxH = desc.height();
if (minH >= maxH)
$("#detail").hide();
else {
desc.height( minH );
$("#detail").toggle(function(){
desc.animate({
height: maxH
});
$(this).text("[收起]");
}, function(){
desc.animate({
height: minH
});
$(this).text("[详细]");
});
} 
});
</script>
<script  type="text/javascript">
//全局变量，对所有页面均有效 
//注意：所有数额均不能带引号！！

//通知存款年利率
var notifyYearDate1 = 0.8;  //提前一天通知
var notifyYearDate7 = 1.35;  //提前七天通知

//利息税
var interestRate = 0; 

//活期储蓄利率
var currentRate = 0.3;

//整存整取利率
var lumpRate90 = 2.6;  //三个月
var lumpRate180 = 2.8;  //半年
var lumpRate360 = 3;  //一年
var lumpRate720 = 3.75;  //两年
var lumpRate1080 = 4.25;  //三年
var lumpRate1800 = 4.75;  //五年

//整存零取
var smallRate360 = 2.85;  //一年
var smallRate1080 = 2.9;  //三年
var smallRate1800 = 3;  //五年

//零存整取
var slRate360 = 2.85;  //一年
var slRate1080 = 2.9;  //三年
var slRate1800 = 3;  //五年

//存本取息
var idRate360 = 2.85;  //一年
var idRate1080 = 2.9;  //三年
var idRate1800 = 3;  //五年

//个人贷款利率
var loadRate = 6.55; 

//基金买卖
var fundRate1 = 1.5;     //申购
var fundRate2 = 0.5;     //赎回
var fundRate3 = 1.2;     //认购

//个人所得税
var personUnexpectedRate = 0.2; //意外所得税 
var personPaperRate = 0.3; //稿酬所得 
var personTaxBase = 3500; //个税起征额 

//外汇储蓄利息税
var fxRateFee = 0;
//外汇储蓄汇率
var fxRateArray = [
//活期  七天通知  一个月  三个月  六个月  一年  二年 
[0.1000,0.1000,0.2500,0.4000,0.7500,1.0000,1.2000] , //*美元 
[0.1250,0.1750,0.2500,0.3500,0.6000,0.7500,0.7500], //英镑  
[0.1000,0.3750,0.4500,0.6500,0.9550,1.1000,1.1500], //*欧元  
[0.0001,0.0005,0.0100,0.0100,0.0100,0.0100,0.0100], //日元 
[0.0200,0.0200,0.1000,0.2500,0.5000,0.7000,0.7500], //港币 
[0.0100,0.0500,0.0500,0.0500,0.3000,0.4000,0.4000], //加拿大元 
[0.0001,0.0005,0.0100,0.0100,0.0100,0.0100,0.0100], //瑞士法郎 
[0.2375,0.2625,1.2400,1.3875,1.5075,1.5750,1.5750], //澳大利亚元 
[0.0001,0.0005,0.0100,0.0100,0.0100,0.0100,0.0100] //新加坡元 
];

//房贷利率
//1，2，3....为ID 再有利率变动增加时，需要递增
//title用户下拉框显示
//rate依次为 商贷 3-5年  商贷 5-30年  公积金 1-5年  公积金 5-30年
// isdefault: true, 为下拉框中的默认显示项

//商贷利率 3-5年  5-30年
var houseLoanBuzzRate = {
	1	: {
		title	: "08年11月27日利率下限",
		rate	: [ 0.0416, 0.0428]
	},
	2	: {
		title	: "08年11月27日利率上限",
		rate	: [ 0.0653, 0.0673]
	},
	3	: {
		title	: "08年11月27日基准利率",
		rate	: [ 0.0594, 0.0673]
	},	
	4	: {
		title	: "08年11月27日第二套房",
		rate	: [ 0.0653, 0.0673]
	},
	5	: {
		title	: "08年12月23日利率下限(7折)",
		rate	: [ 0.0403, 0.0416]
	},
	6	: {

		title	: "08年12月23日利率下限(8折)",
		rate	: [ 0.0461, 0.0475]
	},	
	7	: {
		title	: "08年12月23日利率下限(85折)",
		rate	: [ 0.0490, 0.0505]
	},
	8	: {
		title	: "08年12月23日利率上限(1.1倍)",
		rate	: [ 0.0634, 0.0653]
	},
	9	: {
		title	: "08年12月23日基准利率",
		rate	: [ 0.0576, 0.0594]
	},
	10	: {
		title	: "08年12月23日第二套房(1.1倍)",
		rate	: [ 0.0634, 0.0653]

        },
	11	: {

                title	: "10年10月20日基准利率",
		rate	: [ 0.0596, 0.0614]

        },
	12	: {

                title	: "10年12月26日基准利率",
		rate	: [ 0.0614, 0.0640]

        },
	13	: {

                title	: "11年02月09日基准利率",
		rate	: [ 0.0645, 0.066]

        },
	14	: {

                title	: "11年04月06日基准利率",
		rate	: [ 0.0665, 0.068]

        },
	15	: {

                title	: "11年07月07日基准利率",
		rate	: [ 0.0690, 0.0705]

        },
	16	: {

                title	: "12年06月08日基准利率",
		rate	: [ 0.0650, 0.0680]

        },
	17	: {
		isdefault: true,
                title	: "12年07月06日基准利率",
		rate	: [ 0.0640, 0.0655]

	}											
};
//公积金贷款利率 1-5年  5-30年
var houseLoanCounRate = {
	1	: {
		title	: "08年11月27日后",
		rate	: [ 0.0351, 0.0405]
	},
	2	: {

		title	: "08年12月23日后",
		rate	: [ 0.0333, 0.0387]
	},

	3	: {

		title	: "10年10月20日后",
		rate	: [ 0.0350, 0.0405]
	},

	4	: {

		title	: "10年12月26日后",
		rate	: [ 0.0375, 0.0430]

	},

	5	: {

		title	: "11年02月09日后",
		rate	: [ 0.04, 0.045]

	},

	6	: {

		title	: "11年04月06日后",
		rate	: [ 0.042, 0.047]

	},

	7	: {

		title	: "11年07月07日后",
		rate	: [ 0.0445, 0.049]

	},

	8	: {

		title	: "12年06月08日后",
		rate	: [ 0.042, 0.047]

	},

	9	: {
		isdefault: true,
		title	: "12年07月06日后",
		rate	: [ 0.040, 0.045]
	}										
};
//首页右侧房贷利率
var houseLoanRateRight = [ 

["12.07.06后商贷基准", 6.40, 6.55],
["12.07.06后公积金贷", 4.00, 4.50],
["12.06.08后商贷基准", 6.65, 6.80],
["12.06.08后公积金贷", 4.20, 4.70],
["11.07.07后商贷基准", 6.90, 7.05],
["11.07.07后公积金贷", 4.45, 4.90],
["11.04.06后商贷基准", 6.65, 6.80],
["11.04.06后公积金贷", 4.20, 4.70],
["11.02.09后商贷基准", 6.45, 6.60],
["11.02.09后公积金贷", 4.00, 4.50],
["10.12.26后商贷基准", 6.22, 6.40],
["10.12.26后公积金贷", 3.75, 4.30],
["10.10.20后商贷基准", 5.96, 6.14],
["10.10.20后公积金贷", 3.50, 4.05],
["08.12.23后商贷基准", 5.76, 5.94],
["08.12.23后商贷8折", 4.61, 4.75],
["08.12.23后商贷7折", 4.03, 4.16],
["08.12.23后公积金贷", 3.33, 3.87],
["08.11.27后公积金贷", 3.51, 4.05]

 ];

</script>	
		<script  type="text/javascript"  charset="utf-8"  src="/static/js/makeone.js"></script>
		<script  type="text/javascript"  charset="utf-8"  src="/static/js/house_loan20110517.js"></script>
</head>


<body>
<div  class="nav">
			<div  class="container">
				<div  class="logo">
					<a  href="http://ruepay.com/"><img  src="/static/img/logo.png"  alt="Logo"></a>
				</div>
				<div  class="lbs">
					<span>金融超市</span>
				</div>
				<div  class=""></div>
				<ul  class="nav-menu">
					<li  class="loan ">
						<a  href="http://ruepay.com/calc/hottol-1.html#">我要贷款</a>
					</li>
					<li  class="car-isure">
						<a  href="http://ruepay.com/calc/hottol-1.html#">我想买车险</a>
					</li>
					
					<li  class="car-isure">
						<a  href="http://ruepay.com/calc/hottol-1.html#">我要申请信用卡</a>
					</li>
					
					<li  class="car-isure">
						<a  href="http://ruepay.com/calc/hottol-1.html#">我要买基金</a>
					</li>
				</ul>
			</div>
		<div  class="line-th"></div>
		</div>

<div  class="warp">
	<div  class="main m01 l-fix">
		<div  class="lBox"  id="slide_1">
          	<dl  param="house"  class="zc_show">
			<dt  class="zc_down">房贷计算器</dt>
			    <dd>
	                <p><a  param="loan"  href="http://ruepay.com/calc/hottol-1.html"  class="selected">房贷计算器</a></p>
	                <p><a  param="early"  href="http://ruepay.com/calc/hottol-2.html">提前还款计算器</a></p>
	                <p><a  param="interest"  href="http://ruepay.com/calc/hottol-3.html">利率调整影响计算器</a></p>
			    </dd>
            </dl>
            <dl>
		    <dt  param="stock">股票计算器</dt>
	            <dd>
	                <p><a  param="income"  href="http://ruepay.com/calc/hottol-4.html">股票投资损益</a></p>
	                <p><a  param="protected"  href="http://ruepay.com/calc/hottol-5.html">保本卖出价</a></p>
			    </dd>
            </dl>
            <dl>
            <dt  param="fund">基金计算器</dt>
		    	<dd>
		        	<p><a  param="charge"  href="http://ruepay.com/calc/hottol-6.html">开放式基金申赎</a></p>
		        </dd>
            </dl>
            <dl>
            <dt  param="bond">债券计算器</dt>
		    	<dd>
		        	<p><a  param="int"  href="http://ruepay.com/calc/hottol-7.html">固定利率债券收益率</a></p>
                    <p><a  param="zero"  href="http://ruepay.com/calc/hottol-8.html">零息债券收益率</a></p>
		        </dd>
            </dl>
            <dl>
            <dt>税务计算器</dt>
	            <dd>
			        	<p><a  href="http://ruepay.com/calc/hottol-9.html">个人所得税</a></p>
			    </dd>
            </dl>
            <dl>
            <dt  param="insur">年金计算器</dt>
	            <dd>
			        	<p><a  param="house"  href="http://ruepay.com/calc/hottol-10.html">住房公积金</a></p>
	                    <p><a  param="pension"  href="http://ruepay.com/calc/hottol-11.html">基本养老保险</a></p>
			    </dd>
            </dl>
            <dl>
            <dt  param="bank">银行计算器</dt>
	            <dd>
			        	<p><a  param="current"  href="http://ruepay.com/calc/hottol-12.html">活期储存</a></p>
	                    <p><a  param="call"  href="http://ruepay.com/calc/hottol-13.html">通知存款</a></p>
	                    <p><a  param="lump_lump"  href="http://ruepay.com/calc/hottol-14.html">整存零取</a></p>
	                    <p><a  param="small_lump"  href="http://ruepay.com/calc/hottol-15.html">零存整取</a></p>
	                    <p><a  param="interest"  href="http://ruepay.com/calc/hottol-16.html">存本取息</a></p>
	                    <p><a  param="time_opt"  href="http://ruepay.com/calc/hottol-17.html">定活两便</a></p>
	                    <p><a  param="loan"  href="http://ruepay.com/calc/hottol-18.html">个人贷款</a></p>
	                    <p><a  param="liquid"  href="http://ruepay.com/calc/hottol-19.html">准备金率调整影响</a></p>
			    </dd>
            </dl>
		</div>
        <script  type="text/javascript">
			//<![CDATA[
			function slideTab(slideId) {

				var curSlide = document.getElementById(slideId);
				var curTab = curSlide.getElementsByTagName("dt");
				var count = curTab.length;
				for (var i=0;i<count ;i++ )
				{
				   curTab[i].onclick = function() {
				      var dl = this.parentNode;
					  dl.className = dl.className == "zc_show" ? "" : "zc_show";
					  this.className = this.className == "zc_down" ? "zc_up" : "zc_down" ;
				   }
				}
				return false;
			}

			slideTab("slide_1")
			function left( dl, dd ){
				var dl = jQuery("#slide_1 dl[param='" + dl + "']").addClass( "zc_show" );
				dl.find("DT").addClass("zc_down");
				dl.find("DD p a[param='" + dd + "']").addClass("selected");
			}

			//]]>
</script>

		<div  class="rBox">
        	<div  class="contant">
		 	<div  id="center">
    <h2>房贷</h2>
    <div  id="detailct">
        <a  href="javascript:void(0)"  id="detail">[详细]</a>
        <div  id="desc"  style="height: 20px;">           本计算器提供等额本息、等额本金，及住房公积金贷款特有的自由还款方式的计算参考。在贷款期限方面，支持非整年的期数。贷款利率除提供常用备选利率外，还支持自定义输入。计算结果包含月供、公积金月最低还款额、本息总额等。 
        </div>
    </div>
    <div  id="types"  class="ui-tabs ui-widget ui-widget-content ui-corner-all">
        <div  id="tabs-1">
            <form  id="houseLoan"  class="verify">
                <div  class="input">
                    <table  cellspacing="0"  cellpadding="0">
                        <tbody>
                            <tr>
                                <td  class="frontface">
                                    贷款类型
                                </td>
                                <td>
                                    <div  id="loadType"  class="ui-buttonset">
                                        <input  type="radio"  checked="checked"  name="radio"  id="radio3"  value="1"  class="ui-helper-hidden-accessible">
                                        <label  for="radio3"  class="ui-state-active ui-button ui-widget ui-state-default ui-button-text-only ui-corner-left"  aria-pressed="true"  role="button"  aria-disabled="false"><span  class="ui-button-text"><span  class="ui-button-text">
                                            商业贷款
                                        </span></span></label>
                                        <input  type="radio"  name="radio"  id="radio5"  value="2"  class="ui-helper-hidden-accessible">
                                        <label  for="radio5"  aria-pressed="false"  class="ui-button ui-widget ui-state-default ui-button-text-only"  role="button"  aria-disabled="false"><span  class="ui-button-text"><span  class="ui-button-text">
                                            公积金
                                        </span></span></label>
                                        <input  type="radio"  name="radio"  id="radio6"  value="3"  class="ui-helper-hidden-accessible">
                                        <label  for="radio6"  aria-pressed="false"  class="ui-button ui-widget ui-state-default ui-button-text-only ui-corner-right"  role="button"  aria-disabled="false"><span  class="ui-button-text"><span  class="ui-button-text">
                                            组合型
                                        </span></span></label>
                                    </div>
                                </td>
                            </tr>
                            <tr  class="buzzTr">
                                <td  class="frontface">
                                    商业贷款金额
                                </td>
                                <td>
                                    <input  value=""  id="loadBuzzAmt"  class="uinumber require"><span  class="unit">万元</span>
                                </td>
                            </tr>
                            <tr  class="counTr"  style="display: none;">
                                <td  class="frontface">
                                    公积金贷款金额
                                </td>
                                <td>
                                    <input  value="0"  id="loadCounAmt"  class="uinumber require"><span  class="unit">万元</span>
                                </td>
                            </tr>
                            <tr>
                                <td  class="frontface">
                                    贷款期限
                                </td>
                                <td>
                                    <input  id="years"  value="20"  class="uinumber require"><span  class="unit">年</span>
                                    <select  id="month">
                                        <option  value="0"  selected="selected">0</option>
                                        <option  value="1">1</option>
                                        <option  value="2">2</option>
                                        <option  value="3">3</option>
                                        <option  value="4">4</option>
                                        <option  value="5">5</option>
                                        <option  value="6">6</option>
                                        <option  value="7">7</option>
                                        <option  value="8">8</option>
                                        <option  value="9">9</option>
                                        <option  value="10">10</option>
                                        <option  value="11">11</option>
                                    </select>
                                    <span  class="unit">月 (共<span  id="term">240</span>期)</span>
                                </td>
                            </tr>
                            <tr  class="buzzTr">
                                <td  class="frontface">
                                    商业贷款利率
                                </td>
                                <td>
                                    <select  id="buzzRateSel">
                                        <option  value="-1">手动输入</option>
                                    <option  value="1">08年11月27日利率下限</option><option  value="2">08年11月27日利率上限</option><option  value="3">08年11月27日基准利率</option><option  value="4">08年11月27日第二套房</option><option  value="5">08年12月23日利率下限(7折)</option><option  value="6">08年12月23日利率下限(8折)</option><option  value="7">08年12月23日利率下限(85折)</option><option  value="8">08年12月23日利率上限(1.1倍)</option><option  value="9">08年12月23日基准利率</option><option  value="10">08年12月23日第二套房(1.1倍)</option><option  value="11">10年10月20日基准利率</option><option  value="12">10年12月26日基准利率</option><option  value="13">11年02月09日基准利率</option><option  value="14">11年04月06日基准利率</option><option  value="15">11年07月07日基准利率</option><option  value="16">12年06月08日基准利率</option><option  value="17">12年07月06日基准利率</option><option  value="1">08年11月27日利率下限</option><option  value="2">08年11月27日利率上限</option><option  value="3">08年11月27日基准利率</option><option  value="4">08年11月27日第二套房</option><option  value="5">08年12月23日利率下限(7折)</option><option  value="6">08年12月23日利率下限(8折)</option><option  value="7">08年12月23日利率下限(85折)</option><option  value="8">08年12月23日利率上限(1.1倍)</option><option  value="9">08年12月23日基准利率</option><option  value="10">08年12月23日第二套房(1.1倍)</option><option  value="11">10年10月20日基准利率</option><option  value="12">10年12月26日基准利率</option><option  value="13">11年02月09日基准利率</option><option  value="14">11年04月06日基准利率</option><option  value="15">11年07月07日基准利率</option><option  value="16">12年06月08日基准利率</option><option  value="17">12年07月06日基准利率</option></select>
                                    <input  id="buzzRate"  value="0.00"  class="uinumber require"  style="width:50px;"><span  class="unit">%</span>
                                </td>
                            </tr>
                            <tr  class="counTr"  style="display: none;">
                                <td  class="frontface">
                                    公积金贷款利率
                                </td>
                                <td>
                                    <select  id="counRateSel">
                                        <option  value="-1">手动输入</option>
                                    <option  value="1">08年11月27日后</option><option  value="2">08年12月23日后</option><option  value="3">10年10月20日后</option><option  value="4">10年12月26日后</option><option  value="5">11年02月09日后</option><option  value="6">11年04月06日后</option><option  value="7">11年07月07日后</option><option  value="8">12年06月08日后</option><option  value="9">12年07月06日后</option><option  value="1">08年11月27日后</option><option  value="2">08年12月23日后</option><option  value="3">10年10月20日后</option><option  value="4">10年12月26日后</option><option  value="5">11年02月09日后</option><option  value="6">11年04月06日后</option><option  value="7">11年07月07日后</option><option  value="8">12年06月08日后</option><option  value="9">12年07月06日后</option></select>
                                    <input  id="counRate"  value="0.00"  class="uinumber require"  style="width:50px;"><span  class="unit">%</span>
                                </td>
                            </tr>
                            <tr>
                                <td  class="frontface">
                                    还款方式
                                </td>
                                <td>
                                	<div  id="payType"  class="ui-buttonset">
                                        <input  type="radio"  checked="checked"  name="radioPay"  id="radioPay1"  value="1"  class="ui-helper-hidden-accessible">
                                        <label  for="radioPay1"  class="ui-state-active ui-button ui-widget ui-state-default ui-button-text-only ui-corner-left"  aria-pressed="true"  role="button"  aria-disabled="false"><span  class="ui-button-text"><span  class="ui-button-text">
                                            等额本息
                                        </span></span></label>
                                        <input  type="radio"  name="radioPay"  id="radioPay2"  value="2"  class="ui-helper-hidden-accessible">
                                        <label  for="radioPay2"  aria-pressed="false"  class="ui-button ui-widget ui-state-default ui-button-text-only"  role="button"  aria-disabled="false"><span  class="ui-button-text"><span  class="ui-button-text">
                                            等额本金
                                        </span></span></label>
										<input  type="radio"  name="radioPay"  id="radioPay6"  value="3"  class="ui-helper-hidden-accessible"  style="display: none;">
                                        <label  for="radioPay6"  id="radioPay6Label"  aria-pressed="false"  class="ui-button ui-widget ui-state-default ui-button-text-only ui-corner-right"  role="button"  aria-disabled="false"  style="display: none;"><span  class="ui-button-text"><span  class="ui-button-text">
                                            自由还款
                                        </span></span></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <center>
                        <button  type="submit"  hidefocus="true">
                            计算
                        </button>
                        <button  type="reset"  id="resetbtn"  hidefocus="true">
                            重置
                        </button>
                    </center>
                </div>
                <div  class="output">
                    <div  class="zch2">
                        <h4>计算结果</h4>
                    </div>
                    <style>
                        #buzzRateSel, #counRateSel {
                            width: 200px;
                        }

                        #types table tr td#rateTd {
                            padding-left: 190px;
                            padding-top: 0;
                            width: 348px;
                            font-size: 12px;
                        }

                        .counTr {
                            display: none;
                        }

                        .list {
                            height: 25px;
                            overflow: auto;
                            background: #FFFFFF;
                            vertical-align: top;
                            width: 700px;
                            -moz-user-select: all;
                            overflow-x: hidden;
                        }

                        .listhead {
                            border-bottom: 1px solid #CCCCCC;
                        }

                        .listhead div {
                            font-size: 12px;
                            color: #0152A4;
                        }

                        .ct div {
                            width: 103px;
                            display: inline-block;
                            float: left;
                            text-align: center;
                            overflow: hidden;
							padding:10px 0;
                        }

                        .ct dd, .ct dt {
                            display: block;
                            width: 100%;
                            overflow: hidden;
                        }

                        .ct dd {
                            border-bottom: 1px dashed #CCCCCC;
                        }
                    </style>
                        <div  class="ct"  id="detailsWrap">
                            <dl  style="padding-right:18px;">
                                <dt  class="listhead">
                                    <div>
                                        期次
                                    </div>
                                    <div>
                                        偿还本息(元)
                                    </div>
                                    <div>
                                        偿还利息(元)
                                    </div>
                                    <div>
                                        偿还本金(元)
                                    </div>
                                    <div>
                                        剩余本金(元)
                                    </div>
                                    <div  class="clear">
                                    </div>
                                </dt>
                            </dl>
                            <dl  class="list">
                            </dl>
                        </div>
						<div  class="ct"  style="display:none;"  id="freeWrap">
                            <dl  style="padding-right:18px;">
                                <dt  class="listhead">
                                    <div>
                                        期次
                                    </div>
                                    <div>
                                        最低偿还本息(元)
                                    </div>
                                    <div>
                                        最低偿还利息(元)
                                    </div>
                                    <div>
                                        最低偿还本金(元)
                                    </div>
                                    <div>
                                        剩余本金(元)
                                    </div>
                                    <div  class="clear">
                                    </div>
                                </dt>
                            </dl>
                            <dl  class="list">
                            </dl>
                        </div>

                        <table  width="100%"  align="center"  cellspacing="0"  cellpadding="0"  border="0"  id="detailsTable">
                            <tbody>
                                <tr  id="BuzzIntAmtTr"  style="display:none;">
                                    <td  class="frontface">
                                        商贷支付利息
                                    </td>
                                    <td>
                                        <input  class="txtd"  readonly=""  id="BuzzIntAmt"><span  class="unit">元</span>
                                    </td>
                                </tr>
                                <tr  id="CounIntAmtTr"  style="display:none;">
                                    <td  class="frontface">
                                        公积金支付利息
                                    </td>
                                    <td>
                                        <input  class="txtd"  readonly=""  id="CounIntAmt"><span  class="unit">元</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="frontface">
                                        累计支付利息
                                    </td>
                                    <td>
                                        <input  class="txtd"  readonly=""  id="intAmt"><span  class="unit">元</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="frontface">
                                        累计还款总额
                                    </td>
                                    <td>
                                        <input  class="txtd"  readonly=""  id="fullAmt"><span  class="unit">元</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

						<table  width="100%"  align="center"  cellspacing="0"  cellpadding="0"  border="0"  style="display: none;"  id="freeTable">
                            <tbody>
                                <tr>
                                    <td  class="frontface">
                                        月最低还款额
                                    </td>
                                    <td>
                                        <input  class="txtd"  readonly=""  id="lessPay"><span  class="unit">元</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td  class="frontface">
                                        最后一期偿还本金
                                    </td>
                                    <td>
                                        <input  class="txtd"  readonly=""  id="lastAmount"><span  class="unit">元</span>
                                    </td>
                                </tr>
								<tr>
                                    <td  class="frontface">
                                        最后一期偿还利息
                                    </td>
                                    <td>
                                        <input  class="txtd"  readonly=""  id="lastInt"><span  class="unit">元</span>
                                    </td>
                                </tr>
								<tr>
                                    <td  class="frontface">
                                        累积支付利息
                                    </td>
                                    <td>
                                        <input  class="txtd"  readonly=""  id="totalInt"><span  class="unit">元</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                </div>
                </form></div>
            
        </div>
    </div>
    <script  type="text/javascript">
        left("house", "loan");
    </script>

		 </div>
        </div>
      </div>
</div>
<div  class="foot">
			<div  class="container">
				<div  class="foot-link">
					<a  href="http://ruepay.com/calc/introduce.html"  target="_blank">关于我们</a>
					|
					<a  href="http://ruepay.com/calc/contact.html"  target="_blank">联系我们</a>
					|
					<a  href="http://ruepay.com/calc/privacy.html"  target="_blank">服务条款</a>
					|
					<a  href="http://ruepay.com/calc/joinus.html"  target="_blank">加入我们</a>
					|
					<a  href="javascript:;"  id="suggest-open">投诉建议</a>
					|
					<a  href="http://ruepay.com/calc/privacy.html"  target="_blank">免责声明</a>

				</div>
				<div  class="copyright">
					©2013 Ruepay.com <a  href="http://www.miibeian.gov.cn/"  target="_blank">粤ICP备11052668号</a>
				</div>
			</div>
		</div>
	
</body></html>