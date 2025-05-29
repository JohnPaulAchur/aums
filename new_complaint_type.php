<?php include 'header.php'; ?>

<?php
// Handle deletion if 'delete' GET param is set
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    $del_stmt = dbConnect()->prepare("DELETE FROM complaint_type WHERE id = ?");
    $del_stmt->execute([$delete_id]);
    echo "<script>alert('Complaint type deleted.'); window.location='".$_SERVER['PHP_SELF']."';</script>";
}

// Handle form submission
if (isset($_POST['submit'])) {
    $type = check_input($_POST['type']);
    $created = date('Y-m-d');

    if (empty($type)) {
        echo "<script>alert('You Have Not Completed All Required Fields!')</script>";
    } else {
        $reg = dbConnect()->prepare("INSERT INTO complaint_type(type, created) VALUES(?, ?)");
        $reg->execute([$type, $created]);

        if ($reg) {
            echo "<script>alert('Success, Complaint Type created successfully!');</script>";
        } else {
            echo "<script>alert('Oops, Operation Failed!');</script>";
        }
    }
}
?>

<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Add New Complaint Category</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="type">Complaint Type:</label>
                                    <input name="type" type="text" class="form-control" placeholder="Add Complaint Type...">
                                </div>
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Displaying Existing Complaint Types -->
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Existing Complaint Types</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Complaint Type</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 13px;">
                                    <?php
                                    $n = 0;
                                    $stmt = dbConnect()->prepare("SELECT * FROM complaint_type ORDER BY id DESC");
                                    $stmt->execute();
                                    while ($row = $stmt->fetch()) {
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?= $n ?></td>
                                            <td><?= htmlspecialchars($row['type']) ?></td>
                                            <td><?= htmlspecialchars($row['created']) ?></td>
                                            <td>
                                                <a href="?delete=<?= $row['id'] ?>" 
                                                   onclick="return confirm('Are you sure you want to delete this complaint type?')"
                                                   class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($n === 0): ?>
                                        <tr><td colspan="4">No complaint types found.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>
