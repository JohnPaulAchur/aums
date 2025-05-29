<?php include 'header.php'; ?>

<?php 

if (isset($_POST['submit'])){
      $desc = check_input($_POST['description']);
      $employee = $_SESSION['uemail'];
      $type = check_input($_POST['type']);
      $status = check_input($_POST['status']);

   
      if (empty($desc) || empty($type)  || empty($status)) {
         echo "<script>alert('You Have Not Completed All Required Fields!')</script>";
      }else{
				$mainImage = $_FILES['attachment']['name'];
				$source = $_FILES['attachment']['tmp_name'];
				$error = $_FILES['attachment']['error'];
				$size = $_FILES['attachment']['size'];
				$imgtype = $_FILES['attachment']['type'];

				$fileExt = explode('.',$mainImage);
				$mainExt = strtolower(end($fileExt));

				$allow = array('jpeg','png','jpg','jpeg','gif');   

				if (in_array($mainExt, $allow)) {
					if ($error === 0) {
						if ($size < 3000000) {
							$newName = uniqid('',true) . "." . $mainExt;

							$destination = 'images/complain/' . $newName;

							$upload = move_uploaded_file($source,$destination);

         $reg = dbconnect()->prepare("INSERT INTO complain(description,employee,complaint_type,status,attachment) VALUES(?,?,?,?,?)");
         $reg->execute([$desc,$employee,$type,$status,$newName]);
         if($reg){
         echo "<script> alert('Success, Complain Submitted successfully!');</script>";
         }else{
            echo "<script> alert ('Oops, Operation Failed !'); window.location='view_complaint'</script>";
               }
         }else {
            echo "<script> alert('File size is too big!!!');</script>";
         }
      }else {
         echo "<script> alert('An error occurred!!!');</script>";
      }
   }else {
      echo "<script> alert('File extension is not supported!!!');</script>";
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
                              <h4 class="card-title">New Complain</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form method="POST" enctype="multipart/form-data">
                              <div class="row">
                                 <div class="form-group col-md-12">
                                    <label for="Description">Description:</label>
                                   <textarea  name="description" class="form-control"> </textarea>
                                 </div>
                                 <div class="form-group col-md-6">
                                 <label for="compliant type">Complaint Type:</label>
                                       <select name="type" class="form-control">
                                         <option selected disabled> -- Select Complaint Type -- </option>
                                            <?php
                                            $query = dbConnect()->prepare("SELECT * FROM complaint_type");
                                            $query->execute();
                                            while($row=$query->fetch()){
                                                $id = $row['id'];
                                                $type = $row['type'];?>
                                            <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                                            <?php } ?>
                                        </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select name="status" type="text" class="form-control">
                                        <option value=""> --Select-- </option>
                                        <option value="Open">Open</option>
                                    </select>
                                </div>
                                 <div class="form-group col-md-12">
                                    <label for="attachment">Attachment:</label>
                                    <input name="attachment" type="file" class="">
                                 </div>
                              </div>
                              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                           </form>
                        </div>
                     </div>
                  </div>
                </div>
            </div>

            <!-- Complaint List Table -->
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
               <div class="iq-header-title">
                  <h4 class="card-title">Complaint List</h4>
               </div>
            </div>
            <div class="iq-card-body">
               <table class="table table-bordered table-striped text-center">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $n = 0;
                     $session_email = $_SESSION['uemail'];
                     $session_role = $_SESSION['urole'];

                     $sql = ($session_role === 'Admin')
                         ? dbConnect()->prepare("SELECT * FROM complain ORDER BY id DESC")
                         : dbConnect()->prepare("SELECT * FROM complain WHERE employee = ? ORDER BY id DESC");

                     if ($session_role !== 'Admin') $sql->execute([$session_email]);
                     else $sql->execute();

                     while ($row = $sql->fetch()):
                        $n++;
                        $id = $row['id'];
                        $status = $row['status'];
                        $employee = $row['employee'];
                        $type = $row['complaint_type'];
                        $created = $row['created'];

                        $emp_stmt = dbConnect()->prepare("SELECT firstname, lastname FROM employee WHERE email = ?");
                        $emp_stmt->execute([$employee]);
                        $emp = $emp_stmt->fetch();
                        $emp_name = $emp ? $emp['firstname'] . ' ' . $emp['lastname'] : 'Unknown';

                        $badge = ($status === 'Resolved') ? 'badge-success' : 'badge-warning';
                     ?>
                     <tr>
                        <td><?= $n ?></td>
                        <td><?= htmlspecialchars($emp_name) ?></td>
                        <td><?= htmlspecialchars($type) ?></td>
                        <td><span class="badge <?= $badge ?>"><?= htmlspecialchars($status) ?></span></td>
                        <td><?= htmlspecialchars($created) ?></td>
                        <td>
                           <?php if ($session_role === 'Admin'): ?>
                              <?php if ($status === 'Open'): ?>
                                 <button class="btn btn-sm btn-success resolve-btn" data-id="<?= $id ?>">Resolve</button>
                              <?php endif; ?>
                           <?php endif; ?>
                           <button class="btn btn-sm btn-info view-btn" 
                                   data-id="<?= $id ?>" 
                                   data-desc="<?= htmlspecialchars($row['description']) ?>" 
                                   data-type="<?= htmlspecialchars($type) ?>" 
                                   data-status="<?= htmlspecialchars($status) ?>" 
                                   data-attachment="<?= $row['attachment'] ?>" 
                                   data-toggle="modal" data-target="#viewModal">
                                   👁️
                           </button>
                        </td>
                     </tr>
                     <?php endwhile; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Complaint Detail</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <p><strong>Type:</strong> <span id="modal-type"></span></p>
            <p><strong>Status:</strong> <span id="modal-status"></span></p>
            <p><strong>Description:</strong></p>
            <p id="modal-description"></p>
            <p><strong>Attachment:</strong><br>
               <img id="modal-image" src="" style="max-width: 100%; height: auto;">
            </p>
         </div>
      </div>
   </div>
</div>



          </div>



<?php include 'footer.php'; ?><!-- JavaScript -->
<script>
$(document).ready(function() {
   // Populate modal on view
   $('.view-btn').on('click', function() {
      $('#modal-type').text($(this).data('type'));
      $('#modal-status').text($(this).data('status'));
      $('#modal-description').text($(this).data('desc'));
      const img = $(this).data('attachment');
      $('#modal-image').attr('src', 'images/complain/' + img);
   });

   // Resolve Complaint (AJAX)
   $('.resolve-btn').on('click', function() {
      const id = $(this).data('id');
      if (confirm('Mark this complaint as resolved?')) {
         $.ajax({
            url: 'resolve_complaint.php',
            type: 'POST',
            data: { id: id },
            success: function(response) {
               alert('Complaint resolved.');
               location.reload();
            },
            error: function() {
               alert('Error resolving complaint.');
            }
         });
      }
   });
});
</script>