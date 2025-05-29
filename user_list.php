<?php include 'header.php';?>
<?php

   $id = $_SESSION['uid'];

?>
        <div id="content-page" class="content-page">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Employee List</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <div class="table-responsive">
                                    
                                    <table id="example" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                       <thead>
                                             <tr>
                                                <th>S/N</th>
                                                <th>Img</th>
                                                <th>Fullname</th>
                                                <th>Emp-Id</th>
                                                <th>Dept</th>
                                                <th>Role</th>
                                                <th>last_update</th>
                                                <th>update_by</th>
                                                <th>Actions</th>
                                             </tr>
                                       </thead>
                                       <tbody style="font-size: 12px;">
                                       <?php
                                          $fetching = dbConnect()->prepare("SELECT * FROM employee WHERE NOT id=?");
                                          $fetching->execute([$id]);
                                          $n = 0;
                                          while ($route=$fetching->fetch()) {
                                             $n++;
                                             $employid = $route['id'];
                                             $selDept = dbConnect()->prepare("SELECT dept_name FROM department WHERE id=?");
                                             $selDept->execute([$route['dept']]);
                                             $dept = $selDept->fetch()['dept_name'];
                                             ?>
                                             <tr>
                                                <td><?php echo $n ?></td>
                                                <td><a href="uploads/employee/<?php echo $route['emp_img'] ?>"><img style="width: 35px; height: 35px; border-radius: 10px;" src="uploads/employee/<?php echo $route['emp_img'] ?>" alt="" srcset=""></a></td>
                                                <td><?php echo $route['firstname'].' '.$route['lastname'] ?></td>
                                                <td><?php echo $route['emp_id'] ?></td>
                                                <td><?php echo $dept ?></td>
                                                <td><?php echo $route['role'] ?></td>
                                                <td><?php echo $route['last_update'] ?></td>
                                                <td><?php echo $route['update_by'] ?></td>
                                                <td>
                                                   <div class="flex align-items-center list-user-action">
                                                      <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="user_single?id=<?php echo $employid; ?>"><i class="las la-eye"></i></a>
                                                      <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="update_user?id=<?php echo $employid; ?>"><i class="ri-pencil-line"></i></a>
                                                      <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="delete_user?id=<?php echo $employid; ?>" onclick ="return confirm('Are you sure you want to delete employee?')"><i class="ri-delete-bin-line"></i></a>
                                                   </div>
                                                </td>
                                             </tr>
                                       <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                                    
                              </div>
                           </div>
                     </div>
                  </div>
                </div>
        </div>
<?php include 'footer.php';?>
