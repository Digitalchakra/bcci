$(document).ready(function()
{
		$.myplaceholder={};
		$.myplaceholder.mylivescore=[];
		$.myplaceholder.checkreload=0;
		$.myplaceholder.checkloaded=0;
		ipllivescore();
		getpoll();
		$('#ipl-polls-button').click(function(){
			setpoll();
		});
		$('.ipl-header3').hover(function(){ $(".ipl-teams", this).stop().animate({right:'-300px'},{queue:false,duration:180}); }, 
			function() { $(".ipl-teams", this).stop().animate({right:'0px'},{queue:false,duration:180}); 
			});	 

    setInterval(function() {
         ipllivescore();
			}, 30000);
     setInterval(function() {
         //$('#ipl-schedule-back, #ipl-schedule-front').toggle('drop', {direction: 'right'}, 150)
         $('#ipl-schedule-back, #ipl-schedule-front').toggle("blind", {}, 'slow');
			}, 3000);
});


function ipllivescore()
{
	var iplteams={};
	iplteams['KOL']="KKR";
	iplteams['DEL']="DD";
	iplteams['BLR']="RCB";
	iplteams['MUM']="MI";
	iplteams['HYD']="SH";
	iplteams['PUNE']="PWI";
	iplteams['JAI']="RR";
	iplteams['CHN']="CSK";
	iplteams['MOH']="KXIP"; 
	 var site='http://webclient.cricbuzz.com/includes/deccanherald/livecricketscore/filter-match-details.json';
	 // Fall back URL incase the above URL does not work
	 //var site='http://webclient.cricbuzz.com/includes/deccanherald/livecricketscore/web-client-match-details.json';  
    // Take the provided url, and add it to a YQL query. Make sure you encode it!  
    var yql = 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + site + '"') + '&format=json';  	
	 $.getJSON( yql,function(result) {
		var data=result.query.results.json.json
	//$.getJSON( 'http://localhost/bcci/live',function(result) {
	//	var data=result
			listcount=0;
			option="";
			$.myplaceholder.mylivescore=[];
			$('.live_team').removeClass('active');
			//alert(data[listcount].matchDataType);
			$(data).each(function()
			{
				if(data[listcount].matchDataType==='Live Data'&& data[listcount].seriesFolder==='2013_T20_LEAGUE')
				{
					if(data[listcount].series === 'T20 Cricket League 2013')
					data[listcount].series='Indian Premier League VI 2013'
					
					$.each(iplteams, function(index, value) {
						if(data[listcount]['team1'].shortName === index)
						data[listcount]['team1'].shortName=value;
						
						if(data[listcount]['team2'].shortName === index)
						data[listcount]['team2'].shortName=value;
						
						if(data[listcount].battingTeamName === index)
						data[listcount].battingTeamName=value;
						
						if(data[listcount].bowlingTeamName === index)
						data[listcount].bowlingTeamName=value;
					});
					option+='<li value="'+listcount+'"';
					if(listcount ===$.myplaceholder.checkreload)
					{
						option+= 'class="live_team dark-block active">';
						option+= '<div class = "arrow"></div>';
					}else
					{
						option+= 'class="live_team dark-block">';
						option+= '<div class = "arrow"></div>';
					}
					
					option+= '<div class="padding10"><p class="team_name">'+data[listcount]['team1'].shortName+' vs '+data[listcount]['team2'].shortName;
					if(data[listcount].state=='inprogress')
					{
						option+='&nbsp;&nbsp;<sup><img src="'+baseurl+'assets/Images/live.gif"></sup>';
					}
					if(data[listcount].matchdesc !='')
					{
					option+='</p><span class="yellow small-text">'+data[listcount].matchdesc+', </span>';
					}
					else{
						option+='</p><span class="yellow small-text">'+data[listcount]['type']+', </span>';
					}
					option+='<span class="white small-text">'+data[listcount]['venue-city']+' | '+'</span><span class="yellow small-text">'+data[listcount]['match-day']+'</span></div></li>';
					$.myplaceholder.mylivescore.push(data[listcount]);
				}
				listcount++;

				});
				$('#livescore_dd').html(option);

			/*some bug has to fix
			 * when ajax is loading make the current selected tab to update
			 * instead of refresh the list
			 */
			ipllivescoredisplay($.myplaceholder.mylivescore[$.myplaceholder.checkreload]);
			/*if($.myplaceholder.checkreload==0)
			{
				$.myplaceholder.checkreload=1;
				livescoredisplay($.myplaceholder.mylivescore[0]);
			}
			else
			{
				//livescoredisplay($.myplaceholder.mylivescore[$('#livescore_dd').value]);
			}*/
			$('.live_team').click(function()
			{
				$('.live_team').removeClass('active');
				ipllivescoredisplay($.myplaceholder.mylivescore[this.value]);
				$(this).addClass('active');
				$.myplaceholder.checkreload=this.value;
			});
        });
}

