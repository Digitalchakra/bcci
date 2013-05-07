$(document).ready(function()
{
	$('#newuser').click(function(){
		$('#regtab').click();
	});
	$('#forget').click(function(){
		$('#fusername').val($('#username').val());
		$('.login').hide();
		$('.forget').show();
		$("#login_header").text("Forgot Password?");
		$("#forgot_pw_txt").text("Username: ");
		$('#error_msg').html();
	});
	$('#login').click(function(){
		$('.forget').hide();
		$('.login').show();
		$("#login_header").text("Login");
		$("#forgot_pw_txt").text("");
		$('#error_msg').html();
	});
	$('#firstname , #lastname , #inputEmail , #inputPassword').keypress(function(e) 
	{
		if(e.which == 13) 
		{
			$('#signupsubmit').click();
		}
	});
	$('#username , #passowrd').keypress(function(e) 
	{
		if(e.which == 13) 
		{
			$('#loginsubmit').click();
		}
	});
	$('#loginsubmit').click(function()
	{
		$('#error_msg').html("");
		var email = $('#username').val();
		var password = $('#passowrd').val();
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
			$('#error_msg').html("Enter your email and password.");
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
						$('#error_msg').html(data.resultset.errors);	
					}
				},
				error:function()
				{
					$('#error_msg').html('Internal error, try again...');
				}
			});
		}
	});
	$('#signupsubmit').click(function()
	{
		$('#error_msg1').html("");
		var email = $('#inputEmail').val();
		var password = $('#inputPassword').val();
		var uname = $('#uname').val();
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		
		if(uname.length <=3)
		{
			$('#error_msg1').html("Enter valid User name (min 4)");
		}
		else if(password.length <=4)
		{
			$('#error_msg1').html('Enter password.');
		}
		else if(!pattern.test(email) || email.length <=0)
		{
			//alert('inv');
			//$('#apploginusernamecontainer').addClass('control-group error');
			$('#error_msg1').html("Enter valid email id.");
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
						$('#register_form').hide();
						$('#error_msg1').html("You’re almost done! Please check your inbox to activate your account.");
					}
					else
					{
						$('#error_msg1').html(data.resultset.errors);	
					}
				},
				error:function()
				{
					$('#error_msg1').html('Internal error, try again...');
				}
			});
		}
	});
	$('#forgetsubmit').click(function()
	{
		$('#error_msg').html("");
		var email = $('#fusername').val();
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
			$('#error_msg').html("Enter your username.");
		}
		else
		{
			$.ajax(
			{
				url:baseurl+'forget',
				type:'POST',
				data:{'username':email},
				dataType: 'json',
				success:function(data)
				{
					if(data.resultset.success=='yes')
					{
						$('#error_msg').html("Please check your mail to reset your password");
						//alert('s');
						//window.location.reload();
						//window.location.href="tmplts";
					}
					else
					{
						$('#error_msg').html(data.resultset.errors);	
					}
				},
				error:function()
				{
					$('#error_msg').html('Internal error, try again...');
				}
			});
		}
	});
});
