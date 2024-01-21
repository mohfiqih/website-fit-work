<?php
include('../views/layout/header.php');
include('../controllers/User.php');

$userController = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $password = $_POST['password'];

    $userController->addUser($full_name, $username, $email, $status, $password);
}
?>

<div class="content-wrapper">
     <div class="row">
          <div class="content-wrapper">
               <div class="container-xxl flex-grow-1 container-p-y">
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Data Users</h5>
                    <div class="card">
                         <div class="col-xl-6" style="margin-left: 20px;">
                              <div class="mt-3">
                                   <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                             data-bs-target="#exampleModal">
                                             <i class="tf-icons bx bx-plus" title="Fit to Work"></i> Tambah Data User
                                        </button>
                                   </div>
                              </div>
                         </div>
                         <br />

                         <div class="table-responsive text-nowrap" id="pagination">
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
                                   <?php
                                   $connection = new User();
                                   $hasil = $connection->getUserData();

                                   $no = 1;

                                   ?>
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
                                                            <button type="button" class="btn btn-icon btn-warning"
                                                                 style="height: 30px;">
                                                                 <span class="tf-icons bx bx-pencil"></span>
                                                            </button>
                                                            <a
                                                                 href="../controllers/delete_users.php?<?= $userData['id'] ?>">
                                                                 <button type="button" class="btn btn-icon btn-danger"
                                                                      style="height: 30px;">
                                                                      <span class="tf-icons bx bx-trash"></span>
                                                                 </button>
                                                            </a>
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="#" method="POST">
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
                                             <span class="input-group-text">@example.com</span>
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


<!-- JS Hapus Data -->
<script>
function confirmDelete(userId) {
     var result = confirm("Apakah Anda yakin ingin menghapus data user?");
     if (result) {
          window.location = "../controllers/delete_user.php?id=" + userId;
     }
}
</script>

<?php
include('../views/layout/footer.php');
?>