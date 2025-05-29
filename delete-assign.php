<?php
include 'connect/connect.php';


if (isset($_GET['id'])) {
    $empId = $_GET['id'];
    $comId = $_GET['company'];

}


$query = dbConnect()->prepare("DELETE FROM company_assign WHERE company_id=? AND employee_id=?");
if( $query->execute([$comId,$empId]) ){
    echo '<script>alert("Employee Removed Successfully "); window.location="company-details?id='. $comId .'"</script>';
}else{

}






?>