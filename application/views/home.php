<!--MAIN CONTENT
===================================================================  -->

<div class = "container margin-t20">
<div class = "row">
  <div class = "span8 margint20">
    <div id="myCarousel" class="carousel slide" style="z-index:0"> 
      <!-- Carousel items -->
      <div class="carousel-inner" id="bannerslide">
        <div class="item"> <img src="<?php echo base_url('assets/Images/csk.jpg'); ?>" class = "res-image">
          <div class = "carousel-caption">
            <h4>Heading</h4>
            <p>The content for the image goes here.</p>
          </div>
        </div>
        <div class="item"> <img src="<?php echo base_url('assets/Images/csk.jpg'); ?>" class = "res-image">
          <div class = "carousel-caption">
            <h4>Heading</h4>
            <p>The content for the image goes here.</p>
          </div>
        </div>
        <div class="item"> <img src="<?php echo base_url('assets/Images/csk.jpg'); ?>" class = "res-image">
          <div class = "carousel-caption">
            <h4>Heading</h4>
            <p>The content for the image goes here.</p>
          </div>
        </div>
      </div>
      <!-- Carousel nav --> 
      <a class="carousel-control left" href="#myCarousel" data-slide="prev" >&lsaquo;</a> <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> </div>
  </div>
  
  <!--Live SCore-->
  <div class = "span4 margint20">
    <div class = "grey-block" style="height:420px" id="livescore">Live Score</div>
  </div>
</div>
<div class = "row">
  <div class = "span12 margint20">
    <p><strong>Trending :</strong> PepsiCo bags title sponsorship for IPL  |  IPL franchises announce initial squads  |  KKR v CSK Videos  |  Pathan Interview</p>
  </div>
</div>

<!--Shadow FX-->
<div class = "row">
  <div class = "shadowfx"> </div>
</div>

