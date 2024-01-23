<!-- <?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: http://localhost/website-fit-work/views/dasbor.php");
    exit();
}

$loginError = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
unset($_SESSION['login_error']); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet" />
     <link rel="icon" type="image/png" href="assets/images/mayasari.png" />
     <link rel="stylesheet" href="assets/fonts/icomoon/style.css" />
     <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
     <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
     <link rel="stylesheet" href="assets/css/style.css" />
     <link rel="stylesheet" href="assets/css/preloader.css" />
     <title>Login | PT. Mayasari Bakti</title>
</head>

<body style="background-color: white;">
     <div class="preloader-container">
          <div class="preloader">
          </div>
     </div>
     <?php
          if (!empty($loginError)) {
               $teks = "Anda gagal login, cek kembali!";
               echo '<script>alert("' . $teks . '");</script>';
          }
     ?>
     <div class="content" style="padding: 30px;margin-top: 50px;">
          <div class="container">
               <div class="row">
                    <div class="col-md-6 order-md-2">
                         <img src="assets/images/undraw_remotely_-2-j6y.svg" alt="Image" class="img-fluid"
                              style="width: 480px;" />
                    </div>
                    <div class=" col-md-6 contents" style="margin-top: 50px;">
                         <div class="row justify-content-center">
                              <div class="col-md-8">
                                   <div class="mb-4">
                                        <h3> <strong>PT. Mayasari Bakti</strong></h3>
                                        <p class="mb-4">
                                             Login to Website Fit To Work dan Rampcheck
                                        </p>
                                   </div>
                                   <br />
                                   <form action="controllers/ProsesLogin.php" method="post">
                                        <div class="form-group first">
                                             <label for="username">Username</label>
                                             <input style="font-size: 15px;" type="text" class="form-control"
                                                  name="username" required />
                                        </div>
                                        <div class="form-group last mb-4" style="margin-top: 10px;">
                                             <label for="password">Password</label>
                                             <input style="font-size: 15px;" type="password" class="form-control"
                                                  name="password" id="password" required />
                                        </div>

                                        <div class="d-flex mb-5 align-items-center">
                                             <label class="control control--checkbox mb-0">
                                                  <span class="caption">Lihat Password</span>
                                                  <input type="checkbox" id="showPassword" />
                                                  <div class="control__indicator"></div>
                                             </label>
                                        </div>

                                        <input type="submit" value="Login" class="btn text-white btn-block"
                                             style="background-color: #31374C;" />
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <script src="assets/js/jquery-3.3.1.min.js"></script>
     <script src="assets/js/popper.min.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/main.js"></script>
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
</body>

</html> -->