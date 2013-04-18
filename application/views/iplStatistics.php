<link href="<?php echo base_url('assets/css/bcci-ipl.css'); ?>" rel="stylesheet" type="text/css">
<div class = "container">
  <div class = "row">
    <div class = "span12"> 
      <!--DropDown Left-->
      <div class = "row">
        <div class = "span12">
          <div class="btn-group margint20 small-menu">
            <button class="btn dropdown-toggle" data-toggle="dropdown">Statistics<span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="">Batting Statistics</a></li>
              <li><a href="">Bowling Statistics</a></li>
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
                <h5>N/R: </h5>
                <h5>Net RR: <?php echo $row->netRunRate; ?></h5>
                <h5>For: 510/60.0</h5>
                <h5>Against: 460/60.0</h5>
              </div>
              <div class="team-stats hover">
                <h4>CHENNAI SUPER KINGS</h4>
                <h5>Owner: Bharati Cements</h5>
                <h5>Coach: John Wright</h5>
                <h5>Captain: Mahendra Singh Dhoni</h5>
                <h5>IPL Best: Won IPL Cup 2times</h5>
              </div>
            </div>
          <?php
				} ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
