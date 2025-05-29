<?php 
include 'connect/connect.php';


if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = dbConnect()->prepare("SELECT * FROM loan WHERE id=?");
   $sql->execute([$id]);
   if ($sql->rowcount()>0) {
      
   }else {
      echo "<script>window.location='loan-list'</script>";
   }
}else {
   echo "<script>window.location='loan-list'</script>";
}


    
    $queryAction = dbConnect()->prepare("UPDATE loan SET status=? WHERE id=?");
    if($queryAction->execute([1,$id])){
    // echo '<script>alert("Activated");window.location="jobs_posted"</script>';

        echo '<script>alert("Aproved");window.location="loan-list"</script>';
    }
    

    



?>