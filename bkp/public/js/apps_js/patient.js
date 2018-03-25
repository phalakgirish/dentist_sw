jQuery(document).ready(function(){

	jQuery("#btn_get_appointment").click(function(){
		var str=jQuery("#get_appointment").serialize();
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/patient/appointment_action',
				data:str,
				success:function(result)
				{	
				
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! Appointment fix successfully");
							var redirect_page=CI_ROOT+'index.php/patient/appointment_list';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
					}
					else
					{
						jQuery("#error_span").addClass("par control-group error");
						jQuery(".help-inline").html(result);
					}
					
				}
		});
	});
	
	jQuery("#btn_edit_appointment").click(function(){
		var str=jQuery("#get_appointment").serialize();
		//alert(str);
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/patient/appointment_edit_action',
				data:str,
				success:function(result)
				{	
					//alert(result);
					
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! Appointment update successfully");
							var redirect_page=CI_ROOT+'index.php/patient/appointment_list';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
					}
					else if(result==2)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Appointment has been cancel!!!");
							var redirect_page=CI_ROOT+'index.php/patient/appointment_list';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
					}
					else
					{
					jQuery("#error_span").addClass("par control-group error");
					jQuery(".help-inline").html(result);
					}
					
				}
		});
	});
	
		jQuery("#btn_existing_appointment").click(function(){
		var str=jQuery("#get_appointment").serialize();
		//alert(str);
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/patient/existing_patient_appointment_action',
				data:str,
				success:function(result)
				{	
					//alert(result);
					
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! Appointment fix successfully");
							var redirect_page=CI_ROOT+'index.php/patient/appointment_list';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
					}
					else
					{
					jQuery("#error_span").addClass("par control-group error");
					jQuery(".help-inline").html(result);
					}
					
				}
		});
	});
	jQuery("#btn_edit_drugs").click(function(){
		var data=jQuery("#new_drugs").serialize();
		
		
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/drugs_edit_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! edit Successfully");
							var redirect_page=CI_ROOT+'index.php/welcome/staff_list';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
					}
					else
					{
					jQuery("#error_span").addClass("par control-group error");
					jQuery(".help-inline").html(result);
					}
				}
		});
	
	});

		jQuery(".process").click(function(){
		var process_id=jQuery(this).attr('id');
		//alert(process_id);
		var data='pro_id='+process_id;
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/get_process',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! new staff successfully added");
							var redirect_page=CI_ROOT+'index.php/welcome/staff_list';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
					}
					else
					{
					jQuery("#error_span").addClass("par control-group error");
					jQuery(".help-inline").html(result);
					}
				}
		});
			
		
	});
	
	jQuery(".amount").focus(function(){
			var process_id=jQuery(this).attr('id');	
			var proid=process_id.split("-");
			//alert(process_id);
			var process_id=proid[1];
			
			//jQuery("#patient_processplan_id-"+process_id).prop('checked', true); 
			//alert(checked.val());
			
			if(jQuery("#rate-"+process_id).val()=="")
			{
				alert("Please Enter Amount");
			}
			else if(jQuery("#rate-"+process_id).val()=="")
			{
				alert("Please Enter Discount Amount");
			}
			else
			{
			var process_rate=jQuery("#rate-"+process_id).val();
			var process_discount=jQuery("#discount-"+process_id).val();
			var percetage_amt=(process_rate*process_discount)/100;
				//alert(amount);
				var amount=parseInt(process_rate)-parseInt(percetage_amt);
				jQuery("#amount-"+process_id).val(amount);
				
				if(jQuery("#totalamt").val()=="0")
				{
					
					jQuery("#totalamt").val(amount)
				}
				else
				{
					var totamt=jQuery("#totalamt").val();
					
						
					var finalamt=parseInt(totamt)+parseInt(amount);
					jQuery("#totalamt").val(finalamt);
					//alert(finalamt);
				}
					
				
					
					
			}	
			
			
			
	});
	
		
});