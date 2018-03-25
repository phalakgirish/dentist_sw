<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles- Clinic Registration</title>
<?php
echo my_file("style.default",1);
echo my_file("style",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("modernizr.min",2);
echo my_file("bootstrap.min",2);
echo my_file("jquery.cookie",2);
echo my_file("jquery.uniform.min",2);
echo my_file("jquery.validate.min",2);
echo my_file("jquery.tagsinput.min",2);
echo my_file("custom",2);
echo my_file("apps_js/patient",2);
?>
<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="<?php echo base_url();?>public/css1/datepicker.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>public/js1/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css1/bootstrap-datepicker.css" />
</head>
</head>
<body>
<?php 
echo my_file("apps_js/jquery.canvasAreaDraw",2);
$session_data = $this->session->all_userdata();
$view_patientid=$session_data['view_patientid'];
$patient_name=$session_data['patient_name'];
$patient_name = str_replace("\'","'",$patient_name);
include_once('sidebar.php');
?>
<script>
jQuery(document).ready(function(){
jQuery(".teethno").click(function(){
	var teethno=$(this).attr("ID");
	jQuery("#tooth_no").val(teethno);
	
});
jQuery(".dignosis_editbtn").click(function(){
	var teethno=$(this).attr("ID");
	jQuery("#diagnosis_id").val(teethno);
});

jQuery(".plan_teethno").click(function(){
	var teethno=$(this).attr("ID");
	jQuery("#plan_tooth_no").val(teethno);
	
});

jQuery(".plan_editbtn").click(function(){
	var teethno=$(this).attr("ID");
	jQuery("#plan_id").val(teethno);
});

jQuery(".done_teethno").click(function(){
	var teethno=$(this).attr("ID");
	jQuery("#done_tooth_no").val(teethno);
});

jQuery(".done_editbtn").click(function(){
	var teethno=$(this).attr("ID");
	jQuery("#done_id").val(teethno);
});
	if(jQuery('.deleterow').length > 0) 
	{
	
      jQuery('.deleterow').live("click",function(){
		var userId=jQuery(this).attr('id');
		var conf = confirm('Continue delete?');
	    if(conf)
        jQuery(this).parents('tr').fadeOut(function(){
		var deluserID=userId.split("-");
		var str="userID="+deluserID[1];
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+"index.php/treatment/delete_dignosis",
					data:str,
					success:function(ans)
					{
						location.reload();
					}
		}); 
		});
	    return false;
	});	 
    }
if(jQuery('.deleterow_plan').length > 0) 
	{
			
      jQuery('.deleterow_plan').live("click",function(){
		var userId=jQuery(this).attr('id');
		//alert(userId);
            var conf = confirm('Continue delete?');
	    if(conf)
        jQuery(this).parents('tr').fadeOut(function(){
		var deluserID=userId.split("-");
		var str="userID="+deluserID[1];
		//alert(str);
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+"index.php/treatment/delete_plan",
					data:str,
					success:function(ans)
					{
						location.reload();
					}
					
		
		}); 
		
		// do some other stuff here
	    });
	    return false;
	});	 
    }

	
	if(jQuery('.deleterow_done').length > 0) 
	{
		jQuery('.deleterow_done').live("click",function(){
		var userId=jQuery(this).attr('id');
		var conf = confirm('Continue delete?');
	    if(conf)
        jQuery(this).parents('tr').fadeOut(function(){
		var deluserID=userId.split("-");
		var str="userID="+deluserID[1];
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+"index.php/treatment/delete_done",
					data:str,
					success:function(ans)
					{
						location.reload();
					}
					
		
		}); 
		
		// do some other stuff here
	    });
	    return false;
	});	 
    }
});


</script>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Patient Management</a> <span class="separator"></span></li>
            <li>Patient Diagnosis and treatment</li>
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1>Patient Diagnosis and treatment</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
			<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"><?php echo validation_errors(); ?></span>
							</div>
					</div>
            <div class="widgetbox ">
			
                <h4 class="widgettitle">Patient Diagnosis and treatment </h4>
                <div class="widgetcontent nopadding">
							<p>
							<center><h4>Patient Name: <?php echo $patient_name; ?></h4></center>
                                <label>Dignosis </label>                               
