<?php
	class Preview extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('resume_model');	
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->library('form_validation');
		}
		function index()
		{
			$data = array();
			$data['title'] = "预览我的简历";
			$iter = ($this->session->userdata('iter'));
			$UserName = $iter['name'];
			$data['resume_items'] = $this->resume_model->getResume($UserName);
			//$data['title'] = 'Iter';
			$data['normaluser'] = TRUE;
			$this->load->view('templates/header',$data);
			$this->load->view('preview/preview',$data);
			$this->load->view('templates/footer',$data);
		}
		//首先得到有几份简历
		//之后点进去其中一个简历，进行操作
		public function json($username=false,$resumeid = "false")
		{
			if($resumeid == "false")
			{
				$data = array();
				$iter = ($this->session->userdata('iter'));
				$UserName = $iter['name'];
				$result = $this->resume_model->getJsonResume($username);
				echo $result;
			}
			else
			{
				$data = array();
				$iter = ($this->session->userdata('iter'));
				$UserName = $iter['name'];
				$result = $this->resume_model->getJsonResume($UserName,$resumeid);
				echo $result;
			}
		}
		/*
			增加了绿色通道获取Json解析这一项，接口说明在群共享里面.同时要在route.php里面配置一下
		*/
		public function lvse($resumeid)
		{
			if($resumeid)
			{
				$result = $this->resume_model->getJsonlvseResume($resumeid);
				echo $result;
			}
			else
			{
				
			}
		}
		public function getpreview($resumeid)
		{
			if($resumeid)
			{
				echo $resumeid;
				$data['resume_items'] = $this->resume_model->getResumeById($resumeid);
				
				$this->load->model('lang_model');
				$data['lang_items_array'] = $this->lang_model->getLangById($resumeid);
				//上面两个是preview得到的内容！
				$data['normaluser'] = 1;
				$this->load->view('templates/header',$data);
				$this->load->view('preview/index',$data);
				$this->load->view('templates/footer',$data);
			}
			else
			{
			    echo "请先登陆！或者给我个resumeid";
			}
		}
	}
?>
