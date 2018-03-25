<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('appointments');
	}
	public function appointmment_form()
	{
		$this->load->view('paitent_regisration');
	}
	
	public function appointment_action()
	{
		
		
		$ans=$this->input->post();
			
		$this->form_validation->set_rules('appo_doctor_id','Doctors Name','required|trim|xss_clean');
		$this->form_validation->set_rules('patient_name','Patient Name','required|trim|xss_clean');
		$this->form_validation->set_rules('patient_contact','Patient Contact','trim|numeric|min_numeric[10]|max_numeric[12]');
		$this->form_validation->set_rules('patient_gender','Gender','required|trim|xss_clean');
		$this->form_validation->set_rules('appo_date','Appointment Date','required|trim|xss_clean');
		$this->form_validation->set_rules('appo_time','Appointment Time','trim|required');
		
		
		if($this->form_validation->run()==FALSE)
		{
			
			echo validation_errors();
		}
		else
		{
			
		$staff_clinic_id=$this->session->userdata('staff_clinic_id');

		/*patient registratoin data*/
		$name=$ans['patient_name'];
		$patient_name = str_replace("'","\'", $name);
		$patient_data['patient_name']=$patient_name;
		$patient_data['patient_gender']=$ans['patient_gender'];
		$patient_data['patient_contact']=$ans['patient_contact'];
		$patient_data['patient_staff_id']=$ans['patient_staff_id'];
		$patient_data['patient_clinic_id']=$staff_clinic_id;
		//$ans=$this->welcome_model->do_register('bs_patient',$patient_data); 
		
		/*Patient Appointment data*/
		$date=$ans['appo_date'];
		$doctor_id=$ans['appo_doctor_id'];
		$appointment_time=$ans['appo_time'];
		
		/* Doctors Check Avalibilty*/
		$date_array=explode("/",$date);
		$date=$date_array[2]."-".$date_array[0]."-".$date_array[1];
			 
		 $day = date("l", strtotime($date));
		 $daylist=$this->myclass->select("day_id,day_name","bs_day","day_name='$day'");
		  $dayid=$daylist[0]->day_id;
		  
		 	
		 $day_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_daytime_start <= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
		 
		  
		 if($day_time[0]->checktime ==0)
		 {
			$day_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_daytime_end >= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
		 }
		 
		 if($day_time[0]->checktime ==0)
		 {
		 
			$evening_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_evening_start <= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
			
			 if($evening_time[0]->checktime==0)
			 {
				$evening_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_evening_end <= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
			 }
			 //print_r($day_time[0]->checktime."--".$evening_time[0]->checktime);
		}
		
		
		//select count(*)  FROM  bs_staff_time where  staff_time_daytime_start < '20' AND staff_time_daytime_end >= '20' AND staff_time_day_id='2' AND staff_time_staff_id='1'
		
		
		
		if($day_time[0]->checktime !=0 || $evening_time[0]->checktime !=0)
		{
			$appo_datetime=$date." ".$appointment_time;
			
			$appointment_count=$this->myclass->select("count(appo_id) as today_appointment","bs_appointment","appo_doctor_id='$doctor_id' AND appo_datetime='$appo_datetime'");
			//print_r($appointment_count);
			
			if($appointment_count[0]->today_appointment == 0)
			{
				$ans['appo_date']=$date;
				
				$ans=$this->welcome_model->do_register('bs_patient',$patient_data); 
				$newpatient_id=$this->myclass->select("max(patient_id) as patientid","bs_patient","1");
				
				$patientid=$newpatient_id[0]->patientid;
				$appo_data['appo_patient_id']=$patientid;
				$appo_data['appo_staff_id']=$patient_data['patient_staff_id'];
				$appo_data['appo_doctor_id']=$doctor_id;
				$appo_data['appo_datetime']=$appo_datetime;
				
				//print_r($appo_data);
				$ans=$this->welcome_model->do_register('bs_appointment',$appo_data); 
				//echo '1';

				$mobile=$patient_data['patient_contact'];
				$appdate=date("d-M-y",strtotime($date));
				$message_data="Dear%20 Mr/Mrs %20$patient_name,%20We%20confirm%20your%20appointment%20dated%2$appdate%20$appointment_time.%20Best%20Regards-Dr.Saluja%20Dental%20Care%20 for assistance please call us on 9987523711,022-24445273";	
				//$message_data='Hello';
				$message=str_replace(" ","%20",$message_data);
				//echo "<pre>"
				//print_r($message);
				$ans=$this->send_sms($mobile,$message);
				//print_r($ans);
				echo 1;
			}
			else
			{
				echo "Appointment not avaliable, please select another time.";
			}
			//print_r($appointment_count);
			
		}
		
		else
		{
			
			echo "Invalid Time";
		}
		
		
	}
	}
	
	public function appointment_list()
	{
		$this->load->view('appointments');
	}
	/* Clinic  Start*/
	
	function edit_appointment($edit_id)
	{
		$data['patient_id']=$edit_id;
		$this->load->view('edit_appintments',$data);
	}
	
	function appointment_edit_action()
	{
		$ans=$this->input->post();
		
		$this->form_validation->set_rules('appo_doctor_id','Doctors Name','required|trim|xss_clean');
		$this->form_validation->set_rules('patient_name','Patient Name','required|trim|xss_clean');
		$this->form_validation->set_rules('patient_contact','Patient Contact','trim|numeric|min_numeric[10]|max_numeric[12]|xss_clean');
		$this->form_validation->set_rules('patient_gender','Gender','required|trim|xss_clean');
		$this->form_validation->set_rules('appo_date','Appointment Date','required|trim|xss_clean');
		$this->form_validation->set_rules('appo_time','Appointment Time','trim|required|xss_clean');
		$this->form_validation->set_rules('appo_status','Appointment Status','trim|required|xss_clean');
		
		if($this->form_validation->run()==FALSE)
		{
			
			echo validation_errors();
		}
		else
		{
			
		
		
		/*Patient Appointment data*/
		$date=$ans['appo_date'];
		$doctor_id=$ans['appo_doctor_id'];
		$appointment_time=$ans['appo_time'];
		
		
		if($ans['appo_status']=="2")
		{
				$appo_data['appo_status']=$ans['appo_status'];
				$appo_id=$ans['appo_id'];
				
				//print_r($appo_data);
				//exit;
				//$ans=$this->welcome_model->do_register('bs_appointment',$appo_data); 
				$this->welcome_model->update_record($appo_id,"bs_appointment",$appo_data,"appo_id");
				echo "2";
				//appointment cancel
				$patient_name=$ans['patient_name'];
				$mobile=$ans['patient_contact'];
				$appdate=date("d-M-y",strtotime($date));
				$message_data="Dear%20 Mr/Mrs %20$patient_name,%20 as per your request we%20cancel%20your%20appointment%20dated%20$appdate%20$appointment_time.%20Best%20Regards-Dr.Saluja%20Dental%20Care%20 for assistance please call us on 9987523711,022-24445273";	
				//$message_data='Hello';
				$message=str_replace(" ","%20",$message_data);
				//echo "<pre>"
				//print_r($message);
				$ans=$this->send_sms($mobile,$message);
			exit;	
				
		}
		if($ans['appo_status']=="1")
		{
				$appo_data['appo_status']=$ans['appo_status'];
				$appo_id=$ans['appo_id'];
				
				//print_r($appo_data);
				//exit;
				//$ans=$this->welcome_model->do_register('bs_appointment',$appo_data); 
				$this->welcome_model->update_record($appo_id,"bs_appointment",$appo_data,"appo_id");
				echo "1";
				//appointment confirm


			exit;	
				
		}
		
		/* Doctors Check Avalibilty*/
		$date_array=explode("/",$date);
		$date=$date_array[2]."-".$date_array[0]."-".$date_array[1];
			 
		 $day = date("l", strtotime($date));
		 $daylist=$this->myclass->select("day_id,day_name","bs_day","day_name='$day'");
		  $dayid=$daylist[0]->day_id;
		  
		 	
		 $day_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_daytime_start <= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
		 
		  
		 if($day_time[0]->checktime ==0)
		 {
			$day_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_daytime_end >= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
		 }
		 
		 if($day_time[0]->checktime ==0)
		 {
		 
			$evening_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_evening_start <= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
			
			 if($evening_time[0]->checktime==0)
			 {
				$evening_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_evening_end <= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
			 }
			 //print_r($day_time[0]->checktime."--".$evening_time[0]->checktime);
		}
		
		
		//select count(*)  FROM  bs_staff_time where  staff_time_daytime_start < '20' AND staff_time_daytime_end >= '20' AND staff_time_day_id='2' AND staff_time_staff_id='1'
		
		
		
		if($day_time[0]->checktime !=0 || $evening_time[0]->checktime !=0)
		{
			$appo_datetime=$date." ".$appointment_time;
			
			$appointment_count=$this->myclass->select("count(appo_id) as today_appointment","bs_appointment","appo_doctor_id='$doctor_id' AND appo_datetime='$appo_datetime'");
			//print_r($appointment_count);
			
			if($appointment_count[0]->today_appointment == 0)
			{
				$ans['appo_date']=$date;
				
				$newpatient_id=$this->myclass->select("max(patient_id) as patientid","bs_patient","1");
				
				$patientid=$newpatient_id[0]->patientid;
				$appo_data['appo_patient_id']=$ans['appo_patient_id'];
				$appo_data['appo_staff_id']=$ans['appo_staff_id'];
				$appo_data['appo_doctor_id']=$ans['appo_doctor_id'];
				$appo_data['appo_datetime']=$appo_datetime;
				$appo_data['appo_status']=$ans['appo_status'];
				$appo_id=$ans['appo_id'];
				$this->welcome_model->update_record($appo_id,"bs_appointment",$appo_data,"appo_id");
				echo '1';
				$patient_name=$ans['patient_name'];
				$mobile=$ans['patient_contact'];
				$appdate=date("d-M-y",strtotime($date));
                
				$message_data="Dear%20 $mrms %20$patient_name,%20 as per your request we%20reschedule%20your%20appointment%20dated%20$appdate%20$appointment_time.%20Best%20Regards-Dr.Saluja%20Dental%20Care%20 for assistance please call us on 9987523711,022-24445273";	
				//$message_data='Hello';
				$message=str_replace(" ","%20",$message_data);
				//echo "<pre>"
				//print_r($message);
				$ans=$this->send_sms($mobile,$message);

				//appointment reschudle

			}
			else
			{
				echo "Appointment not avaliable, please select another time.";
			}
			//print_r($appointment_count);
			
		}
		
		else
		{
			
			echo "Invalid Time";
		}
		
		
	}
		
	}
	
	public function view_patient()
	{
		$this->load->view("listofpatient");
	}
	
	function view_patient_list()
	{
		$this->load->view("existing_patient");
	}
	
	function existing_patient_appointment($edit_id)
	{
		$data['patient_id']=$edit_id;
		//print_r($data);
		
		$this->load->view('edit_appo_existing_patient',$data);	
	}
	function existing_patient_appointment_action()
	{
		$ans=$this->input->post();
		$this->form_validation->set_rules('appo_doctor_id','Doctors Name','required|trim|xss_clean');
		$this->form_validation->set_rules('patient_name','Patient Name','required|trim|xss_clean');
		$this->form_validation->set_rules('patient_contact','Patient Contact','trim|numeric|min_numeric[10]|max_numeric[12]|xss_clean');
		$this->form_validation->set_rules('patient_gender','Gender','required|trim|xss_clean');
		$this->form_validation->set_rules('appo_date','Appointment Date','required|trim|xss_clean');
		$this->form_validation->set_rules('appo_time','Appointment Time','trim|required|xss_clean');
		
		
		if($this->form_validation->run()==FALSE)
		{
			
			echo validation_errors();
		}
		else
		{
			
		
		
		/*Patient Appointment data*/
		$date=$ans['appo_date'];
		$doctor_id=$ans['appo_doctor_id'];
		$appointment_time=$ans['appo_time'];
		
		
		
		
		/* Doctors Check Avalibilty*/
		$date_array=explode("/",$date);
		$date=$date_array[2]."-".$date_array[0]."-".$date_array[1];
			 
		 $day = date("l", strtotime($date));
		 $daylist=$this->myclass->select("day_id,day_name","bs_day","day_name='$day'");
		  $dayid=$daylist[0]->day_id;
		  
		 	
		 $day_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_daytime_start <= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
		 
		  
		 if($day_time[0]->checktime ==0)
		 {
			$day_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_daytime_end >= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
		 }
		 
		 if($day_time[0]->checktime ==0)
		 {
		 
			$evening_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_evening_start <= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
			
			 if($evening_time[0]->checktime==0)
			 {
				$evening_time=$this->myclass->select("count(staff_time_id) as checktime","bs_staff_time","staff_time_evening_end <= '$appointment_time' AND staff_time_day_id='$dayid' AND staff_time_staff_id='$doctor_id'");
			 }
			 //print_r($day_time[0]->checktime."--".$evening_time[0]->checktime);
		}
		
		
		//select count(*)  FROM  bs_staff_time where  staff_time_daytime_start < '20' AND staff_time_daytime_end >= '20' AND staff_time_day_id='2' AND staff_time_staff_id='1'
		
		
		
		if($day_time[0]->checktime !=0 || $evening_time[0]->checktime !=0)
		{
			$appo_datetime=$date." ".$appointment_time;
			
			$appointment_count=$this->myclass->select("count(appo_id) as today_appointment","bs_appointment","appo_doctor_id='$doctor_id' AND appo_datetime='$appo_datetime'");
			//print_r($appointment_count);
			
			if($appointment_count[0]->today_appointment == 0)
			{
				$ans['appo_date']=$date;
				
				$newpatient_id=$this->myclass->select("max(patient_id) as patientid","bs_patient","1");
				
				$patientid=$newpatient_id[0]->patientid;
				$appo_data['appo_patient_id']=$ans['appo_patient_id'];
				$appo_data['appo_staff_id']=$ans['appo_staff_id'];
				$appo_data['appo_doctor_id']=$ans['appo_doctor_id'];
				$appo_data['appo_datetime']=$appo_datetime;
				$appo_data['appo_status']="0";
				$appo_id=$appo_data['appo_patient_id'];
				//print_r($appo_data);
				//exit;
				$ans1=$this->welcome_model->do_register('bs_appointment',$appo_data); 
				
				$p_data['patient_contact']=$ans['patient_contact'];
				$patient_id=$ans['appo_patient_id'];
				
				$this->welcome_model->update_record($patient_id,"bs_patient",$p_data,"patient_id");
				echo '1';
				$patient_name=$ans['patient_name'];
				$mobile=$ans['patient_contact'];
				$appdate=date("d-M-y",strtotime($date));
		$message_data="Dear%20 Mr/Mrs %20$patient_name,%20We%20confirm%20your%20appointment%20dated%20.$appdate%20$appointment_time.%20Best%20Regards-Dr.Saluja%20Dental%20Care%20 for assistance please call us on 9987523711,022-24445273";	
		//$message_data='Hello';
		$message=str_replace(" ","%20",$message_data);
		//echo "<pre>"
		//print_r($message);
		$ans=$this->send_sms($mobile,$message);
			}
			else
			{
				echo "Appointment not avaliable, please select another time.";
			}
			//print_r($appointment_count);
			
		}
		
		else
		{
			
			echo "Invalid Time";
		}
		
		
	}
	}
		
	public function patient_personal_info($patient_id)
	{
		$data['patient_id']=$patient_id;
		$this->session->set_userdata('view_patientid',$patient_id);
		$patient_name=$this->myclass->select("patient_name","bs_patient","patient_id='$patient_id'");
		$patient_name=$patient_name[0]->patient_name;
		
		$this->session->set_userdata('patient_name',$patient_name);
		$this->load->view("patient_personal_info",$data);
	}
	function patient_update_info()
	{
		$data=$this->input->post();
		
			
		$this->form_validation->set_rules("patient_add","Patient Residence Address","trim|xss_clean");
		$this->form_validation->set_rules("patient_tel_res","Patient Residential Contact Number","trim|numeric|min_numeric[10]|min_numeric[12]|xss_clean");
		$this->form_validation->set_rules("patient_contact","Patient Contact Number","required|trim|numeric|min_numeric[10]|min_numeric[12]|xss_clean");
		$this->form_validation->set_rules("patient_email","Patient Email","trim|valid_email|xss_clean");
		$this->form_validation->set_rules("patient_age","Patient Age","trim|numeric|xss_clean");
		$this->form_validation->set_rules("patient_dob","Patient Date Of Birth","trim|xss_clean");
		$this->form_validation->set_rules("patient_blood","Patient Blood Group","trim|xss_clean");
		$this->form_validation->set_rules("complaint_des","Patient Complaint","trim|xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view("patient_personal_info.php");
		}
		else
		{
			$data['patient_staff_id'] = $this->myclass->get_session_record(0);
			$patient_data['patient_id']=$data['patient_id'];
			$patient_data['patient_gender']=$data['patient_gender'];
			$patient_data['patient_age']=$data['patient_age'];
			$patient_data['patient_blood']=$data['patient_blood'];
			$patient_data['patient_addhar']=$data['patient_addhar'];
			$patient_data['patient_pan']=$data['patient_pan'];
			$patient_data['patient_contact']=$data['patient_contact'];
			$patient_data['patient_email']=$data['patient_email'];
			$patient_data['patient_add']=$data['patient_add'];
			$patient_data['patient_office_add']=$data['patient_office_add'];
			$patient_data['patient_off_tel']=$data['patient_off_tel'];
			$patient_data['patient_staff_id']=$data['patient_staff_id'];
			$patient_data['patient_maritial']=$data['patient_maritial'];
			$patient_data['patient_profession']=$data['patient_profession'];
			$patient_data['patient_tel_res']=$data['patient_tel_res'];
			$patient_data['patient_ref']=$data['patient_ref'];
			$patient_data['patient_family_doc']=$data['patient_family_doc'];
			$patient_data['patient_family_doc_add']=$data['patient_family_doc_add'];
			$patient_data['patient_family_doc_tel']=$data['patient_family_doc_tel'];
			$patient_data['patient_pregnant']=$data['patient_pregnant'];
			$patient_data['patient_pregnant_due_dt']=$data['patient_pregnant_due_dt'];
			$patient_data['patient_nurcing_child']=$data['patient_nurcing_child'];
			$patient_data['patient_pan_masala']=$data['patient_pan_masala'];
			$patient_data['patient_tobacco']=$data['patient_tobacco'];
			$patient_data['patient_smoking']=$data['patient_smoking'];
			$patient_data['patient_no_cigarattes']=$data['patient_no_cigarattes'];
			$patient_data['patient_medicine']=$data['patient_medicine'];
			
		$date_array=explode("/",$data['patient_dob']);
		$patient_data['patient_dob']=$date_array[2]."-".$date_array[1]."-".$date_array[0];
		
		if(!empty($data['patient_pregnant_due_dt']))
		{
			$date_array2=explode("/",$data['patient_pregnant_due_dt']);
			$patient_data['patient_pregnant_due_dt']=$date_array2[2]."-".$date_array2[1]."-".$date_array2[0];
		}
			$session_data = $this->session->all_userdata();
			$patient_id=$session_data['view_patientid'];
			
			/*patient Information update in patient table*/
			$this->welcome_model->update_record($patient_id,"bs_patient",$patient_data,"patient_id");
			
			/*add patient allery*/
			if(isset($data['allergy_allerty_id']))
			{
				$allergy = array();
				$len = count($data['allergy_allerty_id']);
				for ($i = 0; $i < $len; $i++) {
				$allergy[] = array(
										"allergy_patient_id" => $patient_id,
										"allergy_allerty_id"=>$data['allergy_allerty_id'][$i],
										);
					}
					foreach($allergy as $allergy)
					{
						$ans=$this->welcome_model->do_register('bs_allergy',$allergy); 
					}		
			}
			/*Add patient suffer medical*/
			if(isset($data['suffer_medical_id']))
			{
				$suffer_data = array();
				$len = count($data['suffer_medical_id']);
				for ($i = 0; $i < $len; $i++) {
				$suffer_data[] = array(
										"suffer_patient_id" => $patient_id,
										"suffer_medical_id"=>$data['suffer_medical_id'][$i],
										);
					}
					
					foreach($suffer_data as $suffer)
					{
						$ans=$this->welcome_model->do_register('bs_suffer',$suffer);
					}	
			
			}
				redirect('index.php/patient/dignosis');
			
		}
	}
	function dignosis()
	{
		$this->load->view('dignosisandtreament');
	}
	function treatment_action()
	{
		$ans=$this->input->post();
		//$this->form_validation->set_rules("coords1","Mention Dignosis On Image","trim|xss_clean");
		$this->form_validation->set_rules("treatment_date","Treatment Date","required|xss_clean");
		$this->form_validation->set_rules("treatment_toothno","Tooth No.","required|xss_clean");
		$this->form_validation->set_rules("treament_dignosisdesc","Dignosis Description","required|xss_clean");
		$this->form_validation->set_rules("treatment_comments","Treatment Comments","xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('dignosisandtreament');
		}
		else
		{
		$session_data = $this->session->all_userdata();
		$patient_id=$session_data['view_patientid'];
		$treatment_staff_id = $this->myclass->get_session_record(0);
		$treatment_patient_id=$patient_id;
		/*$data['treatment_treatment']=$ans['coords1'];
		$data['treatment_dignosis']=$ans['coords2'];*/
		$treament_dignosisdesc=$ans['treament_dignosisdesc'];
		$treatment_date=$ans['treatment_date'];
		$treatment_toothno=$ans['treatment_toothno'];
		$treatment_comments=$ans['treatment_comments'];
		$suffer_data = array();
		$len = count($ans['srno']);
		for ($i = 0; $i < $len; $i++) 
		{
			$suffer_data[] = array(
							"treatment_date"=>$treatment_date[$i],
							"treatment_toothno"=>$treatment_toothno[$i],
							"treament_dignosisdesc"=>$treament_dignosisdesc[$i],
							"treatment_comments"=>$treatment_comments[$i],
							"treatment_staff_id"=>$treatment_staff_id,
							"treatment_patient_id"=>$treatment_patient_id
			);
			
				
		}
		
					foreach($suffer_data as $suffer)
					{
						//$id=$suffer['treat_adv_id'];
						$ans=$this->welcome_model->do_register('bs_treatment',$suffer);
						//$this->welcome_model->update_record($id,"bs_treatment_adv",$suffer,"treat_adv_id");
					}	
					//redirect('index.php/patient/dignosis');
		
		//$ans=$this->welcome_model->do_register('bs_treatment',$data);
		redirect('index.php/patient/dignosis');
		}
	}
	
	/*Treatement Plan*/
	function treatment_plan()
	{
		$ans=$this->input->post();
		//$this->form_validation->set_rules("coords1","Mention Dignosis On Image","trim|xss_clean");
		$this->form_validation->set_rules("treatment_plan_date","Treatment Plan Date","required|xss_clean");
		$this->form_validation->set_rules("treatment_plan_tootharea","Tooth No.","required|xss_clean");
		$this->form_validation->set_rules("treatment_plan","Treatment Plan Description","required|xss_clean");
		$this->form_validation->set_rules("treatment_plan_comments","Treatment Comments","xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('dignosisandtreament');
		}
		else
		{
		$session_data = $this->session->all_userdata();
		$patient_id=$session_data['view_patientid'];
		$treatment_staff_id = $this->myclass->get_session_record(0);
		//$treatment_staff_id;
		$treatment_patient_id=$patient_id;
		/*$data['treatment_treatment']=$ans['coords1'];
		$data['treatment_dignosis']=$ans['coords2'];*/
		$treatment_plan=$ans['treatment_plan'];
		$treatment_plan_date=$ans['treatment_plan_date'];
		$treatment_plan_tootharea=$ans['treatment_plan_tootharea'];
		$treatment_plan_comments=$ans['treatment_plan_comments'];
		$suffer_data = array();
		$len = count($ans['srno']);
		for ($i = 0; $i < $len; $i++) 
		{
			$suffer_data[] = array(
							"treatment_plan_date"=>$treatment_plan_date[$i],
							"treatment_plan_tootharea"=>$treatment_plan_tootharea[$i],
							"treatment_plan"=>$treatment_plan[$i],
							"treatment_plan_comments"=>$treatment_plan_comments[$i],
							"treatment_plan_staff_id"=>$treatment_staff_id,
							"treatment_plan_patient_id"=>$treatment_patient_id
			);
			
				
		}
		
		
		
					foreach($suffer_data as $suffer)
					{
						//$id=$suffer['treat_adv_id'];
						$ans=$this->welcome_model->do_register('bs_treatment_plan',$suffer);
						//$this->welcome_model->update_record($id,"bs_treatment_adv",$suffer,"treat_adv_id");
					}	
					//redirect('index.php/patient/dignosis');
		
		//$ans=$this->welcome_model->do_register('bs_treatment',$data);
		redirect('index.php/patient/dignosis');
		}
	}
	
	
	function treatment_advice()
	{
		$ans=$this->input->post();
		$this->form_validation->set_rules("treat_adv","Treatment Advice","required|trim|xss_clean");
		$this->form_validation->set_rules("treat_cost","Treatment Cost","required|trim|xss_clean");
		
		
		/*
		$this->form_validation->set_rules("treat_adv","Treatment Advice","required|trim|xss_clean");
		$this->form_validation->set_rules("treat_cost","Treatment Cost","required|trim|xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('dignosisandtreament');
		}
		else
		{
			
			
			$data['treat_advid_treament_id']=$ans['treat_advid_treament_id'];
			$data['treat_adv']=$ans['treat_adv'];
			$data['treat_cost']=$ans['treat_cost'];
			$data['treat_adv_status']='0';
			$ans=$this->welcome_model->do_register('bs_treatment_adv',$data);
			redirect('index.php/patient/dignosis');
		}
		*/
	}
	function update_advice()
	{
		$data=$this->input->post();
		
		if(isset($data['treat_advice_id']))
			{
			
				$app_from=$data['app_from'];
				//$app_from= date("Y-m-d",strtotime($from));
				
		
				$suffer_data = array();
				$len = count($data['treat_advice_id']);
				$treat_adv_id=$data['treat_advice_id'];
				$treat_status_change_time=$app_from;
				$treat_adv_status=$data['treat_adv_status'];
				for ($i = 0; $i < $len; $i++) {
				$suffer_data[] = array(
										"treat_adv_id"=>$treat_adv_id[$i],
										"treat_adv_status"=>$treat_adv_status[$i],
										"treat_status_change_time"=>$treat_status_change_time[$i]
										);
					}
					
					foreach($suffer_data as $suffer)
					{
						$id=$suffer['treat_adv_id'];
						//$ans=$this->welcome_model->do_register('bs_suffer',$suffer);
						$this->welcome_model->update_record($id,"bs_treatment_adv",$suffer,"treat_adv_id");
					}	
					redirect('index.php/patient/dignosis');
			}
	}
	function procedure()
	{
		$this->load->view('patient_procedure');
	}
	function process_action()
	{
		$data=$this->input->post();
		
		$session_data = $this->session->all_userdata();
		$patient_id=$session_data['view_patientid'];
		$data['treatment_staff_id'] = $this->myclass->get_session_record(0);
		
		if(isset($data['patient_processplan_id']))
			{
				$process_data = array();
				$len = count($data['patient_processplan_id']);
				for ($i = 0; $i < $len; $i++) {
				$process_data[] = array(
										"p_process_patientid" => $patient_id,
										"p_processid"=>$data['patient_processplan_id'][$i],
										"p_rate"=>$data['patient_rate'][$i],
										"p_rate_discount"=>$data['patient_discount'][$i],
										"p_rate_amount"=>$data['patient_amount'][$i],
										"p_process_staffid"=>$data['treatment_staff_id'],
										);
					}
					
					
					foreach($process_data as $process_data)
					{
						if(!empty($process_data['p_rate']))
						{
							$ans=$this->welcome_model->do_register('bs_patient_process',$process_data);
						}	
					}	
			
			}
		redirect('index.php/patient/payment_form');
		
	}
	function payment_form($plan_id)
	{
		//echo $plan_id;
		//exit;
		$data['plan_id']=$plan_id;	
		$this->load->view("payment_form",$data);
	}
	
	function payment_action()
	{
		$session_data = $this->session->all_userdata();
		$patient_id=$session_data['view_patientid'];
		$patient_name=$session_data['patient_name'];
		$patient_name = str_replace("\'","'",$patient_name);
		$ans=$this->input->post();
		$treatment_staff_id = $this->myclass->get_session_record(0);
		
		$paid_amt=$ans['payment_paidamt']+$ans['payment_payable'];
		
		$data['payment_amt']=$ans['payment_amt'];
		$data['payment_plan_id']=$ans['payment_plan_id'];
		$data['payment_paidamt']=$paid_amt;
		$data['payment_payable']=$ans['payment_payable'];
		$data['payment_receipt_no']=$ans['payment_receipt_no'];
		$data['payment_mode	']=$ans['payment_mode'];
		$data['payment_desc	']=$ans['payment_desc'];
		$data['payment_patient_id']=$patient_id;
		$ans=$this->welcome_model->do_register('bs_payment',$data);
		$plan_id=$ans['payment_plan_id'];
		
		$income_data['income_refno']=$data['payment_receipt_no'];
		$income_data['income_amt']=$data['payment_payable'];
		$income_data['income_desc']='paid by patient-'.$patient_name;
		$ans=$this->welcome_model->do_register('bs_income',$income_data);
		redirect('index.php/patient/dignosis');
	}
	function print_receipt($receipt_no)
	{
		$data['receipt_no']=$receipt_no;
		$this->load->view('receipt',$data);
		
	}
	function prescription_form()
	{
		$presc_no=$this->myclass->select("prescription_no","bs_prescription","1");
		$prescription_no=end($presc_no);
		$data['prescription_no']=$prescription_no->prescription_no+1;
		$this->load->view('prescription',$data);
	}
	function prescription_action()
	{
		$data=$this->input->post();
		$session_data = $this->session->all_userdata();
		$patient_id=$session_data['view_patientid'];
		$data['prescription_staffid']=$this->myclass->get_session_record(0);
		$data['prescription_patient_id']=$patient_id;
		$ans=$this->welcome_model->do_register('bs_prescription',$data);
		//redirect('index.php/patient/prescription_form');
		echo "1";
		//$this->load->view('prescription');
	}
	function print_prescription($prescription_no)
	{
		$data['prescription_no']=$prescription_no;
		$this->load->view('print_prescription',$data);
	}
	function export_ledger()
	{
		//echo $ans=$this->input->post();
		$session_data = $this->session->all_userdata();
		$patient_id=$session_data['view_patientid'];
		//$patient_ledger=$this->myclass->select("staff_name,patient_name,treatment_desc,treatment_time,treament_dignosisdesc,treament_oraldesc","bs_staff,bs_patient,bs_treatment","staff_id=treatment_staff_id AND patient_id='$patient_id' AND treatment_patient_id='$patient_id' ");
		
		$patient_name=$session_data['patient_name'];
//$name=$patient_name;
		$patient_name = str_replace("\'","'",$patient_name);		
		
		$listofadvice=$this->myclass->select("treat_id,staff_name,treat_toothno,treat_date,treat_dignosis,treat_dig_comment,treat_plan_date,treat_paln_toothno,treat_plan,treat_plan_comment,treat_done_toothno,treat_done_date,treat_done,treat_done_comment","bs_staff,bs_new_treatment","treat_patientId='$patient_id' AND treat_staff_id=staff_id");
		
		$xls_filename = 'patient_ledger__'.$patient_name.'_'.date('Y-m-d').'.xls';
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=$xls_filename");
		
		?><html>
                <h4>Patient Ledger- <?php echo $patient_name.'-'.date("d-m-Y");?></h4>
                <table>
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Date</th>
							<th>Tooth No./Area</th>
							<th>Diganosis</th>
							<th>Plan Date</th>
							<th>Treament Plan</th>
							<th>Done Date</th>
                            <th>Treament Done</th>
							<!--<th class="head0">Cost</th>-->
                            <th class="head1">Comments</th>
						</tr>
                    </thead>
					<tbody>
<?php
if(is_array($listofadvice)):
foreach($listofadvice as $patient_ledger1):
?>
							<tr>
							<td><?php echo $patient_ledger1->staff_name;?></td>
                            <td><?php echo $patient_ledger1->treat_date;?></td>
							<td><?php echo $patient_ledger1->treat_toothno;?></td>
							<td><?php echo $patient_ledger1->treat_dignosis;?></td>
							<td><?php echo $patient_ledger1->treat_plan_date;?></td>
							<td><?php echo $patient_ledger1->treat_plan;?></td>
							<td><?php echo $patient_ledger1->treat_done_date;?></td>
							<td><?php echo $patient_ledger1->treat_done;?></td>
							<td><?php echo $patient_ledger1->treat_done_comment;?></td> 
</tr>							
<?php
endforeach;
endif;
?>						
                    </tbody>
                </table>
                </html>
				<?php
	}
	
	
	
	function export_advice()
	{
		//echo $ans=$this->input->post();
		$session_data = $this->session->all_userdata();
		$patient_id=$session_data['view_patientid'];
		$patient_ledger=$this->myclass->select("staff_name,patient_name,treat_adv,treat_cost,treat_adv_status,treat_adv_time,treat_status_change_time","bs_staff,bs_patient,bs_treatment,bs_treatment_adv","staff_id=treatment_staff_id AND patient_id='$patient_id' AND treatment_patient_id='$patient_id' AND treat_advid_treament_id=	treatment_id");
		
		$xls_filename = 'Treatment_Adivce_ledger__'.$patient_ledger[0]->patient_name.''.date('Y-m-d').'.xls';
		//header("Content-type: application/vnd-ms-excel");
		//header("Content-Disposition: attachment; filename=$xls_filename");
		
		?><html>
                <h4>Treatment Adivce Ledger- <?php echo date("d-m-Y");?></h4>
                <table>
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Patient Name</th>
							<th>Advice</th>
							<th>Cost</th>
							<th>Advice Date</th>
							<th>Treatment status</th>
							<th>Date</th>
                        </tr>
                    </thead>
					<tbody>
<?php
if(is_array($patient_ledger)):
foreach($patient_ledger as $patient_ledger1):
 if($patient_ledger1->treat_adv_status=='0')
 {
	$advice_status="Pending";
 }
 else
 {
	$advice_status="Done";
 }
 
 
?>
    
                        <tr>
                        
                            <td><?php echo $patient_ledger1->staff_name;?></td>
                            <td><?php echo $patient_ledger1->patient_name; ?></td>
							<td><?php echo $patient_ledger1->treat_adv; ?></td>
							<td><?php echo $patient_ledger1->treat_cost; ?></td>
							<td><?php echo $patient_ledger1->treat_adv_time; ?></td>
							<td><?php echo $advice_status; ?></td>
							<td><?php echo $patient_ledger1->treat_status_change_time; ?></td>
                        </tr>
              
<?php
endforeach;
endif;
?>						
                    </tbody>
                </table>
                </html>
				<?php
	}
	
	public function upload()
	{
		$this->load->view('upload_document');
	}
	public function upload_action()
	{
		$imgfile=$_FILES['userfile'];
		$imgf=time().$imgfile['name'];
		$this->load->library('upload');
		$data['patient_staff_id'] = $this->myclass->get_session_record(0);
		
		$this->form_validation->set_rules("docuement_name","Document Name","trim|required|xss_clean");
		$this->form_validation->set_rules("docuement_desc","Document Description","trim|required|xss_clean");
		
			
			if($this->form_validation->run()==FALSE)
			{
			$this->load->view('upload_document');
			}
			else
			{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|doc|xlsx|docx|pdf|bmp';
			$config['file_name'] = $imgf;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$data['upload_data'] = '';
				if (!$this->upload->do_upload())
				{
					echo $this->upload->display_errors();
			
					$this->load->view('upload_document');
				}
				else
				{
					$docuement_name=$_POST['docuement_name'];
		          $docuement_desc=$_POST['docuement_desc'];
		          $docuement_path=$imgf;
				  $docuement_patient_id=$_POST['docuement_patient_id'];
				  $patient_staff_id=$data['patient_staff_id'];
				  
		          $arr=array('docuement_name'=>$docuement_name,
					         'docuement_desc'=>$docuement_desc,
					         'docuement_path'=>$docuement_path,
							 'docuement_patient_id'=>$docuement_patient_id,
					         'docuement_staff_id'=> $patient_staff_id);
			    /////////////////////////////////////////////// 
				 //$img_result=$this->banner_model->add_image($arr,"pnd_banner");
				 $ans=$this->welcome_model->do_register('bs_document',$arr);
				 redirect('index.php/patient/upload');
				}
			}	
	}
	
	public function file_download($data)
	{
		//$data=$this->input->post();
		
		$file_name=$this->myclass->select("docuement_path","bs_document","document_id='$data'");
		$path=base_url()."uploads/".$file_name[0]->docuement_path;
		//force_download($path);
		header("Content-disposition: attachment; filename=\"{$file_name[0]->docuement_path}\"");
		header("Content-Type: {$mm_type}"); // also works with file extension
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: '.filesize($path));
		readfile($filename);
		//redirect('index.php/patient/upload');
	}
	
	public function certificate()
	{
		$this->load->view("view_certifcate");
	}
	
	public function view_create_group_form()
	{
		$this->load->view('view_create_group_form');
	}
	public function new_group_register()
	{
		$data=$this->input->post();	
		$this->form_validation->set_rules('group_name','Group Name','trim|required|is_unique[bs_group.group_name]|xss_clean');
		$this->form_validation->set_rules('group_status','Group Status','trim|required|xss_clean');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->user_model->do_register("bs_group",$data); 
			echo '1';
		}
	}
	public function group_list()
	{
		$result=$this->welcome_model->get_group_list();
		$final_record['listofgroup']= $result;
		$this->load->view('view_group_list',$final_record);
	}
	/*Edit Group*/
	public function edit_group($id)
	{
		$result=$this->welcome_model->get_single_group($id);
		$final_data['data'] = $result;
		$this->load->view('view_edit_group',$final_data);
	}
	
	public function edit_group_action()
	{
		$data=$this->input->post();	
		
		$id=$data['group_id'];
		
		
		$this->form_validation->set_rules('group_name','Group Name','trim|required|xss_clean');
		$this->form_validation->set_rules('group_status','Group Status','trim|required|xss_clean');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->welcome_model->update_record($id,"bs_group",$data,"group_id");
			//print_r($data);
			//$user_data=$data['log_username']
			echo '1';
		}
	}
	public function delete_group()
	{
		$user_id=$_POST['userID'];
		$this->welcome_model->delete_record('group_id',$user_id,'bs_group');
		//$this->user_model->delete_record($user_id);
	}
	
	/* Sub group start*/
	
	public function view_subgroup_form()
	{
		$this->load->view('view_subgroup_form');
	}
	
	public function new_subgroup_register()
	{
		$data=$this->input->post();	
		
		$this->form_validation->set_rules('subgroup_groupid','Group Name','trim|required|xss_clean');
		$this->form_validation->set_rules('sub_groupname','Sub Group Name','trim|required|is_unique[bs_subgroup.sub_groupname]|xss_clean');
		$this->form_validation->set_rules('subgroup_status','Sub Group Status','trim|required|xss_clean');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->welcome_model->do_register("bs_subgroup",$data); 
			//print_r($data);
			//$user_data=$data['log_username']
			echo '1';
		}
	}
	public function subgroup_list()
	{
		$result=$this->welcome_model->get_subgroup_list();
		$final_record['listofgroup']= $result;
		$this->load->view('view_subgroup_list',$final_record);
	}
	
	public function edit_subgroup($id)
	{
		$result=$this->welcome_model->get_single_subgroup($id);
		$final_data['data'] = $result;
		$this->load->view('view_edit_subgroup',$final_data);
	}
	
	public function edit_subgroup_action()
	{
		$data=$this->input->post();	
		
		$id=$data['group_id'];
		
		
		$this->form_validation->set_rules('subgroup_groupid','Group','trim|required|xss_clean');
		$this->form_validation->set_rules('sub_groupname','Sub Group','trim|required|xss_clean');
		$this->form_validation->set_rules('subgroup_status','Sub Group Status','trim|required|xss_clean');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$this->setting_model->update_record($id,"bs_subgroup",$data,"group_id");
			//print_r($data);
			//$user_data=$data['log_username']
			echo '1';
		}
	}
	
	public function view_income_account_entry()
	{
		$this->load->view('view_income_account_entry_form');
	}
	
	public function view_expences_account_entry()
	{
		$this->load->view('view_expences_account_entry_form');
	}
	
	public function export_appointment()
	{
		//echo $ans=$this->input->post();
		
		$date=date('Y-m-d');
		$total_appot1=$this->myclass->select("appo_id,patient_id,patient_name,patient_contact,staff_name,patient_gender,patient_age,appo_datetime,appo_status","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND appo_datetime LIKE '$date%' ORDER BY appo_datetime");
		
		$xls_filename = 'appointment-'.date('Y-m-d').'.xls';
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=$xls_filename");
		
		?><html>
                <h4>Appointment- <?php echo date("d-m-Y");?></h4>
                <table>
                    <thead>
                        <tr>
							<th>Doctor Name</th>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
							<th>Mobile No.</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Time </th>
                        </tr>
                    </thead>
					<tbody>
<?php
if(is_array($total_appot1)):
foreach($total_appot1 as $total_appot11):

if($total_appot11->patient_gender=="1")
{
	$gender="Male";
}
else
{
	$gender="Female";
}

											$time=date("H:i",strtotime($total_appot11->appo_datetime));
											$appo_datetime=$total_appot11->appo_datetime;
											$timformate=explode(" ",$appo_datetime);

											//print_r($timformate[1].$timformate[2]);
											$appo_time=$timformate[1]." ".$timformate[2];

?>
    
                        <tr>
                        
                            <td><?php echo $total_appot11->staff_name;?></td>
							<td><?php echo $total_appot11->patient_id; ?></td>
                            <td><?php echo $total_appot11->patient_name; ?></td>
							<td><?php echo $total_appot11->patient_contact; ?></td>
							<td><?php echo $gender; ?></td>
							<td><?php echo $total_appot11->patient_age; ?></td>
							<td><?php echo $appo_time; ?></td>
							
                        </tr>
              
<?php
endforeach;
endif;
?>						
                    </tbody>
                </table>
                </html>
				<?php
	}
	/*Export next day appointment*/
	public function export_next_day_appointment()
	{
		//echo $ans=$this->input->post();
		
		$date=date('Y-m-d',strtotime(' +1 day'));
		
		
		$total_appot1=$this->myclass->select("appo_id,patient_id,patient_name,patient_contact,staff_name,patient_gender,patient_age,appo_datetime,appo_status","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND appo_datetime LIKE '$date%' ORDER BY appo_datetime ");
		
		$xls_filename = 'appointment-'.$date.'.xls';
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=$xls_filename");
		
		?><html>
                <h4>Appointment- <?php echo $date;?></h4>
                <table>
                    <thead>
                        <tr>
							<th>Doctor Name</th>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
							<th>Patient Contact</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Time </th>
                        </tr>
                    </thead>
					<tbody>
<?php
if(is_array($total_appot1)):
foreach($total_appot1 as $total_appot11):

if($total_appot11->patient_gender=="1")
{
	$gender="Male";
}
else
{
	$gender="Female";
}

											$time=date("H:i",strtotime($total_appot11->appo_datetime));
											$appo_datetime=$total_appot11->appo_datetime;
											$timformate=explode(" ",$appo_datetime);

											//print_r($timformate[1].$timformate[2]);
											$appo_time=$timformate[1]." ".$timformate[2];

?>
    
                        <tr>
                        
                            <td><?php echo $total_appot11->staff_name;?></td>
							<td><?php echo $total_appot11->patient_id; ?></td>
                            <td><?php echo $total_appot11->patient_name; ?></td>
							<td><?php echo $total_appot11->patient_contact; ?></td>
							<td><?php echo $gender; ?></td>
							<td><?php echo $total_appot11->patient_age; ?></td>
							<td><?php echo $appo_time; ?></td>
							
                        </tr>
              
<?php
endforeach;
endif;
?>						
                    </tbody>
                </table>
                </html>
				<?php
	}
	
	public function export_procedure()
	{
			$session_data = $this->session->all_userdata();
				$patient_id=$session_data['view_patientid'];
				$process_history=$this->myclass->select("staff_name,process_name,p_rate,p_rate_discount,p_rate_amount,p_process_time,patient_name","bs_patient_process,bs_staff,bs_procedure,bs_patient","p_process_staffid=staff_id AND p_process_patientid=patient_id AND p_processid=process_id AND p_process_patientid='$patient_id'");
				
				$xls_filename = 'patient_procedure_history -'.$process_history[0]->patient_name.''.date('Y-m-d').'.xls';
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=$xls_filename");
				
				?><html>
						<h4>Patient Ledger- <?php echo date("d-m-Y");?></h4>
						<table>
							<thead>
								<tr>
									<th>Doctor Name</th>
									<th>Patient Name</th>
									<th>Date Time</th>
									<th>Procedure Name</th>
									<th>Rate</th>
									<th>Discount %</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>
		<?php
		if(is_array($process_history)):
		foreach($process_history as $patient_ledger1):

		?>
			
								<tr>
								
									<td><?php echo $patient_ledger1->staff_name;?></td>
									<td><?php echo $patient_ledger1->patient_name; ?></td>
									<td><?php echo $patient_ledger1->p_process_time;?></td>
									<td><?php echo $patient_ledger1->process_name;?></td>
									<td><?php echo $patient_ledger1->p_rate;?></td>
									<td><?php echo $patient_ledger1->p_rate_discount;?></td>
									<td><?php echo $patient_ledger1->p_rate_amount;?></td>
								</tr>
					  
		<?php
		endforeach;
		endif;
		?>						
							</tbody>
						</table>
						</html>
						<?php
		
	}
	
	public function listofprescription ()
	{
		$this->load->view('listofprescription');
	}
	
	////////////Search patient //////////////////
	
	public function search_patient()
	{
		$data=$this->input->post();
		//print_r($data);
		$name=$data['keyword'];
		
		$patient_details=$this->myclass->select("patient_id,patient_name,patient_gender,patient_contact,patient_email","bs_patient","patient_name LIKE '$name%' ORDER BY patient_name");
		
		
		if($patient_details=='no')
		{
			$patient_details=$this->myclass->select("patient_id,patient_name,patient_gender,patient_contact,patient_email","bs_patient","patient_contact LIKE '$name%' ORDER BY patient_name");
			
			if($patient_details=='no')
			{
				$data['msg']="Sorry Search result not found";
				$this->load->view('listofpatient_search',$data);
			}
			else
			{
				$data['patient_details']=$patient_details;
				$data['msg']="";
				$this->load->view('listofpatient_search',$data);
			}
		}
		else
		{
			$data['patient_details']=$patient_details;
			$data['msg']="";
			$this->load->view('listofpatient_search',$data);
		}
		
		
	}
	
	public function delete_patient()
	{
		$user_id=$_POST['userID'];
		//delete_record($delete_id,$field,$table)
		$this->welcome_model->delete_record($user_id,'patient_id','bs_patient');
		$this->welcome_model->delete_record('appo_patient_id',$user_id,'bs_appointment');
		$this->welcome_model->delete_record('treat_patientId',$user_id,'bs_new_treatment');
		
		//$this->user_model->delete_record($user_id);
	}
	
	public function set_reminder()
	{
		
		$session_data = $this->session->all_userdata();
		$treatment_staff_id = $this->myclass->get_session_record(0);
		$data=$this->input->post();
		
		$ans=$this->input->post();
		//$this->form_validation->set_rules("coords1","Mention Dignosis On Image","trim|xss_clean");
		$this->form_validation->set_rules("reminder_patient_id","Patient","required|xss_clean");
		$this->form_validation->set_rules("reminder_date","Reminder Date","required|xss_clean");
		$this->form_validation->set_rules("reminder_time","Reminder Time","required|xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('listofpatient');
		}
		else
		{
			$data['reminder_staff_id']=$treatment_staff_id;
			$ans=$this->welcome_model->do_register('bs_reminder',$data);
			redirect('index.php/patient/view_patient');
		}
		
	}
	
	
	public function delete_reminder($patient_id)
	{
		$this->welcome_model->delete_record($patient_id,'reminder_id','bs_reminder');
		redirect('index.php/welcome/dashboard');
	}
	public function listofquotation()
	{
		$this->load->view('listofquote');
	}
	public function quotation_form()
	{
		$ans=$this->myclass->select("quote_no","bs_quote","1");
		//print_r($ans);
		if($ans=='no')
		{
			//echo $inward_impsr_no=1;
			$data['auto_id']="1";
		}
		else
		{
			$last_srno=end($ans);
			$sr_no=$last_srno->quote_no+1;
			$data['auto_id']=$sr_no;
			//echo $ans->inward_impsr_no+1;
		}	
		$this->load->view('quotation_form',$data);
	}
	public function quotation_action()
	{
		$data=$this->input->post();
		$date=date('d-m-Y');
		
				$patient_data = array();
				$len = count($data['quote_des']);
				for ($i = 0; $i < $len; $i++) {
				$patient_data[] = array(
										"quote_no"=>$data['quote_no'],
										"quote_date"=>$date,
										"quote_name" => $data['quote_name'],
										"quote_mobileno"=>$data['quote_mobileno'],
										"quote_des"=>$data['quote_des'][$i],
										"quote_price"=>$data['quote_price'][$i],
										"quote_dis"=>$data['quote_dis'],
										"quote_sub"=>$data['quote_sub'],
										"quote_tot"=>$data['quote_tot'],
										);
					}
			
					foreach($patient_data as $suffer)
					{
						if(!empty($suffer['quote_des']))
						{
							$ans=$this->welcome_model->do_register('bs_quote',$suffer);
							redirect(base_url()."index.php/patient/quotation_print/".$suffer['quote_no']);
						}	
					}
	}
	
	public function quotation_print($id)
	{
		$data['quote_no']=$id;
		$this->load->view('quotation_print',$data);
	}
	
	public function  quote_edit($id)
	{
		# code...
		$data['edit_id']=$id;
		$this->load->view('quotation_editform',$data);
	}
	public function delete_quote()
	{
		$user_id=$_POST['userID'];
		//delete_record($delete_id,$field,$table)
		$this->welcome_model->delete_record($user_id,'quote_no','bs_quote');
	}
	public function new_income_register()
	{
		$data=$this->input->post();	
		
		$this->form_validation->set_rules('income_refno','Income Ref. No.','trim|required|xss_clean');
		$this->form_validation->set_rules('income_amt','Income Amount','trim|required|xss_clean');
		$this->form_validation->set_rules('income_desc','Income Narration','trim|required|xss_clean');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$data['income_clinic_id']=$this->session->userdata('staff_clinic_id');
			$this->welcome_model->do_register("bs_income",$data); 
			//print_r($data);
			//$user_data=$data['log_username']
			echo '1';
		}
	}
