$(document).ready(function()
	{
		$.kvmplaceholder={};
		$.kvmplaceholder.count=2;
		setInterval(function() {
          kvmimage($.kvmplaceholder.count);
			}, 2000);
	});
function kvmimage(count)
{	
	$('.kvmslider').hide();
	$('#img'+count).fadeIn();
	if(count===5)
	{
		$.kvmplaceholder.count=1;
	}
	else
	{
		$.kvmplaceholder.count=$.kvmplaceholder.count+1;
	}
}