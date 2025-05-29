<?php include 'header.php'; ?>


<div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">View Complaint Type</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                         <div id="table" class="table-editable">
                           <table class="table table-bordered table-responsive-md table-striped text-center">
                             <thead>
                               <tr>
                                 <th>ID</th>
                                 <th>Complaint Type</th>
                                 <th>Created On</th>
                               </tr>
                             </thead>
                             <tbody style="font-size: 12px;">
                             <?php

                              $n = 0;

                              $sql = dbConnect()->prepare("SELECT * FROM complaint_type");
                              $sql->execute();
                              while ($row = $sql->fetch()) {
                                $n++;
                                $id = $row['id'];
                                $type = $row['type'];	
                                $created = $row['created'];	
                              
                                      ?>
                            <tr>
                              <td scope="row"><?php echo $n ?></td>
                              <td><?php echo $type; ?></td>
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