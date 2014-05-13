  <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>其他：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#others-edit">
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
                          <th class="text-muted" class = "title">标题</th>
                          <th class="text-muted" class = "etcinfo">
                            <small>描述</small>
                          </th>
                       
                        </thead>

                         <tbody>
                        <tr>
            <!--从数据库中查询，填入下面的表格中！很简单-->
							<td id="etctitle" name="etctitle"  ></td>
							<td id="etcinfo"  name="etcinfo"   ></td>
                        </tr>
                        </tbody>


                      </table>

                    </div>
                    <div class="col-md-2"></div>
                  </div>

</li>
<div class="modal fade" id="others-edit" tabindex="-1" role="dialog" aria-labelledby="others-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >其他</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="ot-title" class="col-sm-2 control-label">标题</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="foretctitle" ></div>
          </div>
          <div class="form-group">
            <label for="ot-discri" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="foretcinfo"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick = "functioneditbasicetc()">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>


  <script type="text/javascript">
   function functioneditbasicetc()
   {

                  
                    var foretctitle             =document.getElementById("foretctitle");
                    var foretcinfo           =document.getElementById("foretcinfo");
                
                    var etctitle   =document.getElementById("etctitle");
                    var etcinfo =document.getElementById("etcinfo");
                
                    etctitle.innerHTML =   foretctitle.value;
                    etcinfo.innerHTML =  foretcinfo.value;  
 
                    return false;
            }
   </script>