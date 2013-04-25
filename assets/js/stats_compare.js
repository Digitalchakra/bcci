$(document).ready(function()
{
   pids='';
    if($('.searchIds').length >0)
    {
    $('.searchIds').each(function(plist){
      pids+=$(this).attr('id')+',';
    });
    }
    getresult(pids);
	$('#search_pname').keyup(function(){
    //alert($(this).val());
    $('#searchul').html('');
    search_txt=$.trim($(this).val());
    //$('.run_pname').hide();
    if(search_txt.length>0)
    {
      $("li[sname^='"+$('#search_pname').val().toLowerCase()+"']").each(function(){
        $('#searchul').append('<li onclick=searchresult("'+$(this).attr('pid')+'");>'+$(this).attr('pname')+'</li>');
      });
    }
    else
    {
      $('#searchul').html('');
    }
  });
  $('#addPlayer').click(function(){
    $('#search_pnale, #compare').show();
    $(this).hide();
  });
  $('#compare').click(function(){
    pids='';
    if($('.searchIds').length >0)
    {
    $('.searchIds').each(function(plist){
      pids+=$(this).attr('id')+',';
    });
    getresult(pids);
  }

  });
  //searchresult(0);
	
});
function searchresult(pid)
{ 
  $('#search_pnale').hide();
  $('#search_pname').val('');
  $('#searchul').html('');
  $('#addPlayer').show();
  html='<div class="cmp_label searchIds" id="'+pid+'">';
  html+='<lable class="span2">'+$('#s'+pid).attr('pname')+'</lable>';
  html+='<span class="cmp_label_close" style="margin-top:-5px;" lableid="'+pid+'" type="button" onclick="removeMe('+pid+');">X</span>';
  html+='</div>';
  $('#filterList').append(html);
  listcount = $('.searchIds').length;
  if(listcount >= 5)
  {
    $('#addPlayer').hide();  
  }
  else
  {
    $('#addPlayer').show();
  }
}
function getresult(pids)
{
  
  $.ajax({
      url:baseurl+'ipl/get_players?pids='+pids,
      type:'GET',
      dataType:'JSON',
      success:function(data)
      {
        $('#bat_comparedstats').html('');
        $('#bow_comparedstats').html('');
        $.each(data.resultset.data, function(i,player) {
        html='<table>';
        html+=      '<thead>';
        html+=        '<tr>';
        html+=          '<td>'+player.pfullName+'</td>';
        html+=        '</tr>';
        html+=      '</thead>';
        html+=      '<tbody>';
        html+=          '<tr><td>'+player.r+'</td></tr>';
        html+=          '<tr><td>'+player['4s']+'</td></tr>';
        html+=          '<tr><td>'+player['6s']+'</td></tr>';
        html+=          '<tr><td>'+player.a+'</td></tr>';
        html+=          '<tr><td>'+player.no+'</td></tr>';
        html+=          '<tr><td>'+player['50s']+'</td></tr>';
        html+=          '<tr><td>'+player['100s']+'</td></tr>';
        html+=          '<tr><td>'+player.inns+'</td></tr>';
        html+=          '<tr><td>'+player['hs*']+'</td></tr>';
        html+=          '<tr><td>'+player.sr+'</td></tr>';
        html+=      '</tbody>';
        html+='</table>';
        html1='<table>';
        html1+=      '<thead>';
        html1+=        '<tr>';
        html1+=          '<td>'+player.pfullName+'</td>';
        html1+=        '</tr>';
        html1+=      '</thead>';
        html1+=      '<tbody>';
        html1+=          '<tr><td>'+player.w+'</td></tr>';
        html1+=          '<tr><td>'+player.e+'</td></tr>';
        html1+=          '<tr><td>'+player.ba+'</td></tr>';
        html1+=          '<tr><td>'+player.br+'</td></tr>';
        html1+=          '<tr><td>'+player.d+'</td></tr>';
        html1+=      '</tbody>';
        html1+='</table>';
         $('#bat_comparedstats').append(html);
         $('#bow_comparedstats').append(html1);
         $('#compareDiv').show();
        });
      },
      error:function()
      {
        alert('Internal error, try agian...');
      }
    });
}
function removeMe(divId)
{
  $('#addPlayer').show();
  $('#'+divId).remove();
  listcount = $('.searchIds').length;
  if(listcount <= 0)
  {
    $('#compform').hide();  
  }
  else
  {
    $('#compform').show();
  }
}