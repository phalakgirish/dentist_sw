<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Edit Staff Time</title>
<?php
echo my_file("style.default",1);
echo my_file("bootstrap-fileupload.min",1);
echo my_file("bootstrap-timepicker.min",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("bootstrap.min",2);
echo my_file("bootstrap-fileupload.min",2);
echo my_file("bootstrap-timepicker.min",2);
echo my_file("jquery.uniform.min",2);
echo my_file("jquery.validate.min",2);
echo my_file("jquery.tagsinput.min",2);
echo my_file("jquery.autogrow-textarea",2);
echo my_file("charCount",2);
echo my_file("colorpicker",2);
echo my_file("ui.spinner.min",2);
echo my_file("chosen.jquery.min",2);
echo my_file("jquery.cookie",2);
echo my_file("ui.spinner.min",2);
echo my_file("chosen.jquery.min",2);
echo my_file("jquery.cookie",2);
echo my_file("modernizr.min",2);
echo my_file("jquery.slimscroll",2);
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
            <li>Edit Staff Time</li>
            
        </ul>
        
        <div class="pageheader">
            <form action="http://themepixels.com/main/themes/demo/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>
            <div class="pageicon"><span class="iconfa-time"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1>Edit Staff Time</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <?php
				
				$day=$this->myclass->select("day_id,day_name","bs_day","1");
				$staff_name=$this->myclass->select("staff_name,staff_time_id,staff_time_staff_id,staff_time_day_id,staff_time_daytime_start,	staff_time_daytime_end,staff_time_evening_start,staff_time_evening_end,day_name,day_id","bs_staff,bs_staff_time,bs_day","staff_id='$doctor_id' AND staff_time_staff_id='$doctor_id' AND day_id=staff_time_day_id");
				//print_r($staff_name);
			?>
            <div class="widgetbox">
                <h4 class="widgettitle">Edit Staff Time</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" id='staff_add_time'>
						<input type="hidden" name="staff_time_staff_id" value='<?php echo $doctor_id;?>' id="staff_time_staff_id" class="input-xxlarge" />
					<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
						</div>
						<h4>Staff Name:: <?php echo $staff_name[0]->staff_name;?></h4><br/>
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
						foreach($staff_name as $daytime)
						{
							$staff_time_daytime_start=$daytime->staff_time_daytime_start;
							$staff_time_daytime_end=$daytime->staff_time_daytime_end;
							$staff_time_evening_start=$daytime->staff_time_evening_start;
							$staff_time_evening_end=$daytime->staff_time_evening_end;
						
						?>
                        <tr class="gradeX">
							<input type="hidden" name="staff_time_id[]" value='<?php echo $daytime->staff_time_id;?>' id="clinic_name" class="input-xxlarge" />
							<input type="hidden" name="staff_time_staff_id[]" value='<?php echo $doctor_id;?>' id="clinic_name" class="input-xxlarge" />
							<td><input type="hidden" name="staff_time_day_id[]" value='<?php echo $daytime->day_id;?>' id="clinic_name" class="input-xxlarge" />
							<?php echo $daytime->day_name;?></td>
                            <td> 
							<select name='staff_time_daytime_start[]' id="selection2" class="uniformselect">
                                    <option value="">Select</option>
									<option <?php if($staff_time_daytime_start=="06:00 AM"){?>selected <?php }?> value="06:00 AM">06:00 AM</option>
                                    <option <?php if($staff_time_daytime_start=="06:15 AM"){?>selected <?php }?> value="06:15 AM">06:15 AM</option>
									<option <?php if($staff_time_daytime_start=="06:30 AM"){?>selected <?php }?> value="06:30 AM">06:30 AM</option>
									<option <?php if($staff_time_daytime_start=="07:00 AM"){?>selected <?php }?> value="07:00 AM">07:00 AM</option>
									<option <?php if($staff_time_daytime_start=="07:15 AM"){?>selected <?php }?> value="07:15 AM">07:15 AM</option>
									<option <?php if($staff_time_daytime_start=="07:30 AM"){?>selected <?php }?> value="07:30 AM">07:30 AM</option>
									<option <?php if($staff_time_daytime_start=="08:00 AM"){?>selected <?php }?> value="08:00 AM">08:00 AM</option>
									<option <?php if($staff_time_daytime_start=="08:15 AM"){?>selected <?php }?> value="08:15 AM">08:15 AM</option>
									<option <?php if($staff_time_daytime_start=="08:30 AM"){?>selected <?php }?> value="08:30 AM">08:30 AM</option>
									<option <?php if($staff_time_daytime_start=="09:00 AM"){?>selected <?php }?>value="09:00 AM">09:00 AM</option>
									<option <?php if($staff_time_daytime_start=="09:15 AM"){?>selected <?php }?>value="09:15 AM">09:15 AM</option>
									<option <?php if($staff_time_daytime_start=="09:30 AM"){?>selected <?php }?>value="09:30 AM">09:30 AM</option>
									<option <?php if($staff_time_daytime_start=="10:00 AM"){?>selected <?php }?>value="10:00 AM">10:00 AM</option>
									<option <?php if($staff_time_daytime_start=="10:15 AM"){?>selected <?php }?>value="10:15 AM">10:15 AM</option>
									<option <?php if($staff_time_daytime_start=="10:30 AM"){?>selected <?php }?>value="10:30 AM">10:30 AM</option>
									<option <?php if($staff_time_daytime_start=="11:00 AM"){?>selected <?php }?>value="11:00 AM">11:00 AM</option>
									<option <?php if($staff_time_daytime_start=="11:15 AM"){?>selected <?php }?>value="11:15 AM">11:15 AM</option>
									<option <?php if($staff_time_daytime_start=="11:30 AM"){?>selected <?php }?>value="11:30 AM">11:30 AM</option>
									<option <?php if($staff_time_daytime_start=="12:00 PM"){?>selected <?php }?>value="12:00 PM">12:00 PM</option>
									<option <?php if($staff_time_daytime_start=="12:15 PM"){?>selected <?php }?>value="12:15 PM">12:15 PM</option>
									<option <?php if($staff_time_daytime_start=="12:30 PM"){?>selected <?php }?>value="12:30 PM">12:30 PM</option>
									
									
                                </select> To
								<select name='staff_time_daytime_end[]' id="selection2" class="uniformselect">
                                    <option value="">Select</option>
										<option <?php if($staff_time_daytime_end=="06:00 AM"){?>selected <?php }?> value="06:00 AM">06:00 AM</option>
                                    <option <?php if($staff_time_daytime_end=="06:15 AM"){?>selected <?php }?> value="06:15 AM">06:15 AM</option>
									<option <?php if($staff_time_daytime_end=="06:30 AM"){?>selected <?php }?> value="06:30 AM">06:30 AM</option>
									<option <?php if($staff_time_daytime_end=="07:00 AM"){?>selected <?php }?> value="07:00 AM">07:00 AM</option>
									<option <?php if($staff_time_daytime_end=="07:15 AM"){?>selected <?php }?> value="07:15 AM">07:15 AM</option>
									<option <?php if($staff_time_daytime_end=="07:30 AM"){?>selected <?php }?> value="07:30 AM">07:30 AM</option>
									<option <?php if($staff_time_daytime_end=="08:00 AM"){?>selected <?php }?> value="08:00 AM">08:00 AM</option>
									<option <?php if($staff_time_daytime_end=="08:15 AM"){?>selected <?php }?> value="08:15 AM">08:15 AM</option>
									<option <?php if($staff_time_daytime_end=="08:30 AM"){?>selected <?php }?> value="08:30 AM">08:30 AM</option>
									<option <?php if($staff_time_daytime_end=="09:00 AM"){?>selected <?php }?>value="09:00 AM">09:00 AM</option>
									<option <?php if($staff_time_daytime_end=="09:15 AM"){?>selected <?php }?>value="09:15 AM">09:15 AM</option>
									<option <?php if($staff_time_daytime_end=="09:30 AM"){?>selected <?php }?>value="09:30 AM">09:30 AM</option>
									<option <?php if($staff_time_daytime_end=="10:00 AM"){?>selected <?php }?>value="10:00 AM">10:00 AM</option>
									<option <?php if($staff_time_daytime_end=="10:15 AM"){?>selected <?php }?>value="10:15 AM">10:15 AM</option>
									<option <?php if($staff_time_daytime_end=="10:30 AM"){?>selected <?php }?>value="10:30 AM">10:30 AM</option>
									<option <?php if($staff_time_daytime_end=="11:00 AM"){?>selected <?php }?>value="11:00 AM">11:00 AM</option>
									<option <?php if($staff_time_daytime_end=="11:15 AM"){?>selected <?php }?>value="11:15 AM">11:15 AM</option>
									<option <?php if($staff_time_daytime_end=="11:30 AM"){?>selected <?php }?>value="11:30 AM">11:30 AM</option>
									<option <?php if($staff_time_daytime_end=="12:00 PM"){?>selected <?php }?>value="12:00 PM">12:00 PM</option>
									<option <?php if($staff_time_daytime_end=="12:15 PM"){?>selected <?php }?>value="12:15 PM">12:15 PM</option>
									<option <?php if($staff_time_daytime_end=="12:30 PM"){?>selected <?php }?>value="12:30 PM">12:30 PM</option>
									
                                </select>
                           </td>
                            <td>
								<select  name='staff_time_evening_start[]' id="selection2" class="uniformselect">
                                    <option value="">Select</option>
										
									<option <?php if($staff_time_evening_start=="01:00 PM"){?>selected <?php }?>value="01:00 PM">01:00 PM</option>
									<option <?php if($staff_time_evening_start=="01:15 PM"){?>selected <?php }?>value="01:15 PM">01:15 PM</option>
									<option <?php if($staff_time_evening_start=="01:30 PM"){?>selected <?php }?>value="01:30 PM">01:30 PM</option>
									<option <?php if($staff_time_evening_start=="02:00 PM"){?>selected <?php }?>value="02:00 PM">02:00 PM</option>
									<option <?php if($staff_time_evening_start=="02:15 PM"){?>selected <?php }?>value="02:15 PM">02:15 PM</option>
									<option <?php if($staff_time_evening_start=="02:30 PM"){?>selected <?php }?>value="02:30 PM">02:30 PM</option>
									<option <?php if($staff_time_evening_start=="03:00 PM"){?>selected <?php }?>value="03:00 PM">03:00 PM</option>
									<option <?php if($staff_time_evening_start=="03:15 PM"){?>selected <?php }?>value="03:15 PM">03:15 PM</option>
									<option <?php if($staff_time_evening_start=="03:30 PM"){?>selected <?php }?>value="03:30 PM">03:30 PM</option>
									<option <?php if($staff_time_evening_start=="04:00 PM"){?>selected <?php }?>value="04:00 PM">04:00 PM</option>
									<option <?php if($staff_time_evening_start=="04:15 PM"){?>selected <?php }?>value="04:15 PM">04:15 PM</option>
									<option <?php if($staff_time_evening_start=="04:30 PM"){?>selected <?php }?>value="04:30 PM">04:30 PM</option>
									<option <?php if($staff_time_evening_start=="05:00 PM"){?>selected <?php }?>value="05:00 PM">05:00 PM</option>
									<option <?php if($staff_time_evening_start=="05:15 PM"){?>selected <?php }?>value="05:15 PM">05:15 PM</option>
									<option <?php if($staff_time_evening_start=="05:30 PM"){?>selected <?php }?>value="05:30 PM">05:30 PM</option>
									<option <?php if($staff_time_evening_start=="06:00 PM"){?>selected <?php }?>value="06:00 PM">06:00 PM</option>
									<option <?php if($staff_time_evening_start=="06:15 PM"){?>selected <?php }?>value="06:15 PM">06:15 PM</option>
									<option <?php if($staff_time_evening_start=="06:30 PM"){?>selected <?php }?>value="06:30 PM">06:30 PM</option>
									<option <?php if($staff_time_evening_start=="07:00 PM"){?>selected <?php }?>value="07:00 PM">07:00 PM</option>
									<option <?php if($staff_time_evening_start=="07:15 PM"){?>selected <?php }?>value="07:15 PM">07:15 PM</option>
									<option <?php if($staff_time_evening_start=="07:30 PM"){?>selected <?php }?>value="07:30 PM">07:30 PM</option>
									<option <?php if($staff_time_evening_start=="08:00 PM"){?>selected <?php }?>value="08:00 PM">08:00 PM</option>
									<option <?php if($staff_time_evening_start=="08:15 PM"){?>selected <?php }?>value="08:15 PM">08:15 PM</option>
									<option <?php if($staff_time_evening_start=="08:30 PM"){?>selected <?php }?>value="08:30 PM">08:30 PM</option>
									<option <?php if($staff_time_evening_start=="09:00 PM"){?>selected <?php }?>value="09:00 PM">09:00 PM</option>
									<option <?php if($staff_time_evening_start=="09:15 PM"){?>selected <?php }?>value="09:15 PM">09:15 PM</option>
									<option <?php if($staff_time_evening_start=="09:30 PM"){?>selected <?php }?>value="09:30 PM">09:30 PM</option>
									<option <?php if($staff_time_evening_start=="10:00 PM"){?>selected <?php }?>value="10:00 PM">10:00 PM</option>
									<option <?php if($staff_time_evening_start=="10:15 PM"){?>selected <?php }?>value="10:15 PM">10:15 PM</option>
									<option <?php if($staff_time_evening_start=="10:30 PM"){?>selected <?php }?>value="10:30 PM">10:30 PM</option>
									<option <?php if($staff_time_evening_start=="11:00 PM"){?>selected <?php }?>value="11:00 PM">11:00 PM</option>
									<option <?php if($staff_time_evening_start=="11:15 PM"){?>selected <?php }?>value="11:15 PM">11:15 PM</option>
									<option <?php if($staff_time_evening_start=="11:30 PM"){?>selected <?php }?>value="11:30 PM">11:30 PM</option>
									<option <?php if($staff_time_evening_start=="12:00 AM"){?>selected <?php }?>value="12:00 AM">12:00 AM</option>
                                </select> To
								<select name='staff_time_evening_end[]' id="selection2" class="uniformselect">
                                    <option value="">Select</option>
										
									<option <?php if($staff_time_evening_end=="01:00 PM"){?>selected <?php }?>value="01:00 PM">01:00 PM</option>
									<option <?php if($staff_time_evening_end=="01:15 PM"){?>selected <?php }?>value="01:15 PM">01:15 PM</option>
									<option <?php if($staff_time_evening_end=="01:30 PM"){?>selected <?php }?>value="01:30 PM">01:30 PM</option>
									<option <?php if($staff_time_evening_end=="02:00 PM"){?>selected <?php }?>value="02:00 PM">02:00 PM</option>
									<option <?php if($staff_time_evening_end=="02:15 PM"){?>selected <?php }?>value="02:15 PM">02:15 PM</option>
									<option <?php if($staff_time_evening_end=="02:30 PM"){?>selected <?php }?>value="02:30 PM">02:30 PM</option>
									<option <?php if($staff_time_evening_end=="03:00 PM"){?>selected <?php }?>value="03:00 PM">03:00 PM</option>
									<option <?php if($staff_time_evening_end=="03:15 PM"){?>selected <?php }?>value="03:15 PM">03:15 PM</option>
									<option <?php if($staff_time_evening_end=="03:30 PM"){?>selected <?php }?>value="03:30 PM">03:30 PM</option>
									<option <?php if($staff_time_evening_end=="04:00 PM"){?>selected <?php }?>value="04:00 PM">04:00 PM</option>
									<option <?php if($staff_time_evening_end=="04:15 PM"){?>selected <?php }?>value="04:15 PM">04:15 PM</option>
									<option <?php if($staff_time_evening_end=="04:30 PM"){?>selected <?php }?>value="04:30 PM">04:30 PM</option>
									<option <?php if($staff_time_evening_end=="05:00 PM"){?>selected <?php }?>value="05:00 PM">05:00 PM</option>
									<option <?php if($staff_time_evening_end=="05:15 PM"){?>selected <?php }?>value="05:15 PM">05:15 PM</option>
									<option <?php if($staff_time_evening_end=="05:30 PM"){?>selected <?php }?>value="05:30 PM">05:30 PM</option>
									<option <?php if($staff_time_evening_end=="06:00 PM"){?>selected <?php }?>value="06:00 PM">06:00 PM</option>
									<option <?php if($staff_time_evening_end=="06:15 PM"){?>selected <?php }?>value="06:15 PM">06:15 PM</option>
									<option <?php if($staff_time_evening_end=="06:30 PM"){?>selected <?php }?>value="06:30 PM">06:30 PM</option>
									<option <?php if($staff_time_evening_end=="07:00 PM"){?>selected <?php }?>value="07:00 PM">07:00 PM</option>
									<option <?php if($staff_time_evening_end=="07:15 PM"){?>selected <?php }?>value="07:15 PM">07:15 PM</option>
									<option <?php if($staff_time_evening_end=="07:30 PM"){?>selected <?php }?>value="07:30 PM">07:30 PM</option>
									<option <?php if($staff_time_evening_end=="08:00 PM"){?>selected <?php }?>value="08:00 PM">08:00 PM</option>
									<option <?php if($staff_time_evening_end=="08:15 PM"){?>selected <?php }?>value="08:15 PM">08:15 PM</option>
									<option <?php if($staff_time_evening_end=="08:30 PM"){?>selected <?php }?>value="08:30 PM">08:30 PM</option>
									<option <?php if($staff_time_evening_end=="09:00 PM"){?>selected <?php }?>value="09:00 PM">09:00 PM</option>
									<option <?php if($staff_time_evening_end=="09:15 PM"){?>selected <?php }?>value="09:15 PM">09:15 PM</option>
									<option <?php if($staff_time_evening_end=="09:30 PM"){?>selected <?php }?>value="09:30 PM">09:30 PM</option>
									<option <?php if($staff_time_evening_end=="10:00 PM"){?>selected <?php }?>value="10:00 PM">10:00 PM</option>
									<option <?php if($staff_time_evening_end=="10:15 PM"){?>selected <?php }?>value="10:15 PM">10:15 PM</option>
									<option <?php if($staff_time_evening_end=="10:30 PM"){?>selected <?php }?>value="10:30 PM">10:30 PM</option>
									<option <?php if($staff_time_evening_end=="11:00 PM"){?>selected <?php }?>value="11:00 PM">11:00 PM</option>
									<option <?php if($staff_time_evening_end=="11:15 PM"){?>selected <?php }?>value="11:15 PM">11:15 PM</option>
									<option <?php if($staff_time_evening_end=="11:30 PM"){?>selected <?php }?>value="11:30 PM">11:30 PM</option>
									<option <?php if($staff_time_evening_end=="12:00 AM"){?>selected <?php }?>value="12:00 AM">12:00 AM</option>
                                </select>
							</td>
                        </tr>
						<?php 
							}
						?>
						
                        
                    </tbody>
                </table>
							 <p class="stdformbutton">
                                <button type='button' class="btn btn-primary" id='btn_edit_time'>Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
							
                            
                                                    
                           
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
