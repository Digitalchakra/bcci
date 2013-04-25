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
	<div class="row">
		<div class="span3">
			<? $count=1; foreach($mostRun as $single)
			{?>
			<div style="height:90px;">
				<div  class="run_pname pname" run_pname="<?=strtolower($single->pfullName)?>" id="<? echo 'r'.$single->pid;?>">
					<div>Rank : <?=$count?></div>
					<div>Runs : <?=$single->r?></div>
					<div>Name : <?=$single->pfullName?></div>
					<div>Team : <?=$single->team_abbreviation?></div>
				</div>
				<div style="display:none; bottom: 60px; position: relative; right: -127px; background-color: #53C8FF;" id="<? echo 'er'.$single->pid;?>">
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
				
			</div>
			<?$count++; }?>
		</div>
		<div class="span3">
			<? $count=1; foreach($mostSix as $single)
			{?>
			<div style="height:90px;">
				<div  class="pname" econ_pname="<?=strtolower($single->pfullName)?>" id="<? echo 's'.$single->pid;?>">
					<div>Rank : <?=$count?></div>
					<div>Sixes : <?=$single->{'6s'}?></div>
					<div>Name : <?=$single->pfullName?></div>
					<div>Team : <?=$single->team_abbreviation?></div>
				</div>
				<div style="display:none; bottom: 60px; position: relative; right: -127px; background-color: #53C8FF;" id="<? echo 'es'.$single->pid;?>">
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
				
			</div>
			<?$count++; }?> 
		</div>
		<div class="span3">
			<? $count=1; foreach($highestScore as $single)
			{?>
			<div style="height:90px;">
				<div  class="pname" econ_pname="<?=strtolower($single->pfullName)?>" id="<? echo 'hs'.$single->pid;?>">
					<div>Rank : <?=$count?></div>
					<div>Runs : <?=$single->hs?></div>
					<div>Name : <?=$single->pfullName?></div>
					<div>Team : <?=$single->team_abbreviation?></div>
				</div>
				<div style="display:none; bottom: 60px; position: relative; right: -127px; background-color: #53C8FF;" id="<? echo 'ehs'.$single->pid;?>">
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
				
			</div>
			<?$count++; }?>
		</div>
		<div class="span3">
			<? $count=1; foreach($highestStrikeRate as $single)
			{?>
			<div style="height:90px;">
				<div class="pname" econ_pname="<?=strtolower($single->pfullName)?>" id="<? echo 'sr'.$single->pid;?>">
					<div>Rank : <?=$count?></div>
					<div>Strike-Rate : <?=$single->sr?></div>
					<div>Name : <?=$single->pfullName?></div>
					<div>Team : <?=$single->team_abbreviation?></div>
				</div>
				<div style="display:none; bottom: 60px; position: relative; right: -127px; background-color: #53C8FF;" id="<? echo 'esr'.$single->pid;?>">
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
				
			</div>
			<?$count++; }?> 
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
	$('.pname').click(function(){
		$('#e'+$(this).attr('id')).toggle();
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