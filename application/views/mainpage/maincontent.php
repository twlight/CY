<div class= "row">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div class="inner">
 <div class="carousel-inner">
          <div class="item active">
            <img class ="container" src="<?php echo base_url('/static/img/a.png');?>" alt="First slide">
              <div class="carousel-caption">
                <h1>随便写点东西</h1>
                <p>...</p>
            </div>
          </div>
          <div class="item">
            <img class ="container" src="<?php echo base_url('/static/img/b.png');?>" alt="Second slide">
             <div class="carousel-caption">
                <h3>...</h3>
                <p>...</p>
            </div>
          </div>
          <div class="item">
            <img class ="container" src="<?php echo base_url('/static/img/c.png');?>" alt="Third slide">
             <div class="carousel-caption">
                <h3>...</h3>
                <p>...</p>
            </div>
          </div>
        </div>
       <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <form action = "<?php echo base_url('/index.php/mainpage/addnormaluser/1');?>" method = "post">
   <div  class="left carousel-control pay-form">
        <h3 class="pull-left col-sm-12">快速申请贷款</h3>
		<div class="form-group">
		<label for="username" class="col-sm-4 control-label">贷款金额</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="loan_amount" name="loan_amount" placeholder="1000" required autofocus>
		</div>
		 </div>
			
		<div class="form-group">
		<label for="username" class="col-sm-4 control-label">贷款期限</label>
		<div class="col-sm-10">
		  <select class="form-control" name="loan_period" id="loan_period">
				<option>6个月</option>
				<option>1年</option>
				<option>2年</option>
				<option>3年</option>
		  </select>
		</div>
		</div>
		<div class="form-group">
					<label for="username" class="col-sm-4 control-label">您的手机</label>
					<div class="col-sm-10">
					  <input type="text" class="col-sm-6 form-control" id="tel" name="tel" placeholder="135XXX" required>
					  <input type="button" class="col-sm-6 btn btn-primary" id="fortel" name="fortel" value="获取手机验证码">
					</div>			
		</div>
		<div class="form-group">
					<label for="username" class="col-sm-4 control-label">验证码</label>
					<div class="col-sm-10">
					  <input type="text" class="col-sm-6 form-control" id="checkcode" name="checkcode" placeholder="135XXX" required>
					</div>			
		</div>
		
		<div class="form-group">
				
					<div class="col-sm-10">
					<br>
					  <input type="submit" class="col-sm-12 btn btn-primary" value="提交!">
					</div>			
		</div>
		
     </div>
	 </form>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
</div>
</div>