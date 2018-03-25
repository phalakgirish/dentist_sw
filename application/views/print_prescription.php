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


echo my_file("apps_js/procedure",2);
?>
<script>
  jQuery(document).ready(function(){

jQuery('.btn').click(function(){
	
	
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
			popupWin.document.open();
           popupWin.document.write('<html><link href="http://localhost/bs/CI/public/css/style.default_print.css" rel="stylesheet" type="text/css" /><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
           popupWin.document.close();
		   
		   
		   
        
	});
});	
</script>
</head>
<body>
<?php 

$session_data = $this->session->all_userdata();
$view_patientid=$session_data['view_patientid'];
$patient_name=$session_data['patient_name'];

$prescribe=$this->myclass->select("drags_name,prescription_strength,prescription_strength_unit,prescription_duration,prescription_duration_unit,prescription_moring,prescription_noon,prescription_night,prescription_instruction,dragstype_name","bs_drags, bs_prescription,bs_drags_type","prescription_patient_id='$view_patientid' AND prescription_drugid=drags_id AND dragstype_id=drags_type AND prescription_no='$prescription_no'");

$today=date('d-m-Y');



include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Patient Management</a> <span class="separator"></span></li>
            <li>Prescription</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                 <h5>&nbsp;</h5>
                <h1>Prescription</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox">
			<h4 class="widgettitle">Prescription</h4>
			<div id="divToPrint" >
                
                <div class="widgetcontent nopadding">
              <div class="topicpanel">
			  <!--
                <div class="author-thumb">
                    <img src="<?php echo base_url()."public/"?>images/small-logo.jpg" alt="" />
                </div><!--author-thumb-->
                        
                <div class="topic-content" style="margin-top:100px;">
                    <!--<h5><strong>Dr.Ranbir S.Saluja</strong></h5>
					<h6>B.D.S(Mumbai)</h6>
					<h6>Regd.No. A-6098</h6>
					
					<span style='float:right;'>Shop No.8</span><br/>
					<span style='float:right;'>Kadri Menion</span><br/>
					<span style='float:right;'>L.J.Road, Mahim</span><br/>
					<span style='float:right;'>Mumbai - 400 016</span><br/>
					<span style='float:right;'>Tel-:24445273</span><br/>
					<span style='float:right;'>Time : 9.30 AM To 1.00 PM</span><br/>
					<span style='float:right;'>Time : 5.00 PM To 9.00 PM</span>
					</br>-->
					<hr/>
					<h4 style='float:left;'>Rx</h4>
					
					
					<br/>
					<h4 style='float:left;'><?php echo $patient_name; ?></h4>
					
					<span style='float:right; top-margin:50px;'>Date <?php echo date('d-m-Y');?></span><br/>
					<br/>
					<?php
					if(is_array($prescribe))
							{
								foreach($prescribe as $prescribe)
								{
									?>
										
										<h4><?php  echo $prescribe->dragstype_name." ". $prescribe->drags_name;?><?php echo $prescribe->prescription_strength."". $prescribe->prescription_strength_unit."<span style='float:right;'>".$prescribe->prescription_duration." ".  $prescribe->prescription_duration_unit." </span>";?><br/><?php echo $prescribe->prescription_moring."-". $prescribe->prescription_noon."-".$prescribe->prescription_night;?></h4>
										<h5><?php echo $prescribe->prescription_instruction;?></h5><br/>
										
									
									<?php
								}
							}
							else
							{
								echo "No prescription history";
							}
					?>		
                   
                </div><!--topic-content-->
					
            </div><!--topicpanel-->
			
              
                </div><!--widgetcontent-->
				</div>
				 <center>
         <input type="button"  class="btn btn-primary btn-large" Value="Print" ></a><div class="print">
		</center>	 
			   </div>  
            </div><!--widget-->
			
<?php include_once('footer.php');?>			