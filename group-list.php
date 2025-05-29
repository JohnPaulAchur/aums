<?php include 'header.php'; ?>

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <!-- <div class="row"> -->
            <h4 class="p-2 border-top"><i class="fa fa-group"></i> Group List</h4>
               
                <ul class="list-group list-group-light rounded-pill">
        
                <?php
                $query = dbConnect()->prepare("SELECT * FROM group_tbl ORDER BY id DESC");
                $query->execute();
                while ( $row  = $query->fetch() ){
                    $groupName = $row['group_name'];
                    $id = $row['id'];
                    

                    $queryM = dbConnect()->prepare("SELECT * FROM group_members WHERE group_id=?");
                    $queryM->execute([$id]);
                    $membersNo = $queryM->rowCount();

                
                
                ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="group-members?id=<?php echo $id; ?>" class="d-flex align-items-center">
                    
                    <img src="images/group.jpg" alt="" style="width: 45px; height: 45px"
                        class="rounded-circle m-2" />
                    <div class="ms-3">
                        <h4 class="fw-bold mb-1"><?php echo $groupName; ?></h4>
                        <p class="text-muted mb-0"><span class="text-dark"><?php echo $membersNo; ?></span> members</p>
                    </div>
                </a>
                    <div>
                        <a href="group-members?id=<?php echo $id; ?>"><i class="fa fa-eye text-success"></i></a>
                        <!-- edit -->
                        <?php if ($_SESSION['urole'] == "Admin"): ?>

                            <a data-toggle="modal" data-target="#gridSystemModal<?php echo $id; ?>" class=""><i class="fa fa-edit text-info"></i></a>
                            <!-- edit body -->
                            <div id="gridSystemModal<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    
                                    <form action="update-group?id=<?php echo $id; ?>" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="gridModalLabel">Edit Group Name</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="group">Group Name:</label>
                                                    <input name="edgroup" value="<?php echo $groupName; ?>" type="text" class="form-control" id="group" placeholder="Enter desired group name...">
                                                    <!-- <input type="hidden" value="Technical" name="tab"> -->
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="edsubmit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
    
    
                            <a onclick="return confirm('Are you sure you want to delete the group ?')" href="group-del?id=<?php echo $id; ?>" ><i class="fa fa-trash text-danger"></i></a>
                        <?php endif; ?>
                    </div>
                    
                </li>

                <?php } ?>
                
                </ul>
            <!-- </div> -->
        </div>
    </div>


<?php include 'footer.php'; ?>