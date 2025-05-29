<?php include 'header.php';?>
<?php
    $firstname = $_SESSION['ufirstname'];
    $lastname = $_SESSION['ulastname'];
   if (isset($_POST['submit'])) {
      $deptname = check_input($_POST['deptname']);
      $hod = check_input($_POST['selecthod']);
      $last_update = date('h-m-s Y-m-d');
      $fullname = $firstname.' '.$lastname;
      $created = date('Y-m-d');

      if (empty($deptname) || empty($hod)) {
         echo "<script>alert('Please fill in all inputs')</script>";
      }else {
         $check = dbConnect()->prepare("SELECT dept_name FROM department WHERE dept_name='$deptname'");
         $check->execute();
         if ($check->rowcount()>0) {
            echo "<script>alert('Department name already exists')</script>";
         }else {
         
            $insert = dbConnect()->prepare("INSERT INTO department(dept_name, hod, last_update, update_by, created) VALUES(?,?,?,?,?)");
            $insert->execute([$deptname,$hod,$last_update,$fullname,$created]);
            if ($insert) {
               echo "<script>alert('Department Created Successfully')</script>";
            }else {
               echo "<script>alert('Oops operation failed, please try again')</script>";
            }
         }

      }
   }

?>


         <div id="content-page" class="content-page">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Monthly Payroll List</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <div class="table-responsive">
                                    <div class="row justify-content-between">
                                       <div class="col-sm-12 col-md-6">
                                          <div id="user_list_datatable_info" class="dataTables_filter">
                                             <form class="mr-3 position-relative">
                                                <div class="form-group mb-0">
                                                   <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-6">
                                          <div class="user-list-files d-flex float-right">
                                             <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                Add New
                                             </button> -->



                                             <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                   <div class="modal-content">
                                                   <div class="iq-card">
                                                      <div class="iq-card-header d-flex justify-content-between">
                                                         <div class="iq-header-title">
                                                            <h4 class="card-title">Add Department Form</h4>
                                                         </div>
                                                      </div>
                                                      <div class="iq-card-body">
                                                         <form method="POST">
                                                            <div class="form-group">
                                                               <label for="deptname">Department Name:</label>
                                                               <input name="deptname" type="text" class="form-control" id="deptname">
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
                                                            <button type="submit" name="submit" class="btn btn-primary">Create</button>
                                                         </form>
                                                      </div>
                                                   </div>
                                                   </div>
                                                </div>
                                             </div> -->





                                          </div>
                                       </div>
                                    </div>
                                    <table id="example" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                       <thead>
                                       <tr>
                                            <th scope="col">Emp No.</th>
                                            <th scope="col">Emp Name</th>
                                            <!-- <th scope="col">Salary Grade</th> -->
                                            <th scope="col">Basic Salary(₦)</th>
                                            <th scope="col">tax(₦)</th>
                                            <th scope="col">Due Salary(₦)</th>
                                            <th scope="col">status</th>
                                            <th scope="col"></th>
                                        </tr>
                                       </thead>
                                       <tbody style="font-size: 12px;">
                                       <?php
                                       
                                       $querySal = dbConnect()->prepare("SELECT * FROM payment_activity, employee WHERE payment_activity.employee_id = employee.emp_id");
                                       $querySal->execute();
                                       $rowSal = $querySal->fetch();
                                       // to get salary grade and salary
                                    //    $gradeId = $rowSal['id'];
                                    //    $grade = $rowSal['salary_grade'];
                                    //    $salary = $rowSal['salary'];
                                          $code = $rowSal['code'];
                                          $n = 0;
                                          while ($rowSal = $querySal->fetch()) {
                                             $n++;
                                             ?>
                                               <tr>
                                                <td><input class="border-0" readonly type="text" style="width: 90px;" value="<?php echo $rowSal['emp_id'] ?>"> </td>
                                                <td><input class="border-0" readonly type="text" style="width: 90px;" value="<?php echo $rowSal['firstname'].''.$rowSal['lastname']; ?>"> </td>
                                                <!-- <td><input class="border-0" readonly type="text" style="width: 90px;" value="<?php //  echo $grade; ?>"> </td> -->
                                                <td><input class="border-0" readonly type="text" style="width: 90px;" value="<?php echo $rowSal['basic']; ?>"> </td>
                                                <td><input class="border-0" readonly type="text" style="width: 90px;" value="<?php echo $rowSal['deduction']; ?>"> </td>
                                                <td><input class="border-0" readonly type="text" style="width: 90px;" value="<?php echo $rowSal['net']; ?>"> </td>
                                                <td><span class="badge badge-danger">Unpaid</span></td>
                                                <td><a href="payslip?code=<?php echo $code?>" class="badge badge-info">Payslip</a></td>
                                            </tr>
                                       <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                                    <!-- <div class="row justify-content-between mt-3">
                                       <div id="user-list-page-info" class="col-md-6">
                                          <span>Showing 1 to 5 of 5 entries</span>
                                       </div>
                                       <div class="col-md-6">
                                          <nav aria-label="Page navigation example">
                                             <ul class="pagination justify-content-end mb-0">
                                                <li class="page-item disabled">
                                                   <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                   <a class="page-link" href="#">Next</a>
                                                </li>
                                             </ul>
                                          </nav>
                                       </div>
                                    </div> -->
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </div>
        </div
<?php include 'footer.php';?>