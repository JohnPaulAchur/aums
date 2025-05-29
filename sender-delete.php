<?php 
include 'connect/connect.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = dbConnect()->prepare("SELECT * FROM mail WHERE id=?");
    $sql->execute([$id]);
    if ($sql->rowcount()>0) {
       
    }else {
       echo "<script>window.location='sent-mail'</script>";
    }
 }else {
    echo "<script>window.location='sent-mail'</script>";
 }

$queryAction = dbConnect()->prepare("UPDATE mail SET sender_trash=? WHERE id=?");
    if( $queryAction->execute([1,$id]) ){
    echo '<script>alert("Moved to Trash Successfully !!!");window.location="sent-mail"</script>';
    // header('location:jobs_posted');
}




?>