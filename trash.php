<?php include 'header.php'; ?>


<!-- Page Content  -->
<div id="content-page" class="content-page">
         <div class="container-fluid relative">
            <div class="row">
               <div class="col-lg-3">
                  <div class="iq-card">
                     <div class="iq-card-body">
                        <div class="">
                           <div class="iq-email-list">
                              <a href="compose_email" class="btn btn-primary btn-lg btn-block mb-3 font-size-16 p-3" data-target="#compose-email-popup" data-toggle="modal"><i class="ri-send-plane-line mr-2"></i>New Message</a>
                              <div class="iq-email-ui nav flex-column nav-pills">
                                 <li class="nav-link" href="inbox"><a href="inbox"><i class="ri-mail-line"></i>Inbox</a></li>
                                 <li class="nav-link" ><a href="sent-mail"><i class="ri-mail-send-line"></i>Sent Mail</a></li>
                                 <li class="nav-link active"><a href="trash"><i class="ri-delete-bin-line"></i>Trash</a></li>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9 mail-box-detail">
                  <div class="iq-card">
                     <div class="iq-card-body p-0">
                        <div class="">
                           <div class="iq-email-to-list p-3">
                              <div class="d-flex justify-content-between">
                                 <ul>
                                    
                                    <li ><a href="inbox"><i class="ri-restart-line"></i></a></li>
                                    <li><a onclick="return confirm('Are you Sure You Want To Empty The Trash ?')" href="empty-trash?email=<?php echo $uEmail; ?>" class="iq-bg-danger"><i class="ri-delete-bin-2-line"></i></a></li>
                                    
                                    <!-- <li><a href="#"><i class="ri-delete-bin-line"></i></a></li>
                                    <li data-toggle="tooltip" data-placement="top" title="Inbox"><a href="#"><i class="ri-mail-unread-line"></i></a></li>
                                    <li data-toggle="tooltip" data-placement="top" title="Zoom"><a href="#"><i class="ri-drag-move-2-line"></i></a></li> -->
                                 </ul>
                                 <div class="iq-email-search d-flex">
                                    <form class="mr-3 position-relative">
                                       <div class="form-group mb-0">
                                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search">
                                          <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                       </div>
                                    </form>
                                    <ul>
                                       
                                       <li><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                       <li><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                       <li ><a href="#"><i class="ri-list-settings-line"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="iq-email-listbox">
                              <div class="tab-content">
                                  <?php
                                    $query = dbConnect()->prepare("SELECT * FROM mail WHERE (sender = '$uEmail' AND sender_trash=1) OR (receiver = '$uEmail' AND receiver_trash=1) ORDER BY created DESC");
                                    $query->execute();
                                    //  $connJobs = mysqli_query($connect2db,$queryJobs);
                                    while ($row=$query->fetch()) {
                                        $id = $row['id'];
                                        $subject = $row['subject'];
                                        $message = $row['message'];
                                        $receiver = $row['receiver'];
                                        $sender = $row['sender'];
                                        $receiverName = $row['receiver_name'];
                                        $senderName = $row['sender_name'];
                                        $created = $row['created'];
                                    
                                    ?>
                                 <div class="tab-pane fade show active" id="mail-inbox<?php echo $id; ?>" role="tabpanel">
                                    <ul class="iq-email-sender-list">
                                       <li class="iq-unread">
                                          <div class="d-flex align-self-center">
                                             <div class="iq-email-sender-info">
                                                <div class="iq-checkbox-mail">
                                                   <div class="custom-control custom-checkbox">
                                                      <input type="checkbox" class="custom-control-input" id="mailk">
                                                      <label class="custom-control-label" for="mailk"></label>
                                                   </div>
                                                </div>
                                                <span class="ri-star-line iq-star-toggle text-warning"></span>
                                                <a href="javascript: void(0);" class="iq-email-title"><?php echo $receiver; ?></a>
                                             </div>
                                             <div class="iq-email-content">
                                                <?php
                                                   if ($sender == $uEmail) {
                                                      
                                                      ?>
                                                      <a href="javascript: void(0);" class="iq-email-subject"> You sent a direct message to <?php echo $receiverName; ?> (<?php echo $receiver; ?>)   &nbsp;–&nbsp;
                                                  <?php
                                                      }else{
                                                   ?>
                                                      <a href="javascript: void(0);" class="iq-email-subject"><?php echo $senderName; ?> (<?php echo $sender; ?>) sent you a direct message  &nbsp;–&nbsp;
                                                  <?php } ?>
                                                <!-- <span>@Mackenzieniko - Very cool :) Nicklas, You have a new direct message.</span> -->
                                                </a>
                                                <div class="iq-email-date"><?php echo $created; ?></div>
                                             </div>
                                             <ul class="iq-social-media">
                                                <li><a href="#"><i class="ri-mail-line"></i></a></li>
                                                <!-- <li><a href="#"><i class="ri-file-list-2-line"></i></a></li>
                                                <li><a href="#"><i class="ri-time-line"></i></a></li> -->
                                             </ul>
                                          </div>
                                       </li>
                                        <div class="email-app-details">
                                          <div class="iq-card">
                                             <div class="iq-card-body p-0">
                                                <div class="">
                                                   <div class="iq-email-to-list p-3">
                                                      <div class="d-flex justify-content-between">
                                                         <ul>
                                                            <li class="mr-3">
                                                               <a href="javascript: void(0);">
                                                                  <h4 class="m-0"><i class="ri-arrow-left-line"></i></h4>
                                                               </a>
                                                            </li>
                                                            <li><a href="#"><i class="ri-mail-open-line"></i></a></li>
                                                            <!-- <li><a href="#"><i class="ri-delete-bin-line"></i></a></li> -->
                                                            <li><a href="#"><i class="ri-mail-unread-line"></i></a></li>
                                                         </ul>
                                                         <div class="iq-email-search d-flex">
                                                            <ul>
                                                               <li class="mr-3">
                                                                  <a class="font-size-14" href="#">1 of 505</a>
                                                               </li>
                                                               <li data-toggle="tooltip" data-placement="top" title="Previous"><a href="#"><i class="ri-arrow-left-s-line"></i></a></li>
                                                               <li data-toggle="tooltip" data-placement="top" title="Next"><a href="#"><i class="ri-arrow-right-s-line"></i></a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <hr class="mt-0">
                                                   <div class="iq-inbox-subject p-3">
                                                      <div class="iq-inbox-subject-info">
                                                         <div class="iq-subject-info">
                                                            <img src="images/user/user-1.jpg" class="img-fluid rounded-circle" alt="#">
                                                            <div class="iq-subject-status align-self-center">
                                                               <h6 class="mb-0"><?php echo $senderName; ?></h6>
                                                               <div class="dropdown">
                                                                  <a class="dropdown-toggle" href="#"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                  from <?php echo $sender; ?>
                                                                  </a>
                                                                  <div class="dropdown-menu font-size-12" aria-labelledby="dropdownMenuButton">
                                                                     <table class="iq-inbox-details">
                                                                        <tbody style="font-size: 12px;">
                                                                           <tr>
                                                                              <td>from:</td>
                                                                              <td><?php echo $sender; ?></td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td>to:</td>
                                                                              <td><?php echo $receiver; ?></td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td>date:</td>
                                                                              <td><?php echo $created; ?></td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td>subject:</td>
                                                                              <td><?php echo $subject; ?></td>
                                                                           </tr>
                                                                           
                                                                        </tbody>
                                                                     </table>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <span class="float-right align-self-center"><?php echo $created; ?></span>
                                                         </div>
                                                         <div class="iq-inbox-body mt-2">

                                                            <!-- <p><?php // echo $subject; ?></p> -->
                                                      <h4 class="mt-0 mb-2"><?php echo $subject; ?></h4>

                                                            <p style="word-wrap: break-word;"><?php echo $message; ?></p>

                                                            <!-- <hr> -->
                                                            
                                                            
                                                         </div>
                                                         
                                                         
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </ul>
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
      <!-- Wrapper END -->






<?php include 'footer.php'; ?>