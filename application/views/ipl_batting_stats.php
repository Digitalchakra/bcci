<div class="container">	
	<div class="span12 container">
		<div class="span3">
			<? foreach($mostRun as $single)
			{?>
				<div>Runs : <?=$single->r?></div>
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
					<div>NO : <?=$single->no?></div>
					<div>HS : <?=$single->hs?></div>
					<div>50s<?=$single->{'50s'}?></div>
					<div>100s<?=$single->{'100s'}?></div>
					<div>Inns<?=$single->inns?></div>
				</div>
				<hr></hr>
			<?}?>
		</div>
		<div class="span3">
			<? foreach($mostSix as $single)
			{?>
				<div>Sixes : <?=$single->{'6s'}?></div>
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
					<div>NO : <?=$single->no?></div>
					<div>HS : <?=$single->hs?></div>
					<div>50s<?=$single->{'50s'}?></div>
					<div>100s<?=$single->{'100s'}?></div>
					<div>Inns<?=$single->inns?></div>
				</div>
				<hr></hr>
			<?}?> 
		</div>
		<div class="span3">
			<? foreach($highestScore as $single)
			{?>
				<div>Runs : <?=$single->hs?></div>
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
					<div>NO : <?=$single->no?></div>
					<div>HS : <?=$single->hs?></div>
					<div>50s<?=$single->{'50s'}?></div>
					<div>100s<?=$single->{'100s'}?></div>
					<div>Inns<?=$single->inns?></div>
				</div>
				<hr></hr>
			<?}?>
		</div>
		<div class="span3">
			<? foreach($highestStrikeRate as $single)
			{?>
				<div>Strike-Rate : <?=$single->sr?></div>
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
					<div>NO : <?=$single->no?></div>
					<div>HS : <?=$single->hs?></div>
					<div>50s<?=$single->{'50s'}?></div>
					<div>100s<?=$single->{'100s'}?></div>
					<div>Inns<?=$single->inns?></div>
				</div>
				<hr></hr>
			<?}?> 
		</div>
	</div>
</div>