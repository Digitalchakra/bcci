
$(document).ready(function()
{
		tweets();
		news();
		result();
		 livescore();
	    setInterval(function() {
          result();
			}, 60000);
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
	$.ajax({
        url: 'result',
        type: "GET",
        dataType:'json', 
        success: function(data) {
			for(i=0;i<data.resultset.length;i++)
			{
				html+='<div class="accordion-heading acc-heading">'+data.resultset[i]+'</div>';
			}
			$('#accordion2').html(html);
            
        },
        error:function()
        {
			
		}    
    });
}
function news()
{
	var html='';
	$.ajax({
        url: 'news',
        type: "GET",
        dataType:'json', 
        success: function(data) {
			for(i=0;i<data.resultset.length;i++)
			{
				html+='<div class="accordion-heading acc-heading">'
				html+='<p><b><a target="_blank" href="'+data.resultset[i]['link']+'">'+data.resultset[i]['title']+'</a></b> - '+data.resultset[i]['pubDate']+'</p>';
				html+='<p>'+data.resultset[i]['description']+'</p></div>';
			}
			$('#recentNews').html(html);
			html='<img src="'+data.resultset[0]['media']+'"/>';
			html+=data.fnews['desc'];
			$('#featuredNews').html(html);
			html='<img style="width:100%;" src="'+data.banner['img']+'"/>';
			html+='<div id="banner_desc" style="background: rgb(0, 0, 0);background: rgba(0, 0, 0, 0.7);position: relative;bottom: 100px; width:100%; color: #FFFFFF; "><p>';
			html+='<a target="_blank" href="'+data.resultset[0]['link']+'"><h4>'+data.resultset[0]['title']+'</h4></a></p>';
			html+='<p>'+data.resultset[0]['description']+'</p></div>';
			$('#banner').html(html);
			
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
