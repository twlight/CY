<?php   if($success):	?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		<strong>Congraduation: </strong>公司注册成功，
  		<a href="/iter/company/login">请点这里返回登录！</a>
  	</div>
<?php endif; ?>

<?php   if($push):	?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		<strong>Congraduation: </strong>职位发布成功，
  		<a href="/iter/company/">请点这里返回查看！</a>
  	</div>
<?php endif; ?>