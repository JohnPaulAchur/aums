<?php
include 'connect.php';

if (isset($_SESSION['uemail']) === true) {
    if ($_SESSION['urole'] == "Admin") {
        echo "<script>window.location='dashboard'</script>";
    }else{
        echo "<script>window.location='home'</script>";
    }
}
?>