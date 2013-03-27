<!DOCTYPE html>
<html>
<head>
<link href="{link path="../assets/css/bootstrap.css"}" rel="stylesheet" type="text/css">
<link href="{link path="../assets/css/bootstrap-responsive.min.css"}" rel="stylesheet" type="text/css">
<link href="{link path="../assets/css/mystyles.css"}" rel="stylesheet" type="text/css">
<link href="{link path="../assets/css/bcci-home.css"}" rel="stylesheet" type="text/css">
<link href="{link path="../assets/css/menu.css"}" rel="stylesheet" type="text/css">

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
    <div class = "span3 margint20"> <a href="http://www.bcci.com"><div class="logo"></div></a></div>
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
    <div class = "span12 margint20">
      <!--MEGA MENU -->

      <ul class ="menu"> 
        <li><a href="index.php" class="drop">Home</a></li>
        {dashboard_link}
        {discussions_link}
       {activity_link}
       {inbox_link}
       {custom_menu}
       {profile_link}
       {signinout_link}
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
            
          </div>
        </div>
      </div>
    </div>

<!--================END OF Footer======================-->
</body>
</html>
