<?php   if($error):	?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		<strong>Warning: </strong>该公司名已被注册！
  	</div>
<?php endif; ?>
<form class="form-signin" method="post" >
  <h2 class="form-signin-heading" >注册</h2>
  <input type="text" class="form-control" name="name" style="width:300px" placeholder="公司名" required autofocus>
  <input type="password" class="form-control" name="password"style="width:300px" placeholder="密码" required>
  <input type="email" class="form-control" name="email" style="width:300px" placeholder="邮箱" required autofocus>
  <input type="text" class="form-control" name="mobile" style="width:300px" placeholder="移动电话" required>
  <input type="text" class="form-control" name="tel" style="width:300px" placeholder="固定电话" >
  <input type="text" class="form-control" name="address" style="width:300px" placeholder="公司地址" required>
  <input type="text" class="form-control" name="description" style="width:300px;height：50px;" placeholder="公司简述">
  <input type="hidden" name="submitted" value="true">
  <button class="btn btn-lg btn-primary btn-block" style="width:300px" type="submit">Regist</button>
</form>