<?php
class Cookie_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    function addCookie($sso,$name,$expire)
    {
    	$data = array(
    		'name'=>$name,
    		'sso'=>$sso,
    		'ip'=>$this->input->ip_address(),
    		'time'=>date("Y-m-d h:i:s"),
		'user_agent'=>$this->input->user_agent(),
    		'expire'=>time()+$expire,
    		);
    	$this->db->insert('cookies', $data); 
    }

    function deleteCookie($name)
    {
    	$this->db->delete('cookies', array('name' => $name)); 
    }

    function getCookie($sso)
    {
    	$query = $this->db->get_where('cookies', array('sso' => $sso));
    	return $query->row_array();
    }

}
/* End of file cookie_model.php */
