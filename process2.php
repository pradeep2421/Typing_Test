<?php
 require_once('config.php') ;
?>
<?php
 $id = 2 ;
 $score = 36 ;
    $sql = "INSERT INTO  scores (id,score) VALUES (?,?)" ;
    $stmtinsert = $db->prepare($sql) ;
    $result = $stmtinsert->execute([$id ,$score]) ;
    if($result){
      echo 'inserted successfully' ;
    }else {
      echo 'not been able to insert' ;
    }
?>