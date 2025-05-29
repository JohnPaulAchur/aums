<?php include 'header.php' ?>




<!-- Page Content  -->
<div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Employee Salary List</h4>
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
                                    <a class="iq-bg-primary" href="salary-template">
                                       View Salary Template
                                     </a>
                                    
                                    <!-- <a class="iq-bg-primary" href="javascript:void();">
                                       Excel
                                     </a>
                                     <a class="iq-bg-primary" href="javascript:void();">
                                       Pdf
                                     </a> -->
                                   </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    
                                    <th>Emp No.</th>
                                    <th>Emp. Name</th>
                                    <th>Salary Grade</th>
                                    <th>Basic Salary</th>
                                    <th>Tax Amount</th>
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>

                                 <?php
                                 
                                 $query = dbConnect()->prepare("SELECT * FROM Employee ORDER BY id");
                                 $query->execute();
                                 $sn= 1;
                                //  $connSal = mysqli_query($connect2db,$querySal);
                                 while ($row=$query->fetch()) {
                                    $employeeNo = $row['emp_id'];                                    
                                     $id = $row['id'];
                                     $employeeName = $row['firstname'].' '.$row['lastname'];
                                     $salaryId = $row['salary_id'];
                                     
                                     $querySal = dbConnect()->prepare("SELECT * FROM salary_temp WHERE id=?");
                                     $querySal->execute([$salaryId]);
                                     $rowSal=$querySal->fetch();
                                    // to get salary grade and salary
                                     $gradeId = $rowSal['id'];
                                     $grade = $rowSal['salary_grade'];
                                     $salary = $rowSal['salary'];
                                     $taxId = $rowSal['tax_id'];
                                    // to get tax percent
                                    $queryTax = dbConnect()->prepare("SELECT * FROM tax WHERE id=?");
                                    $queryTax->execute([$taxId]);
                                    $rowTax=$queryTax->fetch();

                                    // $taxName = $rowTax['tax_name'];
                                    $taxPercent = $rowTax['value'];
                                    // tax amount calculation
                                    $taxAmount = ($taxPercent/100)*$salary;

                                    
                                                                      
                                 
                                 
                                 ?>
                                 <tr>
                                    <td><?php echo $employeeNo ?></td>
                                    <td><?php echo $employeeName; ?></td>
                                    <td><?php echo $grade; ?></td>
                                    <td>₦<?php echo $salary; ?></td>
                                    <td>₦<?php echo $taxAmount; ?></td>
                                    <!-- <td><?php // echo $taxName. '('.$taxValue.'%)'; ?></td> -->
                                    <td>
                                    <div class="flex align-items-center list-user-action">
                                    
                                    <!-- update salry grade modal  -->
                                    <a class="iq-bg-primary" href="javascript:void();" data-toggle="modal" data-target="#exampleModalScrollable<?php echo $id ?>"><i class="fa fa-edit"></i></a>
                                     <!-- Modal update detail -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalScrollable<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Salary Template Management</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="iq-card">
                                                    <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title">Edit Salary Grade</h4>
                                                    </div>
                                                    </div>
                                                    <div class="iq-card-body">
                                                    <form method="POST" action="edit-salary-grade?id=<?php echo $id; ?>">
                                                        <div class="row">

                                                        <div class="col-md-12 mb-3">
                                                                <label for="validationDefaultUsername">Employee Number</label>
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text " id="inputGroupPrepend2"><i class="fa fa-id-card"></i></span>
                                                                </div>
                                                                <input type="text" list="exp" readonly value="<?php echo $employeeNo; ?>" class="form-control" name="editName" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                                                    
                                                            </div>
                                                            </div>

                                                        <div class="col-md-12 mb-3">
                                                                <label for="validationDefaultUsername">Employee Name</label>
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text " id="inputGroupPrepend2"><i class="fa fa-user"></i></span>
                                                                </div>
                                                                <input type="text" list="exp" readonly value="<?php echo $employeeName; ?>" class="form-control" name="editName" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                                                    
                                                            </div>
                                                            </div>

                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationDefaultUsername">Salary Grade</label>
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text " id="inputGroupPrepend2"><i class="fa fa-area-chart"></i></span>
                                                                </div>
                                                                <select name="editGrade" class="form-control" id="validationDefault04" required>
                                                                <option  value="<?php echo $gradeId; ?>"><?php echo $grade; ?></option>
                                                                <?php 
                                                                
                                                                $queryGrade = dbConnect()->prepare("SELECT * FROM salary_temp WHERE NOT id=?");
                                                                $queryGrade->execute([$gradeId]);

                                                                while($rowGrade=$queryGrade->fetch()){

                                                                    $gradeNames = $rowGrade['salary_grade'];
                                                                    $gradeSalaries = $rowGrade['salary'];
                                                                    $gradeIds = $rowGrade['id'];
                                                                
                                                                ?>
                                                                <option value="<?php echo $gradeIds; ?>"><?php echo $gradeNames; ?></option>
                                                                <?php } ?>
                                                                </select>
                                                                    
                                                            </div>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationDefaultUsername">Salary</label>
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroupPrepend2"><i class="fa fa-money"></i></span>
                                                                </div>
                                                                
                                                                <input type="text" readonly value="<?php echo $salary; ?>" class="form-control" name="editSalary" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        
                                                        <button name="editSubmit" type="submit" class="btn btn-primary">Submit</button>
                                                        <!-- <button type="submit" class="btn iq-bg-danger">cancle</button> -->
                                                    </form>
                                                    </div>
                                                </div>                                                
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                         
                                    <!-- delete link -->
                                    <!-- <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="jobs_del?id=<?php // echo $id; ?>"><i class="ri-delete-bin-line"></i></a> -->
                                         
                                          
                                          
                                          
                                       </div>
                                    </td>
                                 </tr>

                                 <?php } ?>
                             </tbody>
                           </table>
                        </div>
                           <div class="row justify-content-between mt-3">
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
                           </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- Wrapper END -->



<?php include 'footer.php' ?>