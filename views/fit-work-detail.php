<?php
include('../views/layout/header.php');
?>


<div class="content-wrapper">
     <div class="row">
          <div class="content-wrapper">
               <div class="container-xxl flex-grow-1 container-p-y">
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App / Fit to Work /</span> Detail</h5>

                    <div class="row">
                         <div class="col-md-6">
                              <div class="card">
                                   <div class="mt-3" style="margin-left: 20px;">
                                        <div class="btn-group" role="group"
                                             aria-label="Button group with nested dropdown">
                                             <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                  data-bs-target="#exampleModal">
                                                  <i class="tf-icons bx bx-plus" title="Fit to Work"></i> Add Rampcheck
                                             </button>
                                             <div class="btn-group" role="group">
                                                  <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle"
                                                       data-bs-toggle="dropdown" aria-haspopup="true"
                                                       aria-expanded="false"
                                                       style="background-color: #31374C;color: white;">
                                                       <i class="tf-icons bx bx-printer" title="Print"
                                                            style="margin-right: 10px;"></i> Print
                                                  </button>
                                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                       <a class="dropdown-item" href="javascript:void(0);">
                                                            <i class="tf-icons bx bx-book" title="Print"
                                                                 style="margin-right: 10px;"></i>Print to PDF</a>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Data Pramudi</h5>
                                        <small class="text-muted float-end">nama..</small>
                                   </div>
                                   <div class="card-body">
                                        <div class="col-xl">

                                             <div class="mb-4">

                                                  <form>
                                                       <div class="mb-3">
                                                            <label class="form-label" for="basic-default-fullname">Full
                                                                 Name</label>
                                                            <input type="text" class="form-control"
                                                                 id="basic-default-fullname" placeholder="John Doe" />
                                                       </div>
                                                       <div class="mb-3">
                                                            <label class="form-label"
                                                                 for="basic-default-company">Company</label>
                                                            <input type="text" class="form-control"
                                                                 id="basic-default-company" placeholder="ACME Inc." />
                                                       </div>
                                                       <!-- <button type="submit" class="btn btn-primary">Send</button> -->
                                                  </form>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <!-- FIT WORK -->
                         <div class="col-md-6">
                              <div class="nav-align-top mb-4">
                                   <ul class="nav nav-tabs nav-fill" role="tablist">
                                        <li class="nav-item">
                                             <button type="button" class="nav-link active" role="tab"
                                                  data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                                  aria-controls="navs-justified-home" aria-selected="true">
                                                  <i class="tf-icons bx bx-user me-1"></i><span
                                                       class="d-none d-sm-block"> Seragam</span>
                                                  <span
                                                       class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">7
                                                  </span>
                                             </button>
                                        </li>
                                        <li class="nav-item">
                                             <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                  data-bs-target="#navs-justified-profile"
                                                  aria-controls="navs-justified-profile" aria-selected="false">
                                                  <i class="tf-icons bx bx-book me-1"></i><span
                                                       class="d-none d-sm-block"> Surat</span>
                                                  <span
                                                       class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">4
                                                  </span>
                                             </button>
                                        </li>
                                   </ul>
                                   <div class="tab-content">
                                        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                                             <p>

                                             </p>
                                             <p class="mb-0">

                                             </p>
                                        </div>
                                        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                                             <p>

                                             </p>
                                             <p class="mb-0">

                                             </p>
                                        </div>

                                   </div>
                              </div>
                              <!-- Operasi dan Kesehatan -->
                              <div class="col-md-12">
                                   <div class="nav-align-top mb-4">
                                        <ul class="nav nav-tabs nav-fill" role="tablist">

                                             <li class="nav-item">
                                                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                       data-bs-target="#navs-justified-messages"
                                                       aria-controls="navs-justified-messages" aria-selected="false">
                                                       <i class="tf-icons bx bx-id-card me-1"></i><span
                                                            class="d-none d-sm-block"> Operasi</span>
                                                       <span
                                                            class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">4
                                                       </span>
                                                  </button>
                                             </li>
                                             <li class="nav-item">
                                                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                       data-bs-target="#navs-justified-kesehatan"
                                                       aria-controls="navs-justified-messages" aria-selected="false">
                                                       <i class="tf-icons bx bx-shield-plus me-1"></i><span
                                                            class="d-none d-sm-block"> Kesehatan</span>
                                                       <span
                                                            class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">2
                                                       </span>
                                                  </button>
                                             </li>
                                        </ul>
                                        <div class="tab-content">

                                             <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                                                  <p>

                                                  </p>
                                                  <p class="mb-0">

                                                  </p>
                                             </div>

                                             <div class="tab-pane fade" id="navs-justified-kesehatan" role="tabpanel">
                                                  <p>
                                                       ppp
                                                  </p>
                                                  <p class="mb-0">

                                                  </p>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="col-md-6">
                         </div>

                    </div>
               </div>
          </div>
     </div>
</div>
<?php
include('../views/layout/footer.php');
?>