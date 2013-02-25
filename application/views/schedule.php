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
      	<div class = "span5 margint10">
        	<h4>Schedule <sup style="text-transform:none">via cricbuzz.com</sup></h4>
        </div>

        <!--Matches Dropdown-->
        <div class = "span3 offset1 margint10">
          <div class="combo-dropdown">
            
            <select id="shedulemenu" name="one" class="dropdown-select">
				<option value="" class="red-btn"><?php echo $content['upcoming'][0]->srs_name; ?></option>
				<?php
				foreach($srs_list as $row)
				{ 
					if($content['upcoming'][0]->srs_name==$row->srs_name)
					continue;
					?>
				<option value="<?php echo $base_url.$row->srs_id; ?>" class="red-btn"><?php echo $row->srs_name; ?></option>
				<?php } ?>
                <!-- dropdown menu links
                <li><a href = "#">India vs Sri Lanka</a></li>
                <li><a href = "#">England vs New Zealand</a></li>
                <li><a href = "#">S Africa vs Australia</a></li>-->
           </select>
          </div>
        </div>
      </div>

      <!--Table-->
      <div class = "row">
      	<div class = "span9 margint10">
          <!--<p><h4>Schedule</h4></p>-->
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
                <th>Venue</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
				<?php
				foreach($content['upcoming'] as $row)
				{ ?>
              <tr>
                <td>
					<?php echo $row->description; ?>
                </td>
                <td>
                  <?php echo $row->mt_vnu; ?>
                </td>
                <td>
                  <?php echo $row->sdate; if($row->sdate != $row->edate) echo "<b> to </b>".$row->edate; ?>
                </td>
              </tr>
              <?php
				} ?>
            </tbody>
        </table>
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
<!--     <div class = "span3 margint10">
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
    </div> -->
  </div>
</div>
<script src="<?php echo base_url('assets/js/schedule.js');?>"></script>
