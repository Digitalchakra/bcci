<!DOCTYPE html>
<html>
<head>
<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<link href="../assets/css/mystyles.css" rel="stylesheet" type="text/css">
<link href="../assets/css/bcci-home.css" rel="stylesheet" type="text/css">
<link href="../assets/css/menu.css" rel="stylesheet" type="text/css">

  {asset name="Head"}
</head>
<body id="{$BodyID}" class="{$BodyClass}">
<!--Background-->
<div class="red-bg"></div>

<!--HEADER
  ===============================================-->
<!--LOGO and SEARCH-->
<div class = "container">
  <div class = "row">
    <div class = "span3 margint20"> <a href="../index.php"><div class="logo"></div></a></div>
    <div class = "span4 offset5 hidden-phone">
      <div class = "row">
       <!--  <div class = "span4 margint20"> <img class = "pull-right" src="<?php echo base_url('../assets/Images/soci-icons_03.png'); ?>"> </div> -->
      </div>
      <div class = "row">
        <div class = "span4  margint20">
          <div class="input-append search-box pull-right">
            <!-- <input class="span2 search-icon" id="appendedInputButton" type="text" placeholder= "Search the site">
            <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button>-->
            {searchbox}
          </div>
          <div class = "clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--NAV MENU-->
<div class = "container">
  <div class = "row">
    <div class = "span12" style="margin-top:18px">
      <!--MEGA MENU -->

      <ul class ="menu"> 
        <li><a href="../" class="drop">Home</a></li>
        <li  id="ipl_menu"><a href="../" class="drop">IPL</a></li>
        <li><a href="../schedule" class="drop">Schedule</a></li> 
        <li><a href="../result" class="drop">Results</a></li> 
        <li><a href="../rank/team" class="drop">Ranking</a></li> 
        <li><a href="index.php" class="drop">Forum</a></li>   
        <li><a href="../articles" class="drop">Articles</a></li> 
        <li><a href="../news" class="drop">News</a></li> 
        <li><a href="../photos" class="drop">Photos</a></li>   
        <li><a href="../videos" class="drop">Videos</a></li>
        <li class = "dropdown menu_right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-right:5px">
            	<i class = "icon-lock icon-white" style="margin-right:15px;"></i>Register
            </a>
                <div class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
                  <div class="row">
                  	<div class = "span3">
                  	<div class="padding20" style="text-align:left">
                    	<h4 style = "text-align:left;margin-left:0;">Registration</h4>
                      <div class="divider"></div>
                      <span id="error_msg1" class="errorMessage"></span>

                      <form class="form-horizontal">
                         <span>First Name: </span><input type="text" class="input-large" name="firstname" id="firstname" style="text-align:left">
                         <div class="margint10"></div>
                         <span>Last Name: </span><input type="text" class="input-large" name="lastname" id="lastname" style="text-align:left">
                         <div class="margint10"></div>
                         <span>E-Mail: </span><input type="text" class="input-large" name="email_address" id="inputEmail" style="text-align:left">
                         <div class="margint10"></div>
                         <span>Password: </span><input type="password" class="input-large" name="pass_word" id="inputPassword" style="text-align:left">
                         <div class="margint20"></div>
                         <a class="btn btn-primary span1 pull-right marginb15" id="signupsubmit">Register</a>
                  		</form>
                      
                    </div>
                  </div>
                  </div>
                </div>
          </li>
        <li class = "menu_right dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-right:5px">
         	 <i class = "icon-user icon-white" style="margin-right:15px;"></i>Login
          </a>
          <div class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
            <div class="row">
              <div class = "span3">
                <div class="padding20" style="text-align:left">
                	
                  <h4 style = "text-align:left;margin-left:0;" id="login_header">Login</h4>
                  <div class="divider"></div><span id="error_msg" class="errorMessage"></span>
                  <form class="form-horizontal">
                  	<span class="login">Email: </span><input type="text" class="input-large login" id="username" name="username" style="text-align:left">
                    <div class="margint10"></div>
                    <span class="login">Password: </span><input type="password" class="input-large login" id="passowrd" name="password">
                    <span id="forgot_pw_txt"></span><input type="text"  class="forget input-large margint20" id="fusername" name="fusername" style="display:none; margin-top:10px">
                    <span id="forget" class="pull-right margint10 login red" style="cursor:pointer;margin-left:0;" >Forgot Password?</span>
                    <div class="margint20"></div>
                         <a class="btn btn-primary span1 pull-right marginb15 margint10 login" id="loginsubmit">Login</a>
                         <a id="login" class="btn btn-primary pull-left margint10 forget red" style="display:none;cursor:pointer;">Cancel</a>
                         <a class="btn btn-primary marginb15 pull-right margint10 forget" id="forgetsubmit" style="display:none;">Reset Password</a>
                  </form>                  
                  
                </div>
              </div>
            </div>
          </div>
        </li> 
        <!--{dashboard_link}
        {discussions_link}
       {activity_link}
       {inbox_link}
       {custom_menu}
       {profile_link}
       {signinout_link}-->
      </ul>
    </div>
  </div>
</div>
<!--================END OF HEADER======================-->


<!--Main Container
  =====================================================-->
  
  <div class="container">
  	<div class="row margint20">
    	<div class="span3">
      	{module name="MeModule"}
        {asset name="Panel"}
      </div>
      <div class="span9">
      	{asset name="Content"}
      </div>
    </div>
  </div>
  
<!--===============End of Container====================-->


<!--Footer
  ====================================================-->
  
  <!--REDFX-->
	<div class = "row-fluid redfx"></div>
	<!--Copyright-->
    <div class = "row-fluid dark-bg">
      <div class = "container">
        <div class = "row">
          <div class = "span4"> 
            &copy; Copyright BCCI <?php echo date('Y');?>. All Rights reserved.
           </div>
          <div class = "span4 pull-left">
            
              Powered by <a href = "http://www.digitalchakra.in" target="_blank"><div class="digital_chakra pull-right"></div></a>
            	{asset name="Foot"}
          </div>
        </div>
      </div>
    </div>

<!--================END OF Footer======================-->
{event name="AfterBody"}
</body>
</html>