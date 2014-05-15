   <div class="rBox">
           <div class="contant">
		 					<div id="center">
					<h2>个人贷款</h2>
					<div id="detailct">
						<a href="javascript:void(0)" id="detail">[详细]</a>
						<div id="desc" style="height: 20px;">本计算器是根据贷款额、贷款期限和贷款利率算出利息，不同贷款期限的利率是不同的，本基准利率是2012年7月6日调整并实施的</div>
					</div>

					<div id="types" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
						<div id="tabs-1">
							<div class="input">
								<form id="lumpSmall" class="verify">
								<table cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td class="frontface">
												贷款金额
											</td>
											<td>
												<input id="loadAmt" class="uinumber require"><span class="unit">元</span>
											</td>
										</tr>
										<tr>
											<td class="frontface">
												贷款期限
											</td>
											<td>
												<select id="deadline" onchange="show(this.options[this.options.selectedIndex].value);">
													<option value="6" selected="selected">6个月</option>
													<option value="12">1年</option>
													<option value="24">2年</option>
													<option value="36">3年</option>
												</select><span class="unit"> </span> 
											</td>
										</tr>
										<tr>
											<td class="frontface">
												还款方式
											</td>
											<td>
												<div id="payType" class="ui-buttonset">
													<input type="radio" checked="checked" name="radio1" id="radio" value="1">等额本息
													<input type="radio" name="radio1" id="radio" value="2" >等额本金
												</div>
											</td>
										</tr>
										<tr>
											<td class="frontface">
												贷款基准利率

											</td>
											<td>
												<input type="text" id="lendingrates" value="5.6% " readonly><span class="unit"></span>
											</td>
										</tr>
                                     </tbody>
                                   
                                  </table> 
									<button  type="submit"  onclick="Calculator()">计算</font></button>
									<button   type="reset"   onclick="Reset()">重置</button> 
								
								</form>
							</div>

							<!--<div class="output">
						          <div class="ct">
													          	
									<dl id="container" class="list">
						          	</dl>
						          </div>-->
									<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
								      <tbody>	  
  										<tr>
								          <td class="frontface">支付利息</td>
								          <td><input type="text" readonly value=" " id="a1"><span class="unit">元</span></td>
								        </tr>
								        <p> 
								        </p>																      	
								        <tr>
								          <td class="frontface">还款总额</td>
								          <td><input type="text" readonly value=" " id="a2"><span class="unit">元</span></td>
								        </tr>								      	
								      </tbody>
								</table>						
							</div>	

						</div>
					</div>
				</div>
				<script type="text/javascript"> left( "bank", "loan" ); </script>		
		 </div>
        </div>
   
</div>
