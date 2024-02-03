<?php
include('../views/layout/header.php');

if (isset($_SESSION['success_add_user'])) {
     echo '<script>alert("' . $_SESSION['success_add_user'] . '");</script>';
     unset($_SESSION['success_add_user']);
}

?>


<div class="content-wrapper">
     <div class="row">
          <div class="content-wrapper">
               <div class="container-xxl flex-grow-1 container-p-y">
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Data Users</h5>
                    <div class="row">
                         <div class="col-lg-12 mb-4 order-0">
                              <div class="card">
                                   <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                             <div class="card-body">
                                                  <h5 class="card-title" style="color: #31374C;">Welcome to Data Users,
                                                       Kak <?php echo $_SESSION['username']; ?> 🎉</h5>
                                                  <p class="mb-4">
                                                       Hi min, jika pekerja admin anda lebih dari 1 silahkan bisa
                                                       tambahkan admin lagi
                                                       ya, Terimakasih! ^_^
                                                  </p>
                                             </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                             <div class="card-body pb-0 px-0 px-md-4">
                                                  <img src="../assets/dasbor/assets/img/illustrations/page-misc-error-light.png"
                                                       height="180" alt="View Badge User"
                                                       data-app-dark-img="illustrations/page-misc-error-light.png"
                                                       data-app-light-img="illustrations/page-misc-error-light.png" />
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <?php
                                                  include '../controllers/User.php';
                                                  
                                                  $connection = new User();
                                                  $hasil = $connection->getUserData();

                                                  $no = 1;

                                   ?>
                    <div class="card">
                         <div class="col-xl-6" style="margin-left: 20px;">
                              <div class="mt-3">
                                   <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                             data-bs-target="#exampleModal">
                                             <i class="tf-icons bx bx-plus" title="Fit to Work"
                                                  style="margin-right: 10px;"></i> Add User
                                        </button>
                                        <div class="btn-group" role="group">
                                             <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle"
                                                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                  style="background-color: #31374C;color: white;">
                                                  <i class="tf-icons bx bx-printer" title="Print"
                                                       style="margin-right: 10px;"></i> Export
                                             </button>
                                             <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                  <a class="dropdown-item" href="../views/PDF-user.php">
                                                       <i class="tf-icons bx bx-book" title="Print"
                                                            style="margin-right: 10px;"></i>PDF</a>
                                                  <a class="dropdown-item" href="../views/EXCEL-user.php">
                                                       <i class="tf-icons bx bx-printer" title="Print"
                                                            style="margin-right: 10px;"></i>Excel</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="table-responsive text-nowrap" style="width:100%">
                              <table class="table" id="example" style="padding: 20px;">
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
                                        <?php foreach ($hasil as $userData) { ?>
                                        <tr>
                                             <td>
                                                  <?php echo $no++; ?>
                                             </td>
                                             <td>
                                                  <?= $userData['full_name'] ?>
                                             </td>
                                             <td>
                                                  <?= $userData['username'] ?>
                                             </td>
                                             <td>
                                                  <?= $userData['email'] ?>
                                             </td>
                                             <td>
                                                  <span
                                                       class="badge bg-label-primary me-1"><?= $userData['status'] ?></span>

                                             </td>
                                             <td>
                                                  <div class="dropdown">
                                                       <div class="col-md-6 col-lg-4">
                                                            <a
                                                                 href="../views/update-user.php?id=<?= $userData['id'] ?>&&username=<?= $userData['username'] ?>">
                                                                 <button type="button" class="btn btn-icon btn-warning"
                                                                      style="height: 30px;">
                                                                      <span class="tf-icons bx bx-pencil"></span>
                                                                 </button>
                                                            </a>
                                                            <?php
                                                                 $status = $userData['status'];
                                                                 if ($status == 'Active') {
                                                                      echo '';
                                                                 } elseif ($status == 'Nonaktif') {
                                                            ?>
                                                            <button type="submit" class="btn btn-icon btn-danger"
                                                                 style="height: 30px;"
                                                                 onclick="if (confirm('Yakin ingin hapus data?')) window.location.href='../controllers/UserDelete.php?id=<?= $userData['id'] ?>';">
                                                                 <span class="tf-icons bx bx-trash"></span>
                                                            </button>
                                                            <?php
                                                            } else {
                                                                 echo '';
                                                            }
                                                            ?>

                                                       </div>
                                                  </div>
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

<!-- TAMBAH DATA USER -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="../controllers/UserAdd.php" method="POST">
                    <div class="modal-body">
                         <div class="card-body">

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
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                             <input type="text" class="form-control" name="email"
                                                  placeholder="Masukan Email" required />
                                        </div>
                                   </div>
                              </div>
                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Status</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-check"></i></span>
                                             <input type="text" class="form-control" name="status" value="Active"
                                                  readonly />
                                        </div>
                                   </div>
                              </div>
                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-email">Password</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-key"></i></span>
                                             <input type="password" class="form-control" name="password"
                                                  placeholder="Masukan Password" required />
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

<!-- <script>
$(document).ready(function() {
     $('#example').DataTable();
});
</script> -->

<script>
$(document).ready(function() {
     $('#example').DataTable({
          info: false,
          ordering: true,
          paging: false
     });
});
</script>


<?php
include('../views/layout/footer.php');
?>