<?php include 'header.php'; ?>



<div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">View Training Courses</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                         <div id="table" class="table-editable">
                           <table id="example" class="table table-bordered table-responsive-md table-striped text-center">
                             <thead>
                               <tr>
                                 <th>ID</th>
                                 <th>Employee Name</th>
                                 <th>Course</th>
                                 <th>Vendor</th>
                                 <th>Training Cost</th>
                                 <th>Start Date</th>
                                 <th>Finish Date</th>
                                 <th>Status</th>
                                 <th>Performance</th>
                                 <th width="40%">Description</th>
                                 <th>Created On</th>
                                 <th>Action</th>
                               </tr>
                             </thead>
                             <tbody style="font-size: 12px;">
                               
                             <?php

                              $n = 0;

                              $sql = dbConnect()->prepare("SELECT * FROM training");
                              $sql->execute();
                              while ($row = $sql->fetch()) {
                                $n++;
                                $id = $row['id'];
                                $employee = $row['employee'];	
                                $course_name = $row['course'];	
                                $vendor = $row['vendor'];	
                                $start_date = $row['start_date'];	
                                $finish_date = $row['finish_date'];	
                                $cost = $row['cost'];	
                                $status = $row['status'];	
                                $performance = $row['performance'];	
                                $desc = $row['remarks'];	
                                $created = $row['created'];	
                              
                                      ?>
                            <tr>
                              <td scope="row"><?php echo $n ?></td>
                              <td><?php echo $employee; ?></td>
                              <td><?php echo $course_name; ?></td>
                              <td><?php echo $vendor; ?></td>
                              <td><?php echo $start_date; ?></td>
                              <td><?php echo $finish_date; ?></td>
                              <td><?php echo $cost; ?></td>
                              <td><?php echo $status; ?></td>
                              <td><?php echo $performance; ?></td>
                              <td>
                                  <?php
                                  // echo $desc;
                                    if (strlen($desc)>150) {
                                        echo substr($desc,0,100).'...';
                                    }else {
                                        echo $desc;
                                    }
                                  ?>
                              </td>
                              <td><?php echo $created; ?></td>
                              <td>
                              <a href="update_training?id=<?php echo $id; ?>" class="green"><i class="fa fa-edit"></i></a>
                              <a href="del_training?id=<?php echo $id; ?>"  onclick ="return confirm('Are You Sure You Want To Delete This Training Course?')" class="red"><i class="fa fa-trash"></i></a>
                              </td>
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