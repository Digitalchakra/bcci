$(document).ready(function()
{
		$.myplaceholder={};
		$.myplaceholder.mylivescore=[];
		$.myplaceholder.checkreload=0;
		$.myplaceholder.checkloaded=0;
		livescore();
		news();
		result();
		team();
		rank('batsman');
		rank('bowler');
		rank('allrounder');
		photos();
		videos();
		article();

		$(".fancybox").fancybox(
		{
			preload:true
			});
	    /*setInterval(function() {
          result();
			}, 60000);*/
    setInterval(function() {
          livescore();
			}, 20000);
		$("#chat_box").hide();
    $("#chat_minimize").click(function(){
    $("#chat_box").toggle();
});

});
function result()
{
	//load result scores
	//to test
	//$('#accordion2').html('');
	var html='';
	$.ajax({
        url: baseurl+'result/getlist',
        type: "GET",
        dataType:'json',
        async: false,
        success: function(data) {
			//alert(data.menu.length);
			html='<div class="white-block"><div class="accordion">';
			$.each( data.resultset['ODI'], function(list)
			{
				html+='<div class="accordion-heading"><a href="'+data.resultset['ODI'][list]['link']+'" target="_blank" class="accordion-toggle"><div class="content">';
                html+='<div class="date"><span class="red">'+data.resultset['ODI'][list]['date']+'</span></div>';
                html+='<div class="match"><h4><span class="grey">'+data.resultset['ODI'][list]['team']+'</span></h4><h5>'+data.resultset['ODI'][list]['result']+'</h5></div>';
                html+='<div class="clearfix"></div></div></a></div>';
			});
			html+='</div></div>';
			$('#Acc01').html(html);
			html='<div class="white-block"><div class="accordion">';
			$.each( data.resultset['Test'], function(list)
			{
				html+='<div class="accordion-heading"><a href="'+data.resultset['Test'][list]['link']+'" target="_blank" class="accordion-toggle"><div class="content">';
                html+='<div class="date"><span class="red">'+data.resultset['Test'][list]['date']+'</span></div>';
                html+='<div class="match"><h4><span class="grey">'+data.resultset['Test'][list]['team']+'</span></h4><h5>'+data.resultset['Test'][list]['result']+'</h5></div>';
                html+='<div class="clearfix"></div></div></a></div>';
			});
			html+='</div></div>';
			$('#Acc02').html(html);
			html='<div class="white-block"><div class="accordion">';
			$.each( data.resultset['T20'], function(list)
			{
				html+='<div class="accordion-heading"><a href="'+data.resultset['T20'][list]['link']+'" target="_blank" class="accordion-toggle"><div class="content">';
                html+='<div class="date"><span class="red">'+data.resultset['T20'][list]['date']+'</span></div>';
                html+='<div class="match"><h4><span class="grey">'+data.resultset['T20'][list]['team']+'</span></h4><h5>'+data.resultset['T20'][list]['result']+'</h5></div>';
                html+='<div class="clearfix"></div></div></a></div>';
			});
			html+='</div></div>';
			$('#Acc03').html(html);
			/*$('#accordion2').append(data);
			$('#resultmenu').html($('#ajaxmenu').html());
			$('#ajaxmenu').remove();
            $(".resultmenu").click(function()
			{
				$('#menubtn').html($(this).attr('link'));
				if($(this).attr('link') == 'All')
				{
					$('.type').show();
				}
				else
				{
					$('.type').hide();
					$('.'+$(this).attr('link')).show();
				}
			});*/
        },
        error:function()
        {

		}
    });
}
function news()
{
	var html='';
	var recentNews='';
	var bannerslide='';
	$.ajax({
        url: baseurl+'news/getlist',
        type: "GET",
        dataType:'json',
        async: false,
        success: function(data) {
			for(i=1;i<data.resultset.length;i++)
			{
				mod=i%3;
				html+='<li class="media news-thumb-small">' ;
                html+='<a class="pull-left" target="_blank" href="'+data.resultset[i]['link']+'"> <img src="'+data.resultset[i]['media2']+'" class="media-object"> </a>';
                html+='<div class="media-body">';
                html+='<h4 class="media-heading"><a target="_blank" href="'+data.resultset[i]['link']+'">'+data.resultset[i]['title']+'</a></h4>';
                html+='<h5>'+data.resultset[i]['pubdate']+'</h5>';
                html+='</div>';
                html+='</li>';
                if((mod==0) || (i==(data.resultset.length-1)))
                {
					recentNews+='<div class = "span6"><ul>'+html+'</ul></div>';
					html='';
				}
			}
			$('#recentNewscont').html(recentNews);
			html='<div class = "row-fluid"><div class = "span12 news-thumb"><p>';
			html+='<img src="'+data.resultset[0]['media2']+'"/>';
			html+='<a target="_blank" href="'+data.resultset[0]['link']+'"><h4>'+data.resultset[0]['title']+'</h4></a>';
			html+='<h5>'+data.resultset[0]['pubdate']+'</h5>';
			html+=data.resultset[0]['description'];
			//html+='<span class="pull-left padding10"><sub>via bbc.co.uk</sub></span>';
			html+='<p class="pull-right padding10"><a class="red" target="_blank" href="'+data.resultset[0]['link']+'">Read More</a></p>';
			html+='</p></div></div>';
			$('#featuredNews').html(html);
			bannerslide+='<div class="item active"> <img src="'+data.resultset[0]['media1']+'" class = "res-image">';
			bannerslide+='</div>';
			$('#bannerslide').html(bannerslide);
			bannertxt='<div class = "carousel-caption" style = "position:relative; height:72px; overflow:hidden;";>';
			bannertxt+='<a target="_blank" href="'+data.resultset[0]['link']+'"><h4>'+data.resultset[0]['title']+'</h4></a>';
			bannertxt+='<div><span class="small-text yellow">'+data.resultset[0]['pubdate']+'</span></div>';
			bannertxt+='<p style="margin-top:-5px">'+data.resultset[0]['description'].substring(0,200)+' ...</p></div>';
			$('#bannertxt').html(bannertxt);
        },
        error:function()
        {

		}
    });
}

