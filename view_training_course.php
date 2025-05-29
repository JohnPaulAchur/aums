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
                                 <th>#</th>
                                 <th>Course</th>
                                 <th>Cost</th>
                                 <th width="40%">Description</th>
                                 <th>Vendor</th>
                                 <th>Last Update</th>
                                 <th>Updated</th>
                                 <th>Created</th>
                                 <th>Action</th>
                               </tr>
                             </thead>
                             <tbody style="font-size: 12px;">
                               
                             <?php
										$n = 0;
                              $sql = dbConnect()->prepare("SELECT * FROM training_course");
                              $sql->execute();
										while ($row = $sql->fetch()) {
											$n++;
											$id = $row['id'];
											$course_name = $row['course_name'];	
											$cost = $row['cost'];	
											$desc = $row['description'];
											$vendor = $row['vendor'];
											$last = $row['last_update'];
											$update = $row['update_by'];
											$created = $row['created'];	
										
										?>
										<tr>
											<td scope="row"><?php echo $n ?></td>
											<td><?php echo $course_name; ?></td>
											<td><?php echo $cost; ?></td>
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
											<td><?php echo $vendor; ?></td>
											<td><?php echo $last; ?></td>
											<td><?php echo $update; ?></td>
											<td><?php echo $created; ?></td>
											<td style="font-size: 14px;">
											<a href="update_training_course?id=<?php echo $id; ?>" class="green"><i class="fa fa-edit"></i></a>
											<a href="del_training_course?id=<?php echo $id; ?>"  onclick ="return confirm('Are You Sure You Want To Delete this Training?')" class="red"><i class="fa fa-trash"></i></a>
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