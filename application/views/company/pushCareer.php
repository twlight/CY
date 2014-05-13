<form class="form-signin" method="post" >
  <h2 class="form-signin-heading" >发布职位</h2>
  <input type="text" class="form-control" name="CareerName" style="width:300px" placeholder="职位名称" required autofocus>
  <input type="text" class="form-control" name="StartTime"style="width:300px" placeholder="开始时间" required>
  <input type="text" class="form-control" name="EndTime" style="width:300px" placeholder="截至时间" required autofocus>
  <input type="text" class="form-control" name="WorkPlace" style="width:300px" placeholder="工作城市" required>
  <textarea class="form-control" name="CareerDescription"  rows ='5' style="width:300px" placeholder="职位描述" ></textarea>
  <textarea class="form-control" name="CareerRequire" rows ='5' style="width:300px" placeholder="职位要求" required></textarea>
  <textarea class="form-control" name="Other" rows ='5' style="width:300px" placeholder="其他" ></textarea>
  <input type="hidden" name="submitted" value="true">
  <button class="btn btn-lg btn-primary btn-block" style="width:300px" type="submit">发布</button>
</form>