<?php include 'header.php'; ?>
<?php
$firstname = $_SESSION['ufirstname'];
$lastname = $_SESSION['ulastname'];

if (isset($_POST['submit'])) {
    $deptname = check_input($_POST['deptname']);
    $hod = check_input($_POST['selecthod']);
    $last_update = date('h-m-s Y-m-d');
    $fullname = $firstname . ' ' . $lastname;
    $created = date('Y-m-d');

    if (empty($deptname) || empty($hod)) {
        echo "<script>alert('Please fill in all inputs')</script>";
    } else {
        $check = dbConnect()->prepare("SELECT dept_name FROM department WHERE dept_name = ?");
        $check->execute([$deptname]);
        if ($check->rowCount() > 0) {
            echo "<script>alert('Department name already exists')</script>";
        } else {
            $insert = dbConnect()->prepare("INSERT INTO department(dept_name, hod, last_update, update_by, created) VALUES(?,?,?,?,?)");
            $insert->execute([$deptname, $hod, $last_update, $fullname, $created]);
            if ($insert) {
                echo "<script>alert('Department Created Successfully')</script>";
            } else {
                echo "<script>alert('Oops operation failed, please try again')</script>";
            }
        }
    }
}
?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Department List</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="row justify-content-between">
                                <div class="col-sm-12 col-md-12 py-2">
                                    <div class="user-list-files d-flex ">
                                        <?php if ($_SESSION['urole'] == "Admin"): ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                Add New
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Department Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="iq-card">
                                            <div class="iq-card-header d-flex justify-content-between">
                                                <div class="iq-header-title">
                                                    <h4 class="card-title">Add Department Form</h4>
                                                </div>
                                            </div>
                                            <div class="iq-card-body">
                                                <form method="POST">
                                                    <div class="form-group">
                                                        <label for="deptname">Department Name:</label>
                                                        <input name="deptname" type="text" class="form-control" id="deptname">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="selecthod">Head of Department (H.O.D):</label>
                                                        <select name="selecthod" class="form-control">
                                                            <option selected value="">-- select --</option>
                                                            <?php
                                                            $getUsrs = dbConnect()->prepare("SELECT * FROM employee");
                                                            $getUsrs->execute();
                                                            while ($data = $getUsrs->fetch()) {
                                                                ?>
                                                                <option value="<?= $data['email'] ?>"><?= $data['lastname'] . ' ' . $data['firstname'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-primary">Create</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->

                            <table id="example" class="table table-striped table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Head of Department</th>
                                        <th>Department Name</th>
                                        <th>Last Update</th>
                                        <th>Updated By</th>
                                        <th>Created</th>
                                        <?php if ($_SESSION['urole'] == "Admin"): ?>
                                            <th>Actions</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">
                                    <?php
                                    $fetching = dbConnect()->prepare("
                                        SELECT 
                                            department.id, department.hod, department.dept_name, 
                                            department.last_update, department.update_by, department.created,
                                            employee.firstname, employee.lastname, employee.id AS emp_id, employee.emp_img
                                        FROM department
                                        LEFT JOIN employee ON department.hod = employee.email
                                    ");
                                    $fetching->execute();
                                    $n = 0;
                                    $modalContent = ""; // Capture modals here

                                    while ($route = $fetching->fetch()) {
                                        $n++;
                                        $deptid = $route['id'];
                                        $deptName = $route['dept_name'];
                                        ?>
                                        <tr>
                                            <td><?= $n ?></td>
                                            <td>
                                                <img style="width: 35px; height: 35px; border-radius: 10px;" src="uploads/employee/<?= $route['emp_img'] ?>" alt="">
                                                <a class="m-2 fw-bold text-dark" href="user_single?id=<?= $route['emp_id'] ?>">
                                                    <?= $route['lastname'] . " " . $route['firstname'] ?>
                                                </a>
                                            </td>
                                            <td><?= $deptName ?></td>
                                            <td><?= $route['last_update'] ?></td>
                                            <td><?= $route['update_by'] ?></td>
                                            <td><?= $route['created'] ?></td>
                                            
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                      <?php if ($_SESSION['urole'] == "Admin"): ?>
                                                      <!-- <a class="iq-bg-primary" title="Edit" href="update_department?id=<?= $deptid ?>"><i class="ri-pencil-line"></i></a> -->
                                                      <?php endif; ?>
                                                      <a class="iq-bg-info" data-toggle="modal" data-target="#viewMembersModal<?= $deptid ?>" title="View Members"><i class="ri-eye-line"></i></a>
                                                    </div>
                                                </td>
                                        </tr>

                                        <?php
                                        // Buffer modal content
                                        ob_start();
                                        ?>
                                        <div class="modal fade" id="viewMembersModal<?= $deptid ?>" tabindex="-1" role="dialog" aria-labelledby="viewMembersModalLabel<?= $deptid ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewMembersModalLabel<?= $deptid ?>">Department Members: <?= htmlspecialchars($deptName) ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Image</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $members = dbConnect()->prepare("SELECT * FROM employee WHERE dept = ?");
                                                                $members->execute([$deptid]);
                                                                $sn = 1;
                                                                while ($member = $members->fetch()) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= $sn++ ?></td>
                                                                        <td><?= $member['lastname'] . ' ' . $member['firstname'] ?></td>
                                                                        <td><?= $member['email'] ?></td>
                                                                        <td><img src="uploads/employee/<?= $member['emp_img'] ?>" style="width: 35px; height: 35px; border-radius: 5px;"></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $modalContent .= ob_get_clean(); // Append buffered modal
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <!-- Print all modals after table -->
                            <?= $modalContent ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
