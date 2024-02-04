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
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App / Data Users /</span> Update User</h5>
                    <div class="card">
                         <?php
                              include '../database/Database.php';

                              $connection = new Database();

                              if (isset($_GET['id'])) {
                              $id = $_GET['id'];
                              $result = $connection->query("SELECT * FROM users WHERE id=$id");

                              if ($result) {
                                   if ($result->num_rows > 0) {
                                        $userData = $result->fetch_assoc(); ?>

                         <form action="../controllers/UpdateUser.php?id=<?= $userData['id']; ?>" method="POST">
                              <div class="modal-body">
                                   <div class="card-body">

                                        <div class="row mb-3">
                                             <label class="col-sm-2 col-form-label"
                                                  for="basic-icon-default-fullname">Nama
                                                  Lengkap</label>
                                             <div class="col-sm-10">
                                                  <div class="input-group input-group-merge">
                                                       <span id="basic-icon-default-fullname2"
                                                            class="input-group-text"><i class="bx bx-user"></i></span>
                                                       <input type="text" class="form-control" name="full_name"
                                                            value="<?= $userData['full_name'] ?>" />
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row mb-3">
                                             <label class="col-sm-2 col-form-label"
                                                  for="basic-icon-default-company">Username</label>
                                             <div class="col-sm-10">
                                                  <div class="input-group input-group-merge">
                                                       <span id="basic-icon-default-company2"
                                                            class="input-group-text"><i
                                                                 class="bx bx-buildings"></i></span>
                                                       <input type="text" class="form-control" name="username"
                                                            value="<?= $userData['username'] ?>" readonly />
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row mb-3">
                                             <label class="col-sm-2 col-form-label"
                                                  for="basic-icon-default-email">Email</label>
                                             <div class="col-sm-10">
                                                  <div class="input-group input-group-merge">
                                                       <span class="input-group-text"><i
                                                                 class="bx bx-envelope"></i></span>
                                                       <input type="text" class="form-control" name="email"
                                                            value="<?= $userData['email'] ?>" />
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row mb-3">
                                             <label class="col-sm-2 col-form-label"
                                                  for="basic-icon-default-email">Status</label>
                                             <div class="col-sm-10">
                                                  <div class="input-group input-group-merge">
                                                       <span class="input-group-text"><i class="bx bx-check"></i></span>
                                                       <!-- Replace the text input with a select element -->
                                                       <select class="form-select" name="status">
                                                            <option value="Active"
                                                                 <?php if ($userData['status'] == 'Active') echo 'selected'; ?>>
                                                                 Active</option>
                                                            <option value="Nonaktif"
                                                                 <?php if ($userData['status'] == 'Nonaktif') echo 'selected'; ?>>
                                                                 Nonaktif</option>
                                                       </select>
                                                  </div>
                                             </div>
                                        </div>

                                   </div>
                              </div>

                              <div class="modal-footer">
                                   <a href="../views/user-data.php">
                                        <button type="button" class="btn btn-secondary"
                                             data-bs-dismiss="modal">Back</button>
                                   </a>
                                   <button style="margin-left: 10px;" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update
                                        Password</button>
                                   <button style="margin-left: 10px;" type="submit"
                                        class="btn btn-primary">Simpan</button>
                              </div>


                         </form>
                         <?php
                                   } else {
                                        echo "Data tidak ditemukan.";
                                   }
                                   } else {
                                        echo die("Error: " . $connection->getError());
                                   }
                                   } else {
                                   echo "ID tidak diterima.";
                                   }
                              ?>
                    </div>
               </div>
          </div>
     </div>
</div>



<?php
     $connection = new Database();

     if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $result = $connection->query("SELECT * FROM users WHERE id=$id");

     if ($result) {
          if ($result->num_rows > 0) {
               $userData = $result->fetch_assoc(); ?>

<!-- Update Password -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="../controllers/UpdatePasswordUser.php?id=<?= $userData['id']; ?>" method="POST">
                         <div class="card-body">

                              <input type="hidden" name="id" value="<?= $userData['id']; ?>">

                              <input type="text" class="form-control" name="full_name"
                                   value="<?= $userData['full_name'] ?>" hidden />

                              <input type="text" class="form-control" name="username"
                                   value="<?= $userData['username'] ?>" hidden />

                              <input type="text" class="form-control" name="email" value="<?= $userData['email'] ?>"
                                   hidden />

                              <div class="row mb-3">
                                   <label class="col-sm-3 col-form-label" for="basic-icon-default-company">Password
                                        Lama</label>
                                   <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-company2" class="input-group-text"><i
                                                       class="bx bx-buildings"></i></span>
                                             <input type="text" class="form-control"
                                                  value="<?= $userData['password'] ?>" readonly />
                                        </div>
                                   </div>
                              </div>
                              <div class="row mb-3">
                                   <label class="col-sm-3 col-form-label" for="basic-icon-default-company">Password
                                        Baru</label>
                                   <div class="col-sm-9">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-company2" class="input-group-text"><i
                                                       class="bx bx-key"></i></span>
                                             <input type="password" class="form-control" name="password"
                                                  placeholder="Masukan Password Baru" id="password" required />
                                             <span id="basic-icon-default-company2" class="input-group-text"><small
                                                       class="text-muted float-end">Lihat
                                                       Password</small>
                                                  <input style="margin-left: 10px;" type="checkbox" id="showPassword" />
                                             </span>
                                        </div>
                                   </div>
                              </div>

                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                              <button type="submit" class="btn btn-primary">Update</button>
                         </div>

                    </form>

               </div>
          </div>
     </div>
</div>
<?php
     } else {
          echo "Data tidak ditemukan.";
     }
     } else {
          echo die("Error: " . $connection->getError());
     }
     } else {
     echo "ID tidak diterima.";
     }
?>


<script>
document.getElementById("showPassword").addEventListener("change", function() {
     var passwordInput = document.getElementById("password");
     if (this.checked) {
          passwordInput.type = "text";
     } else {
          passwordInput.type = "password";
     }
});
</script>


<?php
include('../views/layout/footer.php');
?>