function livescore()
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
			listcount=0;
			option="";
			$.myplaceholder.mylivescore=[];
			//$('.live_team').removeClass('active');
			$('.slides li').removeClass('active');
			//alert(data[listcount].matchDataType);
			$(data).each(function()
			{
				if(data[listcount].matchDataType=='Live Data')
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

					option+='<li value="'+listcount+'" class="live_team">';
					if(listcount ===$.myplaceholder.checkreload)
					{
						//option+= 'class="active" id = "ls_match_list">';
						//option+= '<div class = "arrow"></div>';
					}else
					{
						//option+= 'class="live_team dark-block">';
						//option+= '<span class="row-fluid"><span class="span12">';
					}
					option+='	<span class="row-fluid">';
                	option+='		<span class="span12">';
                	if(data[listcount].matchdesc !='')
					{
					option+='			<h5 class="red  align-center">'+data[listcount].matchdesc+'</h5>';
					}
					else{
						option+='		<h5 class="red  align-center">'+data[listcount]['type']+'</h5>';
					}
                   	option+='			<h6 class="red  align-left">'+data[listcount]['team1'].shortName+' <span class="dark-grey">vs</span>'+data[listcount]['team2'].shortName+'</h6>';
                	option+='			<h6 class="red  align-left">'+data[listcount]['venue-city']+' <span class="dark-grey"> | </span>'+data[listcount]['match-day']+'</h6>';
                	option+='		 </span>';
                	option+='	 </span>';
                	option+='</li>';

					if(data[listcount].state=='inprogress')
					{
						//option+='&nbsp;&nbsp;<sup><img src="'+baseurl+'assets/Images/live.gif"></sup>';
					}
					$.myplaceholder.mylivescore.push(data[listcount]);
				}
				listcount++;

				});
				$('#livescore_dd').html(option);

			/*some bug has to fix
			 * when ajax is loading make the current selected tab to update
			 * instead of refresh the list
			 */
			livescoredisplay($.myplaceholder.mylivescore[$.myplaceholder.checkreload]);
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
				livescoredisplay($.myplaceholder.mylivescore[this.value]);
				$(this).addClass('active');
				$.myplaceholder.checkreload=this.value;
			});
        });
}
function team()
{
	var list='';
	var list1='';
	var list2='';
	$.ajax({
        url: baseurl+'rank/team_json',
        type: "GET",
        dataType:'JSON',
        async: false,
        success: function(data) {
			list='<h4>Test</h4>';
			for(i=0;i<data.resultset['Test'].length;i++)
			{
				list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "cflag_'+data.resultset['Test'][i]['country_code']+'">';
              //  list+=                     '<img src="/bcci/assets/Images/India_03.png">';
                list+=                  '</div>';
                list+=                  '<div class = "rank-box">';
                list+=                    '<h4>Rank '+parseInt(i+1)+'</h4>';
                list+=                  '</div>';
                list+=              '</div>';
                list+=              '<div class="span8" style="padding:10px 10px 10px 0px; display:table-cell">';
                list+=                '<h4>'+data.resultset['Test'][i]['team']+'</h4>';
                list+=                '<h6>Points: '+data.resultset['Test'][i]['rating']+' | Rating: '+data.resultset['Test'][i]['points']+'</h6>';
                list+=              '</div>';
                list+=            '</div>';
                list+=          '</li>';
			}
			$('#team-ranking').html(list);
			list='<h4>ODI</h4>';
			for(i=0;i<data.resultset['ODI'].length;i++)
			{
                list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "cflag_'+data.resultset['ODI'][i]['country_code']+'">';
              //  list+=                     '<img src="/bcci/assets/Images/India_03.png">';
                list+=                  '</div>';
                list+=                  '<div class = "rank-box">';
                list+=                    '<h4>Rank '+parseInt(i+1)+'</h4>';
                list+=                  '</div>';
                list+=              '</div>';
                list+=              '<div class="span8" style="padding:10px 10px 10px 0px; display:table-cell">';
                list+=                '<h4>'+data.resultset['ODI'][i]['team']+'</h4>';
                list+=                '<h6>Points: '+data.resultset['ODI'][i]['rating']+' | Rating: '+data.resultset['ODI'][i]['points']+'</h6>';
                list+=              '</div>';
                list+=            '</div>';
                list+=          '</li>';
			}
			$('#team-ranking01').html(list);
			list='<h4>T20</h4>';
			for(i=0;i<data.resultset['T20'].length;i++)
			{
                list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "cflag_'+data.resultset['T20'][i]['country_code']+'">';
             //   list+=                    '<img src="/bcci/assets/Images/India_03.png">';
                list+=                  '</div>';
                list+=                  '<div class = "rank-box">';
                list+=                    '<h4>Rank '+parseInt(i+1)+'</h4>';
                list+=                  '</div>';
                list+=              '</div>';
                list+=              '<div class="span8" style="padding:10px 10px 10px 0px; display:table-cell">';
                list+=                '<h4>'+data.resultset['T20'][i]['team']+'</h4>';
                list+=                '<h6>Points: '+data.resultset['T20'][i]['rating']+' | Rating: '+data.resultset['T20'][i]['points']+'</h6>';
                list+=              '</div>';
                list+=            '</div>';
                list+=          '</li>';
			}
			$('#team-ranking02').html(list);
			/*$('#team').html(data);
			$('.teamMenu').click(function()
			{
				$('.releanceTabBox').hide();
				$('#'+$(this).attr('link')).show();
				});*/
        },
        error:function()
        {

		}
    });

}
function rank(method)
{
	var list='';
	var list1='';
	var list2='';
	$.ajax({
        url: baseurl+'rank/'+method+'_json',
        type: "GET",
        dataType:'JSON',
        async: false,
        success: function(data) {
			list='<h4>Test</h4>';
			for(i=0;i<data.resultset['Test'].length;i++)
			{
				list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "cflag_'+data.resultset['Test'][i]['country']+'">';
                //list+=                     '<img src="/bcci/assets/Images/India_03.png">';
                list+=                  '</div>';
                list+=                  '<div class = "rank-box">';
                list+=                    '<h4>Rank '+parseInt(i+1)+'</h4>';
                list+=                  '</div>';
                list+=              '</div>';
                list+=              '<div class="span8" style="padding:10px 10px 10px 0px; display:table-cell">';
                list+=                '<h4>'+data.resultset['Test'][i]['name']+'</h4>';
                list+=                '<h6>'+data.resultset['Test'][i]['country']+' | Points: '+data.resultset['Test'][i]['rating']+'</h6>';
                list+=              '</div>';
                list+=            '</div>';
                list+=          '</li>';
			}
			$('#'+method+'-ranking').html(list);
			list='<h4>ODI</h4>';
			for(i=0;i<data.resultset['ODI'].length;i++)
			{
				list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "cflag_'+data.resultset['ODI'][i]['country']+'">';
                //list+=                     '<img src="/bcci/assets/Images/India_03.png">';
                list+=                  '</div>';
                list+=                  '<div class = "rank-box">';
                list+=                    '<h4>Rank '+parseInt(i+1)+'</h4>';
                list+=                  '</div>';
                list+=              '</div>';
                list+=              '<div class="span8" style="padding:10px 10px 10px 0px; display:table-cell">';
                list+=                '<h4>'+data.resultset['ODI'][i]['name']+'</h4>';
                list+=                '<h6>'+data.resultset['ODI'][i]['country']+' | Points: '+data.resultset['ODI'][i]['rating']+'</h6>';
                list+=              '</div>';
                list+=            '</div>';
                list+=          '</li>';
			}
			$('#'+method+'-ranking01').html(list);
			list='<h4>T20</h4>';
			for(i=0;i<data.resultset['T20'].length;i++)
			{
				list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "cflag_'+data.resultset['T20'][i]['country']+'">';
              //  list+=                     '<img src="/bcci/assets/Images/India_03.png">';
                list+=                  '</div>';
                list+=                  '<div class = "rank-box">';
                list+=                    '<h4>Rank '+parseInt(i+1)+'</h4>';
                list+=                  '</div>';
                list+=              '</div>';
                list+=              '<div class="span8" style="padding:10px 10px 10px 0px; display:table-cell">';
                list+=                '<h4>'+data.resultset['T20'][i]['name']+'</h4>';
                list+=                '<h6>'+data.resultset['T20'][i]['country']+' | Points: '+data.resultset['T20'][i]['rating']+'</h6>';
                list+=              '</div>';
                list+=            '</div>';
                list+=          '</li>';
			}
			$('#'+method+'-ranking02').html(list);
			/*$('#team').html(data);
			$('.teamMenu').click(function()
			{
				$('.releanceTabBox').hide();
				$('#'+$(this).attr('link')).show();
				});*/
        },
        error:function()
        {

		}
    });

}
function photos()
{
	var html='';
	$.ajax({
        url: baseurl+'photos/getlist',
        type: "GET",
        dataType:'JSON',
        async: false,
        success: function(data) {
			for(i=0;i<data.resultset.length;i++)
			{
				html+='<div class="view view-first">';
                html+=    '<img src="'+data.resultset[i]['icon']+'">';
                html+=    '<div class="mask">';
                html+=       '<p>'+data.resultset[i]['pubdate']+'</p>';
                html+=        '<a title="'+data.resultset[i]['pubdate']+' - '+data.resultset[i]['description']+'" href="'+data.resultset[i]['src']+'" class="info fancybox" rel="photos">'+data.resultset[i]['description']+'</a>';
                html+=    '</div>';
                html+='</div>';
			}
			$('#photosgrid').html(html);
			//$(".fancybox").fancybox();
        },
        error:function()
        {

		}
    });

}
function videos()
{
	var html='';
	$.ajax({
        url: baseurl+'videos/getlist',
        type: "GET",
        dataType:'JSON',
        async: false,
        success: function(data) {
			for(i=0;i<data.resultset.length;i++)
			{
				html+='<div class="view view-first">';
                html+=    '<img src="'+data.resultset[i]['src']+'">';
                html+=    '<div class="mask">';
                html+=       '<p>'+data.resultset[i]['pubdate']+' - <span>'+data.resultset[i]['time']+'</span></p>';
                html+=        '<a href="'+data.resultset[i]['link']+'" class="info">'+data.resultset[i]['title']+'</a>';
                html+=    '</div>';
                html+='</div>';
			}
			$('#videosgrid').html(html);
        },
        error:function()
        {

		}
    });

}
function article()
{
	$.ajax({
        url: baseurl+'article/getlist',
        type: "GET",
        dataType:'JSON',
        async: false,
        success: function(data) {
			recentArticle='';
			html='<h4 class="media-heading"><a href="#">'+data.resultset[0]['title']+'</a></h4>';
			html+='<h5> By '+data.resultset[0]['author']+'</h5>';
			html+=data.resultset[0]['content'].substring(0,500)+'...';
            $('#farticle').html(html);
            $('#farticlerm').attr('href','article/get/'+data.resultset[0]['id']);
            html='';
			for(i=1;i<data.resultset.length;i++)
			{
				mod=i%3;
				html+='<li class="media news-thumb-small">';
				html+='<div class="media-body">';
                html+='    	<h4 class="media-heading"><a href="article/get/'+data.resultset[i]['id']+'">'+data.resultset[i]['title']+'</a></h4>';
                html+='    	<h5>By '+data.resultset[i]['author']+'</h5>';
                html+='    </div></li>';
				if((mod==0) || (i==(data.resultset.length-1)))
                {
					recentArticle+='<div class = "span6"><ul>'+html+'</ul></div>';
					html='';
				}
			}
			$('#rarticles').html(recentArticle);
        },
        error:function()
        {

		}
    });

}
function livescoredisplay(data)
{
	//alert(new Date(data.startdayandtimeGMT));
				//series_title
				//$('#series_title').html(data.matchType+" - "+data.matchdesc);
				$('#livescore_dd_title').html(data['team1'].shortName+' vs '+data['team2'].shortName+'<span class="caret"></span>');
				$('.matchstate').html('');
				$('.playerstate, .bowlerstate, .not_live').show();
				$('.series_title').html(data.series);
				//team name
				$('.team1').html(data.battingTeamName);
				$('.team2').html(data.bowlingTeamName);

				//team icon
				$('.team1_image').removeAttr('class');
				$('.team_icon1>div').addClass('team1_image');
				$('.team2_image').removeAttr('class');
				$('.team_icon2>div').addClass('team2_image');
				$('.team1_image').addClass("flag flag_"+data.battingTeamName);
				$('.team2_image').addClass("flag flag_"+data.bowlingTeamName);

				//batting team score/over
				$('.team1_score').html(data['currentBatTeamScore'].runsAndWicket+'*');
				$('.team1_over').html(data['currentBatTeamScore'].overs+" Overs");

				//bowling team score/over
				//if(data[0]['currentBowlTeamScore'].runsAndWicket !="0/0")
				//{
				$('.team2_score').html(data['currentBowlTeamScore'].runsAndWicket);
				$('.team2_over').html(data['currentBowlTeamScore'].overs+" Overs");
				//}

				//RunRate
				$('.crr').html("CRR : "+data.crr);
				if(data.rrr == "")
				{
					$('.rrr').html("");
				}
				else
				{
					$('.rrr').html("RRR : "+data.rrr);
				}

				//batting team score/over
				$('.team1_score').html(data['currentBatTeamScore'].runsAndWicket+'*');
				$('.team1_over').html(data['currentBatTeamScore'].overs+" Overs");

				//bowling team score/over
				//if(data[0]['currentBowlTeamScore'].runsAndWicket !="0/0")
				//{
				$('.team2_score').html(data['currentBowlTeamScore'].runsAndWicket);
				$('.team2_over').html(data['currentBowlTeamScore'].overs+" Overs");
				//}
				$('.matchstate').html(data.status);
				if(data.state != 'complete')
				{
				//status if not playing
				if(data.state != 'inprogress')
				{
					if(data.state === 'stump')
					{
						$('.matchstate').html('Stumps - '+data.status);
					}
				}
				//striker's
				$('.striker').html(data['striker'].fullName);
				$('.nonStriker').html(data['nonStriker'].fullName);

				//striker's runs
				$('.striker_run').html("");
				if(data['striker'].balls !="")
				{
					$('.striker_run').html(data['striker'].runs+"("+data['striker'].balls+")");
				}
				
				$('.nonStriker_run').html("");
				if(data['nonStriker'].balls !="")
				{
					$('.nonStriker_run').html(data['nonStriker'].runs+"("+data['nonStriker'].balls+")");
				}

				//sr
				$('.nonStriker_sr').html("");
				if(data['nonStriker'].balls != ""){
					if(data['nonStriker'].balls != 0){
						$('.nonStriker_sr').html((data['nonStriker'].runs/data['nonStriker'].balls*100).toFixed(2));
					}
					else{
						$('.nonStriker_sr').html("0.00");
					}
				}

				$('.striker_sr').html("");
				if(data['striker'].balls != ""){
					if(data['striker'].balls != 0){
						$('.striker_sr').html((data['striker'].runs/data['striker'].balls*100).toFixed(2));
					}
					else{
						$('.striker_sr').html("0.00");
					}
				}

				//last name
				$('.strikers_lname').html("");
				if(data['striker'].fullName != "" && data['strikerbowler'].fullName != "")
				$('.strikers_lname').html(data['strikerbowler'].fullName.split(' ').slice(-1).join(' ')+" to "+data['striker'].fullName.split(' ').slice(-1).join(' '));
				//split(' ').slice(-1).join(' ');


				//bowler
				$('.strikerbowler').html(data['strikerbowler'].fullName);

				$('.strikerbowler_runs').html(data['strikerbowler'].runs);

				$('.strikerbowler_overs').html(data['strikerbowler'].overs);

				$('.strikerbowler_maidens').html(data['strikerbowler'].maidens);

				$('.strikerbowler_wickets').html(data['strikerbowler'].wickets);
				}
				else
				{
					$('.playerstate').hide();
					$('.bowlerstate').hide();
				}
				if(data.state=='preview')
				{
				$('.playerstate, .bowlerstate, .not_live').hide();
				$('.matchstate').html('Starting '+new Date(data.startdayandtimeGMT));
				}


}
