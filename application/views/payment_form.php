<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles-Procedure Registration</title>
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
echo my_file("custom",2);

echo my_file("apps_js/procedure",2);
?>
</head>
<body>
<?php 

$session_data = $this->session->all_userdata();
$view_patientid=$session_data['view_patientid'];

$patient_name=$session_data['patient_name'];

$patient_name = str_replace("\'","'", $patient_name);

//$totamt=$this->myclass->select("sum(p_rate_amount) as amt","bs_patient_process","p_process_patientid='$view_patientid'");
$totamt=$this->myclass->select("payment_amt as amt","bs_payment","payment_patient_id='$view_patientid' AND payment_plan_id='$plan_id'");
//print_r($totamt);

if($totamt=='no')
{
	
	$tot='0';
}
else
{
	$tot=$totamt[0]->amt;
}


$payment_history=$this->myclass->select("sum(payment_payable) as paidamt","bs_payment","payment_patient_id='$view_patientid' AND payment_plan_id='$plan_id'");

if($payment_history=='no')
{
	
	$paidamt='0';
}
else
{
	$paidamt=$payment_history[0]->paidamt;
}


$payment_receipt_no=$this->myclass->select("max(payment_receipt_no) as receip_no","bs_payment","1");
//print_r($plan_id);
include_once('sidebar.php');?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Patient Management</a> <span class="separator"></span></li>
            <li>Payment Receipt</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class="iconfa-pencil"></span></div>
            <div class="pagetitle">
                 <h5>&nbsp;</h5>
                <h1>Payment Receipt</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
            <div class="widgetbox">
			
                <h4 class="widgettitle">Payment Receipt</h4>
                <div class="widgetcontent nopadding">
                <form class="stdform stdform2" method="post" action="<?php echo base_url()."index.php/patient/payment_action"; ?>">
								<p>
								<input type="hidden" name="payment_plan_id" value='<?php echo $plan_id;?>'>
                                    <label>Paitents Name.</label>
                                    <span class="field"><input type="text" name="firstname" value="<?php echo $patient_name;?>" readonly class="input-xxlarge" /></span>
                                </p>
								<p>
                                    <label>Receipt No.</label>
                                    <span class="field"><input type="text" name="payment_receipt_no" value='<?php echo $payment_receipt_no[0]->receip_no+1;?>'  class="input-xxlarge" /></span>
                                </p>
								
                                <p>
                                    <label>Total Amount</label>
                                    <span class="field"><input type="text" name="payment_amt" value='<?php echo $tot;?>'  class="input-xxlarge" /></span>
                                </p>
								<p>
                                    <label>Received Amount</label>
                                    <span class="field"><input type="text" name="payment_paidamt" value='<?php echo $paidamt;?>' class="input-xxlarge" readonly /></span>
                                </p>
								<p>
								<?php $balance_amt=($tot)-($paidamt);?>
                                    <label>Outsanding Amount</label>
                                    <span class="field"><input type="text" name="firstname" value="<?php echo $balance_amt;?>" class="input-xxlarge" readonly /></span>
                                </p>
								<p>
                                    <label>Payable Amount</label>
                                    <span class="field"><input type="text" name="payment_payable" class="input-xxlarge" /></span>
                                </p>
								<p>
                                    <label>Payment Mode</label>
                                   <span class="field"><select name="payment_mode" class="uniformselect">
                                        <option value="">Choose One</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Cheque</option>
										<option value="3">NEFT</option>
										<option value="4">POS</option>
										<option value="5">IMPS</option>
										<option value="6">Netbanking</option>
										  
									</select></span>
								</p>
								<p>
                                    <label>If Cheque mentioned details</label>
                                    <span class="field"><textarea cols="80" rows="5" name="payment_desc" id="pro_desc" class="span5"></textarea></span>
                                </p>
								
                               <p class="stdformbutton">
							   <span class="field">
                                <button class="btn btn-primary">Submit</button>&nbsp;
                                        </ul>
								</span>
                               </p>
					</form>
					 <h3 class="subtitle2">Payment History</h3>
                    <br />
                    <table class="table discussions">
                        <colgroup>
                            <col class="width20" />
                            <col class="width20" />
                            <col class="width25" />
                            <col class="width25" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Receipt No.</th>
                                <th>Date Time</th>
                                <th>Receipt Amount </th>
                                <th>Option</th>								
                            </tr>
                        </thead>
                        <tbody>
							<?php
							$payement_history=$totamt=$this->myclass->select("payment_receipt_no,payment_time,payment_amt,payment_payable","bs_payment","payment_patient_id='$view_patientid' ORDER BY payment_receipt_no desc ");
							if(is_array($payement_history))
							{
								foreach($payement_history as $history)
								{
									?>
									<tr>
										<td><?php echo $history->payment_receipt_no;?></td>
										<td><?php echo $history->payment_time;?></td>
										<td><?php echo $history->payment_payable;?></td>
										<td><a href='<?php echo base_url();?>index.php/patient/print_receipt/<?php echo $history->payment_receipt_no;?>' class=" icon-print" title='Print Receipt'></i></a>&nbsp;&nbsp;&nbsp;</td>
									</tr>
									<?php
								}
							}
							else
							{
								echo "No payment history";
							}
							?>
                            
                            </tbody>
                        </table>
                </div><!--widgetcontent-->
            </div><!--widget-->
			
<?php include_once('footer.php');?>			