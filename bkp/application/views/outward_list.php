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
<style type="text/css">
.clickable {
    cursor: pointer;
}

.right-col {
    text-align: center;
}

</style>
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

    jQuery(document).ready(function() {
    jQuery('.deliverable-infos').hide();
    jQuery('.dropdown-deliverable').on('click', function(e) {
        console.log("dropdown toggled!");
        e.preventDefault();
        e.stopPropagation();
        //get targeted element via data-for attribute
        var dataFor = jQuery(this).data('for');
        var idFor = jQuery(dataFor);
        idFor.slideToggle();
    }); 
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
            <li>View Outwards</li>
            
            
        </ul>
<div class="pageheader">
            <!--<form action="http://themepixels.com/main/themes/demo/webpage/shamcey/results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>-->
                       
			 <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                <h5>&nbsp;</h5>
                <h1> View Outwards</h1>
            </div>
</div>
 <div class="maincontent">
            <div class="maincontentinner">
            
               
                
                
               <div class="table-responsive">
    <table class="table table-condensed table table-bordered responsive dataTable">
        <thead>
            <tr>
                <th>Item</th>
                <th>Inwards Qty</th>
                <th>Outwards Qty</th>
                <th>Balance Qty</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
//print_r($listofuser);

if(is_array($listofinwards) && !empty($listofinwards)):
foreach($listofinwards as $group_data):

                $producId=$group_data->invt_product;
                $outward=$this->myclass->select("sum(out_qty) as outqty","bs_outwards","out_product='$producId'");
                $avaliable=($group_data->inqty)-($outward[0]->outqty);

                $outdata=$this->myclass->select("out_id,out_qty,out_date","bs_outwards","out_product='$producId'");
?>


                <tr class="clickable warning dropdown-deliverable" data-for="#details_<?php echo $group_data->invt_id;?>">
                    <td><?php echo $group_data->drags_name;?></td>
                    <td><?php echo $group_data->inqty;?></td>
                    <td><?php echo $outward[0]->outqty;?></td>
                    <td><span class="label label-info"><?php echo $avaliable;?></span></td>
                </tr>
                <tr style="padding:0">
                    <td style="padding:0"></td>
                    <td colspan=2 style="padding:0px;">
                        <div class="deliverable-infos" id="details_<?php echo $group_data->invt_id;?>">
                            <table class="table table-condensed table-user-content" id="hidden_table_1">
                                <tbody>
                                     <tr>
                                        <th>Outward date :</th>
                                        <th class="right-col">Quantity</th>
                                    </tr>
                                    
                                    <?php 
                                    foreach($outdata as $outdata)
                                    {    
                                        ?>
                                            <tr>
                                                <td><?php echo date("d-M-Y",strtotime($outdata->out_date));?> :</td>
                                                <td class="right-col"><?php echo $outdata->out_qty;?></td>
                                            </tr>
                                        <?php
                                    }
                                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td style="padding:0"></td>
                    <td style="padding:0"></td>
                </tr>
             <?php
            endforeach;
            endif;
            ?>                      
        </tbody>
    </table>
</div>
                
                <!--<h4 class="widgettitle">Scroll Y Infinite</h4>-->
<?php include_once('footer.php');?>	 