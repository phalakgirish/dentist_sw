jQuery(document).ready(function(){

	jQuery("#btn_clinic_registration").click(function(){
		var data=jQuery("#clinic_registration").serialize();
		//alert(data);
		
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/clinic_registration',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! clinic successfully registered ");
							var redirect_page=CI_ROOT+'index.php/welcome/clinic_list';
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
	
	
	jQuery("#btn_clinic_edit").click(function(){
		var data=jQuery("#clinic_registration").serialize();
		//alert(data);
		
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/clinic_edit_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! edit Successfully");
							var redirect_page=CI_ROOT+'index.php/welcome/clinic_list';
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

});