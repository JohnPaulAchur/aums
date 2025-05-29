<?php
include 'connect/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
    

if (isset($_POST['edsubmit'])) {
    $gname = $_POST['edgroup'];
    if (empty($gname)) {
        echo '<script>alert("Field Can\'t Be Empty "); window.location="group-list"</script>';
    }else{
        $queryUp = dbConnect()->prepare("UPDATE group_tbl SET group_name=? WHERE id=?");
        if( $queryUp->execute([$gname,$id]) ){
        echo '<script>alert("Update Successful !!!"); window.location="group-list"</script>';
        }else{
        echo '<script>alert("Oops, Error Occurred !!!"); window.location="group-list"</script>';
        }
    }
}

?>