 $('#add-module').on('click', function(){
    var mod = $('#select-module').val();
    var title = $('#select-module').find("option:selected").text();
    if(mod != ''){
        $.ajax({
        type: 'get',
        url: links_array['get_module'],
        data: {
          'mod': mod
        },
        beforeSend: function (argument) {
         // obj.innerHTML = "<i class='fa fa-spinner fa-spin'>";
        },
        success: function (data) {
         
          $('#put-model-data').append(getModultLayout(data, title));
          loadEditor();
        }
      });
    }
   });

function getModultLayout(data, title) {
          var out = '';
          var num = getRandomInt(9999999999);
          out = '<div class="sort-scroll-element" id="mod-'+num+'"> <div id="heading'+ num +'"  class="card-header">';
          out += '<span onclick="deleteThis('+num+');"><span><i class="fa fa-times"></i></span></span><a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion'+num+'" aria-expanded="true" aria-controls="accordion'+num+'" class="card-title lead">'+ title +'</a>';
          out += '   <span class="sort-scroll-button-up"><i class="fa fa-arrow-up"></i></span>    <span class="sort-scroll-button-down"><i class="fa fa-arrow-down"></i></span>';
          out += '</div>';
          out += '<div id="accordion'+num+'" role="tabpanel" aria-labelledby="heading'+num+'" class="card-collapse collapse in" aria-expanded="true">';
          out += '<div class="card-body">';
          out += '<div class="card-block">';
          out += data;
          out += '</div></div></div></div>';
          return out;
}

  $('.head-mod').on('click', function(){
    var id = $(this).attr('data-id');
    $('.head1').remove();
    $('#accordion'+id).remove();
   });

  $('.delete-mod').on('click', function(){
    var id = $(this).attr('data-id');
    $('#mod-'+id).remove();
   });

function deleteThis(id){
  $('#mod-'+id).remove();
}

