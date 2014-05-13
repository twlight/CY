    <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>所获奖励：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#award-edit">
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
                          <th class="text-muted" class = "awardstime">获奖时间</th>
                          <th class="text-muted" class = "awardsname">奖励名称</th>
                          <th class="text-muted" class = "Sponsor">颁奖单位</th>
                          <th class="text-muted" class = "awardsinfo">描述</th>

                        </thead>
                        <tbody>
                        <tr>
            <!--从数据库中查询，填入下面的表格中！很简单-->
							<td id="awardstime"  name="awardstime"     ></td>
							<td id="awardsname"  name="awardsname"     ></td>
							<td id="Sponsor"     name="Sponsor"        ></td>
							<td id="awardsinfo"  name="awardsinfo"     ></td>														
						</tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>
<div class="modal fade" id="award-edit" tabindex="-1" role="dialog" aria-labelledby="award-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >所获奖励</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="aw-time" class="col-sm-2 control-label">获奖时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forawardstime" ></div>
          </div>
          <div class="form-group">
            <label for="aw-name" class="col-sm-2 control-label">奖励名称</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="forawardsname"></div>
          </div>
          <div class="form-group">
            <label for="aw-organization" class="col-sm-2 control-label">颁奖单位</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="forSponsor" ></div>
          </div>
          <div class="form-group">
            <label for="aw-discri" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="forawardsinfo"></textarea>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="functioneditbasicaward()">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>









<script type="text/javascript">
   function functioneditbasicaward()
   {

                  
                    var awardstime             =document.getElementById("awardstime");
                    var awardsname           =document.getElementById("awardsname");
                    var Sponsor           =document.getElementById("Sponsor");
                    var awardsinfo             =document.getElementById("awardsinfo");
                       
                    var forawardstime   =document.getElementById("forawardstime");
                    var forawardsname =document.getElementById("forawardsname");
                    var forSponsor    =document.getElementById("forSponsor");
                    var forawardsinfo  =document.getElementById("forawardsinfo");
                   

   
                    awardstime.innerHTML =   forawardstime.value;
                    awardsname.innerHTML =  forawardsname.value;  
                    Sponsor.innerHTML =    forSponsor.value;    
                    awardsinfo.innerHTML =  forawardsinfo.value;    
                  
                    return false;
            }
   </script>