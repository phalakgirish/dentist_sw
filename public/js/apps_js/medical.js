jQuery(document).ready(function(){

	jQuery("#btn_medical_registration").click(function(){
		var data=jQuery("#medical_registration").serialize();
		
		
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/medical_registration_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! medical successfully registered ");
							var redirect_page=CI_ROOT+'index.php/welcome/medical_list';
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
	
	
	jQuery("#btn_medical_edit").click(function(){
		var data=jQuery("#edit_medical").serialize();
		//alert(data);
		
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/medical_edit_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! edit Successfully");
							var redirect_page=CI_ROOT+'index.php/welcome/medical_list';
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