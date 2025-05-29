<?php include 'header.php'?>
<?php

    $id = $_SESSION['uid'];
    $role = $_SESSION['urole'];
    $fullname = $_SESSION['ufirstname'].' '.$_SESSION['ulastname'];

    $sql = dbConnect()->prepare("SELECT * FROM employee WHERE id=?");
    $sql->execute([$empuid]);
    $fetSql = $sql->fetch();

    $qualupload = $fetSql['qualupload'];
    $firstname = $fetSql['firstname'];
    $lastname = $fetSql['lastname'];
    $dob = $fetSql['dob'];
    $gender = $fetSql['gender'];
    $role = $fetSql['role'];
    $emp_img = $fetSql['emp_img'];
    $emp_id = $fetSql['emp_id'];
    $email = $fetSql['email'];
    $address = $fetSql['address'];
    $created = $fetSql['created'];
    $phone = $fetSql['phone'];
    $desg = $fetSql['desg'];
    $deptId = $fetSql['dept'];
    $state = $fetSql['state'];
    $city = $fetSql['city'];
    $salary = $fetSql['salary_id'];
    $qual = $fetSql['qual'];
    $bank = $fetSql['bank'];
    $accno = $fetSql['acctno'];
    $holname = $fetSql['acctname'];
    $facebook = $fetSql['facebook'];
    $instagram = $fetSql['instagram'];
    $twitter = $fetSql['twitter'];

    $sqlDept = dbConnect()->prepare("SELECT * FROM department WHERE id=?");
    $sqlDept->execute([$deptId]);
    $dept = $sqlDept->fetch()['dept_name'];

    $sqlSalary = dbConnect()->prepare("SELECT * FROM salary_temp WHERE id=?");
    $sqlSalary->execute([$salary]);
    $grade = $sqlSalary->fetch()['salary_grade'];
?>