<div class="dentalwrapper">
        	<img src="<?php echo base_url()?>public/images/dental_structure.jpg" alt="" />
			
			<a class="teethno" href="#myModal" id="48" data-toggle="modal"><div class="fortyeight teethno" id="48"></div> </a>
			
			<a class="teethno" href="#myModal" id="47" data-toggle="modal"><div class="fortyseven teethno" id="47"></div></a>
            
            <a class="teethno" href="#myModal" id="46" data-toggle="modal"><div class="fortysix teethno" id="46"></div></a>
			
            <a class="teethno" href="#myModal" id="45" data-toggle="modal"><div class="fortyfive teethno" id="45"></div></a>
            <a class="teethno" href="#myModal" id="44" data-toggle="modal"><div class="fortyfour teethno" id="44"></div></a>
            <a class="teethno" href="#myModal" id="43" data-toggle="modal"><div class="fortythree teethno" id="43"></div></a>
            <a class="teethno" href="#myModal" id="42" data-toggle="modal"><div class="fortytwo teethno" id="42"></div></a>
            <a class="teethno" href="#myModal" id="41" data-toggle="modal"><div class="fortyone teethno" id="41"></div></a>
            
            <a class="teethno" href="#myModal" id="31" data-toggle="modal"><div class="thirtyone teethno" id="31"></div></a>
            <a class="teethno" href="#myModal" id="32" data-toggle="modal"><div class="thirtytwo teethno" id="32"></div></a>
            <a class="teethno" href="#myModal" id="33" data-toggle="modal"><div class="thirtythree teethno"id="33"></div></a>
            <a class="teethno" href="#myModal" id="34" data-toggle="modal"><div class="thirtyfour teethno" id="34"></div></a>
            <a class="teethno" href="#myModal" id="35" data-toggle="modal"><div class="thirtyfive teethno"id="35"></div></a>
            <a class="teethno" href="#myModal" id="36" data-toggle="modal"><div class="thirtysix teethno" id="36"></div></a>
            <a class="teethno" href="#myModal" id="37" data-toggle="modal"><div class="thirtyseven teethno" id="37"></div></a>
            <a class="teethno" href="#myModal" id="38" data-toggle="modal"><div class="thirtyeight teethno" id="38"></div></a>
            
            <a class="teethno" href="#myModal" id="18" data-toggle="modal"><div class="eighteen teethno" id="18"></div></a>
            <a class="teethno" href="#myModal" id="17" data-toggle="modal"><div class="seventeen teethno" id="17"></div></a>
            <a class="teethno" href="#myModal" id="16" data-toggle="modal"><div class="sixteen teethno" id="16"></div></a>
            <a class="teethno" href="#myModal" id="15" data-toggle="modal"><div class="fifteen teethno" id="15"></div></a>
            <a class="teethno" href="#myModal" id="14" data-toggle="modal"><div class="fourteen teethno" id="14"></div></a>
            <a class="teethno" href="#myModal" id="13" data-toggle="modal"><div class="thirteen teethno" id="13"></div></a>
            <a class="teethno" href="#myModal" id="12" data-toggle="modal"><div class="twelve teethno" id="12"></div></a>
            <a class="teethno" href="#myModal" id="11" data-toggle="modal"><div class="eleven teethno"id="11"></div></a>
            
            <a class="teethno" href="#myModal" id="21" data-toggle="modal"><div class="twentyone teethno" id="21"></div></a>
            <a class="teethno" href="#myModal" id="22" data-toggle="modal"><div class="twentytwo teethno" id="22"></div></a>
            <a class="teethno" href="#myModal" id="23" data-toggle="modal"><div class="twentythree teethno"id="23"></div></a>
            <a class="teethno" href="#myModal" id="24" data-toggle="modal"><div class="twentyfour teethno" id="24"></div></a>
            <a class="teethno" href="#myModal" id="25" data-toggle="modal"><div class="twentyfive teethno" id="25"></div></a>
            <a class="teethno" href="#myModal" id="26" data-toggle="modal"><div class="twentysix teethno" id="26"></div></a>
            <a class="teethno" href="#myModal" id="27" data-toggle="modal"><div class="twentyseven teethno" id="27"></div></a>
            <a class="teethno" href="#myModal" id="28" data-toggle="modal"><div class="twentyeight teethno" id="28"></div></a>
        </div>
									
                            </p>
							<p>
				<table id="dyntable" class="table table-bordered responsive">
                    <thead>
                        <tr>
                          	
                            <th class="head0 nosort" style="width:10px;">Sr.No.</th>
                            <th class="head1" style="width:10%;">Date</th>
                            <th class="head0" style="width:10%;">Tooth No./Area</th>
                            <th class="head1" style="width:30%;">Dignosis</th>
                            <th class="head0">Comments</th>
							
							<th class="head0">Option</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						
						
						$diagnosis=$this->myclass->select("diagnosis_id,diagnosis_patient_id,diagnosis_staff_id,diagnosis_tooth_no,diagnosis_date,diagnosis_diagnosis,diagnosis_comments,diagnosis_time","bs_dignosis","diagnosis_patient_id='$view_patientid'");
						if(is_array($diagnosis))
						{
							$i=1;
							foreach($diagnosis as $diagnosis_data)
							{
						?>
							<tr class="gradeX">
								<td><?php echo $i;?></td>
								<td><?php echo $diagnosis_data->diagnosis_date;?></td>
								<td><?php echo $diagnosis_data->diagnosis_tooth_no;?></td>
								 
								 <td><?php echo $diagnosis_data->diagnosis_diagnosis;?></td>
								 <td><?php echo $diagnosis_data->diagnosis_comments;?></td>
								 
								<td class="center">
	<a class="dignosis_edit" href="#dignosis_edit" id="<?php echo $diagnosis_data->diagnosis_id; ?>" data-toggle="modal"><div class="dignosis_editbtn icon-pencil" id="<?php echo $diagnosis_data->diagnosis_id; ?>"></div></a>
	<a class="deleterow" id='del-<?php echo $diagnosis_data->diagnosis_id;?>' title='Delete Patient'><span class="icon-trash"></span></a>
	&nbsp;&nbsp;&nbsp;</td>
							</tr>
						<?php
							$i++;
							}
						}	
						else
						{
							echo "Diagnosis Not Found";
						}
					?>
                       
                        
                    </tbody>
                </table>
							<form method="post"  action="<?php echo base_url()."index.php/treatment/export_diagnosis"; ?>">
					<input type='submit' id='export_ledger' style="float: right;" class="btn btn-primary" value='Export Diagnosis'> 
				</form>
							
                               
							<center><h4>Treatment Plan/Suggestion</h4></center>
                               
                                
