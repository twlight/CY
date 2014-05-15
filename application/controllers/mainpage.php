<?php
class Mainpage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Mainpage_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['top10loan_item'] = $this->Mainpage_model->get_loan();
		$this->load->model('normaluser_model');
		$data['successloan_item'] = $this->normaluser_model->getnormaluser();
		$data['title'] = '首页';
		$this->load->view('templates/header', $data);
		$this->load->view('mainpage/maincontent', $data);
		$this->load->view('mainpage/successloan', $data);
		$this->load->view('mainpage/calc', $data);
		$this->load->view('mainpage/hotloantop10', $data);
		$this->load->view('mainpage/advertiseus', $data);
		$this->load->view('templates/footer');
	}

	public function get_user($slug=false)
	{
		//分页显示
			$this->load->library('pagination');

			$config['base_url'] = "http://localhost/index.php/mainpage/get_user/";  

			$config['per_page'] = '2';  
			
			$config['num_links'] = 3; // 当前连接前后显示页码个数
			
			$config['total_rows'] = $this->db->count_all('normaluser');  

			$config['full_tag_open'] = '<p>';  
			$config['full_tag_close'] = '</p>';  
			
			$config['first_link'] = '首页'; // 第一页显示
			$config['last_link'] = '末页'; // 最后一页显示
			$config['next_link'] = '下一页 >'; // 下一页显示
			$config['prev_link'] = '< 上一页'; // 上一页显示
			$config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式
			$config['cur_tag_close'] = '</a>'; // 当前页结束样式
			$this->pagination->initialize($config);

			//load the model and get results
			$this->load->model('normaluser_model');

			$data['results'] = $this->normaluser_model->get_normaluser($config['per_page'],$this->uri->segment(3));
			
			$this->load->library('table');  
			$this->table->set_heading('姓名', '贷款金额', '贷款申请时间','贷款期限');  
			
			$data['post'] = $this->normaluser_model->get_normaluser($config['per_page'],$this->uri->segment(3));
			$data['page'] = array(
					'total' => $config['total_rows'],
					'num' => $config['per_page'],
					'page' => (int) (($config['total_rows'] % $config['per_page'] === 0) ? ($config['total_rows'] / $config['per_page']) : ($config['total_rows'] / $config['per_page'] + 1)),
					'current' => ($slug + 1) . '~' . ($slug + $data['post']->num_rows)
			);
			// load the view  
			$data['title'] = '贷款业务';
			$this->load->view('templates/header', $data);
			$this->load->view('getloaner/moresuccessloan', $data);
			$this->load->view('templates/footer');

	}
	public function getnormaluser($slug='false')
	{
		if($slug!='false')
		{
		$this->load->model('normaluser_model');
		$data['successloan_item'] = $this->normaluser_model->getnormaluser($slug);
		$data['title'] = '贷款业务';
		$this->load->view('templates/header', $data);
		$this->load->view('getloaner/successloan', $data);
		$this->load->view('templates/footer');
		
		}
		else
		{
		/*	
		*/
			
			
			$this->load->model('normaluser_model');
			//$data['successloan_item'] = $this->normaluser_model->getnormaluser("total");
			//得到全部的客户资料，这里要进行分页查询哦。。。
		
			$this->get_user();	
			//$this->load->view('mainpage/successloan', $data);
			
		}
	}
	public function calc($slug="false")
	{
		if($slug!="false")
		{
			$page = "calc/hottol-".$slug;
			$this->load->view($page);
		}
	}
	public function addnormaluser($slug="false")
	{
		if($slug!="false")
		{	
			$this->load->model('normaluser_model');
			$results = $this->normaluser_model->addnormaluser();
			//只根据一个手机号来进行更新...
			
			if($results)
			{
				$data['tel'] = $this->input->post('tel');
				$userid = $this->normaluser_model->getlastnormaluserid($data['tel']);
				$data['userid'] = $userid[0]['userid'];
				
				$data['title'] = "补充贷款信息";
				$this->load->view('templates/header', $data);
				$this->load->view('loandetail/index2.php', $data);
				$this->load->view('templates/footer', $data);
				
			}	
		}
	}
}