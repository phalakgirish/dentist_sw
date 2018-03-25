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
echo my_file("bootstrap.min",2);
echo my_file("jquery.uniform.min",2);
echo my_file("jquery.dataTables.min",2);
echo my_file("jquery.cookie",2);
echo my_file("modernizr.min",2);
echo my_file("responsive-tables",2);
echo my_file("jquery.slimscroll",2);
echo my_file("custom",2);
echo my_file("apps_js/patient",2);

$staff_clinic_id=$this->session->userdata('staff_clinic_id');
$patient_details	=$this->myclass->select("patient_id,patient_name,patient_gender,patient_contact,patient_email","bs_patient"," patient_clinic_id='$staff_clinic_id' ORDER BY patient_name");
?>
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
		
	if(jQuery('.deleterow').length > 0) 
	{
		/* jQuery('.deleterow').live("click",function(){
			alert(34);
		}); */
	
      jQuery('.deleterow').live("click",function(){
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
					url:CI_ROOT+"index.php/patient/delete_patient",
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
        

jQuery(".get_reminder").live("click",function(){
	var patient_id=jQuery(this).attr("id");

	jQuery("#reminder_patient_id").val(patient_id);
	
});
jQuery(".delete_reminder").live("click",function(){
	
	var userId=jQuery(this).attr('id');
		//alert(userId);
            var conf = confirm('Continue delete reminder call?');
	    if(conf)
		var deluserID=userId.split("-");
		var str="userID="+deluserID[1];
		//alert(str);
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+"index.php/patient/delete_reminder",
					data:str,
					success:function(ans)
					{
						alert(ans);
						location.reload();
					}
					
		
		}); 
		
		// do some other stuff here
	    });
	   
    });
</script>

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
			
				
                <table id="dyntable" class="table table-bordered responsive">
                    <colgroup>
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort">Patient Name</th>
							<th class="head0 nosort">Contact No.</th>
							<th class="head0">Gender</th>
							<th class="head0">Options</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						if(is_array($patient_details))
						{
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
							<tr class="gradeX">
							 
								<td><a href='<?php echo base_url()."index.php/patient/patient_personal_info/".$patient_data->patient_id; ?>'  title='View Patient Details'><?php echo $patient_name;?></a></td>
								<td><?php echo $patient_data->patient_contact;?></td>
								 <td><?php echo $gender;?></td>
								<td class="center"><a class="get_reminder"  id='<?php echo $patient_data->patient_id;?>' href="#myreminder"  data-toggle="modal"><div class="icon-bell get_reminder" title='Set Reminder call' id="<?php echo $patient_data->patient_id;?>"></div></a>&nbsp;&nbsp;&nbsp; 
								 
								
								<?php
								
				if($staff_type==1)
				{
				?><a class="deleterow" id='del-<?php echo $patient_data->patient_id;?>' title='Delete Patient'><span class="icon-trash"></span></a><?php }?>&nbsp;&nbsp;&nbsp;</td>
							</tr>
							
						<?php
							}
						}	
						else
						{
							echo "Patient Not Found";
						}
					?>
                       
                        
                    </tbody>
                </table>
                <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="myreminder">
		
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
        <h3 id="myModalLabel">Set Reminder Call</h3>
    </div>
	<form method='post' action="<?php echo base_url()."index.php/patient/set_reminder"; ?>">
		<div class="modal-body">
		<input type="hidden" name="reminder_patient_id" id="reminder_patient_id" >
			<h4>Date : <input type="date" name="reminder_date" ></h4>
			<h4>Time : <input type="time" name="reminder_time" ></h4>
			</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn">Close</button>
			<input type='submit' class="btn btn-primary" value='Submit'> 
		</div>
	</form>
</div><!--#myModal-->	
			
<?php include_once('footer.php');?>			