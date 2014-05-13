     <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>实习经历：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#internship-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        增加
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted" class = "starttime">开始时间</th>
						              <th class="text-muted" class = "endtime">结束时间</th>
                          <th class="text-muted" class = "career">职位</th>
                          <th class="text-muted" class = "careerinfo">职务描述</th>
                        
                        </thead>
                        <tdoby>
                          <tr>
                          <td id="socialstarttime" name="socialstarttime"></td>-
                          <td id="socialendtime" name="socialendtime"></td>
                          <td id="socialcareer" name="socialcareer"></td>
                          <td id="socialcareerinfo" name="socialcareerinfo"></td>
                                                
                          </tr>
                        </tdoby>
                      </table>

                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>
<div class="modal fade" id="internship-edit" tabindex="-1" role="dialog" aria-labelledby="internship-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >实习经历</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="in-time" class="col-sm-2 control-label">起止时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forsocialstarttime" ></div>
          </div>
          <div class="form-group">
            <label for="company" class="col-sm-2 control-label">工作单位</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="forsocialendtime"></div>
          </div>
          <div class="form-group">
            <label for="in-position" class="col-sm-2 control-label">职位</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="forsocialcareer" ></div>
          </div>
          <div class="form-group">
            <label for="in-job-discribe" class="col-sm-2 control-label">职位描述</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="forsocialcareerinfo"></textarea>

            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="functioneditbasicsocial()">保存</button>
     </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->
<script type="text/javascript">
   function functioneditbasicsocial()
   {

                    var   forsocialstarttime           =document.getElementById("forsocialstarttime");
                    var   forsocialendtime         =document.getElementById("forsocialendtime");
                    var   forsocialcareer         =document.getElementById("forsocialcareer");
                    var   forsocialcareerinfo           =document.getElementById("forsocialcareerinfo");
                 
                    
                    var socialstarttime   =document.getElementById("socialstarttime");
                    var socialendtime =document.getElementById("socialendtime");
                    var socialcareer    =document.getElementById("socialcareer");
                    var socialcareerinfo  =document.getElementById("socialcareerinfo");
  
                    socialstarttime.innerHTML =   forsocialstarttime.value;
                    socialendtime.innerHTML =  forsocialendtime.value;  
                    socialcareer.innerHTML =    forsocialcareer.value;    
                    socialcareerinfo.innerHTML =  forsocialcareerinfo.value;    
                    return false;
   }
    </script>


