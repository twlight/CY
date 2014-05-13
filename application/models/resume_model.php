<?php
	class Resume_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
//		   $this->load->database();
		   $this->load->library('Services_JSON');
		}
		public function getUserID($username)
		{	
			if($username)
			{
				$query = $this->db->query("SELECT UserID FROM normaluser where UserName = \"$username\"");
				foreach ($query->result_array() as $row)
				{
				//返回的userid是唯一的，在这里return
				    $temp = $row['UserID'];
				    return $temp;
				}
			}
			else
			{
				return false;
			}
		
		}
		public function hasbasicinfo($userid)
		{	
		/*增加的标签来确定是否已经完善了基础部分*/
			if($userid)
			{
				$query = $this->db->query("SELECT hasfullbasic FROM normaluser where UserID = \"$userid\"");
			
				return $query->row()->hasfullbasic;
			}	
			else
			{
			    return false;
			}
		
		}
		
		public function getbasicinfo($userid)
		{	
		/*增加的标签来确定是否已经完善了基础部分*/
			if($userid)
			{
				$query = $this->db->query("SELECT * FROM normaluser where UserID = \"$userid\"");
				return $query->row_array();
			}	
			else
			{
			    return false;
			}
		
		}
		public function getbasicresume($resumeid)
		{	
		/*增加的标签来确定是否已经完善了基础部分*/
			if($resumeid)
			{
				$query = $this->db->query("SELECT * FROM resumedetail where ResumeID = \"$resumeid\"");
				//print_r($query->row_array());
				return $query->row_array();
			}	
			else
			{
			    return false;
			}
		
		}
		public function setResume($userid)
		{
			
			 if($userid)
			{
				$data['basicinfo'] = $this->getbasicinfo($userid);
				//print_r($data['basicinfo']);
				$datas = array(
					'UserID' => $userid,
					'Tel' => $data['basicinfo']['Tel'],
					'Gender' => $data['basicinfo']['gender'],
					'Birth_of_Date' => $data['basicinfo']['birthofdate'],				
					'PoliticyState' => $data['basicinfo']['politicystate'],
					'Email' => $data['basicinfo']['Email'],
					'Address' => $data['basicinfo']['address'],
					'eduin' => $data['basicinfo']['eduin'],
					'eduout' => $data['basicinfo']['eduout'],
					'School' => $data['basicinfo']['school'],				
					'Major' => $data['basicinfo']['major'],
					'eduxueli' => $data['basicinfo']['eduxueli'],
					);
				
				//print_r($datas);
				return $this->db->insert('resumedetail', $datas);
			}
			 else 
			 {
				return false;
			 }
		}
		public function updateResume()
		{
				 $UserName = $this->input->post('UserName');
				 $UserId = $this->getUserID($UserName);
				 $ResumeID = $this->input->post('ResumeID');
				 $where = "ResumeID = \"$ResumeID\"";
				 if($UserId)
				 {
					 $data = array(
					'WorkType'  => $this->input->post('WorkType'),
					'School'  => $this->input->post('School'),
					'Major'  => $this->input->post('Major'),
					'UserID' => $UserId,
					'Tel' => $this->input->post('Tel'),
					'Education' => $this->input->post('Education'),
					'Gender' => $this->input->post('Gender'),
					'Birth_of_Date' => $this->input->post('Birth_of_Date'),
					'Identity' => $this->input->post('Identity'),
					'PoliticyState' => $this->input->post('PoliticyState'),
					'Email' => $this->input->post('Email'),
					'Address' => $this->input->post('Address'),
					'Blog' => $this->input->post('Blog'),
					'EmergencyContacter' => $this->input->post('EmergencyContacter'),
					'EmergencyTel' => $this->input->post('EmergencyTel')
				 );
					return $this->db->update('resumedetail', $data,$where);
				 }
				 else return "FALSE";
		}
		public function getResume($UserName)
		{
			if($UserName)
			{	
			  $UserID = $this->getUserID($UserName);	  
			  $query = $this->db->get_where('resumedetail', array('UserID' => $UserID));
			  
			  $ResumeArray = $query->result_array();
			 //$result =  $this->services_json->encode($ResumeArray);
			  //echo $result;
			  return $ResumeArray;
			}
			else
			{
				return false;
			}
		}
		public function getResumeById($resumeid)
		{
			if($resumeid)
			{		  
			  $query = $this->db->get_where('resumedetail', array('ResumeID' => $resumeid));			  
			  //这里不要以数组的形式返回啊！！！但是[0]就可以了
			  return $query->result_array();
			}
			else
			{
				return false;
			}
		}
			
		public function getresumeid($userid)
		{
			if($userid)
			{	
				$this -> db -> where('UserID', $userid);
				$this -> db -> select('ResumeID');
				$query = $this -> db -> get('resumedetail');
				
				return $query -> result_array();
			}
			else
			{
				return false;
			}
		}
		public function getLastResumeID($userid)
		{
			if($userid)
			{	
				$this -> db -> where('UserID', $userid);
				$this -> db -> select_max('ResumeID');
				$query = $this -> db -> get('resumedetail');
				
				return $query -> result_array();
			}
			else
			{
				return false;
			}
		}
		/*
		获取简历Json解析
		*/
		public function getJsonResume($UserName,$resumeid="false")
		{
			if($UserName)
			{
				if($resumeid != "false")
				{
				  $UserID = $this->getUserID($UserName);	  
				  $query = $this->db->get_where('resumedetail', array('UserID' => $UserID,'ResumeID' => $resumeid));
				  $ResumeArray = $query->result_array();
				  $result =  $this->services_json->encode($ResumeArray);
				  return  $result;
				}
				else
				{
				  $UserID = $this->getUserID($UserName);	  
				  $query = $this->db->get_where('resumedetail', array('UserID' => $UserID));
				  $ResumeArray = $query->result_array();
				  $result =  $this->services_json->encode($ResumeArray);
				  return  $result;
				}
			}
			else
			{
				return false;
			}
		}
		/*
		修改的地方在这里，增加了获取简历Json解析。
		*/
		public function getJsonlvseResume($resumeid=false)
		{
			
				if($resumeid)
				{
				  
				  $query = $this->db->get_where('resumedetail', array('ResumeID' => $resumeid));
				  $ResumeArray = $query->result_array();
				  $result =  $this->services_json->encode($ResumeArray);				 
				  return  $result;
				}
				else
				{
				 	return false;
				}
			
		}
	}
?>

