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
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("bootstrap.min",2);
echo my_file("jquery.uniform.min",2);
echo my_file("jquery.validate.min",2);
echo my_file("jquery.tagsinput.min",2);
echo my_file("jquery.autogrow-textarea",2);


echo my_file("apps_js/drugs",2);
?>


</head>
<body>
<?php include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Clinic Management</a> <span class="separator"></span></li>
            <li>Add new drugs</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-leaf"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1>Drugs Registration</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox">
			
                <h4 class="widgettitle">Add new drugs </h4>
                <div class="widgetcontent nopadding">
                       <form class="stdform stdform2" id='new_drugs'>
					<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
						</div>
                            <p>
                                <label>Name</label>
                                <span class="field"><input type="text" name="drags_name" id="firstname2" class="input-xxlarge" /></span>
                            </p>
                            
                            <p>
                                <label>Drugs Type</label>
                                <span class="field">
								<?php
									$this->myclass->dropdown("dragstype_id","dragstype_name","bs_drags_type","1","drags_type","uniformselect")
								?>
								</span>
                            </p>
							
							<div class="par">
                            <p>
                                <label>Description <small>You can put your own description for this field here.</small></label>
                                <span class="field"><textarea cols="80" rows="5" name="drags_desc" id="location2" class="span5"></textarea></span>
                            </p>
                            </div>
							
							 <p class="stdformbutton">
                                <button type='button' class="btn btn-primary" id='btn_drugs_registration'>Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
							</div>
							
							
                            
                                                    
                           
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
			
<?php include_once('footer.php');?>			