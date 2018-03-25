<script>
var CI_ROOT="<?= base_url();?>";
</script>
<?php
$ans_sess = $this->myclass->chk_session();
//print_r($ans_sess);
 if(session_id()=="")
        {
          ob_start();
          @session_start();
        }
				if($ans_sess)
				{
					$staff_name = $this->myclass->get_session_record(1);
					$staff_type = $this->myclass->get_session_record(3);
					$staff_id = $this->myclass->get_session_record(0);
					$staff_status = $this->myclass->get_session_record(4);
                    $staff_loginid = $this->myclass->get_session_record(2);
					
				}
				else
				{
					redirect(base_url());
					exit;
				}	
				//int_r($log_logid );
				//print_r($staff_type);
$current_url=current_url();
$page=explode("/",$current_url);				
			
?>
<div id="mainwrapper" class="mainwrapper">
    <div class="header">
        <div class="logo">
            <a href="dashboard.html"><img src="<?php echo base_url()."public"."/images/small-logo.jpg" ?>" alt="" /></a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
			
                <li class="right">
                    <div class="userloggedinfo">
                        <img src="<?php echo base_url()."public"."/images/photos/thumb1.png"?>" alt="" />
                        <div class="userinfo">
                            <h5><?php echo $staff_name;?> <small></small></h5>
                            <ul>
                                <li><a href="editprofile.html">Edit Profile</a></li>
                                <li><a href="#">Account Settings</a></li>
                                <li><a href="<?php echo base_url()."index.php/welcome/do_logout"?>">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>
    
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Navigation</li>
			<?php
				if($staff_type==1)
				{
			?>			
					<li><a href="<?php echo base_url()."index.php/welcome/dashboard"?>"><span class="iconfa-laptop"></span> Dashboard</a></li>
                
                <li class="dropdown active"><a href="#"><span class="iconfa-cogs"></span>Masters</a>
                    <ul style="display: block">
                    <li class="active"><a href="<?php echo base_url()."index.php/welcome/clinic_list"?>">View Clinic</a></li>
					<li><a href="<?php echo base_url()."index.php/welcome/staff_list"?>">View Staff</a></li>
					<!--<li><a href="<?php echo base_url()."index.php/welcome/procedure_list"?>">View Procedure</a></li>-->
					<!--<li><a href="view_tax.html">View Tax</a></li>-->
					<li><a href="<?php echo base_url()."index.php/welcome/drugs_list"?>">View Drugs</a></li>
					<li><a href="<?php echo base_url()."index.php/welcome/medical_list"?>">View Medical</a></li>
					<li><a href="<?php echo base_url()."index.php/patient/listofquotation"?>">View Qutation</a></li>
					<li><a href="<?php echo base_url().'index.php/patient/view_expences'?>">View Expences</a></li>
					<li><a href="<?php echo base_url().'index.php/patient/view_income'?>">View Income</a></li>
                    </ul>
                </li>
				 <li class="dropdown active"><a href="#"><span class="iconfa-reorder"></span>Patients Management</a>
                    <ul style="display: block">
					<li><a href="<?php echo base_url()."index.php/patient/index"?>">Appointments</a></li>
                    <li><a href="<?php echo base_url()."index.php/patient/view_patient"?>">View Patients</a></li>
					<?php 
					if(isset($view_patientid))
					{
					?>
					<li><a href="<?php echo base_url()."index.php/patient/dignosis"?>">Diagnosis & Treatement</a></li>
					<!--<li><a href="<?php echo base_url()."index.php/patient/procedure"?>">Procedure</a></li>
					<li><a href="<?php echo base_url()."index.php/patient/payment_form"?>">Payment Receipt</a></li>-->
					<li><a href="<?php echo base_url()."index.php/patient/listofprescription"?>">Prescription</a></li>
					<li><a href="<?php echo base_url()."index.php/patient/upload"?>">Upload</a></li>
					<li><a href="<?php echo base_url()."index.php/patient/certificate"?>">Certificate</a></li>
					<li><a href="<?php echo base_url()."index.php/patient/report"?>">Report</a></li>
					<?php
					}
					?>
					
                    </ul>
                </li>
				<li class="dropdown active"><a href="#"><span class="iconfa-book"></span>Account Management</a>
                    <ul style="display: block">
					 <li><a href="<?php echo base_url().'index.php/patient/view_create_group_form'?>">Create Group</a></li>
						 <li><a href="<?php echo base_url().'index.php/patient/group_list'?>">View Group</a></li>
						<li><a href="<?php echo base_url().'index.php/patient/view_subgroup_form'?>">Create Sub Group</a></li>
						 <li><a href="<?php echo base_url().'index.php/patient/subgroup_list'?>">View Sub Group</a></li> 
						<li><a href="<?php echo base_url().'index.php/patient/view_income_account_entry'?>">Income Account Entry</a></li>
						
                        <li><a href="<?php echo base_url().'index.php/patient/view_expences_account_entry'?>">Expences Account Entry</a></li>
					
                    </ul>
                </li>
                <li class="dropdown active"><a href="#"><span class="iconfa-beaker"></span>Inventory Management</a>
                    <ul style="display: block">
					 	<li class="dropdown"><a href="<?php echo base_url()."index.php/inventory"?>">Inwards</a>
						<ul>
                            <li><a href="<?php echo base_url()."index.php/inventory"?>">Inwards Entry</a></li>
                            <li><a href="<?php echo base_url()."index.php/inventory/inwards_list"?>">View Inwards</a></li>
                        </ul>
					 	</li>
						<li class="dropdown"><a href="<?php echo base_url()."index.php/inventory"?>">Outwards</a>
						<ul>
                            <li><a href="<?php echo base_url()."index.php/inventory/outwards"?>">Outwards Entry</a></li>
                            <li><a href="<?php echo base_url()."index.php/inventory/outwards_list"?>">View Outwards</a></li>
                        </ul>
					 	</li>
					</ul>
                </li>
				
					<li class="dropdown active"><a href="#"><span class="iconfa-pencil"></span>Report</a>
                    <ul style="display: block">
					 <li><a href="<?php echo base_url()."index.php/reports/index"?>">Appointments</a></li>
					 <li class="dropdown"><a href="<?php echo base_url()."index.php/reports/income_report"?>">Accounts</a>
						 <ul>
                              <li><a href="<?php echo base_url()."index.php/reports/income_report"?>">Income</a></li>
                            <li><a href="<?php echo base_url()."index.php/reports/expence_report"?>">Expences</a></li>
                        </ul>
					 </li>
					<li><a href="#">Patient</a></li>
					<li><a href="#">Inventory</a></li>
                    </ul>
                </li>
				
				<li class="dropdown"><a href="#"><span class="iconfa-envelope"></span> Messaging</a>
                    <ul>
                        <li><a href="messages.html">Mailbox</a></li>
                        
                    </ul>
                </li>
				<?php
				}
				else if($staff_type=2)
				{
				?>
					<li><a href="<?php echo base_url()."index.php/welcome/dashboard"?>"><span class="iconfa-laptop"></span> Dashboard</a></li>
					<li class="dropdown active"><a href="#"><span class="iconfa-pencil"></span>Patients Management</a>
                    <ul style="display: block">
					<li><a href="<?php echo base_url()."index.php/patient/index"?>">Appointments</a></li>
                    <li><a href="<?php echo base_url()."index.php/patient/view_patient"?>">View Patients</a></li>
					<?php 
					if(isset($view_patientid))
					{
					?>
					<li><a href="<?php echo base_url()."index.php/patient/dignosis"?>">Diagnosis & Treatement</a></li>
					<!--<li><a href="<?php echo base_url()."index.php/patient/procedure"?>">Procedure</a></li>-->
					<!--<li><a href="<?php echo base_url()."index.php/patient/payment_form"?>">Payment Receipt</a></li>-->
					<li><a href="<?php echo base_url()."index.php/patient/listofprescription"?>">Prescription</a></li>
					<li><a href="<?php echo base_url()."index.php/patient/upload"?>">Upload</a></li>
					<li><a href="<?php echo base_url()."index.php/patient/certificate"?>">Certificate</a></li>
					
					<?php
					}
					?>
					
                    </ul>
                </li>
				<?php
				}
				
				?>
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    