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

     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable@11.4.0/dist/handsontable.full.min.css">
     <script src="https://cdn.jsdelivr.net/npm/handsontable@11.4.0/dist/handsontable.full.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/handsontable@11.4.0/dist/languages/all.min.js"></script> -->


</head>
<style>
/* Add margin to the right of the DataTable */
#example_wrapper {
     margin-right: 20px;
     margin-left: 20px;
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
                                   <span class="fw-medium d-block" style="margin-right: 5px;"> <i
                                             class="menu-icon tf-icons bx bx-bell"></i></span>
                                   <span class="fw-medium d-block" style="margin-right: 10px;"><i
                                             class="bx bx-search fs-4 lh-0"></i></span>

                                   <span class="fw-medium d-block">
                                        <button class="btn btn-sm "
                                             style="border-radius: 50px;height: 35px;background-color: #31374C;color: white;margin-right: 5px;"><?php echo $_SESSION['username']; ?></button></span>

                                   <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                             data-bs-toggle="dropdown">
                                             <div class="avatar avatar-online">
                                                  <img src="../assets/dasbor/assets/img/avatars/1.png" alt
                                                       class="w-px-40 h-auto rounded-circle" />
                                             </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                             <li>
                                                  <a class="dropdown-item" href="#">
                                                       <div class="d-flex">
                                                            <div class="flex-shrink-0 me-3">
                                                                 <div class="avatar avatar-online">
                                                                      <img src="../assets/dasbor/assets/img/avatars/1.png"
                                                                           alt class="w-px-40 h-auto rounded-circle" />
                                                                 </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                 <span
                                                                      class="fw-medium d-block"><?php echo $_SESSION['username']; ?></span>
                                                                 <small class="text-muted">Admin</small>
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