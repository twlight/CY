 <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>项目经历：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#project-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        增加
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted" class = "starttime">开始时间</th>
						              <th class="text-muted" class = "endtime">结束时间</th>
                          <th class="text-muted" class = "projectname">项目名称</th>
                          <th class="text-muted" class = "projectsize">团队规模</th>
                          <th class="text-muted" class = "taskeachperson">负责工作</th>
                          <th class="text-muted" class = "projectinfo">项目描述</th>
                        
                        </thead>
                        <tbody>
                          <tr>
                      
							  <th class="text-muted" id = "projectstarttime" name = "projectstarttime"              ></th>
							  <th class="text-muted" id = "projectendtime"   name = "projectendtime"              ></th>
							  <th class="text-muted" id = "projectname"      name = "projectname"              ></th>
							  <th class="text-muted" id = "projectsize"      name = "projectsize"              ></th>
							  <th class="text-muted" id = "taskeachperson"   name = "taskeachperson"              ></th>
							  <th class="text-muted" id = "projectinfo"      name = "projectinfo"         ></th>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>
    <div class="modal fade" id="project-edit" tabindex="-1" role="dialog" aria-labelledby="project-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >项目经历</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="pr-time" class="col-sm-2 control-label">起止时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forprojectstarttime" ></div>
              <div class="col-sm-4">
              <input type="text" class="form-control" id="forprojectendtime" ></div>
              </div>
        
          <div class="form-group">
            <label for="project-name" class="col-sm-2 control-label">项目名称</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="forprojectname"></div>
          </div>

          <div class="form-group">
            <label for="teamsize" class="col-sm-2 control-label">团队规模</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="forprojectsize" ></div>
          </div>
          <div class="form-group">
            <label for="workfor" class="col-sm-2 control-label">负责工作</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fortaskeachperson" ></div>
          </div>
          <div class="form-group">
            <label for="project-discri" class="col-sm-2 control-label">项目描述</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="forprojectinfo"></textarea>
            </div>
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
<!-- List group -->

<script type="text/javascript">
   function functioneditbasicedu()
   {

                  
                    var projectstarttime             =document.getElementById("projectstarttime");
                    var projectendtime           =document.getElementById("projectendtime");
                    var projectname           =document.getElementById("projectname");
                    var projectsize             =document.getElementById("projectsize");
                    var taskeachperson           =document.getElementById("taskeachperson"); 
                    var projectinfo         =document.getElementById("projectinfo");
                   






                    var forprojectstarttime             =document.getElementById("forprojectstarttime");
                    var forprojectendtime           =document.getElementById("forprojectendtime");
                    var forprojectname           =document.getElementById("forprojectname");
                    var forprojectsize             =document.getElementById("forprojectsize");
                    var fortaskeachperson           =document.getElementById("fortaskeachperson"); 
                    var forprojectinfo   =document.getElementById("forprojectinfo");
                   

   
                   projectstarttime.innerHTML =forprojectstarttime.value;
                   projectendtime.innerHTML =forprojectendtime.value;
                   projectname.innerHTML =forprojectname.value;
                   projectsize.innerHTML =forprojectsize.value;
                   taskeachperson.innerHTML =fortaskeachperson.value;
                   projectinfo.innerHTML =forprojectinfo.value;
                   return false;
            }
   </script>





