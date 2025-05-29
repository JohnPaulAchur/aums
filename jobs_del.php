<?php 
include 'connect/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = dbConnect()->prepare("SELECT * FROM jobs WHERE id=?");
    $sql->execute([$id]);
    if ($sql->rowcount()>0) {
       
    }else {
       echo "<script>window.location='jobs_posted'</script>";
    }
 }else {
    echo "<script>window.location='jobs_posted'</script>";
 }


    
    $queryAction = dbConnect()->prepare("DELETE FROM jobs WHERE id=?");
    $queryAction->execute([$id]);

    echo '<script>alert("Record Deleted Successfully !!!");window.location="jobs_posted"</script>';
    
    

    
// }
   

// }



?>