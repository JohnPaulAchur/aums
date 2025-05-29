<?php include 'header.php';

if (isset($_GET['code'])) {
    $code = $_GET['code'];
}

$query = dbConnect()->prepare("SELECT * FROM payment_activity WHERE code=?");
$query->execute([$code]);
$row = $query->fetch();

$id = $row['id'];

$empId = $row['employee_id'];

//get employee name and emp No

$queryEmp = dbConnect()->prepare("SELECT * FROM employee WHERE id=?");
$queryEmp->execute([$empId]);
$rowEmp = $queryEmp->fetch();

$fullname = $rowEmp['firstname'] . ' ' . $rowEmp['lastname'];
$empNo = $rowEmp['emp_id'];

// get employee END



//get grade of salary
$grade = $row['grade'];
// get grade END

$basicSalary = $row['basic'];
//allowances Amount
$allowSum = $row['total_allowance'];

//gross
$gross = $basicSalary + $allowSum;
//gross END

//basic dedeuction
$basicDeduction = $row['total_deduction'];

//tax
$taxAmount = $row['tax'];

//loan
$loanAmount = $row['loan'];

//grand deduction
$grandDeduction = $row['grand_deduction'];

// grand deduction END

$created = $row['created'];

$month = $row['month'];

if($month==1){
    $month = "Jan";
}
elseif($month==2){
    $month = "Feb";
}elseif($month==3){
    $month = "Mar";
}
elseif($month==4){
    $month = "Apr";
}
elseif($month==5){
    $month = "May";
}
elseif($month==6){
    $month = "Jun";
}elseif($month==7){
    $month = "Jul";
}
elseif($month==8){
    $month = "Aug";
}
elseif($month==9){
    $month = "Sep";
}
elseif($month==10){
    $month = "Oct";
}elseif($month==11){
    $month = "Nov";
}
elseif($month==12){
    $month = "Dec";
}

$year = $row['year'];




$netAmount = $row['net'];

?>



