<?php 
include 'connect/connect.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = dbConnect()->prepare("SELECT * FROM jobs WHERE id=?");
    $sql->execute([$id]);
    if ($sql->rowcount()>0) {
       
    }else {
       echo "<script>window.location='jobs_posted'</script>";
    }
 }else {
    echo "<script>window.location='jobs_posted'</script>";
 }


if (isset($_POST['editbtn'])) {
    $title= $_POST['edTitle'];
    $designation = check_input($_POST['edDesignation']);
    $nature = check_input($_POST['edNature']);
    $age = check_input($_POST['edAge']);
    $salary = check_input($_POST['edSalary']);
    $exp = check_input($_POST['edExp']);
    $vacancy = check_input($_POST['edVacancy']);
    $cl_date = check_input($_POST['edCl_date']);
    $desc = check_input($_POST['edDesc']);
    
    if ( empty($title) || empty($designation) || empty($nature) || empty($age) || empty($salary) || empty($exp) || empty($vacancy) || empty($cl_date) || empty($desc) ) {
        echo '<script>alert("All Fields Required!!!");window.location="jobs_posted"</script>';
    }else{

    $queryAction = dbConnect()->prepare("UPDATE jobs SET title=?, nature=?, experience=?, age=?, close_date=?, description=?, salary=?, vacancy=?, type=? WHERE id=?");
    if( $queryAction->execute([$title,$nature,$exp,$age,$cl_date,$desc,$salary,$vacancy,$designation,$id]) ){
    echo '<script>alert("Update Successful !!!");window.location="jobs_posted"</script>';
    // header('location:jobs_posted');
}

    // $msg = '<p style="color:red;">Update Successful !!!</p>';
    // echo '<script>window.location="jobs_posted"</script>';
    
    

    
}
   

}



?>