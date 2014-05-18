<?php echo validation_errors(); ?>
<div class = "container">
<?php echo form_open(base_url('index.php/releaseloan/post')); ?>

银行ID<input type = "text" name = "bankid" id = "bankid"></input><hr>
银行名称<input type = "text" name = "bankname" id = "bankname"></input><hr>
利率<input type = "text" name = "interest_rate" id = "interest_rate"></input><hr>

贷款特色<input type= "text" name = "loanspecial" id = "loanspecial"></input><hr>


贷款范围<input type = "text" name = "loan_range" id = "loan_range"></input><hr>
其他费用<input type = "text" name = "extra_fee" id = "extra_fee"></input><hr>
贷款期限<input type= "text" name = "loan_period" id = "loan_period"></input><hr>
还款方式<input type= "text" name = "way_of_repayment" id = "way_of_repayment"></input><hr>
放贷时间<input type= "text" name = "loan_time" id = "loan_time"></input><hr>
贷款产品简介<input type= "text" name = "brief_intro_of_loan" id = "brief_intro_of_loan"></input><hr>
申请条件<input type= "text" name = "requirement_of_loan" id = "requirement_of_loan"></input><hr>
申请所需材料<input type= "text" name = "needed_material_of_loan" id = "needed_material_of_loan"></input><hr>

其他<input type= "text" name = "etc" id = "etc"></input><hr>
<input type= "submit" value= "提交"></input>
</form>
</div>