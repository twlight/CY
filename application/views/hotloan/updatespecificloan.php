<?php echo validation_errors(); 
		$row = $hotloan_item; 
?>
<div class = "row">
<?php echo form_open(base_url('index.php/hotloan/post_update_loan')); ?>

   
 <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >loanid</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "loanid" id = "loanid" placeholder="ID" required  value="<?php echo $row['loanid'] ?>">
    </div>
  </div>
  
 <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >银行ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "bankid" id = "bankid" placeholder="ID" required autofocus value="<?php echo $row['bankid'] ?>">
    </div>
  </div>
  <br>

  <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >利率</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "interest_rate" id = "interest_rate" placeholder="必填" required value="<?php echo $row['interest_rate'] ?>" >
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >贷款特色</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "loanspecial" id = "loanspecial" placeholder="必填" required value="<?php echo $row['loanspecial'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >贷款范围</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "loan_range" id = "loan_range" placeholder="必填" required value="<?php echo $row['loan_range'] ?>" >
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >其他费用</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "extra_fee" id = "extra_fee" placeholder="必填" required value="<?php echo $row['extra_fee'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >贷款期限</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "loan_period" id = "loan_period" placeholder="必填" required value="<?php echo $row['loan_period'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >还款方式</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "way_of_repayment" id = "way_of_repayment" placeholder="必填" required value="<?php echo $row['way_of_repayment'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >放贷时间</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "loan_time" id = "loan_time" placeholder="必填" required value="<?php echo $row['loan_time'] ?>">
    </div>
  </div>
 <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >贷款产品简介</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "brief_intro_of_loan" id = "brief_intro_of_loan" placeholder="必填" required value="<?php echo $row['brief_intro_of_loan'] ?>">
    </div>
  </div>
 <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >申请条件</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "requirement_of_loan" id = "requirement_of_loan" placeholder="必填" required value="<?php echo $row['requirement_of_loan'] ?>">
    </div>
  </div>
 <div class="form-group">
    <label for="username" class="col-sm-2 control-label" >申请所需材料</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "needed_material_of_loan" id = "needed_material_of_loan" placeholder="必填" required value="<?php echo $row['needed_material_of_loan'] ?>">
    </div>
  </div>
<div class="form-group">
    <label for="username" class="col-sm-2 control-label" >其他</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name = "etc" id = "etc" placeholder="必填" required value="<?php echo $row['etc'] ?>">
    </div>
</div>

<div class="form-group">
 <div class="col-sm-10">
  <input type= "submit" class="btn btn-primary" value= "提交修改"></input>
  </div>
</div>
</form>
</div>
