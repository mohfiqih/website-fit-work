<?php
include('../views/layout/header.php');

if (isset($_SESSION['success_add_user'])) {
     echo '<script>alert("' . $_SESSION['success_add_user'] . '");</script>';
     unset($_SESSION['success_add_user']);
}

?>

<div class="content-wrapper">
     <div class="row">
          <div class="content-wrapper">
               <div class="container-xxl flex-grow-1 container-p-y">
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Rampcheck</h5>
                    <div class="row">
                         <div class="col-lg-12 mb-4 order-0">
                              <div class="card">
                                   <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                             <div class="card-body">
                                                  <h5 class="card-title" style="color: #31374C;">Welcome to Rampcheck,
                                                       Kak <?php echo $_SESSION['username']; ?> 🎉</h5>
                                                  <p class="mb-4">
                                                       Hi min, ini form Rampcheck
                                                       ya min!
                                                       Terimakasih! ^_^
                                                  </p>
                                             </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                             <div class="card-body pb-0 px-0 px-md-4">
                                                  <img src="../assets/images/undraw_add_tasks_re_s5yj.svg" height="180"
                                                       alt="View Badge User"
                                                       data-app-dark-img="../assets/images/undraw_add_tasks_re_s5yj.svg"
                                                       data-app-light-img="../assets/images/undraw_add_tasks_re_s5yj.svg" />
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="card">
                         <div class="table-responsive text-nowrap">
                              <table class="table" id="example" style="padding: 20px;">
                                   <thead>
                                        <tr>
                                             <th>No</th>
                                             <th>Tanggal Pengecekan</th>

                                             <th>Pramudi</th>
                                             <th>No Induk</th>
                                             <th>No Body</th>
                                             <th width="50px">Actions</th>
                                        </tr>
                                   </thead>
                                   <?php
                                        include '../controllers/Fitwork.php';
                                                  
                                        $connection = new User();
                                        $hasil = $connection->getFitwork();

                                        $no = 1;

                                   ?>
                                   <tbody class="table-border-bottom-0">
                                        <?php foreach ($hasil as $userData) { ?>
                                        <tr>
                                             <td>
                                                  <?php echo $no++; ?>
                                             </td>
                                             <td>
                                                  <?php
                                                       setlocale(LC_TIME, 'id_ID');
                                                       $formattedDate = strftime('%A, %e %B %Y', strtotime($userData['tanggal']));
                                                       echo $formattedDate;
                                                  ?>
                                             </td>

                                             <td>
                                                  <?= $userData['pramudi'] ?>
                                             </td>
                                             <td>
                                                  <?= $userData['no_induk'] ?>
                                             </td>
                                             <td>
                                                  <?= $userData['no_body'] ?>
                                             </td>
                                             <td>
                                                  <div class="dropdown">
                                                       <div class="col-md-6 col-lg-4">
                                                            <div>
                                                                 <a
                                                                      href="../views/rampcheck-add.php?id=<?= $userData['id'] ?>">
                                                                      <button type="button"
                                                                           class="btn btn-icon btn-primary"
                                                                           style="height: 30px;width: 130px;">
                                                                           <span class="tf-icons bx bx-zoom-in"
                                                                                title="Detail"
                                                                                style="margin-right: 10px;"></span>
                                                                           Detail
                                                                      </button>
                                                                 </a>

                                                                 <a
                                                                      href="../views/rampcheck-print.php?id=<?= $userData['id'] ?>">
                                                                      <button type="button"
                                                                           class="btn btn-icon btn-success"
                                                                           style="height: 30px;">
                                                                           <span class="tf-icons bx bx-printer"
                                                                                title="Print"></span>
                                                                      </button>
                                                                 </a>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </td>
                                        </tr>
                                        <?php } ?>
                                   </tbody>
                              </table>
                         </div>
                    </div>

               </div>
          </div>
     </div>
</div>

<script>
$(document).ready(function() {
     $('#example').DataTable({
          info: false,
          ordering: true,
          paging: false
     });
});
</script>


<?php
include('../views/layout/footer.php');
?>