<?php include 'header.php' ?>
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                     <div class="col-sm-12 col-lg-12">
                        <div class="iq-card">
                           <div class="iq-card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Vertical Wizard</h4>
                              </div>
                           </div>
                           <div class="iq-card-body">
                              <div class="row">
                                 <div class="col-md-3">
                                    <ul id="top-tabbar-vertical" class="p-0">
                                       <li class="active" id="personal">
                                          <a href="javascript:void();">
                                             <i class="ri-lock-unlock-line text-primary"></i><span>Personal</span>
                                          </a>
                                       </li>
                                       <li id="contact">
                                          <a href="javascript:void();">
                                             <i class="ri-user-fill text-danger"></i><span>Contact</span>
                                          </a>
                                       </li>
                                       <li id="official">
                                          <a href="javascript:void();">
                                             <i class="ri-camera-fill text-success"></i><span>Official</span>
                                          </a>
                                       </li>
                                       <li id="payment">
                                          <a href="javascript:void();">
                                             <i class="ri-check-fill text-warning"></i><span>Payment</span>
                                          </a>
                                       </li>
                                   </ul>
                                 </div>
                                 <div class="col-md-9">
                                 <form method="POST" enctype="multipart/form-data" id="form-wizard3" class="text-center">
                                      <!-- fieldsets -->
                                      <fieldset>
                                          <div class="form-card text-left">
                                              <div class="row">
                                                  <div class="col-12">
                                                      <h3 class="mb-4">User Information:</h3>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="fname">First Name: *</label>
                                                       <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" />
                                                     </div>
                                                   </div>
                                                   <div class="col-md-12">
                                                     <div class="form-group">
                                                       <label for="lname">Last Name: *</label>
                                                       <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" />
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12">
                                                     <div class="form-group">
                                                       <label for="lname">Gender: *</label>
                                                       <!-- <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" /> -->
                                                       <select class="form-control" id="gender" name="gender">
                                                         <option selected> -- select gender -- </option>
                                                         <option value="Male">Male</option>
                                                         <option value="Female">Female</option>
                                                         <option value="I'd rather not say">I'd rather not say</option>
                                                       </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12">
                                                      <div class="form-group">
                                                       <label for="dob">Date Of Birth: *</label>
                                                       <input type="date" class="form-control" id="dob" name="dob" />
                                                      </div>
                                                   </div>
                                                   <div class="col-md-12">
                                                      <div class="form-group">
                                                       <label for="userimg">User Image: *</label>
                                                       <input type="file" class="form-control" id="" name="imgupload" />
                                                      </div>
                                                   </div>
                                             </div>
                                          </div>
                                          <p class="form-message"></p>
                                          <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Next</button>
                                      </fieldset>
                                      <fieldset>
                                          <div class="form-card text-left">
                                              <div class="row">
                                                  <div class="col-12">
                                                      <h3 class="mb-4">Contact Information:</h3>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="email">Email Address: *</label>
                                                       <input type="text" class="form-control" id="email" name="email" placeholder="Email Id" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="ccno">Contact Number: *</label>
                                                       <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="address">House Address: *</label>
                                                       <input type="text" class="form-control" id="address" name="address" placeholder="Current House Address." />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="city">City: *</label>
                                                       <input type="text" class="form-control" id="city" name="city" placeholder="City." />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="state">State: *</label>
                                                       <input type="text" class="form-control" id="state" name="state" placeholder="State." />
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                          <p class="form-message"></p>
                                          <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Next</button>
                                          <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
                                      </fieldset>
                                      <fieldset>
                                          <div class="form-card text-left">
                                              <div class="row">
                                                  <div class="col-12">
                                                      <h3 class="mb-4">Official Information:</h3>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" id="reload-code">
                                                       <?php 
                                                         $rand = rand();
                                                         $message = "EMP".'-'.$rand;
                                                       ?>
                                                       <label for="empid">Employee Id (generic): *</label>
                                                       <input type="text" readonly class="form-control" id="empid" value="<?php echo $message;?>" name="empid" placeholder="Employee Id." />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="desg">Designation: *</label>
                                                       <input type="text" class="form-control" id="desg" name="desg" placeholder="Designation." />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="dept">Employee Type: *</label>
                                                       <select class="form-control" id="dept" name="emptype" placeholder="Employment Type.">
                                                           <option selected value=""> -- Select Department -- </option>
                                                           <option selected value="internal"> Internal </option>
                                                           <option selected value="outsource"> Outsource </option>
                                                           <!-- <option value='$did'>$dname</option> -->
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="dept">Department Name: *</label>
                                                       <select class="form-control" id="dept" name="dept" placeholder="Department Name.">
                                                           <option selected value=""> -- Select Department -- </option>
                                                           <?php
                                                               $sql = dbConnect()->prepare("SELECT * FROM department");
                                                               $sql->execute();
                                                               while ($fetSql= $sql->fetch()) {
                                                                  $did = $fetSql['id'];
                                                                  $dname = $fetSql['dept_name'];
                                                                  echo"<option value='$did'>$dname</option>";
                                                               } ?>
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="salary">Salary Grade: *</label>
                                                       <select class="form-control" id="salary" name="salary">
                                                           <option value="" disabled> -- salary grade -- </option>
                                                          <?php 
                                                          $sl = dbConnect()->prepare("SELECT * FROM salary_temp");
                                                          $sl->execute();
                                                          while($ro = $sl->fetch()){
                                                             $sid = $ro['id'];
                                                             $sgrade = $ro['salary_grade'];
                                                             echo"<option value='$sid'>$sgrade</option>";
                                                          }
                                                          ?>
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="role">Role: *</label>
                                                        <select class="form-control" id="role" name="role">
                                                            <option disabled> --System Role -- </option>
                                                           <option value="Admin">Admin</option>
                                                           <option value="Employee">Employee</option>
                                                           <!-- <option value="Staff">Staff</option> -->
                                                           <!-- <option value="Senior Manager">Senior Manager</option> -->
                                                           <!-- <option value="Programmer">Programmer</option> -->
                                                           <!-- <option value="Maintenance">Maintenance</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="workhour">Qualification: *</label>
                                                        <select class="form-control" id="qual" name="qualselect">
                                                            <option disabled> -- Qualification Type -- </option>
                                                           <option value="Ssce">Ssce</option>
                                                           <option value="Hnd">HnD</option>
                                                           <option value="Ond">OnD</option>
                                                           <option value="Bsc">BsC</option>
                                                           <option value="Msc">MsC</option>
                                                           <option value="Phd">Phd</option>
                                                        </select>
                                                       <input style="margin-top: 10px;" type="file" class="form-control" name="qualupload" />
                                                    </div>
                                                </div>
                                             </div>
                                          </div>
                                          <p class="form-message"></p>
                                          <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Next</button>
                                          <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
                                      </fieldset>
                                      <fieldset>
                                          <div class="form-card text-left">
                                              <div class="row">
                                                  <div class="col-12">
                                                      <h3 class="mb-4 text-left">Payment:</h3>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="bank">Bank Name: *</label>
                                                       <input type="text" class="form-control" id="bank" name="bank" placeholder="Bank name." />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="accno">Account No: *</label>
                                                       <input type="text" class="form-control" id="accno" name="accno" placeholder="Account No." />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <label for="holname">Account Holder Name: *</label>
                                                       <input type="text" class="form-control" id="holname" name="holname" placeholder="Account Holder Name." />
                                                    </div>
                                                </div>
                                             </div>
                                          </div>
                                          <p class="form-message"></p>
                                          <button type="submit" id="submit" name="submit" class="btn btn-primary action-button float-right">Submit</button>
                                           <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
                                      </fieldset>
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
<?php include 'footer.php' ?>


