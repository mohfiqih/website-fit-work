<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: http://localhost/website-fit-work/index.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: http://localhost/website-fit-work/index.php");
    exit();
}
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
     data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
     <meta charset="utf-8" />
     <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

     <title>Dashboard - PT. Mayasari Bakti</title>

     <meta name="description" content="" />
     <link rel="icon" type="image/png" href="../assets/images/mayasari.png" />
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
          rel="stylesheet" />
     <link rel="stylesheet" href="../assets/dasbor/assets/vendor/fonts/boxicons.css" />

     <!-- Core CSS -->
     <link rel="stylesheet" href="../assets/dasbor/assets/vendor/css/core.css" class="template-customizer-core-css" />
     <link rel="stylesheet" href="../assets/dasbor/assets/vendor/css/theme-default.css"
          class="template-customizer-theme-css" />
     <link rel="stylesheet" href="../assets/dasbor/assets/css/demo.css" />

     <!-- Vendors CSS -->
     <link rel="stylesheet" href="../assets/dasbor/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
     <link rel="stylesheet" href="../assets/dasbor/assets/vendor/libs/apex-charts/apex-charts.css" />

     <script src="../assets/dasbor/assets/vendor/js/helpers.js"></script>
     <script src="../assets/dasbor/assets/js/config.js"></script>
     <link rel="stylesheet" href="../assets/css/preloader.css" />

     <!--  -->
     <!-- Data Table CSS JQuery -->
     <link rel="stylesheet"
          href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.semanticui.min.css" />

     <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
     <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.7/js/dataTables.semanticui.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
</head>

<style>
#example_wrapper {
     margin-right: 20px;
     margin-left: 20px;
}

.dataTables_wrapper {
     padding: 10px;
}

.dataTables_paginate {
     float: left;
     /* Mengubah float menjadi left */
     margin-top: 10px;
}

.paginate_button {
     /* display: inline-block; */
     padding: 5px 10px;
     margin: 0 5px;
     border: 1px solid #ddd;
     background-color: #ffffff;
     cursor: pointer;
     border-radius: 10px;
     margin-bottom: 20px;
}

.paginate_button.current {
     background-color: #4CAF50;
     color: white;
     border: 1px solid #4CAF50;
}

.dataTables_length {
     margin-top: 10px;
}

.dataTables_filter input {
     padding: 5px;
     width: 150px;
}

.dataTables_info {
     margin-top: 10px;
}

.dataTables_length {
     display: none;
}

.dataTables_info {
     display: none;
}
</style>


<body>
     <div class="preloader-container">
          <div class="preloader">
          </div>
     </div>
     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
          <div class="layout-container">
               <?php include '../views/layout/sidebar.php'; ?>
               <div class="layout-page">
                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                         id="layout-navbar">
                         <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                   <i class="bx bx-menu bx-sm"></i>
                              </a>

                         </div>
                         <a href="#" onclick="refreshPage()">
                              <span class="fw-medium d-block" style="margin-right: 5px;">
                                   <i class="menu-icon tf-icons bx bx-refresh" style="color: #31374C;"></i></span>
                         </a>

                         <script>
                         function refreshPage() {
                              location.reload();
                         }
                         </script>


                         <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                              <ul class="navbar-nav flex-row align-items-center ms-auto">

                                   <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="fw-medium d-block">
                                             <button class="btn btn-sm avatar avatar-online"
                                                  style="border-radius: 50px;height: 35px;width: 120px;background-color: #31374C;color: white;">
                                                  <?php echo $_SESSION['username']; ?> <i class="tf-icons bx bx-user"
                                                       title="Username" style="margin-left: 10px;"></i>
                                             </button></span>
                                   </a>
                                   <li class="nav-item navbar-dropdown dropdown-user dropdown">

                                        <ul class="dropdown-menu dropdown-menu-end" style="margin-top: 30px;">
                                             <li>
                                                  <a class="dropdown-item" href="#">
                                                       <div class="d-flex">
                                                            <div class="flex-shrink-0 me-3">
                                                                 <div class="avatar avatar-online">
                                                                      <div class="row mb-3">
                                                                           <button class="btn btn-sm"
                                                                                style="border-radius: 50px;height: 40px;width: 40px;margin-left: 10px;background-color: #31374C;color: white;">
                                                                                <i class="tf-icons bx bx-user"></i>
                                                                           </button>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                            <div class="flex-grow-1">

                                                                 <span
                                                                      class="fw-medium d-block"><?php echo $_SESSION['username']; ?></span>
                                                                 <small class="text-muted">Admin | Active</small>
                                                            </div>
                                                       </div>
                                                  </a>
                                             </li>
                                             <li>
                                                  <div class="dropdown-divider"></div>
                                             </li>
                                             <li>
                                                  <a class="dropdown-item" href="../views/user-profil.php">
                                                       <i class="bx bx-user me-2"></i>
                                                       <span class="align-middle">My Profile</span>
                                                  </a>
                                             </li>
                                             <li>
                                                  <a class="dropdown-item" href="../views/update-profil.php">
                                                       <i class="bx bx-book me-2"></i>
                                                       <span class="align-middle">Update Profil</span>
                                                  </a>
                                             </li>
                                             <li>
                                                  <a class="dropdown-item" href="../views/update-password.php">
                                                       <i class="bx bx-key me-2"></i>
                                                       <span class="align-middle">Update Password</span>
                                                  </a>
                                             </li>
                                             <li>
                                                  <div class="dropdown-divider"></div>
                                             </li>
                                             <li>
                                                  <form action="" method="post" class="dropdown-item">
                                                       <i class="bx bx-power-off me-2"></i>
                                                       <button class="btn btn-sm" name="logout"
                                                            style="border-radius: 50px;height: 35px;background-color: #31374C;color: white;margin-right: 5px;"
                                                            onclick="if (confirm('Yakin ingin logout?')) window.location.href='../index.php';">Logout</button>
                                                  </form>
                                             </li>
                                        </ul>
                                   </li>

                              </ul>
                         </div>
                    </nav>