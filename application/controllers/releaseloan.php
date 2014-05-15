<?php
class Releaseloan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// 多个控制器，访问一个model, hotloan 也要访问这个!
		$this->load->model('hotloan_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = '首页';
		$this->load->view('templates/header', $data);
		$this->load->view('releaseloan/release', $data);
		$this->load->view('templates/footer');
	}
	public function post()
	{	
		$this->form_validation->set_rules('bankname', '银行名称', 'required');
		$this->form_validation->set_rules('interest_rate', '利率', 'required');
		$this->form_validation->set_rules('loan_range', '贷款范围', 'required');
		$this->form_validation->set_rules('extra_fee', '其他费用', 'required');
		$this->form_validation->set_rules('loan_period', '贷款期限', 'required');
		$this->form_validation->set_rules('way_of_repayment', '还款方式', 'required');
		$this->form_validation->set_rules('loan_time', '放贷时间', 'required');
		$this->form_validation->set_rules('brief_intro_of_loan', '贷款产品简介', 'required');
		$this->form_validation->set_rules('requirement_of_loan', '申请条件', 'required');
		$this->form_validation->set_rules('needed_material_of_loan', '申请所需材料', 'required');
		$this->form_validation->set_rules('etc', '其他', 'required');
		$this->form_validation->set_rules('loanspecial', '产品特色', 'required');
		
	    $data = array();
		
		if ($this->form_validation->run() == FALSE)
		{
		$data['title'] = "个人信息";
		$this->load->view('templates/header', $data);
		$this->load->view('releaseloan/release', $data);
		$this->load->view('templates/footer', $data);
		}
		else
		{	
			$result = $this->hotloan_model->add_loan();
			if($result)
			{
				 $this->load->view('templates/header',$data);
				 $this->load->view('releaseloan/success');
				 $this->load->view('templates/footer',$data);
			}
			else
			{
			$data['title'] = "个人信息";
		    $this->load->view('templates/header',$data);
			$this->load->view('releaseloan/release',$data);
		    $this->load->view('templates/footer',$data);
			}
		}
	}
}