<div class="dentalwrapper">
        	<img src="<?php echo base_url()?>public/images/dental_structure.jpg" alt="" />
			
			<a class="teethno" href="#myPlan" id="48" data-toggle="modal"><div class="fortyeight plan_teethno" id="48"></div></a>
			<a class="plan_teethno" href="#myPlan" id="47" data-toggle="modal"><div class="fortyseven plan_teethno" id="47"></div></a>
			
            
            
            <a class="plan_teethno" href="#myPlan" id="46" data-toggle="modal"><div class="fortysix plan_teethno" id="46"></div></a>
            <a class="plan_teethno" href="#myPlan" id="45" data-toggle="modal"><div class="fortyfive plan_teethno" id="45"></div></a>
            <a class="plan_teethno" href="#myPlan" id="44" data-toggle="modal"><div class="fortyfour plan_teethno" id="44"></div></a>
            <a class="plan_teethno" href="#myPlan" id="43" data-toggle="modal"><div class="fortythree plan_teethno" id="43"></div></a>
            <a class="plan_teethno" href="#myPlan" id="43" data-toggle="modal"><div class="fortytwo plan_teethno" id="42"></div></a>
            <a class="plan_teethno" href="#myPlan" id="41" data-toggle="modal"><div class="fortyone plan_teethno" id="41"></div></a>
            
            <a class="plan_teethno" href="#myPlan" id="31" data-toggle="modal"><div class="thirtyone plan_teethno" id="31"></div></a>
            <a class="plan_teethno" href="#myPlan" id="32" data-toggle="modal"><div class="thirtytwo plan_teethno" id="32"></div></a>
            <a class="plan_teethno" href="#myPlan" id="33" data-toggle="modal"><div class="thirtythree plan_teethno" id="33"></div></a>
            <a class="plan_teethno" href="#myPlan" id="34" data-toggle="modal"><div class="thirtyfour plan_teethno" id="34"></div></a>
            <a class="plan_teethno" href="#myPlan" id="35" data-toggle="modal"><div class="thirtyfive plan_teethno" id="35"></div></a>
            <a class="plan_teethno" href="#myPlan" id="36" data-toggle="modal"><div class="thirtysix plan_teethno" id="36"></div></a>
            <a class="plan_teethno" href="#myPlan" id="37" data-toggle="modal"><div class="thirtyseven plan_teethno" id="37"></div></a>
            <a class="plan_teethno" href="#myPlan" id="38" data-toggle="modal"><div class="thirtyeight plan_teethno" id="38"></div></a>
            
            <a class="plan_teethno" href="#myPlan" id="18" data-toggle="modal"><div class="eighteen plan_teethno"id="18"></div></a>
            <a class="plan_teethno" href="#myPlan" id="17" data-toggle="modal"><div class="seventeen plan_teethno" id="17"></div></a>
            <a class="plan_teethno" href="#myPlan" id="16" data-toggle="modal"><div class="sixteen plan_teethno" id="16"></div></a>
            <a class="plan_teethno" href="#myPlan" id="15" data-toggle="modal"><div class="fifteen plan_teethno" id="15"></div></a>
            <a class="plan_teethno" href="#myPlan" id="14" data-toggle="modal"><div class="fourteen plan_teethno" id="14"></div></a>
            <a class="plan_teethno" href="#myPlan" id="13" data-toggle="modal"><div class="thirteen plan_teethno" id="13"></div></a>
            <a class="plan_teethno" href="#myPlan" id="12" data-toggle="modal"><div class="twelve plan_teethno" id="12"></div></a>
            <a class="plan_teethno" href="#myPlan" id="11" data-toggle="modal"><div class="eleven plan_teethno" id="11"></div><a/>
            
            <a class="plan_teethno" href="#myPlan" id="21" data-toggle="modal"><div class="twentyone plan_teethno"id="21"></div></a>
            <a class="plan_teethno" href="#myPlan" id="22" data-toggle="modal"><div class="twentytwo plan_teethno" id="22"></div></a>
            <a class="plan_teethno" href="#myPlan" id="23" data-toggle="modal"><div class="twentythree plan_teethno"id="23"></div></a>
            <a class="plan_teethno" href="#myPlan" id="24" data-toggle="modal"><div class="twentyfour plan_teethno"id="24"></div></a>
            <a class="plan_teethno" href="#myPlan" id="25" data-toggle="modal"><div class="twentyfive plan_teethno"id="25"></div></a>
            <a class="plan_teethno" href="#myPlan" id="26" data-toggle="modal"><div class="twentysix plan_teethno"id="26"></div></a>
            <a class="plan_teethno" href="#myPlan" id="27" data-toggle="modal"><div class="twentyseven plan_teethno" id="27"></div></a>
            <a class="plan_teethno" href="#myPlan" id="28" data-toggle="modal"><div class="twentyeight plan_teethno"id="28"></div></a>
        </div>
									
                            </p>
							<p>
				<table id="dyntable2" class="table table-bordered responsive">
                    
                    <thead>
                         <tr>
                          	
                            <th class="head0 nosort" style="width:10px;">Sr.No.</th>
                            <th class="head0" style="width:10%;">Date</th>
                            <th class="head1" style="width:10%;">Tooth No./Area</th>
                            <th class="head1" style="width:30%;">Plan</th>
                            <th class="head1">Comments</th>
							<th class="head1">Total</th>
							<th class="head0">received</th>
							<th class="head1">outstanding</th>
							<th class="head1">Option</th>
                        </tr>
                    </thead>
                    <tbody>
					
					
                        <?php
						
						
						$plan=$this->myclass->select("plan_id,plan_patient_id,plan_staff_id,plan_tooth_no,plan_date,plan_desc,plan_comments","bs_plan","plan_patient_id='$view_patientid'");
						if(is_array($plan))
						{
							$i=1;
							foreach($plan as $plan_data)
							{
								/*SELECT `payment_amt`,`payment_paidamt`,sum(payment_payable) as reciedamt FROM `bs_payment` where `payment_plan_id`='4' AND `payment_patient_id` = '239'
								*/
								$plan_id=$plan_data->plan_id;
								$payment=$this->myclass->select("payment_plan_id,payment_amt,payment_paidamt,sum(payment_payable) as reciedamt","bs_payment","payment_patient_id='$view_patientid' AND payment_plan_id='$plan_id'");
								
								
								if($payment=='no')
								{
									$tot_paid='0';
									$paidamt='0';
									$paybaleamt=0;
									$outstanding='0';
								}	
								else
								{
									$tot_paid= $payment[0]->payment_amt;
									$paidamt=$payment[0]->reciedamt;
									//$paybaleamt=$payment[0]->received;
									$outstanding=$tot_paid-($paidamt);
									
								}

									
						?>
							<tr class="gradeX">
							  
								<td><?php echo $i;?></td>
								<td><?php echo $plan_data->plan_date;?></td>
								<td><?php echo $plan_data->plan_tooth_no;?></td>
								 
								 <td><?php echo $plan_data->plan_desc;?></td>
								 <td><?php echo $plan_data->plan_comments;?></td>
								 <td><?php echo $tot_paid;?></td>
								 <td><?php echo $paidamt;?></td>
								 <td><?php echo $outstanding;?></td>
								<td class="center">
								<!--
								 <a class="dignosis_edit" id="<?php echo $plan_data->plan_id; ?>" data-toggle="modal"><div class="icon-pencil dignosis_edit" id="<?php echo $plan_data->plan_id; ?>"></div></a>-->
								
								<a class="plan_edit" href="#plan_edit" id="<?php echo $plan_data->plan_id; ?>" data-toggle="modal"><div class="plan_editbtn icon-pencil" id="<?php echo $plan_data->plan_id; ?>"></div></a>
								<a class="deleterow_plan" id='del-<?php echo $plan_data->plan_id;?>' title='Delete Patient'><span class="icon-trash"></span></a>
								&nbsp;&nbsp;&nbsp;<?php
								
						if($staff_type==1)
						{
						?><a  href="<?php echo base_url();?>index.php/patient/payment_form/<?php echo $plan_data->plan_id; ?>" class="icon-shopping-cart" id='del-<?php echo $plan_data->plan_id; ?>' title='Add Payment'></a><?php }?></td>
									</tr>
							
						<?php
							$i++;
							}
						}	
						else
						{
							echo "Plan Not Found";
						}
					?>
                       
                        
                </table>
							
							
                                
							</p>
								<form method="post"  action="<?php echo base_url()."index.php/treatment/export_plan"; ?>">
					<input type='submit' id='export_ledger' style="float: right;" class="btn btn-primary" value='Export Plan'> 
				</form>
							<p>
							
							<center><h4>Treatment Done</h4></center>
                                
