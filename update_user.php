<?php include 'header.php';?>

<?php
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = dbConnect()->prepare("SELECT * FROM employee WHERE id=?");
   $sql->execute([$id]);
   if ($sql->rowcount()>0) {
      
   }else {
      echo "<script>window.location='user_list'</script>";
   }
}else {
   echo "<script>window.location='user_list'</script>";
}

$selecting = dbConnect()->prepare("SELECT * FROM employee WHERE id=?");
$selecting->execute([$id]);
$prev = $selecting->fetch();

?>


   <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-4">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Image Update</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form action="connect/emp_img_update.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                 <div class="add-img-user profile-img-edit">
                                    <img style="min-height: 150px; min-width: 150px;" class="profile-pic img-fluid" src="uploads/employee/<?php echo $prev['emp_img']?>" alt="profile-pic">
                                    <div class="p-image position-absolute">
                                       <a style="border-radius: 50px; font-size: 12px; padding: 8px; width: 15px; height: 15px;" href="javascript:void();" class="upload-button iq-bg-primary"><i class="ri-pencil-line"></i></a>
                                       <input class="file-upload" type="file" name="imgupload" accept="image/*">
                                    </div>
                                 </div>
                              <div class="img-extension mt-3">
                                 <div class="d-inline-block align-items-center">
                                       <span>Only</span>
                                    <a href="javascript:void();">.jpg</a>
                                    <a href="javascript:void();">.png</a>
                                    <a href="javascript:void();">.jpeg</a>
                                    <a href="javascript:void();">.webp</a>
                                    <span>allowed</span>
                                 </div>
                              </div>
                              </div>
                              <button type="submit" name="sumbitprofimg" class=" btn iq-bg-primary">Update</button>
                           </form>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Qualification File</h4>
                           </div>
                        </div>
                        <div class="iq-card-body" style="min-height: 200px;">
                           <form action="connect/emp_qual_update.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
                              <div class="form-group">

                                 <input type="file" id="inpFile" class="form-control" name="qualupload">
                                 <div class="image-preview add-img-user profile-img-edit" id="imagePreview">
                                    <img src="" alt="Image Preview" class="image-image">
                                    <span class="image-default-text">Image Preview</span>

                                 </div>


                                 <div class="img-extension mt-3">
                                    <div class="d-inline-block align-items-center" style="margin-top: 40px;">
                                          <span>Only</span>
                                       <a href="javascript:void();">.jpg</a>
                                       <a href="javascript:void();">.png</a>
                                       <a href="javascript:void();">.jpeg</a>
                                       <span>allowed</span>
                                    </div>
                                 </div>
                              </div>
                              <button type="submit" name="sumbitqualfile" class=" btn iq-bg-primary">Update</button>
                           </form>
                        </div>
                     </div>
               </div>
               <div class="col-lg-8">
                     <div class="iq-card" style="max-height: 1000px; overflow: scroll;">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div style="margin-top: 15px;" class="iq-header-title">
                              <h4 class="card-title">Update Account</h4>
                              <p class="card-title">Update basic information Here.</p>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="new-user-info">
                              <form id="form-basic" method="POST">
                                 <div class="row">
                                    <div class="form-group col-md-6">
                                       <label for="fname">First Name:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['firstname']?>" name="fname" placeholder="First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="lname">Last Name:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['lastname']?>" name="lname" placeholder="Last Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="lname">Gender:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['gender']?>" name="gender" placeholder="Gender">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="add1">Date of Birth:</label>
                                       <input type="date" class="form-control" value="<?php echo $prev['dob']?>" name="dob">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="add2">Email Address:</label>
                                       <input type="email" class="form-control" value="<?php echo $prev['email']?>" name="email" placeholder="Valid Email Address">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="cname">Phone:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['phone']?>" name="phone" placeholder="Mobile Number">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="lname">City:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['city']?>" name="city" placeholder="City Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="lname">State:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['state']?>" name="state" placeholder="State">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>User Role:</label>
                                       <select class="form-control" name="role">
                                          <option value="" selected> -- select -- </option>
                                          <option value="Web Designer">Web Designer</option>
                                          <option value="Web Developer">Web Developer</option>
                                          <option value="Tester">Tester</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label>Employee Salary:</label>
                                       <select class="form-control" name="salary">
                                          <option value="" selected> -- select -- </option>
                                          <option value="Salary Grade A">Salary Grade A</option>
                                          <option value="Salary Grade C">Salary Grade C</option>
                                          <option value="Salary Grade B">Salary Grade B</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label>Department:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['dept']?>" name="dept" placeholder="Department Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="mobno">Designation:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['desg']?>" name="desg" placeholder="Line of Duty">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="altconno">Qualification:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['qual']?>" name="qual" placeholder="Qualification/Degree">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="pno">Bank Name:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['bank']?>" name="bank" placeholder="Bank Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="pno">Account No.:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['acctno']?>" name="acctno" placeholder="Account No">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="pno">Account Name:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['acctname']?>" name="holname" placeholder="Account Name">
                                    </div>
                                    <div class="form-group col-md-12">
                                       <label for="city">House Address:</label>
                                       <!-- <input type="text" class="form-control" id="city" placeholder="Town/City"> -->
                                       <textarea name="address" class="form-control" cols="20" rows="2" placeholder="Current House Address"><?php echo $prev['address']?></textarea>
                                    </div>
                           <div class="iq-card-header d-flex justify-content-between">
                              <div style="margin: 15px 0;" class="iq-header-title">
                                 <h4 class="card-title">Social Media Links</h4>
                                 <p class="card-title">Update social media info along with basic information.</p>
                              </div>
                           </div>
                                    <div class="form-group col-md-6">
                                       <label for="furl">Facebook Url:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['facebook']?>" name="facebook" placeholder="Facebook Url">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="turl">Twitter Url:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['twitter']?>" name="twitter" placeholder="Twitter Url">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="instaurl">Instagram Url:</label>
                                       <input type="text" class="form-control" value="<?php echo $prev['instagram']?>" name="instagram" placeholder="Instagram Url">
                                    </div>
                                 </div>
                                 <p class="form-basic-message"></p>
                                 <button type="submit" name="submitbasic" class="btn btn-primary">Update</button>
                              </form>
                                 <hr>
                                 <h5 class="mb-3">Security</h5>
                                 <form id="form-security" method="POST">
                                 <div class="row">
                                    <div class="form-group col-md-6">
                                       <label for="">Password:</label>
                                       <input type="password" class="form-control" id="past" name="pass" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="rass">Repeat Password:</label>
                                       <input type="password" class="form-control" id="conpas" name="conpass" placeholder="Repeat Password">
                                    </div>
                                 </div>
                                 <!-- <div class="checkbox">
                                    <label><input class="mr-2" type="checkbox">Enable Two-Factor-Authentication</label>
                                 </div> -->
                                 <p class="form-security-message"></p>
                                 <button type="submit" name="submitpass" class="btn btn-primary">Update</button>
                              </form>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<?php include 'footer.php';?>
