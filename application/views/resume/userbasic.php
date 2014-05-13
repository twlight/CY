<div class="row">
          <div class="panel panel-default">
            <div class="panel-heading">基本信息</div>
            <div class="panel-body">
              <?php
			 $attributes = array('class' => 'form-horizontal','role' => 'form'); 			  
			  echo form_open( base_url("/resume/updatebasic"),$attributes);
			  ?>
				
				<div class="form-group">
                  <label for="male" class="col-sm-2 control-label">*用户ID</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="userid" name="userid" value="<?php echo $userid?>"></div>
                </div>
				 <div class="form-group">
                  <label for="male" class="col-sm-2 control-label">*性别</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="gender" name="gender" placeholder = "女" required autofocus ></div>
                </div>
				
				
				<div class="form-group">
                  <label for="male" class="col-sm-2 control-label">*居住地</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="address" name="address" placeholder = "广东广州" required></div>
                </div>
				
               
                
                <div class="form-group">
                  <label  class="col-sm-2 control-label">*出生日期</label>
                  <div class="col-sm-4">
                    <input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="born" name="born" required></div>
                </div>
                <div class="form-group">
                  <label for="phone"class="col-sm-2 control-label">*手机</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="phone" name="phone" required></div>
                </div>
                <div class="form-group">
                  <label for="Email" class="col-sm-2 control-label">*邮箱</label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" id="email" name="email" required></div>
                </div>

                <div class="form-group">
                  <label for="politicystate" class="col-sm-2 control-label">*政治面貌</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="politicystate" name="politicystate" required></div>
                </div>

                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-warning">
                下一步
                  </button>
                </div>

              </form>
          </div>
</div>