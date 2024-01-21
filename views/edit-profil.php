<?php
include('../views/layout/header.php');
?>

<?php 
     if (isset($_SESSION['success_message'])) {
     echo '<script>alert("' . $_SESSION['success_message'] . '");</script>';
     unset($_SESSION['success_message']);
     }
?>

<div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
          <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Edit Profile</h5>
          <div class="row">
               <div class="col-xxl">
                    <div class="card mb-4">
                         <div class="card-header d-flex align-items-center justify-content-between">
                              <small class="text-muted float-end">Your Profile</small>
                              <small class="text-muted float-end">Website Fit to Work & RampcheckFit to Work &
                                   Rampcheck</small>
                         </div>
                         <div class="card-body">
                              <?php
                                   require_once '../controllers/User.php';

                                   $username = $_SESSION['username'];
                                   $profil = new User();
                                   $userData = $profil->getProfil($username);
                                   
                                   if ($userData) {
                              ?>
                              <form action="../controllers/EditProfil.php?id=<?= $userData['id']; ?>" method="POST">
                                   <input type="hidden" name="id" value="<?= $userData['id']; ?>">

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-company">Username</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span id="basic-icon-default-company2" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                  <input type="text" class="form-control" name="username"
                                                       value="<?= $userData['username'] ?>" readonly />
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
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-email">Email</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                                  <!-- Tambahkan atribut name untuk email -->
                                                  <input type="text" class="form-control" name="email"
                                                       value="<?= $userData['email'] ?>" />
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                             <button type="submit" class="btn btn-primary"
                                                  style="color: white;height: 40px;border-radius: 50px;">Update
                                                  Profile</button>
                                        </div>
                                   </div>
                              </form>
                              <?php
                              } else {
                              echo "User not found";
                              }
                              ?>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php
include('../views/layout/footer.php');
?>