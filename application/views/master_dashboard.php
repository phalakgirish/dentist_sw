<!DOCTYPE html>
<html>
<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Clinic Registration</title>
<?php
echo my_file("style.default",1);
echo my_file("responsive-tables",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("modernizr.min",2);
echo my_file("bootstrap.min",2);
echo my_file("jquery.cookie",2);
echo my_file("jquery.uniform.min",2);
echo my_file("flot/jquery.flot.min",2);
echo my_file("flot/jquery.flot.resize.min",2);
echo my_file("responsive-tables",2);
echo my_file("jquery.slimscroll",2);
echo my_file("custom",2);
echo my_file("apps_js/clinic",2);

?>
<?php echo my_file("charts",2); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/flot/jquery.flot.pie.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/flot/jquery.flot.symbol.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/flot/jquery.flot.fillbetween.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/flot/jquery.flot.crosshair.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/flot/jquery.flot.stack.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/flot/jquery.flot.resize.min.js"></script>
</head>
<body>
<div id="mainwrapper" class="mainwrapper">
  <!-- header file include for navigation-->
<?php include_once('sidebar.php');?>   
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="table-static.html">Clinic Management</a> <span class="separator"></span></li>
            <li>Dashboard</li>
           
        </ul>
        
        <div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1>Dashboard</h1>
            </div>
        </div><!--pageheader-->
		
		<?php
		$staff_clinic_id=$this->session->userdata('staff_clinic_id');
			//$listofstaff=$this->myclass->select("staff_id,clinic_name,staff_name,staff_status,staff_mobile,staff_email","bs_clinic,bs_staff","staff_clinic_id=clinic_id");
			$date=date('Y-m-d');
			
			$total_appot=$this->myclass->select("count(appo_id)as cnt_appointment,appo_id,patient_id,patient_name,staff_name,patient_gender,patient_age,appo_datetime,appo_status","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND appo_datetime LIKE '$date%' AND patient_clinic_id='$staff_clinic_id' ORDER BY appo_datetime");
			
			$complete_appot=$this->myclass->select("count(appo_id)as cnt_appointment,appo_id,appo_datetime,patient_id,patient_name,staff_name","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND appo_status='1' AND appo_datetime LIKE '$date%' AND patient_clinic_id='$staff_clinic_id'  ORDER BY appo_datetime");
			
			$pending_appoint=$this->myclass->select("count(appo_id)as cnt_appointment,appo_id,appo_datetime,patient_id,patient_name,staff_name","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND (appo_status='0' OR appo_status='3') AND appo_datetime LIKE '$date%' AND patient_clinic_id='$staff_clinic_id'  ORDER BY appo_datetime");
			
			$total_appot1=$this->myclass->select("appo_id,patient_id,patient_name,staff_name,patient_gender,patient_age,appo_datetime,appo_status","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND appo_datetime LIKE '$date%' AND patient_clinic_id='$staff_clinic_id'  ");
			
		?>
        <div class="maincontent">
            <div class="maincontentinner">
           
        <div class="row-fluid">
                    <div id="dashboard-left" class="span8">
                       <!--
                        
                        <ul class="shortcuts">
                            <li class="events">
                                <a href="<?php echo base_url()."index.php/patient/appointmment_form"; ?>">
                                    <span class="shortcuts-icon iconsi-event"></span>
                                    <span class="shortcuts-label">Appointment</span>
                                </a>
                            </li>
                            <li class="products">
                                <a href="#">
                                    <span class="shortcuts-icon iconsi-cart"></span>
                                    <span class="shortcuts-label">Billing</span>
                                </a>
                            </li>
                            <li class="archive">
                                <a href="#">
                                    <span class="shortcuts-icon iconsi-archive"></span>
                                    <span class="shortcuts-label">Reports</span>
                                </a>
                            </li>
							
                        </ul>
                       -->
                        <br />
                        
                        <h5 class="subtitle">Daily Statistics</h5><br />
						 <div class="widgetbox box-inverse">

                        <div class="span6" >
                        <?php //print_r($question);   ?>
						<input type="hidden" name="answer" value="<?php echo $complete_appot[0]->cnt_appointment;?>" id="answer"/>
						<input type="hidden" name="unanswer" value="<?php echo $pending_appoint[0]->cnt_appointment;?>" id="unanswer"/>
						<h4 class="widgettitle">Appointment Statistics</h4>
                        <div class="widgetcontent" id="<?php echo $total_appot[0]->cnt_appointment; ?>">
                            <div id="piechart" style="height: 300px;font-size:15px"></div>
                        </div><!--widgetcontent-->
    
						</div><!--span6-->
           
						</div><br/>
                        <div id="chartplace" style="height:300px;"></div>
                        
                        <div class="divider30"></div>
                        
                         <br /><br /><br /><br />
                        <h4 class="subtitle">Today's Appointment</h4><br />
						<?php
						if(!is_array($total_appot1))
						{
							echo "<h4>No Appointment's today!</h4>";
						}
						else
						{
						?>
                        <table class="table table-bordered responsive">
                            <thead>
                                <tr>
									<th class="head1">Doctor name</th>
                                    <th class="head1">Patients Name</th>
									<th class="head0">Age</th>
                                    <th class="head1">Gender</th>
                                    <th class="head1">Appointment Time</th>
									<th class="head1">Status</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
									foreach($total_appot1 as $patient_details)
									{
										
										
											if($patient_details->patient_gender==1)
											{
												$gender='Male';
											}
											else
											{
												$gender='Female';
											}
											$datetime=$patient_details->appo_datetime;
											$appo_datetime=date("d-m-Y h:i A",strtotime($datetime));
											
											
											if($patient_details->appo_status==1)
											{
												$status='Done';
											}
											else if($patient_details->appo_status==2)
											{
												$status='Cancel';
											}
											else if($patient_details->appo_status==3)
											{
												$status='Reschudle';
											}
											else
											{
												$status='Pending';
											}
									?>
									<tr>
									<td><?php echo $patient_details->staff_name; ?></td>
									<td><?php echo $patient_details->patient_name; ?></td>
                                    <!--<td><?php echo $patient_details->patient_id; ?></td>-->
									<td><?php echo $patient_details->patient_age; ?></td>
                                    <td><?php echo $gender;?></td>
                                   
									<td class="center"><?php echo $appo_datetime; ?></td>
                                    <td class="center"><?php echo $status;?></td>
                                </tr>
								<?php
									}
								
								?>
                                
                                
                            </tbody>
                        </table>
                        <?php
						}
						?>
                        <br />
						<form method="post" action="<?php echo base_url()."index.php/patient/export_appointment"; ?>">
						<input type='submit' id='export_ledger' class="btn btn-primary" value='Export Todays appointment'> 
						</form>	
						<form method="post" action="<?php echo base_url()."index.php/patient/export_next_day_appointment"; ?>">
						<input type='submit' id='export_ledger' class="btn btn-primary" value='Export Next Days appointment'> 
						</form>	
						<br /><br /><br /><br />
                        <h4 class="subtitle">Reminder call </h4><br />
						<?php
						
						$reminder=$this->myclass->select("reminder_id,reminder_date,reminder_time,patient_name,patient_contact","bs_reminder,bs_patient"," reminder_patient_id=patient_id AND reminder_date LIKE '$date%'");
						
						if(!is_array($reminder))
						{
							echo "<h4>No Reminder call today!</h4>";
						}
						else
						{
						?>
                        <table class="table table-bordered responsive">
                            <thead>
                                <tr>
									<th class="head1">Patients Name</th>
									<th class="head0">Time</th>
                                    <th class="head1">Contact no.</th>
                                   <th class="head1">Option</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
									foreach($reminder as $reminder)
									{
									?>
									<tr>
									<td><?php echo $reminder->patient_name; ?></td>
                                    <td><?php echo $reminder->reminder_time; ?></td>
                                    <td><?php echo $reminder->patient_contact;?></td>
									<td class="center"><a href='<?php echo base_url()."index.php/patient/delete_reminder/".$reminder->reminder_id; ?>' title='Delete Reminder call'><span class="icon-trash"></span></a></td>
                                    
                                </tr>
								<?php
									}
								
								?>
                                
                                
                            </tbody>
                        </table>
                        <?php
						}
						
						?>
						<?php
				if($staff_type==1)
				{
			?>	
						<br /><br /><br /><br />
                        <h4 class="subtitle">Today's Payment </h4><br />
						<?php
						
						$payment=$this->myclass->select("income_id,income_refno,income_amt","bs_income","income_time LIKE '$date%'");
						$totpayment=$this->myclass->select("sum(income_amt) as tot","bs_income","income_time LIKE '$date%'");
						if(!is_array($payment))
						{
							echo "<h4>Payment not recevied today!</h4>";
						}
						else
						{
						?>
                        <table class="table table-bordered responsive">
                            <thead>
                                <tr>
									<th class="head0">Sr.No</th>
									<th class="head0">Amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$i=1;
									foreach($payment as $reminder)
									{
									?>
									<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo 'Rs.'.$reminder->income_amt; ?></td>
                                   
                                    </tr>
								<?php
									$i++;
									}
								
								?>	
									<tr>
									<td><b>Total Amount- </b></td>
									<td><b><?php echo 'Rs.'.$totpayment[0]->tot;?></b></td>
                                    </tr>
                                
                                
                            </tbody>
                        </table>
                        <?php
						}
						?>
						<br /><br /><br /><br />
                        <h4 class="subtitle">Today's Expences </h4><br />
						<?php
						
						$payment=$this->myclass->select("expn_id,expn_refno,expn_name,expn_amt,expn_desc,expn_time","bs_expences"," DATE(expn_time) LIKE '$date%' ORDER BY expn_time");
						$totpayment=$this->myclass->select("sum(expn_amt) as tot","bs_expences"," DATE(expn_time) LIKE '$date%' ORDER BY expn_time");
						if(!is_array($payment))
						{
							echo "<h4>Expences not found today!</h4>";
						}
						else
						{
						?>
                        <table class="table table-bordered responsive">
                            <thead>
                                <tr>
									<th class="head0">Sr.No</th>
									<th class="head0">Amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$i=1;
									foreach($payment as $reminder)
									{
									?>
									<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo 'Rs.'.$reminder->expn_amt; ?></td>
                                   
                                    </tr>
								<?php
									$i++;
									}
								
								?>	
									<tr>
									<td><b>Total Amount- </b></td>
									<td><b><?php echo 'Rs.'.$totpayment[0]->tot;?></b></td>
                                    </tr>
                                
                                
                            </tbody>
                        </table>
                        <?php
						}
				}
						?>
                    </div><!--span8-->
                    
                    <div id="dashboard-right" class="span4">
                        
                        <h5 class="subtitle">Announcements</h5>
                        
                        <div class="divider15"></div>
                        
                        <div class="alert alert-block">
                              <button data-dismiss="alert" class="close" type="button">&times;</button>
                              <h4>Warning!</h4>
                              <p style="margin: 8px 0">Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna.</p>
                        </div><!--alert-->
                        
                        <br />
                      
                        
                        <br />
                                                
                    </div><!--span4-->
                </div><!--row-fluid-->
                
                <br /><br />
                
<script type="text/javascript">
    jQuery(document).ready(function() {
        
      // simple chart
		var flash = [[0, 11], [1, 9], [2,12], [3, 8], [4, 7], [5, 3], [6, 1]];
		var html5 = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
      var css3 = [[0, 6], [1, 1], [2,9], [3, 12], [4, 10], [5, 12], [6, 11]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
	
			
		var plot = jQuery.plot(jQuery("#chartplace"),
			   [ { data: flash, label: "Flash(x)", color: "#6fad04"},
              { data: html5, label: "HTML5(x)", color: "#06c"},
              { data: css3, label: "CSS3", color: "#666"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#666', borderWidth: 2, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		var previousPoint = null;
		jQuery("#chartplace").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#chartplace").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
    
        
        //datepicker
        jQuery('#datepicker').datepicker();
        
        // tabbed widget
        jQuery('.tabbedwidget').tabs();
        
        
    
    });
</script>
                <!--<h4 class="widgettitle">Scroll Y Infinite</h4>-->
                
                <?php include_once('footer.php');?>	
