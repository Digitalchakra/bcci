
   <!---------//Container----->
    
    <!---------Header Ends Here----------->
    <div class = "container margin-t20">
        <div class = "row">
            <div class = "span8 margint20">
                <div class = "grey-block">Banner</div>
            </div>
            <div class = "span4 margint20">
                <div class = "grey-block">Live Score</div>
            </div>
        </div> <!---Head Banner--->
        
        <div class = "row">
            <div class = "span12 margint20">
                <p><strong>Trending :</strong> PepsiCo bags title sponsorship for IPL  |  IPL franchises announce initial squads  |  KKR v CSK Videos  |  Pathan Interview</p>
            </div>
        </div> <!------Trending--->
        
        <div class = "row">
            <div class = "shadowfx">
            </div>
        </div> <!-------Shadowfx---->
        
        <div class = "row">
            <div class = "span8 margint20">
                <div class = "tab-box-wrapper">
                    <ul id="matchestab" class="nav nav-tabs tabs-box gradient">
                    <li><a href="#pastMatches" data-toggle="tab">Past Matches</a></li>
                    <li class="active"><a href="#presentMatches" data-toggle="tab">Present Matches</a></li>
                    <li><a href="#upcomingMatches" data-toggle="tab">Upcoming Matches</a></li>
                </ul>
                    <div id="matchestabContent" class="tab-content">
                    <div class="tab-pane fade" id="pastMatches">
                       <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Match</th>
                                    <th>Date &amp; Time</th>
                                    <th>Venue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($data['past'] as $row)
                                    {
                                        ?>
                                <tr>
                                    <td><?php echo $row->description; ?></td>
                                    <td><p><?php echo $row->date; ?></p><!--<p class="redlink">09:00 GMT 08:00 EST</p>--></td>
                                    <td><?php echo $row->mt_vnu; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                <?php echo $links; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade in active" id="presentMatches">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Match</th>
                                    <th>Date &amp; Time</th>
                                    <th>Venue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($data['present'] as $row)
                                    {
                                        ?>
                                <tr>
                                    <td><?php echo $row->description; ?></td>
                                    <td><p><?php echo $row->date; ?></p></td>
                                    <td><?php echo $row->mt_vnu; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                <?php echo $links; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="upcomingMatches">
                       <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Match</th>
                                    <th>Date &amp; Time</th>
                                    <th>Venue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($data['upcoming'] as $row)
                                    {
                                        ?>
                                <tr>
                                    <td><?php echo $row->description; ?></td>
                                    <td><p><?php echo $row->date; ?></p></td>
                                    <td><?php echo $row->mt_vnu; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                <?php echo $links; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
            <div class = "span4 margint20">
                <div class = "block-box gradient">
                    <div class = "block-header gradient">
                        Results
                    </div>
                   <div class = "block-content">
                    	<div class="accordion marginb0" id="accordion2">
  							loading ...
						</div>
                    </div>
                </div>
            </div>
    </div>
                   
                   <!------Match Shedule and Results--->
        
        <div class = "row">
            <div class = "span8 margint20">
                <ul id="newstab" class="nav nav-tabs tabs-line">
                    <li class="active"><a href="#featuredNews" data-toggle="tab">Featured News</a></li>
                    <li><a href="#recentNews" data-toggle="tab">Recent News</a></li>
                </ul>
                <div id="newstabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="featuredNews">
                        Content for Featured News
                    </div>
                    <div class="tab-pane fade" id="recentNews">
                        <p>Recent News Content</p>
                    </div>
                </div>
            </div> <!-------News Tab------->
            
            <div class = "span4 margint20">
                <div class = "grey-block">
                    <p>ADS</p>
                </div>
            </div> <!-------Ads------------>
        </div> <!------News and Ads---------->
        
        <div class = "row">
            <div class = "span12 margint20">
                <ul id="rankrecordtab" class="nav nav-tabs tabs-line">
                    <li class="active"><a href="#ranking" data-toggle="tab">Rankings</a></li>
                    <li><a href="#records" data-toggle="tab">Records</a></li>
                </ul>
                <div id="rankrecordtabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="ranking">
                        <div class = "span10">
                            <div class="tabbable tabs-left">
                                <ul id="ranktab" class="nav nav-tabs tabs-line-left">
                                    <li class="active"><a href="#team" data-toggle="tab">Team</a></li>
                                    <li><a href="#batsman" data-toggle="tab">Batsman</a></li>
                                    <li><a href="#bowler" data-toggle="tab">Bowler</a></li>
                                    <li><a href="#allRounder" data-toggle="tab">All Rounder</a></li>
                                    <li><a href="#viewall">View All</a></li>
                                </ul>
                                <div id="ranktabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="team">
                                        Team Content
                                    </div>
                                    <div class="tab-pane fade" id="batsman">
                                        Batsman Content
                                    </div>
                                    <div class="tab-pane fade" id="bowler">
                                        Bowler Content
                                    </div>
                                    <div class="tab-pane fade" id="allRounder">
                                        All Rounder Content
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="records">
                        <div class = "span10">
                            <div class="tabbable tabs-left">
                                <ul id="ranktab" class="nav nav-tabs tabs-line-left">
                                    <li class="active"><a href="#team" data-toggle="tab">Team</a></li>
                                    <li><a href="#batsman" data-toggle="tab">Batsman</a></li>
                                    <li><a href="#bowler" data-toggle="tab">Bowler</a></li>
                                    <li><a href="#allRounder" data-toggle="tab">All Rounder</a></li>
                                    <li><a href="#viewall">View All</a></li>
                                </ul>
                                <div id="ranktabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="team">
                                        Team Content
                                    </div>
                                    <div class="tab-pane fade" id="batsman">
                                        Batsman Content
                                    </div>
                                    <div class="tab-pane fade" id="bowler">
                                        Bowler Content
                                    </div>
                                    <div class="tab-pane fade" id="allRounder">
                                        All Rounder Content
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  <!------Ranking and Records---------->
        
        <div class = "row">
          <div class = "span8">
                <div class = "row">
                    <div class = "span8 margint20 marginb20">
                            <!----Photos and Videos Tab---->
                            <ul id = "gallerytab" class = "nav nav-tabs tabs-line">
                                <li class = "active"><a href ="#photos" data-toggle = "tab">Photos</a></li>
                                <li><a href = "#videos" data-toggle = "tab">Videos</a></li>
                            </ul>
                            <div id = "gallerytabContent" class = "tab-content">
                                <div class = "tab-pane fade in active" id = "photos">
                                Photos
                                </div>
                                <div class = "tab-pane fade" id = "videos">
                                Videos
                                </div>
                            </div>
                    </div>
                    <div class = "span8 marginb20">
                      <div class = "page-header">
                                <h3>Featured Articles</h3>
                      </div>
                    </div>
                </div>
            </div>
            <div class = "span4 marginb20">
                <div class = "content-block">
                    <div class = "content-box">
                        <div class = "page-header">
                        <h3>Calender</h3>
                        </div>
                        <img src="<?php echo base_url('assets/Images/calender_07.png');?>">
                    </div>
                  <div class = "content-box" style="text-align:center">
                    <img src="<?php echo base_url('assets/Images/side-ads_11.png');?>"> 
                  </div>
                </div>
            </div>
        </div> <!------Articles and Sidebar---------->
        
    </div><!------//Content--->
