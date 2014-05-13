<?php
	class Iter extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('iter_model');	
			$this->load->library('session');
			$this->load->helper('url');
		}
		function index()
		{
			$data['title'] = 'Iter';
			$data['normaluser'] = false;
			$this->load->view('templates/header',$data);
			$this->load->view('iter/index',$data);
			$this->load->view('templates/footer',$data);
		}
		
		function login($ajax=false)
		{
			/*
	        $sso = $this->input->cookie('sso');
	        if($sso)
	        {
	            $this->iter_model->autoLogin($sso);
	        }

	        //find out if they're already logged in, if they are redirect them
	        $isLogged  = $this->iter_model->isLogged();
	        if ($isLogged)
	        {
	            $this->session->set_flashdata('success', '您已经登录！');
	            redirect('/iter/iter');
	        }
	        $data['title'] = '登录'; 
	        $this->load->helper('form');
	        $submitted  = $this->input->post('submitted');
	        /*if ($submitted)
	        {*/
	        if($this->input->post())
        	{
	            $name      = $this->input->post('name');
	            $password   = $this->input->post('password');
	            $remember   = $this->input->post('remember');
	            $result      = $this->iter_model->login($name, $password, $remember);
		    if ($result)
	            {
	                //to login via ajax
	                $data['iter'] = array(
	                'name' => $result['UserName'],
	                'id' => $result['UserID'],
	                'logged' => TRUE
	           	     );
	                //if ($remember) 
	            	//{
		                $this->cookie_model->deleteCookie($name);
		                $seed = "ooxx".time().$name;
		                $sso = sha1(md5($seed));
		                $expire = 60*60*24*30;
		                $cookie = array(
		                    'name'=>"sso",
		                    'value'=>$sso,
		                    'expire'=>$expire,
		                    );
		                $this->input->set_cookie($cookie);
		                $this->cookie_model->addCookie($sso,$name,$expire);
	            	//}
		                $this->session->set_userdata($data);
	        
	                if($ajax)
	                {
	                    //echo json_encode(array('result'=>"true")) ;
	                    $data = array(
	                    'status' => "success",
	                    'sso'=>$sso,
	                	);
	                	echo json_encode($data);
	                }
	                else
	                {
	                    //echo json_encode(array('result'=>true)) ;
				$data['title'] = '首页';
				$data['normaluser'] = TRUE;
				$this->load->view('templates/header',$data);
				$this->load->view('iter/index',$data);
				$this->load->view('templates/footer',$data);
			}
	                
	            }
	            else
	            {

	                //to login via ajax
	                if($ajax)
	                {
	                	$data = array(
		                    'status' => "failed",
		                    'error' => "wrong password",
		                );
		                echo json_encode($data);
	                    //echo json_encode(array('result'=>"false")) ;
	                }
	                else
	                {
	                        $data['noNavbar'] = TRUE;
				$data['title'] = '登录';
				$data['error'] = TRUE;
				$this->load->view('templates/header',$data);
				$this->load->view('iter/login',$data);
				$this->load->view('templates/footer',$data);
	                }
	            }
	        }
	        else {
       //                 echo "hhy";
	        	if($ajax)
		        { 
	        	    $data = array(
		                'result' => "false",
		                'error' => "nothing post!",
		            );
		            echo json_encode($data);
            		}
            		else { 
				$data['noNavbar'] = TRUE;
				$data['title'] = '登录';
				$data['error'] = false;
				$data['normaluser'] = false;
				$this->load->view('templates/header',$data);
				$this->load->view('iter/login',$data);
				$this->load->view('templates/footer',$data);
			}
		}
	    }
	    public function logout()
	    {
	        $iter = $this->session->userdata('iter');
	        $this->iter_model->logout($iter['name']);
	        redirect('/iter');
	    }
	    public function regist($ajax=false)
	    {
	    	$data['title'] = '注册'; 
	       /* $this->load->helper('form');
	        $submitted  = $this->input->post('submitted');
	        if ($submitted) {
	        */
		if($this->input->post()){
		    $name   = $this->input->post('name');
	            $password   = $this->input->post('password');
	            $email  = $this->input->post('email');
	            $tel = $this->input->post('tel');
	            $regist  = $this->iter_model->regist($name, $password, $email,$tel);
	            if($regist)
	            {
	            	if ($ajax) {
				
	        	    $data = array(
		                'status' => "success",
		            );
	            		echo json_encode($data) ;
	            	}
	            	else{
		            	$data['noNavbar'] = TRUE;
		            	$data['success'] = TRUE;
				$this->load->view('templates/header',$data);
				$this->load->view('iter/success',$data);
				$this->load->view('templates/footer',$data);
			}
	            	//redirect("/iter/login");
	            }
	            else
	            {
	            	if($ajax) { 
		        	    $data = array(
			                'status' => "false",
			                'error' => "nothing post!",
			            );
			            echo json_encode($data);
            		}
            		else {
		            	$data['noNavbar'] = TRUE;
		            	$data['error'] = TRUE;
				    	$this->load->view('templates/header',$data);
						$this->load->view('iter/regist',$data);
						$this->load->view('templates/footer',$data);
					}
	            }
	        }
	        else
	        {
		    	$data['noNavbar'] = TRUE;
		    	$data['error'] = false;
		    	$this->load->view('templates/header',$data);
				$this->load->view('iter/regist',$data);
				$this->load->view('templates/footer',$data);
			}
	    }
	    public function mysetting($resumeid=false)
		{	
			
	
			$iter = ($this->session->userdata('iter'));
			
			$UserName = $iter['name'];
	
			//$this->load->model('resume_model');

			$data['userid'] = $this->iter_model->getUserID($UserName);
			
			$userid = $data['userid'];
			 
			
			//resume_model里面用的normaluser表来查userid...
		    $hasresume = $this->iter_model->hasbasicinfo($userid);
			
			if($hasresume == 0)
			{
				$data['title'] = '设置我的简历'; 
				$data['resumeid_list'] = "false";
				$data['normaluser'] = true;
				
				$this->load->view('templates/header',$data);
				$this->load->view('mysetting/mysettingview',$data);
				$this->load->view('mysetting/firstmysetting',$data);
				$this->load->view('templates/footer',$data);
			}
			else
			{
				if($resumeid != false)
				{
					$data['normaluser'] = true;
					$this->load->model('resume_model');
					$data['resumeid_list'] = $this->resume_model->getresumeid($userid);
					
					$data['basicinfo'] = $this->resume_model->getbasicresume($resumeid);
					
					$data['title'] = '设置我的简历';
					$this->load->view('templates/header',$data);
					$this->load->view('mysetting/mysettingview',$data);
					
					//包含重命名和删除文件，初步设想是如果没有命名，就把简历ID显示出来.
					$this->load->view('mysetting/mysettingviewbasic',$data);
					//$this->load->view('mysetting/mysettingviewtotal');
					
					$this->load->view('mysetting/mysettingviewlang',$data);
					$this->load->view('mysetting/mysettingviewschoolwork',$data);
					$this->load->view('mysetting/mysettingviewsocial',$data);
					$this->load->view('mysetting/mysettingviewproject',$data);
					$this->load->view('mysetting/mysettingviewawards',$data);
					$this->load->view('mysetting/mysettingviewetc',$data);
					$this->load->view('mysetting/mysettingviewattached',$data);
					
					$this->load->view('templates/footer',$data);
				}
				else
				{
				//写一个点击左侧简历试试！
					$data['normaluser'] = true;
					$this->load->model('resume_model');
					$data['resumeid_list'] = $this->resume_model->getresumeid($userid);
					$data['title'] = "我的简历";
					$this->load->view('templates/header',$data);
					$this->load->view('mysetting/mysettingview',$data);
					$this->load->view('mysetting/clickleft',$data);
					$this->load->view('templates/footer',$data);
				}
				
			}
		}

	  
		public function getResume($UserName)
	    {
	    	$resumeidarray = array();
	    	if($UserName)
	    	{
	    		$this->load->model('resume_model');	
	    		$resumeidarray = $this->resume_model->getResume($UserName);
	    		return $resumeidarray;
	    	}
	    }
	}
?>
