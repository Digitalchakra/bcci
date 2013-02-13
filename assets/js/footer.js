
$(document).ready(function()
{
		tweets();
		srs_list();
			
});

function tweets()
{
	var html='<p><strong>Tweets :</strong>';
	$.getJSON("https://api.twitter.com/1/statuses/user_timeline.json?screen_name=bccicom&count=9&callback=?", 
  function (data)
	{
		for(i=0;i<data.length;i++)
			{
				html+='<p><span class = "tweet-user">'+data[i]['user']['screen_name']+' : </span>'+data[i]['text']+'</p>';
			}
			$('#tweets').html(html);
    //console.log(r);
	});
}

function srs_list()
{
	$.ajax({
        url: '/bcci/schedule/srs_list',
        type: "GET",
        dataType:'JSON',
        success: function(data) {
			html='<h2>Upcoming Series</h2>';
			for(i=0;i<data.resultset.length;i++)
			{
				html+='<li><a href="/bcci/schedule/index/'+data.resultset[i]['srs_id']+'">'+data.resultset[i]['srs_name']+'</a></li>';
			}
			$('#srs_list').html(html);
        },
        error:function()
        {
			
		}    
    });
	
}
