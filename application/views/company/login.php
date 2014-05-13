<?php   if($error):	?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		<strong>Warning: </strong>邮箱或密码错误！
  	</div>
<?php endif; ?>

<form class="form-signin" method="post" >
  <h2 class="form-signin-heading" >登录</h2>
  <input type="text" class="form-control" name="email" style="width:300px" placeholder="请使用注册的邮箱" required autofocus>
  <input type="password" class="form-control" style="width:300px"name="password" placeholder="密码" required>
  <input type="hidden" name="submitted" value="true">
  <label class="checkbox">
    <input type="checkbox" name="remember" value="true"> Remember me
  </label>
  <button class="btn btn-lg btn-primary btn-block" style="width:300px" type="submit">Sign in</button>
</form>