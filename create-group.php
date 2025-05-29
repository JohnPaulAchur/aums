<?php include 'header.php'; 


if (isset($_POST['next'])) {
    
    $group = check_input($_POST['group']);
    if (empty($group)) {
        echo '<script>alert("Please Input Group Name ")</script>';
    }else{
        header('location:?id='.$group);
    }
    
}


if (isset($_POST['submit'])) {
    $created = date('Y-m-d');
    $group = check_input($_POST['group']);
    $employeeId = $_POST['empid'];
    if (empty($employeeId)) {
        echo '<script>alert("Please Select Members "); window.location="create-group"</script>';
    }elseif(empty($group)){
      echo '<script>alert("Group Name is Required ")</script>';
    }else{
       // var_dump($employeeId);
        $query = dbConnect()->prepare('INSERT INTO group_tbl SET group_name=?,created=?');
        if( $query->execute([$group,$created]) ){

            $queryF = dbConnect()->prepare('SELECT * from group_tbl WHERE id=(SELECT MAX(id) FROM `group_tbl`)');
            $queryF->execute(); 
            $rowF = $queryF->fetch(); 
            $groupId = $rowF['id'];

            foreach ($employeeId as $i => $item) {
                $insMembers = dbConnect()->prepare("INSERT INTO group_members SET employee_id=?, group_id=?, created=?, created_by=?");
                $insMembers->execute([$employeeId[$i],$groupId,$created,$uid]);
    
            }
            
            echo "<script>alert('Group Created Successfully'); window.location='group-list'; </script>";
            
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
                              <h4 class="card-title"><i class="fa fa-group"></i> Create Group</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam nibh finibus leo</p> -->
                           <form method="POST">
                              <div class="form-group">
                                 <label for="email">Group Name:</label>
                                 <input type="text" name="group" value="<?php echo (isset($_GET['id']) ? $_GET['id'] : '') ?>" class="form-control">
                              </div>

                              <?php
                              
                              if (isset($_GET['id'])) {
                                $fetching = dbConnect()->prepare("SELECT * FROM employee");
                                $fetching->execute();

                                echo '
                                <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Select Memebers</h4>
                                </div>
                                </div>
                                <div class="iq-card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Img.</th>
                                            <th scope="col">Employee No.</th>
                                            <th scope="col">Employees</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>

                                    <form method="POST">
                                ';
                                // $n = 0;

                                while ($route=$fetching->fetch()) {
                                //    $n++;
                                   $employid = $route['id'];
                                   $employName = $route['firstname'] .' '. $route['lastname'];
                                   $employNo = $route['emp_id'];
                                //    $employ = $route['id'];
                                   ?>
                                    
                                 
                              <tbody>
                                 <tr>
                                
                                    <td><a href="uploads/employee/<?php echo $route['emp_img'] ?>"><img style="width: 35px; height: 35px; border-radius: 10px;" src="uploads/employee/<?php echo $route['emp_img'] ?>" alt="" srcset=""></a></td>
                                    <td><?php echo $employNo; ?></td>
                                    <td><?php echo $employName; ?></td>
                                    <td>
                                        <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                            <input type="checkbox" name="empid[]" value="<?php echo $employid ?>" class="custom-control-input bg-success" id="customCheck-2<?php echo $employid ?>" >
                                            <label class="custom-control-label" for="customCheck-2<?php echo $employid ?>">Select</label>
                                        </div>
                                    </td>
                                   
                                 </tr>

                              
                                   <?php
                                }
                                ?>
                                 </form>
                                </tbody>
                                </table>
                             </div>
                          </div>

                            <?php
                            }
                               
                              ?>
                              <!-- <div class="form-group">
                                 <label for="pwd">Password:</label>
                                 <input type="password" class="form-control" id="pwd">
                              </div> -->
                              <input type="submit" name="<?php echo (isset($_GET['id']) ? 'submit' : 'next') ?>" value="<?php echo (isset($_GET['id']) ? 'Submit' : 'Next') ?>" class="btn btn-primary">
                              <!-- <button type="submit" class="btn iq-bg-danger">cancle</button> -->
                           </form>
                        </div>
                     </div>
                    </div>
            </div>
         </div>
</div>















<?php include 'footer.php'; ?>