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
               <div class="col-xxl">
                    <div class="card mb-4">
                         <div class="card-header d-flex align-items-center justify-content-between">
                              <small class="text-muted float-end">Your Profile</small>
                              <small class="text-muted float-end">Website Fit to Work & Rampcheck</small>
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
                                                  <span id="basic-icon-default-company2" class="input-group-text"><i
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
                                                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                  <input type="text" class="form-control"
                                                       value="<?= $userData['email'] ?>" readonly />
                                             </div>
                                        </div>
                                   </div>
                                   <!-- <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-email">Password</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-key"></i></span>
                                                  <input type="password" class="form-control"
                                                       value="<?= $userData['password'] ?>" readonly />


                                             </div>
                                        </div>
                                   </div> -->
                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-email">Timestamp</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                  <input type="text" class="form-control"
                                                       value="<?= $userData['timestamp'] ?>" readonly />
                                             </div>
                                        </div>
                                   </div>
                                   <!-- <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                             <button type="button" class="btn" data-bs-toggle="modal"
                                                  data-bs-target="#editProfil"
                                                  style="background-color: #31374C;color: white;height: 40px;border-radius: 50px;">Edit
                                                  Profile</button>
                                        </div>
                                   </div> -->
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