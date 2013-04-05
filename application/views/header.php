<!doctype html>
<html>
<head>
<link rel="icon" type="image/png" href="<?php echo base_url('assets/Images/favicon.png'); ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="BCCI,Live Scores,Live,Scores,Cricket, India, News, Cricket Photos, Cricket Videos" />
<meta name="keywords" content="BCCI,Cricket Live Scores,Cricket Live,Cricket Scores,Scores Cricket,Cricket Photo, Cricket Video" />
<meta name="description" content="bcci.com is in no way or form related to The BCCI or BCCI or The Board for Control of Cricket in India and is a standalone portal for cricketing enthusiasts from the world over. We provide live scores, series fixtures, latest news feeds, articles by eminent cricket writers and articles by enthusiasts, cricket statistics, records, current rankings, opinion polls and a public message board. " />
<title>BCCI | Live Scores | Latest Cricket News </title>
<link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/mystyles.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/bcci-home.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/menu.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/hoverfx.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/hoverfx_common.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/live_score_icon.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/country_flag.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/flexslider.css'); ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.lightbox-0.5.css'); ?>" media="screen" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.fancybox.css'); ?>" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url('assets/css/Ads.css'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/countdown.css'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/bcci-tablet.css'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/kvm.css'); ?>" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>"></script>
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
</script>
<style>
.errorMessage, .errorMessage p
{
  color:#A82E0F;"
}

</style>
<!--[if gte IE 9]> 
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->

</head>
<body>
<!-- ######## HEADER ######### -->
<div class="red-bg"></div>
<!--LOGO and SEARCH-->
<div class = "container">
  <div class = "row">
    <div class = "span3 margint20"> <a href="<?php echo base_url();?>"><div class="logo"></div></a></div>
    <div class="span3 offset3 margint20">
    	 <!-- kvm ads start -->
            <div id="kvmslider" class="pull-right margint20"> <!-- Slider container -->
              <div id="mask"> <!-- Mask -->
                
                <ul style="list-style:none">
                  <li id="img1" class="kvmslider" style=""> <!-- ID for tooltip and class for animation --> 
                    <a target="_blank" href="http://kvmacademy.com/index.php/employment-guarantee"> <img src="<?php echo base_url('assets/Images/k1.jpg'); ?>" alt="KVM Academy"/> </a> </li>
                  <li id="img2" class="kvmslider" style="display:none;"> <a target="_blank" href="http://kvmacademy.com/index.php/employment-guarantee"> <img src="<?php echo base_url('assets/Images/k2.jpg'); ?>" alt="KVM Academy"/> </a> </li>
                  <li id="img3" class="kvmslider" style="display:none;"> <a target="_blank" href="http://kvmacademy.com/index.php/employment-guarantee"> <img src="<?php echo base_url('assets/Images/k3.jpg'); ?>" alt="KVM Academy"/> </a> </li>
                  <li id="img4" class="kvmslider" style="display:none;"> <a target="_blank" href="http://kvmacademy.com/index.php/employment-guarantee"> <img src="<?php echo base_url('assets/Images/k4.jpg'); ?>" alt="KVM Academy"/> </a> </li>
                  <li id="img5" class="kvmslider" style="display:none;"> <a target="_blank" href="http://kvmacademy.com/index.php/employment-guarantee"> <img src="<?php echo base_url('assets/Images/k5.jpg'); ?>" alt="KVM Academy"/> </a> </li>
                </ul>
              </div>
              <!-- End Mask --> 
            </div>
        <!-- End Slider Container --> 
    </div>
    <div class = "span3 hidden-phone">
      <div class = "row">
       <!--  <div class = "span4 margint20"> <img class = "pull-right" src="<?php echo base_url('assets/Images/soci-icons_03.png'); ?>"> </div> -->
       <div id="ipltimer" class="pull-right ipltimer">
              <a href="<?php echo site_url('ipl');?>"><div class="ipl_logo"></div></a>
              <span id="defaultCountdown" class="countdown"></span>
      </div>
      </div>
			<div class = "row">
       <!-- <div class = "span4  margint20">
          <div class="input-append search-box pull-right">
             <input class="span2 search-icon" id="appendedInputButton" type="text" placeholder= "Search the site">
            <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button
          </div>
          <div class = "clearfix"></div>
        </div>
      </div> -->
    </div>
     
  </div>
</div>
</div>
<!--NAV MENU-->
<div class = "container">
  <div class = "row visible-desktop">
    <div class = "span12 margint20">
      <!--MEGA MENU
      -->

      <ul class ="menu"> 
        <li <?php if($view_page=='home') echo 'class="active"';?> ><a href="<?php echo base_url(); ?>" class="drop">Home</a></li>
        <li <?php if($view_page=='ipl') echo 'class="active"';?> id="ipl_menu"><a href="<?php echo base_url('ipl'); ?>" class="drop" >IPL</a>
        <li <?php if($view_page=='schedule') echo 'class="active"';?>><a href="<?php echo base_url('schedule'); ?>" class="drop">Schedule</a><!-- Begin Shedule columns Item -->

          <div class="dropdown_2columns"><!-- Begin 5 columns container -->
            <div class = "col_2">
              <ul id="srs_list" class="greybox">
                <!--<h2>Upcoming Series</h2>
                <li><a href="#">Sri Lanka vs Australia</a></li>
                <li><a href="#">S Africa vs Zimbabwe</a></li>
                <li><a href="#">Australia vs New Zealand</a></li>
                <li><a href="#">India vs Australia</a></li>
                <li><a href="#">Sri Lanka vs Australia</a></li>-->
              </ul>
              <div class = "hline"></div>
              <!-- <ul class="greybox">
                <li><a href="#">Fixtures</a></li>
                <li><a href="#">Series Archive</a></li>
              </ul> -->
            </div>
          </div>
        </li>
        <li <?php if($view_page=='result') echo 'class="active"';?>><a href="<?php echo base_url('result'); ?>" class="drop">Results</a></li>
        <li <?php if($view_page=='team_rank') echo 'class="active"';?>><a class="drop">Rankings</a><!-- Begin 4 columns Item -->
         <div class="dropdown_2columns">
            <div class = "col_2">
              <ul class="greybox">
                <h2>Rankings</h2>
                <li><a href="<?php echo base_url('rank/team'); ?>">Team Rankings</a></li>
                <li><a href="<?php echo base_url('rank/batting'); ?>">Batsman Rankings</a></li>
                <li><a href="<?php echo base_url('rank/bowling'); ?>">Bowler Rankings</a></li>
                <li><a href="<?php echo base_url('rank/allrounder'); ?>">All Rounder Rankings</a></li>
              </ul>
            </div>
            <!--<div class = "col_2">
              <ul class="greybox">
                <h2>Records</h2>
                <li><a href="#">Batting Record</a></li>
                <li><a href="#">Bowling Record</a></li>
                <li><a href="#">All Rounder Record</a></li>
                <li><a href="#">Other Records</a></li>
              </ul>
            </div>-->
          </div>
        </li>
        <li <?php if($view_page=='news') echo 'class="active"';?>><a href="<?php echo base_url('news'); ?>" class="drop">News</a></li>
        <li <?php if($view_page=='articles') echo 'class="active"';?>><a href="<?php echo base_url('article'); ?>" class="drop">Articles</a></li>
        <li <?php if($view_page=='photos') echo 'class="active"';?>><a href="<?php echo base_url('photos');?>" class="drop">Photos</a></li>
        <li <?php if($view_page=='videos') echo 'class="active"';?>><a href="<?php echo base_url('videos');?>" class="drop">Videos</a></li>
				<li <?php if($view_page=='forum') echo 'class="active"';?>><a href="<?php echo base_url('forum'); ?>" class="drop pulsate">Forum</a></li>
        
       
         <?php if(!$session_data = $this->session->userdata('logged_in'))
        { ?>
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
          <?php } ?>
        
        
         <?php if($session_data = $this->session->userdata('logged_in'))
        { ?>
        <li class = "menu_right dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-right:5px">
           <i class = "icon-user icon-white" style="margin-right:15px;"></i><?php echo $session_data['firstname']; ?>
          </a>
          <!-- 
          <div class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
           <div class="row">
              <div class = "span2">
                <div class="padding20" style="text-align:left">
-->                <ul class="dropdown-menu pull-right profile-dropdown">
                    <li><a tabindex="-1" href="#">Profile</a></li>
                    <li><a tabindex="-1" href="#">Settings</a></li>
                    <li><a tabindex="-1" href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
                  </ul>
<!--                </div>
              </div>
            </div>
         </div>
         --> 
        </li>
        
         <?php }
				else
				{ ?>
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
        <?php } ?>
      </ul>
  </div>
</div>
</div>

<!--Nav Menu for Tablets-->
 


  <div class = "row-fluid visible-tablet">
    <div class = "span12 margint20">
      <!--MEGA MENU
      -->

      <ul class ="menu"> 
        <li <?php if($view_page=='home') echo 'class="active"';?> ><a href="<?php echo base_url(); ?>" class="drop">Home</a></li>
        <li <?php if($view_page=='schedule') echo 'class="active"';?>><a href="<?php echo base_url('schedule'); ?>" class="drop">Schedule</a><!-- Begin Shedule columns Item -->

          <div class="dropdown_2columns"><!-- Begin 5 columns container -->
            <div class = "col_2">
              <ul id="srs_list" class="greybox">
                <!--<h2>Upcoming Series</h2>
                <li><a href="#">Sri Lanka vs Australia</a></li>
                <li><a href="#">S Africa vs Zimbabwe</a></li>
                <li><a href="#">Australia vs New Zealand</a></li>
                <li><a href="#">India vs Australia</a></li>
                <li><a href="#">Sri Lanka vs Australia</a></li>-->
              </ul>
              <div class = "hline"></div>
              <!-- <ul class="greybox">
                <li><a href="#">Fixtures</a></li>
                <li><a href="#">Series Archive</a></li>
              </ul> -->
            </div>
          </div>
        </li>
        <li <?php if($view_page=='result') echo 'class="active"';?>><a href="<?php echo base_url('result'); ?>" class="drop">Results</a></li>
        <li <?php if($view_page=='team_rank') echo 'class="active"';?>><a class="drop">Rankings</a><!-- Begin 4 columns Item -->
         <div class="dropdown_2columns">
            <div class = "col_2">
              <ul class="greybox">
                <h2>Rankings</h2>
                <li><a href="<?php echo base_url('rank/team'); ?>">Team Rankings</a></li>
                <li><a href="<?php echo base_url('rank/batting'); ?>">Batsman Rankings</a></li>
                <li><a href="<?php echo base_url('rank/bowling'); ?>">Bowler Rankings</a></li>
                <li><a href="<?php echo base_url('rank/allrounder'); ?>">All Rounder Rankings</a></li>
              </ul>
            </div>
            <!--<div class = "col_2">
              <ul class="greybox">
                <h2>Records</h2>
                <li><a href="#">Batting Record</a></li>
                <li><a href="#">Bowling Record</a></li>
                <li><a href="#">All Rounder Record</a></li>
                <li><a href="#">Other Records</a></li>
              </ul>
            </div>-->
          </div>
        </li>
        <li <?php if($view_page=='news') echo 'class="active"';?>><a href="<?php echo base_url('news'); ?>" class="drop">News</a></li>
        <li <?php if($view_page=='articles') echo 'class="active"';?>><a href="<?php echo base_url('article'); ?>" class="drop">Articles</a></li>
        <li <?php if($view_page=='photos') echo 'class="active"';?>><a href="<?php echo base_url('photos');?>" class="drop">Photos</a></li>
        <li <?php if($view_page=='videos') echo 'class="active"';?>><a href="<?php echo base_url('videos');?>" class="drop">Videos</a></li>
				<li <?php if($view_page=='forum') echo 'class="active"';?>><a href="<?php echo base_url('forum'); ?>" class="drop pulsate">Forum</a></li>
      </ul>
  </div>
</div>


<!--Static Live Score-->
<div class="static-bottom-container static-bottom-bg visible-desktop" id="closeBg" style="width:96%">
	<div class="row-fluid">
  	<div class="span12">
    	<div class="container-fluid"  id="lsClose">
      	<div class="row-fluid">
        	<div class="span12">
        <!--Toggle Box-->
        	<div class="static-toggle livescore_bg livescore_bg_white" id="lsToggleBox">
          <div class="ls_close pull-right"  id="lsCloseButton"></div>
          <?php if($view_page=='home') echo '<div class="ls_default pull-right"  id="lsMakeDefault"><a class="btn">Make Default</a></div>'?>
          	<!--Toggle Box Live Score-->
          	<div class="row-fluid">
            	<div class="span12">
              	<div class="padding20">
                <div id="no_matches" class="row-fluid">
                  <div class="span12 margint-10">
                    <h5 class="series_title team_name align-center" style="color:#900"></h5>
                  </div>
                </div>
                	<div class="span12 red team_name align-center matchstate" style="color:#900;">
                  </div>
                	<div class="row-fluid  align-center">
                  	<div class="span5">
                    	<div class="team_icon1">
                      	<div class="team1_image"></div>
                      </div>
                      <h5 class="team_name team1" style="color:#4d4d4d"></h5>
                      <h4 class="red not_live team1_score" style = "font-weight:bold"></h4>
                      <p class="not_live small-text team1_over"></p>
                    </div>
                    <div class="span1">
                    	<h3 style="margin-top:42px; font-weight:bold; font-size:16px" class="red">vs</h3>
                    </div>
                    <div class="span5 pull-right">
                    	<div class="team_icon2">
                      	<div class="team2_image"></div>
                      </div>
                      <h5 class="team_name team2" style="color:#4d4d4d"></h5>
                      <h4 class="nolive team2_score"  style = "font-weight:bold"></h4>
                      <p class="not_live small-text team2_over"></p>
                    </div>
                  </div>
                  
                  <div class="row-fluid  align-center margint10">
                  	 <h6 class="red"><!--<span id="status">CSK Needs 46 Runs to win</span>--> 
                  <span class="marginl20 red not_live rrr"></span> <span class="marginl20 red not_live crr" style="text-shadow:none;font-weight:bold"></span> </h6>
                  </div>
                  
             			<div style="text-align:center" class="row-fluid margint20 playerstate"><!--Player Stats-->
              <div class = "span1 batsman-dark"></div>
              <div class="span5">
                <h5 class="team_name striker" style="color:#900"></h5>
                <!--Player-->
                <h5 class="red striker_run"  style="font-weight:bold;color:#4d4d4d"></h5>
                
                <div class="row-fluid">
                  <div class="span4">
                    <h6 class="red"></h6>
                    <h6 style="color:#4d4d4d"></h6>
                  </div>
                  <div class="span4">
                    <h6 style="text-shadow:none;color:#900">s/r</h6>
                    <h6 class="striker_sr" style="color:#4d4d4d;text-shadow:none;font-weight:bold"></h6>
                  </div>
                  <div class="span4">
                    <h6 class="red"></h6>
                    <h6 style="color:#4d4d4d"></h6>
                  </div>
                </div>
              </div>
              <div class="vline" style="border-right:solid 1px #900"></div>
              <div class="span5">
                <h5 class="team_name nonStriker" style="color:#900"></h5>
                <!--Player-->
                <h5 class="red nonStriker_run" style="font-weight:bold;color:#4d4d4d"></h5>
                <!--Player Score-->
                
                <div class="row-fluid">
                  <div class="span4">
                    <h6 class="red"></h6>
                    <h6 style="color:#4d4d4d"></h6>
                  </div>
                  <div class="span4">
                    <h6 style="text-shadow:none;color:#900">sr</h6>
                    <h6 class="nonStriker_sr" style="color:#4d4d4d;text-shadow:none;font-weight:bold"></h6>
                  </div>
                  <div class="span4">
                    <h6 class="red"></h6>
                    <h6 style="color:#4d4d4d"></h6>
                  </div>
                </div>
              </div>
              <div class="runner-dark span1"></div>
            </div>
            			<div class="row-fluid margint20 align-center bowlerstate">
              <div class="span1 bowler-dark"></div>
              <div class="span6">
                <p class="small-text strikerbowler" style="color:#4d4d4d;font-weight:bold;font-size:12px"></p>
              </div>
              <div class="span1"><!--Overs-->
                <h6 style="color:#900;text-shadow:none;">O</h6>
                <h6 class="strikerbowler_overs" style="color:#4d4d4d;text-shadow:none;"></h6>
              </div>
              <div class="span1"><!--Maidens-->
                <h6 style="color:#900;text-shadow:none;">M</h6>
                <h6 class="strikerbowler_maidens" style="color:#4d4d4d;text-shadow:none;"></h6>
              </div>
              <div class="span1"><!--Runs-->
                <h6 style="color:#900;text-shadow:none;">R</h6>
                <h6 class="strikerbowler_runs" style="color:#4d4d4d;text-shadow:none;"></h6>
              </div>
              <div class="span1"><!--Wickets-->
                <h6 style="color:#900;text-shadow:none;">W</h6>
                <h6 class="strikerbowler_wickets" style="color:#4d4d4d;text-shadow:none;"></h6>
              </div>
              <div style="text-align:center" class="span12 margint20"><!--Wickets-->
                <span class="team_name"><span class="strikers_lname" style="color:#900;text-shadow:none;"></span></span>
              </div>
            </div>
            
                </div>
              </div>
            </div>
            <!--End of Toggle Box Live Score-->
          </div>
        <!--EO Toggle Box-->
        	<div class="pull-right">
        	<ul class="grid" id="livescore_dd">
           
          </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

<div class="ls-popout-button pull-right visible-desktop" style="right:0%"><img src="<?php echo base_url('assets/Images/LS-Button.png');?>" class="res-image" id = "ls_bt_close"> </div>
<!--<div id="chat_minimize" class="chat-button pull-right visible-desktop"><img src="<?php echo base_url('assets/Images/chat_button.png');?>" class="res-image" id="chat-button"> </div>-->
 
  <!--Old Toggle Script-->
	<!--<script type="text/javascript">
		
		$("#ls_bt_close").click(function() {
    $("#lsClose").toggle(200);
		$("#closeBg").toggleClass("static-bottom-bg");
		});
		
		$(".slides li").click(function() {
			var offset = $(this).offset();
			var toggleboxOffset = $("#lsToggleBox").offset();
			if (toggleboxOffset.left === -350 || toggleboxOffset.left != (offset.left-30))
			{
			$("#lsToggleBox").animate({"left":(offset.left-50)},{duration:300});
			}
			if (toggleboxOffset.left === (offset.left-50))
			{
			$("#lsToggleBox").animate({"left":"-350px"},{duration:300});
			}
			$(".slides li").removeClass("active");
			$(this).addClass("active");
		});
		
		$("#lsMakeDefault").click(function() {
			$("html, body").animate({ scrollTop: (100) }, 500);
		});
		
		$("#lsCloseButton").click(function() {
			$("#lsToggleBox").animate({"left":"-350px"},{duration:300});
			toggleState=0;
		});
		
		$("#forget").click(function(){
			$("#login_header").text("Forgot Password?");
			$("#forgot_pw_txt").text("Email: ");
		});
		$("#login").click(function(){
			$("#login_header").text("Login");
			$("#forgot_pw_txt").text("");
		});
		
	</script>-->
