<?php
//for loan offered in the bank, enable add,delete,edit,select function
class Hotloan_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_loan($loanid = '-1')
	{
		if ($loanid === '-1')
		{
			$query = $this->db->get('hotloandetail');
			return $query->result_array();
		}
		$query = $this->db->get_where('hotloandetail', array('loanid' => $loanid));
		return $query->row_array();
	}
		public function add_loan()
	{
			// find the bankid from the bankname(one to one)
			 $data = array(
				'bankid' => $this->input->post('bankid'),
				'interest_rate' => $this->input->post('interest_rate'),
				'loanspecial' => $this->input->post('loanspecial'),
				'loan_range' => $this->input->post('loan_range'),
				'extra_fee' => $this->input->post('extra_fee'),
				'loan_period' => $this->input->post('loan_period'),
				'way_of_repayment' => $this->input->post('way_of_repayment'),
				'loan_time' => $this->input->post('loan_time'),
				'brief_intro_of_loan' => $this->input->post('brief_intro_of_loan'),
				'requirement_of_loan' => $this->input->post('requirement_of_loan'),
				'needed_material_of_loan' => $this->input->post('needed_material_of_loan'),
				'etc'=> $this->input->post('etc'),
					);
		
			return $this->db->insert('hotloandetail', $data);
	}
}