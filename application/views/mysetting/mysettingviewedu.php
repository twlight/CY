 <ul class="list-group">
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>教育信息：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edu-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        修改
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted" class = "starttime" >开始时间</th>
						              <th class="text-muted" class = "endtime">结束时间</th>
                          <th class="text-muted" class = "major" >所学专业</th>
                          <th class="text-muted" class = "xueli">学历</th>
                           
                        </thead>
                        <tbody>
                        <tr>
						<!--从数据库中查询，填入下面的表格中！很简单-->
                          <td id="starttime" name="starttime"><?php echo $basicinfo['eduin'];?></td>-
                          <td id="endtime" name="endtime"><?php echo $basicinfo['eduout'];?></td>
                          <td id="major" name="major"><?php echo $basicinfo['major'];?></td>
                          <td id="xueli" name="xueli"><?php echo $basicinfo['eduxueli'];?></td>
                        
                         
                        </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>

<div class="modal fade" id="edu-edit" tabindex="-1" role="dialog" aria-labelledby="edu-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >教育信息</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="time" class="col-sm-3 control-label">*起始时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forbasicstarttime">
            
              </div>
          </div>
		  
		  <div class="form-group">
            <label for="time" class="col-sm-3 control-label">*结束时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forbasicendtime">
              </div>
          </div>
		  
        
          <div class="form-group">
            <label for="major" class="col-sm-3 control-label">*专业名称</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forbasicmajor" ></div>
          </div>
          <div class="form-group">
            <label for="degree" class="col-sm-2 control-label">*学历</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forbasicxueli" ></div>
          </div>


            <div class="form-group">
            <label for="degree" class="col-sm-2 control-label">*GPA</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forbasicgpa" ></div>
          </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="functioneditbasicedu()">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


  <script type="text/javascript">
   function functioneditbasicedu()
   {

                  
                    var forbasicstarttime             =document.getElementById("forbasicstarttime");
                    var forbasicendtime           =document.getElementById("forbasicendtime");
                    var forbasicmajor           =document.getElementById("forbasicmajor");
                    var forbasicxueli             =document.getElementById("forbasicxueli");
                    var forbasicgpa           =document.getElementById("forbasicgpa");
                    
                    var basicstarttime   =document.getElementById("starttime");
                    var basicendtime =document.getElementById("endtime");
                    var basicmajor    =document.getElementById("major");
                    var basicxueli  =document.getElementById("xueli");
                    var basicgpa  =document.getElementById("gpa");

   
                    basicstarttime.innerHTML =   forbasicstarttime.value;
                    basicendtime.innerHTML =  forbasicendtime.value;  
                    basicmajor.innerHTML =    forbasicmajor.value;    
                    basicxueli.innerHTML =  forbasicxueli.value;    
                    basicgpa.innerHTML =  forbasicgpa.value;
                       
                    return false;
            }
   </script>