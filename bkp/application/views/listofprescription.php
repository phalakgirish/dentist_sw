<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Prescription</title>
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

echo my_file("apps_js/procedure",2);
?>
</head>
<body>
<?php 

$session_data = $this->session->all_userdata();
$view_patientid=$session_data['view_patientid'];
$patient_name=$session_data['patient_name'];

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
                <h1>Prescription List  - For <?php echo $patient_name;  ?></h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox">
			<a href="<?php echo base_url()."index.php/patient/prescription_form" ?>" class="btn btn-primary btn-rounded"> <i class="iconsweets-pencil iconsweets-white"></i>  &nbsp; New Prescription</a>
              
               
					  <table class="table discussions">
                        <colgroup>
                            <col class="width40" />
                            <col class="width25" />
                            <col class="width20" />
                            <col class="width25" />
                        </colgroup>
                        <thead>
                            <tr>
								<th>Prescription No.</th>
								<th>Date</th>
                                <th>Prescribe By</th>
								<th>Option</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						
						
						$prescribe=$this->myclass->select("prescription_id,prescription_no,staff_name,prescription_time","bs_prescription,bs_staff","prescription_patient_id='$view_patientid' AND prescription_staffid=staff_id GROUP BY prescription_no");
							if(is_array($prescribe))
							{
								foreach($prescribe as $prescribe)
								{
									?>
									<tr>
										<td><?php echo $prescribe->prescription_no;?></td>
										<td><?php echo $prescribe->prescription_time; ?></td>
										<td><?php echo $prescribe->staff_name; ?></td>
										<td><a href='<?php echo base_url();?>index.php/patient/print_prescription/<?php echo $prescribe->prescription_no;?>' class=" icon-print" title='Print Receipt'></i></a>&nbsp;&nbsp;&nbsp;</td>
									</tr>
									<?php
								}
							}
							else
							{
								echo "No prescription history";
							}
							?>
                        </tbody>
							<thead>
                            
                        </thead>
                        </table>
                </div><!--widgetcontent-->
            </div><!--widget-->
			
<?php include_once('footer.php');?>			