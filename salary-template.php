<?php include 'header.php' ?>








<!-- Page Content  -->
<div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Salary Template List</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-6">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <form class="mr-3 position-relative">
                                       <div class="form-group mb-0">
                                          <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a class="iq-bg-primary" href="set-salary">
                                       Set New Salary
                                     </a>

                                    <!-- <a class="iq-bg-primary" href="javascript:void();">
                                       Excel
                                     </a>
                                     <a class="iq-bg-primary" href="javascript:void();">
                                       Pdf
                                     </a> -->
                                   </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    
                                    <th>SN</th>
                                    <th>Salary Grade</th>
                                    <th>Basic Salary(₦)</th>
                                    <th>Tax</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>

                                 <?php
                                 
                                 $querySal = dbConnect()->prepare("SELECT * FROM salary_temp ORDER BY id DESC");
                                 $querySal->execute();
                                 $sn= 1;
                                //  $connSal = mysqli_query($connect2db,$querySal);
                                 while ($row=$querySal->fetch()) {
                                     $id = $row['id'];
                                     $grade = $row['salary_grade'];
                                     $salary = $row['salary'];
                                     $taxId = $row['tax_id'];
                                     $code = $row['code'];
                                    
                                    $queryTax = dbConnect()->prepare("SELECT * FROM tax WHERE id=?");
                                    $queryTax->execute([$taxId]);
                                    $rowTax=$queryTax->fetch();
                                    $taxName = $rowTax['tax_name'];
                                    $taxValue = $rowTax['value'];

                                     $created = $row['created'];
                                                                      
                                 
                                 
                                 ?>
                                 <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $grade; ?></td>
                                    <td><?php echo $salary; ?></td>
                                    <td><?php echo $taxName. '('.$taxValue.'%)'; ?></td>
                                    <td><?php echo $created; ?></td>
                                    <td>
                                    <div class="flex align-items-center list-user-action">
                                    
                                    <!-- update modal  -->
                                    <a class="iq-bg-primary" href="javascript:void();" data-toggle="modal" data-target="#exampleModalScrollable<?php echo $id ?>"><i class="fa fa-edit"></i></a>
                                     <!-- Modal update detail -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalScrollable<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Salary Template Management</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="iq-card">
                                                    <div class="iq-card-header d-flex justify-content-between">
                                                    <div class="iq-header-title">
                                                        <h4 class="card-title">Edit Salary Template</h4>
                                                    </div>
                                                    </div>
                                                    <div class="iq-card-body">
                                                    <form method="POST" action="edit-salary-template?code=<?php echo $code; ?>">
                                                        <div class="row">

                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationDefaultUsername">Salary Grade</label>
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text " id="inputGroupPrepend2"><i class="fa fa-area-chart"></i></span>
                                                                </div>
                                                                <input type="text" list="exp" value="<?php echo $grade; ?>" class="form-control" name="editGrade" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                                                    
                                                            </div>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationDefaultUsername">Salary</label>
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text " id="inputGroupPrepend2"><i class="fa fa-money"></i></span>
                                                                </div>
                                                                <input type="text" value="<?php echo $salary; ?>" class="form-control" name="editSalary" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationDefault04">Tax</label>
                                                                <select name="editTax" class="form-control" id="validationDefault04" required>
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

                                                            <div class="col-sm-12 col-lg-12 shadow m-2">
                                                               <div class="iq-card">
                                                                  <div class="iq-card-header d-flex justify-content-between">
                                                                     <div class="iq-header-title">
                                                                        <h4 class="card-title">Allowance</h4>
                                                                     </div>
                                                                  </div>
                                                                  <div class="iq-card-body" id="allowBody<?php echo $id; ?>" style="margin-top: -15px;">
                                                                     <div style="display: flex; justify-content: space-around; border-bottom: 2px solid; margin-bottom: 10px;">
                                                                           <h5>Allowances</h5>
                                                                           <h5>Amount(₦)</h5>
                                                                     </div>

                                                                     <?php 
                                                                     $queryAllow = dbConnect()->prepare("SELECT * FROM allowance WHERE code=?");
                                                                     $queryAllow->execute([$code]);
                                                                     while( $rowAllow=$queryAllow->fetch() ){
                                                                     $allowName = $rowAllow['allowances'];
                                                                     $allowVal = $rowAllow['value'];
                                 
                                                                                                       
                                                                  
                                                                  
                                                                  ?>
                                                                     
                                                                     <div class="form-group" style="display: flex; justify-content: space-around;">
                                                                        <label style="width: 50%;" for="colFormLabelSm"><input class="border-0" type="text" readonly name="allowName[]" value="<?php echo $allowName; ?>"></label>
                                                                        <input class="form-control form-control-sm" value="<?php echo $allowVal; ?>" name="allowVal[]" style="width: 33%;">
                                                                     </div>
                                                                  <?php } ?>
                                                                  </div>
                                                                  <span class="badge iq-bg-primary m-2" style="cursor: pointer;" onclick="addmoreAllow(<?php echo $id; ?>)">add allowance field</span>

                                                               </div>
                                                            </div>

                                                            <div class="col-sm-12 col-lg-12 shadow m-2">
                                                               <div class="iq-card">
                                                                  <div class="iq-card-header d-flex justify-content-between">
                                                                     <div class="iq-header-title">
                                                                        <h4 class="card-title">Deduction</h4>
                                                                     </div>
                                                                  </div>
                                                                  <div class="iq-card-body" id="deductBody<?php echo $id; ?>" style="margin-top: -15px;">
                                                                     <div style="display: flex; justify-content: space-around; border-bottom: 2px solid; margin-bottom: 10px;">
                                                                           <h5>Deductions</h5>
                                                                           <h5>Amount(₦)</h5>
                                                                     </div>


                                                                     <?php 
                                                                     $queryDeduct = dbConnect()->prepare("SELECT * FROM deduction WHERE code=?");
                                                                     $queryDeduct->execute([$code]);
                                                                     while( $rowDeduct=$queryDeduct->fetch() ){
                                                                     $deductName = $rowDeduct['deductions'];
                                                                     $deductVal = $rowDeduct['value'];
                                 
                                                                                                       
                                                                  
                                                                  
                                                                  ?>
                                                                     
                                                                     <div class="form-group" style="display: flex; justify-content: space-around;">
                                                                        <label style="width: 50%;" for="colFormLabelSm"><input class="border-0" type="text" readonly name="deductName[]" value="<?php echo $deductName; ?>"></label>
                                                                        <input class="form-control form-control-sm" name="deductVal[]" value="<?php echo $deductVal; ?>" style="width: 33%;">
                                                                     </div>
                                                                  <?php } ?>

                                                                  </div>
                                                                  <span class="badge iq-bg-primary m-2"style="cursor: pointer;"  onclick="addmoreDeduc(<?php echo $id; ?>)">add deduction field</span>
                                                               </div>
                                                            </div>

                                                        </div>

                                                        
                                                        <button name="editSubmit" type="submit" class="btn btn-primary  m-2">Submit</button>
                                                        <!-- <button type="submit" class="btn iq-bg-danger">cancle</button> -->
                                                    </form>
                                                    </div>
                                                </div>                                                
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                         
                                    <!-- delete link -->
                                    <!-- <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="jobs_del?id=<?php // echo $id; ?>"><i class="ri-delete-bin-line"></i></a> -->
                                         
                                          
                                          
                                          
                                       </div>
                                    </td>
                                 </tr>

                                 <?php } ?>
                             </tbody>
                           </table>
                        </div>
                           <div class="row justify-content-between mt-3">
                              <div id="user-list-page-info" class="col-md-6">
                                 <span>Showing 1 to 5 of 5 entries</span>
                              </div>
                              <div class="col-md-6">
                                 <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">
                                       <li class="page-item disabled">
                                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                       </li>
                                       <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                       <li class="page-item"><a class="page-link" href="#">2</a></li>
                                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                                       <li class="page-item">
                                          <a class="page-link" href="#">Next</a>
                                       </li>
                                    </ul>
                                 </nav>
                              </div>
                           </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- Wrapper END -->



<?php include 'footer.php' ?>


<script>
//add more allowance
function addmoreAllow(id){
		
		let cartBody = $('#allowBody'+id);
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
function addmoreDeduc(id){
		
		let cartBody = $('#deductBody'+id);
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