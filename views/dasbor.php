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

<!-- Header -->
<?php
include('../views/layout/header.php');
?>

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
     id="layout-navbar">
     <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
          <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
               <i class="bx bx-menu bx-sm"></i>
          </a>
     </div>

     <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
          <div class="navbar-nav align-items-center">
               <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..."
                         aria-label="Search..." />
               </div>
          </div>
          <ul class="navbar-nav flex-row align-items-center ms-auto">
               <span class="fw-medium d-block"><?php echo $_SESSION['username']; ?></span>
               <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
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
                                                  <img src="../assets/dasbor/assets/img/avatars/1.png" alt
                                                       class="w-px-40 h-auto rounded-circle" />
                                             </div>
                                        </div>
                                        <div class="flex-grow-1">
                                             <span class="fw-medium d-block"><?php echo $_SESSION['username']; ?></span>
                                             <small class="text-muted">Admin</small>
                                        </div>
                                   </div>
                              </a>
                         </li>
                         <li>
                              <div class="dropdown-divider"></div>
                         </li>
                         <li>
                              <a class="dropdown-item" href="#">
                                   <i class="bx bx-user me-2"></i>
                                   <span class="align-middle">My Profile</span>
                              </a>
                         </li>
                         <li>
                              <div class="dropdown-divider"></div>
                         </li>
                         <li>
                              <form action="" method="post" class="dropdown-item">
                                   <i class="bx bx-power-off me-2"></i>
                                   <button class="btn btn-sm btn-primary" name="logout">Logout</button>
                              </form>
                         </li>
                    </ul>
               </li>
          </ul>
     </div>
</nav>

<div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
               <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                         <div class="d-flex align-items-end row">
                              <div class="col-sm-7">
                                   <div class="card-body">
                                        <h5 class="card-title text-primary">Welcome,
                                             <?php echo $_SESSION['username']; ?> 🎉</h5>
                                        <p class="mb-4">
                                             You have done <span class="fw-medium">72%</span> more sales today. Check
                                             your new badge in
                                             your profile.
                                        </p>

                                        <a href="#" class="btn btn-sm btn-primary">View Badges</a>
                                   </div>
                              </div>
                              <div class="col-sm-5 text-center text-sm-left">
                                   <div class="card-body pb-0 px-0 px-md-4">
                                        <img src="../assets/dasbor/assets/img/illustrations/man-with-laptop-light.png"
                                             height="140" alt="View Badge User"
                                             data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                             data-app-light-img="illustrations/man-with-laptop-light.png" />
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

          </div>
     </div>
     <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
               <div class="mb-2 mb-md-0">
                    ©
                    <script>
                    document.write(new Date().getFullYear());
                    </script>
                    PT. Mayasari Bakti - Website Fit To Work dan Rampcheck
               </div>
          </div>
     </footer>
</div>

<!-- Footer -->
<?php
include('../views/layout/footer.php');
?>