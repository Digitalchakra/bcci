<div class = "container">
  <div class = "row">
    <div class = "span8"> 
      
      <!--Page Heading-->
      <div class = "row">
        <div class = "span8">
          <div class = "page-header">
            <h3>Reset Password</h3>
          </div>
        </div>
      </div>
      <div class = "row">
        <div class = "span8">
          <div class = "">
            <div class = "alert" style = "font-size:14px"><?=$error?></div>
          </div>
        </div>
      </div>
      <!--Table-->
      <div class = "row">
        <div class = "span8 margint10">
          <div class = "well">
            <form class="form-horizontal" action="<?=base_url("forget/activation")?>" method="post">
               <input type="hidden" name="uid" value="<?=$user_id?>" >
              <div class="control-group">
                <label class="control-label" for="inputEmail">Username</label>
                <div class="controls">
                  <input type="text" id="inputEmail" name="email" value="<?=$username?>">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputPassword">New Password</label>
                <div class="controls">
                  <input type="password" name="password">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputPassword">Confirm Password </label>
                <div class="controls">
                  <input type="password" name="cpassword" >
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                
                  <button type="submit" class="btn">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="span4 margint20">
      <div class="row" style="margin-top:30px;">
        <div class="span4">
          <div class="ads-336X280 pull-right"> 
            <script type="text/javascript"><!--
    google_ad_client = "ca-pub-1444369114752839";
    /* 336x280, created 6/2/10 */
    google_ad_slot = "3029230199";
    google_ad_width = 336;
    google_ad_height = 280;
    //-->
    </script> 
            <script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

