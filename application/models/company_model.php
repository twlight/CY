<?php
	class Company_model extends CI_Model 
	{
		var $session_expire= 3600;
		function __construct()
		{
		    parent::__construct();
		    $this->load->model('cookie_model');
		    $this->load->library('session');
		    $this->load->helper('url');
		}
		function getCompanyInfo($name)
    	{
        	$query = $this->db->get_where('companyuser',array('Email'=>$name));
        	return $query->row_array();
    	}
		public function pushCareer($CareerName, $CompanyID,$StartTime,$EndTime,$WorkPlace,$CareerDescription,$CareerRequire,$Other)
		{

	        $data = array(
			    		'CareerName'=>$CareerName,
			    		'CompanyID'=>$CompanyID,
			    		'StartTime'=>$StartTime,
			    		'EndTime'=>$EndTime,
			    		'WorkPlace'=>$WorkPlace,
			    		'CareerDescription'=>$CareerDescription,
			    		'CareerRequire'=>$CareerRequire,
			    		'Other'=>$Other,
			    		);
		    $result = $this->db->insert('career', $data); 
		    if($result)
		    	return TRUE;
		    else
		    	return false;
		}
		function regist($name, $password, $email,$mobile,$tel,$address,$description)
	    {
	    	$this->db->select('*');
	        $this->db->where('CompanyName',$name);
	        $this->db->limit(1);
	        $result = $this->db->get('companyuser');
	        if ($result->num_rows() > 0)
	        {
	            return FALSE;
	        }
	        else
	        {
	        	$data = array(
			    		'CompanyName'=>$name,
			    		'Password'=>md5($password),
			    		'Email'=>$email,
			    		'Mobile'=>$mobile,
			    		'Telphone'=>$tel,
			    		'Address'=>$address,
			    		'CompanyBasicInfo'=>$description,
			    		);
		    	$this->db->insert('companyuser', $data); 
		    	return TRUE;
	        }
	    }
	    function isLogged($redirect = FALSE)
    	{
	        $company = $this->session->userdata('company');
	        if(empty($iter))
	        {
	            if($redirect)
	            {
	                $this->session->set_flashdata('error', '未登录！');
	                redirect('/iter/company/login');
	            }
	            return FALSE;
	        }
	        else if ($company['logged'] == TRUE)
	        {
	            return TRUE;
	        }
	        else
	        {
	            return FALSE;
	        }
	    }
	    function autoLogin($sso)
	    {
	        $info = $this->cookie_model->getCookie($sso);
	        if (!empty($info))
	        {
	            if ($info['expire'] > time())
	            {
	                $result = $this->getCompanyInfo($info['name']);
	               print_r($result);
			 $data = array();
	                $data['company'] = array(
	                'name' => $result['Email'],
	                'id' => $result['CompanyID'],
	                'logged' => TRUE
	                );
	                $this->session->set_userdata($data);
	            }
	            else
	            {
	                $this->cookie_model->deleteCookie($info['name']);
	                delete_cookie("sso");
	            }
	        }
	    }
	    function login($email,$password,$remember=FALSE)
	    {
	        $this->db->select('*');
	        $this->db->where('Email',$email);
	        $this->db->where('Password',md5($password));
	        $this->db->limit(1);
	        $result = $this->db->get('companyuser');

	        if ($result->num_rows() > 0)
	        {
	            $result = $result->row_array();
	            $data = array();
	            $data['company'] = array(
	                'name' => $result['Email'],
	                'id' => $result['CompanyID'],
	                'logged' => TRUE
	            );
	            if ($remember) 
	            {
	                $this->cookie_model->deleteCookie($email);
	                $seed = "ooxx".time().$email;
	                $sso = sha1(md5($seed));
	                $expire = 60*60*24*30;
	                $cookie = array(
	                    'name'=>"sso",
	                    'value'=>$sso,
	                    'expire'=>$expire,
	                    );
	                $this->input->set_cookie($cookie);
	                $this->cookie_model->addCookie($sso,$email,$expire);
	            }
	            $this->session->set_userdata($data);
	            return TRUE;
	        }
	        else
	        {
	            return FALSE;
	        }
	    }
	    function logout($company_id)
	    {
	        $this->cookie_model->deleteCookie($company_id);
	        $this->session->sess_destroy();
	    }
	}
?>
