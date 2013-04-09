$(document).ready(function()
{
		$.myplaceholder={};
		$.myplaceholder.mylivescore=[];
		if(getCookieValue("def_live")==="")
		document.cookie="def_live="+"0";
		if(getCookieValue("bot_live")==="")
		document.cookie="bot_live="+"0";
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
		$("#lsCloseButton").click(function() {
			$("#lsToggleBox").animate({"left":"-350px"},{duration:300});
			toggleState=0;
			$(".live_team").removeClass("active");
		});
			$('#lsMakeDefault').click(function(){
				//alert($(this).attr('listid'));
				document.cookie="def_live="+$(this).attr('listid');
				defaultlivescoredisplay($.myplaceholder.mylivescore[$(this).attr('listid')]);
				//document.cookie="def_live="+"0";
				});
				$("#ls_bt_close").click(function() {
				$("#lsClose").toggle(200);
					$("#closeBg").toggleClass("static-bottom-bg");
					$("#footer-space").toggleClass("hide-footer-space");
					});		
				$.myplaceholder.checkreload=this.value;
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
	iplteams['PUNE']="PWI";
	iplteams['HYD']="SH";
	iplteams['SUN RISERS']="SH";
	iplteams['RAJ']="RR";
	iplteams['JAI']="RR";
	iplteams['CHN']="CSK";
	iplteams['MOH']="KXIP";
	iplteams['PUN']="KXIP";
	 var site='http://webclient.cricbuzz.com/includes/deccanherald/livecricketscore/filter-match-details.json';
	 // Fall back URL incase the above URL does not work
	 //var site='http://webclient.cricbuzz.com/includes/deccanherald/livecricketscore/web-client-match-details.json';  
    // Take the provided url, and add it to a YQL query. Make sure you encode it!  
    var yql = 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + site + '"') + '&format=json';  	
	 $.getJSON( yql,function(result) {
		var data=result.query.results.json.json
			listcount=0;
			option="";
			fixture="";
			$('#ls_bt_close , #closeBg').show();
			//$.myplaceholder.mylivescore=[];
			//$('.live_team').removeClass('active');
			$('.slides li').removeClass('active');
			//alert(data[listcount].matchDataType);
			$('#liveScore, #ls_bt_close, #closeBg').show();
			$(data).each(function()
			{
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
				if(data[listcount].matchDataType==='Live Data')
				{
					if(data[listcount].series === 'T20 Cricket League 2013')
					data[listcount].series='Indian Premier League VI 2013'
					option+='<li value="'+listcount+'" class="live_team">';
					option+='	<span class="row-fluid">';
                	option+='		<span class="span12">';
                	if(data[listcount].matchdesc !='')
					{
						if(data[listcount].state=='inprogress')
						{
							option+='			<h5 class="red  align-center">'+data[listcount].battingTeamName+' * <span class="dark-grey">vs </span>'+data[listcount].bowlingTeamName+' - '+data[listcount]['currentBatTeamScore'].runsAndWicket+' ('+data[listcount]['currentBatTeamScore'].overs+')</h5>';
							 option+='			<p class="dark-grey  align-left">'+data[listcount].matchdesc;
							
						}
						else if(data[listcount].state==='complete')
						{
							option+='			<h5 class="red  align-center">'+data[listcount]['team1'].shortName+' <span class="dark-grey">vs </span>'+data[listcount]['team2'].shortName+'</h5>';
							option+='			<p>'+data[listcount].status+'</p>';
							 option+='			<p class="dark-grey  align-left">'+data[listcount].matchdesc;
						}
						else
						{
							option+='			<h5 class="red  align-center">'+data[listcount]['team1'].shortName+' <span class="dark-grey">vs </span>'+data[listcount]['team2'].shortName+'</h5>';
							 option+='			<p class="dark-grey  align-left">'+data[listcount].matchdesc;
						}
					}
					else{
						if(data[listcount].state=='inprogress')
						{
							option+='			<h5 class="red  align-center">'+data[listcount].battingTeamName+' * <span class="dark-grey">vs </span>'+data[listcount].bowlingTeamName+' - '+data[listcount]['currentBatTeamScore'].runsAndWicket+' ('+data[listcount]['currentBatTeamScore'].overs+')</h5>';
							 option+='			<p class="dark-grey  align-left">'+data[listcount]['type'];
						}
						else if(data[listcount].state==='complete')
						{
							option+='			<h5 class="red  align-center">'+data[listcount]['team1'].shortName+' <span class="dark-grey">vs </span>'+data[listcount]['team2'].shortName+' <span> COMP</span></h5>';
							option+='			<p>'+data[listcount].status+'</p>';
							option+='			<p class="dark-grey  align-left">'+data[listcount]['type'];
						}
						else
						{
							option+='			<h5 class="red  align-center">'+data[listcount]['team1'].shortName+' <span class="dark-grey">vs </span>'+data[listcount]['team2'].shortName+'</h5>';
							 option+='			<p class="dark-grey  align-left">'+data[listcount]['type'];
						}
					}
                	option+='			<span class="red  align-left">  '+data[listcount]['venue-city']+' <span class="dark-grey"> | </span>'+data[listcount]['match-day']+'</span></p>';
                	option+='		 </span>';
                	option+='	 </span>';
                	option+='</li>';

					if(data[listcount].state=='inprogress')
					{
						//option+='&nbsp;&nbsp;<sup><img src="'+baseurl+'assets/Images/live.gif"></sup>';
					}
					$.myplaceholder.mylivescore.push(data[listcount]);
				}
				else if(data[listcount].matchDataType==='Fixture')
				{
					fixture+='<li>'+data[listcount]['team1'].shortName+' vs '+data[listcount]['team2'].shortName+'-'+data[listcount].matchdesc+'-'+data[listcount]['match-day']+'-'+data[listcount]['venue-city']+'</li>';
				}
				listcount++;

				});
				$('#livescore_dd').html(option);
				fixture+='<li><span> </span></li>';
				$('#fixture_list').html(fixture);
				

			/*some bug has to fix
			 * when ajax is loading make the current selected tab to update
			 * instead of refresh the list
			 */
			livescoredisplay($.myplaceholder.mylivescore[getCookieValue("bot_live")]);
			defaultlivescoredisplay($.myplaceholder.mylivescore[getCookieValue("def_live")]);
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
				$('#lsMakeDefault').attr('listid',this.value);
				$('.live_team').removeClass('active');
				//$(this).addClass("active");
				livescoredisplay($.myplaceholder.mylivescore[this.value]);
				//defaultlivescoredisplay($.myplaceholder.mylivescore[this.value]);
				document.cookie="bot_live="+this.value;
				var offset = $(this).offset();
				var toggleboxOffset = $("#lsToggleBox").offset();
				if (toggleboxOffset.left === -350 || toggleboxOffset.left != (offset.left-30))
				{
				$("#lsToggleBox").animate({"left":(offset.left-50)},{duration:300});
				$(this).addClass("active");
				}
				if (toggleboxOffset.left === (offset.left-50))
				{
				$('.live_team').removeClass('active');
				$("#lsToggleBox").animate({"left":"-350px"},{duration:300});
				}

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
function defaultlivescoredisplay(data)
{
	//alert(new Date(data.startdayandtimeGMT));
				//series_title
				//$('#series_title').html(data.matchType+" - "+data.matchdesc);
				$('#livescore_dd_title').html(data['team1'].shortName+' vs '+data['team2'].shortName+'<span class="caret"></span>');
				$('#def_matchstate').html('');
				$('#def_playerstate, #def_bowlerstate, .def_not_live').show();
				$('#def_series_title').html(data.series);
				//team name
				$('#def_team1').html(data.battingTeamName);
				$('#def_team2').html(data.bowlingTeamName);

				//team icon
				$('#def_team1_image').removeAttr('class');
				//$('#def_team_icon1>div').addClass('team1_image');
				$('#def_team2_image').removeAttr('class');
				//$('#def_team_icon2>div').addClass('team2_image');
				$('#def_team1_image').addClass("flag flag_"+data.battingTeamName);
				$('#def_team2_image').addClass("flag flag_"+data.bowlingTeamName);

				//batting team score/over
				$('#def_team1_score').html(data['currentBatTeamScore'].runsAndWicket+'*');
				$('#def_team1_over').html(data['currentBatTeamScore'].overs+" Overs");

				//bowling team score/over
				//if(data[0]['currentBowlTeamScore'].runsAndWicket !="0/0")
				//{
				$('#def_team2_score').html(data['currentBowlTeamScore'].runsAndWicket);
				$('#def_team2_over').html(data['currentBowlTeamScore'].overs+" Overs");
				//}

				//RunRate
				$('#def_crr').html("CRR : "+data.crr);
				if(data.rrr == "")
				{
					$('#def_rrr').html("");
				}
				else
				{
					$('#def_rrr').html("RRR : "+data.rrr);
				}

				$('#def_matchstate').html(data.status);
				if(data.state != 'complete')
				{
				//status if not playing
				if(data.state != 'inprogress')
				{
					if(data.state === 'stump')
					{
						$('#def_matchstate').html('Stumps - '+data.status);
					}
				}
				//striker's
				$('#def_striker').html(data['striker'].fullName);
				$('#def_nonStriker').html(data['nonStriker'].fullName);

				//striker's runs
				$('#def_striker_run').html("");
				if(data['striker'].balls !="")
				{
					$('#def_striker_run').html(data['striker'].runs+"("+data['striker'].balls+")");
				}
				
				$('#def_nonStriker_run').html("");
				if(data['nonStriker'].balls !="")
				{
					$('#def_nonStriker_run').html(data['nonStriker'].runs+"("+data['nonStriker'].balls+")");
				}

				//sr
				$('#def_nonStriker_sr').html("");
				if(data['nonStriker'].balls != ""){
					if(data['nonStriker'].balls != 0){
						$('#def_nonStriker_sr').html((data['nonStriker'].runs/data['nonStriker'].balls*100).toFixed(2));
					}
					else{
						$('#def_nonStriker_sr').html("0.00");
					}
				}

				$('#def_striker_sr').html("");
				if(data['striker'].balls != ""){
					if(data['striker'].balls != 0){
						$('#def_striker_sr').html((data['striker'].runs/data['striker'].balls*100).toFixed(2));
					}
					else{
						$('#def_striker_sr').html("0.00");
					}
				}

				//last name
				$('#def_strikers_lname').html("");
				if(data['striker'].fullName != "" && data['strikerbowler'].fullName != "")
				$('#def_strikers_lname').html(data['strikerbowler'].fullName.split(' ').slice(-1).join(' ')+" to "+data['striker'].fullName.split(' ').slice(-1).join(' '));
				//split(' ').slice(-1).join(' ');


				//bowler
				$('#def_strikerbowler').html(data['strikerbowler'].fullName);

				$('#def_strikerbowler_runs').html(data['strikerbowler'].runs);

				$('#def_strikerbowler_overs').html(data['strikerbowler'].overs);

				$('#def_strikerbowler_maidens').html(data['strikerbowler'].maidens);

				$('#def_strikerbowler_wickets').html(data['strikerbowler'].wickets);
				}
				else
				{
					$('#def_playerstate').hide();
					$('#def_bowlerstate').hide();
					$('.h-seperator').hide();
				}
				if(data.state=='preview')
				{
				$('#def_playerstate, #def_bowlerstate, .def_not_live').hide();
				$('#def_matchstate').html('Starting '+new Date(data.startdayandtimeGMT));
				}


}
function getCookieValue(key)
{
    currentcookie = document.cookie;
    if (currentcookie.length > 0)
    {
        firstidx = currentcookie.indexOf(key + "=");
        if (firstidx != -1)
        {
            firstidx = firstidx + key.length + 1;
            lastidx = currentcookie.indexOf(";",firstidx);
            if (lastidx == -1)
            {
                lastidx = currentcookie.length;
            }
            return unescape(currentcookie.substring(firstidx, lastidx));
        }
    }
    return "";
}
function test()
{
	 var site='http://dynamic.pulselive.com/dynamic/data/core/cricket/2012/ipl2013/TournamentInNumbers.js';
	 // Fall back URL incase the above URL does not work
	 //var site='http://webclient.cricbuzz.com/includes/deccanherald/livecricketscore/web-client-match-details.json';  
    // Take the provided url, and add it to a YQL query. Make sure you encode it!  
    var yql = 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + site + '"') + '&format=json';  	
	 $.getJSON( yql,function(result) {
		 alert("wrrf");
        });
}
