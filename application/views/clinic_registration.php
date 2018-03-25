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
echo my_file("jquery.validate.min",2);
echo my_file("jquery.tagsinput.min",2);
echo my_file("jquery.autogrow-textarea",2);

echo my_file("apps_js/clinic",2);
?>


</head>
<body>
<?php include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Clinic Management</a> <span class="separator"></span></li>
            <li>Add new clinic</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1>Clinic Registration</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox ">
			
                <h4 class="widgettitle">Add new clinic </h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" id='clinic_registration'>
					<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
						</div>
                            <p>
                                <label>Name</label>
                                <span class="field"><input type="text" name="clinic_name" id="clinic_name" class="input-xxlarge" /></span>
                            </p>
                            
                            <p>
                                <label>Contact Person</label>
                                <span class="field"><input type="text" name="clinic_con_person" id="clinic_con_person" class="input-xxlarge" /></span>
                            </p>
                            <p>
                                <label>Contact Person Mobile</label>
                                <span class="field"><input type="text" name="clinic_mobile" id="clinic_mobile" class="input-xxlarge" /></span>
                            </p>
                            <p>
                                <label>Email</label>
                                <span class="field"><input type="text" name="clinic_email" id="clinic_email" class="input-xxlarge" /></span>
                            </p>
                             <p>
                                <label>Select Location</label>
                                <span class="field">
								<?php
									$this->myclass->dropdown("loc_id","loc_name","bs_location","1","clinic_locid","uniformselect")
								?></span>
                            </p>
							<!--
                            <p>
                                <label>Description <small>You can put your own description for this field here.</small></label>
                                <span class="field"><textarea cols="80" rows="5" name="location" id="location2" class="span5"></textarea></span>
                            </p>
                            -->
                            <p>
                                <label>Select Status</label>
                                <span class="field">
								<select name="clinic_status" id="selection2" class="uniformselect">
                                    <option value="">Choose One</option>
                                    <option value="1">Active</option>
                                    <option value="2">Deactive</option>
										
                                </select>
								</span>
                            </p>
                                                    
                            <p class="stdformbutton">
                                <button type='button' class="btn btn-primary" id='btn_clinic_registration'>Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
			
<?php include_once('footer.php');?>			