<?php include 'header.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


    $queryG = dbConnect()->prepare("SELECT * FROM company_tbl WHERE id=?");
    $queryG->execute([$id]);
    $rowG = $queryG->fetch();
    $comName = $rowG['company_name'];
    $address = $rowG['address'];
    $email = $rowG['email'];
    $phone = $rowG['phone'];
    $img = $rowG['img'];
    $contactPerson = $rowG['lname'].' '.$rowG['fname'];
 ?>

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <!-- <div class="row"> -->
            <!-- <h3 class="p-2 m-2 border-top border-bottom"><i class="fa fa-group"></i> <?php //echo $comName; ?></h3> -->





            <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-body profile-page p-0">
                           <div class="profile-header">
                              <div class="cover-container">
                                 <img src="images/page-img/profile-bg.jpg" alt="profile-bg" class="rounded img-fluid">
                                 <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                    <li><a data-toggle="modal" data-target="#gridSystemModal" href="javascript:void();"><i class="ri-pencil-line"></i></a></li>



                                    <!-- edit body -->
                                    <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            
                                            <form action="update-company?id=<?php echo $id; ?>" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="gridModalLabel">Edit Company Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="group">Company/Client Name:</label>
                                                            <input name="edcompany" value="<?php echo $comName; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                            <!-- <input type="hidden" value="Technical" name="tab"> -->
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="group">Contact Person Last Email:</label>
                                                            <input name="email" value="<?php echo $email; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                            <!-- <input type="hidden" value="Technical" name="tab"> -->
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="group">Company/Client Phone:</label>
                                                            <input name="phone" value="<?php echo $phone; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                            <!-- <input type="hidden" value="Technical" name="tab"> -->
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="group">Company/Client Address:</label>
                                                            <input name="address" value="<?php echo $address; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                            <!-- <input type="hidden" value="Technical" name="tab"> -->
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="group">Contact Person First Name:</label>
                                                            <input name="fname" value="<?php echo $rowG['fname']; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                            <!-- <input type="hidden" value="Technical" name="tab"> -->
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="group">Contact Person Last Name:</label>
                                                            <input name="lname" value="<?php echo $rowG['lname']; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                            <!-- <input type="hidden" value="Technical" name="tab"> -->
                                                        </div>

                                                        

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="edsubmit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li> -->
                                 </ul>
                              </div>
                              <div class="profile-info p-4">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                       <div class="user-detail pl-5">
                                          <div class="d-flex flex-wrap align-items-center">
                                             <div class="profile-img pr-4">
                                                <img src="uploads/employee/<?php echo $img; ?>" alt="profile-img" class="avatar-130 img-fluid" />
                                             </div>
                                             <div class="profile-detail d-flex align-items-center">
                                                <h3><?php echo $comName; ?></h3>
                                                <p class="m-0 pl-3"> - Company/Client</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                       <!-- <ul class="nav nav-pills d-flex align-items-end float-right profile-feed-items p-0 m-0">
                                          <li>
                                             <a class="nav-link active" data-toggle="pill" href="#profile-feed">feed</a>
                                          </li>
                                          <li>
                                             <a class="nav-link" data-toggle="pill" href="#profile-activity">Activity</a>
                                          </li>
                                          <li>
                                             <a class="nav-link" data-toggle="pill" href="#profile-friends">friends</a>
                                          </li>
                                          <li>
                                             <a class="nav-link" data-toggle="pill" href="#profile-profile">profile</a>
                                          </li>
                                       </ul> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div></div>
               <div class="row">
               <div class="col-lg-6">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Company Details</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="iq-timeline">
                           <!-- <li>
                              <div class="timeline-dots"></div>
                              <h6 class="float-left mb-1">Company/Client Name</h6>
                              <small class="float-right mt-1">19 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p><?php //echo $comName; ?></p>
                              </div>
                           </li> -->
                           <li>
                              <div class="timeline-dots border-success"></div>
                              <h6 class="float-left mb-1">Company/Client Address</h6>
                              <!-- <small class="float-right mt-1">19 November 2019</small> -->
                              <div class="d-inline-block w-100">
                                 <p><?php echo $address; ?></p>
                              </div>
                           </li>
                            <li>
                              <div class="timeline-dots border-info"></div>
                              <h6 class="float-left mb-1">Company/Client Contact Person</h6>
                              <!-- <small class="float-right mt-1">19 November 2019</small> -->
                              <div class="d-inline-block w-100">
                                 <p><?php echo $contactPerson; ?></p>
                              </div>
                           </li><!--
                           <li>
                              <div class="timeline-dots border-warning"></div>
                              <h6 class="float-left mb-1">Client Meeting</h6>
                              <small class="float-right mt-1">19 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li> -->
                           
                        </ul>
                     </div>
                  </div>
               </div>

               <div class="col-lg-6">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Contact Details</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <ul class="iq-timeline">
                           <!-- <li>
                              <div class="timeline-dots"></div>
                              <h6 class="float-left mb-1">Client Meeting</h6>
                              <small class="float-right mt-1">19 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li> -->
                           <li>
                              <div class="timeline-dots border-success"></div>
                              <h6 class="float-left mb-1">Company/Client Phone</h6>
                              <!-- <small class="float-right mt-1">19 November 2019</small> -->
                              <div class="d-inline-block w-100">
                                 <p><?php echo $phone; ?></p>
                              </div>
                           </li>
                           <li>
                              <div class="timeline-dots border-danger"></div>
                              <h6 class="float-left mb-1">Company/Client Emails</h6>
                              <!-- <small class="float-right mt-1">19 November 2019</small> -->
                              <div class="d-inline-block w-100">
                                 <p><?php echo $email; ?></p>
                              </div>
                           </li>
                           
                           <!-- <li>
                              <div class="timeline-dots border-info"></div>
                              <h6 class="float-left mb-1">Client Meeting</h6>
                              <small class="float-right mt-1">19 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li>
                           <li>
                              <div class="timeline-dots border-warning"></div>
                              <h6 class="float-left mb-1">Client Meeting</h6>
                              <small class="float-right mt-1">19 November 2019</small>
                              <div class="d-inline-block w-100">
                                 <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                              </div>
                           </li> -->
                           
                        </ul>
                     </div>
                  </div>
               </div>
               </div>

               <div class="row">
                     <div class="col-sm-12">
                        <div class="iq-card">
                           <div class="iq-card-body">
                              <div class="d-flex justify-content-between align-items-center">
                                 <div class="todo-date d-flex mr-3">
                                    <i class="fa fa-group text-success m-2"></i>
                                    <span class="ml-2">Assigned Employess</span>
                                 </div>
                                 <div class="todo-notification d-flex align-items-center">
                                    <div class="notification-icon position-relative d-flex align-items-center mr-3">
                                       <!-- <a href="#"><i class="fa fa-arrow-down font-size-16"></i></a> -->
                                       <!-- <span class="bg-danger text-white">5</span></div> -->
                                    <a href="assign-more?id=<?php echo $id; ?>" class="btn iq-bg-success">Assign More</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
               </div>

                <div class="row m-4">

                <?php
                    

                    $queryM = dbConnect()->prepare("SELECT * FROM company_assign WHERE company_id=?");
                    $queryM->execute([$id]);
                    while($row = $queryM->fetch()){
                            $employeeId = $row['employee_id'];

                            $queryEmp = dbConnect()->prepare("SELECT * FROM employee WHERE id=?");
                            $queryEmp->execute([$employeeId]);
                            $rowEmp = $queryEmp->fetch();
                            $fullname = $rowEmp['lastname'] . ' ' . $rowEmp['firstname'];
                            $empImg = $rowEmp['emp_img'];
                            $empEmail = $rowEmp['email'];
                
                
                ?>
                    <div class="col-xl-4 mb-4">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img
                                src="uploads/employee/<?php echo $empImg; ?>"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle"
                                />
                                <div class="ms-3 m-2">
                                <p class="fw-bold mb-1"><?php echo $fullname; ?></p>
                                <p class="text-muted mb-0"><?php echo $empEmail; ?></p>
                                </div>
                            </div>
                            <!-- <span class="badge rounded-pill badge-success">Active</span> -->
                                <!-- <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" name="empid[]" value="" class="custom-control-input bg-success" id="customCheck-2" >
                                    <label class="custom-control-label" for="customCheck-2">Select</label>
                                </div> -->
                            </div>
                        </div>
                        <div class="iq-card-footer border-top p-2 d-flex justify-content-around">
                            <a class="badge btn btn-link m-0" href="user_single?id=<?php echo $employeeId; ?>">
                                <i class="fa fa-user ms-2"></i>
                                Profile
                            </a>
                            <!-- <a
                            class="btn btn-link m-0 text-reset"
                            href="#"
                            role="button"
                            data-ripple-color="primary"
                            >Call<i class="fa fa-phone ms-2"></i
                            ></a> -->
                            <!-- <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline"> -->
                            <a onclick="return confirm('Are you sure you want to remove employee ?')" href="delete-assign?id=<?php echo $employeeId; ?>&company=<?php echo $id; ?>" class="badge text-danger btn btn-link m-0"><i class="fa fa-trash"></i></a>

                                <!-- </div> -->
                        </div>
                        </div>
                    </div>

                <?php } ?>
                 

                </div>

                <!-- <div class="p-2">
                    <div class="">
                        <a href="add-members?id=<?php //echo $id; ?>" class=" badge badge-success"><i class="fa fa-plus">Add more members</i></a>
                        <a href="group-members?id=<?php //echo $id; ?>" class=" badge badge-warning"><i class="fa fa-edit"></i></a>
                    </div>
                </div> -->

            <!-- </div> -->
        </div>
    </div>


<?php include 'footer.php'; ?>