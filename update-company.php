<?php
include 'connect/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
    

if (isset($_POST['edsubmit'])) {
    $cname = check_input($_POST['edcompany']);
    $address = check_input($_POST['address']);
    $email = check_input($_POST['email']);
    $oldemail = check_input($_POST['oldemail']);
    $phone = check_input($_POST['phone']);
    $fname = check_input($_POST['fname']);
    $lname = check_input($_POST['lname']);
    if (empty($cname) || empty($phone) || empty($email) || empty($address) || empty($fname) || empty($lname) ) {
        echo '<script>alert("Fields Can\'t Be Empty "); window.location="company-list"</script>';
    }else{
        $queryUp = dbConnect()->prepare("UPDATE company_tbl SET company_name=?,address=?,email=?,phone=?,fname=?,lname=? WHERE id=?");
        if( $queryUp->execute([$cname,$address,$email,$phone,$fname,$lname,$id]) ){
            $queryUsr = dbConnect()->prepare("UPDATE users SET email=? WHERE email=?");
            $queryUsr->execute([$email,$oldemail]);
        echo '<script>alert("Update Successful !!!"); window.location="company-list"</script>';
        }else{
        echo '<script>alert("Oops, Error Occurred !!!"); window.location="company-list"</script>';
        }
    }
}

?>