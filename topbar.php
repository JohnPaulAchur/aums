<?php

$fullname = $_SESSION['ufirstname'].' '.$_SESSION['ulastname'];
$firstname = $_SESSION['ufirstname'];
$uid = $_SESSION['uid'];
$uEmail = $_SESSION['uemail'];


if ($uEmail) {
   // Connect to the database
   $pdo = dbConnect();

   // Prepare and execute query to get employee id by email
   $sql = "SELECT id FROM employee WHERE email = :email LIMIT 1";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(['email' => $uEmail]);

   // Fetch the employee id
   $empuid = $stmt->fetchColumn();

   if ($empuid) {
       // Employee id found
       $_SESSION['empuid'] = $empuid;
      //  echo "Employee ID: " . $empuid;
   } else {
       // No employee found
      //  echo "No employee found with email: " . htmlspecialchars($uEmail);
       $empuid = null;
   }
} else {
   // echo "User email not set in session.";
   $empuid = null;
}

?>
<div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="index.html" class="logo">
                     <img src="images/logo.gif" class="img-fluid" alt="">
                     <span>AUMS</span>
                     </a>
                  </div>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="navbar-left">
                     <ul id="topbar-data-icon" class="d-flex p-0 topbar-menu-icon">
                        <li class="nav-item">
                           <a href="dashboard" class="nav-link font-weight-bold search-box-toggle"><i class="ri-home-4-line"></i></a>
                        </li>
                        <li><a href="inbox" class="nav-link"><i class="ri-message-line"></i></a></li>
                        <li><a href="add_new_complaint" class="nav-link"><i class="ri-file-list-line"></i></a></li>
                        <li><a href="profile" class="nav-link"><i class="fa fa-user"></i></a></li>
                        
                     </ul>
                     <div class="iq-search-bar">
                        <form action="#" class="searchbox">
                           <input type="text" class="text search-input" placeholder="Type here to search...">
                           <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                           <div class="searchbox-datalink">
                              <h6 class="pl-3 pt-3">Pages</h6>
                              <ul class="m-0 pl-3 pr-3 pb-3">
                                 <li class="iq-bg-primary-hover rounded"><a href="dashboard" class="nav-link router-link-exact-active router-link-active pr-2"><i class="ri-home-4-line pr-2"></i>Dashboard</a></li>
                                 <li class="iq-bg-primary-hover rounded"><a href="inbox" class="nav-link"><i class="ri-message-line pr-2"></i>Inbox</a></li>
                                 <li class="iq-bg-primary-hover rounded"><a href="add_new_complaint" class="nav-link"><i class="ri-chat-check-line pr-2"></i>Complaint</a></li>
                                 <li class="iq-bg-primary-hover rounded"><a href="profile" class="nav-link"><i class="ri-profile-line pr-2"></i>Profile</a></li>
                              </ul>
                           </div>
                        </form>
                     </div>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                        <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item">
                           <a class="search-toggle iq-waves-effect language-title" href="#"><img src="images/small/flag-01.png" alt="img-flaf" class="img-fluid mr-1" style="height: 16px; width: 16px;" /> English <i class="ri-arrow-down-s-line"></i></a>
                           <div class="iq-sub-dropdown">
                              <a class="iq-sub-card" href="#"><img src="images/small/flag-01.png" alt="img-flaf" class="img-fluid mr-2" />English</a>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="search-toggle iq-waves-effect">
                              <div id="lottie-beil"></div>
                              <span class="bg-danger dots"></span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">0</small></h5>
                                    </div>
                                    <a href="#" class="iq-sub-card">
                                       <div class="media align-items-center">
                                          <div class="">
                                             <!-- <img class="avatar-40 rounded" src="images/user/01.jpg" alt=""> -->
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">No Notifications Yet</h6>
                                             <!-- <small class="float-right font-size-12">Just Now</small>
                                             <p class="mb-0">95 MB</p> -->
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center bg-primary rounded">
                           <img src="images/user/1.jpg" class="img-fluid rounded mr-3" alt="user">
                           <div class="caption">
                              <h6 class="mb-0 line-height text-white"><td><?php echo $firstname ?></td></h6>
                              <span class="font-size-12 text-white">Available</span>
                           </div>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello <td><?php echo $firstname ?></td></h5>
                                    <span class="text-white font-size-12">Available</span>
                                 </div>

                                 <?php if ($_SESSION['urole'] !== "company"){ ?>
                                 <a href="profile" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">My Profile</h6>
                                          <p class="mb-0 font-size-12">View personal profile details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="update_user?id=<?= $empuid ?>" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-profile-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Edit Profile</h6>
                                          <p class="mb-0 font-size-12">Modify your personal details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <?php } ?>
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="bg-primary iq-sign-btn" href="logout" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>