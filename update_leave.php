<?php include 'header.php'; ?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = dbConnect()->prepare("SELECT * FROM leave_app WHERE id=?");
    $sql->execute([$id]);
    if ($sql->rowcount()>0) {
       
    }else {
       echo "<script>window.location='view_leave'</script>";
    }
 }else {
    echo "<script>window.location='view_leave'</script>";
 }

        $sql = dbConnect()->prepare("SELECT * FROM leave_app");
        $sql->execute();
          while ($row = $sql->fetch()) {
              $id = $row['id'];
              $id = $row['id'];
              $employee = $row['employee'];	
              $category = $row['category'];	
              $duration = $row['duration'];
              $start_date = $row['start_date'];
              $end_date = $row['end_date'];
              $status = $row['status'];
              $desc = $row['description'];
              $update = $row['updated_on'];
              $created = $row['created'];	
          }

if (isset($_POST['submit'])) {
    $upemployee = check_input($_POST['upemployee']);
    $upcategory = check_input($_POST['upcategory']);
    $upduration = check_input($_POST['upduration']);
    $upstart_date = check_input($_POST['upstart_date']);
    $upend_date = check_input($_POST['upend_date']);
    $upstatus = check_input($_POST['upstatus']);
    $updesc = check_input($_POST['updesc']);
    $updated_on =  date('Y-m-d H:i:s');

    if  (empty($upemployee) || empty($upcategory) || empty($upduration) || empty($upstart_date) || empty($upend_date) || empty($upstatus) || empty($updesc)) {
        echo "<script>alert('There Is/Are Empty Input(s)!')</script>";
    }else {
        $query = dbconnect()->prepare("UPDATE leave_app SET employee='$upemployee',category='$upcategory',duration='$upduration',start_date='$upstart_date', end_date='$upend_date', status='$upstatus', description='$updesc', updated_on='$updated_on' WHERE id=?");
            if ($query->execute([$id])){
                $msg = "Update Successful!";
                echo "<script> alert('$msg'); window.location='view_leave';</script>";
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
                  <h4 class="card-title">Update Leave Record</h4>
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
                                 <label for="category">Category:</label>
                                 <select name="upcategory" class="form-control">
                                 <option>Select...</option>
                                 <?php

                                  $query1 = dbConnect()->prepare("SELECT * FROM leave_category");
                                  $query1->execute();
                                  while($row=$query1->fetch()){
                                     $id = $row['id'];
                                     $category = $row['category'];

                                  }
                                 ?>
                                 <option value="<?php echo $category ?>"><?php echo $category ?></option>
                                 </select>
                              </div>
                                            <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input name="upduration" type="text" value="<?php echo $duration ?>"class="form-control" id="title" placeholder="Duration Of Leave">
                                </div>
                                <div class="form-group">
                                    <label for="start date">Start Date</label>
                                    <input name="upstart_date" type="date" class="form-control" id="title" placeholder="Start Date Of Leave">
                                </div>
                                <div class="form-group">
                                    <label for="End Date">End Date</label>
                                    <input name="upend_date" type="date" class="form-control" id="title" placeholder="End Date Of Leave">
                                </div>
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <select name="upstatus" type="text" class="form-control">
                                        <option value=""> --Select-- </option>
                                        <option value="Testing">Testing</option>
                                        <option value="Testing 2">Testing 2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description:</label>
                                    <textarea  class="form-control" name="updesc" cols="30" rows="4" placeholder="Description Of The Course Here"><?php echo $desc ?></textarea>
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