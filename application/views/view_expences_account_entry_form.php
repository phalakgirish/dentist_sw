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

$today=date('d-m-Y');
include_once('sidebar.php');

?>	
</head>
<body>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Account Management</a> <span class="separator"></span></li>
            <li>Expences Entry</li>
            
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1>Expences Entry</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<div class="maincontent">
				<div class="maincontentinner">
					
			
                
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Expences Entry</h4>
                <div class="widgetcontent wc1">
                      <form id="form1" class="stdform" >
						<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
                          </div>
                        </div>
                            <div class="par control-group">
							<div class="control-group">
                                <label class="control-label" for="username">Reference No.</label>
                                <div class="controls">
								<input type="text" name="expn_refno" id="expn_refno" class="input-large" />
								</div>
							</div>
							
							<div class="control-group">
                                <label class="control-label" for="username">Select SubGroup</label>
                                <div class="controls">
                                <div id="product_list">
                                <?php 
                                
                                $this->myclass->dropdown("subgroup_id","sub_groupname","bs_subgroup","subgroup_groupid=2","expn_exptype","uniformselect");
                                    //dropdown($field1,$field2,$table,$condition,$name,$class);
								?>
                                </div>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" for="username">Name</label>
                                <div class="controls">
								<input type="text" name="expn_name" id="expn_name" class="input-large" />
								</div>
							</div>
							<div class="control-group">
                                <label class="control-label" for="username">Enter Amount</label>
                                <div class="controls">
								<input type="text" name="expn_amt" id="expn_amt" class="input-large" />
								</div>
							</div>	
							<div class="control-group">
                                <label class="control-label" for="username">Description</label>
                                <div class="controls">
								<textarea id="expn_desc" name="expn_desc"></textarea>
								</div>
							</div>
							
                            
							<p class="stdformbutton">
							<input type="button" class="btn btn-primary" id="expn_register_btn" value='Submit'>
                                    <!--<button class="btn btn-primary" id="register_btn">Submit Button</button>-->
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
           
					
					
				</div><!--maincontentinner-->
			</div><!--maincontent-->
        