jQuery(document).ready(function(){

	jQuery("#btn_staff_registration").click(function(){
		var data=jQuery("#staff_registration").serialize();
		//alert(data)
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/staff_registration_action',
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
	
	jQuery("#btn_staff_edit").click(function(){
		var data=jQuery("#staff_edit").serialize();
		//alert(data)
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/staff_edit_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Staff details has been update");
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
	/* Add staff Time*/
	jQuery("#btn_add_time").click(function(){
		var data=jQuery("#staff_add_time").serialize();
		//alert(data)
		
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/staff_time_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! staff time successfully added");
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
	
		jQuery("#btn_edit_time").click(function(){
		var data=jQuery("#staff_add_time").serialize();
		//alert(data)
		
		jQuery.ajax({
				type:'POST',
				url:CI_ROOT+'index.php/welcome/staff_time_edit_action',
				data:data,
				success:function(result)
				{
					//alert(result);
					if(result==1)
					{
						jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! staff time update successfully");
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

});