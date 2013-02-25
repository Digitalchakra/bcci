$(document).ready(function()
{
	//alert('test');
		/*tweets();
		news();
		result();
	    setInterval(function() {
          result();
    }, 10000);*/
    $('.resultmenu').click(function()
			{
				window.location=$(this).attr('ref');
			});
});
