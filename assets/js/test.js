$(document).ready(function()
{
	$('#cnewuser').click(function(){
		$('#cregtab').click();
	});
	$('#cforget').click(function(){
		$('#cfusername').val($('#cusername').val());
		$('.clogin').hide();
		$('.cforget').show();
		$("#clogin_header").text("Forgot Password?");
		$("#cforgot_pw_txt").text("Username: ");
	});
	$('#clogin').click(function(){
		$('.cforget').hide();
		$('.clogin').show();
		$("#clogin_header").text("Login");
		$("#cforgot_pw_txt").text("");
	});
	$('#cfirstname , #clastname , #cinputEmail , #cinputPassword').keypress(function(e) 
	{
		if(e.which == 13) 
		{
			$('#csignupsubmit').click();
		}
	});
	$('#cusername , #cpassowrd').keypress(function(e) 
	{
		if(e.which == 13) 
		{
			$('#cloginsubmit').click();
		}
	});
	$('#cloginsubmit').click(function()
	{
		$('#cerror_msg').html("");
		var email = $('#cusername').val();
		var password = $('#cpassowrd').val();
		/*var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		if(!pattern.test(email) || email.length <=0)
		{
			$('#apploginusernamecontainer').addClass('control-group error');
		}
		else if(password.length <=0)
		{
			$('#apploginpasswordcontainer').addClass('control-group error');
		}*/
		if(email.length <=0 || password.length <=0)
		{
			$('#cerror_msg').html("Enter your email and password.");
		}
		else
		{
			$.ajax(
			{
				url:baseurl+'verifylogin',
				type:'POST',
				data:{'username':email,'password':password},
				dataType: 'json',
				success:function(data)
				{
					if(data.resultset.success=='yes')
					{
						//window.location.reload();
						window.location.href=data.resultset.ref;
					}
					else
					{
						$('#cerror_msg').html(data.resultset.errors);	
					}
				},
				error:function()
				{
					$('#cerror_msg').html('Internal error, try agian...');
				}
			});
		}
	});
	$('#csignupsubmit').click(function()
	{
		$('#cerror_msg1').html("");
		var email = $('#cinputEmail').val();
		var password = $('#cinputPassword').val();
		var uname = $('#cuname').val();
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		
		if(uname.length <=3)
		{
			$('#cerror_msg1').html("Enter valid User name (min 4)");
		}
		else if(password.length <=4)
		{
			$('#cerror_msg1').html('Enter password.');
		}
		else if(!pattern.test(email) || email.length <=0)
		{
			//alert('inv');
			//$('#apploginusernamecontainer').addClass('control-group error');
			$('#cerror_msg1').html("Enter valid email id.");
		}
		else
		{
			$.ajax(
			{
				url:baseurl+'registration',
				type:'POST',
				data:{'uname':uname,'email_address':email,'pass_word':password},
				dataType: 'json',
				success:function(data)
				{
					if(data.resultset.success=='yes')
					{
						$('#cregister_form').hide();
						$('#cerror_msg1').html("You’re almost done! Please check your inbox to activate your account.");
					}
					else
					{
						$('#cerror_msg1').html(data.resultset.errors);	
					}
				},
				error:function()
				{
					$('#cerror_msg1').html('Internal error, try agian...');
				}
			});
		}
	});
	$('#cforgetsubmit').click(function()
	{
		$('#cerror_msg').html("");
		var email = $('#cfusername').val();
		//var password = $('#passowrd').val();
		/*var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		if(!pattern.test(email) || email.length <=0)
		{
			$('#apploginusernamecontainer').addClass('control-group error');
		}
		else if(password.length <=0)
		{
			$('#apploginpasswordcontainer').addClass('control-group error');
		}*/
		if(email.length <=0)
		{
			$('#cerror_msg').html("Enter your email.");
		}
		else
		{
			$.ajax(
			{
				url:baseurl+'cforget',
				type:'POST',
				data:{'username':email},
				dataType: 'json',
				success:function(data)
				{
					if(data.resultset.success=='yes')
					{
						$('#cerror_msg').html("Please check your mail to reset your password");
						//alert('s');
						//window.location.reload();
						//window.location.href="tmplts";
					}
					else
					{
						$('#cerror_msg').html(data.resultset.errors);	
					}
				},
				error:function()
				{
					$('#cerror_msg').html('Internal error, try agian...');
				}
			});
		}
	});
});