<!-- Matches Tab-->
<div class = "row">
  <div class = "span8 margint20">
    <div class = "tab-box-wrapper">
      <ul id="matchestab" class="nav nav-tabs tabs-box gradient">
        <li><a href="#pastMatches" data-toggle="tab">Past Matches</a></li>
        <li class="active"><a href="#presentMatches" data-toggle="tab">Present Matches</a></li>
        <li><a href="#upcomingMatches" data-toggle="tab">Upcoming Matches</a></li>
        <div class="btn-group pull-right red-button">
          <button class="btn red-btn">Shedule</button>
          <button class="btn dropdown-toggle red-btn" data-toggle="dropdown"> <span class="caret"></span> </button>
          <ul class="dropdown-menu red-dropdown">
            <li><a href = "#">Present Matches</a></li>
            <li><a href = "#">Past Matches</a></li>
            <li><a href = "#">Upcoming Matches</a></li>
            <li><a href = "#">Fixtures</a></li>
            <li><a href = "#">Series Archive</a></li>
          </ul>
        </div>
        <div class = "clearfix"></div>
      </ul>
      <!--Matches Tabs COntent-->
      <div id="matchestabContent" class="tab-content">
        <div class="tab-pane fade" id="pastMatches"> 
          <!--Past matches Table-->
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Match</th>
                <th>Date & Time</th>
                <th>Venue</th>
              </tr>
            </thead>
            <tbody>
              <?php
                                foreach($content['past'] as $row)
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
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade in active" id="presentMatches"> 
          <!--Present matches Table-->
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Match</th>
                <th>Date & Time</th>
                <th>Venue</th>
              </tr>
            </thead>
            <tbody>
              <?php
               foreach($content['present'] as $row)
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
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="upcomingMatches"> 
          <!--Upcoming matches Table-->
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Match</th>
                <th>Date & Time</th>
                <th>Venue</th>
              </tr>
            </thead>
            <tbody>
             <?php
                                foreach($content['upcoming'] as $row)
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
            </tbody>
          </table>
          <p class="pull-right"><a href="schedule">View all</a></p>
        </div>
      </div>
    </div>
  </div>
  
  <!--Results On the right-->
  <div class = "span4 margint20">
  	<div class = "white-block">
    	<div class = "heading">
      	<h4>Results
      	</h4>
      	<!-- drop menu start-->
      	<p class="pull-right" id="resultmenu">
      	</p>
			<!-- drop menu end-->
      </div>
      <div class="accordion" id="accordion2">
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
              <div class = "content">
                <div class = "date">
                  25 <span class="red">DEC</span>
                </div>
                <div class = "match">
                  <h4>India* <span class = "grey">vs Australia</span></h4>
                  <h5>India won by 6 Runs - (46.3 Overs)</h5>
                </div>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
          <div id="collapseOne" class="accordion-body collapse in">
            <div class="accordion-inner">
            	<div class = "content">
                <div class = "stats">
                  <p>ICC T20 World Cup Semi Finals |  12:30 GMT</p>
                  <div class = "content-block">
                    <p><span class="red">MS Dhoni </span>74(65)</p>
                    <p><span class="red">4's </span>8<span class="red"> 6's </span>8</p>
                  </div>
                  <div class = "content-block">
                    <p><span class="red">S Raina </span>74(65)</p>
                    <p><span class="red">4's </span>8<span class="red"> 6's </span>8</p>
                  </div>
                  <div class = "content-block">
                    <h2>188/5</h2>
                  </div>
                  <div class="clearfix"></div>
                  <p>Australia 188/6 from 50 Overs (First Down)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
              <div class = "content">
                <div class = "date">
                  25 <span class="red">DEC</span>
                </div>
                <div class = "match">
                  <h4>India* <span class = "grey">vs Australia</span></h4>
                  <h5>India won by 6 Runs - (46.3 Overs)</h5>
                </div>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
          <div id="collapseTwo" class="accordion-body collapse">
            <div class="accordion-inner">
            	<div class = "content">
                <div class = "stats">
                  <p>ICC T20 World Cup Semi Finals |  12:30 GMT</p>
                  <div class = "content-block">
                    <p><span class="red">MS Dhoni </span>74(65)</p>
                    <p><span class="red">4's </span>8<span class="red"> 6's </span>8</p>
                  </div>
                  <div class = "content-block">
                    <p><span class="red">S Raina </span>74(65)</p>
                    <p><span class="red">4's </span>8<span class="red"> 6's </span>8</p>
                  </div>
                  <div class = "content-block">
                    <h2>188/5</h2>
                  </div>
                  <div class="clearfix"></div>
                  <p>Australia 188/6 from 50 Overs (First Down)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
              <div class = "content">
                <div class = "date">
                  25 <span class="red">DEC</span>
                </div>
                <div class = "match">
                  <h4>India* <span class = "grey">vs Australia</span></h4>
                  <h5>India won by 6 Runs - (46.3 Overs)</h5>
                </div>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
          <div id="collapseThree" class="accordion-body collapse">
            <div class="accordion-inner">
            	<div class = "content">
                <div class = "stats">
                  <p>ICC T20 World Cup Semi Finals |  12:30 GMT</p>
                  <div class = "content-block">
                    <p><span class="red">MS Dhoni </span>74(65)</p>
                    <p><span class="red">4's </span>8<span class="red"> 6's </span>8</p>
                  </div>
                  <div class = "content-block">
                    <p><span class="red">S Raina </span>74(65)</p>
                    <p><span class="red">4's </span>8<span class="red"> 6's </span>8</p>
                  </div>
                  <div class = "content-block">
                    <h2>188/5</h2>
                  </div>
                  <div class="clearfix"></div>
                  <p>Australia 188/6 from 50 Overs (First Down)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
              <div class = "content">
                <div class = "date">
                  25 <span class="red">DEC</span>
                </div>
                <div class = "match">
                  <h4>India* <span class = "grey">vs Australia</span></h4>
                  <h5>India won by 6 Runs - (46.3 Overs)</h5>
                </div>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
          <div id="collapseFour" class="accordion-body collapse">
            <div class="accordion-inner">
            	<div class = "content">
                <div class = "stats">
                  <p>ICC T20 World Cup Semi Finals |  12:30 GMT</p>
                  <div class = "content-block">
                    <p><span class="red">MS Dhoni </span>74(65)</p>
                    <p><span class="red">4's </span>8<span class="red"> 6's </span>8</p>
                  </div>
                  <div class = "content-block">
                    <p><span class="red">S Raina </span>74(65)</p>
                    <p><span class="red">4's </span>8<span class="red"> 6's </span>8</p>
                  </div>
                  <div class = "content-block">
                    <h2>188/5</h2>
                  </div>
                  <div class="clearfix"></div>
                  <p>Australia 188/6 from 50 Overs (First Down)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
              <div class = "content">
                <div class = "date">
                  25 <span class="red">DEC</span>
                </div>
                <div class = "match">
                  <h4>India* <span class = "grey">vs Australia</span></h4>
                  <h5>India won by 6 Runs - (46.3 Overs)</h5>
                </div>
                <div class="clearfix"></div>
              </div>
            </a>
          </div>
          <div id="collapseFive" class="accordion-body collapse">
            <div class="accordion-inner">
            	<div class = "content">
                <div class = "stats">
                  <p>ICC T20 World Cup Semi Finals |  12:30 GMT</p>
                  <div class = "content-block">
                    <p><span class="red">MS Dhoni </span>74(65)</p>
                    <p><span class="red">4's </span>8<span class="red"> 6's </span>8</p>
                  </div>
                  <div class = "content-block">
                    <p><span class="red">S Raina </span>74(65)</p>
                    <p><span class="red">4's </span>8<span class="red"> 6's </span>8</p>
                  </div>
                  <div class = "content-block">
                    <h2>188/5</h2>
                  </div>
                  <div class="clearfix"></div>
                  <p>Australia 188/6 from 50 Overs (First Down)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Match Shedule and Results-->
