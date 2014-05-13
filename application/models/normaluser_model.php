<?php
class Normaluser_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

    function addnormaluser()
    {
 		$data = array(
		'username' => $this->input->post('username'),
		'loan_amount' => $this->input->post('loan_amount'),
		'loan_period' => $this->input->post('loan_period'),
		'tel' => $this->input->post('tel'),
		'houseloan' => $this->input->post('houseloan'),
		'carloan' => $this->input->post('carloan'),
		'creditloan' => $this->input->post('creditloan'),
		'salary' => $this->input->post('salary'),
		);
		return $this->db->insert('normaluser', $data);
    }
	public function updateuserinfo($userid)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'houseloan' => $this->input->post('houseloan'),
			'carloan' => $this->input->post('carloan'),
			'creditloan' => $this->input->post('creditloan'),
			'salary' => $this->input->post('salary'),
            );
		echo $userid;
		print_r($data);
		return $this->db->update('normaluser', $data, array('userid' => $userid));
	}
	public function getlastnormaluserid($tel)
	{
		$this->db->select_max('userid');
		$query= $this->db->get_where('normaluser',array('tel'=>$tel))->result_array();
		return $query;
	}
    public function get_normaluser($num,$offset)
    {
		$this->db->select('username,loan_amount,posttime,loan_period');
    	$this->db->order_by("userid",'desc');
	    $query = $this->db->get('normaluser', $num, $offset);        
	    return $query;
  	}
    
	function getnormaluser($slug="-1")
    {
		if($slug == "-1" )
		{
			$this->db->limit(6,0);
			$query = $this->db->get('normaluser');
			 return $query->result_array();
		}
		else if($slug == "total" )
		{
			$query = $this->db->get('normaluser');
			 return $query->result_array();
		}
		else
		{	
		   $query = $this->db->get_where('normaluser', array('userid' => $slug));
			return $query->row_array();
		}
    }
}
/* End of file cookie_model.php */