public function new_expences_register()
	{
		$data=$this->input->post();	
		
		$this->form_validation->set_rules('expn_refno','Expences Ref. No.','trim|required|xss_clean');
		$this->form_validation->set_rules('expn_exptype','Expences Type','trim|required|xss_clean');
		$this->form_validation->set_rules('expn_name','Expences Name on','trim|required|xss_clean');
		$this->form_validation->set_rules('expn_amt','Expences Amount','trim|required|xss_clean');
		$this->form_validation->set_rules('expn_desc','Expences Narration','trim|required|xss_clean');
		
		if($this->form_validation->run()==FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$data['expn_clinic_id']=$this->session->userdata('staff_clinic_id');
			$this->welcome_model->do_register("bs_expences",$data); 
			//print_r($data);
			//$user_data=$data['log_username']
			echo '1';
		}
	}
	
	public function view_expences()
	{
		$this->load->view('view_expences');
		
	}
	public function view_income()
	{
		$this->load->view('view_income');
		
	}
	public function delete_income()
	{
		$user_id=$_POST['userID'];
		//delete_record($delete_id,$field,$table)
		$this->welcome_model->delete_record($user_id,'income_id','bs_income');
	}
	public function delete_expence()
	{
		$user_id=$_POST['userID'];
		//delete_record($delete_id,$field,$table)
		$this->welcome_model->delete_record($user_id,'expn_id','bs_expences');
	}
	private function send_sms($mobile,$message)
	{
		$url='http://bhashsms.com/api/sendmsg.php?user=saluja&pass=123456&sender=SALUJA&phone='.$mobile.'&text='.$message.'&priority=ndnd&stype=normal';
		file_get_contents($url);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */