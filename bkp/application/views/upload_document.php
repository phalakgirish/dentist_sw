<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles- Clinic Registration</title>
<?php
echo my_file("style.default",1);
echo my_file("bootstrap-fileupload.min",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("modernizr.min",2);
echo my_file("bootstrap.min",2);
echo my_file("bootstrap-fileupload.min",2);

echo my_file("jquery.cookie",2);
echo my_file("jquery.uniform.min",2);
echo my_file("jquery.validate.min",2);
echo my_file("jquery.tagsinput.min",2);
echo my_file("custom",2);
echo my_file("apps_js/patient",2);
?>



</head>
<body>
<?php 

$session_data = $this->session->all_userdata();
$view_patientid=$session_data['view_patientid'];
$patient_name=$session_data['patient_name'];

$uploaded_document=$this->myclass->select("document_id,staff_name,docuement_name,docuement_desc,docuement_path,docuement_time","bs_document,bs_staff","docuement_staff_id=staff_id AND docuement_patient_id='$view_patientid'");

include_once('sidebar.php');


?>
<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="forms.html">Patient Management</a> <span class="separator"></span></li>
            <li>Upload Documents</li>
            
        </ul>
        
        <div class="pageheader">
           
            <div class="pageicon"><span class=" iconfa-upload-alt"></span></div>
            <div class="pagetitle">
               <h5>&nbsp;</h5>
                <h1>Upload Documents</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
           <div class="maincontentinner">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <h3 class="subtitle2"><?php echo $patient_name;?></h3>
                    <br />
				 <div class="widgetbox">
			
                <h4 class="widgettitle">Upload Documents</h4>
                <div class="widgetcontent nopadding">
				<div id="alert-error" class="alert alert-error"><?php echo validation_errors(); ?></div>
                <form class="stdform" action="<?php echo base_url()."index.php/patient/upload_action"; ?>" enctype="multipart/form-data" method="post">
				<input type="hidden" value='<?php echo $view_patientid?>' name='docuement_patient_id'>
				
					<div class="par control-group" id='error_span'>
							<div class="controls">
							<span class="help-inline"></span>
							</div>
						</div>
                            <p>
                                <label>Name of Documents</label>
                                <span class="field"><input type="text" name="docuement_name" id="docuement_name" class="input-xxlarge" /></span>
                            </p>
							
							<div class="par">
                            <p>
                                <label>Description <small></small></label>
                                <span class="field"><textarea cols="80" rows="5" name="docuement_desc" id="docuement_desc" class="span5"></textarea></span>
                            </p>
                            </div>
							<p>
							<div class="par">
								<label>File Upload</label>
								<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
								<div class="uneditable-input span3">
									<i class="iconfa-file fileupload-exists"></i>
									<span class="fileupload-preview"></span>
								</div>
								<span class="btn btn-file"><span class="fileupload-new">Select file</span>
								<span class="fileupload-exists">Change</span>
								<input type="file" name="userfile" /></span>
								<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
								</div>
							</div>
                           </p>
							
							 <p class="stdformbutton">
                                 <button type='submit' class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
							</div>
							
							
                            
                                                    
                           
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
					 
					 <hr/>
					 
					 <h3 class="subtitle2">Upload Documents</h3>
                    <br />
                    <table class="table discussions">
                        <colgroup>
                            <col class="width20" />
                            <col class="width30" />
                            <col class="width15" />
                            <col class="width15" />
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Documents Name</th>
                                <th>Description</th>
                                <th>Date & Time</th>
                                <th>Uploaded by</th>
								<th>Option</th>								
                            </tr>
                        </thead>
                        <tbody>
							<?php
							if(is_array($uploaded_document))
							{
							foreach($uploaded_document as $uploaded_document)
							{
								?>
								<tr>
									<td><?php echo $uploaded_document->docuement_name;?></td>
									<td><?php echo $uploaded_document->docuement_desc;?></td>
									<td><?php echo $uploaded_document->docuement_time;?></td>
									<td><?php echo $uploaded_document->staff_name;?></td>
									<td><a href="<?php echo base_url()."index.php/patient/file_download/".$uploaded_document->document_id;?>">Download</a></td>
									
								</tr>
								<?php
							}
							}
							?>
                            
                            </tbody>
                        </table>
                            
                        <br /><br />
                            
                       
                </div><!--span9-->
                
            </div><!--row-fluid-->
            </div><!--maincontentinner-->
			
<?php include_once('footer.php');?>			