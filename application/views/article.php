
<!--MAIN CONTENT
===================================================================  -->

<div class = "container">
  <div class = "row"> 
    <!--Fixtures-->
    <div class = "span9"> 
      <!--Page Header-->
      <div class = "page-header">
        <h3>Article  <sup style="text-transform:none">via yahoocricket.com</sup><!--<span class = "pull-right marginr10">
        			<a href="#" rel="tooltip" title="View as Grid"><i class = "icon-th-large"></i></a>
        			<a href="#" rel="tooltip" title="View as blog"><i class = "icon-align-justify"></i></a>
        			<a href="#" rel="tooltip" title="View as list"><i class = "icon-th-list"></i></a>
            </span>--></h3>
      </div>
      <!--Articles-Blog-->
      <div class = "row">
        <div class = "span9">
          <ul class="media-list">
            <li class="media"> <a class="pull-left" href="#"> <!--<img src="" class="media-object">--> </a>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $content[0]->title; ?></h4>
                <p>
                <h6>By <?php echo $content[0]->author; ?></h6>
                <p></p>
                <!----Article short description-->
                <p><?php echo $content[0]->content; ?></p>
            </li>

          </ul>
        </div>
      </div>
      
    <div class = "row">
        <div class = "span7 offset1 margint-20">
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
              </ul>
            </div>
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
          </div>
          <!--Articles Archive-->
            <!--<div class = "span3 margint10">
          <div class = "page-header">
            <h4>Articles Archive</h4>
          </div>
          </div>
        </div>
    </div>-->
  </div>
</div>
</div>