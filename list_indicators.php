<?php include 'header.php'?>

<div id="content-page" class="content-page">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Set Indicators</h4>
                                 </div>
                              </div>
                              <div style="display: flex; justify-content: space-around;">
                                <div class="iq-card-body" style="width: 50%;">
                                    <div class="table-responsive">
                                            <div class="row justify-content-between">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="user-list-files d-flex float-right">
                                                    <!-- <a class="iq-bg-primary" href="javascript:void();">
                                                        Add New
                                                    </a> -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gridSystemModal">
                                                        Add New
                                                    </button>
                                                    <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <?php

                                                            function random_num($size) {
                                                                $length = $size;
                                                                $key = '';
                                                                $keys = range(0, 5);

                                                                    for ($i = 0; $i < $length; $i++) {
                                                                            $key .= $keys[array_rand($keys)];
                                                                    }
                                                                    return  $key;
                                                            }


                                                        
                                                        if (isset($_POST['submitTechnical'])) {
                                                            $indicTech = check_input($_POST['tech']);
                                                            $behavetable = check_input($_POST['tab']);
                                                            $dateBehave = date('Y-m-d');
                                                            $ind_code = random_num(5);

                                                            if (empty($indicTech)) {
                                                                $_SESSION['messageTech'] = "<div class='form-error'>Indicator name is empty!!!</div>";
                                                                // echo "<script>window.location='list_indicators'</script>";
                                                            }else {
                                                                $check = dbConnect()->prepare("SELECT * FROM indicator WHERE indicator=? AND type='Technical'");
                                                                $check->execute([$indicTech]);
                                                                if ($check->rowcount() > 0) {
                                                                    $_SESSION['messageTech'] = "<div class='form-error'>Indicator already exists!!!</div>";
                                                                }else {
                                                                    $insBehave = dbConnect()->prepare("INSERT INTO indicator SET indicator=?, type=?, ind_code=?, created=?");
                                                                    $insBehave->execute([$indicTech,$behavetable,$ind_code,$dateBehave]);
                                                                    if ($insBehave) {
                                                                        $_SESSION['messageTech'] = "<div class='form-success'>Indicator Created Successfully!!!</div>";
                                                                        // echo "<script>window.location='list_indicators'</script>";
                                                                    }else {
                                                                        $_SESSION['messageTech'] = "<div class='form-error'>Error, please try again!!!</div>";
                                                                        // echo "<script>window.location='list_indicators'</script>";
                                                                    }
                                                                }
                                                                
                                                            }
                                                        }
                                                    
                                                    ?>
                                                            <form action="" method="post">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="gridModalLabel">Grids in modals</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="indictor">Indicator Name:</label>
                                                                            <input name="tech" type="text" class="form-control" id="indictor" placeholder="Enter desired department name...">
                                                                            <input type="hidden" value="Technical" name="tab">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="submitTechnical" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div style="text-transform: uppercase; font-family: sans-serif;">
                                                    Technical Competence Indicators.
                                                </div>
                                                <?php if (isset($_SESSION['messageTech'])) { echo $_SESSION['messageTech']; unset($_SESSION['messageTech']);}?>
                                            </div>
                                        </div>
                                        <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                        <thead>
                                                <tr>
                                                    <th width="5%">S/N</th>
                                                    <th>Indicator Name</th>
                                                    <th width="25%">Created</th>
                                                    <th width="5%">Action</th>
                                                </tr>
                                        </thead>
                                        <tbody style="font-size: 12px;">
                                            <?php
                                                $selTech = dbConnect()->prepare("SELECT * FROM indicator WHERE type=?");
                                                $selTech->execute(['Technical']);
                                                $s = 0;
                                                while ($selFetch=$selTech->fetch()) {
                                                    $s++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $s?></td>
                                                        <td><?php echo $selFetch['indicator']?></td>
                                                        <td><?php echo $selFetch['created']?></td>
                                                        <td>
                                                            <a href="del_indicator?id=<?php echo $selFetch['id']; ?>&type=Technical" onclick ="return confirm('Are you sure you want to delete technical competence indicator?')"><i class="ri-delete-bin-line"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="iq-card-body" style="width: 50%;">
                                    <div class="table-responsive">
                                        <div class="row justify-content-between">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="user-list-files d-flex float-right">
                                                    <!-- <a class="iq-bg-primary" href="javascript:void();">
                                                        Add New
                                                    </a> -->

                                                    <!-- MODAL START -->
                                                    <button type="button" class="btn btn-primary" style="color: white;" data-toggle="modal" data-target="#exampleModalCenter">
                                                        Add New
                                                    </button>

                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">

                                                        <?php

                                                        function random_code($size) {
                                                            $length = $size;
                                                            $key = '';
                                                            $keys = range(0, 5);

                                                                for ($i = 0; $i < $length; $i++) {
                                                                        $key .= $keys[array_rand($keys)];
                                                                }
                                                                return  $key;
                                                        }
                                                        
                                                            if (isset($_POST['submitBehave'])) {
                                                                $indicBehave = check_input($_POST['behave']);
                                                                $behavetable = check_input($_POST['table']);
                                                                $dateBehave = date('Y-m-d');
                                                                $ind_code = random_code(5);

                                                                if (empty($indicBehave)) {
                                                                    $_SESSION['messageBehave'] = "<div class='form-error'>Indicator name is empty!!!</div>";
                                                                    // echo "<script>window.location='list_indicators'</script>";
                                                                }else {
                                                                    $check = dbConnect()->prepare("SELECT * FROM indicator WHERE indicator=? AND type='Behavioural'");
                                                                    $check->execute([$indicBehave]);
                                                                    if ($check->rowcount() > 0) {
                                                                        $_SESSION['messageBehave'] = "<div class='form-error'>Indicator already exists!!!</div>";
                                                                    }else {
                                                                        $insBehave = dbConnect()->prepare("INSERT INTO indicator SET indicator=?, type=?, ind_code=?, created=?");
                                                                        $insBehave->execute([$indicBehave,$behavetable,$ind_code,$dateBehave]);
                                                                        if ($insBehave) {
                                                                            $_SESSION['messageBehave'] = "<div class='form-success'>Indicator Created Successfully!!!</div>";
                                                                            // echo "<script>window.location='list_indicators'</script>";
                                                                        }else {
                                                                            $_SESSION['messageBehave'] = "<div class='form-error'>Error, please try again!!!</div>";
                                                                            // echo "<script>window.location='list_indicators'</script>";
                                                                        }
                                                                    }
                                                                    
                                                                }
                                                            }
                                                        
                                                        ?>
                                                            <div class="modal-content">
                                                                <form method="post">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="indict">Indicator Name:</label>
                                                                            <input name="behave" type="text" class="form-control" id="deptname" placeholder="Enter desired department name...">
                                                                            <input type="hidden" value="Behavioural" name="table">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="submitBehave" class="btn btn-primary">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div style="text-transform: uppercase; font-family: sans-serif;">
                                                    Behavioural Competence Indicators.
                                                </div>
                                                <?php if (isset($_SESSION['messageBehave'])) { echo $_SESSION['messageBehave']; unset($_SESSION['messageBehave']);}?>
                                            </div>
                                        </div>
                                        <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                        <thead>
                                                <tr>
                                                    <th width="5%">S/N</th>
                                                    <th>Indicator Name</th>
                                                    <th width="25%">Created</th>
                                                    <th width="5%">Action</th>
                                                </tr>
                                        </thead>
                                        <tbody style="font-size: 12px;">
                                            <?php
                                            $selBehave = dbConnect()->prepare("SELECT * FROM indicator WHERE type=?");
                                            $selBehave->execute(['Behavioural']);
                                            $s = 0;
                                            while ($selFetch=$selBehave->fetch()) {
                                                $s++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $s?></td>
                                                    <td><?php echo $selFetch['indicator']?></td>
                                                    <td><?php echo $selFetch['created']?></td>
                                                    <td>
                                                        <a href="del_indicator?id=<?php echo $selFetch['id']; ?>&type=Behavioural" onclick ="return confirm('Are you sure you want to delete behavioural competence indicator?')"><i class="ri-delete-bin-line"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                              </div>
                           </div>
                     </div>
                  </div>
                </div>
        </div>

<?php include 'footer.php'?>