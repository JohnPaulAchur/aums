<?php include 'connect/connect.php'?>
<?php

session_unset();
session_destroy();
echo "<script>window.location='index';</script>";


?>