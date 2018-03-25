<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Drugs Registration</title>
<?php
echo my_file("style.default",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("apps_js/medical",2);
?>
</head>
<body>
<?php include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Clinic Management</a> <span class="separator"></span></li>
            <li>Add new medical</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
               
                <h1>Medical Registration</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widget">
			
                <h4 class="widgettitle">Add new medical </h4>
                <div class="widgetcontent">
                       <form class="stdform stdform2" id='medical_registration'>
					<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
						</div>
                             <p>
                                <label>Name</label>
                                <span class="field"><input type="text" name="med_name" id="firstname2" class="input-xxlarge" /></span>
                            </p>
                           
							
							<div class="par">
                            <p>
                                <label>Description</label>
                                <span class="field"><textarea cols="80" rows="5" name="med_desc" id="location2" class="span5"></textarea></span>
                            </p>
                            </div>
							 <p>
                                <label>Select Status</label>
                                <span class="field"><select name="med_status" id="selection2" class="uniformselect">
                                    <option value="">Choose One</option>
                                    <option value="1">Active</option>
                                    <option value="2">Deactive</option>
								</select></span>
                            </p>
							
							 <p class="stdformbutton">
                                <button type="button" class="btn btn-primary" id='btn_medical_registration'>Submit Button</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
							</div>
							
							
							
                            
                                                    
                           
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
			
<?php include_once('footer.php');?>			