<?php
				
					$CurrentResumeID= -1;
					//先假设现在最近的一个简历ID是-1，在循环中控制，得到最近使用的简历,这里有作用域的问题，在下面的页面中获取不到...,用data吧.
                    if($resumeid_list !="false")
					{
						foreach($resumeid_list as $row)
						{								
							$CurrentResumeID = $row['ResumeID'];
						}
					}	
				?>
  <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>语言能力：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#language-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        增加
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover" id="test" name="test">
                        <thead>
                          <th class="text-muted" id = "categorytitle">语言类别</th>
                          <th class="text-muted" id = "ranktitle">等级</th>
                          <th class="text-muted" id = "scoretitle">分数</th>
						
                        </thead>
                          <tbody>
                          <tr>						 
						 <td id = "category" name = "category">
						  </td>	
                          <td id ="rank" name ="rank">                      
                          </td>
                          <td id ="score" name ="score">                          
                          </td>
						 
						  
                          </tr>
                          </tbody>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>

<!-- /.modal -->
<div class="modal fade" id="language-edit" tabindex="-1" role="dialog" aria-labelledby="language-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >语言能力</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
		  <form class="form-horizontal" role="form"  nam= "langform" id = "langform" method="post">
          <div class="form-group">
            <label for="language-type" class="col-sm-2 control-label">语言类别</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forcategorys" name="forcategorys"></div>
          </div>
          <div class="form-group">
            <label for="lan-level" class="col-sm-2 control-label">等级</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forranks" name="forranks" ></div>
          </div>
          <div class="form-group">
            <label for="point" class="col-sm-2 control-label">分数</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forscores" name="forscores" ></div>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="functioneditlang()">保存</button>
      </div>
	   </form>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
          
            function functioneditlang(){
              var forcategory           =document.getElementById("forcategorys");
              var forrank           =document.getElementById("forranks");
              var forscore           =document.getElementById("forscores");

              var category           =document.getElementById("category");
              var rank           =document.getElementById("rank");
              var score           =document.getElementById("score");

              category.innerHTML = forcategory.value;
              rank.innerHTML = forrank.value;
              score.innerHTML = forscore.value;
			  <!--因为之前没有加http!!!!!这你敢信，js真心坑-->
			  document.all("langform").setAttribute("action","<?=base_url('resume/addlang')?>/<?php echo $CurrentResumeID;?>/<?php echo $userid;?>");
			  document.all("langform").submit();
              return false;
            }
          </script>