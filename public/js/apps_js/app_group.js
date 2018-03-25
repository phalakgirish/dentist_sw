
jQuery(document).ready(function(){
	/* New Loction create */
	//alert(23423);
	jQuery("#group_register_btn").click(function(){
		var ans = jQuery("#form1").serialize();
		
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+'index.php/patient/new_group_register',
					data:ans,
					success:function(result)
					{
						//alert(result);
						if(result==1)
						{
							jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! New Group Successfully Created ");
							var redirect_page=CI_ROOT+'index.php/patient/group_list';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
							
							//setTimeout("window.location.href='"+CI_ROOT()+"/user/view_user",4000);
						}
						else
						{
							jQuery("#error_span").addClass("par control-group error");
							jQuery(".help-inline").html(result);
						}
					}
			
		});
	});
	/* Location Edit */
	jQuery("#group_edit_btn").click(function(){
		var ans=jQuery("#form1").serialize();
		//alert(34);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+'index.php/patient/edit_group_action',
					data:ans,
					success:function(result)
					{
						//alert(result);
						if(result==1)
						{
							jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! Group Update Successfully.");
							var redirect_page=CI_ROOT+'index.php/patient/group_list';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
							
							//setTimeout("window.location.href='"+CI_ROOT()+"/user/view_user",4000);
						}
						else
						{
							jQuery("#error_span").addClass("par control-group error");
							jQuery(".help-inline").html(result);
						}
						
						
						//window.location.href=CI_ROOT+'setting/location_list';
					}
		
		});	
	
	});
	/*Sub Group*/
	jQuery("#subgroup_register_btn").click(function(){
		var ans = jQuery("#form1").serialize();
		//alert(ans);
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+'index.php/patient/new_subgroup_register',
					data:ans,
					success:function(result)
					{
						//alert(result);
						if(result==1)
						{
							jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! New Sub Group Successfully Created ");
							var redirect_page=CI_ROOT+'index.php/patient/subgroup_list';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
							
							//setTimeout("window.location.href='"+CI_ROOT()+"/user/view_user",4000);
						}
						else
						{
							jQuery("#error_span").addClass("par control-group error");
							jQuery(".help-inline").html(result);
						}
					}
			
		});
	});
	/* Location Edit */
	jQuery("#subcat_edit_btn").click(function(){
		var ans=jQuery("#form1").serialize();
		//alert(ans);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+'index.php/patient/edit_subgroup_action',
					data:ans,
					success:function(result)
					{
						//alert(result);
						if(result==1)
						{
							jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! Subcategory Update Successfully.");
							var redirect_page=CI_ROOT+'index.php/patient/subgroup_list';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
							
							//setTimeout("window.location.href='"+CI_ROOT()+"/user/view_user",4000);
						}
						else
						{
							jQuery("#error_span").addClass("par control-group error");
							jQuery(".help-inline").html(result);
						}
					}
		
		});	
	
	});

	/*Sub Group*/
	jQuery("#expn_register_btn").click(function(){
		var ans = jQuery("#form1").serialize();
		//alert(ans);
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+'index.php/patient/new_expences_register',
					data:ans,
					success:function(result)
					{
						//alert(result);
						if(result==1)
						{
							jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Expences entry Successfully added ");
							var redirect_page=CI_ROOT+'index.php/patient/view_expences_account_entry';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
							
							//setTimeout("window.location.href='"+CI_ROOT()+"/user/view_user",4000);
						}
						else
						{
							jQuery("#error_span").addClass("par control-group error");
							jQuery(".help-inline").html(result);
						}
					}
			
		});
	});
	
	/*Income entry Group*/
	jQuery("#income_register_btn").click(function(){
		var ans = jQuery("#form1").serialize();
		//alert(ans);
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+'index.php/patient/new_income_register',
					data:ans,
					success:function(result)
					{
						//alert(result);
						if(result==1)
						{
							jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Income entry Successfully added ");
							var redirect_page=CI_ROOT+'index.php/patient/view_income_account_entry';
							var sec=1;
							setInterval(function(){
								if(sec==2)
								{
									window.location.href=redirect_page;
								}
								sec++;
							},1000); 
							
							//setTimeout("window.location.href='"+CI_ROOT()+"/user/view_user",4000);
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