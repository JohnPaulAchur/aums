<?php include 'header.php'; ?>
<?php 

if (isset($_POST['submit'])) {
   $employee = check_input($_POST['employee']);
   $course = check_input($_POST['course']);
   $vendor = check_input($_POST['vendor']);
   $cost = check_input($_POST['cost']);
   $start_date = check_input($_POST['start_date']);
   $finish_date = check_input($_POST['finish_date']);
   $performance = check_input($_POST['performance']);
   $desc = check_input($_POST['desc']);
   $last_update = date('h-i-s Y-m-d');
   $created = date('Y-m-d');
   $update_by = $_SESSION['ufirstname'].' '.$_SESSION['ulastname'];

   if (empty($employee) || empty($course) || empty($vendor)  ||  empty($cost) || empty($start_date) || empty($finish_date) || empty($performance) || empty($desc)){
      echo "<script>alert('You Have Not Completed All Required Fields!')</script>";
    }else{
      $reg = dbconnect()->prepare("INSERT INTO  training(employee,course,vendor,cost,start_date, finish_date, remarks, performance, last_update, update_by, created) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
      $reg->execute([$employee,$course,$vendor,$cost,$start_date,$finish_date,$desc,$performance,$last_update,$update_by,$created]);
      if($reg){
      echo "<script> alert('Success, Training Has Been Added!');</script>";
      }
      else{
      echo "<script> alert ('Oops, Operation Failed!');</script>";
      }
    }

   }

?>
<!-- Content -->


<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">New Training</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form method="POST">
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label for="Employee">Employee:</label>
                                    <select name="employee" class="form-control">
                                    <option selected disabled> -- Select --</option>
                                 <?php
                                 
                                    $query = dbConnect()->prepare("SELECT * FROM employee");
                                    $query->execute();
                                    while($row=$query->fetch()){
                                       $username = $row['firstname'] .' '. $row['lastname'];?>
                                 <option value="<?php echo $username; ?>"><?php echo $username; ?></option>
                                 <?php } ?>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="Course">Courses:</label>
                                       <select name="course" class="form-control" id="selCost" onchange="bring_vendor(this.value), bring_cost(this.value)">
                                       <option selected disabled> -- Select --</option>
                                       <?php

                                       $query1 = dbConnect()->prepare("SELECT * FROM training_course");
                                       $query1->execute();
                                       while($row=$query1->fetch()){
                                          $course_name = $row['course_name'];
                                       ?>
                                       <option value="<?php echo $course_name ?>"><?php echo $course_name ?></option>
                                       <?php } ?>
                                       </select>
                                 </div>
                                 <div class="form-group col-md-6" id="vendor">
                                    
                                 </div>
                                 <div class="form-group col-md-6" id="costbring">
                                    
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="Start_date">Start Date:</label>
                                    <input name="start_date" type="date" class="form-control" id="closedate">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="Finish_date">Finish Date:</label>
                                    <input name="finish_date" type="date" class="form-control" id="closedate">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="performance">Performance:</label>
                                    <select name="performance"  class="form-control">
                                       <option selected disabled> -- select -- </option>
                                       <option value="Lobbist">Lobbist</option>
                                       <option value="">Front Desk</option>
                                       <option value="Security">Security</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label for="remarks">Remarks:</label>
                                 <textarea  class="form-control" name="desc" cols="30" rows="4"></textarea>
                              </div>
                              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                           </form>
                        </div>
                     </div>
                  </div>
                </div>
            </div>
          </div>










<?php include 'footer.php'; ?>


<script>
	function bring_vendor(course_name) {
		var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("vendor").innerHTML=xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "connect/bring_vendor.php?course_name="+course_name, true);
			xmlhttp.send();
	}
</script>

<script>
	function bring_cost(course_name) {
		var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("costbring").innerHTML=xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "connect/bring_cost.php?course_name="+course_name, true);
			xmlhttp.send();
	}
</script>

<script>
   // $("#selCost").on('change', function () {
   $(document).ready(function(){
         $("#costbring").css("display", "none");
         $("#vendor").css("display", "none");
   });

   $("#selCost").on("change", function(){
         $("#costbring").css("display", "block");
         $("#vendor").css("display", "block");
   });

</script>