<?php
if(!defined('BASEPATH')) exit('NO ACCESS');
class Welcome_model extends CI_Model
{
	public function do_register($table,$record)
	{
		$this->db->insert($table,$record);
	}
	
	public function show_user()	
	{		
	$ans=$this->db->get('epf_login');		
	$fans = $ans->result();		
	$this->db->select('	log_uid,log_username,log_logid,log_email,log_contact,log_utype,log_status');		
	$this->db->from('epf_login');		
	$query = $this->db->get();		
	return $query->result();	
	}
	
	public function delete_record($delete_id,$field,$table)
	{
		//print_r($user_id);
		$this->db->where($field,$delete_id);
		$this->db->delete($table); 
		
	}
	public function get_user_data($id)
	{
		$ans=$this->db->select("user_id,user_name,user_contact,user_logid,user_typeid,user_status,user_loc,user_email,user_desi,user_dept")->get_where("ep_register",array('user_id'=>$id))->result();
		return $ans;
	}
	public function update_user($edit_data)
	{
		$uid=$edit_data['user_id'];
		$this->db->where('user_id',$uid);
		$this->db->update('ep_register',$edit_data);
		//$this->db->where('log_uid',)
	}
	public function update_record($id,$table,$edit_data,$field)
	{
		//$uid=$edit_data['log_uid'];
		$this->db->where($field,$id);
		$this->db->update($table,$edit_data);
		//$this->db->where('log_uid',)
	}
	public function do_login($data)	
	{		
		$pass = sha1($data['log_pass']);		
		$apss1 = $data['log_pass'];	
		
		array_pop($data);		
		$this->db->select("log_pass");		
		$this->db->where('log_status','1'); 		
		$record = $this->db->get_where("epf_login",$data);		
		if($record->num_rows==1)		
		{			
			$ans = $record->result();			
			//print_r($ans[0]->user_cred."--".$pass);			
			if($ans[0]->log_pass==$pass)			
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
		
		$uid = $edit_data['user_id'];
		
		$this->db->where('user_id',$uid);
		$this->db->update('ep_register',$edit_data);
		//$this->db->where('log_uid',)
	}
	function get_data_for_session($user)	
	{		
			$this->db->select("log_uid,log_logid,log_username,log_utype,log_status,log_email");		
			$this->db->where("log_logid",$user);		
			$record = $this->db->get("epf_login");		
			return  $record->result_array();			}

	public function add_user_role($combinedarray)
	{
		//echo"<pre>";	
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
				
				/*if($count==0)
				{	
					
				}
				else
				{
					echo"<pre>";
					print_r($record);
					//$this->db->insert("dv_role",$record);

					
					$this->db->where('role_modid',$uid);		
					$this->db->update('dv_role',$record);
					

				}*/
			}
		}
		

	}
	public function check_emails($email)
	{
			$ans=$this->db->select("*")->get_where("epf_login",array('log_email'=>$email))->result();
			return $ans;
	}
	public function update_password_user($arr,$id)
	{
			$this->db->where('log_uid',$id);
			$this->db->update('epf_login',$arr);
			return 1;
	}
	public function get_processid($id)
	{
		
		$ans=$this->db->select("pro_id,pro_name")->get_where("bs_procedure",$id)->result();
		return $ans;
	}
	public function get_group_list()
	{
		$ans=$this->db->get('bs_group');
		$fans = $ans->result();
		return $fans;
	}
	public function get_single_group($id)
	{
		$ans=$this->db->select("group_id,group_name,group_status,group_time")->get_where("bs_group",array('group_id'=>$id))->result();
		return $ans;
	}
	public function get_subgroup_list()
	{
		$this->db->select('subgroup_id,sub_groupname,group_name,subgroup_status');
		$this->db->from('bs_subgroup');
		$this->db->join('bs_group','group_id= subgroup_groupid');
		
		$query = $this->db->get();
		$fans = $query->result();
		return $fans;
	}
	public function get_single_subgroup($id)
	{
		$ans=$this->db->select("group_name,sub_groupname,sub_catid,subgroup_status")->get_where("bs_subgroup",array('sub_cat'=>$id))->result();
		return $ans;
	}
	public function get_inward_list()
	{
		$this->db->join('bs_drags','drags_id=invt_product');
		$ans=$this->db->get('bs_inventory');
		$fans = $ans->result();
		return $fans;
	}
	public function get_single_inwards($id)
	{
		# code...
		$this->db->join('bs_drags','drags_id=invt_product');
		$this->db->where('invt_id',$id);
		$ans=$this->db->get('bs_inventory');
		$fans = $ans->result();
		return $fans;
	}
	
	public function get_single_outwards($id)
	{
		# code...
		$this->db->join('bs_drags','drags_id=out_product');
		$this->db->where('invt_id',$id);
		$ans=$this->db->get('bs_outwards');
		$fans = $ans->result();
		return $fans;
	}
}
?>