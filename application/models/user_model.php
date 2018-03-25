<?php
if(!defined('BASEPATH')) exit('NO ACCESS');
class User_model extends CI_Model
{
	public function do_register($table,$record)
	{
		
		$this->db->insert($table,$record);
	}
	
	public function show_user()
	{
		$ans=$this->db->get('dv_login');
		$fans = $ans->result();
		//print_r($ans);
		//print_r('test module');
		//$ans=$this->db->select("log_uid,log_username,log_logid,log_utype,log_status,log_loc")->get_where("dv_login",array('log_uid'=>$id))->result();
		$this->db->select('log_uid,log_username,log_logid,log_utype,log_status,loc_name,desi_name,dept_name');
		$this->db->from('dv_login,dv_location,dv_desi,dv_dept');
		$this->db->where('loc_id = log_loc');
		$this->db->where('desi_id = log_desi');
		$this->db->where('dept_id = log_dept');
		$query = $this->db->get();
		return $query->result();
		
		//return $fans;
		
	}
	
	public function delete_record($user_id)
	{
		//print_r($user_id);
		$this->db->where('log_uid',$user_id);
		$this->db->delete('dv_login'); 
		
	}
	public function get_user_data($id)
	{
		/* $this->db->where('log_uid',$user_id);
		$query = $this->db->get('f_login'); */
		//$this->db->where('log_uid',$id);
		$ans=$this->db->select("staff_id,staff_name,staff_mobile,staff_type")->get_where("bs_staff",array('staff_id'=>$id))->result();
		return $ans;
	}
	public function update_user($edit_data)
	{
		$uid=$edit_data['log_uid'];
		$this->db->where('log_uid',$uid);
		$this->db->update('dv_login',$edit_data);
		//$this->db->where('log_uid',)
	}
	 public function do_login($data)
	{
	
		$pass = sha1($data['staff_pws']);		
		$apss1 = $data['staff_pws'];	
		
		array_pop($data);		
		$this->db->select("staff_pws");		
		$this->db->where('staff_status','1'); 		
		$record = $this->db->get_where("bs_staff",$data);		
		if($record->num_rows==1)		
		{			
			$ans = $record->result();			
			//print_r($ans[0]->user_cred."--".$pass);			
			if($ans[0]->staff_pws==$pass)			
			{				
			return 1;			
			}			
			else			
			{				
			return "Invalid Password ";			
			}		
		}		
		else		
		{			
			return "Invalid Login ID";		
		}	
		
	} 
	
	
	public function update_user_pass($edit_data)
	{
		
		$uid = $edit_data['log_uid'];
		
		$this->db->where('log_uid',$uid);
		$this->db->update('dv_login',$edit_data);
		//$this->db->where('log_uid',)
	}
	function get_data_for_session($user)
	{
		$this->db->select("staff_id,staff_loginid,staff_name,staff_type,staff_status,staff_clinic_id");
		$this->db->where("staff_loginid",$user);
		$record = $this->db->get("bs_staff");
		return  $record->result_array();		
	}

	public function add_user_role($combinedarray)
	{
		echo"<pre>";	
		//print_r($combinedarray[0]['role_uid']);
		$get_uid=$combinedarray[0]['role_uid'];
		//$this->db->select("role_uid")->where("role_uid",$get_uid);
		//$get_record=$this->db->get("dv_role");
		//print_r($get_record->result_array());

		//echo $this->db->count_all_results('dv_role');
		// Produces an integer, like 25

		$this->db->like('role_uid', $get_uid);
		$this->db->from('dv_role');
		$count=$this->db->count_all_results();

		
		if(is_array($combinedarray))
		{

			foreach($combinedarray as $record)
			{
				//$uid=$record['role_uid'];
				
					$this->db->insert("dv_role",$record);
				
			}
		}
		

	}
	
}
?>