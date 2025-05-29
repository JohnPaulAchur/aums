<?php include 'header.php' ?>



<?php 

$msg = "";
if (isset($_POST['submit'])) {
    $title = check_input($_POST['title']);
    $designation = check_input($_POST['designation']);
    $nature = check_input($_POST['nature']);
    $age = check_input($_POST['age']);
    $salary = check_input($_POST['salary']);
    $exp = check_input($_POST['exp']);
    $vacancy = check_input($_POST['vacancy']);
    $cl_date = check_input($_POST['cl_date']);
    $desc = check_input($_POST['desc']);
    $status = 1;
    $created = date('Y-m-d');
    if ( empty($title) || empty($designation) || empty($nature) || empty($age) || empty($salary) || empty($exp) || empty($vacancy) || empty($cl_date) || empty($desc) ) {
    $msg = '<p style="color:red;">Not Added , All Fields Are Required !!!</p>';
    }else{
        $query = dbConnect()->prepare("INSERT INTO jobs SET title=?, nature=?, experience=?, age=?, status=?, close_date=?, description=?, salary=?, vacancy=?, type=?, created=?");
        if( $query->execute([$title,$nature,$exp,$age,$status,$cl_date,$desc,$salary,$vacancy,$designation,$created]) ){
            $msg = '<p style="color:green;">Operation Succesful !!!</p>';
            echo '<script>window.location="jobs_posted"</script>';
        }else{
            $msg = '<p style="color:red;">Oops , An Error Occured!!!</p>';
            echo '<script>window.location="jobs_posted"</script>';
        }
    }
    

    
}


?>

