<?php
include('../views/layout/header.php');
?>

<div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
          <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Your Profile</h5>
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
                                                  <input type="text" class="form-control" readonly />
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
                                                  <input type="text" class="form-control" readonly />
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-email">Email</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                  <input type="text" class="form-control" readonly />
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                             <button type="button" class="btn" data-bs-toggle="modal"
                                                  data-bs-target="#editProfil"
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


<div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="editProfilLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editProfilLabel">Fit to Work</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="#" method="POST">
                    <div class="modal-body">
                         <div class="card-body">
                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Hari</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                             <input type="text" class="form-control" name="" placeholder="Masukan Hari"
                                                  required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-company">Tanggal</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                             <input type="date" class="form-control" name=""
                                                  placeholder="Masukan Tanggal" required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">No
                                        Body</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-company2" class="input-group-text"><i
                                                       class="bx bx-buildings"></i></span>
                                             <input type="text" class="form-control" name=""
                                                  placeholder="Masukan No Induk" required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-fullname">Pramudi</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                       class="bx bx-user"></i></span>
                                             <input type="text" class="form-control" name=""
                                                  placeholder="Masukan Pramudi" required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">No
                                        Induk</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-company2" class="input-group-text"><i
                                                       class="bx bx-buildings"></i></span>
                                             <input type="text" class="form-control" name=""
                                                  placeholder="Masukan No Induk" required />
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<?php
include('../views/layout/footer.php');
?>