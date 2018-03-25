<?php 
$drugs_data=$this->myclass->select("drags_id,drags_name,drags_type,drags_desc","bs_drags","drags_id='$edit_id' LIMIT 0,1");

$drags_type=$drugs_data[0]->drags_type;
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

echo my_file("chosen.jquery.min",2);



echo my_file("forms",2);
echo my_file("apps_js/drugs",2);
?>


</head>
<body>
<?php include_once('sidebar.php');?>  
    <div class="rightpanel">
		<ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Clinic Management</a> <span class="separator"></span></li>
            <li>Edit Drugs</li>
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1>Edit Drugs</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox">
			
                <h4 class="widgettitle">Edit Drugs </h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" id='new_drugs'>
					<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
						</div>
                           <p>
						   <input type="hidden" name="drags_id" value='<?php echo $drugs_data[0]->drags_id; ?>' id="drags_id" class="input-xxlarge" />
                                <label>Name</label>
                                <span class="field"><input type="text" name="drags_name" value="<?php echo $drugs_data[0]->drags_name ?>" id="firstname2" class="input-xxlarge" /></span>
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
                                <label>Description</label>
                                <span class="field"><textarea cols="80" rows="5" name="drags_desc" id="location2" class="span5"> <?php echo $drugs_data[0]->drags_desc ?></textarea></span>
                            </p>
                            </div>
                                                    
                            <p class="stdformbutton">
                                <button type='button' class="btn btn-primary" id='btn_edit_drugs'>Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
            	
<?php include_once('footer.php');?>			