<script>
   const inpFile = document.getElementById('inpFile');
   const previewContainer = document.getElementById('imagePreview');
   const previewImage = previewContainer.querySelector('.image-image');
   const previewDefaultText = previewContainer.querySelector('.image-default-text');

   inpFile.addEventListener("change", function () {
      const file = this.files[0];

      if (file) {
         const reader = new FileReader();

         previewDefaultText.style.display = "none";
         previewImage.style.display = "block";

         reader.addEventListener("load", function () {
            previewImage.setAttribute("src", this.result);
         });
         reader.readAsDataURL(file);
      }else{
         previewDefaultText.style.display = "null";
         previewImage.style.display = "null";
         previewImage.setAttribute("src", "");
      }
   });

</script>
<script>
    $(document).ready(function(){
        $("#form-security").submit(function(event){
           <?php  $_SESSION['emp_update_id'] = $id; ?>;
            event.preventDefault();

            var form_data = new FormData(this);

               $.ajax({
                  url: "connect/emp_update_security.php",
                  type: "POST",
                  data: form_data,
                  datatype: "JSON",
                  cache: false,
                  processData: false,
                  contentType:false,
                  success:function(data){
                     $(".form-security-message").html(data);
                  }
               })
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#form-basic").submit(function(event){
           <?php $_SESSION['emp_update_id'] = $id; ?>
            event.preventDefault();

            var form_data = new FormData(this);

               $.ajax({
                  url: "connect/emp_update_basic.php",
                  type: "POST",
                  data: form_data,
                  datatype: "JSON",
                  cache: false,
                  processData: false,
                  contentType:false,
                  success:function(data){
                     $(".form-basic-message").html(data);
                  }
               })
        });
    });
</script>