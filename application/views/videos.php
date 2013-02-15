
<!--MAIN CONTENT
===================================================================  -->
<div class = "page-header">
        <h3>Videos<!--<span class = "pull-right marginr10">
        			<a href="#" rel="tooltip" title="View as Grid"><i class = "icon-th-large"></i></a>
        			<a href="#" rel="tooltip" title="View as blog"><i class = "icon-align-justify"></i></a>
        			<a href="#" rel="tooltip" title="View as list"><i class = "icon-th-list"></i></a>
            </span>--></h3>
      </div>
<div id="videos" >
	<div class="row">
		<div class="span8">
			<div id="videosgrid" class="main">
				<?php
			  foreach($content as $row)
			  {
				?>
				<div class="view view-first"><img src="<?php echo $row->src; ?>">
					<div class="mask">
					  <p><?php echo $row->pubdate; ?> - <span><?php echo $row->time; ?></span></p>
					  <a class="info" href="<?php echo $row->link; ?>"><?php echo $row->title; ?></a>
					</div>
					
				</div>
				<span class="view view-first"><?php echo $row->description; ?></span>
				<?php
			  }
				?>		
			</div>
		</div>
     </div>
</div>
<!--PAGINATION-->
      <div class = "row">
        <div class = "span7 offset1 margint-20">
          <div class = "container">
            <div class="pagination">
              <ul>
                <?php echo $links; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