function ipllivescoredisplay(data)
{
	//alert(new Date(data.startdayandtimeGMT));
				//series_title
				//$('#series_title').html(data.matchType+" - "+data.matchdesc);
				$('#livescore_dd_title').html(data['team1'].shortName+' vs '+data['team2'].shortName+'<span class="caret"></span>');
				$('#ipl_matchstate').html('');
				$('#ipl_playerstate, #ipl_bowlerstate, .not_live').show();
				$('#ipl_series_title').html(data.series);
				//team name
				$('#ipl_team1').html(data.battingTeamName);
				$('#ipl_team2').html(data.bowlingTeamName);

				//team icon
				//$('#ipl_team1_image').removeAttr('class');
				//$('#ipl_team2_image').removeAttr('class');
				//$('#ipl_team1_image').addClass("flag flag_"+data.battingTeamName);
				//$('#ipl_team2_image').addClass("flag flag_"+data.bowlingTeamName);
				$('#ipl_team1_image').addClass("ipl-"+data.battingTeamName);
				$('#ipl_team2_image').addClass("ipl-"+data.bowlingTeamName);

				//batting team score/over
				$('#ipl_team1_score').html(data['currentBatTeamScore'].runsAndWicket+'*');
				$('#ipl_team1_over').html(data['currentBatTeamScore'].overs+" Overs");

				//bowling team score/over
				//if(data[0]['currentBowlTeamScore'].runsAndWicket !="0/0")
				//{
				$('#ipl_team2_score').html(data['currentBowlTeamScore'].runsAndWicket);
				$('#ipl_team2_over').html(data['currentBowlTeamScore'].overs+" Overs");
				//}

				//RunRate
				$('#crr').html("CRR : "+data.crr);
				if(data.rrr == "")
				{
					$('#rrr').html("");
				}
				else
				{
					$('#rrr').html("RRR : "+data.rrr);
				}

				//batting team score/over
				$('#ipl_team1_score').html(data['currentBatTeamScore'].runsAndWicket+'*');
				$('#ipl_team1_over').html(data['currentBatTeamScore'].overs+" Overs");

				//bowling team score/over
				//if(data[0]['currentBowlTeamScore'].runsAndWicket !="0/0")
				//{
				$('#ipl_team2_score').html(data['currentBowlTeamScore'].runsAndWicket);
				$('#ipl_team2_over').html(data['currentBowlTeamScore'].overs+" Overs");
				//}
				$('#ipl_matchstate').html(data.status);
				//if(1)
				if(data.state != 'complete')
				{
				//status if not playing
				if(data.state != 'inprogress')
				{
					if(data.state === 'stump')
					{
						$('#matchstate').html('Stumps - '+data.status);
					}
				}
				//striker's
				$('#ipl_striker').html(data['striker'].fullName);
				$('#ipl_nonStriker').html(data['nonStriker'].fullName);

				//striker's runs
				$('#ipl_striker_run').html("");
				if(data['striker'].balls !="")
				{
					$('#ipl_striker_run').html(data['striker'].runs+"("+data['striker'].balls+")");
				}
				
				$('#ipl_nonStriker_run').html("");
				if(data['nonStriker'].balls !="")
				{
					$('#ipl_nonStriker_run').html(data['nonStriker'].runs+"("+data['nonStriker'].balls+")");
				}

				//sr
				$('#ipl_nonStriker_sr').html("");
				if(data['nonStriker'].balls != ""){
					if(data['nonStriker'].balls != 0){
						$('#ipl_nonStriker_sr').html((data['nonStriker'].runs/data['nonStriker'].balls*100).toFixed(2));
					}
					else{
						$('#ipl_nonStriker_sr').html("0.00");
					}
				}

				$('#ipl_striker_sr').html("");
				if(data['striker'].balls != ""){
					if(data['striker'].balls != 0){
						$('#ipl_striker_sr').html((data['striker'].runs/data['striker'].balls*100).toFixed(2));
					}
					else{
						$('#ipl_striker_sr').html("0.00");
					}
				}

				//last name
				$('#strikers_lname').html("");
				if(data['striker'].fullName != "" && data['strikerbowler'].fullName != "")
				$('#strikers_lname').html(data['strikerbowler'].fullName.split(' ').slice(-1).join(' ')+" to "+data['striker'].fullName.split(' ').slice(-1).join(' '));
				//split(' ').slice(-1).join(' ');


				//bowler
				$('#ipl_strikerbowler').html(data['strikerbowler'].fullName);

				$('#ipl_strikerbowler_runs').html(data['strikerbowler'].runs);

				$('#ipl_strikerbowler_overs').html(data['strikerbowler'].overs);

				$('#ipl_strikerbowler_maidens').html(data['strikerbowler'].maidens);

				$('#ipl_strikerbowler_wickets').html(data['strikerbowler'].wickets);
				}
				else
				{
					$('#ipl_playerstate').hide();
					$('#ipl_bowlerstate').hide();
				}
				if(data.state=='preview')
				{
				$('#ipl_playerstate, #ipl_bowlerstate, .not_live').hide();
				$('#ipl_matchstate').html('Starting '+new Date(data.startdayandtimeGMT));
				}
}
function getpoll()
{
	$.ajax({
		url:baseurl+"subpoll/pollitem",
		type:"GET",
		dataType:"json",
		success:function(data)
		{
			$('#poll_question').html("No polls");
			var maxvote=0;
			if(data.resultset.success===1)
			{
				$('#poll_question').html(data.resultset.question);
				list="";
				$.each(data.resultset.poll_ans, function(i, item) {
					list+='<input type="radio" value="'+item+'" name="polloption" id="pollans'+i+'"/><label for="pollans'+i+'"><span></span>'+item+'</label>';
				});
				$('#poll_answer').html(list);
				$('#ipl-polls-button').show();
			}
			if(data.resultset.success===2)
			{
				$('#poll_question').html(data.resultset.question);
				list="";
				$.each(data.resultset.poll_ans, function(i, item) {
					if(data.resultset.vote_rate[i] > maxvote)
						maxvote=data.resultset.vote_rate[i];
						list+='<div>'+item+'</div><div id="pollans'+i+'">'+data.resultset.vote_rate[i]+'</div>';
				});
				$('#poll_answer').html(list);
				$('#ipl-polls-button').remove();
				$.each(data.resultset.vote_rate, function(i, item) {
					barvalue=(item/maxvote)*100;
					$("#pollans"+i).progressbar({ value: barvalue});
				});
			}
		},
		error:function()
		{
			$('#poll_question').html("Internal error, please try again!");
		}
	});

}
function setpoll()
{
	checked = $('input:radio[name=polloption]:checked').val();
	if(!checked)
	{
		return false;
	}
	$.ajax({
		url:baseurl+"subpoll/pollitem",
		type:"POST",
		data:{"submit":"Vote","answer":checked},
		dataType:"json",
		success:function(data)
		{
			if(data.resultset.success===2)
			{
				$('#poll_question').html(data.resultset.question);
				list="";
				$.each(data.resultset.poll_ans, function(i, item) {
					if(data.resultset.vote_rate[i] > maxvote)
						maxvote=data.resultset.vote_rate[i];
						list+='<div>'+item+'</div><div id="pollans'+i+'">'+data.resultset.vote_rate[i]+'</div>';
				});
				$('#poll_answer').html(list);
				$('#ipl-polls-button').remove();
				$.each(data.resultset.vote_rate, function(i, item) {
					barvalue=(item/maxvote)*100;
					$("#pollans"+i).progressbar({ value: barvalue});
				});
			}
		},
		error:function()
		{
			$('#poll_question').html("Internal error, please try again!");
		}
	});

}