<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">

                    <div class="iq-card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <img src="images/logo.png" class="img-fluid w-25" alt="">
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <h4 class="mb-0 float-right">Pay Slip</h4>
                            </div>

                        </div>

                        <div class="row">
                            <div id="payslip" class="col-md-12 p-5">
                                <div id="title">Payslip</div>
                                <div id="scope">
                                    <div class="scope-entry">
                                        <div class="title">PAY RUN</div>
                                        <div class="value"><?php echo $month.', '.$year ?></div>
                                    </div>
                                    <div class="scope-entry">
                                        <div class="title">PAY PERIOD</div>
                                        <div class="value"><?php echo $month.', '.$year ?></div>
                                    </div>
                                </div>
                                <div class="content" style="height: 800px;">
                                    <div class="left-panel">
                                        <div id="employee">
                                            <div id="name">
                                                AUMS
                                            </div>
                                            <div id="email">
                                                info@aums.com
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="entry">
                                                <div class="label">Employee:</div>
                                                <div class="value"><?php echo $empNo ?></div>
                                            </div>
                                            <div class="entry">
                                                <div class="label">Basic Salary</div>
                                                <div class="value">₦<?php echo number_format($basicSalary,2) ?></div>
                                            </div>
                                           
                                        </div>
                                        <div class="contributions">
                                            <div class="title">Employer Contribution</div>
                                            <div class="entry">
                                                <div class="label">Tax</div>
                                                <div class="value">₦<?php echo number_format($taxAmount,2) ?></div>
                                            </div>
                                            <div class="entry">
                                                <div class="label">Loan</div>
                                                <div class="value">₦<?php echo number_format($loanAmount,2) ?></div>
                                            </div>
                                        </div>
                                        <div class="ytd">
                                            <div class="title">Payment Overview</div>
                                            <div class="entry">
                                                <div class="label">Salary</div>
                                                <div class="value">₦<?php echo number_format($basicSalary,2); ?></div>
                                            </div>
                                            <div class="entry">
                                                <div class="label">Allowance</div>
                                                <div class="value">₦<?php echo number_format($allowSum,2); ?></div>
                                            </div>
                                            <div class="entry">
                                                <div class="label">Gross</div>
                                                <div class="value">₦<?php echo number_format($gross,2); ?></div>
                                            </div>
                                            <div class="entry">
                                                <div class="label">Deduction</div>
                                                <div class="value">₦<?php echo number_format($grandDeduction,2); ?></div>
                                            </div>
                                            <div class="entry">
                                                <div class="label">Net Pay</div>
                                                <div class="value">₦<?php echo number_format($netAmount,2); ?></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="right-panel">
                                        <div class="details">
                                        <div class="basic-pay">
                                                <div class="entry">
                                                    <div class="label">Employee Name</div>
                                                    <div class="detail"><?php echo $fullname; ?></div>
                                                    <!-- <div class="rate"><?php // echo $basicSalary ?>/Month</div> -->
                                                    <div class="amount"></div>
                                                </div>
                                            </div>

                                            <div class="basic-pay">
                                                <div class="entry">
                                                    <div class="label">Salary Grade</div>
                                                    <div class="detail"><?php echo $grade ?></div>
                                                    <!-- <div class="rate">₦<?php //echo $GradeName ?>/Month</div> -->
                                                    <div class="amount"></div>
                                                </div>
                                            </div>

                                            <div class="basic-pay">
                                                <div class="entry">
                                                    <div class="label">Basic Salary</div>
                                                    <div class="detail"></div>
                                                    <div class="rate">₦<?php echo number_format($basicSalary,2); ?>/Month</div>
                                                    <div class="amount">₦<?php echo number_format($basicSalary,2); ?></div>
                                                </div>
                                            </div>

                                            

                                            

                                            <div class="nti">
                                                <div class="entry">
                                                    <div class="label">ALLOWANCE</div>
                                                    <div class="detail"></div>
                                                    <div class="rate"></div>
                                                    <div class="amount"></div>
                                                </div>
                                            </div>

                                           
                                            <div class="basic-pay">
                                                <div class="entry">
                                                    <div class="label">Total Allowance</div>
                                                    <div class="detail"></div>
                                                    <div class="rate">₦<?php echo number_format($allowSum,2);  ?>/Month</div>
                                                    <div class="amount">₦<?php echo number_format($allowSum,2); ?></div>
                                                </div>
                                            </div>

                                            <div class="nti">
                                                <div class="entry">
                                                    <div class="label">GROSS</div>
                                                    <div class="detail"></div>
                                                    <div class="rate"></div>
                                                    <div class="amount">₦<?php echo number_format($gross,2) ; ?></div>
                                                </div>
                                            </div>
                                            <!-- <div class="withholding_tax">
                                                <div class="entry">
                                                    <div class="label">Gross</div>
                                                    <div class="detail"></div>
                                                    <div class="rate"></div>
                                                    <div class="amount"></div>
                                                </div>
                                            </div> -->

                                            <div class="nti">
                                                <div class="entry">
                                                    <div class="label">DEDUCTIONS</div>
                                                    <div class="detail"></div>
                                                    <div class="rate"></div>
                                                    <div class="amount"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="deductions">
                                                <div class="entry">
                                                    <div class="label">Basic Deduction</div>
                                                    <div class="detail"></div>
                                                    <div class="rate"></div>
                                                    <div class="amount">₦<?php echo number_format($basicDeduction,2); ?></div>
                                                </div>
                                                
                                            </div>

                                            
                                            <div class="deductions">
                                                <div class="entry">
                                                    <div class="label">Tax</div>
                                                    <div class="detail"></div>
                                                    <div class="rate"></div>
                                                    <div class="amount">₦<?php echo number_format($taxAmount,2); ?></div>
                                                </div>
                                                
                                            </div>
                                            <div class="deductions">
                                                <div class="entry">
                                                    <div class="label">Loan</div>
                                                    <div class="detail"></div>
                                                    <div class="rate"></div>
                                                    <div class="amount">₦<?php echo number_format($loanAmount,2); ?></div>
                                                </div>
                                                
                                            </div>
                                            <div class="basic-pay">
                                                <div class="entry">
                                                    <div class="label">TOTAL</div>
                                                    <div class="detail"></div>
                                                    <div class="rate">₦<?php echo number_format($grandDeduction,2);  ?>/Month</div>
                                                    <div class="amount">₦<?php echo number_format($grandDeduction,2); ?></div>
                                                </div>
                                            </div>
                                            <div class="net_pay">
                                                <div class="entry">
                                                    <div class="label">NET PAY</div>
                                                    <div class="detail"></div>
                                                    <div class="rate"></div>
                                                    <div class="amount">₦<?php echo number_format($netAmount,2); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="row">
                            <div class="col-sm-12">

                                <h5 class="mt-5 mb-2">Payment Details</h5>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Emp No</th>
                                                <th scope="col">Emp Name</th>
                                                <th scope="col">Salary Grade</th>
                                                <th scope="col">Basic Salary(₦)</th>
                                                <th scope="col">benefit(₦)</th>
                                                <th scope="col">Tax(₦)</th>
                                                <th scope="col">Loan(₦)</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                                <th scope="row"><?php //echo $empNo; ?></th>
                                                <td><?php //echo $fullname; ?></td>
                                                <td><?php //echo $GradeName; ?></td>
                                                <td><?php //echo $basicSalary; ?></td>
                                                <td><?php //echo $benefit; ?></td>
                                                <td><b><?php //echo $taxAmount; ?></b></td>
                                                <td><b><?php //echo $loanAmount; ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <h4 class="m-2"><u> Payment Summary</u></h4>

                            <div class="col-lg-12">
                                <div class="table-responsive-sm">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Gross</th>
                                                <th scope="col">Billing Address</th>
                                                <th scope="col">Shipping Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Jan 17, 2016</td>
                                                <td><span class="badge badge-danger">Unpaid</span></td>
                                                <td>250028</td>
                                                <td>
                                                    <p class="mb-0">PO Box 16122 Collins Street West<br>Victoria 8007 Australia<br>
                                                        Phone: +123 456 7890<br>
                                                        Email: demo@vito.com<br>
                                                        Web: www.vito.com
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="mb-0">PO Box 16122 Collins Street West<br>Victoria 8007 Australia<br>
                                                        Phone: +123 456 7890<br>
                                                        Email: demo@vito.com<br>
                                                        Web: www.vito.com
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-sm-6"></div>
                            <div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-link mr-3"><i class="ri-printer-line"></i> Download Print</button>
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>






        </div>


    </div>




</div>






<?php include 'footer.php' ?>