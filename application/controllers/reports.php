<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reports extends CI_Controller {
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
		$this->load->view('report_appointment');
	}
	function get_appointment()
	{
		$data=$this->input->post();
		$from=$data['app_from'];
		$to=$data['app_to'];
		$app_from= date("Y-m-d", strtotime($from));
		$app_to= date("Y-m-d", strtotime($to));
		$total_appot1=$this->myclass->select("appo_id,patient_name,staff_name,patient_gender,patient_age,patient_contact,appo_datetime,appo_status","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND appo_datetime BETWEEN('$app_from') AND('$app_to') ORDER BY appo_datetime");
		/*echo "<pre>";
		print_r($total_appot1);
		echo "</pre>";
		*/
		$total_appot1['app_from']=$app_from;
		$total_appot1['app_to']=$app_to;
		$app_data['app_data']=$total_appot1;
		$this->load->view('report_appointment_data',$app_data);
		
	}
	/*Export appointment report data*/
	public function export_appointment()
	{
		//echo $ans=$this->input->post();
		
		$data=$this->input->post();
		$from=$data['app_from'];
		$to=$data['app_to'];
		$app_from= date("Y-m-d", strtotime($from));
		$app_to= date("Y-m-d", strtotime($to));
		$total_appot1=$this->myclass->select("appo_id,patient_name,staff_name,patient_gender,patient_age,patient_contact,appo_datetime,appo_status","bs_appointment,bs_patient,bs_staff"," patient_id=appo_patient_id AND staff_id=appo_doctor_id AND appo_datetime BETWEEN('$app_from') AND('$app_to') ORDER BY appo_datetime");	
		
		$xls_filename = 'appointment report-'.$app_from." To ".$app_to.'.xls';
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=$xls_filename");
		
		?><html>
                <h4>Appointment Report From - <?php echo $app_from." To ".$app_to;?></h4>
                <table>
                    <thead>
                        <tr>
							<th>Doctor Name</th>
							<th>Patient Name</th>
							<th>Contact</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Time </th>
							<th>Status</th>
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

											$datetime=$total_appot11->appo_datetime;
											$appo_datetime=date("d-m-Y h:i A",strtotime($datetime));
											
											if($total_appot11->appo_status==1)
											{
												$status='Done';
											}
											else if($total_appot11->appo_status==2)
											{
												$status='Cancel';
											}
											else if($total_appot11->appo_status==3)
											{
												$status='Reschudle';
											}
											else
											{
												$status='Pending';
											}
?>
    
                        <tr>
                        
                            <td><?php echo $total_appot11->staff_name;?></td>
							<td><?php echo $total_appot11->patient_name; ?></td>
							
							<td><?php echo $total_appot11->patient_contact; ?></td>
							<td><?php echo $gender; ?></td>
							<td><?php echo $total_appot11->patient_age; ?></td>
							<td><?php echo $appo_datetime; ?></td>
							<td><?php echo $status; ?></td>
							
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
	
	public function income_report()
	{
		$this->load->view('report_income');
	}
	function income_reportaction()
	{
		$data=$this->input->post();
		$from=$data['app_from'];
		$to=$data['app_to'];
		$app_from= date("Y-m-d", strtotime($from));
		$app_to= date("Y-m-d", strtotime($to));
		$total_appot1=$this->myclass->select("income_id,income_refno,income_amt,income_desc,income_time","bs_income"," DATE(income_time) BETWEEN('$app_from') AND('$app_to') ORDER BY income_time");
		
		$total_appot1['app_from']=$app_from;
		$total_appot1['app_to']=$app_to;
		$app_data['app_data']=$total_appot1;
		$this->load->view('report_income_data',$app_data);
		
	}
	/*Export income report data*/
	public function export_income()
	{
		//echo $ans=$this->input->post();
		
		$data=$this->input->post();
		$from=$data['app_from'];
		$to=$data['app_to'];
		$app_from= date("Y-m-d", strtotime($from));
		$app_to= date("Y-m-d", strtotime($to));
		$total_appot1=$this->myclass->select("income_id,income_refno,income_amt,income_desc,income_time","bs_income"," DATE(income_time) BETWEEN('$app_from') AND('$app_to') ORDER BY income_time");
		$total_Amt=$this->myclass->select("sum(income_amt) as tot","bs_income"," DATE(income_time) BETWEEN('$app_from') AND('$app_to') ORDER BY income_time");
		$xls_filename = 'Income report-'.$app_from." To ".$app_to.'.xls';
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=$xls_filename");
		
		?><html>
                <h4>Income Report From - <?php echo $app_from." To ".$app_to;?></h4>
               <?php
						if(!is_array($total_appot1))
						{
							echo "<h4>Records not found!</h4>";
						}
						else
						{
						?>
                        <table id="dyntable" class="table table-bordered responsive">
						<colgroup>
                        <col class="con0" style="align: center; width: 20%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        
                    </colgroup>
                            <thead>
                                <tr>
									<th class="head1">Ref. No.</th>
									
									<th class="head1">Description</th>
                                    <th class="head0">Time</th>
									<th class="head1">Amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php
									foreach($total_appot1 as $patient_details)
									{
											
											$datetime=$patient_details->income_time;
											$appo_datetime=date("d-m-Y h:i A",strtotime($datetime));
											
											
									?>
									<tr>
									<td><?php echo $patient_details->income_refno; ?></td>
									
                                    <td><?php echo $patient_details->income_desc; ?></td>
                                    <td><?php echo $appo_datetime; ?></td>
									<td><?php echo 'Rs '. $patient_details->income_amt; ?>/-</td>
									</tr>
								<?php
									}
									
								?>
                                <tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><b>Total Amount</b></td>
                                    <td colspan="4"><b><?php echo 'Rs '. $total_Amt[0]->tot; ?>/-</b></td>
								</tr>
                                
                            </tbody>
                        </table>
                        <?php
						}
						?>
				<?php
	}
	
	public function expence_report()
	{
		$this->load->view('report_expence');
	}
	function expence_reportaction()
	{
		$data=$this->input->post();
		$from=$data['app_from'];
		$to=$data['app_to'];
		$app_from= date("Y-m-d", strtotime($from));
		$app_to= date("Y-m-d", strtotime($to));
		$total_appot1=$this->myclass->select("expn_id,expn_refno,expn_name,expn_amt,expn_desc,expn_time","bs_expences"," DATE(expn_time) BETWEEN('$app_from') AND('$app_to') ORDER BY expn_time");
		
		$total_appot1['app_from']=$app_from;
		$total_appot1['app_to']=$app_to;
		$app_data['app_data']=$total_appot1;
		$this->load->view('report_expence_data',$app_data);
		
	}
	/*Export expence report data*/
	public function export_expence()
	{
		//echo $ans=$this->input->post();
		
		$data=$this->input->post();
		$from=$data['app_from'];
		$to=$data['app_to'];
		$app_from= date("Y-m-d", strtotime($from));
		$app_to= date("Y-m-d", strtotime($to));
		$total_appot1=$this->myclass->select("expn_id,expn_refno,expn_name,expn_amt,expn_desc,expn_time","bs_expences"," DATE(expn_time) BETWEEN('$app_from') AND('$app_to') ORDER BY expn_time");
			
		$total_Amt=$this->myclass->select("sum(expn_amt) as tot","bs_expences"," DATE(expn_time) BETWEEN('$app_from') AND('$app_to') ORDER BY expn_time");
		$xls_filename = 'Expence report-'.$app_from." To ".$app_to.'.xls';
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=$xls_filename");
		
		?><html>
                <h4>Expence Report From - <?php echo $app_from." To ".$app_to;?></h4>
				<?php
               if(!is_array($total_appot1))
						{
							echo "<h4>Records not found!</h4>";
						}
						else
						{
						?>
                        <table id="dyntable" class="table table-bordered responsive">
						<colgroup>
                        <col class="con0" style="align: center; width: 20%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        
                    </colgroup>
                            <thead>
                                <tr>
									<th class="head1">Ref. No.</th>
									<th class="head1">Name</th>
									<th class="head1">Description</th>
                                    <th class="head0">Time</th>
									<th class="head1">Amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php
									foreach($total_appot1 as $patient_details)
									{
											
											$datetime=$patient_details->expn_time;
											$appo_datetime=date("d-m-Y h:i A",strtotime($datetime));
											
											
									?>
									<tr>
									<td><?php echo $patient_details->expn_refno; ?></td>
									<td><?php echo $patient_details->expn_name; ?></td>
                                    <td><?php echo $patient_details->expn_desc; ?></td>
                                    <td><?php echo $appo_datetime; ?></td>
									<td><?php echo 'Rs '. $patient_details->expn_amt; ?>/-</td>
									</tr>
								<?php
									}
									
								?>
                                <tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><b>Total Amount</b></td>
                                    <td colspan="4"><b><?php echo 'Rs '. $total_Amt[0]->tot; ?>/-</b></td>
								</tr>
                                
                            </tbody>
                        </table>
                        <?php
						}
						
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */