
			<div class="container">
				      <!--Page Heading-->
					  <div class = "row">
						<div class = "span12">
						  <div class = "page-header">
							  <h3>Team Ranking <sup style="text-transform:none">via relianceiccrankings.com</sup></h3>
						  </div>
						</div>
					  </div>
                  <div class="row-fluid rankings">
                  	<div class="span4">
                        <ul style="list-style:none">
							<h4>Test</h4>
							<?php
							$i=1;
							foreach($content['Test'] as $test)
							{
							?>
							<li class="white-block">
								<div class="row-fluid">
									<div class="span4 padding10">
										<div class="cflag_<?php echo $test->country_code; ?>">
										</div>
										<div class="rank-box">
											<h4>Rank <?php echo $i; ?></h4>
										</div>
									</div>
									<div style="padding:10px 10px 10px 0px; display:table-cell" class="span8">
										<h4><?php echo $test->team; ?></h4><h6>Points: <?php echo $test->points; ?> | Rating: <?php echo $test->rating; ?> | Matches: <?php echo $test->matches; ?></h6>
									</div>
								</div>
							</li>
							<?php
							$i++;
						}
						?>
						</ul>
                        <!-- <div class = "pull-right"><a href="#">View All</a></div> -->
                    </div>
                    <div class="span4">
                        <ul style="list-style:none">
							<h4>ODI</h4>
							<?php
							$i=1;
							foreach($content['ODI'] as $odi)
							{
							?>
							<li class="white-block">
								<div class="row-fluid">
									<div class="span4 padding10">
										<div class="cflag_<?php echo $odi->country_code; ?>">
										</div>
										<div class="rank-box">
											<h4>Rank <?php echo $i; ?></h4>
										</div>
									</div>
									<div style="padding:10px 10px 10px 0px; display:table-cell" class="span8">
										<h4><?php echo $odi->team; ?></h4><h6>Points: <?php echo $odi->points; ?> | Rating: <?php echo $odi->rating; ?> | Matches: <?php echo $odi->matches; ?></h6>
									</div>
								</div>
							</li>
							<?php
							$i++;
						}
						?>
						</ul>
                    </div>
                    <div class="span4">
                        <ul style="list-style:none">
							<h4>T20</h4>
							<?php
							$i=1;
							foreach($content['T20'] as $t20)
							{
							?>
							<li class="white-block">
								<div class="row-fluid">
									<div class="span4 padding10">
										<div class="cflag_<?php echo $t20->country_code; ?>">
										</div>
										<div class="rank-box">
											<h4>Rank <?php echo $i; ?></h4>
										</div>
									</div>
									<div style="padding:10px 10px 10px 0px; display:table-cell" class="span8">
										<h4><?php echo $t20->team; ?></h4><h6>Points: <?php echo $t20->points; ?> | Rating: <?php echo $t20->rating; ?> | Matches: <?php echo $t20->matches; ?></h6>
									</div>
								</div>
							</li>
							<?php
							$i++;
						}
						?>
						</ul>
                    </div>
                  </div>

                </div>
