<?php include 'header.php'; ?>
<?php

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = dbConnect()->prepare("SELECT * FROM leave_category WHERE id=?");
   $sql->execute([$id]);
   if ($sql->rowcount()>0) {
      
   }else {
      echo "<script>window.location='view_leave_category'</script>";
   }
}else {
   echo "<script>window.location='view_leave_category'</script>";
}

        $sql = dbConnect()->prepare("SELECT * FROM leave_category");
        $sql->execute();
          while ($row = $sql->fetch()) {
              $id = $row['id'];
              $category = $row['category'];	
              $created = $row['created'];	
          }

if (isset($_POST['submit'])) {
		
    $upcategory = check_input($_POST['upcategory']);
    $updated_on = date('H:i:s Y-m-d');
    $update_by = $_SESSION['ufirstname'].' '.$_SESSION['ulastname'];

    if (empty($upcategory)) {
        echo "<script>alert('There Is/Are Empty Input(s)!')</script>";
    }else {
      $check = dbConnect()->prepare("SELECT id, category FROM leave_category WHERE category='$upcategeory'");
      $check->execute();
      if ($check->rowcount()>0) {
         $joule=$check->fetch();
         $first = $joule['id'];
         $inp = $id <=> $first;
         if ($inp == 0) {
            $query = dbconnect()->prepare("UPDATE leave_category SET category='$upcategeory' WHERE id=?");
            if ($query->execute([$id])){
                $msg = "Update Successful!";
                echo "<script> alert('$msg'); window.location='view_leave_category';</script>";
            }else{
                $msg = "Error Occured!!!";
                echo "<script> alert('$msg')</script>";
            }
         }else {
            echo "<script>alert('A Category With This Name Already Exists')</script>";
         }

      }else {
         $query = dbconnect()->prepare("UPDATE leave_category SET category='$upcategory' WHERE id=?");
         if ($query->execute([$id])){
             $msg = "Update Successful!";
             echo "<script> alert('$msg'); window.location='view_leave_category';</script>";
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
                  <h4 class="card-title">Update Leave Category</h4>
               </div>
                  </div>
                  <form method="POST">
                  <div class="iq-card-body">
                  <div class="form-group">
                     <label for="cost">Leave Category:</label>
                     <input name="upcategory" type="text"  value="<?php echo $category?>" class="form-control" id="title">
                  </div>
                  <button name="submit" type="submit" class="btn btn-primary" onclick ="return confirm('Are You Sure You Want To Update Category?')">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>





<?php include 'footer.php'; ?>