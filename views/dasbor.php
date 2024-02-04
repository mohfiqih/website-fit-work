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
                                        <h5 class="card-title" style="color: #31374C;">Welcome to Dashboard,
                                             Kak <?php echo $_SESSION['username']; ?> 🎉</h5>
                                        <p class="mb-4">
                                             Hi min, selamat datang di Dashboard Admin, Website Fit to Work dan
                                             Rampcheck dari PT. Mayasari Bakti. ^_^
                                        </p>

                                        <!-- <a href="#" class="btn btn-sm"
                                             style="background-color: #31374C;color: white;height: 40px;width: 100px;border-radius: 50px;">View
                                             Badges</a> -->
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
               <?php 
                    include '../database/Database.php';

                    $conn = new Database();

                    // Users
                    $sql = "SELECT COUNT(*) as total FROM users";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalUsers = $row["total"];
                    
                    } else {
                    echo "<p>Tidak ada data!</p>";
                    }
               ?>

               <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                         <div class="d-flex align-items-end row">
                              <div class="col-sm-12">
                                   <div class="card-body">
                                        <center>
                                             <h5 class="card-title" style="color: #31374C;">Jumlah User</h5><br />
                                             <h5 class="card-title" style="color: #31374C;"><?php echo $totalUsers; ?>
                                             </h5>
                                             <p>
                                                  Data Users
                                             </p>
                                        </center>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>


               <?php 
                    $conn = new Database();

                    // Fitwork
                    $datafitwork = "SELECT COUNT(*) as total_fitwork FROM fit_work";
                    $result_fitwork = $conn->query($datafitwork);
                    if ($result_fitwork->num_rows > 0) {
                    $row_fit = $result_fitwork->fetch_assoc();
     
                    $totalFitwork = $row_fit["total_fitwork"];
                    } else {
                         echo "<p>Tidak ada data!</p>";
                    }
               ?>
               <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                         <div class="d-flex align-items-end row">
                              <div class="col-sm-12">
                                   <div class="card-body">
                                        <center>
                                             <h5 class="card-title" style="color: #31374C;">Jumlah Fitwork</h5><br />

                                             <h5 class="card-title" style="color: #31374C;"><?php echo $totalFitwork; ?>
                                             </h5>
                                             <p>
                                                  Data Fitwork
                                             </p>
                                        </center>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

               <div class="col-lg-4 mb-4 order-0">
                    <div class="card">
                         <div class="d-flex align-items-end row">
                              <div class="col-sm-12">
                                   <div class="card-body">
                                        <center>
                                             <h5 class="card-title" style="color: #31374C;">Jumlah Rampcheck</h5><br />

                                             <h5 class="card-title" style="color: #31374C;"><?php echo $totalFitwork; ?>
                                             </h5>
                                             <p>
                                                  Data Rampcheck
                                             </p>
                                        </center>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <!-- <div class="row">
               <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                    <div class="card h-100">
                         <div class="card-header d-flex align-items-center justify-content-between pb-0">
                              <div class="card-title mb-0">
                                   <h5 class="m-0 me-2">Order Statistics</h5>
                                   <small class="text-muted">42.82k Total Sales</small>
                              </div>
                              <div class="dropdown">
                                   <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                   </button>
                                   <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                   </div>
                              </div>
                         </div>
                         <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                   <div class="d-flex flex-column align-items-center gap-1">
                                        <h2 class="mb-2">8,258</h2>
                                        <span>Total Orders</span>
                                   </div>
                                   <div id="orderStatisticsChart"></div>
                              </div>
                              <ul class="p-0 m-0">
                                   <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                             <span class="avatar-initial rounded bg-label-primary"><i
                                                       class="bx bx-mobile-alt"></i></span>
                                        </div>
                                        <div
                                             class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="me-2">
                                                  <h6 class="mb-0">Electronic</h6>
                                                  <small class="text-muted">Mobile, Earbuds, TV</small>
                                             </div>
                                             <div class="user-progress">
                                                  <small class="fw-medium">82.5k</small>
                                             </div>
                                        </div>
                                   </li>
                                   <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                             <span class="avatar-initial rounded bg-label-success"><i
                                                       class="bx bx-closet"></i></span>
                                        </div>
                                        <div
                                             class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="me-2">
                                                  <h6 class="mb-0">Fashion</h6>
                                                  <small class="text-muted">T-shirt, Jeans, Shoes</small>
                                             </div>
                                             <div class="user-progress">
                                                  <small class="fw-medium">23.8k</small>
                                             </div>
                                        </div>
                                   </li>
                                   <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                             <span class="avatar-initial rounded bg-label-info"><i
                                                       class="bx bx-home-alt"></i></span>
                                        </div>
                                        <div
                                             class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="me-2">
                                                  <h6 class="mb-0">Decor</h6>
                                                  <small class="text-muted">Fine Art, Dining</small>
                                             </div>
                                             <div class="user-progress">
                                                  <small class="fw-medium">849k</small>
                                             </div>
                                        </div>
                                   </li>
                                   <li class="d-flex">
                                        <div class="avatar flex-shrink-0 me-3">
                                             <span class="avatar-initial rounded bg-label-secondary"><i
                                                       class="bx bx-football"></i></span>
                                        </div>
                                        <div
                                             class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="me-2">
                                                  <h6 class="mb-0">Sports</h6>
                                                  <small class="text-muted">Football, Cricket Kit</small>
                                             </div>
                                             <div class="user-progress">
                                                  <small class="fw-medium">99</small>
                                             </div>
                                        </div>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
               <div class="col-md-6 col-lg-4 order-1 mb-4">
                    <div class="card h-100">
                         <div class="card-header">
                              <ul class="nav nav-pills" role="tablist">
                                   <li class="nav-item">
                                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                             data-bs-target="#navs-tabs-line-card-income"
                                             aria-controls="navs-tabs-line-card-income" aria-selected="true">
                                             Income
                                        </button>
                                   </li>
                                   <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab">Expenses</button>
                                   </li>
                                   <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab">Profit</button>
                                   </li>
                              </ul>
                         </div>
                         <div class="card-body px-0">
                              <div class="tab-content p-0">
                                   <div class="tab-pane fade show active" id="navs-tabs-line-card-income"
                                        role="tabpanel">
                                        <div class="d-flex p-4 pt-3">
                                             <div class="avatar flex-shrink-0 me-3">
                                                  <img src="../assets/img/icons/unicons/wallet.png" alt="User" />
                                             </div>
                                             <div>
                                                  <small class="text-muted d-block">Total Balance</small>
                                                  <div class="d-flex align-items-center">
                                                       <h6 class="mb-0 me-1">$459.10</h6>
                                                       <small class="text-success fw-medium">
                                                            <i class="bx bx-chevron-up"></i>
                                                            42.9%
                                                       </small>
                                                  </div>
                                             </div>
                                        </div>
                                        <div id="incomeChart"></div>
                                        <div class="d-flex justify-content-center pt-4 gap-2">
                                             <div class="flex-shrink-0">
                                                  <div id="expensesOfWeek"></div>
                                             </div>
                                             <div>
                                                  <p class="mb-n1 mt-1">Expenses This Week</p>
                                                  <small class="text-muted">$39 less than last week</small>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-md-6 col-lg-4 order-2 mb-4">
                    <div class="card h-100">
                         <div class="card-header d-flex align-items-center justify-content-between">
                              <h5 class="card-title m-0 me-2">Transactions</h5>
                              <div class="dropdown">
                                   <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                   </button>
                                   <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                   </div>
                              </div>
                         </div>
                         <div class="card-body">
                              <ul class="p-0 m-0">
                                   <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                             <img src="../assets/img/icons/unicons/paypal.png" alt="User"
                                                  class="rounded" />
                                        </div>
                                        <div
                                             class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="me-2">
                                                  <small class="text-muted d-block mb-1">Paypal</small>
                                                  <h6 class="mb-0">Send money</h6>
                                             </div>
                                             <div class="user-progress d-flex align-items-center gap-1">
                                                  <h6 class="mb-0">+82.6</h6>
                                                  <span class="text-muted">USD</span>
                                             </div>
                                        </div>
                                   </li>
                                   <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                             <img src="../assets/img/icons/unicons/wallet.png" alt="User"
                                                  class="rounded" />
                                        </div>
                                        <div
                                             class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="me-2">
                                                  <small class="text-muted d-block mb-1">Wallet</small>
                                                  <h6 class="mb-0">Mac'D</h6>
                                             </div>
                                             <div class="user-progress d-flex align-items-center gap-1">
                                                  <h6 class="mb-0">+270.69</h6>
                                                  <span class="text-muted">USD</span>
                                             </div>
                                        </div>
                                   </li>
                                   <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                             <img src="../assets/img/icons/unicons/chart.png" alt="User"
                                                  class="rounded" />
                                        </div>
                                        <div
                                             class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="me-2">
                                                  <small class="text-muted d-block mb-1">Transfer</small>
                                                  <h6 class="mb-0">Refund</h6>
                                             </div>
                                             <div class="user-progress d-flex align-items-center gap-1">
                                                  <h6 class="mb-0">+637.91</h6>
                                                  <span class="text-muted">USD</span>
                                             </div>
                                        </div>
                                   </li>
                                   <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                             <img src="../assets/img/icons/unicons/cc-success.png" alt="User"
                                                  class="rounded" />
                                        </div>
                                        <div
                                             class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="me-2">
                                                  <small class="text-muted d-block mb-1">Credit Card</small>
                                                  <h6 class="mb-0">Ordered Food</h6>
                                             </div>
                                             <div class="user-progress d-flex align-items-center gap-1">
                                                  <h6 class="mb-0">-838.71</h6>
                                                  <span class="text-muted">USD</span>
                                             </div>
                                        </div>
                                   </li>
                                   <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                             <img src="../assets/img/icons/unicons/wallet.png" alt="User"
                                                  class="rounded" />
                                        </div>
                                        <div
                                             class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="me-2">
                                                  <small class="text-muted d-block mb-1">Wallet</small>
                                                  <h6 class="mb-0">Starbucks</h6>
                                             </div>
                                             <div class="user-progress d-flex align-items-center gap-1">
                                                  <h6 class="mb-0">+203.33</h6>
                                                  <span class="text-muted">USD</span>
                                             </div>
                                        </div>
                                   </li>
                                   <li class="d-flex">
                                        <div class="avatar flex-shrink-0 me-3">
                                             <img src="../assets/img/icons/unicons/cc-warning.png" alt="User"
                                                  class="rounded" />
                                        </div>
                                        <div
                                             class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                             <div class="me-2">
                                                  <small class="text-muted d-block mb-1">Mastercard</small>
                                                  <h6 class="mb-0">Ordered Food</h6>
                                             </div>
                                             <div class="user-progress d-flex align-items-center gap-1">
                                                  <h6 class="mb-0">-92.45</h6>
                                                  <span class="text-muted">USD</span>
                                             </div>
                                        </div>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div> -->
     </div>
</div>
<?php
include('../views/layout/footer.php');
?>