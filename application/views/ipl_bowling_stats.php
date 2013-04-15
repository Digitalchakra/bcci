<div class="container">	
	<div class="span12 container">
		<div class="span3">
			<? foreach($mostWicket as $single)
			{?>
				<div>Wickets : <?=$single->w?></div>
				<div>Name : <?=$single->pfullName?></div>
				<div>Team : <?=$single->team_abbreviation?></div>
				<div id="<? echo $single->pid.$single->team_id?>">
					<u>Extra-Data</u>
					<div>DOB : <?=$single->pdob?></div>
					<div>Nationality : <?=$single->nationality?></div>
					<div>Avg : <?=$single->a?></div>
					<div>BF : <?=$single->b?></div>
					<div>Runs : <?=$single->r?></div>
					<div>SR : <?=$single->sr?></div>
					<div>4s : <?=$single->{'4s'}?></div>
					<div>6s : <?=$single->{'6s'}?></div>
					<div>Ov : <?=$single->ov?></div>
					<div>Eoc : <?=$single->e?></div>
					<div>WB : <?=$single->wb?></div>		
					<div>NB : <?=$single->nb?></div>
					<div>D : <?=$single->d?></div>
					<div>W : <?=$single->w?></div>
					<div>bbiw : <?=$single->bbiw?></div>
					<div>bbir : <?=$single->bbir?></div>
					<div>bbmw : <?=$single->bbmw?></div>
					<div>bbmr : <?=$single->bbmr?></div>
					<div>4w : <?=$single->{'4w'}?></div>
					<div>5w : <?=$single->{'5w'}?></div>
					<div>10w : <?=$single->{'10w'}?></div>
					<div>maid : <?=$single->maid?></div>
					<div>wmaid : <?=$single->wmaid?></div>
					<div>Inns<?=$single->inns?></div>
				</div>
				<hr></hr>
			<?}?>
		</div>
		<div class="span3">
			<? foreach($bestBowling as $single)
			{?>
				<div>Wickets/Runs : <?=$single->w?>/<?=$single->r?></div>
				<div>Name : <?=$single->pfullName?></div>
				<div>Team : <?=$single->team_abbreviation?></div>
				<div id="<? echo $single->pid.$single->team_id?>">
					<u>Extra-Data</u>
					<div>DOB : <?=$single->pdob?></div>
					<div>Nationality : <?=$single->nationality?></div>
					<div>Avg : <?=$single->a?></div>
					<div>BF : <?=$single->b?></div>
					<div>Runs : <?=$single->r?></div>
					<div>SR : <?=$single->sr?></div>
					<div>4s : <?=$single->{'4s'}?></div>
					<div>6s : <?=$single->{'6s'}?></div>
					<div>Ov : <?=$single->ov?></div>
					<div>Eoc : <?=$single->e?></div>
					<div>WB : <?=$single->wb?></div>		
					<div>NB : <?=$single->nb?></div>
					<div>D : <?=$single->d?></div>
					<div>W : <?=$single->w?></div>
					<div>bbiw : <?=$single->bbiw?></div>
					<div>bbir : <?=$single->bbir?></div>
					<div>bbmw : <?=$single->bbmw?></div>
					<div>bbmr : <?=$single->bbmr?></div>
					<div>4w : <?=$single->{'4w'}?></div>
					<div>5w : <?=$single->{'5w'}?></div>
					<div>10w : <?=$single->{'10w'}?></div>
					<div>maid : <?=$single->maid?></div>
					<div>wmaid : <?=$single->wmaid?></div>
					<div>Inns<?=$single->inns?></div>
				</div>
				<hr></hr>
			<?}?> 
		</div>
		<div class="span3">
			<? foreach($bestBowlingAvg as $single)
			{?>
				<div>Average : <?=$single->a?></div>
				<div>Name : <?=$single->pfullName?></div>
				<div>Team : <?=$single->team_abbreviation?></div>
				<div id="<? echo $single->pid.$single->team_id?>">
					<u>Extra-Data</u>
					<div>DOB : <?=$single->pdob?></div>
					<div>Nationality : <?=$single->nationality?></div>
					<div>Avg : <?=$single->a?></div>
					<div>BF : <?=$single->b?></div>
					<div>Runs : <?=$single->r?></div>
					<div>SR : <?=$single->sr?></div>
					<div>4s : <?=$single->{'4s'}?></div>
					<div>6s : <?=$single->{'6s'}?></div>
					<div>Ov : <?=$single->ov?></div>
					<div>Eoc : <?=$single->e?></div>
					<div>WB : <?=$single->wb?></div>		
					<div>NB : <?=$single->nb?></div>
					<div>D : <?=$single->d?></div>
					<div>W : <?=$single->w?></div>
					<div>bbiw : <?=$single->bbiw?></div>
					<div>bbir : <?=$single->bbir?></div>
					<div>bbmw : <?=$single->bbmw?></div>
					<div>bbmr : <?=$single->bbmr?></div>
					<div>4w : <?=$single->{'4w'}?></div>
					<div>5w : <?=$single->{'5w'}?></div>
					<div>10w : <?=$single->{'10w'}?></div>
					<div>maid : <?=$single->maid?></div>
					<div>wmaid : <?=$single->wmaid?></div>
					<div>Inns<?=$single->inns?></div>
				</div>
				<hr></hr>
			<?}?>
		</div>
		<div class="span3">
			<? foreach($bestBowlingEconomy as $single)
			{?>
				<div>Econ : <?=$single->e?></div>
				<div>Name : <?=$single->pfullName?></div>
				<div>Team : <?=$single->team_abbreviation?></div>
				<div id="<? echo $single->pid.$single->team_id?>">
					<u>Extra-Data</u>
					<div>DOB : <?=$single->pdob?></div>
					<div>Nationality : <?=$single->nationality?></div>
					<div>Avg : <?=$single->a?></div>
					<div>BF : <?=$single->b?></div>
					<div>Runs : <?=$single->r?></div>
					<div>SR : <?=$single->sr?></div>
					<div>4s : <?=$single->{'4s'}?></div>
					<div>6s : <?=$single->{'6s'}?></div>
					<div>Ov : <?=$single->ov?></div>
					<div>Eoc : <?=$single->e?></div>
					<div>WB : <?=$single->wb?></div>		
					<div>NB : <?=$single->nb?></div>
					<div>D : <?=$single->d?></div>
					<div>W : <?=$single->w?></div>
					<div>bbiw : <?=$single->bbiw?></div>
					<div>bbir : <?=$single->bbir?></div>
					<div>bbmw : <?=$single->bbmw?></div>
					<div>bbmr : <?=$single->bbmr?></div>
					<div>4w : <?=$single->{'4w'}?></div>
					<div>5w : <?=$single->{'5w'}?></div>
					<div>10w : <?=$single->{'10w'}?></div>
					<div>maid : <?=$single->maid?></div>
					<div>wmaid : <?=$single->wmaid?></div>
					<div>Inns<?=$single->inns?></div>
				</div>
				<hr></hr>
			<?}?> 
		</div>
	</div>
</div>