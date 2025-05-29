<?php include 'header.php'; ?>
<?php

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = dbConnect()->prepare("SELECT * FROM training_course WHERE id=?");
   $sql->execute([$id]);
   if ($sql->rowcount()>0) {
      
   }else {
      echo "<script>window.location='view_training_course'</script>";
   }
}else {
   echo "<script>window.location='view_training_course'</script>";
}

        $sql = dbConnect()->prepare("SELECT * FROM training_course");
        $sql->execute();
          while ($row = $sql->fetch()) {
              $id = $row['id'];
              $course_name = $row['course_name'];	
              $cost = $row['cost'];	
              $desc = $row['description'];	
              $created = $row['created'];	
          }

if (isset($_POST['submit'])) {
		
    $upcourse = check_input($_POST['upcourse']);
    $upcost = check_input($_POST['upcost']);
    $updesc = check_input($_POST['updesc']);
    $updated_on = date('H:i:s Y-m-d');
    $update_by = $_SESSION['ufirstname'].' '.$_SESSION['ulastname'];

    if (empty($upcourse) || empty($upcost) || empty($updesc)) {
        echo "<script>alert('There Is/Are Empty Input(s)!')</script>";
    }else {
      $check = dbConnect()->prepare("SELECT id, course_name FROM training_course WHERE course_name='$upcourse'");
      $check->execute();
      if ($check->rowcount()>0) {
         $joule=$check->fetch();
         $first = $joule['id'];
         $inp = $id <=> $first;
         if ($inp == 0) {
            $query = dbconnect()->prepare("UPDATE training_course SET course_name='$upcourse', cost='$upcost', description='$updesc', last_update='$updated_on', update_by='$username' WHERE id=?");
            if ($query->execute([$id])){
                $msg = "Update Successful!";
                echo "<script> alert('$msg'); window.location='view_training_course';</script>";
            }else{
                $msg = "Error Occured!!!";
                echo "<script> alert('$msg')</script>";
            }
         }else {
            echo "<script>alert('A course with this name already exists')</script>";
         }

      }else {
         $query = dbconnect()->prepare("UPDATE training_course SET course_name='$upcourse', cost='$upcost', description='$updesc', last_update='$updated_on', update_by='$username' WHERE id=?");
         if ($query->execute([$id])){
             $msg = "Update Successful!";
             echo "<script> alert('$msg'); window.location='view_training_course';</script>";
         }else{
             $msg = "Error Occured!!!";
             echo "<script> alert('$msg')</script>";
         }
      }
   }
}

?>


<div id="content-page" class="content-page">
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 col-lg-12">
         <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
               <div class="iq-header-title">
                  <h4 class="card-title">Update Training Course</h4>
               </div>
                  </div>
                  <form method="POST">
                  <div class="iq-card-body">
                  <div class="form-group">
                     <label for="Course Name">Course Name:</label>
                     <input name="upcourse" type="text" value="<?php echo $course_name ?>" class="form-control" >
                  </div>
                  <div class="form-group">
                     <label for="cost">Training Cost:</label>
                     <input name="upcost" type="text"  value="<?php echo $cost?>" class="form-control" >
                  </div>
                  <div class="form-group">
                     <label for="desc">Description:</label>
                     <textarea type="text" class="form-control" name="updesc" cols="30" rows="4"><?php echo $desc ?></textarea>
                  </div>
                  <button name="submit" type="submit" class="btn btn-primary" onclick ="return confirm('Are you sure you want to update course?')">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>





<?php include 'footer.php'; ?>