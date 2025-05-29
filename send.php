<?php include 'connect/connect.php'; ?>
<?php


        $fname = check_input($_POST['fname']);
        $lname = check_input($_POST['lname']);
        $dob = check_input($_POST['dob']);
        $email = check_input($_POST['email']);
        $phone = check_input($_POST['phone']);
        $role = check_input($_POST['role']);
        $city = check_input($_POST['city']);
        $imgupload = ['imgupload'];
        $state = check_input($_POST['state']);
        $gender = check_input($_POST['gender']);
        $desg = check_input($_POST['desg']);
        $emptype = check_input($_POST['emptype']);
        $salary = check_input($_POST['salary']);
        $address = check_input($_POST['address']);
        $empid = check_input($_POST['empid']);
        $dept = check_input($_POST['dept']);
        $qualselect = check_input($_POST['qualselect']);
        $qualupload = $_FILES['qualupload'];
        $bank = check_input($_POST['bank']);
        $accno = check_input($_POST['accno']);
        $accname = check_input($_POST['holname']);
        $profile = rand();

        $errorEmpty = false;
        $errorMail = false;
        $clearForm = false;






        if (empty($empid) || empty($fname) || empty($lname) || empty($emptype) || empty($salary) || empty($dob) || empty($email) || empty($address) || empty($phone) || empty($city) || empty($state)|| empty($desg) || empty($dept) || empty($qualselect) || empty($bank) || empty($accno) || empty($accname) || empty($role) || empty($imgupload) || empty($qualupload) || empty($gender)) {
            echo "<span class='form-error'>Please fill in all fields!!</span>";
            $errorEmpty = true;
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<span class='form-error'>Please fill in a valid email address!</span>";
            $errorMail = true;
        }
        // elseif (empty($gender) && empty($customRadio2)) {
        //     echo "<span class='form-error'>il address!</span>";
        // }
        else {
            

            $sqling = dbConnect()->prepare("SELECT * FROM users WHERE email=?");
            $sqling->execute([$email]);
            if($sqling->rowcount() > 0){
                echo "<span class='form-error'>User/Employee Already Has a registered account!!;</span>";
            }
            else{
            
            
            // START INSERTING AND UPLOAD
                            
            
            
                $mainImage = $_FILES['imgupload']['name'];
                $source = $_FILES['imgupload']['tmp_name'];
                $error = $_FILES['imgupload']['error'];
                $size = $_FILES['imgupload']['size'];
                $type = $_FILES['imgupload']['type'];
                $fileExt = explode('.',$mainImage);
                $mainExt = strtolower(end($fileExt));
            
                $allow = array('png','jpg','jpeg','jfif','webp');
            
            
                           
                // in_array()
            
                if (in_array($mainExt, $allow)) {
            
                    if ($error === 0) {
                        if ($size < 3000000) {
                            $newName = uniqid('',true) . "." . $mainExt;
                            $destination = 'uploads/employee/' . $newName;
                            $upload = move_uploaded_file($source,$destination);
                                if ($upload) {

                                    $mainImage22 = $_FILES['qualupload']['name'];
                                    $source22 = $_FILES['qualupload']['tmp_name'];
                                    $error22 = $_FILES['qualupload']['error'];
                                    $size22 = $_FILES['qualupload']['size'];
                                    $type22 = $_FILES['qualupload']['type'];
                                    $fileExport = explode('.',$mainImage22);
                                    $mainExport = strtolower(end($fileExport));
                                    $allow22 = array('pdf','png','jpeg','jpg','doc','docx');
                                        if(in_array($mainExport, $allow22)) {
                                            if ($error22 === 0) {
                                                if ($size22 < 3000000) {
                                                    $newQual = uniqid('',true) . "." . $mainExt;
                                                    $destination22 = 'uploads/qualification/' . $newQual;
                                                    $upload22 = move_uploaded_file($source22,$destination22);
                                    
                                                    if ($upload22) {
                                                        $status = 0;
                                                        $last_update = date('H-m-s Y-m-d');
                                                        $update_by = $_SESSION['ufirstname'].' '.$_SESSION['ulastname'];
                                                        $pass = "password";
                                                        $password = password_hash($pass, PASSWORD_DEFAULT);
                                                        $user = dbConnect()->prepare("INSERT INTO users(fname, lname, gender, email, role, phone, profile_code, status, password, image) VALUES(?,?,?,?,?,?,?,?,?,?)");
                                                        $user->execute([$fname,$lname,$gender,$email,$role,$phone,$profile,$status,$password,$newName]);
                                                        if ($user) {
                                                            $reg = dbConnect()->prepare("INSERT INTO employee(firstname, lastname, gender, dob, email, phone, city, state, emp_id, desg, dept, qual, address, bank, acctno, acctname, salary_id, role, profile_code, qualupload, emp_img, last_update, update_by, emp_type) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                                            $reg->execute([$fname,$lname,$gender,$dob,$email,$phone,$city,$state,$empid,$desg,$dept,$qualselect,$address,$bank,$accno,$accname,$salary,$role,$profile,$newQual,$newName,$last_update,$update_by,$emptype]);
                                                            if($reg){
                                                                echo "<span class='form-success'>Employee Added Successfully!!!</span>";
                                                                $clearForm = true;
                                                            }
                                                            else{
                                                                echo "<span class='form-error'>An error Occurred!!!;</span>";
                                                            }
                                                        }else {
                                                            echo "<span class='form-error'>Something went wrong, please try again!!!;</span>";
                                                        }
                                                        
                        
                                    
                                    
                                                    }else {
                                                        echo "<span class='form-error'>An error occurred while uploading Qualification file!!!;</span>";
                                                    }
                                    
                                                    
                                                }else {
                                                    echo "<span class='form-error'>Qualification File is too big, 3mb max!!!;</span>";
                                                }
                                            }else {
                                                echo "<span class='form-error'>An error occurred while uploading Qualification file!!!;</span>";
                                            }
                                        }else {
                                            echo "<span class='form-error'>File Extension for Qualification Upload is not supported!!!;</span>";
                                        }
                                }else {
                                    echo "<span class='form-error'>An error occurred while uploading Employee Image!!!;</span>";
                                }
                                


                        }else {
                            echo "<span class='form-error'>Employee Image File size is too big, 3mb max!!!;</span>";
                        }
                    }else {
                        echo "<span class='form-error'>An error occurred while uploading employee image!!!;</span>";
                    }
            
                    
            
                }
            
            }
            
            // END INSERTING AND UPLOAD
        }
    

?>

<script>
    $("#bank", "#accno", "#holname").css("box-shadow", "0 0 0 0 black");

    var errorEmpty = "<?php echo $errorEmpty?>";
    var errorMail = "<?php echo $errorMail?>";
    var clearForm = "<?php echo $clearForm?>";

    if (errorEmpty == true) {
        $("#bank", "#accno", "#holname").css("box-shadow", "0 0 0 5px red");
    }
    if (errorMail == true) {
        $("#email").css("box-shadow", "0 0 5px red");
    }
    if (clearForm == true) {
        $("#form-wizard3")[0].reset();
        $("#reload-code").load(location.href + " #reload-code");
    }
</script>