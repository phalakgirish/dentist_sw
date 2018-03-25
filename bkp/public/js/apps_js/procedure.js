jQuery(document).ready(function(){

	jQuery("#btn_procedure_registration").click(function(){
		var data=jQuery("#new_procedure").serialize();
		
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/procedure_registration_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! new procedure successfully created");
							var redirect_page=CI_ROOT+'index.php/welcome/procedure_list';
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
	
	
	jQuery("#btn_edit_procedure").click(function(){
		var data=jQuery("#new_procedure").serialize();
		
		
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/procedure_edit_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! edit Successfully");
							var redirect_page=CI_ROOT+'index.php/welcome/procedure_list';
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
	
	
	
	jQuery("#prescription").click(function(){
		var data=jQuery("#prescription-form").serialize();
		
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/patient/prescription_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
							jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Your prescription added.").fadeOut(3000);
							jQuery("#prescription_drugid").val('');
							jQuery("#prescription_strength").val('');
							jQuery("#prescription_duration").val('');
							jQuery("#prescription_moring").val('');
							jQuery("#prescription_noon").val('');
							jQuery("#prescription_night").val('');
					}
					else
					{
					jQuery("#error_span").addClass("par control-group error");
					jQuery(".help-inline").html(result);
					}
				}
		});
	});
	jQuery("#plan_received").blur(function(){
		
		alert(343);
	})
});