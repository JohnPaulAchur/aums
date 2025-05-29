<?php include 'header.php'; ?>

<?php

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
  $code = random_code(5);

    if(isset($_POST['submit']))
    {

      $grade = $_POST['grade'];
      $salary = $_POST['salary'];
      $tax = $_POST['tax'];


      
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
        foreach ($allowVal as $i => $item) {
            $insAllow = dbConnect()->prepare("INSERT INTO allowance SET allowances=?, value=?, code=?, created=?");
            $insAllow->execute([$allowance[$i],$allowVal[$i],$code,$created]);

         }

         foreach ($deductVal as $i => $be) {
            $insDeduct= dbConnect()->prepare("INSERT INTO deduction SET deductions=?, value=?, code=?, created=?");
            $insDeduct->execute([$deduction[$i],$deductVal[$i],$code,$created]);
         }
            $insgrade= dbConnect()->prepare("INSERT INTO salary_temp SET salary_grade=?, salary=?, tax_id=?, created=?,code=?");
            $insgrade->execute([$grade,$salary,$tax,$created,$code]);

         echo "<script>alert('Salary Grade added Successfully'); window.location='salary-template'; </script>";
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
                        <h4 class="card-title">New Salary Template</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                    <form method="POST">
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="validationDefaultUsername">Salary Grade Name</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text " id="inputGroupPrepend2"><i class="fa fa-area-chart"></i></span>
                                </div>
                                <input type="text" list="exp" class="form-control" name="grade" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required >
                                <datalist id="exp">
                                    <option value="GRADE A">
                                    <option value="GRADE B">
                                    <option value="GRADE C">
                                    <option value="GRADE C">
                                    <option value="GRADE E">
                                </datalist>    
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationDefaultUsername">Basic Salary</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text " id="inputGroupPrepend2"><i class="fa fa-money"></i></span>
                                </div>
                                <input type="text" class="form-control" name="salary" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationDefault04">Tax</label>
                                <select name="tax" class="form-control" id="validationDefault04" required>
                                <option  value="">Choose...</option>
                                <?php 
                                
                                $queryTaxes = dbConnect()->prepare("SELECT * FROM tax");
                                $queryTaxes->execute();

                                while($rowTaxes=$queryTaxes->fetch()){

                                    $taxNames = $rowTaxes['tax_name'];
                                    $taxValues = $rowTaxes['value'];
                                    $taxIds = $rowTaxes['id'];
                                
                                ?>
                                <option value="<?php echo $taxIds; ?>"><?php echo $taxNames. '('.$taxValues.'%)'; ?></option>
                                <?php } ?>
                                </select>
                            </div>

                        </div>

                        
                        <!-- <button name="submit" type="submit" class="btn btn-primary">Submit</button> -->
                        <!-- <button type="submit" class="btn iq-bg-danger">cancle</button> -->
                    </form>
                    </div>
                </div>  
               </div>

               <div class="col-sm-12 col-lg-6">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Allowance</h4>
                        </div>
                     </div>
                     <div class="iq-card-body" id="allowBody" style="margin-top: -15px;">
                        <div style="display: flex; justify-content: space-around; border-bottom: 2px solid; margin-bottom: 10px;">
                              <h5>Allowances</h5>
                              <h5>Amount(₦)</h5>
                        </div>
                        
                        <div class="form-group" style="display: flex; justify-content: space-around;">
                            <label style="width: 50%;" for="colFormLabelSm"><input class="border-0" type="text" readonly name="allowName[]" value="Medical"></label>
                            <input class="form-control form-control-sm" name="allowVal[]" style="width: 33%;">
                        </div>

                      </div>
                        <!-- <div class="form-group" style="display: flex; justify-content: space-around;">
                            <label style="width: 50%;" for="colFormLabelSm">Total :</label>
                            <input readonly  name="Total" style="border-top:0; border-left:0; border-right:0;" style="width: 33%;">
                        </div> -->
                     <span class="badge iq-bg-primary m-2" style="cursor: pointer;" onclick="addmoreAllow()">add allowance field</span>

                  </div>
               </div>

               <div class="col-sm-12 col-lg-6">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Deduction</h4>
                        </div>
                     </div>
                     <div class="iq-card-body" id="deductBody" style="margin-top: -15px;">
                        <div style="display: flex; justify-content: space-around; border-bottom: 2px solid; margin-bottom: 10px;">
                              <h5>Deductions</h5>
                              <h5>Amount(₦)</h5>
                        </div>
                        
                        <div class="form-group" style="display: flex; justify-content: space-around;">
                            <label style="width: 50%;" for="colFormLabelSm"><input class="border-0" type="text" readonly name="deductName[]" value="Contribution"></label>
                            <input class="form-control form-control-sm" name="deductVal[]" style="width: 33%;">
                        </div>
                     </div>
                     <!-- <div class="form-group" style="display: flex; justify-content: space-around;">
                            <label style="width: 50%;" for="colFormLabelSm">Total :</label>
                            <input  id="totalDeduct" type="number"  name="Total" style="border-top:0; border-left:0; border-right:0;" style="width: 33%;">
                        </div> -->
                     <span class="badge iq-bg-primary m-2"style="cursor: pointer;"  onclick="addmoreDeduc()">add deduction field</span>
                  </div>
               </div>
               


            </div>
            <div class="col-md-12">
               <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
            </div>
         </div>
      </form>
   </div>




<?php include 'footer.php'; ?>

<script>
//add more allowance
function addmoreAllow(){
		
		let cartBody = $('#allowBody');
		// console.log(id +' '+ name +' '+ price +' '+ qty );
		let listAllow = `
            <div id="rowAllow" class="form-group" style="display: flex; justify-content: space-around;">
                <label style="width: 50%;" for="colFormLabelSm"><input style="border-top:0; border-left:0; border-right:0;"  type="text" name="allowName[]" placeholder="Enter Allowance Name" value=""></label>
                <input class="form-control form-control-sm" name="allowVal[]" placeholder="Enter Value" style="width: 33%;">
                <i onclick="delAllow()" class="text-danger fa fa-close"></i>
            </div>
            

        `;
		cartBody.append(listAllow);

		// console.log($('#AllowBody #rowAllow').length);
		// getTotal();
		
	}


    //add more Deduction
function addmoreDeduc(){
		
		let cartBody = $('#deductBody');
		// console.log(id +' '+ name +' '+ price +' '+ qty );
		let listDeduct = `
            <div id="rowDeduct" class="form-group" style="display: flex; justify-content: space-around;">
                <label style="width: 50%;" for="colFormLabelSm"><input style="border-top:0; border-left:0; border-right:0;"  type="text" name="deductName[]" placeholder="Enter Deduction Name" value=""></label>
                <input class="form-control form-control-sm" id="dInp" type="number" placeholder="Enter value"  name="deductVal[]" style="width: 33%;">
                <i onclick="delDeduct()" class="text-danger  fa fa-close"></i>
            </div>

        `;
		cartBody.append(listDeduct);

		
		
	}


    //remove rows

    function delDeduct(){
		var roll = document.getElementById("rowDeduct");
		
		roll.remove(roll);
		//alt methods
		// roll.parentNode.removeChild(roll);
		// roll.parentElement.removeChild(roll);
		// getTotal();
		

	}

    function delAllow(){
		var roll = document.getElementById("rowAllow");
		
		roll.remove(roll);
		
		

	}
    // remove rows end



</script>