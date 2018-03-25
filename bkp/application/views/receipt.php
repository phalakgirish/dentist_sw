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
//alert(34);
jQuery('.btn').click(function(){
	
	
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=700,height=500');
			popupWin.document.open();
           popupWin.document.write('<html><link href="http://localhost/sw_ci/public/css/style.default_print.css" rel="stylesheet" type="text/css" /><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
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

$patient_name = str_replace("\'","'", $patient_name);

$receipt_data=$totamt=$this->myclass->select("payment_receipt_no,payment_time,payment_amt,payment_payable","bs_payment","payment_patient_id='$view_patientid' AND payment_receipt_no='$receipt_no'");
$receipt_date=$receipt_data[0]->payment_time;
$receipt_date=date('d-m-Y',strtotime($receipt_date));

include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="#">Patient Management</a> <span class="separator"></span></li>
            <li>Payment Receipt</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-print"></span></div>
            <div class="pagetitle">
                 <h5>&nbsp;</h5>
                <h1>Payment Receipt</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox">
			<h4 class="widgettitle">Payment Receipt</h4>
			<div id="divToPrint" >
                
                <div class="widgetcontent nopadding">
              <div class="topicpanel">
               <!-- <div class="author-thumb">
                    <img src="<?php echo base_url()."public/"?>images/small-logo.jpg" alt="" />
                </div><!--author-thumb
                -->        
                <div class="topic-content" style="margin-top:150px;">
                    <center><h5><strong>CASH RECEIPT</strong></h5></center>
					<span style='float:left;'>Receipt No.: <?php echo $receipt_data[0]->payment_receipt_no?></span>
					<span style='float:right;'>Date.: <?php echo $receipt_date;?></span>
					</br>
					
                    <p>Recived From : <?php echo $patient_name;?>.</p>
                    <p>Account Rs.<input type='text' value='<?php echo $receipt_data[0]->payment_payable?>'></p>
					<p>Thanks & Regards</p>
					
					<br/><br/>
					<p>Sign & Stamp</p>
                </div><!--topic-content-->
					
            </div><!--topicpanel-->
			
              
                </div><!--widgetcontent-->
				</div>
				 <center>
         <input type="button"  class="btn btn-primary btn-large" Value="Print Receipt" ></a><div class="print">
		</center>	 
			   </div>  
            </div><!--widget-->
			
<?php include_once('footer.php');?>			