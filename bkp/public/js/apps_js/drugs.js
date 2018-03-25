jQuery(document).ready(function(){

	jQuery("#btn_drugs_registration").click(function(){
		var data=jQuery("#new_drugs").serialize();
		//alert(data)
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/drugs_registration_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! new drugs successfully added");
							var redirect_page=CI_ROOT+'index.php/welcome/drugs_list';
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
							var redirect_page=CI_ROOT+'index.php/welcome/drugs_list';
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