<!-- Page Content  -->
<div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Jobs Posted List</h4>
                        </div>
                        <?php
                            if ($msg!="") {
                                echo $msg;                                                            
                            }
                        ?>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-6">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <form class="mr-3 position-relative">
                                       <div class="form-group mb-0">
                                          <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                 <?php if ($_SESSION['urole'] == "Admin"){ ?>
                                     <a class="iq-bg-primary" href="javascript:void();" data-toggle="modal" data-target="#exampleModalScrollable">
                                       Add New
                                     </a>
                                     <?php } ?>
                                     <!-- Modal -->
                                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Recruitment Management</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="iq-card">
                                                    <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title">New Job Opportunity</h4>
                                                    </div>
                                                    </div>
                                                    <div class="iq-card-body">
                                                    <form method="POST">
                                                        <div class="form-group">
                                                            <label for="exampleInputText1">Job Title </label>
                                                            <input type="text" name="title" class="form-control" id="exampleInputText1"  placeholder="Enter Job Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="designation">Designation</label>
                                                            <input type="text" name="designation" list="nati" class="form-control" id="designation" placeholder="Enter Job Designation">
                                                            <datalist id="nati">
                                                                <option value="software dev">
                                                                <option value="Office">
                                                            </datalist>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="designation">Nature</label>
                                                            <input type="text" name="nature" list="nat" class="form-control" id="nature" placeholder="Enter Job Designation">
                                                            <datalist id="nat">
                                                                <option value="Full Time">
                                                                <option value="Part Time">
                                                                <option value="Contractual">
                                                            </datalist>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="age">Age</label>
                                                            <input type="text" name="age" class="form-control" id="age" placeholder="Enter Job Age Range">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="salary">Salary Range</label>
                                                            <input type="text" name="salary" class="form-control" id="salary" placeholder="Enter Job Salary Range">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="salary">Experience</label>
                                                            <input type="text" name="exp" list="exp" class="form-control" id="experience" placeholder="Enter Job Experience Range">
                                                            <datalist id="exp">
                                                                <option value="1 to 2 year(s)">
                                                                <option value="2 to 5 years">
                                                                <option value="5 to 10 years">
                                                            </datalist>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="vacancy">Vacancy</label>
                                                            <input type="number" name="vacancy" class="form-control" id="vacancy" placeholder="Enter Job vacancy">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputdate">Close Date</label>
                                                            <input name="cl_date" type="date" class="form-control" id="exampleInputdate">
                                                        </div>
                                                        
                                                        <div class="form-group">

                                                            <label for="exampleFormControlTextarea1">Description</label>
                                                            <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="5"></textarea>
                                                        </div>

                                                        
                                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                                        <!-- <button type="submit" class="btn iq-bg-danger">cancle</button> -->
                                                    </form>
                                                    </div>
                                                </div>                                                
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <a class="iq-bg-primary" href="javascript:void();">
                                       Excel
                                     </a>
                                     <a class="iq-bg-primary" href="javascript:void();">
                                       Pdf
                                     </a> -->
                                   </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    
                                    <th>Job Title</th>
                                    <th>Designation</th>
                                    <th>Vacancy</th>
                                    <th>Date Posted</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody style="font-size: 12px;">

                                 <?php
                                 
                                 $queryJobs = dbConnect()->prepare("SELECT * FROM jobs ORDER BY id DESC");
                                 $queryJobs->execute();
                                //  $connJobs = mysqli_query($connect2db,$queryJobs);
                                 while ($row=$queryJobs->fetch()) {
                                     $id = $row['id'];
                                     $title = $row['title'];
                                     $designation = $row['type'];
                                     $vacancy = $row['vacancy'];
                                     $posted_on = $row['created'];
                                     $status = $row['status'];
                                     $exp = $row['experience'];
                                     $salary = $row['salary'];
                                     $age = $row['age']; 
                                     $desc = $row['description']; 
                                     $nature = $row['nature'];
                                     $cl_date = $row['close_date'];                                  
                                 
                                 
                                 ?>
                                 <tr>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $designation; ?></td>
                                    <td><?php echo $vacancy; ?></td>
                                    <td><?php echo $posted_on; ?></td>
                                    <td>
                                        <?php
                                            if ($status == 1) {
                                                echo '<span class="badge iq-bg-success">Active</span></td>';
                                            }else{
                                                echo '<span class="badge iq-bg-danger">Expired</span></td>';
                                            }
                                        ?>
                                        
                                    <td>
                                    <div class="flex align-items-center list-user-action">
                                       
                                    <!-- view details modal -->
                                    <a class="iq-bg-primary" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $id; ?>"  href="javascript:void();"><i class="fa fa-eye"></i></a>
                                    <!-- view details body modal -->
                                    <div class="modal fade bd-example-modal-lg<?php echo $id; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title">Recruitment Management</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">

                                                <div class="iq-card">
                                                    <div class="iq-card-header d-flex justify-content-between">
                                                        <div class="iq-header-title">
                                                            <h2 class="card-title"><span class="badge iq-bg-success" > Job Opportunity Details</span></h2>
                                                        </div>
                                                    </div>
                                                    <div class="iq-card-body row">
                                                    
                                                        <div class="about-info m-0 p-0 col-md-12">
                                                            <hr>
                                                             <h4 class="mb-2"><span class="badge iq-bg-success">Title:</span> <?php echo $title; ?></h4>

                                                            <hr>
                                                        </div>
                                                        <hr>
                                                        <div class="about-info m-0 p-0 col-md-6">
                                                            
                                                            <div class="row">
                                                            
                                                            <div class="col-3">Designation:</div>
                                                            <div class="col-9"><p > <?php echo $designation; ?></p></div>
                                                           
                                                            <div class="col-3">Salary:</div>
                                                            <div class="col-9"><a href="#">₦<?php echo $salary; ?></a></div>
                                                            
                                                            <div class="col-3">Age:</div>
                                                            <div class="col-9"><?php echo $age; ?></div>
                                                            </div>
                                                            
                                                        </div>
                                                        

                                                        <div class="about-info m-0 p-0 col-md-6">
                                                            <div class="row">
                                                            
                                                            
                                                            <div class="col-3">Nature:</div>
                                                            <div class="col-9"><p> <?php echo $nature; ?> </p></div>
                                                           
                                                            <div class="col-3">Experience:</div>
                                                            <div class="col-9"><p><?php echo $exp; ?></p></div>
                                                            
                                                            <div class="col-3">Vacancy:</div>
                                                            <div class="col-9"><?php echo $vacancy; ?></div>
                                                            </div>
                                                        </div>

                                                        <div class="about-info m-0 p-0 col-md-6">
                                                            <hr>
                                                             <h5 class="mb-2"><span>Status:</span> </h5>
                                                            <?php 
                                                                if ($status == 1) {
                                                                    echo '<p class="iq-bg-success mb-2">Active</p> ';
                                                                }else{
                                                                    echo '<p class="iq-bg-danger mb-2">Expired</p> ';
                                                                }
                                                            ?>
                                                            
                                                        </div>
                                                        <div class="about-info m-0 p-0 col-md-6">
                                                            <hr>
                                                             <h5 class="mb-2"><span>Close Date:</span> </h5>
                                                            <p class="iq-bg-success mb-2"><?php echo $cl_date;?></p>
                                                        </div>
                                                        
                                                        <div class="about-info m-0 p-0 col-md-12">
                                                            <hr>
                                                             <h5 class="mb-2"><span class="badge iq-bg-success">Description:</span> </h5>

                                                            <p><?php echo $desc; ?></p> 
                                                        </div>

                                                        <hr>

                                                    </div>
                                                </div>

                                                

                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($_SESSION['urole'] == "Admin"){ ?>
                                    <!-- update modal  -->
                                    <a class="iq-bg-primary"  data-toggle="modal" data-target="#exampleModalScrollabl<?php echo $id; ?>" href=""><i class="ri-pencil-line"></i></a>
                                     <!-- Modal update detail -->
                                    <div class="modal fade" id="exampleModalScrollabl<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        
                                    <?php 
                                        // $queryJobs = dbConnect()->prepare("SELECT * FROM jobs WHERE id=?");
                                        // $queryJobs->execute([$id]);
                                        // if ($rowedit=$queryJobs->fetch()) 
                                            
                                        

                                    ?>
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Recruitment Management</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="iq-card">
                                                    <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title">Edit Job Opportunity</h4>
                                                    </div>
                                                    </div>
                                                    <div class="iq-card-body">
                                                    <form method="POST" action="jobs_edit?id=<?php echo $id ?>">
                                                        <div class="form-group">
                                                            <label for="exampleInputText1">Job Title</label>
                                                            <input type="text" name="edTitle" class="form-control" id="exampleInputText1" value="<?php echo $title; ?>"  placeholder="Enter Job Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="designation">Designation</label>
                                                            <input type="text" name="edDesignation" list="nati"  value="<?php echo $designation; ?>" class="form-control" id="designation" placeholder="Enter Job Designation">
                                                            <datalist id="nati">
                                                                <option value="software dev">
                                                                <option value="Office">
                                                            </datalist>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="designation">Nature</label>
                                                            <input type="text" name="edNature" list="nat"  value="<?php echo $nature; ?>" class="form-control" id="nature" placeholder="Enter Job Designation">
                                                            <datalist id="nat">
                                                                <option value="Full Time">
                                                                <option value="Part Time">
                                                                <option value="Contractual">
                                                            </datalist>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="age">Age</label>
                                                            <input type="text" name="edAge" class="form-control"  value="<?php echo $age; ?>" id="age" placeholder="Enter Job Age Range">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="salary">Salary Range</label>
                                                            <input type="text" name="edSalary"  value="<?php echo $salary; ?>" class="form-control" id="salary" placeholder="Enter Job Salary Range">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="salary">Experience</label>
                                                            <input type="text" name="edExp" list="exp" value="<?php echo $exp; ?>" class="form-control" id="experience" placeholder="Enter Job Experience Range">
                                                            <datalist id="exp">
                                                                <option value="1 to 2 year(s)">
                                                                <option value="2 to 5 years">
                                                                <option value="5 to 10 years">
                                                            </datalist>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="vacancy">Vacancy</label>
                                                            <input type="number" name="edVacancy"  value="<?php echo $vacancy; ?>" class="form-control" id="vacancy" placeholder="Enter Job vacancy">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputdate">Close Date</label>
                                                            <input name="edCl_date" type="date"  value="<?php echo $cl_date; ?>" class="form-control" id="exampleInputdate">
                                                        </div>
                                                        
                                                        <div class="form-group">

                                                            <label for="exampleFormControlTextarea1">Description</label>
                                                            <textarea class="form-control" name="edDesc" id="exampleFormControlTextarea1" rows="5">
                                                            <?php echo $desc; ?>
                                                            </textarea>
                                                        </div>

                                                        
                                                        <button type="submit" name="editbtn" class="btn btn-primary">Submit</button>
                                                        <!-- <button type="submit" class="btn iq-bg-danger">cancle</button> -->
                                                    </form>
                                                    </div>
                                                </div>                                                
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                         
                                    <!-- delete link -->
                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="jobs_del?id=<?php echo $id; ?>"><i class="ri-delete-bin-line"></i></a>
                                         
                                          
                                          <!--status link  -->
                                             <?php
                                            if ($status == 1) {
                                                echo '<a href="jobs_status?id=' . $id . '" class="iq-bg-danger">Deactivate</a>';
                                            }else{
                                                echo '<a href="jobs_status?id=' . $id . '" class="iq-bg-success">Activate</a>';
                                            }
                                        ?> 
                                         
                                          
                                         <?php } ?>
                                       </div>
                                    </td>
                                 </tr>

                                 <?php } ?>
                             </tbody>
                           </table>
                        </div>
                           <div class="row justify-content-between mt-3">
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