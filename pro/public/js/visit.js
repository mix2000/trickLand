/**
 * Created by one on 17.10.2016.
 */
$(document).ready(function(){
   $('.visit-add .addTo').click(function(){
      var element = $(this);
       $.ajax({
           type: 'POST',
           url: '/visit/AJAX',
           data: {
              'idUser':element.data('id'),
               'idVisit': $('#idVisit').val()
           },
           success: function (msg) {
               var obj = $.parseJSON(msg);
               if(obj.msg=='add'){
                   element.removeClass('btn-warning').addClass('btn-success');
               }
               if(obj.msg=='delete'){
                   element.removeClass('btn-success').addClass('btn-warning');
               }
           }

       });
   });
});