<?php include 'header.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}


    $queryG = dbConnect()->prepare("SELECT * FROM group_tbl WHERE id=?");
    $queryG->execute([$id]);
    $rowG = $queryG->fetch();
    $groupName = $rowG['group_name'];
 ?>

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <!-- <div class="row"> -->
            <h3 class="p-2 border-top border-bottom"><i class="fa fa-group"></i> <?php echo $groupName; ?></h3>
               
                <div class="row m-4">

                <?php
                    

                    $queryM = dbConnect()->prepare("SELECT * FROM group_members WHERE group_id=?");
                    $queryM->execute([$id]);
                    while($row = $queryM->fetch()){
                            $employeeId = $row['employee_id'];

                            $queryEmp = dbConnect()->prepare("SELECT * FROM employee WHERE id=?");
                            $queryEmp->execute([$employeeId]);
                            $rowEmp = $queryEmp->fetch();
                            $fullname = $rowEmp['lastname'] . ' ' . $rowEmp['firstname'];
                            $empImg = $rowEmp['emp_img'];
                            $empEmail = $rowEmp['email'];
                
                
                ?>
                    <div class="col-xl-4 mb-4">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img
                                src="uploads/employee/<?php echo $empImg; ?>"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle"
                                />
                                <div class="ms-3 m-2">
                                <p class="fw-bold mb-1"><?php echo $fullname; ?></p>
                                <p class="text-muted mb-0"><?php echo $empEmail; ?></p>
                                </div>
                            </div>
                            <!-- <span class="badge rounded-pill badge-success">Active</span> -->
                                <!-- <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" name="empid[]" value="" class="custom-control-input bg-success" id="customCheck-2" >
                                    <label class="custom-control-label" for="customCheck-2">Select</label>
                                </div> -->
                            </div>
                        </div>
                        <div class="iq-card-footer border-top p-2 d-flex justify-content-around">
                            <a class="badge btn btn-link m-0" href="user_single?id=<?php echo $employeeId; ?>">
                                <i class="fa fa-user ms-2"></i>
                                Profile
                            </a>
                            <!-- <a
                            class="btn btn-link m-0 text-reset"
                            href="#"
                            role="button"
                            data-ripple-color="primary"
                            >Call<i class="fa fa-phone ms-2"></i
                            ></a> -->
                            <!-- <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline"> -->
                            <a onclick="return confirm('Are you sure you want to remove member ?')" href="delete-member?id=<?php echo $employeeId; ?>&group=<?php echo $id; ?>" class="badge text-danger btn btn-link m-0"><i class="fa fa-trash"></i></a>

                                <!-- </div> -->
                        </div>
                        </div>
                    </div>

                <?php } ?>
                 

                </div>

                <div class="p-2">
                <div class="">
                    <a href="add-members?id=<?php echo $id; ?>" class=" badge badge-success"><i class="fa fa-plus">Add more members</i></a>
                    <!-- <a href="group-members?id=<?php //echo $id; ?>" class=" badge badge-warning"><i class="fa fa-edit"></i></a> -->
                </div>
            </div>

            <!-- </div> -->
        </div>
    </div>


<?php include 'footer.php'; ?>