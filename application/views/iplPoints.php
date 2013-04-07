<div class = "container">
  <div class = "row">
    <div class = "span12">

      <!--Page Heading-->
      <div class = "row">
        <div class = "span12">
          <div class = "page-header">
              <h3>IPL Points Table</h3>
          </div>
        </div>
      </div>

      <!--Table-->
      <div class = "row">
      	<div class = "span12 margint10">
         <div class="well">
          <table class="table table-simple">
            <colgroup>
              <col class="span3">
              <col class="span2">
              <col class="span2">
              <col class="span2">
            </colgroup>
            <thead>
              <tr>
              	<th>Pos</th>
                <th style="text-align:left">Teams</th>
                <th>Played</th>
                <th>Points</th>
                <th>N/R</th>
                <th>Won</th>
                <th>Lost</th>
                <th>Tied</th>
                <th>No Result</th>
                <th style="text-align:left">Last 5 Matches</th>
              </tr>
            </thead>
            <tbody>
				<?php
				foreach($content as $row)
				{ ?>
              <tr>
              	<td>
                <?php echo $row->position; ?>
                </td>
              	<td style="text-align:left">
                <img src="<?php echo base_url('/assets/Images/flags/').'/'.$row->abbreviation.'.'.'png' ?>" width="42" height="42" /><span><?php echo $row->abbreviation; ?></span>
                </td>
                
                <td>
                  <?php echo $row->played; ?>
                </td>
                <td>
                  <?php echo $row->points; ?>
                </td>
                <td>
                  <?php echo $row->netRunRate; ?>
                </td>
                <td>
                  <?php echo $row->won; ?>
                </td>
                <td>
                  <?php echo $row->lost; ?>
                </td>
                <td>
                  <?php echo $row->tied;?>
                </td>
                <td>
                  <?php echo $row->noResult;?>
                </td>
                <td>
                  <?php 
										$limit = 5;
									foreach(explode(',',strrev($row->recentForm)) as $flag)
                  {
										$limit--;
                    if($flag=='W')
                    {
                      echo "<div class=".$flag."></div>";
                    }
										if($flag=='L')
                    {
                      echo "<div class=".$flag."></div>";
                    }
										if($flag=='NR'){
												echo "<div class=".$flag."></div>";
											}
										if($limit==0){
											break;
										}
                  }
                  ?>
                </td>
              </tr>
              <?php
				} ?>
            </tbody>
        </table>
         </div>
        </div>
      </div>
    </div>
    <!--<div class="span4 margint20">
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
    <!--
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
            </div>
          </div>
        </div>
    </div>-->

    <!--Side NAV-->
   <!--<div class = "span3 margint10">
      <div id="sidebar" class="sidebar-nav">
        <ul class="nav nav-tabs nav-stacked">
          <li class="menu-heading">HEADING</li>
          <li class="nav-menu"><a href="#" class = "active">Fixtures</a></li>
          <li class="nav-menu"><a href="#">Series Archive</a></li>
          <li class="nav-menu"><a href="#">Current Series</a></li>
          <li class="nav-menu"><a href="#">Past Series</a></li>
          <li class="nav-menu"><a href="#">Upcoming Series</a></li>
          <li class="nav-menu"><a href="#">Rankings</a></li>
          <li class="nav-menu"><a href="#">Records</a></li>
          <li class="nav-menu"><a href="#">Teams</a></li>

          <!--Search Box-->
           <!--<li class="nav-menu menu-box">
            <div class = "row">
              <div class = "span3">
                <div class = "padding10">
                  <div class = "page-header">
                    <h4>Search</h4>
                  </div>
                  <div class="input-append">
                    <input class="span2 wired" id="appendedInputButton" type="text">
                    <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div> -->
  </div>
</div>
<script src="<?php echo base_url('assets/js/schedule.js');?>"></script>
