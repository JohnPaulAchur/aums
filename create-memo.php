<?php include 'header.php';

$fullname = $_SESSION['ufirstname'].' '.$_SESSION['ulastname'];
// $firstname = $_SESSION['ufirstname'];
// $uEmail = $_SESSION['uemail'];

$msg = "";

if (isset($_POST['submit'])) {
    $subject = check_input($_POST['subject']);
    $message = check_input($_POST['message']);
    $dept_id = check_input($_POST['dept_id']);
    // $staff_visibility = isset($_POST['staff_visibility']) ? 1 : 0;

    // Fetch department info
    $deptQuery = dbConnect()->prepare("SELECT * FROM department WHERE id = ?");
    $deptQuery->execute([$dept_id]);
    $dept = $deptQuery->fetch();
    $dept_name = $dept['dept_name'];
    $hod_email = $dept['hod'];

    // Fetch HOD info
    $hodQuery = dbConnect()->prepare("SELECT * FROM users WHERE email = ?");
    $hodQuery->execute([$hod_email]);
    $hod = $hodQuery->fetch();
    $receiverName = $hod['lname'] . ' ' . $hod['fname'];
    
    $sender_id = $uEmail; // assuming sender ID = email
    $sender_name = $fullname;
    $created = date('Y-m-d H:i:s');

    if (empty($subject) || empty($message) || empty($dept_id)) {
        $msg = '<p style="color:red;">All fields are required.</p>';
    } else {
        $query = dbConnect()->prepare("INSERT INTO memos SET subject=?, message=?, sender_id=?, sender_name=?, dept_id=?, dept_name=?, hod_id=?, created=?");
        $success = $query->execute([
            $subject,
            $message,
            $sender_id,
            $sender_name,
            $dept_id,
            $dept_name,
            $hod_email,
            $created,
        ]);

        if ($success) {
            echo '<script>alert("Memo Sent Successfully!"); window.location="manage-memo";</script>';
        } else {
            echo '<script>alert("An error occurred!"); window.location="create-memo";</script>';
        }
    }
}
?>

<!-- Page Content -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row row-eq-height">
            <div class="col-md-12">
                <div class="iq-card iq-border-radius-20">
                    <div class="iq-card-body">
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <h5 class="text-primary card-title"><i class="ri-pencil-fill"></i> Compose Memo</h5>
                            </div>
                            <div class="col-md-5 mb-3">
                                <?php if ($msg != "") echo $msg; ?>
                            </div>
                        </div>

                        <form method="POST" class="email-form">
                            <!-- Department Selection -->
                            <div class="form-group row">
                                <label for="dept_id" class="col-sm-2 col-form-label">To (Department):</label>
                                <div class="col-sm-10">
                                    <select name="dept_id" id="dept_id" class="form-control">
                                        <option value="">-- Select Department --</option>
                                        <?php
                                        $query = dbConnect()->prepare("SELECT d.*, u.fname, u.lname FROM department d JOIN users u ON d.hod = u.email");
                                        $query->execute();
                                        while ($row = $query->fetch()) {
                                            $deptName = $row['dept_name'];
                                            $hodFullName = $row['fname'] . ' ' . $row['lname'];
                                            echo '<option value="' . $row['id'] . '">' . $deptName . ' (' . $hodFullName . ' - HOD)</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <!-- Subject -->
                            <div class="form-group row">
                                <label for="subject" class="col-sm-2 col-form-label">Subject:</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Enter Memo Subject..." name="subject" id="subject" class="form-control">
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="form-group row">
                                <label for="message" class="col-sm-2 col-form-label">Your Message:</label>
                                <div class="col-md-10">
                                    <textarea class="textarea form-control" name="message" placeholder="Enter Memo Message..." rows="5"></textarea>
                                </div>
                            </div>

                            <!-- Staff Visibility -->
                            <!-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Share with Staff:</label>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="staff_visibility" name="staff_visibility">
                                        <label class="custom-control-label" for="staff_visibility">Yes, allow staff in selected department to view this memo.</label>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Submit -->
                            <div class="form-group row align-items-center">
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="send-btn pl-3">
                                        <button type="submit" name="submit" class="btn btn-primary">Send Memo</button>
                                    </div>
                                </div>
                                <div class="d-flex mr-3 align-items-center">
                                    <div class="send-panel float-right">
                                        <!-- Reserved for future actions -->
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div> <!-- card body -->
                </div> <!-- card -->
            </div> <!-- col -->
        </div> <!-- row -->
    </div> <!-- container -->
</div> <!-- content -->

<?php include 'footer.php'; ?>
