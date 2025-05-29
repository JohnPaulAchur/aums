<?php include 'header.php';



$msg = "";
if (isset($_POST['submit'])) {
    $amount = check_input($_POST['amount']);
    $duration = check_input($_POST['duration']);
    $note = check_input($_POST['note']);
    $random = rand();
    $created =date('Y-m-d');
     if ( empty($amount) || empty($duration) || empty($note) ) {
        echo '<script>alert("All Fields Required !!!");window.location="loan-application"</script>';
    }else{
    $query = dbConnect()->prepare("SELECT * FROM loan WHERE employee_id=? AND status=? AND (loan_balance>0)");
    $query->execute([$empuid,1]);
    if($row=$query->rowCount() > 0){
        echo '<script>alert("You Have an outstanding loan !!!");window.location="loan-application"</script>';
    }else{
        $queryIns = dbConnect()->prepare("INSERT INTO loan SET employee_id=?, loan_amount=? , loan_balance=?, monthly_pay=?, note=?, code=?, status=?, created=?, paid=?,duration=?");
        if( $queryIns->execute([$empuid,$amount,$amount,$amount/$duration,$note,$random,0,$created,0,$duration]) ){
            // $msg = '<p style="color:green;">Operation Succesful !!!</p>';
            echo '<script>alert("Loan Application Successful !!!");window.location="loan-application"</script>';
        }else{
             // $msg = '<p style="color:red;">Oops , An Error Occured!!!</p>';
            echo '<script>alert("Oops , An Error Occured !!!");window.location="loan-application"</script>';
        }

    }
}
    

    
}


?>



    <!-- Page Content  -->
    <div id="content-page" class="content-page">
      <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Request Loan</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">



                        <div class="iq-card">
                    
                    <div class="iq-card-body">
                        <form method="POST">
                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationDefaultUsername">Loan Amount</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text " id="inputGroupPrepend2">₦</span>
                            </div>
                            <input type="number" class="form-control" name="amount" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                               
                        </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationDefaultUsername">Loan Duration(In Month)t</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text " id="inputGroupPrepend2"><i class="fa fa-clock-o"></i></span>
                            </div>
                            <input type="number" class="form-control" name="duration" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                               
                        </div>
                        </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputmonth">Note</label>
                                <textarea  name="note" class="form-control" id="exampleInputmonth" value="2019-12"></textarea>
                            </div>
                        </div>

                       
                        <button type="submit" name="submit" class="btn btn-primary float-right mr-2">Send Request</button>
                            

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