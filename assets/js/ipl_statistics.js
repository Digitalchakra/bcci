$(document).ready(function()
{
	statistics();
	setInterval(function() {
          statistics();
			}, 300000);
	
});
function statistics()
{
	var site='http://dynamic.pulselive.com/dynamic/data/core/cricket/2012/ipl2013/TournamentInNumbers.js';
    var yql = 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from html where url="' + site + '"') + '&format=json';  	
	 $.getJSON( yql,function(result) {
		 str_result=result.query.results.body.p.replace('onTournamentInNumbers(', '').replace(');', '');
		 //alert(result.query.results.body.p);
		 //alert(tt);
		 jsondata = $.parseJSON(str_result);
		 //console.log(jsondata);
		 //alert(jsondata.tournamentInNumbers[0].runs);
		html='<table WIDTH="100%" HEIGHT="100%">';
		html+=				'<tr WIDTH="100%">';
		html+=					'<td class="clbl1"><p class="ipl-font24">'+jsondata.tournamentInNumbers[0].runs+'</p><h4>Runs</h4></td>';
		html+=					'<td class="clbl2"><p class="ipl-font24">'+jsondata.tournamentInNumbers[0].dotBalls+'</p><h4>Dot Balls</h4></td>';
		html+=					'<td class="clbl3"><p class="ipl-font24">'+jsondata.tournamentInNumbers[0].sixDistance+'</p><h4>Longest Six</h4></td>';
		html+=				'</tr>';
		html+=				'<tr WIDTH="100%">';
		html+=					'<td class="clbl4"><p class="ipl-font24">'+jsondata.tournamentInNumbers[0].sixes+'</p><h4>Sixes</h4></td>';
		html+=					'<td class="clbl5"><p class="ipl-font24">'+jsondata.tournamentInNumbers[0].wickets+'</p><h4>Wickets</h4></td>';
		html+=					'<td class="clbl6"><p class="ipl-font24">'+jsondata.tournamentInNumbers[0].fifties+'</p><h4>Half Centuries</h4></td>';
		html+=				'</tr>';
		html+=				'<tr WIDTH="100%">';
		html+=					'<td class="clbl7"><p class="ipl-font24">'+jsondata.tournamentInNumbers[0].runsFromBoundaries+'</p><h4>Runs from Boundaries</h4></td>';
		html+=					'<td class="clbl8"><p class="ipl-font24">'+jsondata.tournamentInNumbers[0].fastestBallKmh+'</p><h4>Fastest Ball</h4></td>';
		html+=					'<td class="clbl9">';
		html+=						'<a href="#"class="ipl-font18" >View all</a>';
		html+=						'<div class="ipl-arrow-right"></div>';
		html+=					'</td>';
		html+=				'</tr>';
		html+=			'</table>';
		$('#ipl-header-stats').html(html);
        });
}
