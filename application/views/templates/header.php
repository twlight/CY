<?php 
	$this->load->helper('url');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="bbking">
    <link rel="shortcut icon" href="<?=base_url("/static/img/favicon.ico")?>">

    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url("/static/css/bootstrap.min.css")?>" rel="stylesheet">
    <link href="<?=base_url("/static/css/iter.css")?>" rel="stylesheet" type="text/css" >
    <!--<link href="<?=base_url("/static/css/bootstrap-datetimepicker.min.css")?>" rel="stylesheet" type="text/css" > -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<script src="<?=base_url("/static/js/jquery.min.js")?>" ></script>
	<script src="<?=base_url("/static/js/bootstrap.min.js")?>" ></script>
  </head>
</head>
<body>
	<div>
	<?php if(isset($iter)): ?>
	<a href="<?=base_url("/iter")?>"> 
	<?php endif; ?>
	<?php if(isset($company)): ?>
	<a href="<?=base_url("/company")?>"> 
	<?php endif; ?>
			<img src="<?=base_url("/static/img/top_logo.gif")?>" id="logo">
	</a>
	</div>
	<div>
	<?php if(!(isset($noNavbar) && $noNavbar==TRUE)): ?>
	<nav class="navbar navbar-default" role="navigation">
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    
		    <a class="navbar-brand" href="#">ITer</a>
		  </div>
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav">
		      <?php if(isset($company)): ?>
			      <li><a href="#"><span class="glyphicon glyphicon glyphicon glyphicon-tag"></span> 职位信息</a></li>
			      <li><a href="/iter/company/pushCareer"><span class="glyphicon glyphicon glyphicon glyphicon-tags"></span> 发布职位</a></li>
			      <li><a href="#"><span class="glyphicon glyphicon glyphicon glyphicon-search"></span> 应聘简历</a></li>
			      <li><a href="/iter/iter"><span class="glyphicon glyphicon glyphicon glyphicon-search"></span> NormalUser</a></li>
		      <?php endif;?>
		      <?php if(isset($normaluser)): ?>
			      <li><a href="#"><span class="glyphicon glyphicon glyphicon glyphicon-tag"></span> 工作机会</a></li>
			      <li><a href="#"><span class="glyphicon glyphicon glyphicon glyphicon-tags"></span> 实习信息</a></li>
			      <li><a href="#"><span class="glyphicon glyphicon glyphicon glyphicon-search"></span> 职位搜索</a></li>
			      <li><a href="#"><span class="glyphicon glyphicon glyphicon glyphicon-user"></span> 个人中心</a></li>			      
			      <li><a href="/iter/company"><span class="glyphicon glyphicon glyphicon glyphicon-search"></span> Company</a></li>
		      <?php endif;?>
		     	 <li><a href="#"><span class="glyphicon glyphicon glyphicon glyphicon-phone-alt"></span> 关于我们</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		        <?php if((isset($normaluser) && $normaluser==TRUE)): 
					$iter = ($this->session->userdata('iter'));
					echo $iter['name']; 
				?>
				<b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?=base_url("/iter/mysetting")?>">设置</a></li>
		          <li class="divider"></li>
		          <li><a href="<?=base_url("/iter/logout")?>">退出</a></li>
		        </ul>
		        <?php endif;?>
		        <?php if((isset($company) && $company==TRUE)): 
					$company = ($this->session->userdata('company'));
					echo $company['name']; 
				?>
				<b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?=base_url("/company/mysetting")?>">Setting</a></li>
		          <li class="divider"></li>
		          <li><a href="<?=base_url("/company/logout")?>">Logout</a></li>
		        </ul>
		        <?php endif;?>

		        <?php if((isset($normaluser) && $normaluser==false)): 
		        	echo "未登录";
		        ?>	
		        <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?=base_url("/iter/login")?>">登录</a></li>
		          <li class="divider"></li>
		          <li><a href="<?=base_url("/iter/regist")?>">注册</a></li>
		        </ul>
		        <?php endif;?>
		        <?php if((isset($company) && $company==false)): 
		        	echo "未登录";
		        ?>	
		        <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="<?=base_url("/company/login")?>">Login</a></li>
		          <li class="divider"></li>
		          <li><a href="<?=base_url("/company/regist")?>">Regist</a></li>
		        </ul>
		        <?php endif;?>

		      </li>
		    </ul>
		  </div><!-- /.navbar-collapse -->
	</nav>
	<?php endif;?>
