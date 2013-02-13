
$(document).ready(function()
{
		news();
		result();
		team();
		$.myplaceholder={};
		$.myplaceholder.mylivescore=[];
		$.myplaceholder.checkreload=0;
		rank('batsman');
		rank('bowler');
		rank('allrounder');
		photos();
		videos();
		article();
		livescore();
	    /*setInterval(function() {
          result();
			}, 60000);*/
    setInterval(function() {
          livescore();
			}, 60000);
			$('#resultmenu').change(function()
			{
				$('.accordion-group').hide();
				$('.'+this.value).show();
			});
			$('#livescore_dd').change(function()
			{
				alert(this.value);
				//alert($.myplaceholder.mylivescore[this.value].matchFolder);
				livescoredisplay($.myplaceholder.mylivescore[this.value]);
				//$('.accordion-group').hide();
				//$('.'+this.value).show();
			});
			
});
function result()
{
	//load result scores 
	//to test
	//$('#accordion2').html('');
	var html='';
	$.ajax({
        url: 'result/getlist',
        type: "GET",
        dataType:'json', 
        success: function(data) {
			//alert(data.menu.length);
			$.each( data.resultset['ODI'], function(list)
			{
				html+='<div class="accordion-group ODI"><div class="accordion-heading"><a href="'+data.resultset['ODI'][list]['link']+'" target="_blank" class="accordion-toggle"><div class="content">';
                html+='<div class="date"><span class="red">'+data.resultset['ODI'][list]['date']+'</span></div>';
                html+='<div class="match"><h4><span class="grey">'+data.resultset['ODI'][list]['team']+'</span></h4><h5>'+data.resultset['ODI'][list]['result']+'</h5></div>';
                html+='<div class="clearfix"></div></div></a></div></div>';
			});
			$.each( data.resultset['Test'], function(list)
			{
				html+='<div class="accordion-group Test"><div class="accordion-heading"><a href="'+data.resultset['Test'][list]['link']+'" target="_blank" class="accordion-toggle"><div class="content">';
                html+='<div class="date"><span class="red">'+data.resultset['Test'][list]['date']+'</span></div>';
                html+='<div class="match"><h4><span class="grey">'+data.resultset['Test'][list]['team']+'</span></h4><h5>'+data.resultset['Test'][list]['result']+'</h5></div>';
                html+='<div class="clearfix"></div></div></a></div></div>';
			});
			$.each( data.resultset['T20'], function(list)
			{
				html+='<div class="accordion-group T20"><div class="accordion-heading"><a href="'+data.resultset['T20'][list]['link']+'" target="_blank" class="accordion-toggle"><div class="content">';
                html+='<div class="date"><span class="red">'+data.resultset['T20'][list]['date']+'</span></div>';
                html+='<div class="match"><h4><span class="grey">'+data.resultset['T20'][list]['team']+'</span></h4><h5>'+data.resultset['T20'][list]['result']+'</h5></div>';
                html+='<div class="clearfix"></div></div></a></div></div>';
			});
			$('#accordion2').html(html);
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
        url: 'news/getlist',
        type: "GET",
        dataType:'json', 
        success: function(data) {
			for(i=1;i<data.resultset.length;i++)
			{
				mod=i%3;
				html+='<li class="media news-thumb-small">' ;
                html+='<a class="pull-left" target="_blank" href="'+data.resultset[i]['link']+'"> <img src="'+data.resultset[i]['media2']+'" class="media-object"> </a>';
                html+='<div class="media-body">';
                html+='<h4 class="media-heading"><a target="_blank" href="'+data.resultset[i]['link']+'">'+data.resultset[i]['title']+'</a></h4>';
                html+='<h6>'+data.resultset[i]['pubdate']+'</h6>';
                html+='</div>';
                html+='</li>';
                if((mod==0) || (i==(data.resultset.length-1)))
                {
					recentNews+='<div class = "span6"><ul>'+html+'</ul></div>';
					html='';
				}
			}
			$('#recentNewscont').html(recentNews);
			html='<div class = "row-fluid"><div class = "span12 news-thumb"><p><img src="'+data.resultset[0]['media2']+'"/>';
			html+='<p>'+data.resultset[0]['pubdate']+'</p>';
			html+=data.resultset[0]['description'];
			html+='<p class="pull-right"><a class="btn btn-primary" target="_blank" href="'+data.resultset[0]['link']+'">Read more</a></p>';
			html+='</p></div></div>';
			$('#featuredNews').html(html);
			bannerslide+='<div class="item active"> <img src="'+data.resultset[0]['media1']+'" class = "res-image">';
			bannerslide+='<div class = "carousel-caption">';
			bannerslide+='<a target="_blank" href="'+data.resultset[0]['link']+'"><h4>'+data.resultset[0]['title']+'</h4></a>';
			bannerslide+='<p>'+data.resultset[0]['pubdate']+'</p>';
			bannerslide+='<p>'+data.resultset[0]['description'].substring(0,200)+' ...</p></div></div>';
			$('#bannerslide').html(bannerslide);
        },
        error:function()
        {
			
		}    
    });
}

function livescore()
{
	$.ajax({
        url: 'live',
        type: "GET",
        dataType:'json', 
        success: function(data) {
			listcount=0;
			option="";
			//alert(data[listcount].matchDataType);
			$(data).each(function()
			{
				if(data[listcount].matchDataType=='Live Data' && data[listcount].state !='preview')
				{
					option+='<option value="'+listcount+'">'+data[listcount].seriesFolder+'</option>';
					$.myplaceholder.mylivescore.push(data[listcount]);			
				}
				listcount++;

				}); 
				$('#livescore_dd').html(option);

			/*some bug has to fix
			 * when ajax is loading make the current selected tab to update
			 * instead of refresh the list
			 */

			if($.myplaceholder.checkreload==0)
			{
				$.myplaceholder.checkreload=1;
				livescoredisplay($.myplaceholder.mylivescore[0]);
			}
			else
			{
				//livescoredisplay($.myplaceholder.mylivescore[$('#livescore_dd').value]);
			}
        }
	});
}
function team()
{
	var list='';
	var list1='';
	var list2='';
	$.ajax({
        url: 'rank/team',
        type: "GET",
        dataType:'JSON',
        success: function(data) {
			list='<h4>Test Match</h4>';
			for(i=0;i<data.resultset['Test'].length;i++)
			{
				list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "flag">';
                list+=                     '<img src="/bcci/assets/Images/India_03.png">';
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
			list='<h4>ODI Match</h4>';
			for(i=0;i<data.resultset['ODI'].length;i++)
			{
                list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "flag">';
                list+=                     '<img src="/bcci/assets/Images/India_03.png">';
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
			list='<h4>T20 Match</h4>';
			for(i=0;i<data.resultset['T20'].length;i++)
			{
                list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "flag">';
                list+=                    '<img src="/bcci/assets/Images/India_03.png">';
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
        url: 'rank/'+method,
        type: "GET",
        dataType:'JSON',
        success: function(data) {
			list='<h4>Test Match</h4>';
			for(i=0;i<data.resultset['Test'].length;i++)
			{
				list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "flag">';
                list+=                     '<img src="/bcci/assets/Images/India_03.png">';
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
			list='<h4>ODI Match</h4>';
			for(i=0;i<data.resultset['ODI'].length;i++)
			{
				list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "flag">';
                list+=                     '<img src="/bcci/assets/Images/India_03.png">';
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
			list='<h4>T20 Match</h4>';
			for(i=0;i<data.resultset['T20'].length;i++)
			{
				list+='<li class="white-block">';
                list+=            '<div class = "row-fluid">';
                list+=              '<div class="span4 padding10">';
                list+=                  '<div class = "flag">';
                list+=                     '<img src="/bcci/assets/Images/India_03.png">';
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
        url: 'photos',
        type: "GET",
        dataType:'JSON',
        success: function(data) {
			for(i=0;i<data.resultset.length;i++)
			{
				html+='<div class="view view-first">';
                html+=    '<img src="'+data.resultset[i]['icon']+'">';
                html+=    '<div class="mask">';
                html+=       '<p>'+data.resultset[i]['pubdate']+'</p>';             
                html+=        '<a href="'+data.resultset[i]['src']+'" class="info">'+data.resultset[i]['description']+'</a>';
                html+=    '</div>';
                html+='</div>';
			}
			$('#photosgrid').html(html);
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
        url: 'videos',
        type: "GET",
        dataType:'JSON',
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
        url: 'article/getlist',
        type: "GET",
        dataType:'JSON',
        success: function(data) {
			recentArticle='';
			html='<h4 class="media-heading"><a href="#">'+data.resultset[0]['title']+'</a></h4>';
			html+='<h6>By Administrator</h6>';
			html+=data.resultset[0]['content'].substring(0,500)+'...';
            $('#farticle').html(html);
            $('#farticlerm').attr('href','/bcci/article/get/'+data.resultset[0]['id']);
            html='';
			for(i=1;i<data.resultset.length;i++)
			{
				mod=i%3;
				html+='<li class="media news-thumb-small">'; 
				html+='<div class="media-body">';
                html+='    	<h4 class="media-heading"><a href="/bcci/article/get/'+data.resultset[i]['id']+'">'+data.resultset[i]['title']+'</a></h4>';
                html+='    	<h6>By '+data.resultset[i]['author']+'</h6>';
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
	//alert('live');
				
				//series_title
				//$('#series_title').html(data.matchType+" - "+data.matchdesc);
				$('#series_title').html(data.series);
				//team name
				$('#team1').html(data.battingTeamName);
				$('#team2').html(data.bowlingTeamName);
				
				//team icon
				$('#team1_image').html(data.battingTeamName);
				$('#team2_image').html(data.bowlingTeamName);
				
				
				//batting team score/over
				$('#team1_score').html(data['currentBatTeamScore'].runsAndWicket+'*');
				$('#team1_over').html(data['currentBatTeamScore'].overs+" Overs");
				
				//bowling team score/over
				//if(data[0]['currentBowlTeamScore'].runsAndWicket !="0/0")
				//{
				$('#team2_score').html(data['currentBowlTeamScore'].runsAndWicket);
				$('#team2_over').html(data['currentBowlTeamScore'].overs+" Overs");
				//}
				
				//striker's
				$('#striker').html(data['striker'].fullName);
				$('#nonStriker').html(data['nonStriker'].fullName);
				
				//striker's runs
				if(data['striker'].balls !="")
				{
					$('#striker_run').html(data['striker'].runs+"("+data['striker'].balls+")");
				}
				else
				{
					$('#striker_run').html("");
				}
				if(data['nonStriker'].balls !="")
				{
					$('#nonStriker_run').html(data['nonStriker'].runs+"("+data['nonStriker'].balls+")");
				}
				else
				{
					$('#nonStriker_run').html("");
				}
				
				//RunRate
				$('#crr').html("CRR : "+data.crr);
				$('#rrr').html("RRR : "+data.rrr);
				
				//bowler
				$('#strikerbowler').html(data['strikerbowler'].fullName);

				$('#strikerbowler_runs').html(data['strikerbowler'].runs);

				$('#strikerbowler_overs').html(data['strikerbowler'].overs);
				
				$('#strikerbowler_maidens').html(data['strikerbowler'].maidens);
				
				$('#strikerbowler_wickets').html(data['strikerbowler'].wickets);
				
				//sr
				if(data['nonStriker'].balls !="")
				$('#nonStriker_sr').html((data['nonStriker'].runs/data['nonStriker'].balls*100).toFixed(2));
				if(data['striker'].balls !="")
				$('#striker_sr').html((data['striker'].runs/data['striker'].balls*100).toFixed(2));
				
				//last name
				if(data['striker'].fullName != "" && data['strikerbowler'].fullName != "")
				$('#strikers_lname').html(data['striker'].fullName.split(' ').slice(-1).join(' ')+" to "+data['strikerbowler'].fullName.split(' ').slice(-1).join(' '));
				//split(' ').slice(-1).join(' ');
}
