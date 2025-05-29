<?php include 'header.php'; ?>

<?php 

if (isset($_POST['submit'])) {
   $course_name = check_input($_POST['course_name']);
   $cost = check_input($_POST['cost']);
   $desc = check_input($_POST['desc']);
   $vendor = check_input($_POST['vendor']);
   $last_update = date('h-m-s Y-m-d');
   $created = date('Y-m-d');
   $update_by = $_SESSION['ufirstname'].' '.$_SESSION['ulastname'];

   if (empty($course_name)  || empty($cost) || empty($desc) || empty($vendor)) {
      echo "<script>alert('You Have Not Completed All Required Fields!')</script>";
   }else{

      $reg = dbconnect()->prepare("INSERT INTO training_course(course_name, cost, description, vendor,last_update, update_by, created) VALUES(?,?,?,?,?,?,?)");
      $reg->execute([$course_name,$cost,$desc,$vendor,$last_update,$update_by,$created]);
      if($reg){
      echo "<script> alert('Success, Course created successfully!');</script>";
      }
      else{
         echo "<script> alert ('Oops, Operation Failed !');</script>";
         }

      // $sql = dbconnect()->prepare("SELECT * FROM training_course WHERE course_name=?");
      // $sql->execute([$course_name]);
      // if($sql->rowcount() > 0){
      //    echo "<script> alert('Course Already Exists!');</script>";
      // }else{
      //    $reg = dbconnect()->prepare("INSERT INTO training_course(course_name, cost, description, vendor,last_update, update_by) VALUES(?,?,?,?,?,?)");
      //    $reg->execute([$course_name,$cost,$desc,$vendor,$last_update,$update_by]);
      //    if($reg){
      //    echo "<script> alert('Success, Course created successfully!');</script>";
      //    }
      //    else{
      //       echo "<script> alert ('Oops, Operation Failed !');</script>";
      //       }
      // }
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
                  <h4 class="card-title">Add Training Course</h4>
               </div>
                  </div>
                  <form method="POST">
                  <div class="iq-card-body">
                  <div class="form-group">
                     <label for="Course Name">Course Name:</label>
                     <input name="course_name" type="text" class="form-control"  placeholder="Enter Course Name...">
                  </div>
                  <div class="form-group">
                     <label for="vendor">Vendor:</label>
                     <!-- <input name="cost" type="text" class="form-control" id="title" placeholder="Training Cost($)"> -->
                     <select name="vendor" class="form-control">
                        <option selected disabled> -- select vendor -- </option>
                        <?php
                           $query = dbConnect()->prepare("SELECT * FROM vendor");
                           $query->execute();
                           while($row=$query->fetch()){
                              $id = $row['id'];
                              $vendorname = $row['vendor'];?>
                          <option value="<?php echo $vendorname; ?>"><?php echo $vendorname; ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="cost">Training Cost:</label>
                     <input name="cost" type="text" class="form-control"  placeholder="Training Cost($)">
                  </div>
                  <div class="form-group">
                     <label for="desc">Descripton:</label>
                     <textarea  class="form-control" name="desc" cols="30" rows="4" placeholder="Description Of The Course Here"></textarea>
                  </div>
                  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>



<?php include 'footer.php'; ?>