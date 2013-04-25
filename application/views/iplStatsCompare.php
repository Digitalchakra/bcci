<link href="<?php echo base_url('assets/css/bcci-ipl.css'); ?>" rel="stylesheet" type="text/css">
<ul style="display:none;">
	<?php foreach ($players as $player) { ?>
		<li sname="<?=strtolower($player->pfullName)?>" pname="<?=$player->pfullName?>" id="<?='s'.$player->pid?>" pid="<?=$player->pid?>"></li>
	<?}?>
</ul>

<div class="container">
		<div class="row">
			<div class = "span12">
				<div class="btn-group margint20 small-menu">
					<button class="btn dropdown-toggle" data-toggle="dropdown">Compare Players<span class="drop-icon"></span></button>
					<ul class="dropdown-menu">
						<li><a href="<? echo base_url('ipl/stats'); ?>">Statistics</a></li>
						<li><a href="<? echo base_url('ipl/batting_stats'); ?>">Batting Statistics</a></li>
						<li><a href="<? echo base_url('ipl/bowling_stats'); ?>">Bowling Statistics</a></li>
					</ul>
				</div>
			 </div>
		</div>
		<br/>

	<!-- compare panel -->
	  <div class="span12"> 
	  	<div class="row bs2 cmp_top" >
	  	
	 	
		 <div class="span12 bs2_2 cmp_templeft">
		 	<div class="cmp_title">
				<h4>Add players to Compare</h4>
			</div>
		 	<div id="filterList" >
		 		<? $count=0; if($pids)
					{
						foreach($pids as $pid) 
							{?>
					<div class="cmp_label searchIds" id="<?=$pid?>">
					<lable class="span2"><?=$pnames[$count]?></lable>
					<span class="cmp_label_close" style="margin-top:-5px;"  lableid="<?=$pid?>" type="button" onclick="removeMe(<?=$pid?>);">X</span>
					</div>
					<? $count++;} }?>
		  	</div>
		  	<div class="cmp_search" id="search_pnale" style="display:none;">
				<input type="text" id="search_pname" autocomplete="off" placeholder="Add Player" />
				<div class="cmp_searchul">
					<ul id="searchul"></ul>
				</div>
			</div>
			<? if($count >=5)
			{?>
				<div class="cmp_player_btn" id="addPlayer" style="display:none">
			<?} else {?>
				<div class="cmp_player_btn" id="addPlayer">
			<? } ?>
				<button class="btn btn-info floatLeft"><i class="icon-plus icon-white"></i>Add Player</button>
			</div>
			
		 </div>
		
		<div class=" span12 bs2_3 cmp_templeft" id="compare"  style="display:none;">
		  
			<button class="btn btn-success big_btn" type="button">Compare Players</button>
		  
		</div>
	  	</div>
	   	
	</div>
	<!-- <div class="row">
		<div class="span12 com2 ">
			<h4>Add players to Compare</h4>
			<div class="com2_sbox">
				<div id="filterList">
				</div>
				<div class="input-append floatLeft">
			  		<input class="span2" id="search_pname" type="text"  autocomplete="off" placeholder="Search Player">
			  		<div class="span12 container">
		              <ul id="searchul"></ul>
		            </div>
				</div>
				<button class="btn btn-info" type="button" id="addPlayer"><i class="icon-plus icon-white"></i>Add another player</button>
			</div>
			<div class="com2_btn">
				<button id="compare" class="btn btn-success " type="button">Compare players</button>
			</div>
			
		</div>
	</div> -->
	<!-- my code - mani-->
<div id="compareDiv" style="display:none;">
	<div class="row com3" >
		<div class="span12 ">
			<!-- batting-->
			<table>
				<thead>
					<tr>
						<td>Batting Statistics</td>
					</tr>
				</thead>
				<tbody class="com_table_col1">
					<tr><td >Runs</td></tr>
					<tr><td>6's</td></tr>
					<tr><td>4's</td></tr>
					<tr><td>Average</td></tr>
					<tr><td>Not out</td></tr>
					<tr><td>50's</td></tr>
					<tr><td>100's</td></tr>
					<tr><td>Innings</td></tr>
					<tr><td>HS</td></tr>
					<tr><td>Strike Rate</td></tr>
				</tbody>
			</table>
		<div  id ="bat_comparedstats">
		</div>
		</div>
			<div class="span12 com4">
			<!-- bowling-->
				<table>
					<thead>
						<tr>
							<td>Bowling Statistics</td>
						</tr>
					</thead>
					<tbody>
						<tr><td>Wickets</td></tr>
						<tr><td>Economy</td></tr>
						<tr><td>Average</td></tr>
						<tr><td>Runs Conceded</td></tr>
						<tr><td>Dot Balls</td></tr>
					</tbody>
				</table>
				<div  id ="bow_comparedstats">
				</div>
			</div>
		
	</div>
</div>
</div>
<script src="<?php echo base_url('assets/js/stats_compare.js');?>"></script>