<?php include 'header.php'; 


if (isset($_POST['next'])) {
    
    $company = check_input($_POST['company']);
    if (empty($company)) {
        echo '<script>alert("Please Input Company/Client Name ")</script>';
    }else{
        header('location:?id='.$company);
    }
    
}


if (isset($_POST['submit'])) {
    $created = date('Y-m-d');
    $company = check_input($_POST['company']);
    $email = check_input($_POST['email']);
    $phone = check_input($_POST['phone']);
    $lname = check_input($_POST['lname']);
    $fname = check_input($_POST['fname']);
    $address = check_input($_POST['address']);
    $profile = rand();
    $pass = "password";
    $password = password_hash($pass, PASSWORD_DEFAULT);
    $role = "company";
    $status = 0;

    $employeeId = $_POST['empid'];
    if (empty($employeeId)) {
        echo '<script>alert("Please Select Members "); window.location="create-company"</script>';
    }elseif(empty($company) || empty($email) || empty($phone) || empty($address) || empty($lname) || empty($fname)){
      echo '<script>alert("All Field Are Required ")</script>';
    }else{

        $queryCheck = dbConnect()->prepare('SELECT * FROM users WHERE email=?');
        $queryCheck->execute([$email]);
        if( $queryCheck->rowCount() > 0){
            echo '<script>alert("Email Already Exist ")</script>';
        }else{



            // var_dump($employeeId);
        
            //create user

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
                                $query = dbConnect()->prepare('INSERT INTO company_tbl SET company_name=?,created=?,address=?,phone=?,email=?,fname=?,lname=?,img=?');
                                if( $query->execute([$company,$created,$address,$phone,$email,$fname,$lname,$newName]) ){
                                //insert user
                                

                                $queryUser = dbConnect()->prepare('INSERT INTO users SET fname=?,lname=?, email=?, role=?, phone=?, profile_code=?, status=?, password=?, image=?,created=?');
                                if( $queryUser->execute([$fname,$lname,$email,$role,$phone,$profile,$status,$password,$newName,$created]) ){
                                    //Assign
                                    $queryF = dbConnect()->prepare('SELECT * from company_tbl WHERE id=(SELECT MAX(id) FROM `company_tbl`)');
                                    $queryF->execute(); 
                                    $rowF = $queryF->fetch(); 
                                    $companyId = $rowF['id'];
                    
                                    foreach ($employeeId as $i => $item) {
                                        $insMembers = dbConnect()->prepare("INSERT INTO company_assign SET employee_id=?, company_id=?, created=?, created_by=?");
                                        $insMembers->execute([$employeeId[$i],$companyId,$created,$uid]);
                            
                                    }
                                    
                                    echo "<script>alert('Company Created Successfully'); window.location='company-list'; </script>";
                                    
                                    }


                                }

                                }else {
                                echo "<script>alert('An error occurred while uploading Employee Image!!! ');</span>";
                            }
                            


                    }else {
                        echo "<script>alert('Employee Image File size is too big, 3mb max!!! ');</span>";
                    }
                }else {
                    echo "<script>alert('An error occurred while uploading employee image!!! ');</span>";
                }
        
             }else{
                 echo '<script>alert("File Extension Not Supported ")</script>';
             }


        }
       
        
        









            

            
        } 
    
    
}






?>




<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">


                  <div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title"><i class="fa fa-group"></i> Create Company/Client</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam nibh finibus leo</p> -->
                           <form method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label for="email">Company/Client Name:</label>
                                 <input type="text" name="company" value="<?php echo (isset($_GET['id']) ? $_GET['id'] : '') ?>" class="form-control">
                              </div>
                                
                              

                              <?php
                              
                              if (isset($_GET['id'])) {
                                $fetching = dbConnect()->prepare("SELECT * FROM employee WHERE id NOT IN (SELECT employee_id FROM company_assign)");
                                $fetching->execute();

                                echo '
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Company/Client Phone:</label>
                                        <input type="text" name="phone" value="" class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Company/Client Email:</label>
                                        <input type="text" name="email" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Contact Person\'s First Name:</label>
                                        <input type="text" name="fname" value="" placeholder="" class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Contact Person\'s Last Name:</label>
                                        <input type="text" name="lname" value="" placeholder="" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Company/Client Image:</label>
                                        <input type="file" name="imgupload" class="form-control">
                                    </div>
                                </div>

                                     <div class="form-group row">
                                       <div class="col-md-12">
                                        <label for="email">Company/Client Address:</label>
                                          <textarea class="textarea form-control" name="address"></textarea>
                                       </div>
                                    </div>
                                

                                <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Select Employees To Assign </h4>
                                </div>
                                </div>
                                <div class="iq-card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Img.</th>
                                            <th scope="col">Employee No.</th>
                                            <th scope="col">Employees</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>

                                    <form method="POST">
                                ';
                                // $n = 0;

                                while ($route=$fetching->fetch()) {
                                //    $n++;
                                   $employid = $route['id'];
                                   $employName = $route['firstname'] .' '. $route['lastname'];
                                   $employNo = $route['emp_id'];
                                //    $employ = $route['id'];
                                   ?>
                                    
                                 
                              <tbody>
                                 <tr>
                                
                                    <td><a href="uploads/employee/<?php echo $route['emp_img'] ?>"><img style="width: 35px; height: 35px; border-radius: 10px;" src="uploads/employee/<?php echo $route['emp_img'] ?>" alt="" srcset=""></a></td>
                                    <td><?php echo $employNo; ?></td>
                                    <td><?php echo $employName; ?></td>
                                    <td>
                                        <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                            <input type="checkbox" name="empid[]" value="<?php echo $employid ?>" class="custom-control-input bg-success" id="customCheck-2<?php echo $employid ?>" >
                                            <label class="custom-control-label" for="customCheck-2<?php echo $employid ?>">Select</label>
                                        </div>
                                    </td>
                                   
                                 </tr>

                              
                                   <?php
                                }
                                ?>
                                 </form>
                                </tbody>
                                </table>
                             </div>
                          </div>

                            <?php
                            }
                               
                              ?>
                              <!-- <div class="form-group">
                                 <label for="pwd">Password:</label>
                                 <input type="password" class="form-control" id="pwd">
                              </div> -->
                              <input type="submit" name="<?php echo (isset($_GET['id']) ? 'submit' : 'next') ?>" value="<?php echo (isset($_GET['id']) ? 'Submit' : 'Next') ?>" class="btn btn-primary">
                              <!-- <button type="submit" class="btn iq-bg-danger">cancle</button> -->
                           </form>
                        </div>
                     </div>
                    </div>
            </div>
         </div>
</div>















<?php include 'footer.php'; ?>