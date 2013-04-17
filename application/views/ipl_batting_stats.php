<div class="container">	
	<div class="span12 container">
		<div class="span3">
			<input type="text" id="run_pname" autocomplete="off"/>
			<div class="span12 container">
				<ul id="testul"></ul>
			</div>
		</div>
	</div>
</div>
<div class="container">	
	<div class="span12 container">
		<div class="span3">
			<? foreach($mostRun as $single)
			{?>
			<div class="run_pname" run_pname="<?=strtolower($single->pfullName)?>" id="<? echo 'r'.$single->pid;?>">
				<div>Runs : <?=$single->r?></div>
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
					<div>NO : <?=$single->no?></div>
					<div>HS : <?=$single->hs?></div>
					<div>50s : <?=$single->{'50s'}?></div>
					<div>100s : <?=$single->{'100s'}?></div>
					<div>Inns : <?=$single->inns?></div>
				</div>
				<hr></hr>
			</div>
			<?}?>
		</div>
		<div class="span3">
			<? foreach($mostSix as $single)
			{?>
			<div class="pname" econ_pname="<?=strtolower($single->pfullName)?>" id="<? echo 's'.$single->pid;?>">
				<div>Sixes : <?=$single->{'6s'}?></div>
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
					<div>NO : <?=$single->no?></div>
					<div>HS : <?=$single->hs?></div>
					<div>50s : <?=$single->{'50s'}?></div>
					<div>100s : <?=$single->{'100s'}?></div>
					<div>Inns : <?=$single->inns?></div>
				</div>
				<hr></hr>
			</div>
			<?}?> 
		</div>
		<div class="span3">
			<? foreach($highestScore as $single)
			{?>
			<div class="pname" econ_pname="<?=strtolower($single->pfullName)?>" id="<? echo 'hs'.$single->pid;?>">
				<div>Runs : <?=$single->hs?></div>
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
					<div>NO : <?=$single->no?></div>
					<div>HS : <?=$single->hs?></div>
					<div>50s : <?=$single->{'50s'}?></div>
					<div>100s : <?=$single->{'100s'}?></div>
					<div>Inns : <?=$single->inns?></div>
				</div>
				<hr></hr>
			</div>
			<?}?>
		</div>
		<div class="span3">
			<? foreach($highestStrikeRate as $single)
			{?>
			<div class="pname" econ_pname="<?=strtolower($single->pfullName)?>" id="<? echo 'sr'.$single->pid;?>">
				<div>Strike-Rate : <?=$single->sr?></div>
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
					<div>NO : <?=$single->no?></div>
					<div>HS : <?=$single->hs?></div>
					<div>50s : <?=$single->{'50s'}?></div>
					<div>100s : <?=$single->{'100s'}?></div>
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
	$('#run_pname').keyup(function(){
		//alert($(this).val());
		$('#testul').html('');
		search_txt=$.trim($(this).val());
		//$('.run_pname').hide();
		if(search_txt.length>0)
		{
			$("div[run_pname^='"+$('#run_pname').val().toLowerCase()+"'], div[run_pname*='"+$('#run_pname').val().toLowerCase()+"']").each(function(){
				$('#testul').append('<li onclick=searchresult("'+$(this).attr('id')+'");>'+$(this).attr('run_pname')+'</li>');
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
	$('.run_pname').hide();
	$('#'+divID).show();
}
</script>