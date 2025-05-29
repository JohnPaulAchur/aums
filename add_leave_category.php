<?php include 'header.php'; ?>

<?php

if(isset($_POST['submit'])){
    $category = check_input($_POST['category']);
    $created = date('Y-m-d');

if (empty($category)) {
    echo "<script>alert('You Have Not Completed All Required Fields!')</script>";
}else{
    $reg = dbconnect()->prepare("INSERT INTO leave_category(category, created) VALUE(?, ?)");
    $reg->execute([$category, $created]);

if($reg){
    echo "<script> alert('Success, Category created successfully!');</script>";
    }
    else{
       echo "<script> alert ('Oops, Operation Failed !');</script>";
       }
    } 
}

?>


<!-- <div id="content-page" class="content-page">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Add New Leave Category</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <form method="POST">
                <div class="row">
                        <div class="form-group col-md-12">
                        <label for="category">Leave Category:</label>
                        <input name="category" type="text" class="form-control" placeholder="Add Leave Category..." >
                        </div>
                </div>
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
</div> -->









<div id="content-page" class="content-page">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Add Leave Category</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <div class="table-responsive">
                                    <div class="row justify-content-between">
                                       <div class="col-sm-12 col-md-12 mb-2">
                                          <div class="user-list-files d-flex float-right">
                                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                Add New
                                             </button>



                                             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                   <div class="modal-content">
                                                   <div class="iq-card">
                                                      <div class="iq-card-header d-flex justify-content-between">
                                                         <div class="iq-header-title">
                                                            <h4 class="card-title">Add Leave Category</h4>
                                                         </div>
                                                      </div>
                                                      <div class="iq-card-body">
                                                        <form method="POST">
                                                            <div class="row">
                                                                    <div class="form-group col-md-12">
                                                                    <label for="category">Leave Category:</label>
                                                                    <input name="category" type="text" class="form-control" placeholder="Add Leave Category..." >
                                                                    </div>
                                                            </div>
                                                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                      </div>
                                                   </div>
                                                   </div>
                                                </div>
                                             </div>





                                          </div>
                                       </div>
                                    </div>
                                    <table id="example" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                       <thead>
                                             <tr>
                                                <th width="5%">S/N</th>
                                                <th>Category</th>
                                                <th width="10%">Created</th>
                                                <th width="10%">Actions</th>
                                             </tr>
                                       </thead>
                                       <tbody>
                                       <?php
                                          $fetching = dbConnect()->prepare("SELECT * FROM leave_category");
                                          $fetching->execute();
                                          $n = 0;
                                          while ($route=$fetching->fetch()) {
                                             $n++;
                                             $id = $route['id'];
                                             ?>
                                             <tr>
                                                <td><?php echo $n ?></td>
                                                <td><?php echo $route['category'] ?></td>
                                                <td><?php echo $route['created'] ?></td>
                                                <td>
                                                   <div class="flex align-items-center list-user-action">
                                                      <!-- <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#update_department?id=<?php echo $deptid; ?>"><i class="ri-pencil-line"></i></a> -->
                                                      <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#delete_department?id=<?php echo $deptid; ?>" onclick ="return confirm('Are you sure you want to delete department?')"><i class="ri-delete-bin-line"></i></a>
                                                   </div>
                                                </td>
                                             </tr>
                                       <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                                    <!-- <div class="row justify-content-between mt-3">
                                       <div id="user-list-page-info" class="col-md-6">
                                          <span>Showing 1 to 5 of 5 entries</span>
                                       </div>
                                       <div class="col-md-6">
                                          <nav aria-label="Page navigation example">
                                             <ul class="pagination justify-content-end mb-0">
                                                <li class="page-item disabled">
                                                   <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                   <a class="page-link" href="#">Next</a>
                                                </li>
                                             </ul>
                                          </nav>
                                       </div>
                                    </div> -->
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </div>






<?php include 'footer.php';?>