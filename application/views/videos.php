<!--MAIN CONTENT
===================================================================  -->

<div class = "container">
  <div id="videos" >
    <div class="row">
      <div class="span12"> 
        <div class = "page-header">
            <h3>Videos  <sup style="text-transform:none">via espncricinfo.com</sup></h3>
         </div>
      </div>
    </div>
    <div class="row">
    	<div class="span12">
        	<div class="main" id="videosgrid"> 
				<?php
                  foreach($content as $row)
                  {
                  ?>
                  <div class="view view-first">
                    <img src = "<?php echo $row->src; ?>" />
                    <div class="mask">
                        <p><?php echo $row->time; ?></p>
                        <a href = "<?php echo $row->link; ?>" target="_blank" class="info fancybox" rel="photos"><?php echo $row->title; ?></a>
                    </div>
                  </div>
                 <?php
                        }
                      ?>
             </div>
    	</div>
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
</div>
