  <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>校园工作：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#schooljob-edit">
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
                         
                          <th class="text-muted" class = "workplace">工作单位</th>
                          <th class="text-muted" class = "career">职位</th>
                          <th class="text-muted" class = "careerinfo">职务描述</th>
                        
                        </thead>
                         <tbody>
                          <tr>
                          <td id = "schoolworkstarttime" name="schoolworkstarttime">
                          
                          </td>
                          <td id ="schoolworkendtime" name ="schoolworkendtime">
                          
                          </td>
                          <td id ="schoolworkplace" name="schoolworkplace">
                          
                          </td>
                           <td id ="schoolworkcareer" name ="schoolworkcareer">
                          
                          </td>
                          <td id ="schoolcareerinfo" name ="schoolcareerinfo">
                          
                          </td>
                          </tr>
                          </tbody>

                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>
<div class="modal fade" id="schooljob-edit" tabindex="-1" role="dialog" aria-labelledby="schooljob-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >校园工作</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="sc-time" class="col-sm-2 control-label">起止时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="foredustarttime" > </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="foreduendtime" >
              </div>
            </div>
          <div class="form-group">
            <label for="organization" class="col-sm-2 control-label">工作单位</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="foreduworkplace"></div>
          </div>
          <div class="form-group">
            <label for="position" class="col-sm-2 control-label">职位</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="foreducareer" ></div>
          </div>
          <div class="form-group">
            <label for="sc-job-discribe" class="col-sm-2 control-label">职位描述</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="foreducareerinfo"></textarea>
            </div>
          </div>
        </form>
         </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="functioneditedu()">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> 
    </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
           
            function functioneditedu(){
             
var edustarttime = document.getElementById("schoolworkstarttime");
var eduendtime = document.getElementById("schoolworkendtime");
var eduworkplace = document.getElementById("schoolworkplace");
var educareer = document.getElementById("schoolworkcareer");
var educareerinfo = document.getElementById("schoolcareerinfo");

var foredustarttime = document.getElementById("foredustarttime");
var foreduendtime = document.getElementById("foreduendtime");
var foreduworkplace = document.getElementById("foreduworkplace");
var foreducareer = document.getElementById("foreducareer");
var foreducareerinfo = document.getElementById("foreducareerinfo");

edustarttime.innerHTML = foredustarttime.value;
eduendtime.innerHTML = foreduendtime.value;
eduworkplace.innerHTML = foreduworkplace.value;
educareer.innerHTML = foreducareer.value;
educareerinfo.innerHTML = foreducareerinfo.value;

              return false;
            }
            </script>