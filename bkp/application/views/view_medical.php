<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles- View Drugs</title>
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
echo my_file("apps_js/drags",2);
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
            <li>View Medical</li>
           
        </ul>
        
        <div class="pageheader">
            
            <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                 <h5>&nbsp;</h5>
                <h1>View Medical</h1>
            </div>
        </div><!--pageheader-->
		<ul class="list-nostyle list-inline">
			<li><a href="<?php echo base_url()."welcome/new_medical" ?>" class="btn btn-primary btn-rounded"> <i class="iconsweets-pencil iconsweets-white"></i>  &nbsp; Add Medical</a></li>
		</ul>
		
        <div class="maincontent">
		<div class="maincontentinner">
            <?php
$listofmedical=$this->myclass->select("med_id,med_name,med_desc,med_status","bs_medical","1");

		?>
                <h4 class="widgettitle">View Medical</h4>
                <table id="dyntable" class="table table-bordered responsive">
                    <colgroup>
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort">Medical Name</th>
							<th class="head0 nosort">Medical Description</th>
							<th class="head0">Medical Status</th>
							<th class="head0">Options</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						if(is_array($listofmedical))
						{
						foreach($listofmedical as $medical)
						{
							if($medical->med_status==1)
							{
								$status='Active';
							}
							else
							{
								$status='Deactive';
							}
							
					?>
						<tr class="gradeX">
                          
                            <td><a href='<?php echo base_url();?>index.php/welcome/medical_edit/<?php echo $medical->med_id;?>' title='Edit Drugs'><?php echo $medical->med_name; ?></a></td>
                            <td><?php echo $medical->med_desc;?></td>
							 <td><?php echo $status;?></td>
                            <td class="center"><a class="deleterow" id='del-<?php echo $medical->med_id;?>' title='Delete Medical'><span class="icon-trash"></span></a></td>
                        </tr>
						
					<?php
						}
						}	
						else
						{
							echo "Data Not Found";
						}
					?>
                       
                        
                    </tbody>
                </table>
				
				
                
                
                <!--<h4 class="widgettitle">Scroll Y Infinite</h4>-->
                
                <?php include_once('footer.php');?>	
