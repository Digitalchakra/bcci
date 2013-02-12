
<!--MAIN CONTENT
===================================================================  -->

<div class = "container margin-t20">
  <div class = "row">
    <div class = "span8 margint20">
      <div id="myCarousel" class="carousel slide" style="z-index:0"> 
        <!-- Carousel items -->
        <div class="carousel-inner" id="bannerslide">
          <!-- banner img from my.js-->
        </div>
        <!-- Carousel nav --> 
        <a class="carousel-control left" href="#myCarousel" data-slide="prev" >&lsaquo;</a> <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> </div>
    </div>
    
    <!--Live SCore-->
    <div class = "span4 margint20">
      <div class = "grey-block" style="height:420px">Live Score</div>
    </div>
  </div>
  <div class = "row">
    <div class = "span12 margint20">
    <!--  <p><strong>Trending :</strong> PepsiCo bags title sponsorship for IPL  |  IPL franchises announce initial squads  |  KKR v CSK Videos  |  Pathan Interview</p> -->
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
                    <td><p><?php echo $row->date; ?></p></td>
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
            <p class="pull-right"><a href="schedule" class="btn btn-primary">View more</a></p>
          </div>
        </div>
      </div>
    </div>
    
    <!--Results On the right-->
    <div class = "span4 margint20">
      <div class = "white-block">
        <div class = "heading">
          <h4>Results
          <div class="dropdown">
            <select id="resultmenu" name="one" class="dropdown-select">
              <option value="ODI" class="red-btn">ODI Matches</option>
              <option value="T20">T20 Matches</option>
              <option value="Test">Test Matches</option>
            </select>
          </div>
               <a href = "#">
            <div class = "list-box pull-right"></div>
            </a> </h4>
        </div>
        <div class="accordion" id="accordion2">
			<!--Result list from my.js-->
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
			<!-- news from my.js-->
        </div>
        <div class="tab-pane fade" id="recentNews"> 
        	<div id="recentNewscont" class = "row-fluid">
            <!--recent news from my.js-->
           </div>
           <p class="pull-right"><a href="/bcci/news" class="btn btn-primary">Read more</a></p>
        </div>
      </div>
    </div>
    <!-------News Tab------->
    
    <div class = "span4 margint20">
      <div class = "grey-block">
        <p>ADS</p>
      </div>
    </div>
    <!-------Ads------------> 
  </div>
  <!------News and Ads---------->
  
  <div class = "row">
    <div class = "span12 margint20">
      <ul id="rankrecordtab" class="nav nav-tabs tabs-line">
        <li class="active"><a href="#ranking" data-toggle="tab">Rankings</a></li>
       <!-- <li><a href="#records" data-toggle="tab">Records</a></li>-->
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
              </ul>
              <div id="ranktabContent" class="tab-content">
                <div class="tab-pane fade in active" id="team">
                  <div class="row-fluid rankings" id = "rankings">
                  	<div class = "span4">
                        <ul style="list-style:none" id="team-ranking">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                    <div class = "span4">
                        <ul style="list-style:none" id="team-ranking01">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                    <div class = "span4">
                        <ul style="list-style:none" id="team-ranking02">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                  </div>
                  
                </div>
                <div class="tab-pane fade" id="batsman"> 
                	<div class="row-fluid rankings" id = "rankings">
                  	<div class = "span4">
                        <ul style="list-style:none" id="batsman-ranking">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                    <div class = "span4">
                        <ul style="list-style:none" id="batsman-ranking01">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                    <div class = "span4">
                        <ul style="list-style:none" id="batsman-ranking02">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                  </div>
                 </div>
                <div class="tab-pane fade" id="bowler">
                	<div class="row-fluid rankings" id = "rankings">
                  	<div class = "span4">
                        <ul style="list-style:none" id="bowler-ranking">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                    <div class = "span4">
                        <ul style="list-style:none" id="bowler-ranking01">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                    <div class = "span4">
                        <ul style="list-style:none" id="bowler-ranking02">  
                        <!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="allRounder">
                	<div class="row-fluid rankings" id = "rankings">
                  	<div class = "span4">
                        <ul style="list-style:none" id="allrounder-ranking">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                    <div class = "span4">
                        <ul style="list-style:none" id="allrounder-ranking01">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                    <div class = "span4">
                        <ul style="list-style:none" id="allrounder-ranking02">  
                        	<!-- from my.js-->
                        </ul>
                        <div class = "pull-right"><a href="#">View All</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--<div class="tab-pane fade" id="records">
          <div class = "span10">
            <div class="tabbable tabs-left">
              <ul id="recordtab" class="nav nav-tabs tabs-line-left">
                <li class="active"><a href="#batting" data-toggle="tab">Batting</a></li>
                <li><a href="#bowling" data-toggle="tab">Bowling</a></li>
                <li><a href="#otherRecords" data-toggle="tab">Other Records</a></li>
              </ul>
              <div id="recordtabContent" class="tab-content">
                <div class="tab-pane fade in active" id="batting"> Batting Records </div>
                <div class="tab-pane fade" id="bowling"> Bowling Records </div>
                <div class="tab-pane fade" id="otherRecords"> Other Records </div>
              </div>
            </div>
          </div>
        </div>-->
      </div>
    </div>
  </div>
  
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
                    <div class="main">
                <div class="view view-first">
                    <img src="Images/img01_03.png">
                    <div class="mask">
                       <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="Images/Img02_05.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>
                <div class="view view-first">
                    <img src="Images/Img02_05.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>
                <div class="view view-first">
                    <img src="Images/Img02_05.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="Images/Img03_10.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="Images/Img04_12.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>
                <div class="view view-first">
                    <img src="Images/Img04_12.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>
                <div class="view view-first">
                    <img src="Images/Img04_12.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>  
            </div>
                </div>
                <div class = "span pull-right margint10">
                	<a href = "#" class="btn btn-primary">View All</a>
                </div>
              </div>
            </div>
            <div class = "tab-pane fade" id = "videos">
              <div class = "row">
                <div class = "span8">
                  <div class="main">
                <div class="view view-first">
                    <img src="Images/img01_03.png">
                    <div class="mask">
                       <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="Images/Img02_05.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>
                <div class="view view-first">
                    <img src="Images/Img03_10.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>
                <div class="view view-first">
                    <img src="Images/Img02_05.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="Images/Img03_10.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="Images/Img04_12.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>
                <div class="view view-first">
                    <img src="Images/Img04_12.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>
                <div class="view view-first">
                    <img src="Images/Img04_12.jpg">
                    <div class="mask">
                        <p>The painfull reality of our times</p>
                        <a href="#" class="info">View</a>
                    </div>
                </div>  
            </div>
                </div>
                <div class = "span pull-right margint10">
                	<a href = "#" class="btn btn-primary">View All</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class = "span8 marginb20 news-thumb">
          <div class = "page-header">
            <h3>Featured Articles</h3>
          </div>
              <p><img src="../Base 01/Images/Img02_05.jpg">
              <h4 class="media-heading"><a href="#">The fearful pace quartet disappeared</a></h4>
              <h6>By Administrator</h6>
              Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.
              Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.
              Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.
              Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.
              Retired legend says playing T20 from an early age would’ve influenced his batting style. Donec sed odio dui. Etiam porta sem male Donec sed odio dui.
              </p>
              <div class="pull-right"> <a href="#" class="btn btn-primary">Read More</a> </div>
        </div>
      </div>
    </div>
    <div class = "span4 margint20">
      <div class = "content-block">
        <div id="sidebar" class="sidebar-nav">
          <ul class="nav nav-tabs nav-stacked padding20">
            <li class="menu-heading dark-heading">Recent Articles</li>
            <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
            <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
            <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
            <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
            <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
            <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game - By Administrator</a></li>
            <li class="nav-menu menu-box">
              <div class = "row">
                <div class = "span pull-right padding20">
                  <a href = "#" class = "viewall">View All</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class = "content-box">
          <div class = "page-header">
            <h3>Articles Archive</h3>
          </div>
        </div>
        <div class = "content-box">
          <div class = "page-header">
            <h3>Ads</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
	
    <script src="<?php echo base_url('assets/js/my.js');?>"></script>
