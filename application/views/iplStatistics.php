<link href="<?php echo base_url('assets/css/bcci-ipl.css'); ?>" rel="stylesheet" type="text/css">
<div class = "container">
  <div class="row">
    <div class="span12 ipl_head">
          <ul>
            <li><a href="<? echo base_url('ipl/ipl'); ?>">IPL</a></li>
            <li><a class="ipl_head_current" href="<? echo base_url('ipl/stats'); ?>">Statistics</a></li>
            <li><a href="<? echo base_url('ipl/crossword'); ?>">Crossword</a></li>
            <li><a href="<? echo base_url('ipl/quiz'); ?>">Quiz</a></li>
            <li><a href="<? echo base_url('ipl/points'); ?>">Points table</a></li>
          </ul>
    </div>
  </div> 
  <div class="row">
      <div class="span9 ipl-ads">
        <script type="text/javascript"><!--
          google_ad_client = "ca-pub-1444369114752839";
          /* 728x90, created 12/12/07 */
          google_ad_slot = "2932032750";
          google_ad_width = 728;
          google_ad_height = 90;
          //-->
        </script>
        <script type="text/javascript"
          src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
      </div>
      <div class="span3 ipl-ads ipl-ads2">
        <script type="text/javascript"><!--
          google_ad_client = "ca-pub-1444369114752839";
          /* live-score-top */
          google_ad_slot = "7901791092";
          google_ad_width = 200;
          google_ad_height = 90;
          //-->
        </script>
        <script type="text/javascript"  
          src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
      </div>
    </div>
  <div class = "row">
    <div class = "span12"> 
      <!--DropDown Left-->
      <div class = "row">
        <div class = "span12">
          <div class="btn-group margint20 small-menu">
            <button class="btn dropdown-toggle" data-toggle="dropdown">Statistics<span class="drop-icon"></span></button>
            <ul class="dropdown-menu">
            <li><a href="<? echo base_url('ipl/batting_stats'); ?>">Batting Statistics</a></li>
            <li><a href="<? echo base_url('ipl/bowling_stats'); ?>">Bowling Statistics</a></li>
            <li><a href="<? echo base_url('ipl/compare_stats'); ?>">Compare Players</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="span12 margint10 marginb10">
          <div class="ipl-stats-grid">
          
          <?php
				foreach($content as $row)
				{ ?>
            <div class="team-block align-center <?php echo $row->abbreviation;?>">
              <div class="team-details">
                <div class="ipl-<?php echo $row->abbreviation;?>"></div>
                <div><?php echo $row->abbreviation;?></div>
                <h4>Points: <?php echo $row->points; ?></h4>
                <h4><span class="pull-left">Last 5: </span> 
                	<?php 
										$limit = 5;
									foreach(explode(',',strrev($row->recentForm)) as $flag)
                  {
                    if($flag=='W')
                    {
                      echo "<span class=".$flag."></span>";
                    }
										if($flag=='L')
                    {
                      echo "<span class=".$flag."></span>";
                    }
										if($flag=='NR'){
												echo "<span class=".$flag."></span>";
											}
										if($limit==0){
											break;
										}
                    $limit--;
                  }
                  ?>
                </h4>
                <div class="clearfix"></div>
              </div>
              <div class="team-stats normal">
                <h5>Mat: <?php echo $row->played; ?></h5>
                <h5>Won: <?php echo $row->won; ?></h5>
                <h5>Lost: <?php echo $row->lost; ?></h5>
                <h5>Tied:  <?php echo $row->tied;?></h5>
                <h5>NRR: <?php echo $row->netRunRate; ?></h5>
               <!-- <h5>For: 510/60.0</h5>
                <h5>Against: 460/60.0</h5>-->
              </div>
              <!--<div class="team-stats hover">
                <h4>CHENNAI SUPER KINGS</h4>
                <h5>Owner: Bharati Cements</h5>
                <h5>Coach: John Wright</h5>
                <h5>Captain: Mahendra Singh Dhoni</h5>
                <h5>IPL Best: Won IPL Cup 2times</h5>
              </div>-->
            </div>
          <?php
				} ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
