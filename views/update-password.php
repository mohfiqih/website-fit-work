<?php
include('../views/layout/header.php');
?>

<?php 
     if (isset($_SESSION['success_password'])) {
     echo '<script>alert("' . $_SESSION['success_password'] . '");</script>';
     unset($_SESSION['success_password']);
     }
?>

<div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
          <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Edit Password</h5>
          <div class="row">
               <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                         <div class="d-flex align-items-end row">
                              <div class="col-sm-7">
                                   <div class="card-body">
                                        <h5 class="card-title" style="color: #31374C;">Welcome to Update Password,
                                             Kak <?php echo $_SESSION['username']; ?> 🎉</h5>
                                        <p class="mb-4">
                                             Hi min, silahkan jika ingin mengubah password anda, password anda dalam
                                             peview secret. Jika anda lupa langsung saja ganti dikolom password baru
                                             dibawah form ini ya.
                                             Terimakasih! ^_^
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
                              <small class="text-muted float-end">Edit Password</small>
                              <small class="text-muted float-end">Website Fit to Work & Rampcheck</small>
                         </div>
                         <div class="card-body">
                              <?php
                                   require_once '../controllers/User.php';

                                   $username = $_SESSION['username'];
                                   $profil = new User();
                                   $userData = $profil->getProfil($username);
                                   
                                   if ($userData) {
                              ?>
                              <form action="../controllers/UpdatePassword.php?id=<?= $userData['id']; ?>" method="POST">
                                   <input type="hidden" name="id" value="<?= $userData['id']; ?>">

                                   <input type="text" class="form-control" name="full_name"
                                        value="<?= $userData['full_name'] ?>" hidden />

                                   <input type="text" class="form-control" name="username"
                                        value="<?= $userData['username'] ?>" hidden />

                                   <input type="text" class="form-control" name="email"
                                        value="<?= $userData['email'] ?>" hidden />

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Password
                                             Lama</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span id="basic-icon-default-company2" class="input-group-text"><i
                                                            class="bx bx-buildings"></i></span>
                                                  <input type="text" class="form-control"
                                                       value="<?= $userData['password'] ?>" readonly />
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Password
                                             Baru</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span id="basic-icon-default-company2" class="input-group-text"><i
                                                            class="bx bx-key"></i></span>
                                                  <input type="password" class="form-control" name="password"
                                                       placeholder="Masukan Password Baru" id="password" required />
                                                  <span id="basic-icon-default-company2" class="input-group-text"><small
                                                            class="text-muted float-end">Lihat
                                                            Password</small>
                                                       <input style="margin-left: 10px;" type="checkbox"
                                                            id="showPassword" />
                                                  </span>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                             <button type="submit" class="btn btn-primary"
                                                  style="color: white;height: 40px;border-radius: 50px;">Update
                                                  Password</button>
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