<div class="dentalwrapper">
        	<img src="<?php echo base_url()?>public/images/dental_structure.jpg" alt="" />
			
			
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="fortyeight done_teethno" id="48"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="fortyseven done_teethno" id="47"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="fortysix done_teethno" id="46"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="fortyfive done_teethno" id="45"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="fortyfour done_teethno" id="44"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="fortythree done_teethno" id="43"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="fortytwo done_teethno" id="42"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="fortyone done_teethno" id="41"></div></a>
            
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="thirtyone done_teethno" id="31"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="thirtytwo done_teethno"id="32"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="thirtythree done_teethno" id="33"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="thirtyfour done_teethno"id="34"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="thirtyfive done_teethno" id="35"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="thirtysix done_teethno" id="36"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="thirtyseven done_teethno" id="37"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="thirtyeight done_teethno" id="38"></div></a>
            
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="eighteen done_teethno" id="18"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="seventeen done_teethno" id="17"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="sixteen done_teethno"id="16"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="fifteen done_teethno" id="15"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="fourteen done_teethno" id="14"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="thirteen done_teethno" id="13"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="twelve done_teethno" id="12"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="eleven done_teethno" id="11"></div></a>
            
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="twentyone done_teethno" id="21"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="twentytwo done_teethno" id="22"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="twentythree done_teethno" id="23"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="twentyfour done_teethno" id="24"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="twentyfive done_teethno" id="25"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="twentysix done_teethno" id="26"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="twentyseven done_teethno" id="27"></div></a>
            <a class="plan_teethno" href="#myDone" id="28" data-toggle="modal"><div class="twentyeight done_teethno" id="28"></div></a>
        </div>
									
                            </p>
							<p>
				<table id="dyntable3" class="table table-bordered responsive">
                   <thead>
                         <tr>
                          	
                            <th class="head0 nosort" style="width:10px;">Sr.No.</th>
                            <th class="head0" style="width:10%;">Date</th>
                            <th class="head1" style="width:10%;">Tooth No./Area</th>
                            <th class="head1" style="width:30%;">Treatement Done</th>
                            <th class="head1">Comments</th>
							<th class="head1">Option</th>
                        </tr>
                    </thead>
                    <tbody>
					 <?php
						
						
						$done=$this->myclass->select("done_id,done_patient_id,done_staff_id,done_tooth_no,done_date,done_desc,done_comments","bs_treat_done","done_patient_id='$view_patientid'");
						if(is_array($done))
						{
							$i=1;
							foreach($done as $plan_data)
							{
						?>
							<tr class="gradeX">
							  
								<td><?php echo $i;?></td>
								<td><?php echo $plan_data->done_date;?></td>
								<td><?php echo $plan_data->done_tooth_no;?></td>
								 
								 <td><?php echo $plan_data->done_desc;?></td>
								 <td><?php echo $plan_data->done_comments;?></td>
								<td class="center">
								<!--
								 <a class="dignosis_edit" id="<?php echo $plan_data->done_id; ?>" data-toggle="modal"><div class="icon-pencil dignosis_edit" id="<?php echo $plan_data->plan_id; ?>"></div></a>-->
								
								<a class="done_edit" href="#done_edit" id="<?php echo $plan_data->done_id; ?>" data-toggle="modal"><div class="done_editbtn icon-pencil" id="<?php echo $plan_data->done_id; ?>"></div></a>
								<a class="deleterow_done" id='del-<?php echo $plan_data->done_id;?>' title='Delete Treatement Done'><span class="icon-trash"></span></a>
								&nbsp;&nbsp;&nbsp;</td>
							</tr>
							
						<?php
							$i++;
							}
						}	
						else
						{
							echo "Treatement Done Not Found";
						}
					?>
                       
                        
                    </tbody>
                </table>
							
                          
								<form method="post"  action="<?php echo base_url()."index.php/treatment/export_done"; ?>">
					<input type='submit' id='export_ledger' style="float: right;" class="btn btn-primary" value='Export Treatement Done'> 
				</form>
							
							<!--
				<form method="post" action="<?php echo base_url()."index.php/patient/export_ledger"; ?>">
					<input type='submit' id='export_ledger' class="btn btn-primary" value='Export Treatment Ledger'> 
				</form>-->
