<?php include 'header.php' ?>



<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Make Payment</h4>
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
                                                    <option value="2">february</option>  
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
        // $employeeId = check_input($_POST['payYear']);
        $payMonth = check_input($_POST['payMonth']);
        $year = date('Y');
        $created = date('Y-m-d');
        //fetch to check if payment already processed
            $queryF = dbConnect()->prepare("SELECT * FROM payment_activity WHERE month=? AND year=?");
            $queryF->execute([$payMonth,$year]);
            $noF = $queryF->rowCount();
        if ( empty($payMonth)) {
            // $msg = '<p style="color:red;">Not Added , All Fields Are Required !!!</p>';
            echo '<script>alert("Please Select , All Fields Are Required  !!!");window.location="make-payment"</script>';
        }elseif($noF>0){
            echo '<script>alert("Payment For The Month Already Processed  !!!");window.location="make-payment"</script>';
        } else {
            



            echo'
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Payment Details</h4>
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
                                                        <table class="table" id="example">
                                                            <thead>
                                                                <tr>
                                                                    <th>Emp No.</th>
                                                                    <th>Emp Name</th>
                                                                    <th>Salary Grade</th>
                                                                    <th>Basic Salary</th>
                                                                    <th>tax</th>
                                                                    <th>Due Salary</th>
                                                                    <th>status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
            ';







            $st =1;
            $query = dbConnect()->prepare("SELECT * FROM Employee WHERE status=?");
            $query->execute([$st]);
            $no = $query->rowCount();
            while($row = $query->fetch()){

                $employeeNo = $row['emp_id'];
                $id = $row['id'];
                $employeeName = $row['firstname'] . ' ' . $row['lastname'];
                $salaryId = $row['salary_id'];

                



                

                $querySal = dbConnect()->prepare("SELECT * FROM salary_temp WHERE id=?");
                $querySal->execute([$salaryId]);
                $rowSal = $querySal->fetch();
                // to get salary grade and salary
                $gradeId = $rowSal['id'];
                $grade = $rowSal['salary_grade'];
                //salary
                $salary = $rowSal['salary'];
                //
                $taxId = $rowSal['tax_id'];
                $gradeCode = $rowSal['code'];

                // get all allowances
                
                $allowQuery= dbConnect()->prepare("SELECT SUM(value) AS sumAllow FROM allowance WHERE code=?");
                $allowQuery->execute([$gradeCode]);
                $rowAllow = $allowQuery->fetch();

                $allowSum = $rowAllow['sumAllow'];

                // allowance END

                //gross Amount
                $gross = $salary + $allowSum;
                // gross END


                //get loan to be paid
                $queryLoan = dbConnect()->prepare("SELECT * FROM loan WHERE employee_id=? AND status=?");
                $queryLoan->execute([$id, 1]);
                $rowLoan = $queryLoan->fetch();

                if ($queryLoan->rowCount() > 0) {
                    $loan =$rowLoan['loan_amount'];
                    $loanBal =$rowLoan['loan_balance'];
                    $loanCode = $rowLoan['code'];
                    $loanAmount = $rowLoan['monthly_pay'];
                } else {
                    $loanAmount = '0000';
                }

                //loan end
                
                 // to get tax percent
                 $queryTax = dbConnect()->prepare("SELECT * FROM tax WHERE id=?");
                 $queryTax->execute([$taxId]);
                 $rowTax = $queryTax->fetch();
 
                 $taxName = $rowTax['tax_name'];
                 $taxPercent = $rowTax['value'];
                 // tax amount calculation
                 $taxAmount = ($taxPercent / 100) * $salary;
 
                 $dueSalary = $salary - $taxAmount;
 
                //get all deductions
                $deductQuery= dbConnect()->prepare("SELECT SUM(value) AS sumDeduct FROM deduction WHERE code=?");
                $deductQuery->execute([$gradeCode]);
                $rowDeduction = $deductQuery->fetch();

                $deductSum = $rowDeduction['sumDeduct'];


                //grand deduction Total
                $grandDeduction = $deductSum + $taxAmount + $loanAmount;
                //deduction END
                 

                 $net = $gross-$grandDeduction;

                 $code = rand();
                 $ins = dbConnect()->prepare("INSERT INTO payment_activity SET employee_id=?, basic=?, total_allowance=?, gross=?,total_deduction=?,grand_deduction=?,net=?, grade=?, month=?,year=?,created=?,created_by=?, code=?,tax=?,loan=?");
                 $done = $ins->execute([$id,$salary,$allowSum,$gross,$deductSum,$grandDeduction,$net,$grade,$payMonth,$year,$created,$fullname, $code,$taxAmount,$loanAmount]);
                 
                 
                 //loan payment
                 if($done && $loanAmount!="0000"){
                 $check = dbConnect()->prepare("SELECT * FROM loan_payment WHERE code=?");
                 $check->execute([$loanCode]);
                 $rowCh = $check->fetch();
                 $paid = $rowCh['amount_paid'];
                 $loanNowPaid = $paid + $loanAmount;

                 if($loan==$loanNowPaid){
                    $clearloan = dbConnect()->prepare("UPDATE loan SET status=? WHERE code=?");
                    $clearloan->execute([3,$loanCode]);
                 }
                 if($check->rowCount() > 0){
                     
                    $insloan = dbConnect()->prepare("UPDATE loan_payment SET amount_paid=? WHERE code=?");
                    $insloan->execute([$loanNowPaid,$loanCode]);
                 }else{
                    $insloan = dbConnect()->prepare("INSERT INTO loan_payment SET amount_paid=?, code=?,emp_id=?,created=?");
                    $insloan->execute([$loanAmount,$loanCode,$id,$created]);
                 }

                 }
                //  if ($done) {
                //      echo '<script>alert("Operation Successful !!!")</script>';
                //  }else{
                //     echo '<script>alert("Oops, Operation Failed!!!")</script>';
                //  }
                 


    ?>

                
                        <tr>
                            <td><?php echo $employeeNo; ?></td>
                            <td ><?php echo $employeeName; ?></td>
                            <td><?php echo $grade; ?></td>
                            <td>₦<?php echo $salary; ?></td>
                            <td>₦<?php echo $taxAmount; ?></td>
                            <td>₦<?php echo $dueSalary; ?></td>
                            <td><span class="badge badge-success">Paid</span></td>
                        </tr>
                                                                    


                        


                            <?php
                                }
                                
                            }
                            echo'
                            <td width="50%">
                            <p class="text-success"> Payment Processing Successful !!!</p>
                            </td>
                            <td></td>
                            <td width="50%">
                            <a href="monthly-schedule" class="btn btn-primary text-white float-right mr-2">Generate PaySlips</a>
                            </td>';
                            

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