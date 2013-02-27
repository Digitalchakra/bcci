<?php
return false;
$menu=array('ODI','T20','Test');
?>
<div class = "container">
  <div class = "row">
    <div class = "span9">
    
      <!--Page Heading-->
      <div class = "row">
        <div class = "span9">
          <div class = "page-header">
              <h3>Current Series</h3>
          </div>
        </div>
      </div>
      
      <!--Sub Menu Dropdown-->
      <div class = "row">
      	<div class = "span8 margint10">
        <h4>Results</h4>
        </div>
        
        <!--Matches Dropdown-->
        <div class = "span1 margint20">
			  	<div class="btn-group marginb10 pull-right small-menu">
                    <button class="btn dropdown-toggle" data-toggle="dropdown"><?php echo $content[0]->type; ?><span class="caret"></span></button>
                    <ul class="dropdown-menu">
				<?php
				foreach($menu as $row)
				{ 
					if($content[0]->type==$row)
					continue;
					?>
				<li class="resultmenu" ref="<?php echo $base_url.$row ?>"><a><?php echo $row; ?></a></li>
				<?php } ?>
              </ul>
              </div>
        </div>
      </div>
      
      <!--Table--> 
      <div class = "row">
      	<div class = "span9 margint20">
         <!-- <p><h4>Schedule</h4></p>-->
          <table class="table table-bordered table-striped">
            <colgroup>
              <col class="span3">
              <col class="span2">
              <col class="span2">
              <col class="span2">
            </colgroup>
            <thead>
              <tr>
                <th>Teams</th>
                <th>Date</th>
                <th>Result</th>
              </tr>
            </thead>
            <tbody>
				<?php
				foreach($content as $row)
				{ ?>
              <tr>
                <td>
					<?php echo $row->team; ?>
                </td>
                <td>
                  <?php echo $row->date; ?>
                </td>
                <td>
                  <?php echo $row->result; ?>
                </td>
              </tr>
              <?php
				} ?>
            </tbody>
        </table>
        <sup>via foxsports.com.au</sup>
        </div>

      </div>
      
      <!--PAGINATION-->
      <div class = "row">
        <div class = "span7 offset1 margint-20">
          <div class = "container">
            <div class="pagination">
              <ul>
                <!--<li><a href="#">Prev</a></li>
                <li class = "active"><a href="#">1</a></li>
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
    
    <!--Side NAV-->
  <!--  <div class = "span3 margint10">
      <div id="sidebar" class="sidebar-nav">
        <ul class="nav nav-tabs nav-stacked">
          <li class="menu-heading">HEADING</li>
          <li class="nav-menu"><a href="#" class = "active">Fixtures</a></li>
          <li class="nav-menu"><a href="#">Series Archive</a></li>
          <li class="nav-menu"><a href="#">Current Series</a></li>
          <li class="nav-menu"><a href="#">Past Series</a></li>
          <li class="nav-menu"><a href="#">Upcoming Series</a></li>
          <li class="nav-menu"><a href="#">Rankings</a></li>
          <li class="nav-menu"><a href="#">Records</a></li>
          <li class="nav-menu"><a href="#">Teams</a></li>
  
          <!--Search Box-->
         <!-- <li class="nav-menu menu-box">
            <div class = "row">
              <div class = "span3">
                <div class = "padding10">
                  <div class = "page-header">
                    <h4>Search</h4>
                  </div>
                  <div class="input-append">
                    <input class="span2 wired" id="appendedInputButton" type="text">
                    <button class="btn btn-primary" type="button"><i class="icon-search icon-white"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>-->
  </div> 
</div> 
<script src="<?php echo base_url('assets/js/results.js');?>"></script>
<script type="application/javascript">
 window.onload=function(){
      $('.selectpicker').selectpicker();
      };
</script>