<!--
<form method="post" action="<?php echo base_url()."index.php/patient/export_advice"; ?>">
					<input type='submit' id='export_ledger' class="btn btn-primary" value='Export Advice'> 
</form>
	-->			
				
					<hr/>
                </div><!--widgetcontent-->
            </div><!--widget-->
			
			
<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="myModal">
		
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
        <h3 id="myModalLabel">Add Dignosis</h3>
    </div>
	<form method='post' action="<?php echo base_url()."index.php/treatment/add_dignosis"; ?>">
		<div class="modal-body">
			<h4>Tooth No./ Area <input type="text" name="tooth_no" id="tooth_no"></h4>
			<h4>Date : <input type="date" name="treat_date" ></h4>
			<h4>Dignosis : <input type="text"  name="treat_dignosis" class=""/></h4>
			<h4>Comments : <textarea name="treat_dig_comment"></textarea></h4>
		</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn">Close</button>
			<input type='submit' class="btn btn-primary" value='Submit'> 
		</div>
	</form>
</div><!--#myModal-->	 

<!-- Diagnosis Edit start-->

<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="dignosis_edit">
	<?php
	
	//$diagnosis=$this->myclass->select("diagnosis_id,diagnosis_patient_id,diagnosis_staff_id,diagnosis_tooth_no,diagnosis_date,diagnosis_diagnosis,diagnosis_comments,diagnosis_time","bs_dignosis","diagnosis_id='$view_patientid'");
	
	//print_r($diagnosis);
	
