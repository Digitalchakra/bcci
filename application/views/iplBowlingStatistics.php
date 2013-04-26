<link href="<?php echo base_url('assets/css/bcci-ipl.css'); ?>" rel="stylesheet" type="text/css">
<div class = "container">
  <div class = "row">
   
	  <!--DropDown Left-->
		
			<div class = "span12">
				<div class="btn-group margint20 small-menu">
					<button class="btn dropdown-toggle" data-toggle="dropdown">Bowling Statistics<span class="drop-icon"></span></button>
					<ul class="dropdown-menu">
						<li><a href="<? echo base_url('ipl/stats'); ?>">Statistics</a></li>
						<li><a href="<? echo base_url('ipl/batting_stats'); ?>">Bowling Statistics</a></li>
						<li><a href="<? echo base_url('ipl/compare_stats'); ?>">Compare Players</a></li>
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
		  	<div id="cmp_imput" style="display:none;" class="cmp_search">
				<input type="text" id="cmp_pname" autocomplete="off" count="1" placeholder="Add Player" />
				<div class="cmp_searchul">
					<ul id="cmpsearchul"></ul>
				</div>
			</div>
			<div id="compare" class="cmp_player_btn">
				<button class="btn btn-info floatLeft">Add Another Player</button>
			</div>
			
		 </div>
		
		<div class=" span12 bs2_3" id="compform"  style="display:none;">
		  <form class="cmpBtn" action="<?=base_url('ipl/compare_stats')?>" method="POST" id="compareform" >
			<button class="btn btn-success">Compare Players</button>
		  </form>
		</div>
	  	</div>
	   	
		</div>
	  
	  <div class="row ipl-stats-columns">
		<div class="span3 margint20 marginb10  orange-cap">
		  <ul>
			 <li class="heading">
			  <h4>Purple Cap <span class="pull-right ipl-settings-icon" id="orange-cap-settings-icon"></span></h4>
			</li>
			<!--orange cap , most run -->
			<? $count=1; foreach($mostWicket as $single)
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
			  <h5><?=$single->w?> Wickets, <?=$single->team_abbreviation?></h5>
			  </span> <span class="clearfix"></span> 
			  </li>
			  <!-- popup -->
			  		<div class="ipl-statout-outer">
			  			<div class="ipl-statout" id="<? echo 'er'.$single->pid;?>">

					  </div>
			  		</div>
			<?$count++; }?>
		  </ul>
		</div>
		<div class="span3 margint20 marginb10  max-sixes">
		  <ul class="ipl_stats_list">
			<li class="heading">
			  <h4>Best Bowling Figures<span class="pull-right ipl-settings-icon" id="max-sixes-settings-icon"></span></h4>
			</li>
			 <!--yellow cap , most six -->
			 <? $count=1; foreach($bestBowling as $single)
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
			  <h5>W/R: <?=$single->bbiw?>/<?=$single->bbir?>, <?=$single->team_abbreviation?></h5>
			  </span> <span class="clearfix"></span>
			</li>
			  <!-- popup -->
					  <div class="ipl-statout-outer">
					  	<div class="ipl-statout" id="<? echo 'es'.$single->pid;?>">

					  </div>
					  </div>
			  <?$count++; }?>
		  </ul>
		</div>
		<div class="span3 margint20 marginb10  high-score">
		  <ul class="ipl_stats_list">
			<li class="heading">
			  <h4>Best Averages<span class="pull-right ipl-settings-icon" id="high-score-settings-icon"></span></h4>
			</li>
			<!--green cap ,  highest Individual score six -->
			<? $count=1; foreach($bestBowlingAvg as $single)
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
			  <h5><?=$single->a?> Average, <?=$single->team_abbreviation?></h5>
			  </span> <span class="clearfix"></span>
			  </li> 
			  <!-- popup -->
					  <div class="ipl-statout-outer">
					  	<div class="ipl-statout" id="<? echo 'ehs'.$single->pid;?>">

					  </div>
					  </div>
			  <?$count++; }?>
		  </ul>
		</div>
		<div class="span3 margint20 marginb10  high-strike">
		  <ul class="ipl_stats_list">
			<li class="heading">
			  <h4>Best Economy Rates<span class="pull-right ipl-settings-icon" id="high-strike-settings-icon"></span></h4>
			</li>
			<!--blue cap ,  highest strike rate -->
			<? $count=1; foreach($bestBowlingEconomy as $single)
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
			  <h5>Econ: <?=$single->e?>, <?=$single->team_abbreviation?></h5>
			  </span> <span class="clearfix"></span>
			  </li> 
			  <!-- popup -->
					  <div class="ipl-statout-outer">
					  	<div class="ipl-statout" id="<? echo 'esr'.$single->pid;?>">
						
					  </div>
					  </div>
			  <?$count++; }?>
		  </ul>
		</div>

	  </div>
	</div>
  </div>

<script src="<?php echo base_url('assets/js/bowling_stats.js');?>"></script>
