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



$today=date('d-m-Y');
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
		alert(userId);
            var conf = confirm('Continue delete?');
	    if(conf)
        jQuery(this).parents('tr').fadeOut(function(){
		var deluserID=userId.split("-");
		var str="userID="+deluserID[1];
		//alert(str);
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+"index.php/patient/delete_group",
					data:str,
					success:function(ans)
					{
					
						//alert(ans);
						var redirect_page=CI_ROOT+'index.php/patient/group_list';
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


<?php
include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Product Management</a> <span class="separator"></span></li>
            <li>View Category</li>
            
            
        </ul>
<div class="pageheader">
            <!--<form action="http://themepixels.com/main/themes/demo/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>-->
                       
			 <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1> View Category</h1>
            </div>
</div>
 <div class="maincontent">
            <div class="maincontentinner">
            
                <h4 class="widgettitle">Category List</h4>
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
                          	<th class="head0 nosort" style="align: center;">Category &nbsp; Name</th>
                            <th class="head1" style="align: center;">Status</th>
                            <th class="head0">Option</th>
                        </tr>
                    </thead>
					<tbody>
<?php
//print_r($listofuser);

if(is_array($listofgroup) && !empty($listofgroup)):
foreach($listofgroup as $group_data):

if($group_data->group_status==1)
{
	$group_status='Enable';
}
else
{
	$group_status='Disable';
}

?>
    
                    
                        <tr class="gradeX">
                          
                            <td><?php echo $group_data->group_name;?></td>
                            <td class="center"><?php echo $group_status;?></td>
                            <td class="center"><!--<a class="deleterow" id='del-<?php echo $group_data->group_id;?>' title='Delete Brand'><span class="icon-trash"></span></a>&nbsp;&nbsp;&nbsp;--><a href='<?php echo base_url();?>index.php/patient/edit_group/<?php echo $group_data->group_id;?>' class="icon-pencil" title='Edit Brand'></i></a>&nbsp;&nbsp;&nbsp;</td>
                        </tr>
              
<?php
endforeach;
endif;
?>						
                    </tbody>
                </table>
                
               
                
                <!--<h4 class="widgettitle">Scroll Y Infinite</h4>-->
<?php include_once('footer.php');?>	  