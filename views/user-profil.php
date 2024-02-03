<?php
include('../views/layout/header.php');
require_once '../controllers/User.php';

$username = $_SESSION['username'];
$profil = new User();
$userData = $profil->getProfil($username);

if ($userData) {
    ?>

<div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
          <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Your Profile</h5>
          <div class="row">
               <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                         <div class="d-flex align-items-end row">
                              <div class="col-sm-7">
                                   <div class="card-body">
                                        <h5 class="card-title" style="color: #31374C;">Welcome to Preview Profil,
                                             Kak <?php echo $_SESSION['username']; ?> 🎉</h5>
                                        <p class="mb-4">
                                             Hi min, jika anda ingin mengubah profil anda, silahkan klik fitur <a
                                                  href="../views/update-profil.php">Update
                                                  Profil.</a> Jika anda ingin mengubah password anda dapat membuka
                                             fitur <a href="../views/update-password.php">Update
                                                  Password.</a> Terimakasih! ^_^
                                        </p>
                                   </div>
                              </div>
                              <div class="col-sm-5 text-center text-sm-left">
                                   <div class="card-body pb-0 px-0 px-md-4">
                                        <img src="../assets/dasbor/assets/img/illustrations/man-with-laptop-light.png"
                                             height="180" alt="View Badge User"
                                             data-app-dark-img="illustrations/man-with-laptop-light.png"
                                             data-app-light-img="illustrations/man-with-laptop-light.png" />
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="row">
               <div class="col-xxl">
                    <div class="card mb-4">
                         <div class="card-header d-flex align-items-center justify-content-between">
                              <small class="text-muted float-end">Your Profile</small>
                              <small class="text-muted float-end">Website Fit to Work & Rampcheck</small>
                         </div>
                         <div class="card-body">
                              <form>
                                   <div class="row">
                                        <div class="col-md-3">
                                             <div class="row mb-3" style="width: 200px;">
                                                  <?php if (!empty($userData['gambar'])): ?>
                                                  <img src="../uploads/profil/<?= $userData['gambar'] ?>"
                                                       alt="Foto Profil" width="50px">
                                                  <?php else: ?>
                                                  <center>
                                                       <div class="card"
                                                            style="border-radius: 5px;border-color: black;height: 220px;">
                                                            <p style="margin-top: 100px;">Tidak Ada Foto</p>
                                                       </div>
                                                  </center>
                                                  <?php endif; ?>
                                             </div>
                                        </div>
                                        <div class="col-md-9">
                                             <div class="row mb-3">
                                                  <label class="col-sm-2 col-form-label"
                                                       for="basic-icon-default-fullname">Nama
                                                       Lengkap</label>
                                                  <div class="col-sm-10">
                                                       <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2"
                                                                 class="input-group-text"><i
                                                                      class="bx bx-user"></i></span>
                                                            <input type="text" class="form-control"
                                                                 value="<?= $userData['full_name'] ?>" readonly />
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
                                                            <input type="text" class="form-control"
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
                                                            <input type="text" class="form-control"
                                                                 value="<?= $userData['email'] ?>" readonly />
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row mb-3">
                                                  <label class="col-sm-2 col-form-label"
                                                       for="basic-icon-default-email">Timestamp</label>
                                                  <div class="col-sm-10">
                                                       <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i
                                                                      class="bx bx-calendar"></i></span>
                                                            <input type="text" class="form-control"
                                                                 value="<?= $userData['timestamp'] ?>" readonly />
                                                       </div>
                                                  </div>
                                             </div>
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
               <?php
               require_once '../database/Database.php';
               require_once '../controllers/User.php';

               error_reporting(E_ALL);
               ini_set('display_errors', 1);

               $user = new User();

               if (isset($_POST['updateUser'])) {
               $full_name = $_POST['full_name'];
               $username = $_POST['username'];
               $email = $_POST['email'];

               // echo "Received Data:<br>";
               // echo "Full Name: $full_name<br>";
               // echo "Username: $username<br>";
               // echo "Email: $email<br>";

               $updateResult = $user->updateUser($full_name, $username, $email);

               if ($updateResult === true) {
                    header("Location: ../views/data-users.php?updateSuccess=true");
                    exit();
               } else {
                    echo "Error updating user: $updateResult";
               }
               }
               ?>

               <form action="" method="POST">
                    <div class="modal-body">
                         <div class="card-body">

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-company">Username</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-company2" class="input-group-text"><i
                                                       class="bx bx-buildings"></i></span>
                                             <input type="text" class="form-control" name="username"
                                                  value="<?= $userData['username'] ?>" />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama
                                        Lengkap</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                       class="bx bx-user"></i></span>
                                             <input type="text" class="form-control" name="full_name"
                                                  value="<?= $userData['full_name'] ?>" />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                             <input type="text" class="form-control" name="email"
                                                  value="<?= $userData['email'] ?>" />
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary" name="updateUser">Save</button>
                    </div>
               </form>
          </div>
     </div>
</div>

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
} else {
    echo "User not found";
}

include('../views/layout/footer.php');
?>