<?php
include('../views/layout/header.php');
?>

<div class="content-wrapper">
     <div class="row">
          <div class="content-wrapper">
               <div class="container-xxl flex-grow-1 container-p-y">
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Data Users</h5>
                    <div class="card">
                         <!-- <div class="col-xl-6" style="margin-left: 20px;">
                              <div class="mt-3">
                                   <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-primary">
                                             <i class="tf-icons bx bx-plus"></i> Data Users
                                        </button>
                                        <div class="btn-group" role="group">
                                             <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle"
                                                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                  style="background-color: #31374C;color: white;">
                                                  Print
                                             </button>
                                             <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                  <a class="dropdown-item" href="javascript:void(0);">Print to PDF</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <br /> -->


                         <div class="table-responsive text-nowrap">
                              <table class="table">
                                   <thead>
                                        <tr>
                                             <th>No</th>
                                             <th>Nama Lengkap</th>
                                             <th>Username</th>
                                             <th>Email</th>
                                             <th>Status</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                                   <tbody class="table-border-bottom-0">
                                        <tr>
                                             <td>
                                                  1
                                             </td>
                                             <td>
                                                  <i class="bx bxl-angular bx-sm text-danger me-3"></i>
                                                  <span class="fw-medium">Angular Project</span>
                                             </td>
                                             <td>Albert Cook</td>
                                             <td>
                                                  <ul
                                                       class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                       <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                            title="Lilian Fuller">
                                                            <img src="../assets/img/avatars/5.png" alt="Avatar"
                                                                 class="rounded-circle" />
                                                       </li>
                                                       <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                            title="Sophia Wilkerson">
                                                            <img src="../assets/img/avatars/6.png" alt="Avatar"
                                                                 class="rounded-circle" />
                                                       </li>
                                                       <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                            title="Christina Parker">
                                                            <img src="../assets/img/avatars/7.png" alt="Avatar"
                                                                 class="rounded-circle" />
                                                       </li>
                                                  </ul>
                                             </td>
                                             <td><span class="badge bg-label-primary me-1">Active</span></td>
                                             <td>
                                                  <div class="dropdown">
                                                       <div class="col-md-6 col-lg-4">
                                                            <button type="button" class="btn btn-icon btn-success"
                                                                 style="height: 30px;">
                                                                 <span class="tf-icons bx bx-printer"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning"
                                                                 style="height: 30px;">
                                                                 <span class="tf-icons bx bx-pencil"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-danger"
                                                                 style="height: 30px;">
                                                                 <span class="tf-icons bx bx-trash"></span>
                                                            </button>
                                                       </div>
                                                  </div>
                                             </td>
                                        </tr>
                                   </tbody>
                              </table>
                         </div>
                    </div>

               </div>
          </div>
     </div>
</div>

<?php
include('../views/layout/footer.php');
?>