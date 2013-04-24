<link href="<?php echo base_url('assets/css/bcci-ipl.css'); ?>" rel="stylesheet" type="text/css">
<div class = "container">
  <div class = "row">
   
	  <!--DropDown Left-->
		
			<div class = "span12">
				<div class="btn-group margint20 small-menu">
					<button class="btn dropdown-toggle" data-toggle="dropdown">Batting Statistics<span class="drop-icon"></span></button>
					<ul class="dropdown-menu">
						<li><a href="">Statistics</a></li>
						<li><a href="">Batting Statistics</a></li>
						<li><a href="">Bowling Statistics</a></li>
					</ul>
				</div>
			 </div>
		
<!-- search panel -->
	
		<div class="span12 bs1">
			<div class="input-append bs1_search">
				<input class="span4"  type="text" id="run_pname" autocomplete="off" placeholder="Enter player name to view statistics">
				<button class="btn" type="button">Search</button>
				<button id="clearsearch" class="btn" type="button">clear</button>
			</div>
			<div class="span12 bs1_searchUl">
				<ul id="searchul"></ul>
			</div>
			<div id="searchResult" class="bs1_searchResult">
			</div>
		</div>
	
	  
<!-- compare panel -->
	  <div class="span12 bs2" id="cmp_div" style="display:none;"> 
	  	<div class="row">
	  	
	 	
		 <div class="span12 bs2_2">
		 	<div class="cmp_title">
				<h4 id="cmp_with"></h4>
			</div>
		 	<div id="cmp_panel" >
		  	</div>
		  	<div class="cmp_search">
				<input type="text" id="cmp_pname" autocomplete="off" placeholder="Add Player" />
				<div class="cmp_searchul">
					<ul id="cmpsearchul"></ul>
				</div>
			</div>
			<div class="cmp_player_btn">
				<button class="btn btn-info floatLeft">Add Another Player</button>
			</div>
			
		 </div>
		
		<div class=" span12 bs2_3">
		  <form class="cmpBtn" action="" method="POST" id="compareform">
			<button class="btn btn-success">Compare Players</button>
		  </form>
		</div>
	  	</div>
	   	
		</div>
	  
	  <div class="row ipl-stats-columns">
		<div class="span3 margint20 marginb10  orange-cap">
		  <ul>
			 <li class="heading">
			  <h4>Orange Cap <span class="pull-right ipl-settings-icon" id="orange-cap-settings-icon"></span></h4>
			</li>
			<!--orange cap , most run -->
			<? $count=1; foreach($mostRun as $single)
			{
			if($count==1)
			{?>
			  <li class="pname run_pname first ipl_stats_list" pname="<?=$single->pfullName?>" run_pname="<?=strtolower($single->pfullName)?>" pid="<? echo $single->pid;?>" rank="<?=$count?>" id="<? echo 'r'.$single->pid;?>"> 
			<?}
			else
			{?>
			  <li class="pname run_pname ipl_stats_list" pname="<?=$single->pfullName?>" run_pname="<?=strtolower($single->pfullName)?>" pid="<? echo $single->pid;?>" rank="<?=$count?>" id="<? echo 'r'.$single->pid;?>"> 
			<? } ?>
			<span class="rank"><?=$count?></span> <span class="details">
			  <h5><?=$single->pfullName?></h5>
			  <h5><?=$single->r?> Runs, <?=$single->team_abbreviation?></h5>
			  </span> <span class="clearfix"></span> 
			  <!-- popup -->
					  <div class="ipl-statout" id="<? echo 'er'.$single->pid;?>">
					   <!-- <div class="ipl-statout-title">
						  <h4>Batting Statistics, Max 6s</h4>
						  <p><?=$count?>. <?=$single->pfullName?></p>
						</div>
						<div class="ipl-RCB ipl-floatLeft ipl-statout-spacer"> </div>
						<div class="ipl-statout-table ">
						  <table WIDTH="100%" HEIGHT="100%">
							<tr WIDTH="100%">
							  <td class="clbl1"><p><?=$single->m?></p>
								<h4>MAT</h4></td>
							  <td class="clbl2"><p><?=$single->inns?></p>
								<h4>INN</h4></td>
							  <td class="clbl3"><p><?=$single->no?></p>
								<h4>NO</h4></td>
							  <td class="clbl3 ipl-statout-down"><p><?=$single->r?></p>
								<h4>RUNS</h4></td>
							</tr>
							<tr WIDTH="100%">
							  <td class="clbl4"><p><?=$single->{'hs*'}?></p>
								<h4>HS</h4></td>
							  <td class="clbl5"><p><?=$single->a?></p>
								<h4>Ave.</h4></td>
							  <td class="clbl6"><p><?=$single->b?></p>
								<h4>BF</h4></td>
							  <td class="clbl3 ipl-statout-down"><p><?=$single->sr?></p>
								<h4>SR</h4></td>
							</tr>
							<tr WIDTH="100%">
							  <td class="clbl7"><p><?=$single->{'100s'}?></p>
								<h4>100</h4></td>
							  <td class="clbl8"><p><?=$single->{'50s'}?></p>
								<h4>50</h4></td>
							  <td class="clbl3"><p><?=$single->{'4s'}?></p>
								<h4>4s</h4></td>
							  <td class="clbl3"><p><?=$single->{'6s'}?></p>
								<h4>6s</h4></td>
							</tr>
						  </table>
						</div>
						<div class="ipl-statout-leftarrow" > </div>-->
					  </div></li>
			<?$count++; }?>
		  </ul>
		</div>
		<div class="span3 margint20 marginb10  max-sixes">
		  <ul class="ipl_stats_list">
			<li class="heading">
			  <h4>Maximum Sixes<span class="pull-right ipl-settings-icon" id="max-sixes-settings-icon"></span></h4>
			</li>
			 <!--yellow cap , most six -->
			 <? $count=1; foreach($mostSix as $single)
			 {
			if($count==1)
			{ ?>
			  <li class="pname first ipl_stats_list" pid="<? echo $single->pid;?>" rank="<?=$count?>" id="<? echo 's'.$single->pid;?>"> 
			<? }
		  else
			{ ?>
			  <li class="pname ipl_stats_list" pid="<? echo $single->pid;?>" rank="<?=$count?>" id="<? echo 's'.$single->pid;?>"> 
			<? } ?>
			<span class="rank"><?=$count?></span> <span class="details">
			  <h5><?=$single->pfullName?></h5>
			  <h5><?=$single->{'6s'}?> Sixes, <?=$single->team_abbreviation?></h5>
			  </span> <span class="clearfix"></span>
			  <!-- popup -->
					  <div class="ipl-statout" id="<? echo 'es'.$single->pid;?>">
					   <!-- <div class="ipl-statout-title">
						  <h4>Batting Statistics, Max 6s</h4>
						  <p><?=$count?>. <?=$single->pfullName?></p>
						</div>
						<div class="ipl-RCB ipl-floatLeft ipl-statout-spacer"> </div>
						<div class="ipl-statout-table ">
						  <table WIDTH="100%" HEIGHT="100%">
							<tr WIDTH="100%">
							  <td class="clbl1"><p><?=$single->m?></p>
								<h4>MAT</h4></td>
							  <td class="clbl2"><p><?=$single->inns?></p>
								<h4>INN</h4></td>
							  <td class="clbl3"><p><?=$single->no?></p>
								<h4>NO</h4></td>
							  <td class="clbl3 ipl-statout-down"><p><?=$single->r?></p>
								<h4>RUNS</h4></td>
							</tr>
							<tr WIDTH="100%">
							  <td class="clbl4"><p><?=$single->{'hs*'}?></p>
								<h4>HS</h4></td>
							  <td class="clbl5"><p><?=$single->a?></p>
								<h4>Ave.</h4></td>
							  <td class="clbl6"><p><?=$single->b?></p>
								<h4>BF</h4></td>
							  <td class="clbl3 ipl-statout-down"><p><?=$single->sr?></p>
								<h4>SR</h4></td>
							</tr>
							<tr WIDTH="100%">
							  <td class="clbl7"><p><?=$single->{'100s'}?></p>
								<h4>100</h4></td>
							  <td class="clbl8"><p><?=$single->{'50s'}?></p>
								<h4>50</h4></td>
							  <td class="clbl3"><p><?=$single->{'4s'}?></p>
								<h4>4s</h4></td>
							  <td class="clbl3"><p><?=$single->{'6s'}?></p>
								<h4>6s</h4></td>
							</tr>
						  </table>
						</div>
						<div class="ipl-statout-leftarrow" > </div>-->
					  </div> </li>
			  <?$count++; }?>
		  </ul>
		</div>
		<div class="span3 margint20 marginb10  high-score">
		  <ul class="ipl_stats_list">
			<li class="heading">
			  <h4>Highest Individual Score<span class="pull-right ipl-settings-icon" id="high-score-settings-icon"></span></h4>
			</li>
			<!--green cap ,  highest Individual score six -->
			<? $count=1; foreach($highestScore as $single)
			{
			if($count==1)
			{?>
				<li class="pname first ipl_stats_list" pid="<? echo $single->pid;?>" rank="<?=$count?>" id="<? echo 'hs'.$single->pid;?>"> 
			<?}
			else
			  {?>
				<li class="pname ipl_stats_list" pid="<? echo $single->pid;?>" rank="<?=$count?>" id="<? echo 'hs'.$single->pid;?>"> 
		  <? }?>
			<span class="rank"><?=$count?></span> <span class="details">
			  <h5><?=$single->pfullName?></h5>
			  <h5><?=$single->{'hs*'}?> Runs, <?=$single->team_abbreviation?></h5>
			  </span> <span class="clearfix"></span> 
			  <!-- popup -->
					  <div class="ipl-statout" id="<? echo 'ehs'.$single->pid;?>">
						<!--<div class="ipl-statout-title">
						  <h4>Batting Statistics, Max 6s</h4>
						  <p><?=$count?>. <?=$single->pfullName?></p>
						</div>
						<div class="ipl-RCB ipl-floatLeft ipl-statout-spacer"> </div>
						<div class="ipl-statout-table ">
						  <table WIDTH="100%" HEIGHT="100%">
							<tr WIDTH="100%">
							  <td class="clbl1"><p><?=$single->m?></p>
								<h4>MAT</h4></td>
							  <td class="clbl2"><p><?=$single->inns?></p>
								<h4>INN</h4></td>
							  <td class="clbl3"><p><?=$single->no?></p>
								<h4>NO</h4></td>
							  <td class="clbl3 ipl-statout-down"><p><?=$single->r?></p>
								<h4>RUNS</h4></td>
							</tr>
							<tr WIDTH="100%">
							  <td class="clbl4"><p><?=$single->{'hs*'}?></p>
								<h4>HS</h4></td>
							  <td class="clbl5"><p><?=$single->a?></p>
								<h4>Ave.</h4></td>
							  <td class="clbl6"><p><?=$single->b?></p>
								<h4>BF</h4></td>
							  <td class="clbl3 ipl-statout-down"><p><?=$single->sr?></p>
								<h4>SR</h4></td>
							</tr>
							<tr WIDTH="100%">
							  <td class="clbl7"><p><?=$single->{'100s'}?></p>
								<h4>100</h4></td>
							  <td class="clbl8"><p><?=$single->{'50s'}?></p>
								<h4>50</h4></td>
							  <td class="clbl3"><p><?=$single->{'4s'}?></p>
								<h4>4s</h4></td>
							  <td class="clbl3"><p><?=$single->{'6s'}?></p>
								<h4>6s</h4></td>
							</tr>
						  </table>
						</div>
						<div class="ipl-statout-leftarrow" > </div>-->
					  </div></li>
			  <?$count++; }?>
		  </ul>
		</div>
		<div class="span3 margint20 marginb10  high-strike">
		  <ul class="ipl_stats_list">
			<li class="heading">
			  <h4>Highest Strike Rate<span class="pull-right ipl-settings-icon" id="high-strike-settings-icon"></span></h4>
			</li>
			<!--blue cap ,  highest strike rate -->
			<? $count=1; foreach($highestStrikeRate as $single)
			{
			if($count==1)
			{?>
				<li class="pname first ipl_stats_list" pid="<? echo $single->pid;?>" rank="<?=$count?>" id="<? echo 'sr'.$single->pid;?>">
			<?}
			else
			  {?>
				<li class="pname ipl_stats_list" pid="<? echo $single->pid;?>" rank="<?=$count?>" id="<? echo 'sr'.$single->pid;?>">
		  <? }?>
			<span class="rank"><?=$count?></span> <span class="details">
			   <h5><?=$single->pfullName?></h5>
			  <h5>S/R: <?=$single->sr?>, <?=$single->team_abbreviation?></h5>
			  </span> <span class="clearfix"></span> 
			  <!-- popup -->
					  <div class="ipl-statout" id="<? echo 'esr'.$single->pid;?>">
						<!--<div class="ipl-statout-title">
						  <h4>Batting Statistics, Max 6s</h4>
						  <p><?=$count?>. <?=$single->pfullName?></p>
						</div>
						<div class="ipl-RCB ipl-floatLeft ipl-statout-spacer"> </div>
						<div class="ipl-statout-table ">
						  <table WIDTH="100%" HEIGHT="100%">
							<tr WIDTH="100%">
							  <td class="clbl1"><p><?=$single->m?></p>
								<h4>MAT</h4></td>
							  <td class="clbl2"><p><?=$single->inns?></p>
								<h4>INN</h4></td>
							  <td class="clbl3"><p><?=$single->no?></p>
								<h4>NO</h4></td>
							  <td class="clbl3 ipl-statout-down"><p><?=$single->r?></p>
								<h4>RUNS</h4></td>
							</tr>
							<tr WIDTH="100%">
							  <td class="clbl4"><p><?=$single->{'hs*'}?></p>
								<h4>HS</h4></td>
							  <td class="clbl5"><p><?=$single->a?></p>
								<h4>Ave.</h4></td>
							  <td class="clbl6"><p><?=$single->b?></p>
								<h4>BF</h4></td>
							  <td class="clbl3 ipl-statout-down"><p><?=$single->sr?></p>
								<h4>SR</h4></td>
							</tr>
							<tr WIDTH="100%">
							  <td class="clbl7"><p><?=$single->{'100s'}?></p>
								<h4>100</h4></td>
							  <td class="clbl8"><p><?=$single->{'50s'}?></p>
								<h4>50</h4></td>
							  <td class="clbl3"><p><?=$single->{'4s'}?></p>
								<h4>4s</h4></td>
							  <td class="clbl3"><p><?=$single->{'6s'}?></p>
								<h4>6s</h4></td>
							</tr>
						  </table>
						</div>
						<div class="ipl-statout-leftarrow" > </div>-->
					  </div></li>
			  <?$count++; }?>
		  </ul>
		</div>

	  </div>
	</div>
  </div>

<script src="<?php echo base_url('assets/js/batting_stats.js');?>"></script>
