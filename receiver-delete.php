<?php 
include 'connect/connect.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = dbConnect()->prepare("SELECT * FROM mail WHERE id=?");
    $sql->execute([$id]);
    if ($sql->rowcount()>0) {
       
    }else {
       echo "<script>window.location='inbox'</script>";
    }
 }else {
    echo "<script>window.location='inbox'</script>";
 }

$queryAction = dbConnect()->prepare("UPDATE mail SET receiver_trash=? WHERE id=?");
    if( $queryAction->execute([1,$id]) ){
    echo '<script>alert("Moved to Trash Successfully !!!");window.location="inbox"</script>';
    // header('location:jobs_posted');
}




?>