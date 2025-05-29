<div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="dashboard">
               <img src="images/logo.png" class="img-fluid" alt="">
               <!-- <span>Vito</span> -->
               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                        <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Admin Interface</span></li>
                     <li>
                        <a href="dashboard" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
                     </li>
                     <?php if ($_SESSION['urole'] !== "company"){ ?>
                     <li>
                        <a href="profile" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>My Profile</span></a>
                     </li>
                     <?php } ?>
                     <li>
                        <a href="#mailbox" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-mail-line"></i><span>Messaging</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="mailbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="inbox"><i class="ri-edit-line"></i>Inbox </a></li>
                           <li><a href="compose_email"><i class="ri-inbox-line"></i>Compose Message</a></li>
                        </ul>
                     </li>

                     <?php if ($_SESSION['urole'] == "Admin"): ?>
                              <li>
                                 <a href="#userinfo" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-users"></i><span>Employees</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                 <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    <li><a href="register"><i class="ri-user-add-line"></i>New Employee</a></li>
                                    <li><a href="user_list"><i class="ri-file-list-line"></i>Manage Employees</a></li>
                                 </ul>
                              </li>
                        <?php endif; ?>
                     <li><a href="department" class="iq-waves-effect"><i class="las la-folder"></i><span>Departments</span></a></li>
                     <li>
                     <a href="#ecommerce" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-tags"></i><span>Recruitments</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="ecommerce" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="jobs_posted"><i class="las la-envelope-open-text"></i>Vacancies</a></li>
                           <!-- <li><a href="e-commerce-product-detail.html"><i class="ri-pages-line"></i>Product Details</a></li> -->
                        </ul>
                     </li>
                     <!-- <li><a href="calendar.html" class="iq-waves-effect"><i class="las la-check-double"></i><span>Attendance</span></a></li> -->

                     <li>
                        <a href="#map-page" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-archive-drawer-line"></i><span>Leave</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="map-page" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <?php if ($_SESSION['urole'] == "Admin"): ?>
                              <li><a href="add_leave_category"><i class="ri-clockwise-line"></i>Leave Type</a></li>
                           <?php endif; ?>
                           <!-- <li><a href="view_leave_category"><i class="ri-clockwise-line"></i>View Leave Type</a></li> -->
                           <li><a href="apply_leave"><i class="ri-clockwise-2-line"></i>Apply for Leave</a></li>
                           <li><a href="view_leave"><i class="ri-clockwise-2-line"></i>View Applications</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#wizard-form" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-archive-drawer-line"></i><span>Complaint</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="wizard-form" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <?php if ($_SESSION['urole'] == "Admin"): ?>
                              <li><a href="new_complaint_type"><i class="ri-clockwise-line"></i>Add Complaint Type</a></li>
                        <?php endif; ?>
                           <li><a href="add_new_complaint"><i class="ri-clockwise-2-line"></i>Create New</a></li>
                        </ul>
                     </li>
                     <!-- <li><a href="calendar.html" class="iq-waves-effect"><i class="las la-file-invoice-dollar"></i><span>Payroll</span></a></li> -->
                     <?php if ($_SESSION['urole'] == "Admin"): ?>
                                               
                           <li>
                              <a href="#authentication" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-file-invoice-dollar"></i><span>Payroll</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="authentication" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                 <li><a href="make-payment"><i class="las la-envelope-open"></i></i>Generate Monthly Payroll</a></li>
                                 <li><a href="monthly-schedule"><i class="las la-envelope-open-text"></i>Monthly Payroll List</a></li>
                                 <li><a href="salary-template"><i class="las la-envelope-open-text"></i>Salary Template</a></li>
                                 <li><a href="employee-salary"><i class="las la-envelope-open-text"></i>Employee Salary</a></li>
                                 <li><a href="tax"><i class="las la-envelope-open-text"></i>Tax</a></li>
                              </ul>
                           </li>

                           <li>
                        <a href="#extra-pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-running"></i><span>Performance</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="extra-pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="list_indicators"><i class="ri-user-add-line"></i>Set Indicators</a></li>
                           <li><a href="performance"><i class="ri-file-list-line"></i>Give Appraisal</a></li>
                        </ul>
                     </li>

                    
                     <?php endif; ?>
                     <li>
                        <a href="#forms" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-file-invoice-dollar"></i><span>Loan</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="forms" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="loan-application"><i class="las la-envelope-open-text"></i>Apply for Loan</a></li>
                           <li><a href="loan-list"><i class="las la-envelope-open-text"></i>Loan Applications</a></li>
                        </ul>
                     </li>
                     
                     <!-- <li><a href="calendar.html" class="iq-waves-effect"><i class="lab la-buffer"></i><span>Training</span></a></li> -->
                    

                     <li>
                        <a href="#ui-elements" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-users"></i><span>Groups</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="ui-elements" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <?php if ($_SESSION['urole'] == "Admin"): ?>
                              <li><a href="create-group"><i class="fa fa-group"></i>Create</a></li>
                        <?php endif; ?>
                           <li><a href="group-list"><i class="fa fa-list"></i>Group List</a></li>
                           <!-- <li><a href="ui-alerts.html"><i class="ri-alert-line"></i>Alerts</a></li> -->
                           
                        </ul>
                     </li>
                     <?php if ($_SESSION['urole'] == "Admin"): ?>
                                                
                           <li>
                              <a href="#userinfo12" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-users"></i><span>Clients/Company</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="userinfo12" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                 <li><a href="create-company"><i class="ri-user-add-line"></i>New Clients/Company</a></li>
                                 <li><a href="company-list"><i class="ri-file-list-line"></i>Manage Clients/Company </a></li>
                              </ul>
                           </li>
                     <?php endif; ?>
                     <!-- #map-page -->
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>