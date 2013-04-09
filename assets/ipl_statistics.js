$(document).ready(function()
{
});
function statistics()
{
	var site='http://dynamic.pulselive.com/dynamic/data/core/cricket/2012/ipl2013/TournamentInNumbers.js';
    var yql = 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from html where url="' + site + '"') + '&format=json';  	
	 $.getJSON( yql,function(result) {
		 tt=result.query.results.body.p.replace('onTournamentInNumbers(', '').replace(');', '');
		 alert(result.query.results.body.p);
		 alert(tt);
		 jsondata = $.parseJSON(tt);
		 console.log(jsondata);
		 alert(jsondata.tournamentInNumbers[0].runs);
        });
}
