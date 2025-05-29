<?php include 'connect/connect.php'; ?>

<?php


if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = dbConnect()->prepare("SELECT * FROM leave_app WHERE id=?");
   $sql->execute([$id]);
   if ($sql->rowcount()>0) {
      
   }else {
      echo "<script>window.location='view_leave'</script>";
   }
}else {
   echo "<script>window.location='view_leave'</script>";
}

    
    $sql = dbconnect()->prepare("DELETE FROM leave_app WHERE id='$id'");
    $sql->execute();

    if ($sql==TRUE) {
        echo "<script>alert('Leave Record Removed Successfully'); window.location='view_leave'</script>";
    }
    
    else {
        echo "<script>alert('An Error Occurred While Deleting Leave Record!!!'); window.location='view_leave'</script>";
    }




?>