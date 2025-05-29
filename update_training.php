<?php include 'header.php'; ?>
<?php include 'connect/connect.php'; ?>
<?php

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = dbConnect()->prepare("SELECT * FROM training WHERE id=?");
   $sql->execute([$id]);
   if ($sql->rowcount()>0) {
      
   }else {
      echo "<script>window.location='view_training'</script>";
   }
}else {
   echo "<script>window.location='view_training'</script>";
}

        $sql = dbConnect()->prepare("SELECT * FROM training");
        $sql->execute();
          while ($row = $sql->fetch()) {
              $id = $row['id'];
              $employee = $row['employee'];	
              $course = $row['course'];	
              $vendor = $row['vendor'];	
              $cost = $row['cost'];	
              $start_date = $row['start_date'];	
              $finish_date = $row['finish_date'];	
              $status = $row['status'];	
              $performance = $row['performance'];	
              $desc = $row['remarks'];	
              $created = $row['created_on'];	
          }

if (isset($_POST['submit'])) {
    $upemployee = check_input($_POST['upemployee']);
    $upcourse = check_input($_POST['upcourse']);
    $upvendor = check_input($_POST['upvendor']);
    $upcost = check_input($_POST['upcost']);
    $upstart_date = check_input($_POST['upstart_date']);
    $upfinish_date = check_input($_POST['upfinish_date']);
    $upstatus = check_input($_POST['upstatus']);
    $upperformance = check_input($_POST['upperformance']);
    $updesc = check_input($_POST['updesc']);
    $updated_on =  date('Y-m-d H:i:s');

    if  (empty($upemployee) || empty($upcourse) || empty($upvendor)  ||  empty($upcost) || empty($upstart_date) || empty($upfinish_date) || empty($upstatus) || empty($upperformance) || empty($updesc)) {
        echo "<script>alert('There Is/Are Empty Input(s)!')</script>";
    }else {
        $query = dbconnect()->prepare("UPDATE training SET employee='$upemployee',course='$upcourse',vendor='$upvendor',cost='$upcost',start_date='$upstart_date', finish_date='$upfinish_date', status='$upstatus', remarks='$updesc', performance='$upperformance', updated_on='$updated_on' WHERE id=?");
            if ($query->execute([$id])){
                $msg = "Update Successful!";
                echo "<script> alert('$msg'); window.location='view_training';</script>";
            }else{
                $msg = "Error Occured!!!";
                echo "<script> alert('$msg')</script>";
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
                  <h4 class="card-title">Update Training</h4>
               </div>
                  </div>
                  <div class="iq-card-body">
                  <form method="POST">
                  <div class="form-group">
                                 <label for="Employee">Employee:</label>
                                 <select name="upemployee" class="form-control">
                                 <option>Select...</option>
                                <?php
                                
                                 $query = dbConnect()->prepare("SELECT * FROM employee");
                                 $query->execute();
                                 while($row=$query->fetch()){
                                    $id = $row['id'];
                                    $username = $row['fname'] .' '. $row['lname'];

                                 }
                                ?>
                                <option value="<?php echo $username; ?>"><?php echo $username; ?></option>
                                 </select>
                              <div class="form-group">
                                 <label for="Course">Courses:</label>
                                 <select name="upcourse" class="form-control">
                                 <option>Select...</option>
                                 <?php

                                  $query1 = dbConnect()->prepare("SELECT * FROM training_course");
                                  $query1->execute();
                                  while($row=$query1->fetch()){
                                     $id = $row['id'];
                                     $course_name = $row['course_name'];

                                  }
                                 ?>
                                 <option value="<?php echo $course_name ?>"><?php echo $course_name ?></option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="Vendor">Vendor:</label>
                                 <select name="upvendor" class="form-control">
                                 <option>Select</option>
                                 <option value="Dapo">Dapo</option>
                                 <option value="Caleb">Caleb</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="cost">Training Cost:</label>
                                 <select name="upcost" class="form-control">
                                 <option>Select</option>
                                 <option value="Dapo">Dapo</option>
                                 <option value="Caleb">Caleb</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="Start_date">Start Date:</label>
                                 <input name="upstart_date" type="date" class="form-control" id="closedate">
                              </div>
                              <div class="form-group">
                                 <label for="Finish_date">Finish Date:</label>
                                 <input name="upfinish_date" type="date" class="form-control" id="closedate">
                              </div>
                              <div class="form-group">
                                 <label for="status">Status:</label>
                                 <select name="upstatus" class="form-control">
                                    <option selected disabled> -- select -- </option>
                                    <option value="Lobbist">Lobbist</option>
                                    <option value="Front Desk">Front Desk</option>
                                    <option value="Security">Security</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="performance">Performance:</label>
                                 <select name="upperformance"  class="form-control">
                                    <option selected disabled> -- select -- </option>
                                    <option value="Lobbist">Lobbist</option>
                                    <option value="Front Desk">Front Desk</option>
                                    <option value="Security">Security</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="remarks">Remarks:</label>
                                 <textarea  class="form-control" name="updesc" cols="30" rows="4"></textarea>
                              </div>
                              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                    </div>
              </div>
         </div>
      </div>
   </div>
</div>






<?php include 'footer.php'; ?>