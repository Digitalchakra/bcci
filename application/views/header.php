<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>BCCI</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="BCCI is the unofficial website for cricket news, scores and more.">
<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/css/mystyles.css');?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.8.3.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-tab.js');?>"></script>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->

</head>

<body>
  <!---------Header starts Here----------->
    <div class = "container"> <!----- The header Logo---->
        <div class = "row">
            <div class = "span3">
              <div class = "logo margint20"><img src="<?php echo base_url('assets/Images/Logo_03.png');?>" alt="BCCI"></div>
            </div>
            <div class = "span4 offset5">
              <div class="input-append margint20">
                 <input class="span3" id="appendedInputButton" type="text">
                 <button class="btn" type="button"><i class="icon-search"></i></button>
                </div>
            </div>
        </div>
    </div> <!-----Header Logo ---->
    
    <div class = "container"> <!-----Main Menu --------->
        <div class = "row"> 
         <div class = "span12 margint20">
          <div class="navbar navbar-inverse">
                 <div class="navbar-inner">
                <ul class="nav">
                    <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#loginmodal" data-toggle="modal">Login</a></li>
                    <li><a href="#registermodal" data-toggle="modal" >Register</a></li>
                    <!-------Login Modal -------->
                    <div id="loginmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Login Form</h3>
                        </div>
                        <div class="modal-body">
                            <p>Login Form</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                    <!--------///Login Modal----->
                    
                    <!-------Register Modal -------->
                    <div id="registermodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Registration Form</h3>
                        </div>
                        <div class="modal-body">
                            <p>Registration Form</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <!--------///Register Modal----->
                </ul>
            </div> <!-------//navbar-inner------>
          </div> <!-------//navbar------>
         </div> <!-------//Span12----->
        </div> <!----------//Row---->
    </div> <!---------//Container----->
    
    <!---------Header Ends Here----------->
