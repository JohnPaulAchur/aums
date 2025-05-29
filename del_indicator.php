<?php
include 'connect/connect.php';

if (isset($_GET['id'])  && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    // echo "<script>alert('$id, $type')</script>";
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    $sql = dbConnect()->prepare("SELECT * FROM indicator WHERE id=? AND type=?");
    $sql->execute([$id,$type]);
   if ($sql->rowcount()>0) {
      
   }else {
      echo "<script>window.location='list_indicators'</script>";
   }
}else {
   echo "<script>window.location='list_indicators'</script>";
}



if ($type=='Behavioural') {
    $delSqlB = dbConnect()->prepare("DELETE FROM indicator WHERE id=? AND type=?");
    $delSqlB->execute([$id,$type]);
    if ($delSqlB) {
        echo "<script>alert('Behavioural indicator deleted Successfully');window.location='list_indicators'</script>";
    }else {
        echo "<script>alert('Error, Please try deleting again!!!');window.location='list_indicators'</script>";
    }
}elseif($type=='Technical') {
    $delSqlT = dbConnect()->prepare("DELETE FROM indicator WHERE id=? AND type=?");
    $delSqlT->execute([$id,$type]);
    if ($delSqlT) {
        echo "<script>alert('Technical indicator deleted Successfully');window.location='list_indicators'</script>";
    }else {
        echo "<script>alert('Error, Please try deleting again!!!');window.location='list_indicators'</script>";
    }
}else {
    echo "<script>alert('Error, Please try deleting again!!!');window.location='list_indicators'</script>";
}


?>