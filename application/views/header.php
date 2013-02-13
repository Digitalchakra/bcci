<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BCCI</title>
<link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/mystyles.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/menu.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/bcci-home.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/hoverfx.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/dropdown.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/hoverfx_common.css'); ?>" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>"></script>
<style>
.Test, .T20{
	display:none;
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
<!--HEADER
===================================================================  -->

<!-----LOGO and SEARCH---------->
<div class = "container">
  <div class = "row">
    <div class = "span3 margint20"> <img src="<?php echo base_url('assets/Images/Logo_03.png'); ?>" alt="BCCI"> </div>
    <div class = "span4 offset5 hidden-phone">
      <div class = "row">
       <!--  <div class = "span4 margint20"> <img class = "pull-right" src="<?php echo base_url('assets/Images/soci-icons_03.png'); ?>"> </div> -->
      </div>
      <div class = "row">
        <div class = "span4  margint20">
          <div class="input-append search-box pull-right">
            <!-- <input class="span2 search-icon" id="appendedInputButton" type="text" placeholder= "Search the site">
            <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button>-->
          </div>
          <div class = "clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-----NAV MENU---------->
<div class = "container">
  <div class = "row">
    <div class = "span12 margint20">
      <!---MEGA MENU
      ------------------------------->

      <ul class ="menu">
        <li><a href="/bcci" class="drop">Home</a></li>
        <li><a href="/bcci/schedule" class="drop">Schedule</a><!-- Begin Shedule columns Item -->

          <div class="dropdown_5columns"><!-- Begin 5 columns container -->
            <div class = "col_2">
              <ul id="srs_list" class="greybox">
                <h2>Upcoming Series</h2>
                <li><a href="#">Sri Lanka vs Australia</a></li>
                <li><a href="#">S Africa vs Zimbabwe</a></li>
                <li><a href="#">Australia vs New Zealand</a></li>
                <li><a href="#">India vs Australia</a></li>
                <li><a href="#">Sri Lanka vs Australia</a></li>
              </ul>
              <div class = "hline"></div>
              <!-- <ul class="greybox">
                <li><a href="#">Fixtures</a></li>
                <li><a href="#">Series Archive</a></li>
              </ul> -->
            </div>
          </div>
        </li>
       <!--  <li><a href="#" class="drop">Statistics</a><!-- Begin 4 columns Item -->
         <!-- <div class="dropdown_4columns">
            <div class = "col_2">
              <ul class="greybox">
                <h2>Rankings</h2>
                <li><a href="#">Team Rankings</a></li>
                <li><a href="#">Batsman Rankings</a></li>
                <li><a href="#">Bowler Rankings</a></li>
                <li><a href="#">India vs Australia</a></li>
                <li><a href="#">All Rounder Rankings</a></li>
              </ul>
            </div>
            <div class = "col_2">
              <ul class="greybox">
                <h2>Records</h2>
                <li><a href="#">Batting Record</a></li>
                <li><a href="#">Bowling Record</a></li>
                <li><a href="#">All Rounder Record</a></li>
                <li><a href="#">Other Records</a></li>
              </ul>
            </div>
          </div>
        </li> -->
        <li><a href="/bcci/news" class="drop">News</a></li>
        <li><a href="/bcci/article" class="drop">Articles</a></li>
 <!--        <li><a href="#" class="drop">Photos</a></li>
        <li><a href="#" class="drop">Polls</a></li>
        <li><a href="#" class="drop">About</a></li> -->
        <!-- <li class = "menu_right"><a href="#" class="drop" style="margin-right:5px"><i class = "icon-lock icon-white" style="margin-right:15px;"></i>Register</a></li>
        <li class = "menu_right"><a href="#" class="drop" style="margin-right:5px"><i class = "icon-user icon-white" style="margin-right:15px;"></i>Login</a></li> -->
      </ul>
    </div>
  </div>
</div>
