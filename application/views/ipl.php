
			<div class="container">
				      <!--Page Heading-->
					  <div class = "row">
						<div class = "span12">
						  <div class = "page-header">
							  <h3>Team Ranking</h3>
						  </div>
						</div>
					  </div>
                  <div class="row-fluid rankings">
                  	<div class="span3">
                        <ul style="list-style:none">
							<h4>News</h4>
							<?php
							foreach($news as $single_news)
							{
								echo "======================";
								echo "<div> title: ".$single_news->title."</div>";
								echo "<div> description: ".$single_news->description."</div>";
								echo "<div> pubdate: ".$single_news->pubdate."</div>";
								echo "<div> img1: ".$single_news->media1."</div>";
								echo "<div> img2: ".$single_news->media2."</div>";
							}
						?>
						</ul>
                        <!-- <div class = "pull-right"><a href="#">View All</a></div> -->
                    </div>
                    <div class="span3">
                        <ul style="list-style:none">
							<h4>Schedule</h4>
							<?php
							foreach($schedule['upcoming'] as $single_schedule)
							{
								echo "======================";
								echo "<div> srs_name: ".$single_schedule->srs_name."</div>";
								$description= explode(',',$single_schedule->description);
								$teams=explode('vs',$description[0]);
								echo "<div> team1: ".$teams[0]."</div>";
								echo "<div> team2: ".$teams[1]."</div>";
								echo "<div> description: ".$description[1]."</div>";
								echo "<div> sdate: ".$single_schedule->sdate."</div>";
								echo "<div> edate: ".$single_schedule->edate."</div>";
								echo "<div> time: ".$single_schedule->time."</div>";
								echo "<div> vnu: ".$single_schedule->mt_vnu."</div>";
							}
						?>
						</ul>
                    </div>
                    <div class="span3">
                        <ul style="list-style:none">
							<h4>Points</h4>
							<?php
							foreach($points as $single_point)
							{
								echo "======================";
								echo "<div> fullName: ".$single_point->fullName."</div>";
								echo "<div> abbreviation: ".$single_point->abbreviation."</div>";
								echo "<div> primaryColor: ".$single_point->primaryColor."</div>";
								echo "<div> points: ".$single_point->points."</div>";
								/*echo "<div> played: ".$single_point->played."</div>";
								echo "<div> position: ".$single_point->position."</div>";
								echo "<div> netRunRate: ".$single_point->netRunRate."</div>";
								echo "<div> won: ".$single_point->won."</div>";
								echo "<div> lost: ".$single_point->lost."</div>";
								echo "<div> tied: ".$single_point->tied."</div>";
								echo "<div> noResult: ".$single_point->noResult."</div>";*/
							}
							?>
						</ul>
                    </div>
                    <div class="span3">
                        <ul style="list-style:none">
							<h4>Photos</h4>
							<?php
							foreach($photos as $single_photos)
							{
								echo "======================";
								echo "<div> icon: ".$single_photos->icon."</div>";
								echo "<div> src: ".$single_photos->src."</div>";
								echo "<div> description: ".$single_photos->description."</div>";
								echo "<div> pubdate: ".$single_photos->pubdate."</div>";
								echo "<div> link: ".$single_photos->link."</div>";
							}
							?>
						</ul>
                    </div>
                  </div>
                </div>
