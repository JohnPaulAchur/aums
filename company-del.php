<?php
include 'connect/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
    

$queryUp = dbConnect()->prepare("DELETE FROM company_tbl WHERE id=?");
if( $queryUp->execute([$id]) ){
    $queryUp2 = dbConnect()->prepare("DELETE FROM company_assign WHERE company_id=?");
    if( $queryUp2->execute([$id]) ){
        echo '<script>alert("Company Deleted Successfully !!!"); window.location="company-list"</script>';
        }else{
        echo '<script>alert("Oops, Error Occurred !!!"); window.location="company-list"</script>';
        }
    }
?>