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
            <li>New Item</li>
            
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-beaker"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1>New Item</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="maincontent">
                <div class="maincontentinner">
                    
            
                
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Add Item</h4>
                <div class="widgetcontent wc1">
                      <form id="form1" class="stdform" >
                        <div class="par control-group" id='error_span'>
                            <div class="controls">
                            <span class="help-inline"></span>
                          </div>
                        </div>
                            <div class="par control-group">
                            <div class="control-group">
                                <label class="control-label" for="username">Item Name</label>
                                <div class="controls">
                                   <?php
                                   $this->myclass->dropdown("drags_id","drags_name","bs_drags","1",'invt_product',"uniformselect")
                                   ?> 

                                <input type='hidden' name='invt_id' value='<?php echo $data[0]->invt_id; ?>'>
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="username">Purchase date</label>
                                <div class="controls">
                                <input type="text" name="invt_podate" value="<?php echo date('d-m-Y',strtotime($data[0]->invt_podate)); ?>" id="datepicker" class="input-large" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="username">No of Unit</label>
                                <div class="controls">
                                <input type="text" name="invt_unit" value="<?php echo $data[0]->invt_unit; ?>" id="invt_unit" class="input-large" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="username">Quantity</label>
                                <div class="controls">
                                <input type="text" name="invt_qty"  value="<?php echo $data[0]->invt_qty; ?>" id="invt_qty" class="input-large" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="username">Rate</label>
                                <div class="controls">
                                <input type="text" name="invt_rate" value="<?php echo $data[0]->invt_rate; ?>" id="invt_rate" class="input-large" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="username">Amount</label>
                                <div class="controls">
                                <input type="text" name="invt_amt"  value="<?php echo $data[0]->invt_amt; ?>" id="invt_amt" class="input-large" />
                                </div>
                            </div>  
                            
                            
                            <p class="stdformbutton">
                            <input type="button" class="btn btn-primary" id="inwards_edit_btn" value='Submit'>
                                    <!--<button class="btn btn-primary" id="register_btn">Submit Button</button>-->
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
           
                    
                    
                </div><!--maincontentinner-->
            </div><!--maincontent-->
<?php include_once('footer.php');?>       
           