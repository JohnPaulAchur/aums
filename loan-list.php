<?php 
include 'header.php';
// session_start();

$urole = $_SESSION['urole'] ?? '';
$empuid = $_SESSION['empuid'] ?? '';

$msg = "";
if (isset($_POST['submit'])) {
    // Optional logic if needed
}

// Fetch loans based on user role
if ($urole === 'Admin') {
    $query = dbConnect()->prepare("SELECT * FROM loan ORDER BY created DESC");
    $query->execute();
} else {
    $query = dbConnect()->prepare("SELECT * FROM loan WHERE employee_id = ? ORDER BY created DESC");
    $query->execute([$empuid]);
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
                       <h4 class="card-title">Loan Application List</h4>
                    </div>
                 </div>
                 <div class="iq-card-body">
                    <div class="table-responsive">
                       <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                         <thead>
                             <tr>
                                <th>Loan Code</th>
                                <th>Emp. Name</th>
                                <th>Loan Amount (₦)</th>
                                <th>Amount Paid (₦)</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                             </tr>
                         </thead>
                         <tbody style="font-size: 12px;">
                             <?php
                             while ($row = $query->fetch()) {
                                 $id = $row['id'];
                                 $code = $row['code'];
                                 $empId = $row['employee_id'];

                                 // Get employee full name
                                 $queryEmp = dbConnect()->prepare("SELECT firstname, lastname FROM employee WHERE id=?");
                                 $queryEmp->execute([$empId]);
                                 $rowEmp = $queryEmp->fetch();
                                 $fullname = $rowEmp ? $rowEmp['firstname'].' '.$rowEmp['lastname'] : 'Unknown';

                                 $amount = $row['loan_amount'];
                                 $status = $row['status'];
                                 $created = $row['created'];
                                 $duration = $row['duration'];

                                 // Get amount paid from loan_payment table
                                 $amountPaid = 0;
                                 if (in_array($status, [1, 3])) {
                                     $paymentQuery = dbConnect()->prepare("SELECT SUM(amount_paid) as total_paid FROM loan_payment WHERE code = ?");
                                     $paymentQuery->execute([$code]);
                                     $paymentRow = $paymentQuery->fetch();
                                     $amountPaid = $paymentRow && $paymentRow['total_paid'] ? $paymentRow['total_paid'] : 0;
                                 }

                                 // Status badge label
                                 $statusLabel = '';
                                 $statusClass = '';
                                 if ($status == 0) {
                                     $statusLabel = 'Pending';
                                     $statusClass = 'iq-bg-warning';
                                 } elseif ($status == 1) {
                                     $statusLabel = 'Approved';
                                     $statusClass = 'iq-bg-success';
                                 } elseif ($status == 2) {
                                     $statusLabel = 'Declined';
                                     $statusClass = 'iq-bg-danger';
                                 } elseif ($status == 3) {
                                     $statusLabel = 'Cleared';
                                     $statusClass = 'iq-bg-info';
                                 }
                             ?>
                             <tr>
                                <td><?php echo htmlspecialchars($code); ?></td>
                                <td><?php echo htmlspecialchars($fullname); ?></td>
                                <td><?php echo number_format($amount, 2); ?></td>
                                <td><?php echo number_format($amountPaid, 2); ?></td>
                                <td><span class="badge <?php echo $statusClass; ?>"><?php echo $statusLabel; ?></span></td>
                                <td><?php echo htmlspecialchars($created); ?></td>
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <?php if($urole === 'Admin'): ?>
                                            <a class="iq-bg-primary" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $id; ?>" href="javascript:void(0);"><i class="fa fa-eye"></i></a>

                                            <?php if ($status == 0) { ?>
                                                <a onclick="return confirm('Are you sure you want to approve?')" href="approve-loan?id=<?php echo $id; ?>" class="iq-bg-success fa fa-check-circle"></a>
                                                <a onclick="return confirm('Are you sure you want to decline?')" href="decline-loan?id=<?php echo $id; ?>" class="iq-bg-danger fa fa-close"></a>
                                            <?php } else {
                                                // Already processed loans (approved, declined, cleared)
                                                echo '<i class="fa fa-check-circle text-muted"></i>';
                                            } ?>

                                        <?php else: ?>
                                            <!-- Non-admin users see only view icon -->
                                            <a class="iq-bg-primary" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $id; ?>" href="javascript:void(0);"><i class="fa fa-eye"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                             </tr>

                             <!-- Modal for loan details -->
                             <div class="modal fade bd-example-modal-lg<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Loan Details - <?php echo htmlspecialchars($code); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="iq-card-body row">
                                                <div class="col-md-12 about-info m-0 p-0">
                                                    <h4><span class="badge iq-bg-primary">Loan Code:</span> <?php echo htmlspecialchars($code); ?></h4>
                                                    <h4><span class="badge iq-bg-primary">Employee Name:</span> <?php echo htmlspecialchars($fullname); ?></h4>
                                                    <h4><span class="badge iq-bg-primary">Loan Amount:</span> ₦<?php echo number_format($amount, 2); ?></h4>
                                                    <h4><span class="badge iq-bg-primary">Loan Duration:</span> <?php echo htmlspecialchars($duration).' Month(s)'; ?></h4>
                                                    <?php if (in_array($status, [1, 3])): ?>
                                                        <h4><span class="badge iq-bg-primary">Amount Paid:</span> ₦<?php echo number_format($amountPaid, 2); ?></h4>
                                                    <?php endif; ?>
                                                    <h4><span class="badge iq-bg-primary">Status:</span> <?php echo $statusLabel; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                             </div>

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

<?php include 'footer.php'; ?>
