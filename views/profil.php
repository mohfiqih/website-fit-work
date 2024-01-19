<?php
include('../views/layout/header.php');
?>

<div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
               <div class="col-xxl">
                    <div class="card mb-4">
                         <div class="card-header d-flex align-items-center justify-content-between">
                              <h5 class="mb-0">Your Profile</h5>
                              <small class="text-muted float-end">Fit to Work & Rampcheck</small>
                         </div>
                         <div class="card-body">
                              <form>
                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                             Lengkap</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="bx bx-user"></i></span>
                                                  <input type="text" class="form-control" />
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-company">Username</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span id="basic-icon-default-company2" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                  <input type="text" class="form-control" />
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-email">Email</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                  <input type="text" class="form-control" />
                                                  <span id="basic-icon-default-email2"
                                                       class="input-group-text">@example.com</span>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                             <button type="submit" class="btn"
                                                  style="background-color: #31374C;color: white;height: 40px;border-radius: 50px;">Edit
                                                  Profile</button>
                                        </div>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>

     </div>
</div>
<?php
include('../views/layout/footer.php');
?>