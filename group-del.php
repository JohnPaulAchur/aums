<?php
include 'connect/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
    

$queryUp = dbConnect()->prepare("DELETE FROM group_tbl WHERE id=?");
if( $queryUp->execute([$id]) ){
    $queryUp2 = dbConnect()->prepare("DELETE FROM group_members WHERE group_id=?");
    if( $queryUp2->execute([$id]) ){
        echo '<script>alert("Group Deleted Successfully !!!"); window.location="group-list"</script>';
        }else{
        echo '<script>alert("Oops, Error Occurred !!!"); window.location="group-list"</script>';
        }
    }
?>