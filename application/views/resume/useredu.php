      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">最新教育信息</div>
            <div class="panel-body">

              <?php
			 $attributes = array('class' => 'form-horizontal','role' => 'form'); 			  
			  echo form_open("index.php/resume/update_edu",$attributes);
			  ?>
			  	<div class="form-group">
                  <label for="edu-in" class="col-sm-2 control-label">*用户ID</label>
                  <div class="col-sm-2">
                    <input type="text"  class="form-control"   id="userid"  name="userid" value="<?php echo $userid;?>"></div>
                </div>

                <div class="form-group">
                  <label for="edu-in" class="col-sm-2 control-label">*入学时间</label>
                  <div class="col-sm-2">
                    <input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="edu-in"  name="edu-in"></div>
                </div>
                <div class="form-group">
                  <label for="edu-out" class="col-sm-2 control-label">*毕业时间</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" onfocus="HS_setDate(this)"  id="edu-out" name="edu-out"></div>
                </div>
                <div class="form-group">
                  <label for="university" class="col-sm-2 control-label">*就读学校</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="university" name="university" placeholder="Enter university"></div>
                </div>
                <div class="form-group">
                  <label for="major" class="col-sm-2 control-label">*专业名称</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="major" name="major" placeholder="Enter major"></div>
                </div>
                <div class="form-group">
                  <label for="degree" class="col-sm-2 control-label">*学历</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="xueli" name="xueli" placeholder="Enter major"></div>
                </div>

                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-warning">提交基本建立信息</button>
                </div>

              </form>
            </div>
          </div>

        </div>
      </div>
