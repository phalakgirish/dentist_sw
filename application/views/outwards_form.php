<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Payment</title>
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
echo my_file("apps_js/inventory",2);
echo my_file("forms",2);
$today=date('d-m-Y');
?>
</head>
<body>


<?php
include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="#"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Inventory Management</a> <span class="separator"></span></li>
            <li>New Outwards</li>
            
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-beaker"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1>New Outwards</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<div class="maincontent">
				<div class="maincontentinner">
					
			
                
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Add Outwards</h4>
                <div class="widgetcontent wc1">
                      <form id="form1" class="stdform" >
						<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
                          </div>
                        </div>
                            <div class="par control-group">
							<div class="control-group">
                                <label class="control-label" for="username">Select Item</label>
                                <div class="controls">
                                   <?php
                                   $this->myclass->dropdown("drags_id","drags_name","bs_drags,bs_inventory","invt_product=drags_id group by drags_id",'out_product',"uniformselect")
                                   ?> 
                                </div>
							</div>	
							
                            <div class="control-group">
                                <label class="control-label" for="username">Avalibale Quantity</label>
                                <div class="controls">
                                <input type="text" name="out_totqty" id="out_totqty" readonly class="input-large" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="username">Outwards Quantity</label>
                                <div class="controls">
                                <input type="text" name="out_qty" id="out_qty" class="input-large" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="username">Balance Quantity</label>
                                <div class="controls">
                                <input type="text" name="out_balqty" id="out_balqty" readonly class="input-large" />
                                </div>
                            </div>  
                           						
                            
							<p class="stdformbutton">
							<input type="button" class="btn btn-primary" id="item_outwards_btn" value='Submit'>
                                    <!--<button class="btn btn-primary" id="register_btn">Submit Button</button>-->
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
           
					
					
				</div><!--maincontentinner-->
			</div><!--maincontent-->
<?php include_once('footer.php');?>	      
           