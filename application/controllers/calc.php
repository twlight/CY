<?php

class Calc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function gettool($page = false)
	{
		if($page)
		{
			$this->load->view("templates/calcheader");
			$this->load->view("calc/hottol-".$page);
			$this->load->view("templates/calcfooter");
		}
	}
}
