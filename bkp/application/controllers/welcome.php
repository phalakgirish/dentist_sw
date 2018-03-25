<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	function dashboard()
	{
		$this->load->view('master_dashboard');
	}
	public function do_login()
	{	
		$ans=$this->input->post();
		 if(session_id()=="")
        {
          ob_start();
          @session_start();
        }
		
		$data=$this->user_model->do_login($ans);
		
			if($data==1)
			{
				$ans_data = $this->user_model->get_data_for_session($ans['staff_loginid']);
				
				$this->session->set_userdata('staff_loginid',$ans_data[0]['staff_loginid']);
				$this->session->set_userdata('staff_clinic_id',$ans_data[0]['staff_clinic_id']);
				$this->session->set_userdata('staff_status',$ans_data[0]['staff_status']);
				$this->session->set_userdata('staff_id',$ans_data[0]['staff_id']);
				$this->session->set_userdata('staff_name',$ans_data[0]['staff_name']);
				$this->session->set_userdata('staff_type',$ans_data[0]['staff_type']);
				if($ans_data[0]['staff_status']==1)
				{
					echo 1;
					
				}
				else
				{
					echo 3;
				}
				
				
			}
			else
			{
				echo $data;
			}
		
		
	}
	public function do_logout()
	{
		$this->session->sess_destroy();
		
		redirect(base_url());
	}
	
	
	/* Clinic  Start*/
	public function new_clinic()
	{
		$this->load->view('clinic_registration');
	}
	public function clinic_registration()
	{
		$ans=$this->input->post();
		$this->form_validation->set_rules('clinic_name','Clinic Name','trim|required');
		$this->form_validation->set_rules('clinic_con_person','Clinic contact person name','trim|required');
		$this->form_validation->set_rules('clinic_mobile','Clinic contact number','trim|required|numeric|min_length[6]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('clinic_email','Clinic email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('clinic_locid','Clinic Location','trim|required');
		$this->form_validation->set_rules('clinic_status','Clinic Status','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$ans=$this->welcome_model->do_register('bs_clinic',$ans); 
			echo '1';
		}
	}
	public function clinic_list()
	{
		
		$this->load->view('view_clinic');
	}
	public function clinicinside($id)
	{

		//$session_clinic_id=$id;	
		$this->session->set_userdata('staff_clinic_id',$id);
		//$this->load->view('master_dashboard');
		redirect('index.php/welcome/dashboard');
	}
	public function clinic_edit($edit_id)
	{
		$data['edit_id']=$edit_id;
		$this->load->view('edit_clinic',$data);
	}
	public function clinic_edit_action()
	{
		$data=$this->input->post();	
		$id=$data['clinic_id'];
		
		$this->form_validation->set_rules('clinic_name','Clinic Name','trim|required');
		$this->form_validation->set_rules('clinic_con_person','Clinic contact person name','trim|required');
		$this->form_validation->set_rules('clinic_mobile','Clinic contact number','trim|required|numeric|min_length[6]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('clinic_email','Clinic email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('clinic_locid','Clinic Location','trim|required');
		$this->form_validation->set_rules('clinic_status','Clinic Status','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->welcome_model->update_record($id,"bs_clinic",$data,"clinic_id");
			echo '1';
		}
	
	}
	/* Clinic  End  staff start */
	
	public function new_staff()
	{
		$this->load->view('staff_registration');
	}
	public function staff_list()
	{
		
		$this->load->view('view_staff');
	}
	public function staff_registration_action()
	{
		$ans=$this->input->post();
		$this->form_validation->set_rules('staff_name','Staff Name','trim|required');
		$this->form_validation->set_rules('staff_mobile','Staff mobile number','trim|required|numeric|min_length[6]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('staff_email','Staff email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('staff_loginid','Staff Login ID','trim|required');
		$this->form_validation->set_rules('staff_pws','Staff Password','trim|required');
		$this->form_validation->set_rules('staff_status','Staff Status','trim|required');
		$this->form_validation->set_rules('staff_type','Staff Status','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$ans['staff_pws']=sha1($ans['staff_pws']);
			$ans=$this->welcome_model->do_register('bs_staff',$ans); 
			echo '1';
		}
	}
	public function staff_edit($edit_id)
	{
		$data['edit_id']=$edit_id;
		$this->load->view('edit_staff',$data);
	}
	public function staff_edit_action()
	{
		$data=$this->input->post();	
		$id=$data['staff_id'];
		
		$this->form_validation->set_rules('staff_name','Staff Name','trim|required');
		$this->form_validation->set_rules('staff_mobile','Staff contact number','trim|required|numeric|min_length[6]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('staff_email','Staff email','trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('staff_loginid','Staff LoginID','trim|required');
		$this->form_validation->set_rules('staff_clinic_id','Staff Clinic','trim|required');
		$this->form_validation->set_rules('staff_status','Staff Status','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->welcome_model->update_record($id,"bs_staff",$data,"staff_id");
			echo '1';
		}
	
	}
	/*staff end */
	public function staff_time($staff_id)
	{
		$data['doctor_id']=$staff_id;
		$this->load->view('staff_timeform',$data);
	}
	public function staff_time_action()
	{
		
		$data=$this->input->post();
		//print_r($ans);
		$staff_time_staff_id=$data['staff_time_staff_id'];
		$staff_time_day_id=$data['staff_time_day_id'];
		$staff_time_daytime_start=$data['staff_time_daytime_start'];
		$staff_time_daytime_end=$data['staff_time_daytime_end'];
		$staff_time_evening_start=$data['staff_time_evening_start'];
		$staff_time_evening_end=$data['staff_time_evening_end'];
		
		
		$combinedarray = array();
			$len = count($staff_time_day_id);
			for ($i = 0; $i < $len; $i++) {
			$combinedarray[] = array(
									"staff_time_staff_id" => $staff_time_staff_id[$i],
									"staff_time_day_id"=>$staff_time_day_id[$i],
									"staff_time_daytime_start" => $staff_time_daytime_start[$i],
									"staff_time_daytime_end" =>$staff_time_daytime_end[$i], 
									"staff_time_evening_start" => $staff_time_evening_start[$i],
									"staff_time_evening_end" => $staff_time_evening_end[$i], 
									
									);
				}
		//print_r($combinedarray);

		if(is_array($combinedarray))
		{

			foreach($combinedarray as $record)
			{
				//$uid=$record['role_uid'];
				if($record['staff_time_day_id']!=0)
				{
					$ans=$this->welcome_model->do_register('bs_staff_time',$record); 
				}	
			}
			echo '1';

		}
		
		
	}
	
	public function edit_staff_time($staff_id)
	{
		$data['doctor_id']=$staff_id;
		$this->load->view('staff_edit_timeform',$data);
	}
	
	public function staff_time_edit_action()
	{
		
		$data=$this->input->post();
		
		$staff_time_id=$data['staff_time_id'];
		$staff_time_staff_id=$data['staff_time_staff_id'];
		$staff_time_day_id=$data['staff_time_day_id'];
		$staff_time_daytime_start=$data['staff_time_daytime_start'];
		$staff_time_daytime_end=$data['staff_time_daytime_end'];
		$staff_time_evening_start=$data['staff_time_evening_start'];
		$staff_time_evening_end=$data['staff_time_evening_end'];
		
		
		$combinedarray = array();
			$len = count($staff_time_day_id);
			for ($i = 0; $i < $len; $i++) {
			$combinedarray[] = array(
									"staff_time_id" => $staff_time_id[$i],
									"staff_time_staff_id" => $staff_time_staff_id[$i],
									"staff_time_day_id"=>$staff_time_day_id[$i],
									"staff_time_daytime_start" => $staff_time_daytime_start[$i],
									"staff_time_daytime_end" =>$staff_time_daytime_end[$i], 
									"staff_time_evening_start" => $staff_time_evening_start[$i],
									"staff_time_evening_end" => $staff_time_evening_end[$i], 
									
									);
				}
		//print_r($combinedarray);

		if(is_array($combinedarray))
		{	
			foreach($combinedarray as $record)
			{
				//$uid=$record['role_uid'];
				if($record['staff_time_day_id']!=0)
				{	
					$id=$record['staff_time_id'];
					$ans=$this->welcome_model->update_record($id,"bs_staff_time",$record,"staff_time_id");
				}	
			}
			echo '1';
		}
	}
	public function view_staff_time($staff_id)
	{
		$data['doctor_id']=$staff_id;
		$this->load->view('staff_timeview',$data);
	}
	
	/*start Procedure Start*/
	
	public function new_procedure()
	{
		$this->load->view('procedure_registration');
	}
	public function procedure_list()
	{
		
		$this->load->view('view_procedure');
	}
	public function procedure_registration_action()
	{
		$ans=$this->input->post();
		$this->form_validation->set_rules('process_name','Procedure Name','trim|required');
		$this->form_validation->set_rules('process_desc','Procedure Description','trim|xss_clean');
		$this->form_validation->set_rules('process_status','Process Status','trim|required|xss_clean');
		
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			
			$ans=$this->welcome_model->do_register('bs_procedure',$ans); 
			echo '1';
		}
	}
	public function procedure_edit($edit_id)
	{
		$data['edit_id']=$edit_id;
		$this->load->view('edit_procedure',$data);
	}
	public function procedure_edit_action()
	{
		$data=$this->input->post();	
		$id=$data['process_id'];
		
		$this->form_validation->set_rules('process_name','Procedure Name','trim|required');
		$this->form_validation->set_rules('process_desc','Procedure Description','trim|required');
		$this->form_validation->set_rules('process_status','Procedure Status','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->welcome_model->update_record($id,"bs_procedure",$data,"process_id");
			echo '1';
		}
	
	}
	/*procedure end but pending edit drugs start*/
	
	public function new_drugs()
	{
		$this->load->view('drag_registration');
	}
	public function drugs_list()
	{
		
		$this->load->view('view_drags');
	}
	public function drugs_registration_action()
	{
		$ans=$this->input->post();
		$this->form_validation->set_rules('drags_name','Drags Name','trim|required');
		$this->form_validation->set_rules('drags_type','Drags Description','trim|xss_clean');
		$this->form_validation->set_rules('drags_desc','Drags Status','trim|xss_clean');
		
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			
			$ans=$this->welcome_model->do_register('bs_drags',$ans); 
			echo '1';
		}
	}
	public function drags_edit($edit_id)
	{
		$data['edit_id']=$edit_id;
		$this->load->view('edit_drags',$data);
	}
	
	public function drugs_edit_action()
	{
		$data=$this->input->post();	
		$id=$data['drags_id'];
		
		$this->form_validation->set_rules('drags_id','Drugs Name','trim|required');
		$this->form_validation->set_rules('drags_type','Drugs Type','trim|required');
		$this->form_validation->set_rules('drags_desc','Drugs Description','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->welcome_model->update_record($id,"bs_drags",$data,"drags_id");
			echo '1';
		}
	
	}
	/* drugs end medical start*/
	public function new_medical()
	{
		$this->load->view('medical_registration');
	}
	public function medical_list()
	{
		
		$this->load->view('view_medical');
	}
	public function medical_registration_action()
	{
		$ans=$this->input->post();
		$this->form_validation->set_rules('med_name','Suffered From','trim|required');
		$this->form_validation->set_rules('med_desc','Suffered Description','trim|xss_clean');
		$this->form_validation->set_rules('med_status','Suffered Status','trim|xss_clean');
		
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			
			$ans=$this->welcome_model->do_register('bs_medical',$ans); 
			echo '1';
		}
	}
	public function medical_edit($edit_id)
	{
		$data['edit_id']=$edit_id;
		$this->load->view('edit_medical',$data);
	}
	
	public function medical_edit_action()
	{
		$data=$this->input->post();	
		
		
		$id=$data['med_id'];
		
		$this->form_validation->set_rules('med_name','Medical Name','trim|required');
		$this->form_validation->set_rules('med_desc','Medical Description','trim|required');
		$this->form_validation->set_rules('med_status','Medical Status','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->welcome_model->update_record($id,"bs_medical",$data,"med_id");
			echo '1';
		}
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */