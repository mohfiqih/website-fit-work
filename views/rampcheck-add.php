<?php
include('../views/layout/header.php');

include '../database/Database.php';

if (isset($_SESSION['success_add'])) {
     echo '<script>alert("' . $_SESSION['success_add'] . '");</script>';
     unset($_SESSION['success_add']);
}
?>


<div class="content-wrapper">
     <div class="row">
          <div class="content-wrapper">
               <div class="container-xxl flex-grow-1 container-p-y">
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App / Fit to Work / Detail /</span>
                         Rampcheck</h5>

                    <div class="row">
                         <div class="col-md-12">
                              <div class="card">
                                   <div class="mb-2" style="margin-left: 20px;margin-top: 20px;padding-bottom: 20px;">
                                        <a href="../views/rampcheck.php">
                                             <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                  data-bs-target="#editFit">
                                                  <i class="tf-icons bx bx-arrow-back" title="Back to Data"
                                                       style="margin-right: 10px;"></i>
                                             </button>
                                        </a>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                             data-bs-target="#TambahRampcheckEksterior">
                                             <i class="tf-icons bx bx-plus" title="Input Data"
                                                  style="margin-right: 10px;"></i> Eksterior
                                        </button>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                             data-bs-target="#TambahRampcheckInterior">
                                             <i class="tf-icons bx bx-plus" title="Input Data"
                                                  style="margin-right: 10px;"></i> Interior
                                        </button>
                                        <!-- <button type="button" class="btn btn-warning">
                                             <i class="tf-icons bx bx-pencil" title="Edit Data"
                                                  style="margin-right: 10px;"></i> Edit
                                        </button> -->

                                   </div>
                              </div>
                         </div>

                         <?php

                         $connection = new Database();

                         if ($connection->getConnection()->connect_error) {
                         die("Connection failed: " . $connection->getConnection()->connect_error);
                         }

                         if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                         $id = $_GET['id'];

                         $mysqli = $connection->getConnection();

                         $stmt = $mysqli->prepare("SELECT rampcheck2.*, fit_work.hari, fit_work.tanggal, fit_work.no_body, fit_work.pramudi,
                         rampcheck2.item, rampcheck2.gambar, rampcheck2.keterangan
                         FROM rampcheck2
                         INNER JOIN fit_work ON rampcheck2.id_fit = fit_work.id
                         WHERE rampcheck2.id_fit = ?");


                         if (!$stmt) {
                              die("Error in prepare: " . $mysqli->error);
                         }

                         $stmt->bind_param("i", $id);
                         
                         if ($stmt->execute()) {
                              $result = $stmt->get_result();

                              if ($result->num_rows > 0) {
                                   $userData = $result->fetch_assoc();
                                   $no = 1;
                         ?>

                         <div class="col-md-12" style="margin-top: 20px;">
                              <div class="card">
                                   <div class="mb-2" style="margin-left: 20px;margin-top: 20px;padding-bottom: 20px;">

                                        <div class="mb-3">
                                             <label class="form-label" for="basic-default-company">No Bodi</label>
                                             <input type="text" class="form-control" name="no_body"
                                                  value="<?= $userData['no_body'] ?>" readonly />
                                        </div>

                                        <div class="mb-3">
                                             <label class="form-label" for="basic-default-company">Nama
                                                  Pramudi</label>
                                             <input type="text" class="form-control" name="pramudi"
                                                  value="<?= $userData['pramudi'] ?>" readonly />
                                        </div>

                                        <div class="mb-3">
                                             <label class="form-label" for="basic-default-company">Tanggal
                                                  Pengecekan</label>
                                             <input type="text" class="form-control" name="tanggal" value="<?php
                                             setlocale(LC_TIME, 'id_ID');
                                             $tanggalPengguna = $userData['tanggal'];
                                             $tanggalTerformat = strftime('%A, %e %B %Y', strtotime($tanggalPengguna));
                                             echo $tanggalTerformat;
                                             ?>
                                             " readonly />
                                        </div>

                                   </div>
                              </div>
                         </div>

                         <div class="col-md-12" style="margin-top: 20px;">
                              <div class="nav-align-top mb-4">
                                   <ul class="nav nav-tabs nav-fill" role="tablist">
                                        <li class="nav-item">
                                             <button type="button" class="nav-link active" role="tab"
                                                  data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                                  aria-controls="navs-justified-home" aria-selected="true">
                                                  <i class="tf-icons bx bx-user me-1"></i><span
                                                       class="d-none d-sm-block"> EKSTERIOR</span>
                                                  <span
                                                       class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">20
                                                  </span>
                                             </button>
                                        </li>
                                        <li class="nav-item">
                                             <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                  data-bs-target="#navs-justified-profile"
                                                  aria-controls="navs-justified-profile" aria-selected="false">
                                                  <i class="tf-icons bx bx-book me-1"></i><span
                                                       class="d-none d-sm-block"> INTERIOR</span>
                                                  <span
                                                       class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">22
                                                  </span>
                                             </button>
                                        </li>
                                   </ul>
                                   <div class="tab-content">
                                        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">


                                             <div class="table-responsive text-nowrap">
                                                  <table class="table" id="eksterior">
                                                       <thead>
                                                            <tr>
                                                                 <th width="5px;">No</th>
                                                                 <th>Item Pengecekan</th>
                                                                 <th width="5px;">Kondisi</th>
                                                                 <th width="5px;">Gambar</th>
                                                                 <th width="5px;">Keterangan</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody class="table-border-bottom-0">

                                                            <tr>
                                                                 <td><?= $no++ ?></td>
                                                                 <td>
                                                                      <?= is_array($userData['item']) ? implode(', ', $userData['item']) : $userData['item'] ?>
                                                                 </td>
                                                                 <td>
                                                                      <span
                                                                           class="badge bg-label-primary me-1"><?= is_array($userData['kondisi']) ? implode(', ', $userData['kondisi']) : $userData['kondisi'] ?></span>

                                                                 </td>
                                                                 <td>
                                                                      <?= is_array($userData['gambar']) ? implode(', ', $userData['gambar']) : $userData['gambar'] ?>
                                                                 </td>
                                                                 <td>
                                                                      <?= is_array($userData['keterangan']) ? implode(', ', $userData['keterangan']) : $userData['keterangan'] ?>
                                                                 </td>
                                                            </tr>

                                                       </tbody>
                                                  </table>
                                             </div>
                                        </div>
                                        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">


                                             <div class="table-responsive text-nowrap">

                                             </div>

                                        </div>

                                   </div>
                              </div>
                         </div>
                    </div>


                    <?php
                              } else {
                                   echo "<div class='col-md-12'>",
                                        "<div class='card' style='margin-top: 20px;'>",
                                        "  <div class='card-body'>",
                                        "    <h5 class='card-title'>Informasi Rampcheck</h5>",
                                        "    <p class='card-text'>Belum ada data Rampcheck!</p>",
                                        "  </div>",
                                        "</div>",
                                        "</div>";
                              }
                         } else {
                              echo die("Error: " . $connection->getError());
                         }
                    } else {
                         echo "ID tidak diterima.";
                    }
               ?>
               </div>
          </div>
     </div>
