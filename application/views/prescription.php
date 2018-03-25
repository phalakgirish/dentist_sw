<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Prescription</title>
<?php
echo my_file("style.default",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("bootstrap.min",2);
echo my_file("jquery.uniform.min",2);
echo my_file("jquery.validate.min",2);
echo my_file("jquery.tagsinput.min",2);
echo my_file("jquery.autogrow-textarea",2);
echo my_file("custom",2);
echo my_file("jquery.cookie",2);
echo my_file("apps_js/procedure",2);
?>

</head>
<body>
<?php 
$session_data = $this->session->all_userdata();
$view_patientid=$session_data['view_patientid'];
$patient_name=$session_data['patient_name'];

include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Patient Management</a> <span class="separator"></span></li>
            <li>Prescription</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                 <h5>&nbsp;</h5>
                <h1>Prescription</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			
            <div class="widgetbox">
			
                <h4 class="widgettitle">Prescription</h4>
                <div class="widgetcontent nopadding">
                <form class="stdform stdform2" id="prescription-form" method="post" action="<?php echo base_url()."" ?>">
				<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
					</div>
				<?php
				if(isset($prescription_no))
				{
					
					?>
					<input type="hidden" name='prescription_no' value='<?php echo $prescription_no; ?>' id="spinner" name="" class="input-small input-spinner" />
					<?php
				}
				else
				{
					echo "Precription No. Invalid";
				}
				
				?>
				
								<p>
                                    <label>Drugs Name.</label>
									
                                    <span class="formwrapper">
                            	<select data-placeholder="Drugs Name..." name='prescription_drugid' id="prescription_drugid" style="width:350px" class="chzn-select" tabindex="2">
                                  <option value=""></option> 
								 <?php
									$drugs_name=$this->myclass->select("drags_id,drags_name","bs_drags","1");
									
									foreach($drugs_name as $drugs)
									{
										?>
											 <option value="<?php echo $drugs->drags_id;?>"><?php echo $drugs->drags_name;?></option> 
										<?php
									}
								  ?>
                                 
                                  
                                </select>
                            </span>
                                </p>
								<!--<p>
                                <label>Strength</label>
								
                                <span class="field"><input type="text" name='prescription_strength' id="prescription_strength" class="input-small" />
								<select id="selection2" name='prescription_strength_unit' class="uniformselect">
                                    <option value="">Choose One</option>
                                    <option value="Mg">Mg</option>
                                    <option value="Gm">Gm</option>
									<option value="Ml">Ml</option>
									<option value="Units">Units</option>
								</select></span>
								</p>-->
								<p>
                                <label>Duration</label>
                                 <span class="field"><input type="text" id="prescription_duration"  name='prescription_duration' class="input-small input-spinner" />
									<select  id="selection2" name='prescription_duration_unit' class="uniformselect">
                                    <option value="">Choose One</option>
                                    <option value="Day">Day</option>
                                    <option value="Week">Week</option>
									<option value="Months">Months</option>
									<option value="SOS">SOS</option>
								</select></span>
								</p>
								<p>
                                    <label>Morning</label>
                                    <span class="field"><input type="text" name='prescription_moring' id="prescription_moring " class="input-small input-spinner" />
									</span>
                                </p>
								<p>
                                    <label>Noon</label>
                                    <span class="field"><input type="text" name='prescription_noon' id="prescription_noon"  class="input-small input-spinner" />
									</span>
                                </p>
								<p>
                                    <label>Night</label>
                                    <span class="field"><input type="text" id="prescription_night" name='prescription_night' class="input-small input-spinner" />
									</span>
                                </p>
                               <p>
								<label>Instruction</label>
								<span class="formwrapper">
									<input type="radio" name="prescription_instruction" value="Before Food" /> Before Food &nbsp; &nbsp;
									<input type="radio" name="prescription_instruction" checked="checked"  value="After Food"/> After Food &nbsp; &nbsp;
									
								</span>
								</p>
								
                               <p class="stdformbutton">
							   <span class="field">
                                <input type="button" value="Submit" class="btn btn-primary" id="prescription">
                                        </ul>
								</span>
                               </p>
							
                            
                                                    
                           
                    </form>
					
					<!--
					  <table class="table discussions">
                        <colgroup>
                            <col class="width40" />
                            <col class="width25" />
                            <col class="width20" />
                            <col class="width25" />
                        </colgroup>
                        <thead>
                            <tr>
								<th>Drug Name</th>
								<th>Strength</th>
                                <th>Duration</th>
                                <th>Frequency</th>
                                <th>Instruction</th> 
								<th>Option</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$prescribe=$this->myclass->select("drags_name,prescription_strength,prescription_strength_unit,prescription_duration,prescription_duration_unit,prescription_moring,prescription_noon,prescription_night,prescription_instruction","bs_drags, bs_prescription","prescription_patient_id='$view_patientid' AND prescription_drugid=drags_id AND prescription_no='$prescription_no'");
							if(is_array($prescribe))
							{
								foreach($prescribe as $prescribe)
								{
									?>
									<tr>
										<td><?php echo $prescribe->drags_name;?></td>
										<td><?php echo $prescribe->prescription_strength."". $prescribe->prescription_strength_unit; ?></td>
										<td><?php echo $prescribe->prescription_duration."".  $prescribe->prescription_duration_unit;;?></td>
										<td><?php echo $prescribe->prescription_moring."-". $prescribe->prescription_noon."-".$prescribe->prescription_night;?></td>
										<td><?php echo $prescribe->prescription_instruction;?></td>
										<td><a href='<?php echo base_url();?>index.php/patient/print_prescription/<?php echo $view_patientid;?>' class=" icon-print" title='Print Receipt'></i></a>&nbsp;&nbsp;&nbsp;</td>
									</tr>
									<?php
								}
							}
							else
							{
								echo "No prescription history";
							}
							?>
                        </tbody>
						
							<thead>
                            
                        </thead>
                        </table>
					-->	
                </div><!--widgetcontent-->
            </div><!--widget-->
			
<?php include_once('footer.php');?>			