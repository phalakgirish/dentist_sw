
<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Payment</title>

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
echo my_file("apps_js/app_group",2);

echo my_file("responsive-tables",1);
echo my_file("jquery.dataTables.min",2);

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
       
    // delete row in a table
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
					url:CI_ROOT+"index.php/patient/delete_product_record",
					data:str,
					success:function(ans)
					{
					
						//alert(ans);
						var redirect_page=CI_ROOT+'index.php/patient/subgroup_list';
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
<?php
include_once('sidebar.php');

?>
</head>
<body>

<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Account Management</a> <span class="separator"></span></li>
            <li>View Sub-Group</li>
            
            
        </ul>
<div class="pageheader">
            <!--<form action="http://themepixels.com/main/themes/demo/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>-->
                       
			 <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1> View Sub-Group</h1>
            </div>
</div>
 <div class="maincontent">
            <div class="maincontentinner">
            
                <h4 class="widgettitle">Sub-Group List</h4>
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
                          	<th class="head0 nosort" style="align: center;">Group &nbsp; Name</th>
                            <th class="head0 nosort" style="align: center;">SubGroup &nbsp; Name</th>
                            <th class="head1" style="align: center;">Status</th>
                            <th class="head0">Option</th>
                        </tr>
                    </thead>
					<tbody>
<?php
//print_r($listofproduct);

if(is_array($listofgroup) && !empty($listofgroup)):
foreach($listofgroup as $product_data):

if($product_data->subgroup_status==1)
{
	$pro_status='Enable';
}
else
{
	$pro_status='Disable';
}

?>
    
                    
                        <tr class="gradeX">
                          
                          <td><?php echo $product_data->group_name;?></td>
                            <td><?php echo $product_data->sub_groupname;?></td>
							<td class="center"><?php echo $pro_status;?></td>
                            <td class="center"><a class="deleterow" id='del-<?php echo $product_data->subgroup_id;?>' title='Delete Subcategory'><span class="icon-trash"></span></a>&nbsp;&nbsp;&nbsp;<a href='<?php echo base_url();?>index.php/patient/edit_subgroup/<?php echo $product_data->subgroup_id;?>' class="icon-pencil" title='Edit Subcategory'></i></a>&nbsp;&nbsp;&nbsp;</td>
                        </tr>
              
<?php
endforeach;
endif;
?>						
                    </tbody>
                </table>
<?php include_once('footer.php');?>	                    