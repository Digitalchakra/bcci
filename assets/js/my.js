
$(document).ready(function()
{
		result();
	    setInterval(function() {
          result();
    }, 10000);
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
        async: false,
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
