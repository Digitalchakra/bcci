<div class = "container">
  <div class = "row">
      <div class="span8">
        <div class = "page-header">
                    <h3>Results</h3>
                </div>
            <div class="tab-box-wrapper">
              <ul class="nav nav-tabs tabs-box gradient" id="matchestab">
                <li class="active"><a data-toggle="tab" href="#ODIMatches">ODI</a></li>
                <li class=""><a data-toggle="tab" href="#TestMatches">Test</a></li>
                <li class=""><a data-toggle="tab" href="#T20Matches">T20</a></li>
                <div class="clearfix"></div>
              </ul>
      
              <!--Matches Tabs COntent-->
              <div style="height: 280px;" class="tab-content" id="matchestabContent">
                <div id="ODIMatches" class="tab-pane fade"> 
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
              foreach($content['ODI'] as $row)
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
                  
                </div>
                <div id="TestMatches" class="tab-pane fade"> 
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
              foreach($content['Test'] as $row)
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
                  
                </div>
                <div id="T20Matches" class="tab-pane fade active in"> 
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
              foreach($content['T20'] as $row)
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
                  
                </div>
              </div>
              <span class="pull-left padding10"><sup>via foxsports.com.au</sup></span>
            </div>
          </div>
      <div class="span4 margint20">
        <div class="row" style="margin-top:30px;">
          <div class="span4">
            <div class="ads-336X280">
              <script type="text/javascript"><!--
		google_ad_client = "ca-pub-1444369114752839";
		/* 336x280, created 6/2/10 */
		google_ad_slot = "3029230199";
		google_ad_width = 336;
		google_ad_height = 280;
		//-->
		</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
            </div>
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
<script src="<?php echo base_url('assets/js/results.js');?>"></script>
