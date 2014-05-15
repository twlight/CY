<?php
//for loan offered in the bank, enable add,delete,edit,select function
class Mainpage_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	//有两个控制器,mainpage_model需要管理hotloan, 同时可以查看，hotloan同样可以查看...
	public function get_loan($loanid = '-1')
	{
		if ($loanid == '-1')
		{
			$this->db->limit(6,0);
			$this->db->select('bankid,loanid, loanspecial');
			$query = $this->db->get('hotloandetail');
			return $query->result_array();
		}
		$query = $this->db->get_where('hotloandetail', array('loanid' => $loanid));
		return $query->row_array();
	}
}