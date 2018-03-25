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
echo my_file("apps_js/clinic",2);
?>


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
		var str="clinic_id="+deluserID[1];
		//alert(str);
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+"index.php/welcome/delete_record",
					data:str,
					success:function(ans)
					{
						//alert(ans);
						var redirect_page=CI_ROOT+'index.php/welcome/clinic_list';
						window.location.href=redirect_page;
						//jQuery(this).remove();
					}
					
		
		}); 
		
		// do some other stuff here
	    });
	    return false;
	});	 
    }	
        
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
            <li><a href="table-static.html">Clinic Management</a> <span class="separator"></span></li>
            <li>View clinic</li>
           
        </ul>
        
        <div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                 <h5>&nbsp;</h5>
                <h1>View Clinic</h1>
            </div>
        </div><!--pageheader-->
		<ul class="list-nostyle list-inline">
			<li><a href="<?php echo base_url()."index.php/welcome/new_clinic" ?>" class="btn btn-primary btn-rounded"> <i class="iconsweets-pencil iconsweets-white"></i>  &nbsp; Add New</a></li>
		</ul>
		<?php
			$listofclinic=$this->myclass->select("clinic_id,clinic_name,loc_name,clinic_con_person,clinic_mobile,clinic_email,clinic_status","bs_clinic,bs_location","loc_id=clinic_locid");
		?>
        <div class="maincontent">
            <div class="maincontentinner">
            
                <h4 class="widgettitle">View Clinic</h4>
                <table id="dyntable" class="table table-bordered responsive">
                    <colgroup>
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort">Clinic Name</th>
                            <th class="head1">Location</th>
                            <th class="head0">Contact person</th>
                            <th class="head1">Mobile No.</th>
                            <th class="head0">Email ID</th>
							<th class="head1">Status</th>
							<th class="head0">Option</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
						foreach($listofclinic as $clinic)
						{
							if($clinic->clinic_status==1)
							{
								$status='Active';
							}
							else
							{
								$status='Deactive';
							}
					?>
                        <tr class="gradeX">
                          
                            <td><a href='<?php echo base_url();?>index.php/welcome/clinic_edit/<?php echo $clinic->clinic_id;?>' title='Edit Clinic'><?php echo $clinic->clinic_name;?></a></td>
                            <td><?php echo $clinic->loc_name;?></td>
                            <td><?php echo $clinic->clinic_con_person;?></td>
                            <td><?php echo $clinic->clinic_mobile;?></td>
                            <td><?php echo $clinic->clinic_email;?></td>
							<td><?php echo $status;?></td>
							<td class="center"><a href='<?php echo base_url()."index.php/welcome/clinicinside/".$clinic->clinic_id; ?>' class="icon-eye-open" title='View Patient Details'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="deleterow" id='del-<?php echo $clinic->clinic_id;?>' title='Delete Clinic'><span class="icon-trash"></span></a></td>
							
                        </tr>
					<?php
						}
					?>
                       
                        
                    </tbody>
                </table>
                
                <br /><br />
                
                <!--<h4 class="widgettitle">Scroll Y Infinite</h4>-->
                
                <?php include_once('footer.php');?>	
