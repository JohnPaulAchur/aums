<?php include 'header.php'?>
        <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">List a Vacancy</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <p>Add job opportunities and vacancies here. All employees can see this.</p>
                           <form>
                              <div class="form-group">
                                 <label for="title">Job Title:</label>
                                 <input name="title" type="text" class="form-control" id="title" placeholder="Enter vacany name...">
                              </div>
                              <div class="form-group">
                                 <label for="job_cat">Job Category:</label>
                                 <select name="job_cat" id="job_cat" class="form-control">
                                    <option selected disabled> -- select -- </option>
                                    <option value="">Lobbist</option>
                                    <option value="">Front Desk</option>
                                    <option value="">Security</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="desc">Job Description:</label>
                                 <textarea  class="form-control" name="desc" id="desc" cols="30" rows="4"></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="closedate">Closing Date:</label>
                                 <input name="closedate" type="date" class="form-control" id="closedate">
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                           </form>
                        </div>
                     </div>
                  </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'?>