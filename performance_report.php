<?php include 'header.php'; ?>


  <div id="content-page" class="content-page">
        <div class="container-fluid">
          <div class="row">
              <div class="col-sm-12">
                    <div class="iq-card">
                          <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">View Leave Category</h4>
                            </div>
                          </div>
                          <div class="iq-card-body">
                          <div id="table" class="table-editable">
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Employee Name</th>
                                  <th>Department</th>
                                  <th>Emp_Id</th>
                                  <th>Appraisal</th>
                                  <th>Month</th>
                                  <th>Year</th>
                                  <th>Action</th>
                                  <th>Date</th>
                                </tr>
                              </thead>
                           
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                <a href="update_leave_category" class="green"><i class="fa fa-edit"></i></a>
                                <a href="del_leave_category"  onclick ="return confirm('Are You Sure You Want To Delete This Training Course?')" class="red"><i class="fa fa-trash"></i></a>
                                </td>
                                <td></td>
                              </tr>

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
</div>


<?php include 'footer.php'; ?>