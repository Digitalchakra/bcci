$(document).ready(function(){
  $('#clearsearch').click(function()
    {
      $('#searchul').html('');
      $('.pname').show();
      $('.ipl-statout, #cmp_div').hide();
      $('#searchResult, #cmp_with, #cmp_panel').html("");
      $('#run_pname').val("");
      $('#compareform').html('<button class="btn btn-success">Compare Players</button>');


    });
  $('#compare').click(function(){
    $('#cmp_imput').show();
    $(this).hide();    
  });

  $('#run_pname').keyup(function(){
    //alert($(this).val());
    $('#searchul').html('');
    search_txt=$.trim($(this).val());
    //$('.run_pname').hide();
    if(search_txt.length>0)
    {
      $("li[run_pname^='"+$('#run_pname').val().toLowerCase()+"'], li[run_pname*='"+$('#run_pname').val().toLowerCase()+"']").each(function(){
        $('#searchul').append('<li onclick=searchresult("'+$(this).attr('pid')+'");>'+$(this).attr('pname')+'</li>');
      });
    }
    else
    {
      $('#searchul').html('');
    }
  });
  $('#cmp_pname').keyup(function(){
    //alert($(this).val());
    $('#cmpsearchul').html('');
    search_txt=$.trim($(this).val());
    //$('.run_pname').hide();
    if(search_txt.length>0)
    {
      $("li[run_pname^='"+$('#cmp_pname').val().toLowerCase()+"'], li[run_pname*='"+$('#cmp_pname').val().toLowerCase()+"']").each(function(){
        $('#cmpsearchul').append('<li onclick=cmpsearchresult("'+$(this).attr('pid')+'");>'+$(this).attr('pname')+'</li>');
      });
    }
    else
    {
      $('#cmpsearchul').html('');
    }
  });
  $('.pname').click(function(){
    //$('#e'+$(this).attr('id')).toggle();
    targetID='e'+$(this).attr('id');
    rank=$(this).attr('rank');
    $('.ipl-statout').hide();
    $('#'+targetID).show();
    $.ajax({
      url:baseurl+'ipl/bowling_player?pids='+$(this).attr('pid'),
      type:'GET',
      dataType:'JSON',
      success:function(data)
      {
        //alert(data.resultset.data[0]['6s']);
        //alert($(this).attr('id'));
        html=                '<span onclick="hideMe(\''+targetID+'\');" class="statout-close">X</span>';
        html+=                '<div class="ipl-'+data.resultset.data[0].team_abbreviation+' ipl-floatLeft ipl-statout-spacer"> </div>';
        html+=                '<div class="ipl-statout-title">';
        html+=                  '<h4>Batting Statistics, Max 6s</h4>';
        html+=                  '<p>'+rank+' '+data.resultset.data[0].pfullName+'</p>';
        html+=                '</div>';
        html+=                '<div class="ipl-statout-table ">';
        html+=                  '<table WIDTH="100%" HEIGHT="100%">';
        html+=                    '<tr WIDTH="100%">';
        html+=                      '<td class="clbl1"><p>'+data.resultset.data[0].m+'</p>';
        html+=                        '<h4>MAT</h4></td>';
        html+=                      '<td class="clbl2"><p>'+data.resultset.data[0].inns+'</p>';
        html+=                        '<h4>INN</h4></td>';
        html+=                      '<td class="clbl3"><p>'+data.resultset.data[0].ov+'</p>';
        html+=                        '<h4>OVERS</h4></td>';
        html+=                      '<td class="clbl3 ipl-statout-down"><p>'+data.resultset.data[0].br+'</p>';
        html+=                        '<h4>RUNS</h4></td>';
        html+=                    '</tr>';
        html+=                    '<tr WIDTH="100%">';
        html+=                      '<td class="clbl4"><p>'+data.resultset.data[0].e+'</p>';
        html+=                        '<h4>ECON</h4></td>';
        html+=                      '<td class="clbl5"><p>'+data.resultset.data[0].ba+'</p>';
        html+=                        '<h4>AVE</h4></td>';
        html+=                      '<td class="clbl6"><p>'+data.resultset.data[0].w+'</p>';
        html+=                        '<h4>WICKETS</h4></td>';
        html+=                      '<td class="clbl3 ipl-statout-down"><p>'+data.resultset.data[0].bb+'</p>';
        html+=                        '<h4>BALLS</h4></td>';
        html+=                    '</tr>';
        html+=                    '<tr WIDTH="100%">';
        html+=                      '<td class="clbl7"><p>'+data.resultset.data[0].bbiw+'/'+data.resultset.data[0].bbir+'</p>';
        html+=                        '<h4>BBI</h4></td>';
        html+=                      '<td class="clbl8"><p>'+data.resultset.data[0].maid+'</p>';
        html+=                        '<h4>MAID</h4></td>';
        html+=                      '<td class="clbl3"><p>'+data.resultset.data[0].extras+'</p>';
        html+=                        '<h4>NB</h4></td>';
        html+=                      '<td class="clbl3"><p>'+data.resultset.data[0]['4w']+'</p>';
        html+=                        '<h4>4W</h4></td>';
        html+=                    '</tr>';
        html+=                  '</table>';
        html+=                '</div>';
        html+=                '<div class="ipl-statout-leftarrow" > </div>';
        $('#'+targetID).html(html);
      },
      error:function()
      {
        //alert('Internal error, try agian...');
      }
    });
  });
});
function searchresult(pid)
{
  //alert(divID);
  $('#searchul').html('');
  $('#cmp_div').show();
  $('.ipl-statout, .pname').hide();
  $('#r'+pid +', #s'+pid+', #hs'+pid+', #sr'+pid+', .first').show();
  $.ajax({
      url:baseurl+'ipl/bowling_player?pids='+pid,
      type:'GET',
      dataType:'JSON',
      success:function(data)
      {
        html=                  '<table WIDTH="100%" HEIGHT="100%">';
        html+=                    '<tr WIDTH="100%">';
        html+=                      '<td class="stat_flag"><span class="stat_flag_span ipl-'+data.resultset.data[0].team_abbreviation+'"></span><p>'+data.resultset.data[0].team_abbreviation+'</p></td>';
        html+=                      '<td class="stat_name"><p>'+data.resultset.data[0].pfullName+'</p></td>';
        html+=                      '<td class="clbl1"><p>'+data.resultset.data[0].m+'</p>';
        html+=                        '<h4>MAT</h4></td>';
        html+=                      '<td class="clbl2"><p>'+data.resultset.data[0].inns+'</p>';
        html+=                        '<h4>INN</h4></td>';
        html+=                      '<td class="clbl3"><p>'+data.resultset.data[0].ov+'</p>';
        html+=                        '<h4>OVERS</h4></td>';
        html+=                      '<td class="clbl3 ipl-statout-down"><p>'+data.resultset.data[0].br+'</p>';
        html+=                        '<h4>RUNS</h4></td>';
        html+=                      '<td class="clbl4"><p>'+data.resultset.data[0].e+'</p>';
        html+=                        '<h4>ECON</h4></td>';
        html+=                      '<td class="clbl5"><p>'+data.resultset.data[0].ba+'</p>';
        html+=                        '<h4>AVE</h4></td>';
        html+=                      '<td class="clbl6"><p>'+data.resultset.data[0].w+'</p>';
        html+=                        '<h4>WICKETS</h4></td>';
        html+=                      '<td class="clbl3 ipl-statout-down"><p>'+data.resultset.data[0].bb+'</p>';
        html+=                        '<h4>BALLS</h4></td>';
        html+=                      '<td class="clbl7"><p>'+data.resultset.data[0].bbiw+'/'+data.resultset.data[0].bbir+'</p>';
        html+=                        '<h4>BBI</h4></td>';
        html+=                      '<td class="clbl8"><p>'+data.resultset.data[0].maid+'</p>';
        html+=                        '<h4>MAID</h4></td>';
        html+=                      '<td class="clbl3"><p>'+data.resultset.data[0].extras+'</p>';
        html+=                        '<h4>NB</h4></td>';
        html+=                      '<td class="clbl3"><p>'+data.resultset.data[0]['4w']+'</p>';
        html+=                        '<h4>4W</h4></td>';
        html+=                  '</table>';
        $('#searchResult').html(html);
        $('#run_pname').val(data.resultset.data[0].pfullName);
        $('#cmp_with').html('Compare '+data.resultset.data[0].pfullName+' with');
         $('#compareform').append('<input type="hidden" autocomplete="off" name="pids[]" id="input'+data.resultset.data[0].pid+'" pid="'+data.resultset.data[0].pid+'" value="'+data.resultset.data[0].pid+'" /><input type="hidden" autocomplete="off" name="pnames[]" id="inputName'+data.resultset.data[0].pid+'" pid="'+data.resultset.data[0].pid+'" value="'+data.resultset.data[0].pfullName+'" />');
      },  
      error:function()
      {
        //alert('Internal error, try agian...');
      }
    });
}
function cmpsearchresult(pid)
{
  $('#cmp_pname').val("");
  $('#cmp_imput').hide();
  $('#cmpsearchul').html("");
  $('#cmp_panel').append('<div class="cmp_label pToCmp" id="'+pid+'">'+$('#r'+pid).attr('pname')+'<span onclick="removeMe('+pid+');" class="cmp_label_close">X</span></div>');
  $('#compareform').append('<input type="hidden" autocomplete="off" name="pids[]" id="input'+pid+'" pid="'+pid+'" value="'+pid+'" /><input type="hidden" autocomplete="off" name="pnames[]" id="inputName'+pid+'" pid="'+pid+'" value="'+$('#r'+pid).attr('pname')+'" />');
  listcount = $('.pToCmp').length;
  $('#compform').show();
  if(listcount >= 4)
  {
    $('#compare, #cmp_imput').hide();
  }
  else
  {
    $('#compare').show();
  }
}
function removeMe(divId)
{
  $('#compare').show();
  $('#'+divId+' , #input'+divId+', #inputName'+divId).remove();
  listcount = $('.pToCmp').length;
  if(listcount <= 0)
  {
    $('#compform').hide();  
  }
  else
  {
    $('#compform').show();
  }
}
function hideMe(divId)
{
  $('#'+divId).hide();
}