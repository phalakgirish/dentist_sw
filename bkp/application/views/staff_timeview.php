<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-View Staff Time</title>
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
echo my_file("custom",2);
echo my_file("forms",2);
echo my_file("apps_js/staff",2);
?>
</head>
<body>
<?php include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Clinic Management</a> <span class="separator"></span></li>
            <li>View Staff Time</li>
            
        </ul>
        
        <div class="pageheader">
            <form action="http://themepixels.com/main/themes/demo/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>
            <div class="pageicon"><span class="iconfa-time"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1>View Staff Time</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <?php
				
				$staff_time=$this->myclass->select("staff_name,day_name,staff_time_daytime_start,staff_time_daytime_end,staff_time_evening_start,staff_time_evening_end","bs_staff,bs_staff_time,bs_day","staff_id='$doctor_id' AND staff_id=staff_time_staff_id AND day_id=staff_time_day_id");
				//print_r($staff_name);
			?>
            <div class="widgetbox">
			<ul class="list-nostyle list-inline">
			<li><a href="<?php echo base_url()."index.php/welcome/edit_staff_time/$doctor_id" ?>" class="btn btn-primary btn-rounded"> <i class="iconsweets-pencil iconsweets-white"></i>  &nbsp; Edit Time</a></li>
		</ul>
                <h4 class="widgettitle">View Staff Time</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" id='staff_add_time'>
						<input type="hidden" name="staff_time_staff_id" value='<?php echo $staff_id;?>' id="clinic_name" class="input-xxlarge" />
					<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
						</div>
						<h4>Staff Name:: <?php echo $staff_time[0]->staff_name;?></h4><br/>
					<table id="dyntable" class="table table-bordered responsive">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort">Day</th>
							<th class="head0 nosort">Morning Time</th>
							<th class="head1">Evening Time</th>
                            
                        </tr>
                    </thead>
                    <tbody>
					<?php
						foreach($staff_time as $daytime)
						{
						
						?>
                        <tr class="gradeX">
							<input type="hidden" name="staff_time_staff_id[]" value='<?php echo $staff_id;?>' id="clinic_name" class="input-xxlarge" />
							<td><input type="hidden" name="staff_time_day_id[]" value='<?php echo $daytime->day_id;?>' id="clinic_name" class="input-xxlarge" />
							<?php echo $daytime->day_name;?></td>
                            <td> 
							<?php echo $daytime->staff_time_daytime_start;?> 
							To
							<?php echo $daytime->staff_time_daytime_end;?>	
                           </td>
                            <td>
							<?php echo $daytime->staff_time_evening_start;?>
								To
							<?php echo $daytime->staff_time_evening_end;?>	
							</td>
                        </tr>
						<?php 
							}
						?>
						
                        
                    </tbody>
                </table>
							
                            
                                                    
                           
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
   <?php include_once('footer.php');?>	

<script type="text/javascript">
    $(function () {
        $('#timepicker1').datetimepicker();
        $('#timepicker2').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#timepicker1").on("dp.change", function (e) {
            $('#timepicker2').data("DateTimePicker").minDate(e.date);
        });
        $("#timepicker2").on("dp.change", function (e) {
            $('#timepicker2').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
</body>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:54 GMT -->
</html>
