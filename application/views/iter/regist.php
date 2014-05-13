<?php   if($error):	?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		<strong>Warning: </strong>该用户名已被注册！
  	</div>
<?php endif; ?>
<form class="form-signin" method="post" >
  <h2 class="form-signin-heading" >注册</h2>
  <input type="text" class="form-control" name="name" style="width:300px" placeholder="用户名" required autofocus>
  <input type="password" class="form-control" name="password"style="width:300px" placeholder="密码" required>
  <input type="email" class="form-control" name="email" style="width:300px" placeholder="邮箱" require>
  <input type="text" class="form-control" name="tel" style="width:300px" placeholder="电话" required>
  <input type="hidden" name="submitted" value="true">
  <button class="btn btn-lg btn-primary btn-block" style="width:300px" type="submit">Regist</button>
</form>
