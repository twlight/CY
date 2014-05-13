<?php
	class Company extends CI_Controller
	{
	    function __construct()
	    {
	        parent::__construct();
	        $this->load->model('company_model');
	        $this->load->library('session');
			$this->load->helper('url');
	    }

		public function index()
		{
			$data['title'] = 'Company';
			$data['company'] = false;
			$this->load->view('templates/header',$data);
			$this->load->view('company/index',$data);
			$this->load->view('templates/footer',$data);
		}

		public function pushCareer($value='')
		{
			$data['title'] = '发布职位'; 
	        $this->load->helper('form');
	        $company = $this->session->userdata('company');
	        $submitted  = $this->input->post('submitted');
	        if ($submitted)
	        {
	        	if (!isset($id)) {
	        			$data['title'] = '首页';
						$data['company'] = false;
						$data['noNavbar'] = TRUE;
						$this->load->view('templates/header',$data);
						$this->load->view('company/error',$data);
						$this->load->view('templates/footer',$data);
	        	}
	        	else {
		            $CareerName  = $this->input->post('CareerName');
		            $StartTime   = $this->input->post('StartTime');
		            $EndTime   = $this->input->post('EndTime');
		            $CompanyID = $company['id'];
		            $WorkPlace   = $this->input->post('WorkPlace');
		            $CareerDescription =  $this->input->post('CareerDescription');
		            $CareerRequire =  $this->input->post('CareerRequire');
		            $Other =  $this->input->post('Other');
		            $push = $this->company_model->pushCareer($CareerName, $CompanyID, $StartTime,$EndTime,$WorkPlace,$CareerDescription,$CareerRequire,$Other);
		            if ($push)
		            {
		            	/**/
						$data['title'] = '首页';
						$data['company'] = false;
						$data['push'] = TRUE;
						$data['success'] = false;
						$this->load->view('templates/header',$data);
						$this->load->view('company/success',$data);
						$this->load->view('templates/footer',$data);
	            	}
		            else
		            {
		            	$data['title'] = 'Company';
						$data['company'] = false;
						$this->load->view('templates/header',$data);
						$this->load->view('company/pushCareer',$data);
						$this->load->view('templates/footer',$data);
		            }
	        	}
	        }
	        else 
	        {

				$data['title'] = 'Company';
				$data['company'] = false;
				$this->load->view('templates/header',$data);
				$this->load->view('company/pushCareer',$data);
				$this->load->view('templates/footer',$data);
	        }
		}


		public function login($ajax = false)
		{
        //try autologin
/*			$sso = $this->input->cookie('sso');
	        if($sso)
	        {
	            $this->company_model->autoLogin($sso);
	        }

        //find out if they're already logged in, if they are redirect them
	        $isLogged   = $this->company_model->isLogged();
	        if ($isLogged)
	        {
	            $this->session->set_flashdata('success', '您已经登录！');
	            redirect('/iter/index');
	  *///      }
	        $data['title'] = '登录'; 
	        $this->load->helper('form');
	        $submitted  = $this->input->post('submitted');
	        if ($submitted)
	        {
	            $email      = $this->input->post('email');
	            $password   = $this->input->post('password');
	            $remember   = $this->input->post('remember');
	            $login      = $this->company_model->login($email, $password, $remember);
	            if ($login)
	            {
					$data['title'] = '首页';
					$data['company'] = TRUE;
					$this->load->view('templates/header',$data);
					$this->load->view('company/index',$data);
					$this->load->view('templates/footer',$data);
            	}
	            else
	            {

	                $data['noNavbar'] = TRUE;
					$data['title'] = 'login';
					$data['error'] = TRUE;
					$data['company'] = false;
					$this->load->view('templates/header',$data);
					$this->load->view('company/login',$data);
					$this->load->view('templates/footer',$data);
	            }
	        }
	        else {
				$data['noNavbar'] = TRUE;
				$data['title'] = 'login';
				$data['error'] = false;
				$data['company'] = false;
				$this->load->view('templates/header',$data);
				$this->load->view('company/login',$data);
				$this->load->view('templates/footer',$data);
				
			}
		}
		public function logout()
	    {
	        $company = $this->session->userdata('company');
	        $this->company_model->logout($company['name']);
	        redirect('/company');
	    }
	   	public function regist($value='')
	    {
	    	$data['title'] = '注册'; 
	        $this->load->helper('form');
	        $submitted  = $this->input->post('submitted');
	        if ($submitted) {
	        	$name      = $this->input->post('name');
	            $password   = $this->input->post('password');
	            $email  = $this->input->post('email');
	            $mobile  = $this->input->post('mobile');
	            $tel = $this->input->post('tel');
	            $address = $this->input->post('address');
	            $description = $this->input->post('description');
	            $regist  = $this->company_model->regist($name, $password, $email,$mobile,$tel,$address,$description);

	            if($regist)
	            {
	            	$data['noNavbar'] = TRUE;
	            	$data['success'] = TRUE;
			    	$this->load->view('templates/header',$data);
					$this->load->view('company/success',$data);
					$this->load->view('templates/footer',$data);
	            	//redirect("/iter/login");
	            }
	            else
	            {
	            	$data['noNavbar'] = TRUE;
	            	$data['error'] = TRUE;
			    	$this->load->view('templates/header',$data);
					$this->load->view('company/regist',$data);
					$this->load->view('templates/footer',$data);
	            }
	        }
	        else
	        {
		    	$data['noNavbar'] = TRUE;
		    	$data['error'] = false;

		    	$this->load->view('templates/header',$data);
				$this->load->view('company/regist',$data);
				$this->load->view('templates/footer',$data);
			}
	    }
	}
?>
