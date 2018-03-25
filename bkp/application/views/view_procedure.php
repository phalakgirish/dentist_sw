<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Procedure Registration</title>
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
            <li>View Procedure</li>
           
        </ul>
        
        <div class="pageheader">
            <form action="http://themepixels.com/main/themes/demo/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>
            <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                 <h5>&nbsp;</h5>
                <h1>View Procedure</h1>
            </div>
        </div><!--pageheader-->
		<ul class="list-nostyle list-inline">
			<li><a href="<?php echo base_url()."index.php/welcome/new_procedure" ?>" class="btn btn-primary btn-rounded"> <i class="iconsweets-pencil iconsweets-white"></i>  &nbsp; Add New</a></li>
		</ul>
		
        <div class="maincontent">
		 <div class="maincontentinner">
            <?php
			$listofprocess=$this->myclass->select("process_id,process_name,process_status,process_desc","bs_procedure","1");
		?>
                <h4 class="widgettitle">View Procedure</h4>
                <table id="dyntable" class="table table-bordered responsive">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                            <th class="head0 nosort">Procedure Name</th>
                            <th class="head0">Status</th>
							<th class="head0">Options</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						if(is_array($listofprocess))
						{
						foreach($listofprocess as $process)
						{
							if($process->process_status==1)
							{
								$status='Active';
							}
							else
							{
								$status='Deactive';
							}
					?>
						<tr class="gradeX">
                          <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span>
						  </td>
                            <td><?php echo $process->process_name; ?></td>
                            <td><?php echo $status;?></td>
                            <td class="center"><a class="deleterow" id='del-<?php echo $process->process_id;?>' title='Delete Procedure'><span class="icon-trash"></span></a>&nbsp;&nbsp;&nbsp;<a href='<?php echo base_url();?>index.php/welcome/procedure_edit/<?php echo $process->process_id;?>' class="icon-pencil" title='Edit Procedure'></i></a>&nbsp;&nbsp;&nbsp;</td>
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
