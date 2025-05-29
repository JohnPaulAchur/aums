<?php
$uEmail = $_SESSION['uemail'];


if ($uEmail) {
   // Connect to the database
   $pdo = dbConnect();

   // Prepare and execute query to get employee id by email
   $sql = "SELECT id FROM employee WHERE email = :email LIMIT 1";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(['email' => $uEmail]);

   // Fetch the employee id
   $empuid = $stmt->fetchColumn();

   if ($empuid) {
       // Employee id found
       $_SESSION['empuid'] = $empuid;
      //  echo "Employee ID: " . $empuid;
   } else {
       // No employee found
      //  echo "No employee found with email: " . htmlspecialchars($uEmail);
       $empuid = null;
   }
} else {
   // echo "User email not set in session.";
   $empuid = null;
}




$grp = dbConnect()->prepare("Select count(id) as no FROM group_tbl");
$grp->execute();
$res = $grp->fetch();
$AllGroupsCount = $res['no'];



$jobs = dbConnect()->prepare("Select count(id) as no FROM jobs");
$jobs->execute();
$res = $jobs->fetch();
$AllJobsCount = $res['no'];


$complaintsLogged = dbConnect()->prepare("Select count(id) as no FROM complain where employee=?");
$complaintsLogged->execute([$_SESSION['uemail']]);
$res = $complaintsLogged->fetch();
$AllcomplaintsLogged = $res['no'];




$loanApp = dbConnect()->prepare("SELECT COUNT(id) as no, SUM(loan_amount) as loanSum FROM loan WHERE employee_id=?");
$loanApp->execute([$empuid]);
$res = $loanApp->fetch();
$AllloanApp = $res['no'];
$loanSumRaw = $res['loanSum'];

// Function to format loan sum
function formatLoanSum($amount) {
    if ($amount >= 1_000_000_000) {
        return round($amount / 1_000_000_000, 2) . 'B';
    } elseif ($amount >= 1_000_000) {
        return round($amount / 1_000_000, 2) . 'M';
    } elseif ($amount >= 1_000) {
        return round($amount / 1_000, 2) . 'K';
    } else {
        return $amount;
    }
}

$loanSum = formatLoanSum($loanSumRaw);






$emp = dbConnect()->prepare("Select count(id) as no FROM employee WHERE status=1");
$emp->execute();
$r = $emp->fetch();
$ActiveEmp = $r['no'];

$mon = date('m');
$y = date('Y');

$pa =dbConnect()->prepare("SELECT sum(net) as net, sum(total_deduction) as ded FROM  payment_activity WHERE month=? AND year=? ");
$pa->execute([$mon, $y]);
$rr = $pa->fetch();
$payroll = $rr['net']/1000000;
if($payroll > 1){
    $payroll = number_format($payroll).'M';
}
else{
    $payroll = 0;
}

$deduction = $rr['ded']/1000000;
if($deduction > 1){
    $deduction = number_format($deduction).'M';
}
else{
    $deduction = 0;
}

?>