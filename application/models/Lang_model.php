<?php
	class Lang_model extends CI_Model 
	{
		public function __construct()
		{
		   parent::__construct();	
		   $this->load->database();
		}
		public function addlang($data)
		{
			return $this->db->insert('langofresume', $data);
		}
		public function getLangById($resumeid)
		{
			$this -> db -> where('resumeid', $resumeid);
			$this -> db -> select('*');
			$query = $this -> db -> get('langofresume');
			return $query -> result_array();
		}
	}
?>

