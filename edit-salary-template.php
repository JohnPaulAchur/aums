<?php 
include 'connect/connect.php';
        
if (isset($_GET['code'])) {
    $code = $_GET['code'];
}

        if (isset($_POST['editSubmit'])) 
        {
            

        $grade = check_input($_POST['editGrade']);
        $salary = check_input($_POST['editSalary']);
        $tax = check_input($_POST['editTax']);


      
        $allowance = $_POST['allowName'];
        $allowVal = $_POST['allowVal'];

        $deduction = $_POST['deductName'];
        $deductVal = $_POST['deductVal'];
        
        $created = date('Y-m-d');
        if(empty($grade || $salary || $tax)){
            echo "<script>alert('Oops! above fields are required') </script>";
        }elseif( empty($allowVal) || empty($deductVal) ){

            echo "<script>alert('Please include Allowance and deduction') </script>";
        }else{
            
            $deleting = dbConnect()->prepare("DELETE FROM allowance WHERE code=?");
            $deleting->execute([$code]);

            $deleting2 = dbConnect()->prepare("DELETE FROM deduction WHERE code=?");
            $deleting2->execute([$code]);


            foreach ($allowVal as $i => $item) {
                $insAllow = dbConnect()->prepare("INSERT INTO allowance SET allowances=?, value=?, code=?, created=?");
                $insAllow->execute([$allowance[$i],$allowVal[$i],$code,$created]);

            }

            foreach ($deductVal as $i => $be) {
                $insDeduct= dbConnect()->prepare("INSERT INTO deduction SET deductions=?, value=?, created=? ,code=?");
                $insDeduct->execute([$deduction[$i],$deductVal[$i],$created,$code]);
            }
                $insgrade= dbConnect()->prepare("UPDATE salary_temp SET salary_grade=?, salary=?, tax_id=?, created=? WHERE code=?");
                $insgrade->execute([$grade,$salary,$tax,$created,$code]);

            echo "<script>alert('Salary Grade Updated Successfully'); window.location='salary-template'; </script>";
        }

                
            
        }
        

    
?>
