<?php
include('../views/layout/header.php');
?>

<div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
          <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Add Users</h5>
          <div class="row">
               <div class="col-xxl-6">
                    <div class="card mb-4">
                         <div class="card-header d-flex align-items-center justify-content-between">
                              <h5 class="mb-0">Tambah User</h5>
                              <small class="text-muted float-end">Fit to Work & Rampcheck</small>
                         </div>
                         <div class="card-body">
                              <form action="#" method="POST">
                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                             Lengkap</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="bx bx-user"></i></span>
                                                  <input type="text" class="form-control" name="full_name"
                                                       placeholder="Masukan Nama Lengkap" required />
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
                                                  <input type="text" class="form-control" name="username"
                                                       placeholder="Masukan Username" required />
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-email">Email</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                  <input type="text" class="form-control" name="email"
                                                       placeholder="Masukan Email" required />
                                                  <span class="input-group-text">@example.com</span>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-email">Password</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                  <input type="password" class="form-control" name="password"
                                                       placeholder="Masukan Password" required />
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                             <button type="submit" class="btn"
                                                  style="background-color: #31374C;color: white;height: 40px;border-radius: 50px;">Tambah
                                                  Users</button>
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