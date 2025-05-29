if ($row = $query->fetch()) {
                $employeeNo = $row['emp_no'];
                $id = $row['id'];
                $employeeName = $row['fname'] . ' ' . $row['lname'];
                $salaryId = $row['salary_id'];

                $querySal = dbConnect()->prepare("SELECT * FROM salary_temp WHERE id=?");
                $querySal->execute([$salaryId]);
                $rowSal = $querySal->fetch();
                // to get salary grade and salary
                $gradeId = $rowSal['id'];
                $grade = $rowSal['salary_grade'];
                $salary = $rowSal['salary'];
                $taxId = $rowSal['tax_id'];
                // to get tax percent
                $queryTax = dbConnect()->prepare("SELECT * FROM tax WHERE id=?");
                $queryTax->execute([$taxId]);
                $rowTax = $queryTax->fetch();

                $taxName = $rowTax['tax_name'];
                $taxPercent = $rowTax['value'];
                // tax amount calculation
                $taxAmount = ($taxPercent / 100) * $salary;

                $dueSalary = $salary - $taxAmount;

                //get loan to be paid
                $queryLoan = dbConnect()->prepare("SELECT * FROM loan WHERE employee_id=? AND status=?");
                $queryLoan->execute([$id, 1]);
                $rowLoan = $queryLoan->fetch();

                if ($queryLoan->rowCount() > 0) {
                    $loanAmount = $rowLoan['loan_amount'];
                } else {
                    $loanAmount = '0000';
                }