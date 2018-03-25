<!DOCTYPE html>
<html>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:46 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Britesmiles</title>
<?php
//echo base_url()."public"."/images/logo.png";
echo my_file("style.default",1);
echo my_file("style.shinyblue",1);
echo my_file("jquery-1.9.1.min",2);
echo my_file("jquery-migrate-1.1.1.min",2);
echo my_file("jquery-ui-1.10.3.min",2);
echo my_file("modernizr.min",2);
echo my_file("bootstrap.min",2);
echo my_file("jquery.cookie",2);
echo my_file("custom",2);
?>

<script type="text/javascript">
    jQuery(document).ready(function(){
	var CI_ROOT="<?= base_url();?>";
	
/*
        jQuery('#login').click(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
			else
			{
				
			}
		});
	*/	
jQuery("#login").click(function(){
		
		  	var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
			else
			{
					var data=jQuery("#login_form").serialize();
					jQuery.ajax({
							type:'POST',
							url:CI_ROOT+'index.php/welcome/do_login',
							data:data,
							success:function(result)
							{
								//jQuery('.login-alert').html(result).fadeIn();
								if(result==1)
								{
										var redirect_page=CI_ROOT+'index.php/welcome/dashboard';
										window.location.href=redirect_page;
										}
								else
								{
									jQuery(".login-alert").html(' <div class="alert alert-error">'+result+'</div>').fadeIn();
									return false;
								}
							}
					});
		}
	});
    });
</script>
</head>
<body class="loginpage">
<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="<?php echo base_url()."public"."/images/small-logo.jpg" ?>" alt="" /></div>
		
        <form id="login_form" class="stdform">
             <div class="inputwrapper login-alert">
                <div class="alert alert-error">Invalid username or password</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="staff_loginid" id="username" placeholder="Enter any username" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="staff_pws" id="password" placeholder="Enter any password" />
            </div>
			
            
                <input type="button"id="login" value="LOG IN" class="btn btn-primary" >
            
		</form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2016. bright smiles.</p>
</div>

</body>

<!-- Mirrored from themepixels.com/main/themes/demo/webpage/shamcey/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 24 Aug 2013 11:37:47 GMT -->
</html>
