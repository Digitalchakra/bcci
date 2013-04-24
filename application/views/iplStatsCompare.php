<link href="<?php echo base_url('assets/css/bcci-ipl.css'); ?>" rel="stylesheet" type="text/css">
<ul style="display:none;">
	<?php foreach ($players as $player) { ?>
		<li sname="<?=strtolower($player->pfullName)?>" pname="<?=$player->pfullName?>" id="<?='s'.$player->pid?>" pid="<?=$player->pid?>"></li>
	<?}?>
</ul>
<div class="container">
	<div class="row">
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
	</div>
	<!-- my code - mani-->

	<div class="row">
		<div class="span12 com3">
			<!-- batting-->
			<table>
				<thead>
					<tr>
						<td>Batting Statistics</td>
					</tr>
				</thead>
				<tbody>
					<tr><td>Runs</td></tr>
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
			<br/>
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
<script src="<?php echo base_url('assets/js/stats_compare.js');?>"></script>