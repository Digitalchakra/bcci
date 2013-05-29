
<!--MAIN CONTENT
===================================================================  -->

<div class = "container">
  <div class = "row">
    <!--Fixtures-->
    <div class = "span8">
      <!--Page Header-->
      <div class = "page-header">
        <h3>Articles <!--<span class = "pull-right marginr10">
        			<a href="#" rel="tooltip" title="View as Grid"><i class = "icon-th-large"></i></a>
        			<a href="#" rel="tooltip" title="View as blog"><i class = "icon-align-justify"></i></a>
        			<a href="#" rel="tooltip" title="View as list"><i class = "icon-th-list"></i></a>
            </span>--></h3>
      </div>
      <!--Articles-Blog-->
      <div class = "row">
        <div class = "span8">
          <ul class="media-list">
			  <?php
			  foreach($content as $row)
			  {
				?>
            <li class="media"> <a class="pull-left" href="<?php echo base_url('article/get'); echo '/'.$row->id; ?>"> <!--<img src="" class="media-object">--> </a>
              <div class="media-body">
                <a href = "<?php echo base_url('article/get'); echo '/'.$row->id; ?>"><h4 class="media-heading"><?php echo $row->title; ?></h4></a>
                <p>
                 <h5>By <?php echo $row->author.", ".date('M d, Y', $row->created_on); ?></h5>
                <p></p>
                <!----Article short description-->
                <p><?php 
                if(strlen($row->content)>500)
                {
                  echo substr($row->content,0,strpos($row->content,' ',500)).'...';
                }
              else
              {
                echo $row->content;
              }
                  ?></p>
                <!--Read More-->
                <a class = "red pull-right" href = "<?php echo base_url('article/get'); echo '/'.$row->id; ?>">Read More</a> </div>
            </li>
            <?php
			}
			?>
          </ul>
        </div>
      </div>

      <!--PAGINATION-->
      <div class = "row">
        <div class = "span8 margint-20">
          <div class = "container">
            <div class="pagination">
              <ul>
                <!--<li><a href="#">Prev</a></li>
                <li  class = "active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#">10</a></li>
                <li><a href="#">11</a></li>
                <li><a href="#">12</a></li>
                <li><a href="#">Next</a></li>-->
                <?php echo $links; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="span4 margint20">
    	<div class="row" style="margin-top:30px;">
      	<div class="span4">
        	<div class="ads-300X250 pull-right">
          	<script type="text/javascript"><!--
google_ad_client = "ca-pub-1444369114752839";
/* 300X250 ad */
google_ad_slot = "6084393496";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:80px;">
      	<div class="span4">
        	<div class="ads-300X250 pull-right">
          	<script type="text/javascript"><!--
google_ad_client = "ca-pub-1444369114752839";
/* 300X250 ad */
google_ad_slot = "6084393496";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:80px;">
        <div class="span4">
          <div class="ads-300X250 pull-right">
            <script type="text/javascript"><!--
google_ad_client = "ca-pub-1444369114752839";
/* 300X250 ad */
google_ad_slot = "6084393496";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
          </div>
        </div>
      </div>
    </div>

    <!--Featured Articles-->
    <!-- <div class = "span3">
        <div class = "row">
          <!--Recent Articles-->
            <!-- <div class = "span3 margint10">
            <div id="sidebar" class="sidebar-nav">
              <ul class="nav nav-tabs nav-stacked">
                <li class="menu-heading dark-heading">Recent Articles</li>
                <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game</a></li>
                <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game</a></li>
                <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game</a></li>
                <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game</a></li>
                <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game</a></li>
                <li class="nav-menu"><a href="#">Ipl would've affected young Dravid's Game</a></li>
                <li class="nav-menu menu-box">
                  <div class = "row">
                    <div class = "span3">
                      <div class = "padding20 pull-right"> <a href = "#" class = "viewall">View All</a> </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div> -->
          <!--Articles Archive-->
            <!-- <div class = "span3 margint10">
          <div class = "page-header">
            <h4>Articles Archive</h4>
          </div>
          </div>
        </div>
    </div> -->
  </div>
</div>
