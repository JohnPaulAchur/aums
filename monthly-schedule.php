<?php include 'header.php' ?>



<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Monthly Payment Schedule</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">



                            <div class="iq-card">

                                <div class="iq-card-body">
                                    <form method="POST">
                                        <div class="row">

                                            <div class="form-group col-md-8">
                                                <!-- <label for="exampleInputText1">Select Month</label> -->
                                                <select name="payMonth" class="form-control" id="exampleFormControlSelect1">
                                                    <option selected="" value="">-- Select Month --</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <!-- 
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputmonth">Year</label>
                                                <input name="payYear" class="form-control" id="exampleInputmonth" value="<?php //echo date('Y'); ?>">
                                            </div> -->
                                            <div class="form-group col-md-4">
                                            <button type="submit" name="submit" class="btn btn-primary float-right mr-2">Go</button>
                                        </div>
                                        </div>
                                        

                                    </form>
                                </div>
                            </div>







                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php

    if (isset($_POST['submit'])) {
        $st = 1;
        // $employeeId = check_input($_POST['payYear']);
        $payMonth = check_input($_POST['payMonth']);
        $year = date('Y');
        $created = date('Y-m-d');
        //fetch to check if payment already processed
           
            // $noF = $queryF->rowCount();
        if ( empty($payMonth)) {
            // $msg = '<p style="color:red;">Not Added , All Fields Are Required !!!</p>';
            echo '<script>alert("Please Select , All Fields Are Required  !!!");window.location="make-payment"</script>';
        } else {
            



            echo'
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Payment Details For Selected Month </h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="table" class="table-editable">



                                <div class="iq-card">

                                    <div class="iq-card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive-sm">
                                                        <table id="example" class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Emp No.</th>
                                                                    <th scope="col">Emp Name</th>
                                                                    <th scope="col">Salary Grade</th>
                                                                    <th scope="col">Basic Salary(₦)</th>
                                                                    <th scope="col">tax(₦)</th>
                                                                    <th scope="col">Due Salary(₦)</th>
                                                                    <th scope="col">status</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
            ';

            
            $grandTax = 0;
            $sal = 0;
            $grandNet = 0;
            $queryF = dbConnect()->prepare("SELECT * FROM payment_activity WHERE month=? AND year=?");
            $queryF->execute([$payMonth,$year]);
            while( $rowF = $queryF->fetch() ){

                $code = $rowF['code'];
                $empid = $rowF['employee_id'];



            // }



            $query = dbConnect()->prepare("SELECT * FROM employee WHERE id=?");
            $query->execute([$empid]);
            $row = $query->fetch();

                $employeeNo = $row['emp_id'];
                $id = $row['id'];
                $employeeName = $row['firstname'] . ' ' . $row['lastname'];
                $salaryId = $row['salary_id'];

                // //get loan to be paid
                // $queryLoan = dbConnect()->prepare("SELECT * FROM loan WHERE employee_id=? AND status=?");
                // $queryLoan->execute([$id, 1]);
                // $rowLoan = $queryLoan->fetch();

                // if ($queryLoan->rowCount() > 0) {
                //     $loan =$rowLoan['loan_amount'];
                //     $loanCode = $rowLoan['code'];
                //     $loanAmount = $rowLoan['monthly_pay'];
                // } else {
                //     $loanAmount = '0000';
                // }



                $querySal = dbConnect()->prepare("SELECT * FROM salary_temp WHERE id=?");
                $querySal->execute([$salaryId]);
                $rowSal = $querySal->fetch();
                // to get salary grade and salary
                $gradeId = $rowSal['id'];
                $grade = $rowSal['salary_grade'];
                $salary = $rowSal['salary'];
                $sal +=$salary;
                $taxId = $rowSal['tax_id'];

                 // to get tax percent
                 $queryTax = dbConnect()->prepare("SELECT * FROM tax WHERE id=?");
                 $queryTax->execute([$taxId]);
                 $rowTax = $queryTax->fetch();
 
                 $taxName = $rowTax['tax_name'];
                 $taxPercent = $rowTax['value'];
                 // tax amount calculation
                 $taxAmount = ($taxPercent / 100) * $salary;
                 $grandTax +=$taxAmount;
                 $dueSalary = $salary - $taxAmount;
 
                $grandNet +=$dueSalary;
                 

                //  $deduction =$taxAmount+$loanAmount;
                //  $net = $salary-$deduction;

                
                 
                 //loan payment
                //  if($loanAmount!="0000"){
                //  $check = dbConnect()->prepare("SELECT * FROM loan_payment WHERE code=?");
                //  $check->execute([$loanCode]);
                //  $rowCh = $check->fetch();
                //  $paid = $rowCh['amount_paid'];
                //  $loanNowPaid = $paid + $loanAmount;
                 

                //  }
                //  if ($done) {
                //      echo '<script>alert("Operation Successful !!!")</script>';
                //  }else{
                //     echo '<script>alert("Oops, Operation Failed!!!")</script>';
                //  }
                 


    ?>

                
                        <tr>
                            <td><?php echo $employeeNo; ?></td>
                            <td><?php echo $employeeName; ?> </td>
                            <td><?php echo $grade; ?> </td>
                            <td>₦<?php echo number_format($salary,2) ; ?> </td>
                            <td>₦<?php echo number_format($taxAmount,2); ?> </td>
                            <td>₦<?php echo number_format($dueSalary,2); ?> </td>
                            <td><span class="badge badge-success">Paid</span></td>
                            <td><a target="_blank" href="payslip?code=<?php echo $code; ?>"><span class="badge badge-info">PaySlip </span></a></td>
                        </tr>
                                                                    



                            <?php
                                } ?>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Sal:₦<?php echo number_format($sal,2); ?></td>
                                <td>Tax:₦<?php echo number_format($grandTax,2); ?></td>
                                <td>Due:₦<?php echo number_format($grandNet,2); ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                       <?php     }
                            

                        }else{
                            $st = 1;
                            $payMonth = date('m');
                            $year = date('Y');

                            echo'
                            <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Payment Details For this Month('.date('F').')</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <div id="table" class="table-editable">
                
                
                
                                                <div class="iq-card">
                
                                                    <div class="iq-card-body">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="table-responsive-sm">
                                                                        <table id="example" class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">Emp No.</th>
                                                                                    <th scope="col">Emp Name</th>
                                                                                    <th scope="col">Salary Grade</th>
                                                                                    <th scope="col">Basic Salary</th>
                                                                                    <th scope="col">tax</th>
                                                                                    <th scope="col">Due Salary</th>
                                                                                    <th scope="col">status</th>
                                                                                    <th scope="col"></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                            ';
            $grandTax = 0;
            $sal = 0;
            $grandNet = 0;
            $queryF = dbConnect()->prepare("SELECT * FROM payment_activity WHERE month=? AND year=?");
            $queryF->execute([$payMonth,$year]);
            while( $rowF = $queryF->fetch() ){
                $code  = $rowF['code'];
               $empid = $rowF['employee_id'];
            $query = dbConnect()->prepare("SELECT * FROM Employee WHERE id=?");
            $query->execute([$empid]);
            $no = $query->rowCount();
               
                $row = $query->fetch();

                $employeeNo = $row['emp_id'];
                $id = $row['id'];
                $employeeName = $row['firstname'] . ' ' . $row['lastname'];
                $salaryId = $row['salary_id'];

                //get loan to be paid
                $queryLoan = dbConnect()->prepare("SELECT * FROM loan WHERE employee_id=? AND status=?");
                $queryLoan->execute([$id, 1]);
                $rowLoan = $queryLoan->fetch();

                if ($queryLoan->rowCount() > 0) {
                    $loan =$rowLoan['loan_amount'];
                    $loanCode = $rowLoan['code'];
                    $loanAmount = $rowLoan['monthly_pay'];
                } else {
                    $loanAmount = '0000';
                }



                $querySal = dbConnect()->prepare("SELECT * FROM salary_temp WHERE id=?");
                $querySal->execute([$salaryId]);
                $rowSal = $querySal->fetch();
                // to get salary grade and salary
                $gradeId = $rowSal['id'];
                $grade = $rowSal['salary_grade'];
                $salary = $rowSal['salary'];
                $sal += $salary;
                $taxId = $rowSal['tax_id'];

                 // to get tax percent
                 $queryTax = dbConnect()->prepare("SELECT * FROM tax WHERE id=?");
                 $queryTax->execute([$taxId]);
                 $rowTax = $queryTax->fetch();
 
                 $taxName = $rowTax['tax_name'];
                 $taxPercent = $rowTax['value'];
                 // tax amount calculation
                 $taxAmount = ($taxPercent / 100) * $salary;
                 $grandTax += $taxAmount;
 
                 $dueSalary = $salary - $taxAmount;
 
            
                 

                 
                 $grandNet +=$dueSalary;

                
                 
                 //tax payment
                 if($loanAmount!="0000"){
                 $check = dbConnect()->prepare("SELECT * FROM loan_payment WHERE code=?");
                 $check->execute([$loanCode]);
                 $rowCh = $check->fetch();
                 $paid = $rowCh['amount_paid'];
                 $loanNowPaid = $paid + $loanAmount;
                 

                 }
                //  if ($done) {
                //      echo '<script>alert("Operation Successful !!!")</script>';
                //  }else{
                //     echo '<script>alert("Oops, Operation Failed!!!")</script>';
                //  }
                 


    ?>

                
                        <tr>
                            <td><?php echo $employeeNo; ?></td>
                            <td><?php echo $employeeName; ?> </td>
                            <td><?php echo $grade; ?> </td>
                            <td>₦<?php echo number_format($salary,2) ; ?> </td>
                            <td>₦<?php echo number_format($taxAmount,2); ?> </td>
                            <td>₦<?php echo number_format($dueSalary,2); ?> </td>
                            <td><span class="badge badge-success">Paid</span></td>
                            <td><a target="_blank" href="payslip?code=<?php echo $code; ?>"><span class="badge badge-info">PaySlip </span></a></td>
                        </tr>
                        
                                                                    



                            <?php } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Sal:₦<?php echo number_format($sal,2); ?></td>
                                <td>Tax:₦<?php echo number_format($grandTax,2); ?></td>
                                <td>Due:₦<?php echo number_format($grandNet,2); ?></td>
                                <td></td>
                                <td></td>
                            </tr>

                    <?php

                              }
                         ?>
                         
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>





                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
</div>
</div>
<!-- Wrapper END -->

<?php include 'footer.php' ?>