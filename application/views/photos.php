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
  <h3>Photos  <sup style="text-transform:none">via espncricinfo.com</sup><!--<span class = "pull-right marginr10">
        			<a href="#" rel="tooltip" title="View as Grid"><i class = "icon-th-large"></i></a>
        			<a href="#" rel="tooltip" title="View as blog"><i class = "icon-align-justify"></i></a>
        			<a href="#" rel="tooltip" title="View as list"><i class = "icon-th-list"></i></a>
            </span>--></h3>
</div>
</div>
		 
<!--Photos-->
<div class="main" id="photosgrid" style="margin-left:25px"> 
	<?php
                  foreach($content as $row)
                  {
                    ?>
	<div class="view view-first">
    	<img src = "<?php echo $row->icon; ?>" />
        <div class="mask">
        	<p><?php echo $row->pubdate; ?></p>
            <a title = "<?php echo $row->pubdate; ?> - <?php echo $row->description; ?>" href = "<?php echo $row->src; ?>" class="info fancybox" rel="photos"><?php echo $row->description; ?></a>
        </div>
    </div>
     <?php
            }
          ?>
</div>
<!--=======-->        
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