<div class = "row">
<div class = "span8 margint20">
<ul id="newstab" class="nav nav-tabs tabs-line">
  <li class="active"><a href="#featuredNews" data-toggle="tab">Featured News</a></li>
  <li><a href="#recentNews" data-toggle="tab">Recent News</a></li>
</ul>
<div id="newstabContent" class="tab-content">
<div class="tab-pane fade in active" id="featuredNews">

<!--Featured News Content-->
<div class = "row">
<div class = "span3">
  <div id="featurednewscontTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="featuredNewsOne">
      <ul class="thumbnails">
        <li class="span3">
          <div class = "thumbnail news-tab"> <img src="Images/featured-news_03.png">
            <div class = "caption">
              <p>
              <h5 class = "red-text">IPL News</h5>
              <p></p>
              <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="tab-pane fade in" id="featuredNewsTwo">
      <ul class="thumbnails">
        <li class="span3">
          <div class = "thumbnail news-tab"> <img src="Images/footer-logo_03.png">
            <div class = "caption">
              <p>
              <h5 class = "red-text">IPL News</h5>
              <p></p>
              <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="tab-pane fade in" id="featuredNewsThree">
      <ul class="thumbnails">
        <li class="span3">
          <div class = "thumbnail news-tab"> <img src="Images/footer-logo_03.png">
            <div class = "caption">
              <p>
              <h5 class = "red-text">IPL News</h5>
              <p></p>
              <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="tab-pane fade in" id="featuredNewsFour">
      <ul class="thumbnails">
        <li class="span3">
          <div class = "thumbnail news-tab"> <img src="Images/footer-logo_03.png">
            <div class = "caption">
              <p>
              <h5 class = "red-text">IPL News</h5>
              <p></p>
              <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="tab-pane fade in" id="featuredNewsFive">
      <ul class="thumbnails">
        <li class="span3">
          <div class = "thumbnail news-tab"> <img src="Images/footer-logo_03.png">
            <div class = "caption">
              <p>
              <h5 class = "red-text">IPL News</h5>
              <p></p>
              <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="tab-pane fade in" id="featuredNewsSix">
      <ul class="thumbnails">
        <li class="span3">
          <div class = "thumbnail news-tab"> <img src="Images/footer-logo_03.png">
            <div class = "caption">
              <p>
              <h5 class = "red-text">IPL News</h5>
              <p></p>
              <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class = "span5">
  <ul id = "featurednewscontTab" class = "nav nav-pills  tab-text">
    <li class = "active"><a href="#featuredNewsOne" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
    <li><a href="#featuredNewsTwo" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
    <li><a href="#featuredNewsThree" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
    <li><a href="#featuredNewsFour" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
    <li><a href="#featuredNewsFive" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
    <li><a href="#featuredNewsSix" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
  </ul>
