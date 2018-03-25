<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Clinic Registration</title>
<?php
echo my_file("style.default",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("bootstrap.min",2);
echo my_file("jquery.uniform.min",2);
echo my_file("jquery.cookie",2);
echo my_file("modernizr.min",2);
echo my_file("jquery.smartWizard.min",2);
echo my_file("jquery.slimscroll",2);
echo my_file("custom",2);
echo my_file("ckeditor",3);

$session_data = $this->session->all_userdata();
$view_patientid=$session_data['view_patientid'];
$patient_name=$session_data['patient_name'];
$patient_details=$this->myclass->select("patient_id,patient_name,patient_gender,patient_contact,patient_email,patient_age,patient_add,patient_tel_res,patient_office_add,patient_off_tel,patient_age,patient_dob,patient_blood,patient_maritial,patient_profession,patient_ref,patient_family_doc,patient_family_doc_add,patient_family_doc_tel,patient_pregnant,patient_pregnant_due_dt,patient_nurcing_child,patient_pan_masala,patient_tobacco,patient_smoking,patient_no_cigarattes,patient_medicine","bs_patient","patient_id='$view_patientid' LIMIT 1");

/*echo"<pre>";
print_r($patient_details[0]->patient_name);
echo"</pre>";
exit;
*/
?>
<script type="text/javascript">
jQuery(document).ready(function(){
    
    // Smart Wizard 	
    jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
    jQuery('#wizard2').smartWizard({onFinish: onFinishCallback});
    jQuery('#wizard3').smartWizard({onFinish: onFinishCallback});
		
    function onFinishCallback(){
        alert('Finish Clicked');
    } 
			
    jQuery('select, input:checkbox').uniform();
    
});
</script>
<script type="text/javascript">
   window.onload = function() {
        CKEDITOR.replace( 'editor1' );
         CKEDITOR.replace( 'editor2' );
          CKEDITOR.replace( 'editor3' );
           CKEDITOR.replace( 'editor4' );
            CKEDITOR.replace( 'editor5' );
    };
</script>
<link href="<?php echo base_url();?>public/css1/datepicker.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url();?>public/js1/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css1/bootstrap-datepicker.css" />
</head>
<body>
<?php include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Patient Management</a> <span class="separator"></span></li>
            <li>Patient Details</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1>Patient Details</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"><?php echo validation_errors(); ?></span>
							</div>
					</div>
                    	
                    <!-- START OF TABBED WIZARD -->
                    <h4 class="subtitle2">&nbsp;</h4>
                    <br />
                    <form class="stdform " method="post" action="<?php echo base_url()."index.php/patient/patient_update_info/"; ?>">
					
                    <div id="wizard3" class="wizard tabbedwizard">
					
                        <ul class="tabbedmenu">
                            <li>
                            	<a href="#wiz3step1">
                                	<span class="h2">STEP 1</span>
                                    <span class="label">Basic Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz3step2">
                                	<span class="h2">STEP 2</span>
                                    <span class="label">Medical Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz3step3">
                                	<span class="h2">STEP 3</span>
                                    <span class="label">Dental Information</span>
                                </a>
                            </li>
                        </ul>
                        
                        	
                        <div id="wiz3step1" class="formwiz">
                        	<h4>Step 1: Basic Information</h4>
								<?php
								$name=$patient_details[0]->patient_name;
								$patient_name = str_replace("\'","'", $name);	
								?>
								 <input type="hidden" value="<?php echo $patient_details[0]->patient_id;?>" name="patient_id">
                                <p>
                                    <label>Name</label>
                                    <input type="text" value="<?php	echo $patient_name;?>">
                                </p>
                                
                                <p>
                                    <label>Address</label>
                                    <span class="field"><textarea cols="80" rows="5" class="span6" name="patient_add" ><?php echo set_value("patient_add"); echo $patient_details[0]->patient_add;?> </textarea></span>
                                </p>
								<p>
                                    <label>Telephone No. Res</label>
                                    <span class="field"><input type="text" name="patient_tel_res" value="<?php if(isset($patient_details[0]->patient_tel_res)){ echo $patient_details[0]->patient_tel_res; } else { echo set_value("patient_tel_res"); }?>"  class="input-xxlarge" /></span>
                            </p> 
							<p>
                                    <label>Mobile No.</label>
                                    <span class="field">
									<input type="text" name="patient_contact"  value='<?php	echo $patient_details[0]->patient_contact;?>' class="input-xxlarge" /></span>
                            </p>
							<p>
                                    <label>Email.</label>
                                    <span class="field">
									<input type="text" name="patient_email"  value='<?php if(isset($patient_details[0]->patient_email)){ echo $patient_details[0]->patient_email; } else { echo set_value("patient_email"); }?>' class="input-xxlarge" /></span>
                            </p>
							<p>
                                    <label>Offce Address</label>
                                    <span class="field"><textarea cols="80" rows="5" class="span6" value="<?php echo set_value("patient_office_add")?>"   name="patient_office_add"> <?php echo set_value("patient_office_add"); echo $patient_details[0]->patient_office_add;?> </textarea></span>
                            </p>
							<p>
                                    <label>Office Telephone No.</label>
                                    <span class="field"><input type="text" name="patient_off_tel" value="<?php if(isset($patient_details[0]->patient_off_tel)){ echo $patient_details[0]->patient_off_tel; } else { echo set_value("patient_off_tel"); }?>" class="input-xxlarge" /></span>
                            </p>
                                 
                                <p>
                                    <label>Gender</label>
                                    <span class="field"><select name="patient_gender" class="uniformselect">
                                        <option value="">Choose One</option>
                                        <option <?php if($gender=$patient_details[0]->patient_gender=='1'){ echo "selected";} ?> value="1">Male</option>
                                        <option <?php if($gender=$patient_details[0]->patient_gender=='2'){ echo "selected";} ?> value="2">Female</option>
                                    </select></span>
                                </p>
								<p>
                                    <label>Age</label>
                                    <span class="field"><input type="text" name="patient_age" value="<?php if(isset($patient_details[0]->patient_age)){ echo $patient_details[0]->patient_age; } else { echo set_value("patient_age"); }?>" class="input-xxlarge" /></span>
                                </p>
                                <p>
                                    <label>Aadhar Card No</label>
                                    <span class="field"><input type="text" name="patient_addhar" value="<?php if(isset($patient_details[0]->patient_addhar)){ echo $patient_details[0]->patient_addhar; } else { echo set_value("patient_addhar"); }?>" class="input-xxlarge" /></span>
                                </p>
                                <p>
                                    <label>PAN Card No</label>
                                    <span class="field"><input type="text" name="patient_pan" value="<?php if(isset($patient_details[0]->patient_pan)){ echo $patient_details[0]->patient_pan; } else { echo set_value("patient_pan"); }?>" class="input-xxlarge" /></span>
                                </p>
								 <div class="par">
								<?php
									//echo $patient_details[0]->patient_dob;
									if(isset($patient_details[0]->patient_dob))
									{
									$patient_details[0]->patient_dob;
									$date_array=explode("-",$patient_details[0]->patient_dob);
									$dob=$date_array[2]."/".$date_array[1]."/".$date_array[0];
									}
									
									if(isset($patient_details[0]->patient_blood))
									{	
										$blood_group=$patient_details[0]->patient_blood;
									}
									else
									{
										$blood_group="";
									}
									
									if(isset($patient_details[0]->patient_maritial))
									{	
										$patient_maritial=$patient_details[0]->patient_maritial;
									}
									else
									{
										$patient_maritial="";
									}
								
								?>	
                            <label>Date of Birth</label>
                            <span class="field">
							<input type="text" name="patient_dob"  class="form-control1 des-city" placeholder="dd/mm/yy" value="<?php if(isset($dob)){ echo $dob; } else { echo set_value("patient_dob"); }?>" id="dp2">
							</span>
							</div> 
							
								 <p>
                                    <label>Blood Group</label>
                                    <span class="field"><select name="patient_blood" class="uniformselect">
                                        <option <?php if($blood_group==""){ echo $selected="selected";} ?> value="">Choose One</option>
                                        <option <?php if($blood_group=="A+"){ echo $selected="selected";} ?> value="A+">A+</option>
                                        <option <?php if($blood_group=="A-"){ echo $selected="selected";} ?> value="A-">A-</option>
										<option <?php if($blood_group=="B+"){ echo $selected="selected";} ?> value="B+">B+</option>
										<option <?php if($blood_group=="B-"){ echo $selected="selected";} ?> value="B-">B-</option>
										<option <?php if($blood_group=="AB+"){ echo $selected="selected";} ?> value="AB+">AB+</option>
										<option <?php if($blood_group=="AB-"){ echo $selected="selected";} ?> value="AB-">AB-</option>
										<option <?php if($blood_group=="O+"){ echo $selected="selected";} ?> value="O+">O+</option>
										<option <?php if($blood_group=="O-"){ echo $selected="selected";} ?> value="O-">O-</option>
                                    </select></span>
                                </p>
                              <p>
                                    <label>Maritial Status</label>
                                    <span class="formwrapper">
										<input type="radio" <?php if($patient_maritial=="0"){ echo $selected="checked";} ?> name="patient_maritial" value="0"/>Single
										<input type="radio" <?php if($patient_maritial=="1"){ echo $selected="checked";} ?> name="patient_maritial" value="1"  />Married
									</span>
                                </p> 
							<p>
                                    <label>Profession</label>
                                    <span class="field"><input type="text" name="patient_profession" value="<?php if(isset($patient_details[0]->patient_profession)){ echo $patient_details[0]->patient_profession; } else { echo set_value("patient_profession"); }?>" class="input-xxlarge" /></span>
                            </p> 	
                        	
							
							<p>
                                    <label>Refered By:</label>
                                    <span class="field"><input type="text" name="patient_ref" value="<?php if(isset($patient_details[0]->patient_ref)){ echo $patient_details[0]->patient_ref; } else { echo set_value("patient_ref"); }?>" class="input-xxlarge" /></span>
                            </p>
                            
                        </div><!--#wiz13tep1-->
                        
                        <div id="wiz3step2" class="formwiz">
                        	<h4>Step 2: Medical Information</h4> 
                            
                                <p>
                                    <label>Family Doctor's Name</label>
                                    <span class="field"><input type="text" name="patient_family_doc" value="<?php if(isset($patient_details[0]->patient_family_doc)){ echo $patient_details[0]->patient_family_doc; } else { echo set_value("patient_family_doc"); }?>" class="input-xxlarge" /></span>
                                </p>
								
                                <p>
                                    <label>Address</label>
                                    <span class="field"><textarea cols="80" rows="5" class="span6" name="patient_family_doc_add" ><?php if(isset($patient_details[0]->patient_family_doc_add)){ echo $patient_details[0]->patient_family_doc_add;} else { echo set_value("patient_family_doc_add"); }?></textarea></span>
                                </p>
								<p>
                                    <label>Telephone No.</label>
                                    <span class="field"><input type="text" name="patient_family_doc_tel" value="<?php if(isset($patient_details[0]->patient_family_doc_tel)){ echo $patient_details[0]->patient_family_doc_tel; } else { echo set_value("patient_family_doc_tel"); }?>"  class="input-xxlarge" /></span>
                                </p>
								
								<p>
                                    <label>Have You ever suffered from any of the following? </label>
                                    
                                </p>
								<p>
							<?php	
                            $medical_history=$this->myclass->select("med_id,med_name","bs_medical","med_status=1");
							foreach($medical_history as $history)
							{		
								
							?>
                            <span class="formwrapper">
                            	<input type="checkbox" name="suffer_medical_id[]" value='<?php echo $history->med_id;?>' /><?php echo $history->med_name;?> &nbsp; &nbsp;
                            	
                            </span>
							<?php
							}
							?>
							</p>
							<label>Are you pregnant? </label>
							<span class="formwrapper">
								<input type="radio" name="patient_pregnant" <?php if($patient_details[0]->patient_pregnant=="1"){ echo $selected="checked";} ?> value='1' /> Yes &nbsp; &nbsp;
                            	<input type="radio" name="patient_pregnant" <?php if($patient_details[0]->patient_pregnant=="0"){ echo $selected="checked";} ?> value='0' checked />No &nbsp; &nbsp;
                                
                            </span>
							<label>If yes,your due date?</label>
<input type="text" name="patient_pregnant_due_dt" value="<?php if(isset($patient_details[0]->patient_pregnant_due_dt)){ echo $patient_details[0]->patient_pregnant_due_dt; } else { echo set_value("patient_pregnant_due_dt"); }?>" class="input-small" />
							</p>
							<p>
							<label>Are you nursing a child? </label>
                            <span class="formwrapper">
								<input type="radio" name="patient_nurcing_child" <?php if($patient_details[0]->patient_nurcing_child=="1"){ echo $selected="checked";} ?> value='1' /> Yes &nbsp; &nbsp;
                            	<input type="radio" name="patient_nurcing_child"  <?php if($patient_details[0]->patient_nurcing_child=="0"){ echo $selected="checked";} ?> value='0' checked />No &nbsp; &nbsp;
                                
                            </span>
							</p>
							<p>
							<label>Habit -</label>
							</p><br/>
							<p>
							<label>Pan Masala Chewing? </label>
                            <span class="formwrapper">
								<input type="radio" name="patient_pan_masala" <?php if($patient_details[0]->patient_pan_masala=="1"){ echo $selected="checked";} ?>  value='1' /> Yes &nbsp; &nbsp;
                            	<input type="radio" name="patient_pan_masala" <?php if($patient_details[0]->patient_pan_masala=="0"){ echo $selected="checked";} ?> value='0' checked />No &nbsp; &nbsp;
                                
                            </span>
							</p>
							<p>
							<label>Pan Chewing Tobacco? </label>
                            <span class="formwrapper">
								<input type="radio" name="patient_tobacco" <?php if($patient_details[0]->patient_tobacco=="1"){ echo $selected="checked";} ?> value='1' /> Yes &nbsp; &nbsp;
                            	<input type="radio" name="patient_tobacco" <?php if($patient_details[0]->patient_tobacco=="0"){ echo $selected="checked";} ?> value='0' checked />No &nbsp; &nbsp;
                                
                            </span>
							</p>
							<p>
							<label>Smoking </label>
                            <span class="formwrapper">
			<input type="radio" name="patient_smoking" <?php if($patient_details[0]->patient_smoking=="1"){ echo $selected="checked";} ?> value='1' /> Yes &nbsp; &nbsp;
              <input type="radio" name="patient_smoking" <?php if($patient_details[0]->patient_smoking=="2"){ echo $selected="checked";} ?> value='2' checked />No &nbsp; &nbsp;
                                
                            </span>
							</p>
							<p>
							<label>How many cigarettes in a day? </label>
                            <span class="formwrapper">
								<input type="text" name="patient_no_cigarattes" value="<?php if(isset($patient_details[0]->patient_no_cigarattes)){ echo $patient_details[0]->patient_no_cigarattes; } else { echo set_value("patient_no_cigarattes"); }?>" class="input-xxlarge" />
                                
                            </span>
							</p>
							<p>
							<label>List the medicines you are taking currently </label>
                            <span class="formwrapper">
								<textarea cols="80" rows="5" class="span6" name="patient_medicine"><?php if(isset($patient_details[0]->patient_medicine)){ echo $patient_details[0]->patient_medicine;} else { echo set_value("patient_medicine"); }?></textarea>
                                
                            </span>
							</p>
							<p>
							<label>Allergies </label>
                            <span class="formwrapper">
								<input type="checkbox" name="allergy_allerty_id[]" value='1' /> Food &nbsp; &nbsp;
                            	<input type="checkbox" name="allergy_allerty_id[]" value='2' />Penicillin &nbsp; &nbsp;
								<input type="checkbox" name="allergy_allerty_id[]" value='3' />Sulfa &nbsp; &nbsp;
								<input type="checkbox" name="allergy_allerty_id[]" value='4' />Aspirin &nbsp; &nbsp;
								<input type="checkbox" name="allergy_allerty_id[]" value='5' />Iodine &nbsp; &nbsp;
								<input type="checkbox" name="allergy_allerty_id[]" value='6' />Local Anaesthetic &nbsp; &nbsp;
								<input type="checkbox" name="allergy_allerty_id[]" value='7' />any other &nbsp; &nbsp;
                                
                            </span>
							</p>
                                                                                               
                        </div><!--#wiz3step2-->
                        
                        <div id="wiz3step3">
                        	<h4>Step 3: Dental Information</h4>
                            <p>
                                    <label>What is you main complaint?</label>
                                    <span class="field"><textarea cols="80" rows="5" class="span6" name="complaint_des"><?php echo set_value("complaint_des")?></textarea></span>
                            </p>
							<p>
                                    <label>List any dental treatment done in the last one year</label>
                                    <span class="field"><textarea cols="80" rows="5" class="span6" name="complaint_last_year"><?php echo set_value("complaint_last_year")?></textarea></span>
                            </p>
							<p class="stdformbutton">
                                <button type='submit' class="btn btn-primary" id='btn_get_appointment'>Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
                        </div><!--#wiz3step3-->
                        
                    </div><!--#wizard-->
                    </form>
                                        
                    <!-- END OF TABBED WIZARD -->
                
			
			<script src="<?php echo base_url();?>public/js1/bootstrap-datepicker.js"></script>
			  
			
<script>



		jQuery(function(){
			window.prettyPrint && prettyPrint();
			jQuery('#dp1').datepicker({
				format: 'yyyy-mm-dd'
			});
			jQuery('#dp2').datepicker();
          jQuery('#dp6').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() < startDate.valueOf()){
            jQuery('#alert').show().find('strong').text('The end date can not be less then the start date');
          } else {
            jQuery('#alert').hide();
            endDate = new Date(ev.date);
            jQuery('#endDate').text($('#dp6').data('date'));
          }
          jQuery('#dp6').datepicker('hide');
        });
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
	</script>
<?php include_once('footer.php');?>			