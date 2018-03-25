
jQuery(document).ready(function(){
	/* New Loction create */
	//alert(23423);
	jQuery("#item_register_btn").click(function(){
		var ans = jQuery("#form1").serialize();
		
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+'index.php/inventory/item_register',
					data:ans,
					success:function(result)
					{
						//alert(result);
						if(result==1)
						{
							jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! Item Inwards Successfully ");
							var redirect_page=CI_ROOT+'index.php/inventory/inwards_list';
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
	jQuery("#inwards_edit_btn").click(function(){
		var ans=jQuery("#form1").serialize();
		//alert(34);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+'index.php/inventory/edit_inwards_action',
					data:ans,
					success:function(result)
					{
						//alert(result);
						if(result==1)
						{
							jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! Inwards Update Successfully.");
							var redirect_page=CI_ROOT+'index.php/inventory/inwards_list';
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

	//OUtwards 
	jQuery("#item_outwards_btn").click(function(){
		var ans = jQuery("#form1").serialize();
		
		//alert(CI_ROOT);
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+'index.php/inventory/outwards_register',
					data:ans,
					success:function(result)
					{
						//alert(result);
						if(result==1)
						{
							jQuery("#error_span").addClass("par control-group success");
							jQuery(".help-inline").html("Congratulations! Item Outwards Successfully ");
							var redirect_page=CI_ROOT+'index.php/inventory/outwards_list';
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

	//check outward qty
	jQuery("#out_product").change(function(){
		var proid=jQuery("#out_product").val();
		var str="productid="+proid;
		jQuery.ajax({
					type:'POST',
					url:CI_ROOT+'index.php/inventory/check_qty',
					data:str,
					success:function(result)
					{
						jQuery("#out_totqty").val(result);
					}	
	});
	});
	//outwards qty update
	jQuery("#out_qty").blur(function(){
		var avalibale_qty=jQuery("#out_totqty").val();
		var outward_qty=jQuery("#out_qty").val();
		var qty=(avalibale_qty)-(outward_qty);
		jQuery("#out_balqty").val(qty);
	})

});