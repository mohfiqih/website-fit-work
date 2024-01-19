<!-- Header -->
<?php
include('../views/layout/header.php');
?>


<div class="content-wrapper">
     <div class="container-xxl flex-grow-1 container-p-y">
          <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Dashboard</h5>
          <div class="row">

               <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                         <div class="d-flex align-items-end row">
                              <div class="col-sm-7">
                                   <div class="card-body">
                                        <h5 class="card-title" style="color: #31374C;">Welcome,
                                             <?php echo $_SESSION['username']; ?> 🎉</h5>
                                        <p class="mb-4">
                                             You have done <span class="fw-medium">72%</span> more sales today. Check
                                             your new badge in
                                             your profile.
                                        </p>

                                        <a href="#" class="btn btn-sm"
                                             style="background-color: #31374C;color: white;height: 40px;width: 100px;border-radius: 50px;">View
                                             Badges</a>
                                   </div>
                              </div>
                              <div class="col-sm-5 text-center text-sm-left">
                                   <div class="card-body pb-0 px-0 px-md-4">
                                        <img src="../assets/dasbor/assets/img/illustrations/girl-doing-yoga-light.png"
                                             height="180" alt="View Badge User"
                                             data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                             data-app-light-img="illustrations/girl-doing-yoga-light.png" />
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

          </div>
     </div>
     <!-- Footer -->
     <?php
include('../views/layout/footer.php');
?>