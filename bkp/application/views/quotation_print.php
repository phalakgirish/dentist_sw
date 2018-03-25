<!DOCTYPE html>
<html>
<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles - New Qutation</title>
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
echo my_file("apps_js/clinic",2);
?>
</head>
<body>
<?php include_once('sidebar.php');?>
<div class="rightpanel">
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Master Management</a> <span class="separator"></span></li>
            <li>New Quotation</li>
        </ul>
        <div class="pageheader">
           <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1>New Quotation</h1>
            </div>
        </div><!--pageheader-->
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox ">
				<div class="row-fluid">    
                    <div class="span6">
                        <div class="invoice_logo"><img src="<?php echo base_url()."public"."/images/small-logo.jpg" ?>" alt="" class="img-polaroid" /></div>
					<?php
$quote_no;
$details=$this->myclass->select("*","bs_quote","quote_no='$quote_no'");

?>					
					<table class="table table-bordered table-invoice">
					
                            <tr>
                                <td class="width30">Quotation No.:</td>
                                <td class="width70"><strong><?php echo $details[0]->quote_no; ?></strong></td>
                            </tr>
							<tr>
                                <td class="width30">Quotation Date:</td>
                                <td class="width70"><strong><?php echo $details[0]->quote_date; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Name:</td>
                                <td><strong><?php echo $details[0]->quote_name; ?></strong></td>
                            </tr>
							 <tr>
                                <td>Contact no.:</td>
                                <td><strong><?php echo $details[0]->quote_mobileno; ?></strong></td>
                            </tr>
                            
                        </table>
                    </div><!--span6-->
            
                    <div class="span6">
                        <table class="table table-bordered table-invoice">
                            <tr>
                                <td class="width30">From:</td>
                                <td class="width70">
                                    <strong>Dr.Saluja's Clinic</strong> <br />
                                    Mahim, <br />
                                    Mumbai <br />
                                    <br />
                                   
                                </td>
                            </tr>
                        </table>
                        
                        
                        
                </div><!--span6-->
            </div><!--row-fluid-->
            
            <div class="clearfix"><br /></div>
            
            <table class="table table-bordered table-invoice-full">
                <colgroup>
                    <col class="con0" style='width:5%'; />
                    <col class="con1 width45" />
                    <col class="con0 width5" />
                    <col class="con1 width15" />
                    <col class="con0 width20" />
                </colgroup>
                <thead>
                    <tr>
                        <th class="head0">Sr.No</th>
                        <th class="head1">Description</th>
                        <th class="head0 right">Amount</th>
                    </tr>
                </thead>
                <tbody>
				<?php
				 $i=1;
				 foreach($details as $details1)
				 {
					 ?>
					 <tr>
                        <td><?php echo $i;?></td>
                        <td><strong><?php echo $details1->quote_des;?></strong></td>
                        <td class="right"><strong><?php echo $details1->quote_price;?></strong></td>
                    </tr>

					 
					 <?php
					 $i++;
				 }	 
				
				?>
					</tbody>
                </table>
                                
                <table class="table invoice-table">
                    <tbody>
                        <tr>
                        	<td class="width65 msg-invoice">
          						<h4>Terms and Condition:</h4>
          						<p>1) Payement terms : 50% advance and 50% after treatement done. </p>
                            </td>
                            <td class="width15 right numlist">
                            	<strong>Subtotal</strong>
                                <strong>Discount</strong>
                            </td>
                            <td class="width20 right numlist">
                                <strong><span><?php echo $details[0]->quote_sub; ?></span></strong>
                                <strong><span><?php echo $details[0]->quote_dis; ?></span></strong>
                            </td>
                        </tr>
                    </tbody>
          </table>
			
          <div class="amountdue">
          	<h1><span>Amount Due:</span> <span><?php echo $details[0]->quote_tot; ?></span></h1> <br />
            <p class="stdformbutton">
                                <button type='button' class="btn btn-primary">PRINT</button>
                                
                            </p>
			</form>	
          </div>
<script>
$(document).ready(function(){
	
$(".quote_price").blur(function() {
	
  var finalResult = 0;

    for (var i = 1; i <= 10; i++) 
	{
		var prisebox=parseInt($("#quote_price-" + i).val());
		finalResult = parseInt(finalResult) + parseInt($("#quote_price-" + i).val());
    }
	
  $("#quote_sub").val(finalResult);
  $("#quote_tot").val(finalResult);
});

$("#quote_dis").blur(function()
{
	var quote_sub=parseInt($("#quote_sub").val());
	var quote_dis=parseInt($("#quote_dis").val());
	var finaltot = quote_sub - quote_dis;
	$("#quote_tot").val(finaltot);
});
});
</script>		
<?php include_once('footer.php');?>			