<script>
    $(document).ready(function(){
        $("#form-wizard3").submit(function(event){
            event.preventDefault();

            var form_data = new FormData(this);

               $.ajax({
                  url: "send.php",
                  type: "POST",
                  data: form_data,
                  datatype: "JSON",
                  cache: false,
                  processData: false,
                  contentType:false,
                  success:function(data){
                     $(".form-message").html(data);
                  }
               })
        });
    });
</script>

<!-- <script>
    $(document).ready(function(){
        $("#form-wizard3").submit(function(event){
            event.preventDefault();
            var first = $("#fname").val();
            var last = $("#lname").val();
            var dob = $("#dob").val();
            var imgupload = $("#imgupload").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var role = $("#role").val();
            var city = $("#city").val();
            var state = $("#state").val();
            var empid = $("#empid").val();
            var desg = $("#desg").val();
            var address = $("#address").val();
            var dept = $("#dept").val();
            var salary = $("#salary").val();
            var gender = $("#gender").val();
            var qual = $("#qual").val();
            var qualupload = $("#qualupload").val();
            var bank = $("#bank").val();
            var accno = $("#accno").val();
            var holname = $("#holname").val();
            var submit = $("#submit").val();

            $(".form-message").load("send.php", {
                fname: first,
                lname: last,
                dob: dob,
                imgupload: imgupload,
                email: email,
                address: address,
                phone: phone,
                role: role,
                city: city,
                gender: gender,
                salary: salary,
                state: state,
                empid: empid,
                desg: desg,
                dept: dept,
                qualselect: qual,
                qualupload: qualupload,
                bank: bank,
                accno: accno,
                holname: holname,
                submit: submit

            });
        });
    });
</script> -->