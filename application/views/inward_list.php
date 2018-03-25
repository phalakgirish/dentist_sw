<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Payment</title>
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
		//alert(userId);
            var conf = confirm('Continue delete?');
	    if(conf)
        jQuery(this).parents('tr').fadeOut(function(){
		var deluserID=userId.split("-");
		var str="userID="+deluserID[1];
		
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+"index.php/Inventory/delete_inwards",
					data:str,
					success:function(ans)
					{
					
						//alert(ans);
						var redirect_page=CI_ROOT+'index.php/Inventory/inwards_list';
						//window.location.href=redirect_page;
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
            <li><a href="forms.html">Inventory Management</a> <span class="separator"></span></li>
            <li>View Inwards</li>
            
            
        </ul>
<div class="pageheader">
            <!--<form action="http://themepixels.com/main/themes/demo/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>-->
                       
			 <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1> View Inwards</h1>
            </div>
</div>
 <div class="maincontent">
            <div class="maincontentinner">
            
                <h4 class="widgettitle">Inwards List</h4>
                <table id="dyntable" class="table table-bordered responsive">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                            <th class="head0 nosort" style="align: center;">Item</th>
                            <th class="head0 nosort" style="align: center;">Puchase Date</th>
                            <th class="head0 nosort" style="align: center;">Unit</th>
                            <th class="head0 nosort" style="align: center;">Quantity</th>
                            <th class="head0 nosort" style="align: center;">Amount</th>
                            <th class="head0">Option</th>
                        </tr>
                    </thead>
					<tbody>
<?php
//print_r($listofuser);

if(is_array($listofinwards) && !empty($listofinwards)):
foreach($listofinwards as $group_data):

?>
    
                    
                        <tr class="gradeX">
                          <td class="aligncenter"><span class="center">
                            <input type="checkbox" value='<?php echo $group_data->invt_id;?>' />
                          </span></td>
                            <td><?php echo $group_data->drags_name;?></td>
                            <td class="center"><?php echo date('d-M-Y',strtotime($group_data->invt_podate));?></td>
                            <td class="center"><?php echo $group_data->invt_unit;?></td>
                            <td class="center"><?php echo $group_data->invt_qty;?></td>
                            <td class="center"><?php echo $group_data->invt_amt;?></td>
                            <td class="center"><a class="deleterow" id='del-<?php echo $group_data->invt_id;?>' title='Delete Inwards'><span class="icon-trash"></span></a>&nbsp;&nbsp;&nbsp;<a href='<?php echo base_url();?>index.php/Inventory/edit_inwards/<?php echo $group_data->invt_id;?>' class="icon-pencil" title='Edit Inwards'></i></a>&nbsp;&nbsp;&nbsp;</td>
                        </tr>
              
<?php
endforeach;
endif;
?>						
                    </tbody>
                </table>
                
               
                
                <!--<h4 class="widgettitle">Scroll Y Infinite</h4>-->
<?php include_once('footer.php');?>	 