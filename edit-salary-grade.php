<?php 
include 'connect/connect.php';


    $id = $_GET['id'];


    // $msg = "";
    if (isset($_POST['editSubmit'])) {
        $editGrade = check_input($_POST['editGrade']);
        

        // $created = date('Y-m-d');
        if ( empty($editGrade) ) {
        // $msg = '<p style="color:red;">Not Added , All Fields Are Required !!!</p>';
        echo '<script>alert("Not Added , All Fields Are Required  !!!");window.location="employee-salary"</script>';
        }else{

            $queryAction = dbConnect()->prepare("UPDATE employee SET salary_id=? WHERE id=?");
            if( $queryAction->execute([$editGrade,$id]) ){
            echo '<script>alert("Update Successful !!!");window.location="employee-salary"</script>';
            // header('location:jobs_posted');
            }

    // $msg = '<p style="color:red;">Update Successful !!!</p>';
    // echo '<script>window.location="jobs_posted"</script>';
    
    

            
        }
        

}

