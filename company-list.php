<?php include 'header.php'; ?>

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <!-- <div class="row"> -->
            <h4 class="p-2 border-top"><i class="fa fa-group"></i> Company List</h4>
               
                <ul class="list-group list-group-light rounded-pill">
        
                <?php
                $query = dbConnect()->prepare("SELECT * FROM company_tbl ORDER BY id DESC");
                $query->execute();
                while ( $row  = $query->fetch() ){
                    $companyName = $row['company_name'];
                    $companyImg = $row['img'];
                    $id = $row['id'];
                    $address = $row['address'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $contactPersonF = $row['fname'];
                    $contactPersonL = $row['lname'];
                    

                    $queryM = dbConnect()->prepare("SELECT * FROM company_assign WHERE company_id=?");
                    $queryM->execute([$id]);
                    $assignNo = $queryM->rowCount();

                
                
                ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="company-details?id=<?php echo $id; ?>" class="d-flex align-items-center">
                    
                    <img src="uploads/employee/<?php echo $companyImg; ?>" alt="" style="width: 45px; height: 45px"
                        class="rounded-circle m-2" />
                    <div class="ms-3">
                        <h4 class="fw-bold mb-1"><?php echo $companyName; ?></h4>
                        <p class="text-muted mb-0"><span class="text-dark"><?php echo $assignNo; ?></span> Employee(s) Assigned </p>
                    </div>
                </a>
                    <div>
                        <a href="company-details?id=<?php echo $id; ?>"><i class="fa fa-eye text-success"></i></a>
                        <!-- edit -->
                        <a data-toggle="modal" data-target="#gridSystemModal<?php echo $id; ?>" class=""><i class="fa fa-edit text-info"></i></a>
                        <!-- edit body -->
                        <div id="gridSystemModal<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                
                                <form action="update-company?id=<?php echo $id; ?>" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="gridModalLabel">Edit Company Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="group">Company/Client Name:</label>
                                                <input name="edcompany" value="<?php echo $companyName; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                <!-- <input type="hidden" value="Technical" name="tab"> -->
                                            </div>

                                            <div class="form-group">
                                                <label for="group">Contact Person Last Email:</label>
                                                <input name="email" value="<?php echo $email; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                <input name="oldemail" value="<?php echo $email; ?>" type="hidden" class="form-control" id="group" placeholder="Enter desired group name...">

                                                <!-- <input type="hidden" value="Technical" name="tab"> -->
                                            </div>

                                            <div class="form-group">
                                                <label for="group">Company/Client Phone:</label>
                                                <input name="phone" value="<?php echo $phone; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                <!-- <input type="hidden" value="Technical" name="tab"> -->
                                            </div>

                                            <div class="form-group">
                                                <label for="group">Company/Client Address:</label>
                                                <input name="address" value="<?php echo $address; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                <!-- <input type="hidden" value="Technical" name="tab"> -->
                                            </div>

                                            <div class="form-group">
                                                <label for="group">Contact Person First Name:</label>
                                                <input name="fname" value="<?php echo $contactPersonF; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                <!-- <input type="hidden" value="Technical" name="tab"> -->
                                            </div>

                                            <div class="form-group">
                                                <label for="group">Contact Person Last Name:</label>
                                                <input name="lname" value="<?php echo $contactPersonL; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                <!-- <input type="hidden" value="Technical" name="tab"> -->
                                            </div>

                                            

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="edsubmit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <a onclick="return confirm('Are you sure you want to delete the group ?')" href="company-del?id=<?php echo $id; ?>" ><i class="fa fa-trash text-danger"></i></a>
                    </div>
                    
                </li>

                <?php } ?>
                
                </ul>
            <!-- </div> -->
        </div>
    </div>


<?php include 'footer.php'; ?>