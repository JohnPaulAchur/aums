<?php include 'header.php';?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = dbConnect()->prepare("SELECT * FROM department WHERE id=?");
      $sql->execute([$id]);
      if ($sql->rowcount()>0) {
         
      }else {
         echo "<script>window.location='department'</script>";
      }
}else {
    echo "<script>window.location='department'</script>";
}

    $update = $insert = dbConnect()->prepare("SELECT * FROM department WHERE id=?");
    $update->execute([$id]);
    $rpd = $update->fetch();
    $deptname = $rpd['dept_name'];
    $hod = $rpd['hod'];
    $ret_id = $rpd['id'];
?>


<?php

    $fullname = $_SESSION['ufirstname'].' '.$_SESSION['ulastname'];
    if (isset($_POST['submit'])) {

        $depart = check_input($_POST['deptname']);
        $date = date('h-m-s Y-m-d');
        $select = check_input($_POST['selecthod']);

        if (empty($depart)) {
            echo "<script>alert('Department name is required')</script>";
         // }elseif(empty($selecthod)) {
         //    $selecthod = check_input($_POST['curhod']);
         }else {
            if (empty($select)) {
               $selecthod = check_input($_POST['curhod']);
            }else {
               $selecthod = check_input($_POST['selecthod']);
            }
            $check = dbConnect()->prepare("SELECT id, dept_name FROM department WHERE dept_name='$depart'");
            $check->execute();
            
            
            if ($check->rowcount()>0) {

               $joule=$check->fetch();
               $first = $joule['id'];
               $inp = $id <=> $first;
                  if ($inp == 0) {
                     echo "<script>alert('$id $first')</script>";
                     $fin = dbConnect()->prepare("UPDATE department
                        SET dept_name='$depart',
                        hod = '$selecthod',
                        last_update = '$date',
                        update_by = '$fullname'
                        WHERE id=?
                        ");
                        $fin->execute([$id]);
                        if ($fin) {
                           echo "<script>alert('Success, department updated successfcvvxcx   ully!!');window.location='department'</script>";
                        }else {
                           echo "<script>alert('Failed, department could not update!!')</script>";//;window.location='update_department?id=$id'
                        }
                  }else {
                     echo "<script>alert('A department with this name already exists!!')</script>";//;window.location='update_department?id=$id'
                  }

               
            }else {
               $fin = dbConnect()->prepare("UPDATE department
                  SET dept_name='$depart',
                  hod = '$selecthod',
                  last_update = '$date',
                  update_by = '$fullname'
                  WHERE id=?
                  ");
                  $fin->execute([$id]);
                  if ($fin) {
                     echo "<script>alert('Success, department updated successfully!!');window.location='department'</script>";
                  }else {
                     echo "<script>alert('dddddd, department could not update!!')</script>";//;window.location='update_department?id=$id'
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
                                 <h4 class="card-title">Update Department Form</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <p>Update department. <br><b>Note : </b>Do not select H.O.D if you do not wish to change.</p>
                              <form method="POST">
                                 <div class="form-group">
                                    <label for="deptname">Department Name:</label>
                                    <input name="deptname" type="text"  value="<?php echo $deptname?>" class="form-control" id="deptname" placeholder="Enter desired department name...">
                                 </div>
                                 <div class="form-group">
                                    <label for="deptname">Current H.O.D:</label>
                                    <input type="text" class="form-control" name="curhod" value="<?php echo $hod?>" readonly>
                                 </div>
                                 <div class="form-group">
                                    <label for="pwd">Head of Department(H.O.D):</label>
                                    <select name="selecthod" class="form-control">
                                       <option selected value=""> -- select -- </option>
                                       <option value="Mr. Akinwole Oyenusi">Mr. Akinwole Oyenusi</option>
                                       <option value="Mr. Buju Benson">Mr. Buju Benson</option>
                                       <option value="Comrade John Paul">Comrade John Paul</option>
                                    </select>
                                 </div>
                                 <button type="submit" name="submit" class="btn btn-primary" onclick ="return confirm('Are you sure you want to update department?')">Update</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
    </div>
<?php include 'footer.php';?>