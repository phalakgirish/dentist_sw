<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmile Dentel clinic</title>
<?php
echo my_file("style.default",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("modernizr.min",2);
echo my_file("bootstrap.min",2);
echo my_file("fullcalendar.min",2);
echo my_file("jquery.cookie",2);
echo my_file("jquery.slimscroll",2);
echo my_file("custom",2);

?>

</head>

<body>

<div id="mainwrapper" class="mainwrapper">
<!-- header file include for navigation-->
<?php include_once('sidebar.php');


$now=date("Y-m-d");
$staff_clinic_id=$this->session->userdata('staff_clinic_id');
//$appo_data=$this->myclass->select("appo_id,patient_id,patient_name,appo_datetime,appo_formin,appo_status","bs_appointment,bs_patient","appo_doctor_id='$staff_id' AND appo_status='0'  AND patient_id=appo_patient_id");

$appo_data1=$this->myclass->select("appo_id,appo_datetime,patient_id,patient_name,staff_name","bs_appointment,bs_patient,bs_staff","patient_id=appo_patient_id AND staff_id=appo_doctor_id AND (appo_status='0' OR appo_status='3') AND patient_clinic_id='$staff_clinic_id' ");

?>		
<script type='text/javascript'>

	jQuery(document).ready(function() {


	var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		var h = date.getHours();
		var mm = date.getMinutes();
		
		var calendar = jQuery('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month'
			},
			buttonText: {
				prev: '&laquo;',
				next: '&raquo;',
				prevYear: '&nbsp;&lt;&lt;&nbsp;',
				nextYear: '&nbsp;&gt;&gt;&nbsp;',
				today: 'today',
				month: 'month',
				week: '',
				day: ''
			},
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
				
			},
			editable: true,
			events: [
			<?php
			foreach($appo_data1 as $appo_data)
{
				$date=$appo_data->appo_datetime;
				$time1=explode(" ",$date);
				$date=$time1[0];
				
				
				$time_in_24_hour_format= date("H:i", strtotime($time1[1]." ".$time1[2]));
				
				//print_r($time_in_24_hour_format);
				$fulltime=explode(":",$time_in_24_hour_format);
				$hours=$fulltime[0];
				$minutes=$fulltime[1];
				//$date=$appo_data->appo_date;
				//echo $date;
				//$time=$appo_data->appo_time;
				$appo_name=$appo_data->patient_name;
				$appo_id=$appo_data->appo_id;
				$doc_name=$appo_data->staff_name;
				$day = date("d", strtotime($date));
				$date_of_appointment=$date; 
				$date1 = date_create($now);
				if($date_of_appointment < $now)
				{
					//print_r($date_of_appointment."less than".$now);
					//echo"<br/>";
					$date2 = date_create($date_of_appointment);
					$diff12 = date_diff($date2, $date1);
					//echo"<br/>";
					$days = $diff12->days;
					?>
					{
					title: '<?php echo $doc_name."--".$appo_name;?>',
					start: new Date(y, m, d-<?php echo $days ?>, <?php echo $hours;?>, <?php echo $minutes;?>),
					allDay: false,
					url: '<?php echo base_url()."index.php/patient/edit_appointment/$appo_id"; ?>'
					},
					<?php
				}
				else
				{
					//print_r($date_of_appointment."greeter than".$now);
					//echo"<br/>";
					$date2 = date_create($date_of_appointment);
					$diff12 = date_diff($date2, $date1);
					//echo"<br/>";
					$days = $diff12->days;
					?>
					{
					title: '<?php echo $doc_name."--".$appo_name;?>',
					start: new Date(y, m, d+<?php echo $days ?>, <?php echo $hours;?>, <?php echo $minutes;?>),
					allDay: false,
					url: '<?php echo base_url()."index.php/patient/edit_appointment/$appo_id"; ?>'
					},
					<?php
				}
}	
			?>	
				
			]
		});
		
	});

</script>

	<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Patients Management</a> <span class="separator"></span></li>
            <li>Appointments</li>
           
        </ul>
        
        <div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-calendar"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1>Patients Appointments</h1>
            </div>
        </div><!--pageheader-->
        <ul class="list-nostyle list-inline">
			<li><a href="<?php echo base_url()."index.php/patient/appointmment_form" ?>" class="btn btn-primary btn-rounded"> <i class="iconsweets-pencil iconsweets-white"></i>  &nbsp; New Patient</a></li>
			
			<li><a href="<?php echo base_url()."index.php/patient/view_patient_list" ?>" class="btn btn-primary btn-rounded"> <i class="iconsweets-pencil iconsweets-white"></i>  &nbsp; Existing Patient</a></li>
		</ul>
        <div class="maincontent">
            <div class="maincontentinner">
			<?php
				if($appo_data1=='no')
				{
					echo "<h3>No Appointment for you</h3>";
				}
				?>
                                        
          <div id='calendar'></div>
            
                
            
            
          
		  
		  
		  
            
            <?php include_once('footer.php');?>	