?>	
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
        <h3 id="myModalLabel">Edit Dignosis</h3>
    </div>
	<form method='post' action="<?php echo base_url()."index.php/treatment/edit_dignosis"; ?>">
		<div class="modal-body">
			<input type="hidden" name="diagnosis_id" id="diagnosis_id"/>
			<h4>Tooth No./ Area <input type="text" name="diagnosis_tooth_no" id="tooth_no"></h4>
			<h4>Date : <input type="date" name="diagnosis_date" ></h4>
			<h4>Dignosis : <input type="text"  name="diagnosis_diagnosis" class=""style="width:300px;"/></h4>
			<h4>Comments : <textarea name="diagnosis_comments"></textarea></h4>
		</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn">Close</button>
			<input type='submit' class="btn btn-primary" value='Submit'> 
		</div>
	</form>
</div><!--Diagnosis Edit end-->
 <!-- Add Plan start-->
<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="myPlan">
		
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
        <h3 id="myModalLabel">Add Plan</h3>
    </div>
	<form method='post' action="<?php echo base_url()."index.php/treatment/add_plan"; ?>">
		<div class="modal-body">
			<h4>Tooth No./ Area <input type="text" name="plan_tooth_no" id="plan_tooth_no"></h4>
			<h4>Date : <input type="date" name="plan_date" ></h4>
			<h4>Plan : <input type="text"  name="plan_desc" class=""/></h4>
			<h4>Comments : <textarea name="plan_comments"></textarea></h4>
		</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn">Close</button>
			<input type='submit' class="btn btn-primary" value='Submit'> 
		</div>
	</form>
