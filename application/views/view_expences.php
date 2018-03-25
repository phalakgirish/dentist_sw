<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Expences</title>
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
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+"index.php/patient/delete_expence",
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
</head>
<body>


<?php
include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Account Management</a> <span class="separator"></span></li>
            <li>View Expences</li>
            
            
        </ul>
<div class="pageheader">
            <!--<form action="http://themepixels.com/main/themes/demo/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>-->
                       
			 <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1> View Expences</h1>
            </div>
</div>
 <div class="maincontent">
            <div class="maincontentinner">
            
                <h4 class="widgettitle">Expences List</h4>
                <table id="dyntable" class="table table-bordered responsive">
                    <colgroup>
                       <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort" style="align: center;">Ref. No.</th>
							<th class="head0 nosort" style="align: center;">Expences Type</th>
							<th class="head0 nosort" style="align: center;">Name</th>
							<th class="head0 nosort" style="align: center;">Narration</th>
							<th class="head0 nosort" style="align: center;">Amount</th>
                            <th class="head0 nosort" style="align: center;">Date</th>
							<th class="head1">Option</th>
                        </tr>
                    </thead>
					<tbody>
<?php
//print_r($listofuser);
$staff_clinic_id=$this->session->userdata('staff_clinic_id');
$listofexpencs=$this->myclass->select("expn_id,expn_refno,sub_groupname,expn_name,expn_amt,expn_desc,expn_time","bs_subgroup,bs_expences","expn_exptype=subgroup_id AND expn_clinic_id='$staff_clinic_id'");
if(is_array($listofexpencs) && !empty($listofexpencs)):
foreach($listofexpencs as $group_data):



?>
    
                    
                        <tr class="gradeX">
                         
                            <td><?php echo $group_data->expn_refno;?></td>
                            <td><?php echo $group_data->sub_groupname;?></td>
							<td><?php echo $group_data->expn_name;?></td>
							<td><?php echo $group_data->expn_desc;?></td>
							<td><?php echo $group_data->expn_amt;?></td>
							<td><?php 
							$exp_date=date('d-M-Y H:i:s',strtotime($group_data->expn_time));
							echo $exp_date;?></td>
							<td class="center">
								<a class="deleterow deleterow_exp" id='del-<?php echo $group_data->expn_id;?>' title='Delete Expences'><span class="icon-trash"></span></a>
								</td>
                        </tr>
              
<?php
endforeach;
endif;
?>						
                    </tbody>
                </table>
                
               
                
                <!--<h4 class="widgettitle">Scroll Y Infinite</h4>-->
<?php include_once('footer.php');?>	  