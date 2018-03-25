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

$patient_details=$this->myclass->select("quote_id,quote_date,quote_no,quote_name,quote_mobileno,quote_des,quote_price,quote_sub,quote_dis,quote_tot","bs_quote","1 GROUP BY quote_no ORDER BY quote_name");

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
					url:CI_ROOT+"index.php/patient/delete_quote",
					data:str,
					success:function(ans)
					{
						//alert(ans);
						//var redirect_page=CI_ROOT+'index.php/patient/view_patient';
						//window.location.href=redirect_page;
						//jQuery(this).remove();
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
<div id="mainwrapper" class="mainwrapper">
<?php include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Master Management</a> <span class="separator"></span></li>
            <li>List of quotation</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1>List of quotation</h1>
            </div>
        </div><!--pageheader-->
         <ul class="list-nostyle list-inline">
			<li><a href="<?php echo base_url()."index.php/patient/quotation_form" ?>" class="btn btn-primary btn-rounded"> <i class="iconsweets-pencil iconsweets-white"></i>  &nbsp; New quotation</a></li>
			
			
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
                          	<th class="head0 nosort">Quotation No.</th>
							<th class="head0 nosort">Quotation Date.</th>
							<th class="head0 nosort">Name</th>
							<th class="head0 nosort">Contact No.</th>
							<th class="head0">Options</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						if(is_array($patient_details))
						{
							foreach($patient_details as $key=>$patient_data)
							{
									$name=$patient_data->quote_name;
									$patient_name = str_replace("\'","'", $name);	
								
						?>
							<tr class="gradeX">
							  <td class="aligncenter"><span class="center">
								<input type="checkbox"  />
							  </span>
							  </td>
							  <td><a href='<?php echo base_url();?>index.php/patient/quote_edit/<?php echo $patient_data->quote_no;?>'  title='Edit Quotation'><?php echo $patient_data->quote_no;?></a></td>
							  <td><?php echo $patient_data->quote_date;?></td>
								<td><?php echo $patient_name;?></td>
								<td><?php echo $patient_data->quote_mobileno;?></td>
								 
								<td class="center"><a href='<?php echo base_url()."index.php/patient/quotation_print/".$patient_data->quote_no; ?>' class="icon-print" title='Print'></i></a>&nbsp;&nbsp;&nbsp; 
								
								<?php
								
				if($staff_type==1)
				{
				?><a class="deleterow" id='del-<?php echo $patient_data->quote_no;?>' title='Delete Quotation'><span class="icon-trash"></span></a><?php }?>&nbsp;&nbsp;&nbsp; </td>
							</tr>
							
						<?php
							}
						}	
						else
						{
							echo "Quotation Not Found";
						}
					?>
                       
                        
                    </tbody>
                </table>
               
<?php include_once('footer.php');?>			