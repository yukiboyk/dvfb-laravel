'use strict'

$.ajaxSetup({
  headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
            });
          
/* Ajax Update */
$(document).ready(function () {
    $('#ajaxSubmitForm').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr("action"),
            method = $(this).attr("method"),
            data = $(this).serialize(),
            button = $(this).find("button[type=submit]");
        
        submitForm(url, method , data, button);
    });
});
   
function submitForm(url, method , data, button) {
    const textButton = button.html().trim();
    const setting = {
        url,
        type: method,
        data,
        processData:false,
        dataType:'JSON',
        beforeSend: function () {
            button
                .prop("disabled", !0)
                .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...');
        },
        complete: function () {
            button.prop("disabled", !1).html(textButton);
        },
        success:function(data){
            if(data.status == 'fails'){
                    $.each(data.message, function(prefix, val){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: val
                          });
                      });
            }else{
              $('#ajaxSubmitForm')[0].reset();
              Swal.fire({
                icon: 'success',
                title: 'Thành Công',
                text: data.message,
              });
            }
          }
        
    };
    $.ajax(setting);
}


    

