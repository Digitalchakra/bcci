<!--MAIN CONTENT
===================================================================  -->
<div class="container">
<!--<div class="row">
  <div class="span8">
    <div id="videosgrid" class="main">
      <?php
			  foreach($content as $row)
			  {
				?>
      <div class="view view-first"><img src="<?php echo $row->icon; ?>">
        <div class="mask">
          <p><?php echo $row->pubdate; ?></p>
          <a class="info" href=""><?php echo $row->description; ?></a> </div>
      </div>
      <?php
			  }
				?>
    </div>
  </div>
</div>-->
<div class = "row">
<div class="span12">
	<div class = "page-header">
  <h3>Photos<!--<span class = "pull-right marginr10">
        			<a href="#" rel="tooltip" title="View as Grid"><i class = "icon-th-large"></i></a>
        			<a href="#" rel="tooltip" title="View as blog"><i class = "icon-align-justify"></i></a>
        			<a href="#" rel="tooltip" title="View as list"><i class = "icon-th-list"></i></a>
            </span>--></h3>
</div>
</div>
		 <!--<?php
                  foreach($content as $row)
                  {
                    ?>
                    <div class="thumbnail span2 margint20">
                      <a href = "<?php echo $row->src; ?>"><img style="width: 162px; height:120px;" src="<?php echo $row->icon; ?>"></a>
                      <div class="caption">
                        <h5 style="margin:0;"><?php echo $row->description; ?></h5>
                        <p><h6 style="margin:0;"><?php echo $row->pubdate; ?></h6></p>
                      </div>
                    </div>
           <?php
            }
?>-->
          
          <ul class="lb-album">
          <?php
                  foreach($content as $row)
                  {
                    ?>
            <li>
                <a href="#<?php echo $row->id; ?>">
                    <img src="<?php echo $row->icon; ?>" />
                    <span><?php echo $row->description; ?></span>
                </a>
                <div class="lb-overlay" id="<?php echo $row->id; ?>">
                    <img src="<?php echo $row->src; ?>" />
                    <div>
                        <h4><?php echo $row->description; ?></h4>
                        <h5><?php echo $row->pubdate; ?></h5>
                        <a href="#<?php echo (($row->id)-1); ?>" class="lb-prev">Prev</a>
                        <a href="#<?php echo (($row->id)+1); ?>" class="lb-next">Next</a>
                    </div>
                    <a href="#page" class="lb-close">Close</a>
                </div>
            </li>
             <?php
            }
          ?>
        </ul>
          
</div>
<!--PAGINATION-->
<div class = "row">
  <div class = "span7 offset1 margint20">
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
