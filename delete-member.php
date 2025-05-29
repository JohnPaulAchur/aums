<?php
include 'connect/connect.php';


if (isset($_GET['id'])) {
    $empId = $_GET['id'];
    $groupId = $_GET['group'];

}


$query = dbConnect()->prepare("DELETE FROM group_members WHERE group_id=? AND employee_id=?");
if( $query->execute([$groupId,$empId]) ){
    echo '<script>alert("Member Removed Successfully "); window.location="group-members?id='. $groupId .'"</script>';
}else{

}






?>