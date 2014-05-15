<?php echo validation_errors(); ?>

<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>提交成功!</strong>填写下面基本信息将提高贷款成功率...
</div>

<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform');
echo form_open('http://localhost/index.php/loandetail/updateuserinfo/'.$userid,$attributes)?>
   
   <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >您的姓名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" placeholder="张三" required autofocus>
    </div>
  </div>
	<div class="form-group">
    <label for="username" class="col-sm-2 control-label" >您的手机</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usertel" name="usertel" placeholder="134xxxx" required value="<?php echo $tel;?>">
    </div>
	</div>
	<div class="form-group">
    <label for="username" class="col-sm-2 control-label" >您的ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="userid" name="userid" placeholder="134xxxx" required value="<?php echo $userid;?>">
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

 