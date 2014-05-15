<?php

class Loandetail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('normaluser_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	public function index($detail = false)
	{
		if($detail == false)
		{
			$data['title'] = "填写贷款信息";
			$this->load->view('templates/header', $data);
			$this->load->view('loandetail/index.php', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			
			$data['title'] = "补充贷款信息";
			
			$this->load->view('templates/header', $data);
			$this->load->view('loandetail/index2.php', $data);
			$this->load->view('templates/footer', $data);
		}
	}
	public function updateuserinfo($userid)
	{
		$result = $this->normaluser_model->updateuserinfo($userid);
		if($result)
			$this->success();
		else
		{
			$data['title'] = "个人信息";
			$this->load->view('templates/header',$data);
			$this->load->view('loandetail/index',$data);
			$this->load->view('templates/footer',$data);
		}

	}
	public function post()
	{
		$this->form_validation->set_rules('carloan', '车贷', 'required');
		$this->form_validation->set_rules('houseloan', '房贷', 'required');
		$this->form_validation->set_rules('creditloan', '信贷', 'required');
		$this->form_validation->set_rules('salary', '薪水', 'required');
	    $data = array();
		
		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = "个人信息";
			$this->load->view('templates/header', $data);
			$this->load->view('loandetail/index.php', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{	
			$result = $this->normaluser_model->addnormaluser();
			if($result)
				$this->success();
			else
			{
				$data['title'] = "个人信息";
				$this->load->view('templates/header',$data);
				$this->load->view('loandetail/index',$data);
				$this->load->view('templates/footer',$data);
			}
		}
	}
	public function success()
	{
		$data['title'] = "申请成功";
		$this->load->view('templates/header',$data);
		$this->load->view('loandetail/success');
		$this->load->view('templates/footer',$data);
	}
}
