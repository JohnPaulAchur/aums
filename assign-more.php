<?php include 'header.php'; 


$id = $_GET['id'];
$queryG = dbConnect()->prepare('SELECT * from company_tbl WHERE id=?');
$queryG->execute([$id]); 
$rowG = $queryG->fetch(); 
$companyName = $rowG['company_name'];



if (isset($_POST['submit'])) {
    $created = date('Y-m-d');
    $employeeId = $_POST['empid'];
     if(empty($employeeId)){
        echo "<script>alert('Please Select Atleast One Person'); </script>";

     }else{

            foreach ($employeeId as $i => $item) {
                $insMembers = dbConnect()->prepare("INSERT INTO company_assign SET employee_id=?, company_id=?, created=?, created_by=?");
                $insMembers->execute([$employeeId[$i],$id,$created,$uid]);
    
            }
            
            echo "<script>alert('Employee Assigned Successfully'); window.location='company-details?id=".$id."'; </script>";
            
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
                              <h4 class="card-title"><i class="fa fa-plus text-primary"></i> Assign More Employee</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam nibh finibus leo</p> -->
                           <form method="POST">
                              <div class="form-group">
                                 <!-- <label for="email"></label> -->
                                 <!-- <input type="text" readonly name="group" value="<?php echo $companyName; ?>" class="form-control"> -->
                                 <h4>company Name: <?php echo $companyName; ?></h4>
                              </div>

                             
                                <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h6 class="card-title">Select Employees To Assign</h6>
                                </div>
                                </div>
                                <div class="iq-card-body">
                                <table id="example" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Img</th>
                                            <th scope="col">Employee No.</th>
                                            <th scope="col">Employees</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>

                                    <form method="POST">
                                    <?php

                                   

                              
                                $fetching = dbConnect()->prepare("SELECT * FROM employee WHERE id NOT IN (SELECT employee_id FROM company_assign)");
                                $fetching->execute([$id]);
                                // if($fetching->rowCount() > 0){

                                
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
                            // }
                            // else{
                            //     echo '<td>All Employee Already In Group</td>';
                            // }
                                ?>
                                 </form>
                                </tbody>
                                </table>
                             </div>
                          </div>

                          
                              <!-- <div class="form-group">
                                 <label for="pwd">Password:</label>
                                 <input type="password" class="form-control" id="pwd">
                              </div> -->
                              <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                              <!-- <button type="submit" class="btn iq-bg-danger">cancle</button> -->
                           </form>
                        </div>
                     </div>
                    </div>
            </div>
         </div>
</div>















<?php include 'footer.php'; ?>