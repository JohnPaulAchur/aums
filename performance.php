<?php

    include 'header.php';

    $id = $_SESSION['uid'];

    function random_code($size) {
      $length = $size;
      $key = '';
      $keys = range(0, 5);

          for ($i = 0; $i < $length; $i++) {
                  $key .= $keys[array_rand($keys)];
          }
          return  $key;
  }
  $app_code = random_code(5);

    if(isset($_POST['submit']))
    {

      $emp_id = $_POST['emp_id'];

      $technical = $_POST['technical'];
      $tech = $_POST['tech'];

      $behavioural = $_POST['behavioural'];
      $behave = $_POST['behave'];

      $month = date('m');
      $year = date('Y');
      $created = date('Y-m-d');
      if(empty($emp_id)){
         echo "<script>alert('Oops! Employee's name is required') </script>";
      }
      elseif(!empty($tech || $behave)){

         $check = dbConnect()->prepare("SELECT * FROM appraisal WHERE emp_id=? AND month=? AND year=?");
         $check->execute([$emp_id,$month,$year]);
         if ($check->rowcount()>0) {
            echo "<script>alert('Employee has recieved appraisal for the month!!!')</script>";
         }else {
            foreach ($tech as $i => $item) {
            $insTech = dbConnect()->prepare("INSERT INTO appraisal SET emp_id=?, appraisal=?, app_code=?, month=?, year=?, score=?, created=?");
            $insTech->execute([$emp_id,$technical[$i],$app_code,$month,$year,$tech[$i],$created]);
            }

            foreach ($behave as $i => $be) {
               $insBehave = dbConnect()->prepare("INSERT INTO appraisal SET emp_id=?, appraisal=?, app_code=?, month=?, year=?, score=?, created=?");
               $insBehave->execute([$emp_id,$behavioural[$i],$app_code,$month,$year,$behave[$i],$created]);
            }


            echo "<script>alert('Employee Appraisal Successful') </script>";
         }
         
      }else{
         echo "<script>alert('Oops! Complete Relevant Indicator Fields') </script>";
      }

    }
?>


   <div id="content-page" class="content-page">
      <form method="POST">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Give Appraisal</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                           <div class="form-group" style="display: flex; align-items: center; justify-content: center; width: 70%;">
                              <label style="width: 30%;" for="emp_id">Select Employee:</label>
                              <select name="emp_id" class="form-control">
                                    <option selected value=""> -- select -- </option>
                                    <?php 
                                       $getemp = dbConnect()->prepare("SELECT * FROM employee WHERE NOT id=?");
                                       $getemp->execute([$id]);
                                       while ($fetchemp = $getemp->fetch()) {?>
                                          <option value="<?php echo $fetchemp['emp_id']?>"><?php echo $fetchemp['firstname'].' '.$fetchemp['lastname'].' - '.$fetchemp['dept'] ?></option>
                                    <?php } ?>
                                    
                              </select>
                           </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-12 col-lg-6">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Technical Competencies</h4>
                        </div>
                     </div>
                     <div class="iq-card-body" style="margin-top: -15px;">
                        <p>Define Employees Technical Capabilities Here. This will be used in summing up performance</p>
                        <div style="display: flex; justify-content: space-around; border-bottom: 2px solid; margin-bottom: 10px;">
                              <h5>Indicators</h5>
                              <h5>Rate</h5>
                        </div>
                        <!-- LOOPED INDICATORS -->
                        <?php
                        $type = 'Technical';
                           $techSelect = dbConnect()->prepare("SELECT * FROM indicator WHERE type=?");
                           $techSelect->execute([$type]);
                           while ($fetTech=$techSelect->fetch()) {?>
                              <div class="form-group" style="display: flex; justify-content: space-around;">
                                 <label style="width: 50%;" for="colFormLabelSm"><?php echo $fetTech['indicator'] ?></label>
                                 <input type="hidden" name="technical[]" value="<?php echo $fetTech['indicator'] ?>">
                                 <select class="form-control form-control-sm" name="tech[]" style="width: 33%;">
                                    <option selected value="0">None</option>
                                          <?php 
                                          //   $i = 0;
                                                for ($it=1; $it < 6; $it++) {
                                                   echo "<option value='$it'>Rate $it</option>";
                                                }
                                          ?>
                                 </select>
                              </div>
                        <?php } ?>
                        
                        <!-- END LOOPED INDICATORS -->
                     </div>
                  </div>
               </div>
               <div class="col-sm-12 col-lg-6">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Behavioural/Organizational Competencies.</h4>
                        </div>
                     </div>
                     <div class="iq-card-body" style="margin-top: -15px;">
                        <p>Define Employees Behavioural Capabilities Here. This will be used in summing up performance</p>
                           
                        <div style="display: flex; justify-content: space-around; border-bottom: 2px solid; margin-bottom: 10px;">
                              <h5>Indicators</h5>
                              <h5>Rate</h5>
                        </div>
                        <!-- LOOPED INDICATORS -->
                        <?php
                        $type = 'Behavioural';
                           $beSelect = dbConnect()->prepare("SELECT * FROM indicator WHERE type=?");
                           $beSelect->execute([$type]);
                           while ($fetSelect=$beSelect->fetch()) {?>
                              <div class="form-group" style="display: flex; justify-content: space-around;">
                                 <label style="width: 50%;" for="colFormLabelSm"><?php echo $fetSelect['indicator'] ?></label>
                                 <input type="hidden" name="behavioural[]" value="<?php echo $fetSelect['indicator'] ?>">
                                 <select class="form-control form-control-sm" name="behave[]" style="width: 33%;">
                                    <option selected value="0">None</option>
                                          <?php 
                                          //   $i = 0;
                                                for ($i=1; $i < 6; $i++) {
                                                   echo "<option value='$i'>Rate $i</option>";
                                                }
                                          ?>
                                 </select>
                              </div>
                        <?php } ?>
                        
                        <!-- END LOOPED INDICATORS -->

                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
            </div>
         </div>
      </form>
   </div>


<?php include 'footer.php' ?>