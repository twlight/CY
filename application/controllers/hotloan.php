<?php
class Hotloan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('hotloan_model');
	}

	public function index()
	{
		$data['hotloan_item'] = $this->hotloan_model->get_loan();
		$data['title'] = '贷款业务';
		$this->load->view('templates/header', $data);
		$this->load->view('hotloan/hotloan', $data);
		//$this->load->view('mainpage/advertiseus', $data);
		$this->load->view('templates/footer');
	}
	public function get_loan($slug='false')
	{
		if($slug!='false')
		{
		$data['loanspecific'] = $this->hotloan_model->get_loan($slug);
		$data['title'] = '贷款业务';
		$this->load->view('templates/header', $data);
		$this->load->view('hotloan/loanspecific', $data);
		$this->load->view('templates/footer');
		}
		else
		{
			$data['hotloan_item'] = $this->hotloan_model->get_loan();
			$data['title'] = '贷款业务';
			$this->load->view('templates/header', $data);
			$this->load->view('hotloan/hotloan', $data);
			$this->load->view('templates/footer');
			
		}
	}
}