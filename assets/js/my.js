
$(document).ready(function()
{
		tweets();
		news();
		result();
		team();
		photos();
		 livescore();
	    /*setInterval(function() {
          result();
			}, 60000);*/
    setInterval(function() {
          livescore();
			}, 30000);
			
});
function result()
{
	//load result scores 
	//to test
	//$('#accordion2').html('');
	var html='';
	var select='<select><option>All</option>';
	$.ajax({
        url: 'result',
        type: "GET",
        dataType:'json', 
        success: function(data) {
			//alert(data.menu.length);
			$.each( data.list, function( key, value )
			{
				html+='<div class="accordion-group"><div class="accordion-heading"><a data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle"><div class="content">';
                html+='<div class="date"><span class="red">'+data.list[key]['date']+'</span></div>';
                html+='<div class="match"><h4><span class="grey">'+data.list[key]['team']+'</span></h4><h5>'+data.list[key]['result']+'</h5></div>';
                html+='<div class="clearfix"></div></div></a></div></div>';
				//alert( key + ": " + value );
			});
			$.each( data.menu, function( key, value )
			{ 
				select+='<option>'+value+'</option>';
			});
			select+='</select>';
			$('#resultmenu').html(select);
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
	var bannerslide='';
	$.ajax({
        url: 'news',
        type: "GET",
        dataType:'json', 
        success: function(data) {
			for(i=1;i<data.resultset.length;i++)
			{
				html+='<div class="accordion-heading acc-heading">'
				html+='<p><b><a target="_blank" href="'+data.resultset[i]['link']+'">'+data.resultset[i]['title']+'</a></b> - '+data.resultset[i]['pubdate']+'</p>';
				html+='<p>'+data.resultset[i]['description']+'</p></div>';
				/*bannerslide+='<div class="item"> <img src="'+data.resultset[i]['media'][1]+'" class = "res-image">';
				bannerslide+='<div class = "carousel-caption">';
				bannerslide+='<a target="_blank" href="'+data.resultset[i]['link']+'"><h4>'+data.resultset[0]['title']+'</h4></a>';
				bannerslide+='<p>'+data.resultset[i]['description']+'</p></div></div>';*/
			}
			$('#recentNews').html(html);
			html='<img src="'+data.resultset[0]['media2']+'"/>';
			html+='<p>'+data.resultset[0]['pubdate']+'</p>';
			html+=data.resultset[0]['description'];
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
function tweets()
{
	var html='<p><strong>Tweets :</strong>';
	$.getJSON("https://api.twitter.com/1/statuses/user_timeline.json?screen_name=bccicom&count=9&callback=?", 
  function (data)
	{
		for(i=0;i<data.length;i++)
			{
				html+=data[i]['text']+' | ';
			}
			html+='</p>';
			$('#tweets').html(html);
    //console.log(r);
	});
}
function livescore()
{
	$.ajax({
        url: 'live',
        type: "GET",
        cache: false,
        success: function(data) {
			$('#livescore').html(data);
        },
        error:function()
        {
			
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
			for(i=0;i<data.resultset['Test'].length;i++)
			{
				list+='<div class="accordion-group"><div class="accordion-heading">';
                list+='<div class="content"><div class="date">';
                list+='<span class="red"><h3>'+parseInt(i+1)+'</h3></span>';
                list+='</div><div class="match">';
                list+='<h3 class="grey">'+data.resultset['Test'][i]['team']+'</h3>';
                list+='<h5>Rating: '+data.resultset['Test'][i]['rating']+' | Points: '+data.resultset['Test'][i]['points']+'</h5>';
                list+='</div><div class="clearfix"></div></div></div></div>';
			}
			$('#team-ranking').html(list);
			for(i=0;i<data.resultset['Test'].length;i++)
			{
                list1+='<div class="accordion-group"><div class="accordion-heading">';
                list1+='<div class="content"><div class="date">';
                list1+='<span class="red"><h3>'+parseInt(i+1)+'</h3></span>';
                list1+='</div><div class="match">';
                list1+='<h3 class="grey">'+data.resultset['ODI'][i]['team']+'</h3>';
                list1+='<h5>Rating: '+data.resultset['ODI'][i]['rating']+' | Points: '+data.resultset['ODI'][i]['points']+'</h5>';
                list1+='</div><div class="clearfix"></div></div></div></div>';
			}
			$('#team-ranking01').html(list1);
			for(i=0;i<data.resultset['Test'].length;i++)
			{
                list2+='<div class="accordion-group"><div class="accordion-heading">';
                list2+='<div class="content"><div class="date">';
                list2+='<span class="red"><h3>'+parseInt(i+1)+'</h3></span>';
                list2+='</div><div class="match">';
                list2+='<h3 class="grey">'+data.resultset['T20'][i]['team']+'</h3>';
                list2+='<h5>Rating: '+data.resultset['T20'][i]['rating']+' | Points: '+data.resultset['T20'][i]['points']+'</h5>';
                list2+='</div><div class="clearfix"></div></div></div></div>';
			}
			$('#team-ranking02').html(list2);
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
    })
	
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
				html+='<div class = "grid-item"><a href = "'+data.resultset[i]['src']+'" class = "lightbox"><img src="'+data.resultset[i]['icon']+'"></a></div>';
			}
			$('#photosgrid').html(html);
        },
        error:function()
        {
			
		}    
    })
	
}
