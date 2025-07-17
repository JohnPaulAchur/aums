<?php include 'header.php'; ?>
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Manage Memos</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Department</th>
                                    <th>Sender</th>
                                    <th>HOD ID</th>
                                    <th>Status</th>
                                    <!-- <th>Type</th> -->
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;">
                                <?php
                                $n = 0;
                                $role = $_SESSION['urole'];
                                $uEmail = $_SESSION['uemail'];

                                if (in_array($role, ['Admin', 'Director'])) {
                                    $stmt = dbConnect()->prepare("SELECT * FROM memos WHERE archived=0 ORDER BY id DESC");
                                    $stmt->execute();
                                } else {
                                    // Get dept_id of logged-in employee
                                    $getDept = dbConnect()->prepare("SELECT dept FROM employee WHERE email = ?");
                                    $getDept->execute([$uEmail]);
                                    $empData = $getDept->fetch();
                                    $dept_id = $empData['dept'] ?? 0;
                                    if($_SESSION['is_hod']==1){
                                        $stmt = dbConnect()->prepare("SELECT * FROM memos WHERE dept_id = ? AND archived=0 ORDER BY id DESC");
                                        $stmt->execute([$dept_id]);
                                    }else{
                                        $stmt = dbConnect()->prepare("SELECT * FROM memos WHERE dept_id = ? AND status='Actioned' AND archived=0 ORDER BY id DESC");
                                        $stmt->execute([$dept_id]);
                                    }

                                }

                                while ($row = $stmt->fetch()) {
                                    $n++;
                                    $id = $row['id'];
                                    $subject = $row['subject'];
                                    $message = $row['message'];
                                    $sender = $row['sender_name'];
                                    $dept = $row['dept_name'];
                                    $dept_id = $row['dept_id'];
                                    $hod_id = $row['hod_id'];
                                    $status = $row['status'];
                                    $type = $row['memo_type'];
                                    $created = $row['created'];

                                    $status_class = match ($status) {
                                        'Pending' => 'badge badge-warning',
                                        'Acknowledged' => 'badge badge-info',
                                        'Actioned' => 'badge badge-success',
                                        default => 'badge badge-secondary',
                                    };
                                ?>
                                    <tr>
                                        <td><?= $n ?></td>
                                        <td><?= htmlspecialchars($subject) ?></td>
                                        <td><?= htmlspecialchars($dept) ?></td>
                                        <td><?= htmlspecialchars($sender) ?></td>
                                        <td><?= htmlspecialchars($hod_id) ?></td>
                                        <td><span class="<?= $status_class ?>"><?= $status ?></span></td>
                                        <!-- <td><?= $type ?></td> -->
                                        <td><?= $created ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info view-btn" data-toggle="modal" data-target="#viewMemoModal"
                                                data-id="<?= $id ?>"
                                                data-subject="<?= htmlspecialchars($subject) ?>"
                                                data-message="<?= htmlspecialchars($message) ?>"
                                                data-sender="<?= htmlspecialchars($sender) ?>"
                                                data-dept="<?= htmlspecialchars($dept) ?>"
                                                data-status="<?= $status ?>"
                                                data-type="<?= $type ?>"
                                                data-created="<?= $created ?>">
                                                View
                                            </button>
                                            
                                            <?php if ($hod_id == $uEmail && $_SESSION['is_hod']==1){ ?>
                                                <?php if ($status == 'Pending'): ?>
                                                    <button class="btn btn-sm btn-success update-status" data-id="<?= $id ?>" data-next="Acknowledged">Acknowledge</button>
                                                <?php elseif ($status == 'Acknowledged'): ?>
                                                    <button class="btn btn-sm btn-primary update-status" data-id="<?= $id ?>" data-next="Actioned">Mark as Actioned</button>
                                                <?php endif; ?>
                                            <?php } ?>
                                            <?php if ($_SESSION['urole'] == "Director"){ ?>
                                                <a href="edit_memo.php?id=<?= $id ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <?php } ?>
                                            <?php if ($_SESSION['urole'] == "Admin" || $_SESSION['urole'] == "Director"){ ?>
                                                <button class="btn btn-sm btn-danger delete-memo" data-id="<?= $id ?>">Delete</button>
                                            <?php } ?>
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

<!-- View Memo Modal -->
<div class="modal fade" id="viewMemoModal" tabindex="-1" role="dialog" aria-labelledby="viewMemoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><strong>Memo Details</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Subject:</strong> <span id="modal-subject"></span></p>
        <p><strong>Department:</strong> <span id="modal-dept"></span></p>
        <p><strong>Sender:</strong> <span id="modal-sender"></span></p>
        <p><strong>Status:</strong> <span id="modal-status"></span></p>
        <p><strong>Type:</strong> <span id="modal-type"></span></p>
        <p><strong>Created:</strong> <span id="modal-created"></span></p>
        <p><strong>Message:</strong></p>
        <div style="white-space: pre-wrap;" id="modal-message" class="border p-2 bg-light"></div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<!-- Scripts -->
<script>
$(document).ready(function() {
    // View Modal
    $('.view-btn').click(function() {
        $('#modal-subject').text($(this).data('subject'));
        $('#modal-dept').text($(this).data('dept'));
        $('#modal-sender').text($(this).data('sender'));
        $('#modal-status').text($(this).data('status'));
        $('#modal-type').text($(this).data('type'));
        $('#modal-created').text($(this).data('created'));
        $('#modal-message').text($(this).data('message'));
    });

    // Update status
    $('.update-status').click(function() {
        const memoId = $(this).data('id');
        const nextStatus = $(this).data('next');

        if (confirm(`Are you sure you want to mark this memo as ${nextStatus}?`)) {
            $.post('update_memo_status.php', { id: memoId, status: nextStatus }, function(response) {
                alert(response.message);
                location.reload();
            }, 'json').fail(function() {
                alert('Failed to update memo status.');
            });
        }
    });

    // Delete memo
    $('.delete-memo').click(function() {
        const memoId = $(this).data('id');

        if (confirm('Are you sure you want to delete this memo?')) {
            $.post('delete_memo.php', { id: memoId }, function(response) {
                alert(response.message);
                location.reload();
            }, 'json').fail(function() {
                alert('Failed to delete memo.');
            });
        }
    });
});
</script>
