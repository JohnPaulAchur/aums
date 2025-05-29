<?php include 'header.php';

//    $uEmail = $_SESSION['uemail'];                     
          
                                

$msg = "";
if (isset($_POST['submit'])) {
    $subject = check_input($_POST['subject']);
    $message = check_input($_POST['message']);
    $receiver = check_input($_POST['receiver']);
    
    $queryfname = dbConnect()->prepare("SELECT * FROM users WHERE email=?");
    $queryfname->execute([$receiver]);
    $rowfname=$queryfname->fetch();

    $receiverName = $rowfname['lname'].' '.$rowfname['fname'];
    $sender = $uEmail; 
    $senderName = $fullname;
    $created = date('d F ,Y - H:i:s');




    if ( empty($subject) || empty($message) || empty($receiver) ) {
    $msg = '<p style="color:red;">Not Sent , All Fields Are Required !!!</p>';
    }else{
        $query = dbConnect()->prepare("INSERT INTO mail SET subject=?, message=?, receiver=?, sender=?, created=?, sender_name=?, receiver_name=?");
        if( $query->execute([$subject,$message,$receiver,$sender,$created,$senderName,$receiverName]) ){
            // $msg = '<p style="color:green;">Operation Succesful !!!</p>';
            echo '<script>alert("Mail Sent Successfully !!!");window.location="inbox"</script>';
        }else{
            // $msg = '<p style="color:red;">Oops , An Error Occured!!!</p>';
            echo '<script>alert("Oops , An Error Occured !!!");window.location="jobs_posted"</script>';
        }
    }
    

    
}

?>


<!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row row-eq-height">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="iq-card iq-border-radius-20">
                              <div class="iq-card-body">
                                 <div class="row">
                                    <div class="col-md-7 mb-3">
                                       <h5 class="text-primary card-title"><i class="ri-pencil-fill"></i> Compose Message</h5>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                    <?php
                                        if ($msg!="") {
                                            echo $msg;                                                            
                                        }
                                    ?>
                                    </div>
                                 </div>
                                 <form method="POST" class="email-form">
                                    <div class="form-group row">
                                       <label for="inputEmail3" class="col-sm-2 col-form-label">To:</label>
                                       <div class="col-sm-10">
                                          <select name="receiver"  id="inputEmail3" class="form-control">
                                          <option value="">-- Select Reciever --</option>
                                          <?php
                                          
                                 
                                            $query = dbConnect()->prepare("SELECT * FROM users WHERE NOT email=?");
                                            $query->execute([$uEmail]);
                                            //  $connJobs = mysqli_query($connect2db,$queryJobs);
                                            while ($row=$query->fetch()) {
                                                $id = $row['id'];
                                                $email = $row['email'];
                                                $username = $row['lname'] . ' ' . $row['fname'];
                                                                                 
                                            
                                            
                                            ?>
                                            <option value="<?php echo $email; ?>"><?php echo $username.'  -  '.$email; ?></option>

                                            <?php }?>
                                          </select>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                       <label for="subject" class="col-sm-2 col-form-label">Subject:</label>
                                       <div class="col-sm-10">
                                          <input type="text" placeholder="Enter Subject Of Message Here..." name="subject" id="subject" class="form-control">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="subject" class="col-sm-2 col-form-label">Your Message:</label>
                                       <div class="col-md-10">
                                          <textarea class="textarea form-control" name="message" placeholder="Enter Message Here..." rows="5"></textarea>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center">
                                       <div class="d-flex flex-grow-1 align-items-center">
                                          <div class="send-btn pl-3">
                                             <button type="submit" name="submit" class="btn btn-primary">Send</button>
                                          </div>
                                          <!-- <div class="send-panel">
                                             <label class="ml-2 mb-0 iq-bg-primary rounded" for="file"> <input type="file" id="file" style="display: none"> <a><i class="ri-attachment-line"></i> </a> </label>
                                             <label class="ml-2 mb-0 iq-bg-primary rounded"> <a href="javascript:void();"> <i class="ri-map-pin-user-line text-primary"></i></a>  </label>
                                             <label class="ml-2 mb-0 iq-bg-primary rounded"> <a href="javascript:void();"> <i class="ri-drive-line text-primary"></i></a>  </label>
                                             <label class="ml-2 mb-0 iq-bg-primary rounded"> <a href="javascript:void();"> <i class="ri-camera-line text-primary"></i></a>  </label>
                                             <label class="ml-2 mb-0 iq-bg-primary rounded"> <a href="javascript:void();"> <i class="ri-user-smile-line text-primary"></i></a>  </label>
                                          </div> -->
                                       </div>
                                       <div class="d-flex mr-3 align-items-center">
                                          <div class="send-panel float-right">
                                              
                                             <!-- <label class="ml-2 mb-0 iq-bg-primary rounded" ><a href="javascript:void();"><i class="fa fa-cancel text-primary"></i></a></label> -->
                                             <!-- <label class="ml-2 mb-0 iq-bg-primary rounded"><a href="javascript:void();">  <i class="ri-delete-bin-line text-primary"></i></a>  </label> -->
                                          </div>
                                       </div>
                                    </div>
                                 </form>
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