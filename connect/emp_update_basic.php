<?php

include 'connect.php';
$id = $_SESSION['emp_update_id'];



        $upfname = check_input($_POST['fname']);
        $uplname = check_input($_POST['lname']);
        $upgender = check_input($_POST['gender']);
        $updob = check_input($_POST['dob']);
        $upemail = check_input($_POST['email']);
        $upphone = check_input($_POST['phone']);
        $uprole = check_input($_POST['role']);
        $upcity = check_input($_POST['city']);
        $upstate = check_input($_POST['state']);
        $upaddress = check_input($_POST['address']);
        $updesg = check_input($_POST['desg']);
        $upsalary = check_input($_POST['salary']);
        $updept = check_input($_POST['dept']);
        $upqualselect = check_input($_POST['qual']);
        $upbank = check_input($_POST['bank']);
        $upaccno = check_input($_POST['acctno']);
        $upaccname = check_input($_POST['holname']);
        $upfacebook = check_input($_POST['facebook']);
        $upinstagram = check_input($_POST['instagram']);
        $uptwitter = check_input($_POST['twitter']);
        $last_update = date('h-i-s Y-m-d');
        $update_by = $_SESSION['ufirstname'].' '.$_SESSION['ulastname'];

        $errorEmpty = false;
        $errorMail = false;
        $clearForm = false;

        if (empty($upfname) || empty($uplname) || empty($updob) || empty($upemail) || empty($upphone) || empty($uprole)
        || empty($upcity) || empty($upstate)|| empty($updesg) || empty($upgender) || empty($upsalary)
        || empty($upaddress) || empty($updept) || empty($upqualselect) || empty($upbank) || empty($upaccno) || empty($upaccname)) {
                echo "<span class='form-error'>Please fill in all fields!!</span>";
                $errorEmpty = true;
            }elseif (!filter_var($upemail, FILTER_VALIDATE_EMAIL)) {
                echo "<span class='form-error'>Please fill in a valid email address!</span>";
                $errorMail = true;
            }else {
                    $sql = dbConnect()->prepare("SELECT id, email, profile_code FROM employee WHERE email=?");
                    $sql->execute([$upemail]);
                    $check = $sql->fetch();
                    $emping = $check['id'];
                    $prof = $check['profile_code'];
                    if ($sql->rowcount() > 0) {
                        $inp = $id <=> $emping;
                        if ($inp == 0){
                                
                                $finish = dbConnect()->prepare("UPDATE employee SET firstname='$upfname', lastname='$uplname', gender='$upgender', dob='$updob', email='$upemail', phone='$upphone', role='$uprole', city='$upcity', address='$upaddress', state='$upstate', desg='$updesg', dept='$updept', qual='$upqualselect', bank='$upbank', acctno='$upaccno', acctname='$upaccname', salary_id='$upsalary', facebook='$upfacebook', twitter='$uptwitter', instagram='$upinstagram', last_update='$last_update', update_by='$update_by' WHERE id=?");
                                $finish->execute([$id]);
                                if ($fin) {
                                        // $finish = dbConnect()->prepare("UPDATE employee SET firstname='$upfname', lastname='$uplname', gender='$upgender', dob='$updob', email='$upemail', phone='$upphone', role='$uprole', city='$upcity', address='$upaddress', state='$upstate', desg='$updesg', dept='$updept', qual='$upqualselect', bank='$upbank', acctno='$upaccno', acctname='$upaccname', salary_id='$upsalary', facebook='$upfacebook', twitter='$uptwitter', instagram='$upinstagram', last_update='$last_update', update_by='$update_by' WHERE id=?");
                                        // $finish->execute([$id]);
                                        $fin = dbConnect()->prepare("UPDATE users SET fname='$upfname', lname='$uplname', gender='$upgender', email='$upemail', phone='$upphone', role='$uprole' WHERE profile_code=?");
                                        $fin->execute([$prof]);
                                        if ($finish) {
                                                echo "<script>alert('Success, account updated successfully');window.location='user_list'</script>";
                                        }else {
                                                echo "<script>alert('Error updating employee details, please contact the engineer')</script>";
                                        }
                                }
                        }else {
                                echo "<script>alert('User with this email already exists')</script>";
                        }
                    }else {
                        $fin = dbConnect()->prepare("UPDATE users SET fname='$upfname', lname='$uplname', gender='$upgender', email='$upemail', phone='$upphone', role='$uprole' WHERE id=?");
                        $fin->execute([$id]);
                        if ($fin) {
                                $finish = dbConnect()->prepare("UPDATE employee SET firstname='$upfname', lastname='$uplname', gender='$upgender', dob='$updob', email='$upemail', phone='$upphone', role='$uprole', city='$upcity', address='$upaddress', state='$upstate', desg='$updesg', dept='$updept', qual='$upqualselect', bank='$upbank', acctno='$upaccno', acctname='$upaccname', salary_id='$upsalary', facebook='$upfacebook', twitter='$uptwitter', instagram='$upinstagram', last_update='$last_update', update_by='$update_by' WHERE profile_code=?");
                                $finish->execute([$prof]);
                                if ($finish) {
                                        echo "<script>alert('Success, account updated successfully');window.location='user_list'</script>";
                                }else {
                                        echo "<script>alert('Error updating employee details, please contact the engineer')</script>";
                                }
                        }
                    }
            }

?>