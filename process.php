<?php
 require_once('config.php') ;
?>
<?php
 if(isset($_POST['name'])){
    $name = $_POST['name'] ;
    $email =$_POST['email'] ;
    $age = $_POST['age'] ;
    $gender = $_POST['gender'] ;
    $password = $_POST['password'] ;
    $sql = "INSERT INTO  users (name , age ,email ,gender ,password ) VALUES (?,?,?,?,?)" ;
    $stmtinsert = $db->prepare($sql) ;
    $result = $stmtinsert->execute([$name ,$age,$email,$gender,$password]) ;
    if($result){
      echo 'inserted successfully' ;
    }else {
      echo 'not been able to insert' ;
    }

  }
  else {
      echo 'no data' ;
  }
?>