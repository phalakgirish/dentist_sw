<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Staff Registration</title>
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

echo my_file("apps_js/staff",2);
?>


</head>
<body>
<?php include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Clinic Management</a> <span class="separator"></span></li>
            <li>Add new Staff</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
                 <h5>&nbsp;</h5>
                <h1>Staff Registration</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox">
			
                <h4 class="widgettitle">Registration </h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" id='staff_registration'>
					
					<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
						</div>
							<p>
                                <label>Select Type</label>
                                <span class="field">
								<select name="staff_type" id="selection2" class="uniformselect">
                                    <option value="">Choose One</option>
									<option value="1">Super Admin</option>
                                    <option value="2">Doctors</option>
                                    <option value="3">Sister</option>
									<option value="4">Office Boy</option>
                                </select></span>
                            </p>
                            <p>
                                <label>Name</label>
                                <span class="field"><input type="text" name="staff_name" id="firstname2" class="input-xxlarge" /></span>
                            </p>
                            <p>
                                <label>Mobile</label>
                                <span class="field"><input type="text" name="staff_mobile" id="lastname2" class="input-xxlarge" /></span>
                            </p>
                            <p>
                                <label>Email</label>
                                <span class="field"><input type="text" name="staff_email" id="email2" class="input-xxlarge" /></span>
                            </p>
							 <p>
                                <label>Login ID</label>
                                <span class="field"><input type="text" name="staff_loginid" id="email2" class="input-xxlarge" /></span>
                            </p>
							<p>
                                <label>Password</label>
                                <span class="field"><input type="password" name="staff_pws" id="email2" class="input-xxlarge" /></span>
                            </p>
                            <p>
                                <label>Select Clinic</label>
                                <span class="field">
								<?php
									$this->myclass->dropdown("clinic_id","clinic_name","bs_clinic","1","staff_clinic_id","uniformselect")
								?></span>
                            </p>
							
							<p>
                                <label>Select Status</label>
                                <span class="field">
								<select name="staff_status" id="selection2" class="uniformselect">
                                    <option value="">Choose One</option>
                                    <option value="1">Active</option>
                                    <option value="2">Deactive</option>
										
                                </select>
								</span>
                            </p>
							
							 <p class="stdformbutton">
                                <button type='button' class="btn btn-primary" id='btn_staff_registration'>Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
							</div>
							
							
                            
                                                    
                           
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
			
<?php include_once('footer.php');?>			