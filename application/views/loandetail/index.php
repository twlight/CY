<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform');
echo form_open(base_url('index.php/loandetail/post'),$attributes)?>

   <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >您的姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" placeholder="张三" required autofocus>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label" >您的电话</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tel" name="tel" placeholder="135xxxx" required>
    </div>
  </div>
  
    <div class="form-group">
    <label for="load_period" class="col-sm-2 control-label" >贷款周期</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="loan_period" name="loan_period" placeholder="6个月" required>
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="loan_amount" class="col-sm-2 control-label" >您的贷款金额</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="loan_amount" name="loan_amount" placeholder="贷款金额" required >
    </div>
  </div>

  <div class="form-group">
    <label for="carloan" class="col-sm-2 control-label" >有无车贷</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="carloan" name="carloan"placeholder="无">
    </div>
  </div><div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label" required>有无房贷</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="houseloan" name="houseloan"placeholder="无">
    </div>
  </div><div class="form-group">
    <label for="creditloan" class="col-sm-2 control-label">有无信贷</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="creditloan"  name="creditloan"  placeholder="无" required>
    </div>
  </div>
 <div class="form-group">
    <label for="salary" class="col-sm-2 control-label">月薪</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="salary" name="salary" placeholder="10000" required>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">提交</button>
    </div>
	</div>
</form>

 