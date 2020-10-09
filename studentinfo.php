<?php
require_once('config.php') ;
?>

<!DOCTYPE html>
<html>
<head> 
 <title> let's do it </title>
 <link rel ="stylesheet" type ="text/css" href ="css/bootstrap.min.css">
</head>
<body>
<div>
 <?php
  
 ?>  
</div>

<div>
<form action="studentinfo.php" method = "post" >
     <div class = "container">
       <div class = "row">
          <div class = "col-sm-3">
             <h1>Registration</h1>
             <p>fill the form</p>
             <class mb-3>
              <label for = "name"> <b>name</b> </label>
              <input class ="form-control" id ="name" type ="text" name = "name" required >
              
              <label for = "age"> <b>age</b> </label>
              <input class ="form-control"id ="age" type ="text" name = "age"  required> 
              
              <label for = "email"> <b>email</b> </label>
              <input class ="form-control" id ="email" type ="text" name = "email" required >
              
              <label for = "gender"> <b>gender</b> </label>
              <input class ="form-control" id ="gender" type ="text" name = "gender" required >
              
              <label for = "password"> <b>password</b> </label>
              <input class ="form-control" id ="password" type ="password" name = "password" required>

   <br>
   <class mb-3>
  <input class = "btn btn-primary" type="submit" id = "register" name ="btn" value = "login" >
   </div>
   </div>
    </div>
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type ="text/javascript">
$(function(){
 //alert('helelle' ) ;
 $('#register').click(function(e){
   var valid = this.form.checkValidity() ;
   if(valid){
    var name = $('#name').val() ;
    var age = $('#age').val() ;
    var email =$('#email').val() ;
    var gender = $('#gender').val() ;
    var password = $('#password').val() ;
     e.preventDefault() ;
     $.ajax({
       type: 'POST' ,
       url :'process.php' ,
       data :{name:name ,age:age ,email:email ,gender:gender ,password :password} ,
       success: function(data){
        Swal.fire({
        'title':'hello' ,
        'text' : data ,
        'type' : 'success'
        }) 
       } ,
     error:function(data){
       Swal.fire({

         'title':'errors' ,
         'text' :'there is some error' ,
         'type' :'error'
       })
     }

       }) ;
      
   }
    

  }) ;
});
</script>
</body>
</html>