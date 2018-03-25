<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles- Clinic Registration</title>
<?php
echo my_file("style.default",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("modernizr.min",2);
echo my_file("bootstrap.min",2);
echo my_file("jquery.cookie",2);
echo my_file("jquery.uniform.min",2);
echo my_file("jquery.validate.min",2);
echo my_file("jquery.tagsinput.min",2);
echo my_file("custom",2);
echo my_file("apps_js/patient",2);


?>



</head>
<body>
<?php 

$session_data = $this->session->all_userdata();
$view_patientid=$session_data['view_patientid'];
$patient_name=$session_data['patient_name'];

$patient_name = str_replace("\'","'", $patient_name);

$process_history=$this->myclass->select("staff_name,process_name,p_rate,p_rate_discount,p_rate_amount,p_process_time","bs_patient_process,bs_staff,bs_procedure","p_process_staffid=staff_id AND p_processid=process_id AND p_process_patientid='$view_patientid'");
include_once('sidebar.php');


?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Patient Management</a> <span class="separator"></span></li>
            <li>Patient Procedure</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1>Patient Procedure</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
           <div class="maincontentinner">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <h3 class="subtitle2">Procedure  - For <?php echo $patient_name;?></h3>
                    <br />
					<form method="post" action="<?php echo base_url()."index.php/patient/process_action"; ?>">
                    <table class="table discussions">
                        <colgroup>
                            <col class="width60" />
                            <col class="width15" />
                            <col class="width10" />
                            <col class="width15" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Procedure Name</th>
                                <th>Rate</th>
                                <th>Discount in %</th>
                                <th>Amount</th>    
                            </tr>
                        </thead>
						<tbody>
						<?php
						$process=$this->myclass->select("process_id,process_name","bs_procedure","process_status=1");
							foreach($process as $process)
							{
							?>		
								 <tr>
                                <td><input type='checkbox' checked id="patient_processplan_id-<?php echo $process->process_id; ?>" name='patient_processplan_id[]' value='<?php echo $process->process_id; ?>'><?php echo $process->process_name;?></td>
                                <td><input type="number" name="patient_rate[]" id='rate-<?php echo $process->process_id; ?>' class="input-small "/></td>
								 <td><input type="number" name="patient_discount[]" id='discount-<?php echo $process->process_id; ?>' class="input-small"/></td>
                                <td><input type="number" name="patient_amount[]" id='amount-<?php echo $process->process_id; ?>' class="input-small amount"/></td>
                               
                            </tr>
							<?php
							}	
							?>
                        
                           
                            
                            </tbody>
							<thead>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><strong>Total<strong></td>
                                <td><strong>Rs.<strong><input type="number" name="patient_totamount" value="0" id='totalamt' class="input-small amount"/>	</td>    
                            </tr>
                        </thead>
                        </table>
                        <br /><br />
                       <p class="stdformbutton">
                                <button type='submit' class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>     
                     </form>
					 
					 <hr/>
					 
					 <h3 class="subtitle2">Procedure History</h3>
                    <br />
                    <table class="table discussions">
                        <colgroup>
                            <col class="width20" />
                            <col class="width15" />
                            <col class="width30" />
                            <col class="width15" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Treatement By</th>
                                <th>Date Time</th>
                                <th>Procedure Name </th>
                                <th>Rate</th>
								<th>Discount %</th>
								<th>Amount</th>								
                            </tr>
                        </thead>
                        <tbody>
							<?php
							if(is_array($process_history))
							{
							foreach($process_history as $history)
							{
								?>
								<tr>
									<td><?php echo $history->staff_name;?></td>
									<td><?php echo $history->p_process_time;?></td>
									<td><?php echo $history->process_name;?></td>
									<td><?php echo $history->p_rate;?></td>
									<td><?php echo $history->p_rate_discount;?></td>
									<td><?php echo $history->p_rate_amount;?></td>
								</tr>
								<?php
							}
							}
							?>
                            
                            </tbody>
                        </table>
                      <br /><br />
                  <form method="post" action="<?php echo base_url()."index.php/patient/export_procedure"; ?>">
					<input type='submit' id='export_procedure' class="btn btn-primary" value='Export Procedure Done'> 
</form>	          
                       
                            
                       
                </div><!--span9-->
                
            </div><!--row-fluid-->
            </div><!--maincontentinner-->
			
<?php include_once('footer.php');?>			