</div>


<div class="modal fade" id="TambahRampcheckEksterior" tabindex="-1" aria-labelledby="TambahRampcheckLabel"
     aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="TambahRampcheckLabel">Input Eksterior</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="../controllers/RampcheckAdd.php" method="POST">
                    <input type="text" class="form-control" name="id_fit" value="<?= $_GET['id'] ?>" hidden />
                    <div class="modal-body">
                         <div class="card-body">
                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Item</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-book"></i></span>
                                             <input type="text" class="form-control" name="item"
                                                  placeholder="Masukan Item" required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-company">Kategori</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-book"></i></span>
                                             <input type="text" class="form-control" name="Kategori" value="Eksterior"
                                                  readonly />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-company">Kondisi</label>
                                   <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="kondisi" id="sesuai"
                                                  value="Sesuai" required>
                                             <label class="form-check-label" for="sesuai">Sesuai</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                             <input class="form-check-input" type="radio" name="kondisi"
                                                  id="tidak_sesuai" value="Tidak Sesuai">
                                             <label class="form-check-label" for="tidak_sesuai">Tidak Sesuai</label>
                                        </div>
                                   </div>
                              </div>


                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-company">Gambar</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-image"></i></span>
                                             <input type="text" class="form-control" name="gambar"
                                                  placeholder="Masukan Gambar" required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-company">Keterangan</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-book"></i></span>
                                             <input type="text" class="form-control" name="keterangan"
                                                  placeholder="Masukan Keterangan" required />
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save</button>
                    </div>
               </form>
          </div>
     </div>
</div>


<script>
$(document).ready(function() {
     $('#interior').DataTable({
          info: false,
          ordering: true,
          paging: false
     });
});
</script>

<script>
$(document).ready(function() {
     $('#eksterior').DataTable({
          info: false,
          ordering: true,
          paging: false
     });
});
</script>


<?php
include('../views/layout/footer.php');
?>