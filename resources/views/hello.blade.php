<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <title>Document</title>
</head>
<body>
    <br>
   <div class="container"> 
     <div class="row">
        <div class="card">
    <form action="" method="POST" id="ajaxSubmitForm">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Ten tai khoan</label>
          <input type="username" name="username" id="username" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" >
        </div>
        <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
</div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script> 
 $.ajaxSetup({
            headers:{
                  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                       }
                      });
                    
$(document).ready(function() {
    $('#ajaxSubmitForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
              url:$(this).attr('action'),
              method:$(this).attr('method'),
              data: $("#ajaxSubmitForm").serialize(),
              processData:false,
              dataType:'JSON',
              beforeSend:function(){
                $('#btnsubmit').attr('disabled', 'disabled').html('Loadding...')
              },
              complete: function(){
                   $('#btnsubmit').removeAttr('disabled').html('XÁC NHẬN')
              },
              
         success : function( data ) {
             if(data.status == 'fails'){
              $.each(data.message, function(prefix, val){
                    alert(val)
                });
              }else{
                alert('thanh cong')
              }
         },

      });
    });
});
</script>
</body>
</html>