<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treatment extends CI_Controller {

	function add_dignosis()
	{
		$ans=$this->input->post();
		//$this->form_validation->set_rules("coords1","Mention Dignosis On Image","trim|xss_clean");
		$this->form_validation->set_rules("tooth_no"," Diagnosis Tooth No.","required|xss_clean");
		$this->form_validation->set_rules("treat_date","Diagnosis  Date","required|xss_clean");
		$this->form_validation->set_rules("treat_dignosis","Diagnosis  Dignosis","required|xss_clean");
		$this->form_validation->set_rules("treat_dig_comment","Diagnosis Comments","xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('dignosisandtreament');
		}
		else
		{
		$session_data = $this->session->all_userdata();
		$patient_id=$session_data['view_patientid'];
		
		$session_data = $this->session->all_userdata();
$view_patientid=$session_data['view_patientid'];

		
		$treatment_staff_id = $this->myclass->get_session_record(0);
		$app_from=$ans['treat_date'];
		$diagnosis_date= date("Y-m-d",strtotime($app_from));
		$data['diagnosis_tooth_no']=$ans['tooth_no'];
		$data['diagnosis_date']=$diagnosis_date;
		$data['diagnosis_diagnosis']=$ans['treat_dignosis'];
		$data['diagnosis_comments']=$ans['treat_dig_comment'];
		$data['diagnosis_patient_id']=$view_patientid;
		$data['diagnosis_staff_id']=$treatment_staff_id;
		$ans=$this->welcome_model->do_register('bs_dignosis',$data);
		redirect('index.php/patient/dignosis');
		}
	}
	
	public function edit_dignosis()
	{
		$data=$this->input->post();	
		
		$id=$data['diagnosis_id'];
		
		
		$this->form_validation->set_rules("diagnosis_tooth_no"," Diagnosis Tooth No.","required|xss_clean");
		$this->form_validation->set_rules("diagnosis_date","Diagnosis  Date","required|xss_clean");
		$this->form_validation->set_rules("diagnosis_diagnosis","Diagnosis  Dignosis","required|xss_clean");
		$this->form_validation->set_rules("diagnosis_comments","Diagnosis  Comments","xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('dignosisandtreament');
		}
		else
		{
			$data['diagnosis_staff_id']=$treatment_staff_id;
			$treatment_staff_id = $this->myclass->get_session_record(0);
			$app_from=$ans['diagnosis_date'];
			$diagnosis_date= date("Y-m-d",strtotime($app_from));
			$data['diagnosis_date']=$diagnosis_date;
			$this->welcome_model->update_record($id,"bs_dignosis",$data,"diagnosis_id");
			redirect('index.php/patient/dignosis');
		}
	}
	
	public function delete_dignosis()
	{
		$treat_id=$_POST['userID'];
		//delete_record($delete_id,$field,$table)
		$this->welcome_model->delete_record($treat_id,'diagnosis_id','bs_dignosis');
		
	}
	
	/* Plan */
	function add_plan()
	{
		$ans=$this->input->post();
		//$this->form_validation->set_rules("coords1","Mention Dignosis On Image","trim|xss_clean");
		$this->form_validation->set_rules("plan_tooth_no","Plan Tooth No.","required|xss_clean");
		$this->form_validation->set_rules("plan_date","Plan Date","required|xss_clean");
		$this->form_validation->set_rules("plan_desc","Plan","required|xss_clean");
		$this->form_validation->set_rules("plan_comments","Plan Comments","xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('dignosisandtreament');
		}
		else
		{
		$session_data = $this->session->all_userdata();
		$patient_id=$session_data['view_patientid'];
		
		$session_data = $this->session->all_userdata();
		$view_patientid=$session_data['view_patientid'];

		
		$treatment_staff_id = $this->myclass->get_session_record(0);
		$app_from=$ans['plan_date'];
		$diagnosis_date= date("Y-m-d",strtotime($app_from));
		$data['plan_tooth_no']=$ans['plan_tooth_no'];
		$data['plan_date']=$diagnosis_date;
		$data['plan_desc']=$ans['plan_desc'];
		$data['plan_comments']=$ans['plan_comments'];
		$data['plan_patient_id']=$view_patientid;
		$data['plan_staff_id']=$treatment_staff_id;
		
		
		$ans=$this->welcome_model->do_register('bs_plan',$data);
		redirect('index.php/patient/dignosis');
		}
	}
	
	public function edit_plan()
	{
		$data=$this->input->post();	
		$id=$data['plan_id'];
		
		
		$this->form_validation->set_rules("plan_tooth_no","Plan Tooth No.","required|xss_clean");
		$this->form_validation->set_rules("plan_date","Plan Date","required|xss_clean");
		$this->form_validation->set_rules("plan_desc","Plan Dignosis","required|xss_clean");
		$this->form_validation->set_rules("plan_comments","Plan Comments","xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('dignosisandtreament');
		}
		else
		{
			$data['plan_staff_id']=$treatment_staff_id;
			$treatment_staff_id = $this->myclass->get_session_record(0);
			$app_from=$data['plan_date'];
			$plan_date= date("Y-m-d",strtotime($app_from));
			$data['plan_date']=$plan_date;
			$this->welcome_model->update_record($id,"bs_plan",$data,"plan_id");
			redirect('index.php/patient/dignosis');
		}
	}
	
	public function delete_plan()
	{
		$treat_id=$_POST['userID'];
		//delete_record($delete_id,$field,$table)
		$this->welcome_model->delete_record($treat_id,'plan_id','bs_plan');
		
	}
	
	
	
	
	
	
	/* Plan */
	function add_done()
	{
		$ans=$this->input->post();
		//$this->form_validation->set_rules("coords1","Mention Dignosis On Image","trim|xss_clean");
		$this->form_validation->set_rules("done_tooth_no","Done Tooth No.","required|xss_clean");
		$this->form_validation->set_rules("done_date","Done Date","required|xss_clean");
		$this->form_validation->set_rules("done_desc","Done Description","required|xss_clean");
		$this->form_validation->set_rules("done_comments","Done Comments","xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('dignosisandtreament');
		}
		else
		{
		$session_data = $this->session->all_userdata();
		$view_patientid=$session_data['view_patientid'];

		
		$treatment_staff_id = $this->myclass->get_session_record(0);
		$app_from=$ans['done_date'];
		$diagnosis_date= date("Y-m-d",strtotime($app_from));
		$data['done_tooth_no']=$ans['done_tooth_no'];
		$data['done_date']=$diagnosis_date;
		$data['done_desc']=$ans['done_desc'];
		$data['done_comments']=$ans['done_comments'];
		$data['done_patient_id']=$view_patientid;
		$data['done_staff_id']=$treatment_staff_id;
		
		
		$ans=$this->welcome_model->do_register('bs_treat_done',$data);
		redirect('index.php/patient/dignosis');
		}
	}
	
	public function edit_done()
	{
		$data=$this->input->post();	
		$id=$data['done_id'];
		
		
		$this->form_validation->set_rules("done_tooth_no","Done Tooth No.","required|xss_clean");
		$this->form_validation->set_rules("done_date","Done Date","required|xss_clean");
		$this->form_validation->set_rules("done_desc","Done Description","required|xss_clean");
		$this->form_validation->set_rules("done_comments","Done Comments","xss_clean");
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('dignosisandtreament');
		}
		else
		{
			$data['done_staff_id']=$treatment_staff_id;
			$treatment_staff_id = $this->myclass->get_session_record(0);
			$app_from=$data['done_date'];
			$plan_date= date("Y-m-d",strtotime($app_from));
			$data['done_date']=$plan_date;
			$this->welcome_model->update_record($id,"bs_treat_done",$data,"done_id");
			redirect('index.php/patient/dignosis');
		}
	}
	
	public function delete_done()
	{
		$treat_id=$_POST['userID'];
		//delete_record($delete_id,$field,$table)
		$this->welcome_model->delete_record($treat_id,'done_id','bs_treat_done');
		
	}
	
	/*Export Dignosis*/
	public function export_diagnosis()
	{
				$session_data = $this->session->all_userdata();
				$patient_id=$session_data['view_patientid'];
				$patient_name=$session_data['patient_name'];
				$patient_name = str_replace("\'","'",$patient_name);
				
			$diagnosis=$this->myclass->select("diagnosis_id,staff_name,diagnosis_patient_id,diagnosis_staff_id,diagnosis_tooth_no,diagnosis_date,diagnosis_diagnosis,diagnosis_comments,diagnosis_time","bs_dignosis,bs_staff","diagnosis_patient_id='$patient_id' AND diagnosis_staff_id=staff_id");
			
			
				$xls_filename = 'patient_dignosis-'.$patient_name.''.date('Y-m-d').'.xls';
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=$xls_filename");	
				
				?><html>
						<h4>Patient Dignosis- <?php echo $patient_name ."-".date("d-m-Y");?></h4>
						<table>
							<thead>
								<tr>
									<th>Date</th>
									<th>Doctor Name</th>
									<th>Tooth No./Area</th>
									<th>Dignosis</th>
									<th>Comments</th>
									
								</tr>
							</thead>
							<tbody>
		<?php
		if(is_array($diagnosis)):
		foreach($diagnosis as $diagnosis_data):

		?>
			
								<tr>
									<td><?php echo $diagnosis_data->diagnosis_date;?></td>
									<td><?php echo $diagnosis_data->staff_name;?></td>
									<td><?php echo $diagnosis_data->diagnosis_tooth_no; ?></td>
									<td><?php echo $diagnosis_data->diagnosis_diagnosis;?></td>
									<td><?php echo $diagnosis_data->diagnosis_comments;?></td>
									
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
	
	/*Export Plan*/
	public function export_plan()
	{
				$session_data = $this->session->all_userdata();
				$patient_id=$session_data['view_patientid'];
				$patient_name=$session_data['patient_name'];
				$patient_name = str_replace("\'","'",$patient_name);
				
			/*$diagnosis=$this->myclass->select("diagnosis_id,staff_name,diagnosis_patient_id,diagnosis_staff_id,diagnosis_tooth_no,diagnosis_date,diagnosis_diagnosis,diagnosis_comments,diagnosis_time","bs_dignosis,bs_staff","diagnosis_patient_id='$patient_id' AND diagnosis_staff_id=staff_id");
			*/
			
			$plan=$this->myclass->select("plan_id,plan_patient_id,plan_staff_id,staff_name,plan_staff_id,plan_tooth_no,plan_date,plan_desc,plan_comments","bs_plan,bs_staff","plan_patient_id='$patient_id' AND plan_staff_id=staff_id");
			
				$xls_filename = 'patient_plan-'.$patient_name.''.date('Y-m-d').'.xls';
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=$xls_filename");	
				
				?><html>
						<h4>Patient Plan- <?php echo $patient_name ."-".date("d-m-Y");?></h4>
						<table>
							<thead>
								<tr>
									<th>Date</th>
									<th>Doctor Name</th>
									<th>Tooth No./Area</th>
									<th>Plan</th>
									<th>Comments</th>
									
								</tr>
							</thead>
							<tbody>
		<?php
		if(is_array($plan)):
		foreach($plan as $plan_data):

		?>
			
								<tr>
									<td><?php echo $plan_data->plan_date;?></td>
									<td><?php echo $plan_data->staff_name;?></td>
									<td><?php echo $plan_data->plan_tooth_no; ?></td>
									<td><?php echo $plan_data->plan_desc;?></td>
									<td><?php echo $plan_data->plan_comments;?></td>
									
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
	
	/*Export Treatment Done*/
	public function export_done()
	{
				$session_data = $this->session->all_userdata();
				$patient_id=$session_data['view_patientid'];
				$patient_name=$session_data['patient_name'];
				$patient_name = str_replace("\'","'",$patient_name);
				
			$done=$this->myclass->select("done_id,done_patient_id,done_staff_id,staff_name,done_tooth_no,done_date,done_desc,done_comments","bs_treat_done,bs_staff","done_patient_id='$patient_id' AND done_staff_id=staff_id");
			
			/*$plan=$this->myclass->select("plan_id,plan_patient_id,plan_staff_id,staff_name,plan_staff_id,plan_tooth_no,plan_date,plan_desc,plan_comments","bs_plan,bs_staff","plan_patient_id='$patient_id' AND plan_staff_id=staff_id");*/
			 
			
				$xls_filename = 'patient_treatment_done-'.$patient_name.''.date('Y-m-d').'.xls';
				header("Content-type: application/vnd-ms-excel");
				header("Content-Disposition: attachment; filename=$xls_filename");	
				
				?><html>
						<h4>Patient Treatment Done- <?php echo $patient_name ."-".date("d-m-Y");?></h4>
						<table>
							<thead>
								<tr>
									<th>Date</th>
									<th>Doctor Name</th>
									<th>Tooth No./Area</th>
									<th>Treatment Done</th>
									<th>Comments</th>
									
								</tr>
							</thead>
							<tbody>
		<?php
		if(is_array($done)):
		foreach($done as $done_data):

		?>
			
								<tr>
									<td><?php echo $done_data->done_date;?></td>
									<td><?php echo $done_data->staff_name;?></td>
									<td><?php echo $done_data->done_tooth_no; ?></td>
									<td><?php echo $done_data->done_desc;?></td>
									<td><?php echo $done_data->done_comments;?></td>
									
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */