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

// if (isset($_POST['submitAct'])) {
                                                                                                
    $queryAct = dbConnect()->prepare("SELECT * FROM jobs WHERE id=?");
    $queryAct->execute([$id]);
    $rowAct=$queryAct->fetch();
    $myst = $rowAct['status'];
    // $mystid = $rowAct['id'];
    if($myst == 1){
    $queryAction = dbConnect()->prepare("UPDATE jobs SET status=0 WHERE id=?");
    $queryAction->execute([$id]);
    // echo '<script>alert("Activated");window.location="jobs_posted"</script>';

        echo '<script>alert("Deactivated");window.location="jobs_posted"</script>';
    }else{
    $queryAction = dbConnect()->prepare("UPDATE jobs SET status=1 WHERE id=?");
    $queryAction->execute([$id]);
    echo '<script>alert("Activated");window.location="jobs_posted"</script>';
    }
    

    
// }
   

// }



?>