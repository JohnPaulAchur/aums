<?php include 'header.php' ?>

<?php
   if ($_SESSION['urole']!=="Admin") {
      echo "<script>window.location='home'</script>";
   }

?>
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center justify-content-between">
                              <h6>Active Employees</h6>
                              <span class="iq-icon"><i class="ri-information-fill"></i></span>
                           </div>
                           <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                              <div class="d-flex align-items-center">
                                 <div class="rounded-circle iq-card-icon iq-bg-primary mr-2"> <i class="ri-user-fill"></i></div>
                                 <h2><?php echo number_format($ActiveEmp) ?></h2>
                              </div>
                              <div class="iq-map text-primary font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center justify-content-between">
                              <h6>Current Month Payroll</h6>
                              <span class="iq-icon"><i class="ri-list-fill"></i></span>
                           </div>
                           <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                              <div class="d-flex align-items-center">
                                 <div class="rounded-circle iq-card-icon iq-bg-danger mr-2"><i class="ri-wallet-line"></i></div>
                                 <h2>₦<?php echo $payroll;?></h2></div>
                               <div class="iq-map text-danger font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center justify-content-between">
                              <h6> Groups</h6>
                              <span class="iq-icon"><i class="ri-information-fill"></i></span>
                           </div>
                           <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                              <div class="d-flex align-items-center">
                                 <div class="rounded-circle iq-card-icon iq-bg-warning mr-2"><i class="ri-price-tag-3-line"></i></div>
                                 <h2><?=$AllGroupsCount ?></h2></div>
                               <div class="iq-map text-warning font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                           <div class="d-flex align-items-center justify-content-between">
                              <h6>Job Vacancies</h6>
                              <span class="iq-icon"><i class="ri-information-fill"></i></span>
                           </div>
                           <div class="iq-customer-box d-flex align-items-center justify-content-between mt-3">
                              <div class="d-flex align-items-center">
                                 <div class="rounded-circle iq-card-icon iq-bg-info mr-2"><i class="ri-refund-line"></i></div>
                                 <h2><?=$AllJobsCount?></h2></div>
                               <div class="iq-map text-info font-size-32"><i class="ri-bar-chart-grouped-line"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
           
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Employess Overview</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton3" data-toggle="dropdown">
                                 <i class="ri-more-fill"></i>
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton3">
                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table mb-0 table-borderless">
                                 <thead>
                                    <tr>
                                       <th scope="col">Employee ID</th>
                                       <th scope="col"></th>
                                       <th scope="col">Name</th>
                                       <th scope="col">Department</th>
                                       <th scope="col">Role</th>
                                       <th scope="col">Join</th>
                                       <th scope="col">Status</th>
                                    </tr>
                                 </thead>
                                 <tbody style="font-size: 12px;">
                                 <?php
                                          $fetching = dbConnect()->prepare("
                                          SELECT e.*, d.dept_name 
                                          FROM employee e
                                          LEFT JOIN department d ON e.dept = d.id
                                      ");
                                      $fetching->execute();
                                      $n = 0;
                                      while ($route = $fetching->fetch()) {
                                          $n++;
                                          $employid = $route['id'];
                                          $deptName = $route['dept_name'];
                                          // Output logic here
                                      
                                 ?>                                      
                                       <tr>
                                          <td>#<?php echo $route['emp_id'];?></td>
                                          <td>
                                             <div class="iq-media-group">
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-30 rounded-circle" src="uploads/employee/<?php echo $route['emp_img'] ?>" alt="">
                                                </a>
                                             </div>
                                          </td>
                                          <td><?php echo $route['firstname'].' '.$route['lastname'];?></td>
                                          <td>
                                             <p class="mb-2"><?php echo $deptName  ?></p>
                                             <!-- <div class="iq-progress-bar">
                                                <span class="bg-success" data-percent="70"></span>
                                             </div> -->
                                          </td>
                                          <td><?php echo $route['role'] ?></td>
                                          <td><?php echo $route['created'] ?></td>
                                          <td>
                                             <?php 
                                                $st = $route['status'];
                                                if($st ==1){$st = "Active"; }else{$st = "In-Active";}
                                             ?>
                                             <div class="badge badge-pill badge-success"><?php echo $st?></div>
                                          </td>
                                       </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
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