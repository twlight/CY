<?php
class Hotloan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
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
	public function delete_loan($flag=false)
	{
		if(!$flag)
		{
			$data['hotloan_item'] = $this->hotloan_model->get_loan();
			$data['title'] = '删除贷款';
			$this->load->view('templates/header', $data);
			$this->load->view('hotloan/deleteloan', $data);
			$this->load->view('templates/footer');
		}
		else
		{
		  //echo $flag;
		  $result= $this->hotloan_model->delete_loan($flag);
		  if($result)
		  {
		    $data['title'] = '删除贷款';
			$this->load->view('templates/header', $data);
			$this->load->view('hotloan/deletesuccess', $data);
			$this->load->view('templates/footer');
		  }
		}
	}
	public function update_loan($flag=false)
	{
	    if(!$flag)
		{
			$data['hotloan_item'] = $this->hotloan_model->get_loan();
			$data['title'] = '更新贷款';
			$this->load->view('templates/header', $data);
			$this->load->view('hotloan/updateloan', $data);
			$this->load->view('templates/footer');
		}
		else
		{
		  //echo $flag;
		 /* $result= $this->hotloan_model->update_loan($flag);
		  if($result)
		  {
		    $data['title'] = '编辑贷款';
			$this->load->view('templates/header', $data);
			$this->load->view('hotloan/updatesuccess', $data);
			$this->load->view('templates/footer');
		  }
		  */
		    $data= array();
		    $data['hotloan_item'] = $this->hotloan_model->get_loan($flag);
		    $data['title'] = '编辑贷款';
			$this->load->view('templates/header', $data);
			$this->load->view('hotloan/updatespecificloan', $data);
			$this->load->view('templates/footer');
		}
	}
	public function post_update_loan()
	{
	   echo "hehe";
	   $result = $this->hotloan_model->update_loan();
	   if($result)
	   {
	     $data['title'] = '编辑贷款成功';
	     $this->load->view('templates/header', $data);
		 $this->load->view('hotloan/updatesuccess', $data);
		 $this->load->view('templates/footer');
	   }
	   else
	   {
		 $data['title'] = '编辑贷款失败';
	     $this->load->view('templates/header', $data);
		 $this->load->view('hotloan/updatefail', $data);
		 $this->load->view('templates/footer');
	   }
	}
}