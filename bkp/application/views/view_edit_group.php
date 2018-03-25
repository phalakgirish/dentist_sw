<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Payment</title>
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
echo my_file("apps_js/app_group",2);
echo my_file("responsive-tables",1);
echo my_file("jquery.dataTables.min",2);
echo my_file("app_group",2);



$today=date('d-m-Y');
?>
</script>
</head>
<body>

<?php
include_once('sidebar.php');


if($data[0]->group_status==1)
{
	$selectenable='selected';
	$selecdisable='';
}
else
{
	$selectenable='';
	$selecdisable='selected';
}

?>	
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Account Management</a> <span class="separator"></span></li>
            <li>Edit Group</li>
            
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1>Edit Group</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<div class="maincontent">
				<div class="maincontentinner">
					
			
                
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Edit Group</h4>
                <div class="widgetcontent wc1">
                      <form id="form1" class="stdform" >
						<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
                          </div>
                        </div>
						<input type='hidden' name='group_id' value='<?php echo $data[0]->group_id; ?>'>
                            <div class="par control-group">
							<div class="control-group">
                                <label class="control-label" for="username">Group Name</label>
                                <div class="controls">
								<input type="text" name="group_name" id="group_name" class="input-large"  value='<?php echo $data[0]->group_name; ?>' />
								</div>
							</div>	
							
							
                            <div class="control-group">
                            <label>Select Status</label>
                            <span class="field">
                            <select name="group_status" class="uniformselect">
                            	<option value="">Choose One</option>
                                <option value="1" <?php echo $selectenable?>>Enable</option>
                                <option value="2" <?php echo $selecdisable?>>Disable</option>
                            </select>
                            </span>
							</div>
							<p class="stdformbutton">
							<input type="button" class="btn btn-primary" id="group_edit_btn" value='Submit'>
                                    <!--<button class="btn btn-primary" id="register_btn">Submit Button</button>-->
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
           
					
					
				</div><!--maincontentinner-->
			</div><!--maincontent-->
<?php include_once('footer.php');?>	        