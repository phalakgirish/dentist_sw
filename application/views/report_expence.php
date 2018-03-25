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
echo my_file("jquery.cookie",2);
echo my_file("modernizr.min",2);
echo my_file("jquery.smartWizard.min",2);
echo my_file("jquery.slimscroll",2);
echo my_file("custom",2);
echo my_file("ckeditor",3);

?>
<link href="<?php echo base_url();?>public/css1/datepicker.css" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url();?>public/js1/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css1/bootstrap-datepicker.css" />
</head>
<body>
<?php include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Report Management</a> <span class="separator"></span></li>
            <li>Income Report</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class=" iconfa-money"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1>Expence Report</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<div class="widgetbox">
			 <h4 class="widgettitle">Expence Report</h4>
						
             

				  <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" method="post" action="<?php echo base_url()."index.php/reports/expence_reportaction"?>" id='get_appointment'>
							  <div class="par">
                            <label>Select Date</label>
                            <span class="field"><input type="text" name="app_from"  class="form-control1 des-city" placeholder="yy/mm/dd" id="dp1">
							
							<input type="text" name="app_to"  class="form-control1 des-city" placeholder="yy/mm/dd" id="dp2"></span>
                        </div> 
                    
                       
						<p class="stdformbutton">
                                <button type='submit' class="btn btn-primary" id='btn_get_appointment'>Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
                    </form>
					 </div>
                </div><!--widgetcontent-->
 </div> 


			 
                    <!-- END OF TABBED WIZARD -->
                
			
			<script src="<?php echo base_url();?>public/js1/bootstrap-datepicker.js"></script>
			  
			
<script>



		jQuery(function(){
			window.prettyPrint && prettyPrint();
			jQuery('#dp1').datepicker({
				format: 'yyyy-mm-dd'
			});
			jQuery('#dp2').datepicker({
			format: 'yyyy-mm-dd'
			});
          jQuery('#dp6').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() < startDate.valueOf()){
            jQuery('#alert').show().find('strong').text('The end date can not be less then the start date');
          } else {
            jQuery('#alert').hide();
            endDate = new Date(ev.date);
            jQuery('#endDate').text($('#dp6').data('date'));
          }
          jQuery('#dp6').datepicker('hide');
        });
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
	</script>
<?php include_once('footer.php');?>			