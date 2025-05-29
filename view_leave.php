<?php include 'header.php'; ?>
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">View Leave Record</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee</th>
                                        <th>Leave Category</th>
                                        <th>Duration</th>
                                        <th>Start Date</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">
                                    <?php
                                    $n = 0;
                                    $session_email = $_SESSION['uemail'];
                                    $session_role = $_SESSION['urole'];

                                    if ($session_role == 'Admin') {
                                        $sql = dbConnect()->prepare("SELECT * FROM leave_app ORDER BY id DESC");
                                    } else {
                                        $sql = dbConnect()->prepare("SELECT * FROM leave_app WHERE applicant = ? ORDER BY id DESC");
                                        $sql->bindParam(1, $session_email);
                                    }

                                    $sql->execute();

                                    while ($row = $sql->fetch()) {
                                        $n++;
                                        $id = $row['id'];
                                        $applicant_email = $row['applicant'];
                                        $category = $row['type'];
                                        $duration = $row['duration'];
                                        $start_date = $row['start_date'];
                                        $status = $row['status'];
                                        $desc = $row['note'];
                                        $created = $row['created'];

                                        // Get employee details
                                        $emp_stmt = dbConnect()->prepare("SELECT id, firstname, lastname FROM employee WHERE email = ?");
                                        $emp_stmt->execute([$applicant_email]);
                                        $emp = $emp_stmt->fetch();
                                        $emp_name = $emp ? $emp['firstname'] . ' ' . $emp['lastname'] : 'Unknown';
                                        $emp_id = $emp['id'] ?? 0;

                                        // Status badge
                                        $status_class = match ($status) {
                                            'Pending' => 'badge badge-warning',
                                            'Approved' => 'badge badge-success',
                                            'Declined' => 'badge badge-danger',
                                            default => 'badge badge-secondary',
                                        };
                                    ?>
                                        <tr>
                                            <td><?= $n ?></td>
                                            <td>
                                                <a href="user_single?id=<?= $emp_id ?>"><?= htmlspecialchars($emp_name) ?></a>
                                            </td>
                                            <td><?= htmlspecialchars($category) ?></td>
                                            <td><?= htmlspecialchars($duration) ?></td>
                                            <td><?= htmlspecialchars($start_date) ?></td>
                                            <td><span class="<?= $status_class ?>"><?= htmlspecialchars($status) ?></span></td>
                                            <td><?= strlen($desc) > 20 ? htmlspecialchars(substr($desc, 0, 20)) . '...' : htmlspecialchars($desc) ?></td>
                                            <td><?= htmlspecialchars($created) ?></td>
                                            <td style="font-size: 14px;">
                                                <?php if ($session_role === 'Admin'): ?>
                                                    <?php if ($status === 'Pending'): ?>
                                                        <button class="btn btn-sm btn-success approve-btn" data-id="<?= $id ?>">Approve</button>
                                                        <button class="btn btn-sm btn-danger decline-btn" data-id="<?= $id ?>">Decline</button>
                                                    <?php endif; ?>
                                                    <button class="btn btn-sm btn-info view-btn" data-toggle="modal" data-target="#viewModal"
                                                        data-id="<?= $id ?>"
                                                        data-name="<?= htmlspecialchars($emp_name) ?>"
                                                        data-category="<?= htmlspecialchars($category) ?>"
                                                        data-duration="<?= htmlspecialchars($duration) ?>"
                                                        data-start="<?= htmlspecialchars($start_date) ?>"
                                                        data-status="<?= htmlspecialchars($status) ?>"
                                                        data-desc="<?= htmlspecialchars($desc) ?>"
                                                        data-created="<?= htmlspecialchars($created) ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                <?php endif; ?>
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

<!-- View Details Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel">Leave Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Employee:</strong> <span id="modal-emp-name"></span></p>
        <p><strong>Category:</strong> <span id="modal-category"></span></p>
        <p><strong>Duration:</strong> <span id="modal-duration"></span></p>
        <p><strong>Start Date:</strong> <span id="modal-start"></span></p>
        <p><strong>Status:</strong> <span id="modal-status"></span></p>
        <p><strong>Description:</strong> <span id="modal-desc"></span></p>
        <p><strong>Created:</strong> <span id="modal-created"></span></p>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<!-- AJAX and Modal Script -->
<script>
$(document).ready(function() {
    $('.approve-btn, .decline-btn').on('click', function() {
        const leaveId = $(this).data('id');
        const action = $(this).hasClass('approve-btn') ? 'Approved' : 'Declined';

        if (!confirm(`Are you sure you want to ${action.toLowerCase()} this leave?`)) return;

        $.ajax({
            url: 'leave_action.php',
            type: 'POST',
            data: { id: leaveId, action: action },
            dataType: 'json',
            success: function(res) {
                alert(res.message);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Failed to update leave status. Try again.');
            }
        });
    });

    $('.view-btn').on('click', function() {
        $('#modal-emp-name').text($(this).data('name'));
        $('#modal-category').text($(this).data('category'));
        $('#modal-duration').text($(this).data('duration'));
        $('#modal-start').text($(this).data('start'));
        $('#modal-status').text($(this).data('status'));
        $('#modal-desc').text($(this).data('desc'));
        $('#modal-created').text($(this).data('created'));
    });
});
</script>
