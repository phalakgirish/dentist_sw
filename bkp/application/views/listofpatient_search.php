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
echo my_file("jquery.validate.min",2);
echo my_file("jquery.tagsinput.min",2);
echo my_file("jquery.autogrow-textarea",2);
echo my_file("custom",2);
echo my_file("apps_js/patient",2);

//$patient_details=$this->myclass->select("patient_id,patient_name,patient_gender,patient_contact,patient_email","bs_patient","1 ORDER BY patient_name");

?>


</head>
<body>
<div id="mainwrapper" class="mainwrapper">
<?php include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Patient Management</a> <span class="separator"></span></li>
            <li>Patient Directory</li>
            
        </ul>
        
        <div class="pageheader">
            <form action="<?php echo base_url();?>index.php/patient/search_patient" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>
            <div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1>Patient Directory</h1>
            </div>
        </div><!--pageheader-->
         <ul class="list-nostyle list-inline">
			<li><a href="<?php echo base_url()."index.php/patient/appointmment_form" ?>" class="btn btn-primary btn-rounded"> <i class="iconsweets-pencil iconsweets-white"></i>  &nbsp; New Patient</a></li>
			
			<li><a href="<?php echo base_url()."index.php/patient/view_patient_list" ?>" class="btn btn-primary btn-rounded"> <i class="iconsweets-pencil iconsweets-white"></i>  &nbsp; Existing Patient</a></li>
		</ul>
        <div class="maincontent">
            <div class="maincontentinner">
			 <div class="peoplelist">
			<!--
            <ul class="alphabets">
                    <li><a href="#">A</a></li>
                    <li>B</li>
                    <li><a href="#">C</a></li>
                    <li><a href="#">D</a></li>
                    <li>E</li>
                    <li>F</li>
                    <li><a href="#">G</a></li>
                    <li><a href="#">H</a></li>
                    <li>I</li>
                    <li><a href="#">J</a></li>
                    <li>K</li>
                    <li>L</li>
                    <li><a href="#">M</a></li>
                    <li><a href="#">N</a></li>
                    <li><a href="#">O</a></li>
                    <li><a href="#">P</a></li>
                    <li><a href="#">Q</a></li>
                    <li><a href="#">R</a></li>
                    <li>S</li>
                    <li>T</li>
                    <li><a href="#">U</a></li>
                    <li><a href="#">V</a></li>
                    <li><a href="#">W</a></li>
                    <li><a href="#">X</a></li>
                    <li><a href="#">Y</a></li>
                    <li><a href="#">Z</a></li>
                </ul>
                -->
				
				<?php
				
				//print_r($patient_details);
				foreach($patient_details as $key=>$patient_data)
				{
					
					if($patient_data->patient_gender==1)
					{
						$gender='Male';
					}
					else
					{
						$gender='Female';
					}
					$name=$patient_data->patient_name;
					$patient_name = str_replace("\'","'", $name);	
					?>
					<div class="row-fluid">
                        <div class="span6">
                            <div class="peoplewrapper">
                                <div class="thumb"></div>
                                <div class="peopleinfo">
                                    <h4><a href="#"><?php echo $patient_name;?></a></h4>
                                    <ul>
										 
                                       <!-- <li><span>Patient ID:</span> <?php echo $patient_data->patient_id;?> </li>-->
                                        <li><span>Contact No.:</span> <?php echo $patient_data->patient_contact;?></li>
                                        <!--<li><span>Email ID :</span><?php echo $patient_data->patient_email;?></li>-->
                                        <li><span>Gender</span> <?php echo $gender;?></li>
										 <li><span><a href="<?php echo base_url()."index.php/patient/patient_personal_info/".$patient_data->patient_id; ?>">View Details</a></span> </li>
                                    </ul>
                                </div><!--peopleinfo-->
                            </div><!--peoplewrapper-->
                        </div><!--span6-->
                        
					
					<?php	
				}
				?>
               </div><!--row-fluid-->
                    
                    
                    
                </div><!--peoplelist-->
                
			
<?php include_once('footer.php');?>			