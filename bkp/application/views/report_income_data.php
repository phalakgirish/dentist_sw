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

<script type="text/javascript">
    jQuery(document).ready(function(){
        // dynamic table
        jQuery('#dyntable').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0,'asc']],
            "fnDrawCallback": function(oSettings) {
                jQuery.uniform.update();
            }
        });
        
        jQuery('#dyntable2').dataTable( {
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "300px"
        });
		
	
        
    });
</script>
</head>

<body>

<div id="mainwrapper" class="mainwrapper">
  <!-- header file include for navigation-->
<?php include_once('sidebar.php');?>   
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="table-static.html">Report Management</a> <span class="separator"></span></li>
            <li>Income Report</li>
           
        </ul>
        
        <div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-money"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1>Income Report</h1>
            </div>
        </div><!--pageheader-->
		
		<?php
			//$listofstaff=$this->myclass->select("staff_id,clinic_name,staff_name,staff_status,staff_mobile,staff_email","bs_clinic,bs_staff","staff_clinic_id=clinic_id");
			//echo "<pre>";
			//print_r($app_from=$app_data['app_from']);
			$app_from=$app_data['app_from'];
			$app_to=$app_data['app_to'];
			//echo $app_from=$app_data->app_from;
			
			
			$total_appot=$this->myclass->select("count(appo_id)as cnt_appointment,appo_id,patient_id,patient_name,staff_name,patient_gender,patient_age,appo_datetime,appo_status","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND appo_datetime BETWEEN('$app_from') AND('$app_to') ORDER BY appo_datetime ");
			
			$complete_appot=$this->myclass->select("count(appo_id)as cnt_appointment,appo_id,appo_datetime,patient_id,patient_name,staff_name","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND appo_status='1' AND appo_datetime BETWEEN('$app_from') AND('$app_to') ORDER BY appo_datetime");
			
			$pending_appoint=$this->myclass->select("count(appo_id)as cnt_appointment,appo_id,appo_datetime,patient_id,patient_name,staff_name","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND (appo_status='0' OR appo_status='3') AND appo_datetime BETWEEN('$app_from') AND('$app_to') ORDER BY appo_datetime");
			
			$total_appot1=$this->myclass->select("income_id,income_refno,income_amt,income_desc,income_time","bs_income"," DATE(income_time) BETWEEN('$app_from') AND('$app_to') ORDER BY income_time");
			
			$total_Amt=$this->myclass->select("sum(income_amt) as tot","bs_income"," DATE(income_time) BETWEEN('$app_from') AND('$app_to') ORDER BY income_time");
			//echo "<pre>";
			//print_r($total_appot1);
		?>
        <div class="maincontent">
            <div class="maincontentinner">
           
        <div class="row-fluid">
                    <div id="dashboard-left" class="span8">
<form method="post" action="<?php echo base_url()."index.php/reports/export_income"; ?>">
						<input type="hidden" name="app_from" value="<?php echo $app_from; ?>">
						<input type="hidden" name="app_to" value="<?php echo $app_to; ?>">
						
						<input type='submit' id='export_ledger' class="btn btn-primary" value='Export to excel'> 
						</form>	
                        <h5 class="subtitle">Income Data</h5><br />
						<?php
						if(!is_array($total_appot1))
						{
							echo "<h4>Records not found!</h4>";
						}
						else
						{
						?>
                        <table id="dyntable" class="table table-bordered responsive">
						<colgroup>
                        <col class="con0" style="align: center; width: 20%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        
                    </colgroup>
                            <thead>
                                <tr>
									<th class="head1">Ref. No.</th>
									
									<th class="head1">Description</th>
                                    <th class="head0">Time</th>
									<th class="head1">Amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
								<?php
									foreach($total_appot1 as $patient_details)
									{
											
											$datetime=$patient_details->income_time;
											$appo_datetime=date("d-m-Y h:i A",strtotime($datetime));
											
											
									?>
									<tr>
									<td><?php echo $patient_details->income_refno; ?></td>
									
                                    <td><?php echo $patient_details->income_desc; ?></td>
                                    <td><?php echo $appo_datetime; ?></td>
									<td><?php echo 'Rs '. $patient_details->income_amt; ?>/-</td>
									</tr>
								<?php
									}
									
								?>
                                <tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><b>Total Amount</b></td>
                                    <td colspan="4"><b><?php echo 'Rs '. $total_Amt[0]->tot; ?>/-</b></td>
								</tr>
                                
                            </tbody>
                        </table>
                        <?php
						}
						?>
                        <br />
						
							
                    </div><!--span8-->
                    
                    
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
