<?php include 'header.php'; ?>
<?php

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = dbConnect()->prepare("SELECT * FROM complaint_type WHERE id=?");
   $sql->execute([$id]);
   if ($sql->rowcount()>0) {
      
   }else {
      echo "<script>window.location='view_complaint_type'</script>";
   }
}else {
   echo "<script>window.location='view_complaint_type'</script>";
}

        $sql = dbConnect()->prepare("SELECT * FROM complaint_type");
        $sql->execute();
          while ($row = $sql->fetch()) {
              $id = $row['id'];
              $type = $row['type'];	
              $created = $row['created'];	
          }

if (isset($_POST['submit'])) {
		
    $uptype = check_input($_POST['uptype']);

    if (empty($uptype)) {
        echo "<script>alert('There Is/Are Empty Input(s)!')</script>";
    }else {
      $check = dbConnect()->prepare("SELECT id, type FROM complaint_type WHERE type='$uptype'");
      $check->execute();
    //   if ($check->rowcount()>0) {
    //      $joule=$check->fetch();
    //      $first = $joule['id'];
    //      $inp = $id <=> $first;
    //      if ($inp == 0) {
            // $query = dbconnect()->prepare("UPDATE complaint_type SET type='$uptype' WHERE id=?");
            // if ($query->execute([$id])){
            //     $msg = "Update Successful!";
            //     echo "<script> alert('$msg'); window.location='view_complaint_type';</script>";
            // }else{
            //     $msg = "Error Occured!!!";
            //     echo "<script> alert('$msg')</script>";
            // }
        //  }else {
        //     echo "<script>alert('This Complaint Type Already Exists')</script>";
        //  }

    //   }else {
         $query = dbconnect()->prepare("UPDATE complaint_type SET type='$uptype' WHERE id=?");
         if ($query->execute([$id])){
             $msg = "Update Successful!";
             echo "<script> alert('$msg'); window.location='view_complaint_type';</script>";
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
                  <h4 class="card-title">Update Complaint Type</h4>
               </div>
                  </div>
                  <form method="POST">
                  <div class="iq-card-body">
                  <div class="form-group">
                     <label for="Complaint Type">Complaint Type</label>
                     <input name="uptype" type="text" value="<?php echo $type ?>" class="form-control" id="title">
                  </div>
                  <button name="submit" type="submit" class="btn btn-primary" onclick ="return confirm('Are You Sure You Want To Update Complaint type?')">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>





<?php include 'footer.php'; ?>