</div>
<!---------Featured News Content Ends here-->
              		</div>
                    </div>
              		<div class="tab-pane fade" id="recentNews">
                		<div class = "row">
                            	<div class = "span3">
                                	<div id="recentnewscontTabContent" class="tab-content">
             							<div class="tab-pane fade in active" id="recentNewsOne">
                                        	<ul class="thumbnails">
  										<li class="span3">
    										<div class = "thumbnail news-tab">
                                            <img src="Images/featured-news_03.png"> 
                                            	<div class = "caption">
                                                <p><h5 class = "red-text">IPL News</h5></p>
                                                <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
                                                </div>
                                            </div>
  										</li>
									</ul>
                                		</div>
                                        <div class="tab-pane fade in" id="recentNewsTwo">
                                        	<ul class="thumbnails">
  										<li class="span3">
    										<div class = "thumbnail news-tab">
                                            <img src="Images/footer-logo_03.png"> 
                                            	<div class = "caption">
                                                <p><h5 class = "red-text">IPL News</h5></p>
                                                <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
                                              </div>
                                          </div>
  										</li>
									</ul>
                                		</div>
                                        <div class="tab-pane fade in" id="recentNewsThree">
                                        	<ul class="thumbnails">
  										<li class="span3">
    										<div class = "thumbnail news-tab">
                                            <img src="Images/footer-logo_03.png"> 
                                            	<div class = "caption">
                                                <p><h5 class = "red-text">IPL News</h5></p>
                                                <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
                                              </div>
                                          </div>
  										</li>
									</ul>
                                		</div>
                                        <div class="tab-pane fade in" id="recentNewsFour">
                                        	<ul class="thumbnails">
  										<li class="span3">
    										<div class = "thumbnail news-tab">
                                            <img src="Images/footer-logo_03.png"> 
                                            	<div class = "caption">
                                                <p><h5 class = "red-text">IPL News</h5></p>
                                                <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
                                              </div>
                                          </div>
  										</li>
									</ul>
                                		</div>
                                        <div class="tab-pane fade in" id="recentNewsFive">
                                        	<ul class="thumbnails">
  										<li class="span3">
    										<div class = "thumbnail news-tab">
                                            <img src="Images/footer-logo_03.png"> 
                                            	<div class = "caption">
                                                <p><h5 class = "red-text">IPL News</h5></p>
                                                <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
                                              </div>
                                          </div>
  										</li>
									</ul>
                                		</div>
                                        <div class="tab-pane fade in" id="recentNewsSix">
                                        	<ul class="thumbnails">
  										<li class="span3">
    										<div class = "thumbnail news-tab">
                                            <img src="Images/footer-logo_03.png"> 
                                            	<div class = "caption">
                                                <p><h5 class = "red-text">IPL News</h5></p>
                                                <p>Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.</p>
                                              </div>
                                          </div>
  										</li>
									</ul>
                                		</div>
                                      </div>
                                </div>
                                <div class = "span5">
                                	<ul id = "recentnewscontTab" class = "nav nav-pills  tab-text">
                                      <li class = "active"><a href="#recentNewsOne" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
                                      <li><a href="#recentNewsTwo" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
                                      <li><a href="#recentNewsThree" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
                                      <li><a href="#recentNewsFour" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
                                      <li><a href="#recentNewsFive" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
                                      <li><a href="#recentNewsSix" data-toggle="tab">'IPL would’ve impacted young Dravid’s game'</a></li>
                                     </ul>
                            </div>
                        <!---------Featured News Content Ends here-->
              		</div>
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
               			<div class = "span11">
                        	<div class="tabbable tabs-left">
                            	<ul id="ranktab" class="nav nav-tabs tabs-line-left">
              						<li class="active"><a href="#team" data-toggle="tab">Team</a></li>
              						<li><a href="#batsman" data-toggle="tab">Batsman</a></li>
                                    <li><a href="#bowler" data-toggle="tab">Bowler</a></li>
                                    <li><a href="#allRounder" data-toggle="tab">All Rounder</a></li>
                                    <li><a class = "redlink" href="#viewall">View All</a></li>
            									</ul>
                                <div id="ranktabContent" class="tab-content">
             					<div class="tab-pane fade in active" id="team">
									<!-- team rank -->
                                    	<div class = "span3">
                                        <!--Team Ranking Accordion 01-->
                                        <h4>Test</h4>
                                        <div class =  "white-block">
                                        	<div class="accordion" id="team-ranking">
                                            <div class="accordion-group">
                                              <div id="teamRankOne" class="accordion-body collapse in">
                                                <div class="accordion-inner">
                                                   	<img src="<?php echo base_url('assets/Images/India_03.png'); ?>" class = "res-image">
                                                </div>
                                              </div>
                                              <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#team-ranking" href="#teamRankOne">
                                                  <div class = "content">
                                                    <div class = "date">
                                                      <span class="red"><h3>01</h3></span>
                                                    </div>
                                                    <div class = "match">
                                                      <h3 class="grey">India</h3>
                                                      <h5>Rating: 150 | Points: 09</h5>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                </a>
                                              </div>
                                            </div>
                                            <div class="accordion-group">
                                              <div id="teamRankTwo" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                   	<img src="<?php echo base_url('assets/Images/Australia_03.png'); ?>" class = "res-image">
                                                </div>
                                              </div>
                                              <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#team-ranking" href="#teamRankTwo">
                                                  <div class = "content">
                                                    <div class = "date">
                                                      <span class="red"><h3>02</h3></span>
                                                    </div>
                                                    <div class = "match">
                                                      <h3 class="grey">Australia</h3>
                                                      <h5>Rating: 150 | Points: 09</h5>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                </a>
                                              </div>
                                            </div>
                                            <div class="accordion-group">
                                              <div id="teamRankThree" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                   	<img src="Images/England_03.png" class = "res-image">
                                                </div>
                                              </div>
                                              <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#team-ranking" href="#teamRankThree">
                                                  <div class = "content">
                                                    <div class = "date">
                                                      <span class="red"><h3>03</h3></span>
                                                    </div>
                                                    <div class = "match">
                                                      <h3 class="grey">England</h3>
                                                      <h5>Rating: 150 | Points: 09</h5>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class = "span3">
                                        <!--Team Ranking Accordion 02-->
                                        <h4>ODI</h4>
                                        <div class =  "white-block">
                                        	<div class="accordion" id="team-ranking01">
                                            <div class="accordion-group">
                                              <div id="teamRankOne01" class="accordion-body collapse in">
                                                <div class="accordion-inner">
                                                   	<img src="Images/India_03.png" class = "res-image">
                                                </div>
                                              </div>
                                              <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#team-ranking01" href="#teamRankOne01">
                                                  <div class = "content">
                                                    <div class = "date">
                                                      <span class="red"><h3>01</h3></span>
                                                    </div>
                                                    <div class = "match">
                                                      <h3 class="grey">India</h3>
                                                      <h5>Rating: 150 | Points: 09</h5>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                </a>
                                              </div>
                                            </div>
                                            <div class="accordion-group">
                                              <div id="teamRankTwo01" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                   	<img src="Images/Australia_03.png" class = "res-image">
                                                </div>
                                              </div>
                                              <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#team-ranking01" href="#teamRankTwo01">
                                                  <div class = "content">
                                                    <div class = "date">
                                                      <span class="red"><h3>02</h3></span>
                                                    </div>
                                                    <div class = "match">
                                                      <h3 class="grey">Australia</h3>
                                                      <h5>Rating: 150 | Points: 09</h5>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                </a>
                                              </div>
                                            </div>
                                            <div class="accordion-group">
                                              <div id="teamRankThree01" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                   	<img src="Images/England_03.png" class = "res-image">
                                                </div>
                                              </div>
                                              <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#team-ranking01" href="#teamRankThree01">
                                                  <div class = "content">
                                                    <div class = "date">
                                                      <span class="red"><h3>03</h3></span>
                                                    </div>
                                                    <div class = "match">
                                                      <h3 class="grey">England</h3>
                                                      <h5>Rating: 150 | Points: 09</h5>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class = "span3">
                                        <!--Team Ranking Accordion 03-->
                                        <h4>T20</h4>
                                        <div class =  "white-block">
                                        	<div class="accordion" id="team-ranking02">
                                            <div class="accordion-group">
                                              <div id="teamRankOne03" class="accordion-body collapse in">
                                                <div class="accordion-inner">
                                                   	<img src="Images/India_03.png" class = "res-image">
                                                </div>
                                              </div>
                                              <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#team-ranking03" href="#teamRankOne03">
                                                  <div class = "content">
                                                    <div class = "date">
                                                      <span class="red"><h3>01</h3></span>
                                                    </div>
                                                    <div class = "match">
                                                      <h3 class="grey">India</h3>
                                                      <h5>Rating: 150 | Points: 09</h5>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                </a>
                                              </div>
                                            </div>
                                            <div class="accordion-group">
                                              <div id="teamRankTwo03" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                   	<img src="Images/Australia_03.png" class = "res-image">
                                                </div>
                                              </div>
                                              <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#team-ranking03" href="#teamRankTwo03">
                                                  <div class = "content">
                                                    <div class = "date">
                                                      <span class="red"><h3>02</h3></span>
                                                    </div>
                                                    <div class = "match">
                                                      <h3 class="grey">Australia</h3>
                                                      <h5>Rating: 150 | Points: 09</h5>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                </a>
                                              </div>
                                            </div>
                                            <div class="accordion-group">
                                              <div id="teamRankThree03" class="accordion-body collapse">
                                                <div class="accordion-inner">
                                                   	<img src="Images/England_03.png" class = "res-image">
                                                </div>
                                              </div>
                                              <div class="accordion-heading">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#team-ranking03" href="#teamRankThree03">
                                                  <div class = "content">
                                                    <div class = "date">
                                                      <span class="red"><h3>03</h3></span>
                                                    </div>
                                                    <div class = "match">
                                                      <h3 class="grey">England</h3>
                                                      <h5>Rating: 150 | Points: 09</h5>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                </a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      
                                    </div>
                                    <div class="tab-pane fade" id="batsman">
										<!-- batsman rank -->
	                                                                     
	                                    
                                    </div>
                                    <div class="tab-pane fade" id="bowler">
										<!-- bowler rank -->

                                      
                                      
                                    </div>
                                    <div class="tab-pane fade" id="allRounder">
										<!-- allRounder rank -->
                                      
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
              		</div>
              		<div class="tab-pane fade" id="records">
                		<div class = "span10">
                        	<div class="tabbable tabs-left">
                            	<ul id="recordtab" class="nav nav-tabs tabs-line-left">
              						<li class="active"><a href="#batting" data-toggle="tab">Batting</a></li>
              						<li><a href="#bowling" data-toggle="tab">Bowling</a></li>
                                    <li><a href="#otherRecords" data-toggle="tab">Other Records</a></li>
                                    <li><a class = "redlink" href="#viewall">View All</a></li>
            					</ul>
                                <div id="recordtabContent" class="tab-content">
             						<div class="tab-pane fade in active" id="batting">
	                                    Batting Records
                                    </div>
                                    <div class="tab-pane fade" id="bowling">
	                                    Bowling Records
                                    </div>
                                    <div class="tab-pane fade" id="otherRecords">
	                                    Other Records
                                    </div>
                                </div>
                            </div>
                        </div>
              		</div>
            	</div>
            </div>
        </div>	<!------Ranking and Records---------->
        
		<div class = "row">
       	  <div class = "span8">
            	<div class = "row">
                	<div class = "span8 margint20 marginb20">
                        	<!----Photos and Videos Tab---->
                            <ul id = "gallerytab" class = "nav nav-tabs tabs-line">
                            	<li class = "active"><a href ="#photos" data-toggle = "tab">Photos</a></li>
                            	<li><a href ="#videos" data-toggle = "tab">Videos</a></li>
                            </ul>
                            <div id = "gallerytabContent" class = "tab-content">
                            	<div class = "tab-pane fade in active" id = "photos">
                                    <div class = "row">
                                    	<div class = "span8">
                                              <div id="photosgrid" class = "grid">
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img02_05.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img03_10.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img04_12.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img02_05.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img03_10.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img04_12.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img02_05.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img03_10.jpg"></a>
                                                    </div>
                                                </div>
                                        <div class = "pull-right margint20">
                                        	<a href = "#" class="btn btn-primary">View All</a>
                                        </div>
                                     </div>
                                    </div>
                                </div>
                                <div class = "tab-pane fade" id = "videos">
                                    <div class = "row">
                                    	<div class = "span8">
                                              <div id="videosgrid" class = "grid">
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img02_05.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img03_10.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img04_12.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img02_05.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img03_10.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img04_12.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img02_05.jpg"></a>
                                                    </div>
                                                    <div class = "grid-item">
                                                      <a href = "Images/Img02_05.jpg" class = "lightbox"><img src="Images/Img03_10.jpg"></a>
                                                    </div>
                                                </div>
                                        <div class = "pull-right margint20">
                                        	<a href = "#" class="btn btn-primary">View All</a>
                                        </div>
                                     </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class = "span8 marginb20">
                   	  <div class = "page-header">
                            <h3>Featured Articles</h3>
                      </div>
                     	<div class="media">
  						<a class="pull-left" href="#">
    						<img src="Images/img01_03.png">
 						 </a>
  						<div class="media-body">
    						<h4 class="media-heading"><a href = "#">The painfull reality of our times</a></h4>
                            <p>These days cricketers and hence cricket is dogged by a long list of injuries. From minor ones that keep a player away for a match, to major ones that cut short a glorious career.</p>
                        </div>
                     </div>
                     	<div class="media">
  						<a class="pull-left" href="#">
    						<img src="Images/img02_05.jpg">
 						 </a>
  						<div class="media-body">
    						<h4 class="media-heading"><a href = "#">The painfull reality of our times</a></h4>
                            <p>These days cricketers and hence cricket is dogged by a long list of injuries. From minor ones that keep a player away for a match, to major ones that cut short a glorious career.</p>
                        </div>
                     </div>
                     	<div class="media">
  						<a class="pull-left" href="#">
    						<img src="Images/img03_10.jpg">
 						 </a>
  						<div class="media-body">
    						<h4 class="media-heading"><a href = "#">The painfull reality of our times</a></h4>
                            <p>These days cricketers and hence cricket is dogged by a long list of injuries. From minor ones that keep a player away for a match, to major ones that cut short a glorious career.</p>
                        </div>
                     </div>
                     	<div class="media">
  						<a class="pull-left" href="#">
    						<img src="Images/img04_12.jpg">
 						 </a>
  						<div class="media-body">
    						<h4 class="media-heading"><a href = "#">The painfull reality of our times</a></h4>
                            <p>These days cricketers and hence cricket is dogged by a long list of injuries. From minor ones that keep a player away for a match, to major ones that cut short a glorious career.</p>
                        </div>
                     </div>
                     <p class = "pull-right"><a href =  "#" class = "btn btn-primary">View All</a></p>
                    </div>
                </div>
            </div>
            <div class = "span4 margint20">
            	<div class = "content-block">
                    	<div id="sidebar" class="sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked">
                          <li class="menu-heading dark-heading">Recent Articles</li>
                          <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
                          <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
                          <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
                          <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
                          <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
                          <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
                          <li class="nav-menu menu-box">
                            <div class = "row">
                              <div class = "span3">
                                <div class = "padding20 pull-right"> <a href = "#" class = "viewall">View All</a> </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                  <div class = "content-box">
                   	<div class = "page-header">
                    	<h3>Calender</h3>
                    	</div>
                  </div>
                  <div class = "content-box">
                   	<div class = "page-header">
                    	<h3>Ads</h3>
                    	</div>
                  </div>
                </div>
            </div>
        </div> <!------Articles and Sidebar---------->
        
	</div><!------//Content--->
    <script src="<?php echo base_url('assets/js/my.js');?>"></script>
