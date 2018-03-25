<?php 
$staff_data=$this->myclass->select("staff_id,clinic_name,staff_clinic_id,staff_name,staff_status,staff_mobile,staff_email,staff_type,staff_loginid","bs_clinic,bs_staff","staff_id='$edit_id' AND staff_clinic_id=clinic_id LIMIT 0,1");

$status=$staff_data[0]->staff_status;
if($status==1)
{
	$selectenable='selected';
	$selecdisable='';
}
else
{
	$selectenable='';
	$selecdisable='selected';
}

$staff_type=$staff_data[0]->staff_type;
if($staff_type==1)
{
	$doctors='selected';
	$sister='';
	$officeboy='';
	$blank='';
}
else if($staff_type==2)
{
	$doctors='';
	$sister='selected';
	$officeboy='';
	$blank='';
}
else if($staff_type==3)
{
	$doctors='';
	$sister='';
	$officeboy='selected';
	$blank='';
}
else
{
	$doctors='';
	$sister='';
	$officeboy='';
	$blank='selected';
}
$staff_clinic_id=$staff_data[0]->staff_clinic_id;
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Clinic Registration</title>
<?php
echo my_file("style.default",1);
echo my_file("bootstrap-fileupload.min",1);
echo my_file("bootstrap-timepicker.min",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("bootstrap.min",2);
echo my_file("bootstrap-fileupload.min",2);
echo my_file("bootstrap-timepicker.min",2);
echo my_file("jquery.uniform.min",2);
echo my_file("jquery.validate.min",2);
echo my_file("jquery.tagsinput.min",2);
echo my_file("jquery.autogrow-textarea",2);
echo my_file("charCount",2);
echo my_file("colorpicker",2);
echo my_file("ui.spinner.min",2);
echo my_file("chosen.jquery.min",2);
echo my_file("jquery.cookie",2);
echo my_file("ui.spinner.min",2);
echo my_file("chosen.jquery.min",2);
echo my_file("jquery.cookie",2);
echo my_file("modernizr.min",2);
echo my_file("jquery.slimscroll",2);
echo my_file("custom",2);
echo my_file("forms",2);
echo my_file("apps_js/staff",2);
?>


</head>
<body>
<?php include_once('sidebar.php');?>  
    <div class="rightpanel">
		<ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Clinic Management</a> <span class="separator"></span></li>
            <li>Edit Staff</li>
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>Forms</h5>
                <h1>Edit Staff</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox box-inverse">
			
                <h4 class="widgettitle">Edit Staff </h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" id='staff_edit'>
					<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
						</div>
							<p>
                                <label>Select Type</label>
                                <span class="field">
								<select name="staff_type" id="selection2" class="uniformselect">
                                    <option <?php echo $blank; ?> value="">Choose One</option>
                                    <option <?php echo $doctors; ?> value="1">Doctors</option>
                                    <option <?php echo $sister; ?> value="2">Sister</option>
									<option  <?php echo $officeboy; ?>value="3">Office Boy</option>
                                </select></span>
                            </p>
							
                            <p>
								<input type="hidden" name="staff_id" value='<?php echo $staff_data[0]->staff_id; ?>' id="staff_id" class="input-xxlarge" />
                                <label>Name</label>
                                <span class="field"><input type="text" name="staff_name" value='<?php echo $staff_data[0]->staff_name; ?>' id="staff_name" class="input-xxlarge" /></span>
                            </p>
                            
                            <p>
                                <label>Mobile</label>
                                <span class="field"><input type="text" name="staff_mobile" value='<?php echo $staff_data[0]->staff_mobile; ?>' id="staff_mobile" class="input-xxlarge" /></span>
                            </p>
                           
                            <p>
                                <label>Email</label>
                                <span class="field"><input type="text" name="staff_email" value='<?php echo $staff_data[0]->staff_email; ?>' id="staff_email" class="input-xxlarge" /></span>
                            </p>
							 <p>
                                <label>Login ID</label>
                                <span class="field"><input type="text" name="staff_loginid" value='<?php echo $staff_data[0]->staff_loginid; ?>' id="staff_loginid" class="input-xxlarge" /></span>
                            </p>
							<p>
                                <label>Clinic</label>
                                <span class="field">
								<?php
									$this->myclass->dropdown("clinic_id","clinic_name","bs_clinic","1","staff_clinic_id","uniformselect")
								?></span>
                            </p>
                            <p>
                                <label>Select Status</label>
                                <span class="field">
								<select name="staff_status" id="selection2" class="uniformselect">
                                    <option <?php echo $selectenable; ?> value="1">Active</option>
                                    <option <?php echo $selecdisable; ?> value="2">Deactive</option>
										
                                </select>
								</span>
                            </p>
                                                    
                            <p class="stdformbutton">
                                <button type='button' class="btn btn-primary" id='btn_staff_edit'>Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
            	
<?php include_once('footer.php');?>			
