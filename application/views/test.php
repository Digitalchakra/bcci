<link href="<?php echo base_url('assets/css/test.css'); ?>" rel="stylesheet" type="text/css">
<? $userdata=$this->phpbb_library->get_session_user(); ?>
<div class="container">

	<div class="row">
		<div class="span12 cpn_header">
			<div class="patch_borderLine"></div>
			<div class="cpn_logo">
				<div class="patch_logocurve">
					
				</div>
				<div class="logo"></div>	
					
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class="span12 cpn_title">
			<h2>Welcome to Bindaas Cricket café!</h2>
		</div>
	</div>
	<div class="row">
    <?php if($userdata['is_registered'] != 1)
        { ?>
        <!--not logged in -->
		 <div class="span5 cpn1">
      <p class="cpn_p1"> IMG Our café brings you Cricket with a difference, you don't just get Live Scores with Cricket statistics.</p>
      
      <p>IMG You get a world that is a lot bigger than that!</p>

      <iframe style="margin-left:14px;" width="350" height="197" src="http://www.youtube.com/embed/Ju8gxy5eI34?rel=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="span3 cpn2">
      <p class="cpn_p1">IMG Get access to your very own Sports social network in one click!</p>
      
      <p>IMG Register with us and get access to a lot more fun on Bindaas Cricket café!</p>
      <br/>
      <br/>
      
      
    </div>
    <? }  else { ?>
    <!-- logged in -->
    <div class="span5 cpn1">
      <p class="cpn_p1">Our café brings you Cricket with a difference, you don't just get Live Scores with Cricket statistics.</p>
      
      <p>You get a world that is a lot bigger than that!</p>

      <iframe style="margin-left:14px;" width="350" height="197" src="http://www.youtube.com/embed/Ju8gxy5eI34?rel=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="span3 cpn2">
      <p class="cpn_p1">Get access to your very own Sports social network in one click!</p>
      
      <p>Register with us and get access to a lot more fun on Bindaas Cricket café!</p>
      <br/>
      <br/>
      
      
    </div>
    <? } ?>

			<!-- if not logged in show registration and login form -->
			 <?php if($userdata['is_registered'] != 1)
        { ?>
        <!-- not logged in -->
        <div class="span4">
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
                      <span id="cerror_msg1" class="errorMessage"></span>

                      <form class="form-horizontal" id="cregister_form">
                         <div class="margint10"></div>
                        <span>Username: </span><input type="text" class="input-large" name="cuname" id="cuname" style="text-align:left">
                         <div class="margint10"></div>
                         <span>Password: </span><input type="password" class="input-large" name="cpass_word" id="cinputPassword" style="text-align:left">
                         <div class="margint10"></div>
                         <span>E-Mail: </span><input type="text" class="input-large" name="cemail_address" id="cinputEmail" style="text-align:left">
                         <!--<div class="margint10"></div>
                         <span>Last Name: </span><input type="text" class="input-large" name="lastname" id="lastname" style="text-align:left">-->
                         <div class="margint20"></div>
                         <a class="btn btn-mini btn-primary span1 pull-right marginb15" id="csignupsubmit">Register</a>
                      </form>
                      
                    </div>
                  </div>
                  </div>
                </div>
          </li>
          <li class = "menu_right dropdown open">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-right:5px">
           <i class = "icon-user icon-white" style="margin-right:15px;"></i>Login
          </a>
          <div class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
            <div class="row">
              <div class = "span3">
                <div class="padding20" style="text-align:left">
                  
                  <h4 style = "text-align:left;margin-left:0;" id="clogin_header">Login</h4>
                  <div class="divider"></div><span id="cerror_msg" class="errorMessage"></span>
                  <form class="form-horizontal">
                    <span class="clogin">Username: </span><input type="text" class="input-large clogin" id="cusername" name="cusername" style="text-align:left">
                    <div class="margint10"></div>
                    <span class="clogin">Password: </span><input type="password" class="input-large clogin" id="cpassowrd" name="cpassword">
                    <span id="cforgot_pw_txt"></span><input type="text"  class="cforget input-large margint20" id="cfusername" name="cfusername" style="display:none; margin-top:10px">
                    <span id="cforget" class="pull-right margint10 clogin red" style="cursor:pointer;margin-left:0;" >Forgot Password?</span>
                    <div class="margint20"></div>
                         <a class="btn btn-mini btn-primary span1 pull-right marginb15 margint10 clogin" id="cloginsubmit">Login</a>
                         <a id="clogin" class="btn btn-mini btn-primary pull-left margint10 cforget red" style="display:none;cursor:pointer;">Cancel</a>
                         <a class="btn btn-mini btn-primary marginb15 pull-right margint10 cforget" id="cforgetsubmit" style="display:none;">Reset Password</a>
                  </form>                  
                  
                </div>
              </div>
            </div>
          </div>
        </li>
        <!--<div>
        <button class="btn btn-warning cpn_join"> Join the café</button>
      </div>-->
      <div class="cpn3_inner">

        <!-- <div class="cpn_icn">
        </div> -->
      </div>
      
      
    </div>
          <?php } 
          //if($userdata['is_registered'] == 1)
          else
        { ?>
      <!-- logged in -->
      <div class="span4 cpn3">
        <li class = "menu_right dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-right:5px">
           <i class = "icon-user icon-white" style="margin-right:15px;"></i><?php echo $userdata['username_clean']; ?>
          </a>
          <!-- 
          <div class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
           <div class="row">
              <div class = "span2">
                <div class="padding20" style="text-align:left">
-->                <ul class="dropdown-menu pull-right profile-dropdown">
                   <!-- <li><a tabindex="-1" href="#">Profile</a></li>
                    <li><a tabindex="-1" href="#">Settings</a></li>-->
                    <li><a tabindex="-1" href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
                  </ul>
<!--                </div>
              </div>
            </div>
         </div>
         --> 
        </li>
        	<div>
				<a class="btn btn-warning cpn_join" href="<?=base_url('forum');?>">Go to Forum</a>
			</div>
      <div class="cpn3_inner">

        <!-- <div class="cpn_icn">
        </div> -->
      </div>
      
      
    </div>
         <?php } ?>
	</div>
</div>
<script src="<?php echo base_url('assets/js/test.js');?>"></script>