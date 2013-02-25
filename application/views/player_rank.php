
<div class = "container">

				      <!--Page Heading-->
					  <div class = "row">
						<div class = "span12">
						  <div class = "page-header">
							  <h3><?php echo $page; ?>  <sup style="text-transform:none">via yahoocricket.com</sup></h3>
						  </div>
						</div>
					  </div>
					 
					  <ul class="nav nav-tabs tabs-box gradient" id="matchestab">
          <li class="active"><a data-toggle="tab" href="#batsman">Men</a></li>
          <li><a data-toggle="tab" href="#batswomen">Women</a></li>
        </ul>
        <div class="row-fluid">
        	<div class="span4">
            	<h4 style="margin-left:20px">Test</h4>
            </div>
            <div class="span4">
            	<h4 style="margin-left:20px">ODI</h4>
            </div>
            <div class="span4">
            	<h4 style="margin-left:20px">T20</h4>
            </div>
        </div>
        <div class="tab-content tab-content-rank">
        	<?php
                	if(count($content['batsman'])>0)
                	{
                	?>
			<div id="batsman" class="tab-pane fade in active">
                  <div class="row-fluid rankings">
                  	<div class="span4">
                        <ul style="list-style:none">
							<?php
							$i=1;
							foreach($content['batsman']['Test'] as $test)
							{
							?>
							<li class="white-block">
								<div class="row-fluid">
									<div class="span4 padding10">
										<div class="cflag_<?php echo $test->country; ?>">
										</div>
										<div class="rank-box">
											<h4>Rank <?php echo $i; ?></h4>
										</div>
									</div>
									<div style="padding:10px 10px 10px 0px; display:table-cell" class="span8">
										<h4><?php echo $test->name; ?></h4><h6><?php echo $test->country; ?> | Rating: <?php echo $test->rating; ?></h6>
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
							<?php
							$i=1;
							foreach($content['batsman']['ODI'] as $odi)
							{
							?>
							<li class="white-block">
								<div class="row-fluid">
									<div class="span4 padding10">
										<div class="cflag_<?php echo $odi->country; ?>">
										</div>
										<div class="rank-box">
											<h4>Rank <?php echo $i; ?></h4>
										</div>
									</div>
									<div style="padding:10px 10px 10px 0px; display:table-cell" class="span8">
										<h4><?php echo $odi->name; ?></h4><h6><?php echo $odi->country; ?> | Rating: <?php echo $odi->rating; ?></h6>
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
							<?php
							$i=1;
							foreach($content['batsman']['T20'] as $t20)
							{
							?>
							<li class="white-block">
								<div class="row-fluid">
									<div class="span4 padding10">
										<div class="cflag_<?php echo $t20->country; ?>">
										</div>
										<div class="rank-box">
											<h4>Rank <?php echo $i; ?></h4>
										</div>
									</div>
									<div style="padding:10px 10px 10px 0px; display:table-cell" class="span8">
										<h4><?php echo $t20->name; ?></h4><h6><?php echo $t20->country; ?> | Rating: <?php echo $t20->rating; ?></h6>
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
                  <?php
                  }
                  	?>
                </div>
                <div id="batswomen" class="tab-pane fade">
                	<?php
                	if(count($content['batswomen'])>0)
                	{
                	?>
                  <div class="row-fluid rankings">
                    <div class="span4">
                        <ul style="list-style:none">
							<h4>ODI</h4>
							<?php
							$i=1;
							foreach($content['batswomen']['ODI'] as $odi)
							{
							?>
							<li class="white-block">
								<div class="row-fluid">
									<div class="span4 padding10">
										<div class="cflag_<?php echo $odi->country; ?>">
										</div>
										<div class="rank-box">
											<h4>Rank <?php echo $i; ?></h4>
										</div>
									</div>
									<div style="padding:10px 10px 10px 0px; display:table-cell" class="span8">
										<h4><?php echo $odi->name; ?></h4><h6><?php echo $odi->country; ?> | Rating: <?php echo $odi->rating; ?></h6>
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
							foreach($content['batswomen']['T20'] as $t20)
							{
							?>
							<li class="white-block">
								<div class="row-fluid">
									<div class="span4 padding10">
										<div class="cflag_<?php echo $t20->country; ?>">
										</div>
										<div class="rank-box">
											<h4>Rank <?php echo $i; ?></h4>
										</div>
									</div>
									<div style="padding:10px 10px 10px 0px; display:table-cell" class="span8">
										<h4><?php echo $t20->name; ?></h4><h6><?php echo $t20->country; ?> | Rating: <?php echo $t20->rating; ?></h6>
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
                  <?php
              }
              ?>
                </div>
            </div>

</div>