</div><!--#myModal-->	
<!--Add Plan End--> 


<!-- Plan Edit start-->

<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="plan_edit">
	<?php
	
	//$diagnosis=$this->myclass->select("diagnosis_id,diagnosis_patient_id,diagnosis_staff_id,diagnosis_tooth_no,diagnosis_date,diagnosis_diagnosis,diagnosis_comments,diagnosis_time","bs_dignosis","diagnosis_id='$view_patientid'");
	
	//print_r($diagnosis);
	
?>	
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
        <h3 id="myModalLabel">Edit Plan</h3>
    </div>
	<form method='post' action="<?php echo base_url()."index.php/treatment/edit_plan"; ?>">
		<div class="modal-body">
			<input type="hidden" name="plan_id" id="plan_id"/>
			<h4>Tooth No./ Area <input type="text" name="plan_tooth_no" id="tooth_no"></h4>
			<h4>Date : <input type="date" name="plan_date" ></h4>
			<h4>Plan : <input type="text"  name="plan_desc" class=""style="width:300px;"/></h4>
			<h4>Comments : <textarea name="plan_comments"></textarea></h4>
		</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn">Close</button>
			<input type='submit' class="btn btn-primary" value='Submit'> 
		</div>
	</form>
</div><!--Diagnosis Edit end-->	

<!--Add Treatments done start-->

<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="myDone">
		
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
        <h3 id="myModalLabel">Add Treatement Done</h3>
    </div>
	<form method='post' action="<?php echo base_url()."index.php/treatment/add_done"; ?>">
		<div class="modal-body">
			<h4>Tooth No./ Area <input type="text" name="done_tooth_no" id="done_tooth_no"></h4>
			<h4>Date : <input type="date" name="done_date" ></h4>
			<h4>Treatment Done : <input type="text"  name="done_desc" class=""/></h4>
			<h4>Comments : <textarea name="done_comments"></textarea></h4>
		</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn">Close</button>
			<input type='submit' class="btn btn-primary" value='Submit'> 
		</div>
	</form>
</div><!--#myModal-->	
<!-- Add treatments done end-->

<!-- Plan Done start-->

<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="done_edit">
	<div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
        <h3 id="myModalLabel">Edit Done</h3>
    </div>
	<form method='post' action="<?php echo base_url()."index.php/treatment/edit_done"; ?>">
		<div class="modal-body">
			<input type="hidden" name="done_id" id="done_id"/>
			<h4>Tooth No./ Area <input type="text" name="done_tooth_no" id="tooth_no"></h4>
			<h4>Date : <input type="date" name="done_date" ></h4>
			<h4>Treatement Done : <input type="text"  name="done_desc" class=""style="width:300px;"/></h4>
			<h4>Comments : <textarea name="done_comments"></textarea></h4>
		</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn">Close</button>
			<input type='submit' class="btn btn-primary" value='Submit'> 
		</div>
	</form>
</div><!--Diagnosis Edit end-->	
			
<?php include_once('footer.php');?>			