<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-body profile-page p-0">
                           <div class="profile-header">
                              <div class="cover-container">
                                 <img src="images/page-img/profile-bg.jpg" alt="profile-bg" class="rounded img-fluid">
                                 <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                    <li><a href="update_user?id=<?= $empuid ?>"><i class="ri-pencil-line"></i></a></li>
                                    <!-- <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li> -->
                                 </ul>
                              </div>
                              <div class="profile-info p-4">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                       <div class="user-detail pl-5">
                                          <div class="d-flex flex-wrap align-items-center">
                                             <div class="profile-img pr-4">
                                                <img src="uploads/employee/<?php echo $emp_img?>" alt="profile-img" class="avatar-130 img-fluid" />
                                             </div>
                                             <div class="profile-detail d-flex align-items-center">
                                                <h4><?php echo $fullname ?></h4>
                                                <p class="m-0 pl-3"> - <?php echo $role;?></p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                       <ul class="nav nav-pills d-flex align-items-end float-right profile-feed-items p-0 m-0">
                                          <li>
                                             <a class="nav-link active" data-toggle="pill" href="#profile-profile">profile</a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="row">
                        <div class="col-lg-3 profile-left">
                           
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Qualification Upload</h4>
                                 </div>
                                 <div class="iq-card-header-toolbar d-flex align-items-center">
                                     <p class="m-0">1</p>
                                 </div>
                              </div>
                              <div class="mt-2 col-md-6">
                                    <h6 style="display: flex; flex-direction: row; color: blue;"><p><?php echo $qual?></p> <p style="margin-left: 3px;">Holder</p></h6>
                                    
                              </div>
                              <div class="iq-card-body d-flex" style="justify-content: center; align-items: center;">
                                <a href="#"><img style="max-width: 150px; max-height: 150px;" src="uploads/qualification/<?php echo $qualupload ?>" alt="Qualification-img" class="img-fluid w-100" /></a>
                              </div>
                           </div>
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Payment Details</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <ul class="pages-lists m-0 p-0">
                                    <li class="d-flex mb-4 align-items-center">
                                       <div class="media-support-info ml-3">
                                          <h6>Bank Name:</h6>
                                          <p class="mb-0"><?php echo $bank?></p>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center">
                                       <div class="media-support-info ml-3">
                                          <h6>Account No.:</h6>
                                          <p class="mb-0"><?php echo $accno?></p>
                                       </div>
                                    </li>
                                    <li class="d-flex mb-4 align-items-center">
                                       <div class="media-support-info ml-3">
                                          <h6>Account Name:</h6>
                                          <p class="mb-0"><?php echo $holname?></p>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6 profile-center">
                           <div class="tab-content">
                              <div class="tab-pane fade active show" id="profile-profile" role="tabpanel">
                                 <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                       <div class="iq-header-title">
                                          <!-- <h4 class="card-title">Profile</h4> -->
                                       </div>
                                    </div>
                                    <div class="iq-card-body">
                                       <div class="user-detail text-center">
                                          <div class="user-profile">
                                             <img style="width: 130px; height: 130px; border-radius: 50%;" src="uploads/employee/<?php echo $emp_img?>" alt="profile-img" class="avatar-130 img-fluid">
                                          </div>
                                          <div class="profile-detail mt-3">
                                             <h3 class="d-inline-block"><?php echo $fullname?></h3>
                                             <p class="d-inline-block pl-3"> - <?php echo $dept?></p>
                                             <p class="mb-0" style="user-select: none;">
                                                User Profile
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                       <div class="iq-header-title">
                                          <h4 class="card-title">About User</h4>
                                       </div>
                                    </div>
                                    <div class="iq-card-body">
                                        <div class="row">
                                        <div class="mt-2 col-md-6">
                                                <h6>Firstname:</h6>
                                                <p><?php echo $firstname?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Lastname:</h6>
                                                <p><?php echo $lastname?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Email:</h6>
                                                <p><a href="mailto:<?php echo $email?>"><?php echo $email?></a></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Date of Birth:</h6>
                                                <p><?php echo $dob?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Gender:</h6>
                                                <p><?php echo $gender?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Role:</h6>
                                                <p><?php echo $role?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Designation:</h6>
                                                <p><?php echo $desg?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Department:</h6>
                                                <p><?php echo $dept?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>State:</h6>
                                                <p><?php echo $state?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>City of Residence:</h6>
                                                <p><?php echo $city?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Joined:</h6>
                                                <p><?php echo $created?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Resides:</h6>
                                                <p><?php echo $address?></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Contact:</h6>
                                                <p><a href="#"><?php echo $phone?></a></p>
                                            </div>
                                            <div class="mt-2 col-md-6">
                                                <h6>Salary Grade:</h6>
                                                <p><a href="#"><?php echo $grade?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 profile-right">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Social Media</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <div class="about-info m-0 p-0">
                                    <div class="row">
                                        <div class="mt-2 col-md-12">
                                            <h6>Facebook:</h6>
                                            <?php
                                                if (empty($facebook)) {
                                                    echo "<p>Not Available</p>";
                                                }else {
                                                    echo "<p style='font-size: 13px; color: blue;'><a href='$facebook'>Follow my Facebook</a></p>";
                                                }
                                            
                                            ?>
                                        </div>
                                        <div class="mt-2 col-md-12">
                                            <h6>Instagram:</h6>
                                            <?php
                                                if (empty($instagram)) {
                                                    echo "<p>Not Available</p>";
                                                }else {
                                                    echo "<p style='font-size: 13px;'><a href='$instagram'>Follow my Instagram</a></p>";
                                                }
                                            
                                            ?>
                                        </div>
                                        <div class="mt-2 col-md-12">
                                            <h6>Twitter:</h6>
                                            <?php
                                                if (empty($twitter)) {
                                                    echo "<p>Not Available</p>";
                                                }else {
                                                    echo "<p style='font-size: 13px;'><a href='$twitter'>Follow my Twitter</a></p>";
                                                }
                                            
                                            ?>
                                            
                                        </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="iq-card" style="position: relative;">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Latest Appraisal</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body" style="font-size: 11px; min-height: 200px;">
                                 <div class="m-0 p-0">
                                    <?php
                                       $month = date('m');
                                       $year = date('Y');
                                       $sumTot = 0;

                                       $getCount = dbConnect()->prepare("SELECT Count(id) AS total FROM indicator");
                                       $getCount->execute();
                                       $limit = $getCount->fetch()['total'];

                                       $sql = dbConnect()->prepare("SELECT * FROM appraisal WHERE emp_id=? AND month=? and year=?");
                                       $sql->execute([$emp_id,$month,$year]);
                                       if($sql->rowcount() > 0){
                                          while ($sqlFetch=$sql->fetch()) {
                                             $appraisal = $sqlFetch['appraisal'];
                                             $score = $sqlFetch['score'];
   
   
                                             // SUM TOTAL OF SCORES
                                             $sumTot += $score;
                                             $overall = $limit*5;
                                       ?>
                                       
   
                                          <div class="col-md-12" style="display: flex; flex-direction: row;">
                                               <p><?php echo $score;?></p>
                                               <h6 class="ml-2"><?php echo $appraisal;?></h6>
                                          </div>
   
   
   
                                    <?php }
                                    }else {
                                       // $mnt = date('m')-1;
                                       $getCount = dbConnect()->prepare("SELECT Count(id) AS total FROM indicator");
                                       $getCount->execute();
                                       $limit = $getCount->fetch()['total'];

                                       $sumTot = 0;
                                       $sql2 = dbConnect()->prepare("SELECT * FROM appraisal WHERE emp_id=? ORDER BY id DESC LIMIT 0, $limit");
                                       $sql2->execute([$emp_id]);
                                       
                                       while ($sqlFetch=$sql2->fetch()) {
                                          $appraisal = $sqlFetch['appraisal'];
                                          $score = $sqlFetch['score'];


                                          // SUM TOTAL OF SCORES
                                          $sumTot += $score; 
                                          $overall = $limit*5;
                                    ?>
                                    

                                       <div class="col-md-12" style="display: flex; flex-direction: row;">
                                            <p><?php echo $score;?></p>
                                            <h6 class="ml-2"><?php echo $appraisal;?></h6>
                                       </div>



                                 <?php } } ?>
                                       
                                       
                                 <!-- DECLARE TOTAL SCORE -->
                                 <?php
                                 
                                          if ($sql->rowcount()>0 || $sql2->rowcount()>0) {?>
                                             <hr>
                                             <div style="display: flex; flex-direction: row; position: absolute; bottom: 0; right: 0; padding-right: 15px;">
                                                <h5>Total Score:</h5>
                                                <p class="ml-3"><?php echo $sumTot.'/'.$overall ?></p>
                                             </div>
                                         <?php }else {?>
                                             <div class="image-preview add-img-user profile-img-edit" id="imagePreview">
                                                <img src="" alt="Image Preview" class="image-image">
                                                <span class="form-error">No Record Found</span>
                                             </div>
                                         <?php } ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

<?php include 'footer.php'?>