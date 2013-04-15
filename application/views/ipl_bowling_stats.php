<div class="container">	
	<div class="span12 container">
		<div class="span3">
			<input type="text" id="wick_pname" autocomplete="off"/>
			<div class="span12 container">
				<ul id="testul"></ul>
			</div>
		</div>
	</div>
</div>
<div class="container">	
	<div class="span12 container">
		<div class="span3">
			<? foreach($mostWicket as $single)
			{?>
			<div class="wick_pname" wick_pname="<?=strtolower($single->pfullName)?>" id="<? echo 'w'.$single->pid;?>">
				<div>Wickets : <?=$single->w?></div>
				<div>Name : <?=$single->pfullName?></div>
				<div>Team : <?=$single->team_abbreviation?></div>
				<div>
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
					<div>Inns : <?=$single->inns?></div>
				</div>
				<hr></hr>
			</div>
			<?}?>
		</div>
		<div class="span3">
			<? foreach($bestBowling as $single)
			{?>
			<div class="pname" bowling_pname="<?=strtolower($single->pfullName)?>" id="<? echo'bb'.$single->pid;?>">
				<div>Wickets/Runs : <?=$single->w?>/<?=$single->r?></div>
				<div>Name : <?=$single->pfullName?></div>
				<div>Team : <?=$single->team_abbreviation?></div>
				<div>
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
					<div>Inns : <?=$single->inns?></div>
				</div>
				<hr></hr>
			</div>
			<?}?> 
		</div>
		<div class="span3">
			<? foreach($bestBowlingAvg as $single)
			{?>
			<div class="pname" avg_pname="<?=strtolower($single->pfullName)?>" id="<? echo 'ba'.$single->pid;?>">
				<div>Average : <?=$single->a?></div>
				<div>Name : <?=$single->pfullName?></div>
				<div>Team : <?=$single->team_abbreviation?></div>
				<div>
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
					<div>Inns : <?=$single->inns?></div>
				</div>
				<hr></hr>
			</div>
			<?}?>
		</div>
		<div class="span3">
			<? foreach($bestBowlingEconomy as $single)
			{?>
			<div class="pname" econ_pname="<?=strtolower($single->pfullName)?>" id="<? echo 'be'.$single->pid;?>">
				<div>Econ : <?=$single->e?></div>
				<div>Name : <?=$single->pfullName?></div>
				<div>Team : <?=$single->team_abbreviation?></div>
				<div>
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
					<div>Inns : <?=$single->inns?></div>
				</div>
				<hr></hr>
			</div>
			<?}?> 
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#wick_pname').keyup(function(){
		//alert($(this).val());
		$('#testul').html('');
		search_txt=$.trim($(this).val());
		//$('.wick_pname').hide();
		if(search_txt.length>0)
		{
			$("div[wick_pname^='"+$('#wick_pname').val().toLowerCase()+"'], div[wick_pname*='"+$('#wick_pname').val().toLowerCase()+"']").each(function(){
				$('#testul').append('<li onclick=searchresult("'+$(this).attr('id')+'");>'+$(this).attr('wick_pname')+'</li>');
			});
		}
		else
		{
			$('#testul').html('');
		}
	});
});
function searchresult(divID)
{
	//alert(divID);
	$('#testul').html('');
	$('.wick_pname').hide();
	$('#'+divID).show();
}
</script>