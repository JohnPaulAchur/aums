<?php include 'header.php'; ?>


<div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">View Complain</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                         <div id="table" class="table-editable">
                           <table class="table table-bordered table-responsive-md table-striped text-center">
                             <thead>
                               <tr>
                                 <th>ID</th>
                                 <th width="3%">Image</th>
                                 <th>Employee</th>
                                 <th>Complaint Type</th>
                                 <th>Complaint Date</th>
                                 <th>Description</th>
                                 <th>Status</th>
                                 <th>Create On</th>
                               </tr>
                             </thead>
                             <tbody style="font-size: 12px;">
                             <?php

                              $n = 0;

                              $sql = dbConnect()->prepare("SELECT * FROM complain");
                              $sql->execute();
                              while ($row = $sql->fetch()) {
                                $n++;
                                $id = $row['id'];
                                $attachment = $row['attachment'];
                                $employee = $row['employee'];	
                                $complaint_type = $row['complaint_type'];	
                                $complaint_date = $row['complaint_date'];	
                                $desc = $row['description'];	
                                $status = $row['status'];	
                                $created = $row['created'];	
                              
                                      ?>
                            <tr>
                              <td scope="row"><?php echo $n ?></td>
                              <td><img style="max-width: 23px; max-height: 23px; border-radius: 10px;" src="images/complain/<?php echo $attachment; ?>"></td>
                              <td><?php echo $employee; ?></td>
                              <td><?php echo $complaint_type; ?></td>
                              <td><?php echo $complaint_date; ?></td>
                              <td><?php echo $desc; ?></td>
                              <td><?php echo $status; ?></td>
                              <td><?php echo $created; ?></td>
                             
                          <?php } ?>
                            </tr>

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


<?php include 'footer.php'; ?>