<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Patient Registration</title>

<?php
echo my_file("style.default",1);
echo my_file("bootstrap-fileupload.min",1);
echo my_file("bootstrap-timepicker.min",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("bootstrap.min",2);
echo my_file("bootstrap-fileupload.min",2);
echo my_file("bootstrap-timepicker.min",1);
echo my_file("jquery.uniform.min",2);
echo my_file("jquery.validate.min",2);
echo my_file("jquery.tagsinput.min",2);
echo my_file("jquery.autogrow-textarea",2);
echo my_file("charCount",2);
echo my_file("colorpicker",2);
echo my_file("ui.spinner.min",2);
echo my_file("chosen.jquery.min",2);
echo my_file("jquery.cookie",2);
echo my_file("modernizr.min",2);
echo my_file("jquery.slimscroll",2);
echo my_file("custom",2);

echo my_file("apps_js/patient",2);
echo my_file("forms",2);

//print_r($patient_id);
$appo_data=$this->myclass->select("appo_id,appo_datetime,patient_id,patient_name,appo_doctor_id,patient_contact,patient_gender","bs_appointment,bs_patient","appo_id='$patient_id' AND patient_id=appo_patient_id");
$doc_id=$appo_data[0]->appo_doctor_id;
$appo_id=$appo_data[0]->appo_id;

$patient_id=$appo_data[0]->patient_id;
$appo_datetime=$appo_data[0]->appo_datetime;
$timformate=explode(" ",$appo_datetime);

//print_r($timformate[1].$timformate[2]);
$appo_time=$timformate[1]." ".$timformate[2];
$date= date("m/d/Y", strtotime($appo_datetime));
if($appo_data[0]->patient_gender==1)
{
	$gender='1';
}
else
{
	$gender="2";
}

?>
</head>
<body>
<div id="mainwrapper" class="mainwrapper">
   <!-- header file include for navigation-->
<?php include_once('sidebar.php');?> 
      
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Patient Management</a> <span class="separator"></span></li>
            <li>Edit Appointment</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-calendar"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1> Edit Appointment</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox">
			
                <h4 class="widgettitle">Edit Appointment</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" id='get_appointment'>
					<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
					</div>
							<p>
                                <label>Select Doctors</label>
                                <span class="field">
								<?php
									$this->myclass->dropdown_selected1("staff_id","staff_name","bs_staff","1","appo_doctor_id","staff_id","staff_name","bs_staff","bs_appointment","staff_type!='3' AND staff_type!='4' AND staff_status='1' AND staff_id='$doc_id' AND 	appo_doctor_id=staff_id");
								?>
								</span>
                            </p>
                            
							<input type="hidden" name="appo_staff_id" value="<?php echo $staff_id; ?>" id="appo_staff_id" class="input-xxlarge" />
							<input type="hidden" name="appo_id" value="<?php echo $appo_id; ?>" id="appo_id" class="input-xxlarge" />
							<p>
							<input type="hidden" name="appo_patient_id" value="<?php echo $patient_id; ?>" id="appo_patient_id" class="input-xxlarge" />
                                <label>Name</label>
                                <span class="field"><input type="text" name="patient_name" readonly id="patient_name" value="<?php echo $appo_data[0]->patient_name;?>" class="input-xxlarge" /></span>
                            </p>
							<p>
                                <label>Mobile</label>
                                <span class="field"><input type="text" readonly value="<?php echo $appo_data[0]->patient_contact;?>" name="patient_contact" id="patient_contact" class="input-xxlarge" /></span>
                            </p>
							<p>
                                <label>Select Gender</label>
                                <span class="field">
								<select name="patient_gender" id="selection2" class="uniformselect">
                                    <option value="">Choose One</option>
                                    <option <?php if($gender=="1"){ echo "selected";} ?> value="1">Male</option>
                                    <option <?php if($gender=="2"){ echo "selected";} ?> value="2">Female</option>
									
                                </select></span>
                            </p>
                            
							  <div class="par">
                            <label>Appointment Date</label>
                            <span class="field"><input id="datepicker" type="text" value="<?php echo $date;?>" name="appo_date" class="input-small" /></span>
                        </div> 
                        
                        <div class="par">
                            <label>Appointment Time</label>
                            <span class="field">
							
							
							<select name='appo_time' id="selection2 appo_time" class="uniformselect">
                                    <option value="">Select</option>
									<option <?php if($appo_time=='06:00 AM'){ echo "selected";} ?> value="06:00 AM">06:00 AM</option>
                                    <option <?php if($appo_time=='06:15 AM'){ echo "selected";} ?> value="06:15 AM">06:15 AM</option>
									<option <?php if($appo_time=='06:30 AM'){ echo "selected";} ?> value="06:30 AM">06:30 AM</option>
									<option <?php if($appo_time=='07:00 AM'){ echo "selected";} ?> value="07:00 AM">07:00 AM</option>
									<option <?php if($appo_time=='07:15 AM'){ echo "selected";} ?> value="07:15 AM">07:15 AM</option>
									<option <?php if($appo_time=='07:30 AM'){ echo "selected";} ?> value="07:30 AM">07:30 AM</option>
									<option <?php if($appo_time=='08:00 AM'){ echo "selected";} ?> value="08:00 AM">08:00 AM</option>
									<option <?php if($appo_time=='08:15 AM'){ echo "selected";} ?> value="08:15 AM">08:15 AM</option>
									<option <?php if($appo_time=='08:30 AM'){ echo "selected";} ?> value="08:30 AM">08:30 AM</option>
									<option <?php if($appo_time=='09:00 AM'){ echo "selected";} ?> value="09:00 AM">09:00 AM</option>
									<option <?php if($appo_time=='09:15 AM'){ echo "selected";} ?> value="09:15 AM">09:15 AM</option>
									<option <?php if($appo_time=='09:30 AM'){ echo "selected";} ?> value="09:30 AM">09:30 AM</option>
									<option <?php if($appo_time=='10:00 AM'){ echo "selected";} ?> value="10:00 AM">10:00 AM</option>
									<option <?php if($appo_time=='10:15 AM'){ echo "selected";} ?> value="10:15 AM">10:15 AM</option>
									<option <?php if($appo_time=='10:30 AM'){ echo "selected";} ?> value="10:30 AM">10:30 AM</option>
									<option <?php if($appo_time=='11:00 AM'){ echo "selected";} ?> value="11:00 AM">11:00 AM</option>
									<option <?php if($appo_time=='11:15 AM'){ echo "selected";} ?> value="11:15 AM">11:15 AM</option>
									<option <?php if($appo_time=='11:30 AM'){ echo "selected";} ?> value="11:30 AM">11:30 AM</option>
									<option <?php if($appo_time=='12:00 PM'){ echo "selected";} ?> value="12:00 PM">12:00 PM</option>
									<option <?php if($appo_time=='12:15 PM'){ echo "selected";} ?> value="12:15 PM">12:15 PM</option>
									<option <?php if($appo_time=='12:30 PM'){ echo "selected";} ?> value="12:30 PM">12:30 PM</option>
									<option <?php if($appo_time=='01:00 PM'){ echo "selected";} ?> value="01:00 PM">01:00 PM</option>
									<option <?php if($appo_time=='01:15 PM'){ echo "selected";} ?> value="01:15 PM">01:15 PM</option>
									<option <?php if($appo_time=='01:30 PM'){ echo "selected";} ?> value="01:30 PM">01:30 PM</option>
									<option <?php if($appo_time=='02:00 PM'){ echo "selected";} ?> value="02:00 PM">02:00 PM</option>
									<option <?php if($appo_time=='02:15 PM'){ echo "selected";} ?> value="02:15 PM">02:15 PM</option>
									<option <?php if($appo_time=='02:30 PM'){ echo "selected";} ?> value="02:30 PM">02:30 PM</option>
									<option <?php if($appo_time=='03:00 PM'){ echo "selected";} ?> value="03:00 PM">03:00 PM</option>
									<option <?php if($appo_time=='03:15 PM'){ echo "selected";} ?> value="03:15 PM">03:15 PM</option>
									<option <?php if($appo_time=='03:30 PM'){ echo "selected";} ?> value="03:30 PM">03:30 PM</option>
									<option <?php if($appo_time=='04:00 PM'){ echo "selected";} ?> value="04:00 PM">04:00 PM</option>
									<option <?php if($appo_time=='04:15 PM'){ echo "selected";} ?> value="04:15 PM">04:15 PM</option>
									<option <?php if($appo_time=='04:30 PM'){ echo "selected";} ?> value="04:30 PM">04:30 PM</option>
									<option <?php if($appo_time=='05:00 PM'){ echo "selected";} ?> value="05:00 PM">05:00 PM</option>
									<option <?php if($appo_time=='05:15 PM'){ echo "selected";} ?> value="05:15 PM">05:15 PM</option>
									<option <?php if($appo_time=='05:30 PM'){ echo "selected";} ?> value="05:30 PM">05:30 PM</option>
									<option <?php if($appo_time=='06:00 PM'){ echo "selected";} ?> value="06:00 PM">06:00 PM</option>
									<option <?php if($appo_time=='06:15 PM'){ echo "selected";} ?> value="06:15 PM">06:15 PM</option>
									<option <?php if($appo_time=='06:30 PM'){ echo "selected";} ?> value="06:30 PM">06:30 PM</option>
									<option <?php if($appo_time=='07:00 PM'){ echo "selected";} ?> value="07:00 PM">07:00 PM</option>
									<option <?php if($appo_time=='07:15 PM'){ echo "selected";} ?> value="07:15 PM">07:15 PM</option>
									<option <?php if($appo_time=='07:30 PM'){ echo "selected";} ?> value="07:30 PM">07:30 PM</option>
									<option <?php if($appo_time=='08:00 PM'){ echo "selected";} ?> value="08:00 PM">08:00 PM</option>
									<option <?php if($appo_time=='08:15 PM'){ echo "selected";} ?> value="08:15 PM">08:15 PM</option>
									<option <?php if($appo_time=='08:30 PM'){ echo "selected";} ?> value="08:30 PM">08:30 PM</option>
									<option <?php if($appo_time=='09:00 PM'){ echo "selected";} ?> value="09:00 PM">09:00 PM</option>
									<option <?php if($appo_time=='09:15 PM'){ echo "selected";} ?> value="09:15 PM">09:15 PM</option>
									<option <?php if($appo_time=='09:30 PM'){ echo "selected";} ?> value="09:30 PM">09:30 PM</option>
									<option <?php if($appo_time=='10:00 PM'){ echo "selected";} ?> value="10:00 PM">10:00 PM</option>
									<option <?php if($appo_time=='10:15 PM'){ echo "selected";} ?> value="10:15 PM">10:15 PM</option>
									<option <?php if($appo_time=='10:30 PM'){ echo "selected";} ?> value="10:30 PM">10:30 PM</option>
									<option <?php if($appo_time=='11:00 PM'){ echo "selected";} ?> value="11:00 PM">11:00 PM</option>
									<option <?php if($appo_time=='11:15 PM'){ echo "selected";} ?> value="11:15 PM">11:15 PM</option>
									<option <?php if($appo_time=='11:30 PM'){ echo "selected";} ?> value="11:30 PM">11:30 PM</option>
									<option <?php if($appo_time=='12:00 AM'){ echo "selected";} ?> value="12:00 AM">12:00 AM</option>
								</select></span>
								
						</div>
						  <div class="par">
                            <label>Change Status</label>
                            <span class="field">
							<select name='appo_status' id="selection2 appo_status" class="uniformselect">
                                    <option value="">Select</option>
									<option value="1">Done</option>
                                    <option value="2">Cancel</option>
									<option value="3">Reshedule</option>
							</select>
							</span>
							</div>
						<p class="stdformbutton">
                                <button type='button' class="btn btn-primary" id='btn_edit_appointment'>Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
                    </form>
					 </div>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
            <?php include_once('footer.php');?>	
			