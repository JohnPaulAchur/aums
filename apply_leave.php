<?php include 'header.php'; ?>

<?php 

if (isset($_POST['submit'])) {
   $employee = $_SESSION['uemail'];
   $category = check_input($_POST['category']);
   $duration = check_input($_POST['duration']);
   $start_date = check_input($_POST['start_date']);
   // $end_date = check_input($_POST['end_date']);
   $status = check_input($_POST['status']);
   $desc = check_input($_POST['desc']);

   if (empty($category) || empty($duration) || empty($start_date) || empty($status) || empty($desc)) {
      echo "<script>alert('You Have Not Completed All Required Fields!')</script>";
   }else{

      $reg = dbconnect()->prepare("INSERT INTO leave_app(applicant,type,duration,start_date,status,note) VALUES(?,?,?,?,?,?)");
      $reg->execute([$employee,$category,$duration,$start_date,$status,$desc]);
      if($reg){
      echo "<script> alert('Success, Leave Application successful!');</script>";
      }
      else{
         echo "<script> alert ('Oops, Operation Failed !');</script>";
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
                     <h4 class="card-title">Apply For Leave</h4>
                  </div>
               </div>
               <div class="iq-card-body">
               <form method="POST">
                     <!-- <div class="form-group">
                        <label for="Employee">Employee:</label>
                        <select name="employee" class="form-control">
                           <option selected disabled> -- select Employee -- </option>
                           <?php
                              // $queryEMp = dbConnect()->prepare("SELECT * FROM employee");
                              // $queryEMp->execute();
                              // while($rowEmp=$queryEMp->fetch()){
                              //    $idEmp = $rowEmp['email'];
                              //    $username = $rowEmp['firstname'].' '.$rowEmp['lastname'];?>
                           <option class="text-dark" value="<?php //echo $idEmp; ?>"><?php //echo $username; ?></option>
                           <?php //} ?>
                        </select>
                     </div> -->
                     <div class="form-group">
                        <label for="LeaveCategory">Leave Category:</label>
                        <select name="category" class="form-control">
                           <option selected disabled> -- Select Leave Category -- </option>
                           <?php
                              $query = dbConnect()->prepare("SELECT * FROM leave_category");
                              $query->execute();
                              while($row=$query->fetch()){
                                 $category = $row['category'];?>
                           <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="duration">Duration</label>
                        <input name="duration" type="text" class="form-control" placeholder="Duration Of Leave">
                     </div>
                     <div class="form-group">
                        <label for="start date">Start Date</label>
                        <input name="start_date" type="date" class="form-control" placeholder="Start Date Of Leave">
                     </div>
                     <div class="form-group">
                        <label for="status">status</label>
                        <select name="status" type="text" class="form-control">
                              <option selected value="Pending">Pending</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="desc">Reason:</label>
                        <textarea  class="form-control" name="desc" cols="30" rows="4" ></textarea>
                     </div>
                     <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<?php include 'footer.php'; ?>