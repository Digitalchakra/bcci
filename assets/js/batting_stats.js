$(document).ready(function(){
  $('#run_pname').keyup(function(){
    //alert($(this).val());
    $('#testul').html('');
    search_txt=$.trim($(this).val());
    //$('.run_pname').hide();
    if(search_txt.length>0)
    {
      $("li[run_pname^='"+$('#run_pname').val().toLowerCase()+"'], div[run_pname*='"+$('#run_pname').val().toLowerCase()+"']").each(function(){
        $('#testul').append('<li onclick=searchresult("'+$(this).attr('pid')+'");>'+$(this).attr('run_pname')+'</li>');
      });
    }
    else
    {
      $('#testul').html('');
    }
  });
  $('.pname').click(function(){
    //$('#e'+$(this).attr('id')).toggle();
    targetID='e'+$(this).attr('id');
    rank=$(this).attr('rank');
    $('.ipl-statout').hide();
    $('#'+targetID).show();
    $.ajax({
      url:baseurl+'ipl/batting_player?pids='+$(this).attr('pid'),
      type:'GET',
      dataType:'JSON',
      success:function(data)
      {
        //alert(data.resultset.data[0]['6s']);
        //alert($(this).attr('id'));
        html=                '<div class="ipl-statout-title">';
        html+=                  '<h4>Batting Statistics, Max 6s</h4>';
        html+=                  '<p>'+rank+' '+data.resultset.data[0].pfullName+'</p>';
        html+=                '</div>';
        html+=                '<div class="ipl-'+data.resultset.data[0].team_abbreviation+' ipl-floatLeft ipl-statout-spacer"> </div>';
        html+=                '<div class="ipl-statout-table ">';
        html+=                  '<table WIDTH="100%" HEIGHT="100%">';
        html+=                    '<tr WIDTH="100%">';
        html+=                      '<td class="clbl1"><p>'+data.resultset.data[0].m+'</p>';
        html+=                        '<h4>MAT</h4></td>';
        html+=                      '<td class="clbl2"><p>'+data.resultset.data[0].inns+'</p>';
        html+=                        '<h4>INN</h4></td>';
        html+=                      '<td class="clbl3"><p>'+data.resultset.data[0].no+'</p>';
        html+=                        '<h4>NO</h4></td>';
        html+=                      '<td class="clbl3 ipl-statout-down"><p>'+data.resultset.data[0].r+'</p>';
        html+=                        '<h4>RUNS</h4></td>';
        html+=                    '</tr>';
        html+=                    '<tr WIDTH="100%">';
        html+=                      '<td class="clbl4"><p>'+data.resultset.data[0]['hs*']+'</p>';
        html+=                        '<h4>HS</h4></td>';
        html+=                      '<td class="clbl5"><p>'+data.resultset.data[0].a+'</p>';
        html+=                        '<h4>Ave.</h4></td>';
        html+=                      '<td class="clbl6"><p>'+data.resultset.data[0].b+'</p>';
        html+=                        '<h4>BF</h4></td>';
        html+=                      '<td class="clbl3 ipl-statout-down"><p>'+data.resultset.data[0].sr+'</p>';
        html+=                        '<h4>SR</h4></td>';
        html+=                    '</tr>';
        html+=                    '<tr WIDTH="100%">';
        html+=                      '<td class="clbl7"><p>'+data.resultset.data[0]['100s']+'</p>';
        html+=                        '<h4>100</h4></td>';
        html+=                      '<td class="clbl8"><p>'+data.resultset.data[0]['50s']+'</p>';
        html+=                        '<h4>50</h4></td>';
        html+=                      '<td class="clbl3"><p>'+data.resultset.data[0]['4s']+'</p>';
        html+=                        '<h4>4s</h4></td>';
        html+=                      '<td class="clbl3"><p>'+data.resultset.data[0]['6s']+'</p>';
        html+=                        '<h4>6s</h4></td>';
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
  $('#testul').html('');
  $('.pname').hide();
  $('.ipl-statout').hide();
  $('#r'+pid +', #s'+pid+', #hs'+pid+', #sr'+pid+', .first').show();
}