<?php

include('../views/layout/header.php');

if (isset($_SESSION['success_add'])) {
     echo '<script>alert("' . $_SESSION['success_add'] . '");</script>';
     unset($_SESSION['success_add']);
}

if (isset($_SESSION['error_message'])) {
     echo '<script>alert("' . $_SESSION['error_message'] . '");</script>';
     unset($_SESSION['error_message']);
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
                                                  <i class="tf-icons bx bx-arrow-back" title="Back to Data"></i>
                                             </button>
                                        </a>
                                        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                             data-bs-target="#TambahRampcheckEksterior">
                                             <i class="tf-icons bx bx-plus" title="Input Data"
                                                  style="margin-right: 10px;"></i> Add Rampcheck
                                        </button> -->

                                        <div class="btn-group" role="group">
                                             <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle"
                                                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                  style="background-color: #31374C;color: white;">
                                                  <i class="tf-icons bx bx-car" title="Print"
                                                       style="margin-right: 10px;"></i> Add Rampcheck
                                             </button>
                                             <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                  <a class="dropdown-item" data-bs-toggle="modal"
                                                       data-bs-target="#TambahRampcheckEksterior">
                                                       <i class="tf-icons bx bx-layer-plus" title="Exterior"
                                                            style="margin-right: 10px;"></i> Exterior</a>
                                                  <a class="dropdown-item" data-bs-toggle="modal"
                                                       data-bs-target="#TambahRampcheckInterior">
                                                       <i class="tf-icons bx bx-list-plus" title="Interior"
                                                            style="margin-right: 10px;"></i> Interior</a>
                                             </div>
                                        </div>

                                        <div class="btn-group" role="group">
                                             <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle"
                                                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                  style="background-color: #31374C;color: white;">
                                                  <i class="tf-icons bx bx-printer" title="Print"
                                                       style="margin-right: 10px;"></i> Export
                                             </button>
                                             <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                  <a class="dropdown-item"
                                                       href="../views/PDF-rampcheck.php?id=<?= $_GET['id']; ?>">
                                                       <i class="tf-icons bx bx-book" title="Print"
                                                            style="margin-right: 10px;"></i> PDF</a>
                                                  <a class="dropdown-item"
                                                       href="../views/EXCEL-fit-rampcheck.php?id=<?= $_GET['id']; ?>">
                                                       <i class="tf-icons bx bx-printer" title="Print"
                                                            style="margin-right: 10px;"></i> Excel</a>
                                             </div>
                                        </div>

                                   </div>
                              </div>
                         </div>


                         <?php
                              include '../database/Database.php';

                              $connection = new Database();

                              if (isset($_GET['id'])) {
                              $id = $_GET['id'];
                              $result = $connection->query("SELECT * FROM fit_work WHERE id=$id");

                              if ($result) {
                                   if ($result->num_rows > 0) {
                                   $userData = $result->fetch_assoc(); 
                         ?>

                         <div class="col-md-12" style="margin-top: 20px;">
                              <div class="card">
                                   <div class="mb-2"
                                        style="margin-left: 20px;margin-top: 20px;padding-bottom: 20px;padding-right: 20px;">

                                        <div class="mb-3">
                                             <label class="form-label" for="basic-default-company" hidden>ID</label>
                                             <input type="text" class="form-control" name="id"
                                                  value="<?= $userData['id'] ?>" hidden />
                                        </div>
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
                                             <label class="form-label" for="basic-default-company">Depo</label>
                                             <input type="text" class="form-control" name="depo"
                                                  value="<?= $userData['depo'] ?>" readonly />
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
                         <?php
                                   } else {
                                        echo "Data tidak ditemukan.";
                                   }
                              } else {
                                   echo die("Error: " . $connection->getError());
                              }
                         } else {
                              echo "ID tidak diterima.";
                         }
                         ?>
                         <div class="col-md-12" style="margin-top: 20px;">
                              <div class="nav-align-top mb-4">
                                   <ul class="nav nav-tabs nav-fill" role="tablist">
                                        <li class="nav-item">
                                             <button type="button" class="nav-link active" role="tab"
                                                  data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                                  aria-controls="navs-justified-home" aria-selected="true">
                                                  <i class="tf-icons bx bx-book me-1"></i><span
                                                       class="d-none d-sm-block"> EKSTERIOR</span>

                                             </button>
                                        </li>
                                        <li class="nav-item">
                                             <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                  data-bs-target="#navs-justified-profile"
                                                  aria-controls="navs-justified-profile" aria-selected="false">
                                                  <i class="tf-icons bx bx-book me-1"></i><span
                                                       class="d-none d-sm-block"> INTERIOR</span>

                                             </button>
                                        </li>
                                   </ul>
                                   <div class="tab-content">
                                        <!-- EKSTERIOR -->
                                        <!-- <button type="button" class="btn btn-danger" onclick="deleteAllData()">Delete
                                             All</button>

                                        <script>
                                        function deleteAllData() {
                                             if (confirm('Yakin ingin hapus semua data?')) {
                                                  window.location.href =
                                                       '../controllers/RampcheckDelete.php?id=<?= $userData['id_fit'] ?>&&id_ramp=<?= $userData['id_ramp'] ?>';
                                             }
                                        }
                                        </script> -->

                                        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">

                                             <?php
                                                  include '../controllers/Rampcheck.php';
                                                            
                                                  $connection = new Rampcheck();
                                                  $hasil = $connection->getRampcheckEksterior();
                                                  // $id_ramp = 

                                                  $no = 1;

                                             ?>
                                             <div class="table-responsive text-nowrap">
                                                  <table class="table" id="myTableEksterior">
                                                       <thead>
                                                            <tr>
                                                                 <th width="5px;">No</th>
                                                                 <th>Item Pengecekan</th>
                                                                 <th width="5px;">Bagian</th>
                                                                 <th width="5px;">Kondisi</th>
                                                                 <th width="5px;">Gambar</th>
                                                                 <th width="5px;">Keterangan</th>
                                                                 <th width="5px;">Action</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody class="table-border-bottom-0">
                                                            <?php foreach ($hasil as $userData) { ?>
                                                            <tr>

                                                                 <td><?= $no++ ?></td>
                                                                 <td>
                                                                      <?= $userData['item'] ?>
                                                                 </td>
                                                                 <td>
                                                                      <?= $userData['bagian'] ?>
                                                                 </td>
                                                                 <td>
                                                                      <span
                                                                           class="badge bg-label-primary me-1"><?= $userData['kondisi'] ?></span>

                                                                 </td>
                                                                 <td>
                                                                      <?php if (!empty($userData['gambar'])): ?>
                                                                      <img src="../uploads/<?= $userData['kategori'] ?>/<?= $userData['gambar'] ?>"
                                                                           alt="Gambar Rampcheck" width="100">
                                                                      <?php else: ?>

                                                                      None
                                                                      <?php endif; ?>
                                                                 </td>

                                                                 <td>
                                                                      <?= $userData['keterangan'] ?>
                                                                 </td>
                                                                 <td>
                                                                      <div style="margin-top: 10px;">
                                                                           <a
                                                                                href="../views/rampcheck-edit.php?id=<?= $userData['id_fit'] ?>&&id_ramp=<?= $userData['id_ramp'] ?>">
                                                                                <button type="button"
                                                                                     class="btn btn-icon btn-warning"
                                                                                     style="height: 30px;">
                                                                                     <span class="tf-icons bx bx-pencil"
                                                                                          title="Edit"></span>
                                                                                </button>
                                                                           </a>
                                                                           <!-- <button type="button"
                                                                                class="btn btn-icon btn-primary"
                                                                                style="height: 30px;"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#lihatGambarModal<?= $userData['id'] ?>"
                                                                                data-gambar="../uploads/<?= $userData['kategori'] ?>/<?= $userData['gambar'] ?>">
                                                                                <span class="tf-icons bx bx-show"
                                                                                     title="Lihat Gambar"></span>
                                                                           </button> -->
                                                                           <button type="button"
                                                                                class="btn btn-icon btn-danger"
                                                                                style="height: 30px;"
                                                                                onclick="if (confirm('Yakin ingin hapus data?')) window.location.href='../controllers/RampcheckDelete.php?id=<?= $userData['id_fit'] ?>&&id_ramp=<?= $userData['id_ramp'] ?>';">
                                                                                <span class="tf-icons bx bx-trash"
                                                                                     title="Hapus"></span>
                                                                           </button>
                                                                      </div>
                                                                 </td>
                                                            </tr>
                                                            <?php } ?>
                                                       </tbody>
                                                  </table>
                                             </div>
                                        </div>
                                        <!-- INTERIOR -->
                                        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                                             <div class="table-responsive text-nowrap">
                                                  <?php
                                                            
                                                  $connection = new Rampcheck();
                                                  $hasil = $connection->getRampcheckInterior();
                                                  $id= $_GET['id'];

                                                  $no = 1;

                                             ?>
                                                  <div class="table-responsive text-nowrap">
                                                       <table class="table" id="myTableInterior">
                                                            <thead>
                                                                 <tr>
                                                                      <th width="5px;">No</th>
                                                                      <th>Item Pengecekan</th>
                                                                      <th width="5px;">Bagian</th>
                                                                      <th width="5px;">Kondisi</th>
                                                                      <th width="5px;">Gambar</th>
                                                                      <th width="5px;">Keterangan</th>
                                                                      <th width="5px;">Action</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody class="table-border-bottom-0">
                                                                 <?php foreach ($hasil as $userData) { ?>
                                                                 <tr>
                                                                      <td><?= $no++ ?></td>
                                                                      <td>
                                                                           <?= $userData['item'] ?>
                                                                      </td>
                                                                      <td>
                                                                           <?= $userData['bagian'] ?>
                                                                      </td>
                                                                      <td>
                                                                           <span
                                                                                class="badge bg-label-primary me-1"><?= $userData['kondisi'] ?></span>

                                                                      </td>
                                                                      <td>
                                                                           <?php if (!empty($userData['gambar'])): ?>
                                                                           <img src="../uploads/<?= $userData['kategori'] ?>/<?= $userData['gambar'] ?>"
                                                                                alt="Gambar Rampcheck" width="100">
                                                                           <?php else: ?>

                                                                           None
                                                                           <?php endif; ?>
                                                                      </td>
                                                                      <td>
                                                                           <?= $userData['keterangan'] ?>
                                                                      </td>
                                                                      <td>
                                                                           <div style="margin-top: 10px;">
                                                                                <a
                                                                                     href="../views/rampcheck-edit.php?id=<?= $userData['id_fit'] ?>&&id_ramp=<?= $userData['id_ramp'] ?>">
                                                                                     <button type="button"
                                                                                          class="btn btn-icon btn-warning"
                                                                                          style="height: 30px;">
                                                                                          <span class="tf-icons bx bx-pencil"
                                                                                               title="Edit"></span>
                                                                                     </button>
                                                                                </a>
                                                                                <!-- <button type="button"
                                                                                     class="btn btn-icon btn-primary"
                                                                                     style="height: 30px;"
                                                                                     data-bs-toggle="modal"
                                                                                     data-bs-target="#lihatGambarModal"
                                                                                     data-gambar="../uploads/<?= $userData['kategori'] ?>/<?= $userData['gambar'] ?>">
                                                                                     <span class="tf-icons bx bx-show"
                                                                                          title="Lihat Gambar"></span>
                                                                                </button> -->
                                                                                <button type="button"
                                                                                     class="btn btn-icon btn-danger"
                                                                                     style="height: 30px;"
                                                                                     onclick="if (confirm('Yakin ingin hapus data?')) window.location.href='../controllers/RampcheckDelete.php?id=<?= $userData['id_fit'] ?>&&id_ramp=<?= $userData['id_ramp'] ?>';">
                                                                                     <span class="tf-icons bx bx-trash"
                                                                                          title="Hapus"></span>
                                                                                </button>
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
                    </div>
               </div>
          </div>
     </div>
</div>


<!-- TAMBAH DATA EKSTERIOR -->
<div class="modal fade" id="TambahRampcheckEksterior" tabindex="-1" aria-labelledby="TambahRampcheckLabel"
     aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content" style="width: 100%;">
               <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>

               <form action="../controllers/RampcheckAdd.php?id=<?= $_GET['id'] ?>" method="POST"
                    enctype="multipart/form-data">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                         <li class="nav-item">
                              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                   data-bs-target="#input-eksterior" aria-controls="input-eksterior"
                                   aria-selected="true">
                                   <i class="tf-icons bx bx-layer-plus me-1"></i><span class="d-none d-sm-block">
                                        Input Eksterior</span>
                              </button>
                         </li>

                    </ul>

                    <!-- INPUT EKSTERIOR -->
                    <div class="tab-pane fade show active" id="input-eksterior" role="tabpanel">
                         <input type="text" class="form-control" name="id_fit" value="<?= $_GET['id'] ?>" hidden />
                         <div class="modal-body">
                              <div class="card-body">
                                   <div class="row">
                                        <div class="col-md-6">
                                             <div class="row mb-3">
                                                  <div class="form-check" style="margin-left: 15px;">
                                                       <label class="col-sm-12 col-form-label">
                                                            <b>Bagian
                                                                 Depan</b></label>
                                                       <!-- <label class="col-sm-12 col-form-label">
                                                            <input class="form-check-input" type="checkbox"
                                                                 name="bagian" id="bagian" value="Depan"> <b>Bagian
                                                                 Depan</b></label> -->
                                                  </div>

                                                  <div class="col-sm-10">
                                                       <div class="form-check form-check-inline">
                                                            <?php
                                                            $items = array(
                                                            "Bumper Depan",
                                                            "Kaca Spion",
                                                            "Kebersihan Body",
                                                            "Wiper Berfungsi",
                                                            "Lampu Depan",
                                                            "Lampu Sign",
                                                            "Lampu Hazard",
                                                            "Buku, Stiker, dan Plat Uji",
                                                            "Nomor Body Kendaraan",
                                                            "Body Depan",
                                                            "Jumlah Lampu"
                                                            );
                                                       ?>

                                                            <?php foreach ($items as $item) : ?>
                                                            <div class="form-check">
                                                                 <input class="form-check-input" type="checkbox"
                                                                      name="item[]"
                                                                      id="item<?= str_replace(' ', '', $item) ?>"
                                                                      value="<?= $item ?>">
                                                                 <label class="form-check-label"
                                                                      for="item<?= str_replace(' ', '', $item) ?>"><?= $item ?></label>
                                                            </div>
                                                            <?php endforeach; ?>
                                                       </div>

                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="row mb-2">
                                                  <div class="form-check" style="margin-left: 15px;">
                                                       <label class="col-sm-12 col-form-label">
                                                            <b>Bagian
                                                                 Belakang</b></label>
                                                       <!-- <label class="col-sm-12 col-form-label">
                                                            <input class="form-check-input" type="checkbox"
                                                                 name="bagian" id="bagian" value="Belakang"> <b>Bagian
                                                                 Belakang</b></label> -->
                                                  </div>
                                                  <div class="col-sm-10">
                                                       <div class="form-check form-check-inline">
                                                            <?php
                                                            $items = array(
                                                            "Lampu Belakang",
                                                            "Lampu Rem",
                                                            "Lampu Mundur",
                                                            "Lampu Sign",
                                                            "Lampu Hazard",
                                                            "Body Belakang",
                                                            "Kaca Belakang",
                                                            );
                                                       ?>

                                                            <?php foreach ($items as $item) : ?>
                                                            <div class="form-check">
                                                                 <input class="form-check-input" type="checkbox"
                                                                      name="item[]"
                                                                      id="item<?= str_replace(' ', '', $item) ?>"
                                                                      value="<?= $item ?>">
                                                                 <label class="form-check-label"><?= $item ?></label>
                                                            </div>
                                                            <?php endforeach; ?>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>

                                   </div>
                                   <hr>
                                   <div class="row">
                                        <div class="col-md-6">
                                             <div class="row mb-12">
                                                  <div class="form-check" style="margin-left: 15px;">
                                                       <label class="col-sm-12 col-form-label">
                                                            <b>Bagian
                                                                 Kanan</b></label>
                                                       <!-- <label class="col-sm-12 col-form-label">
                                                            <input class="form-check-input" type="checkbox"
                                                                 name="bagian" id="bagian" value="Kanan"> <b>Bagian
                                                                 Kanan</b></label> -->
                                                  </div>
                                                  <div class="col-sm-10">
                                                       <div class="form-check form-check-inline">
                                                            <?php
                                                            $items = array(
                                                            "Ban",
                                                            "Roda/Velg",
                                                            "Body Kanan",
                                                            "LED Display",
                                                            "Kaca Kanan",
                                                            );
                                                       ?>

                                                            <?php foreach ($items as $item) : ?>
                                                            <div class="form-check">
                                                                 <input class="form-check-input" type="checkbox"
                                                                      name="item[]"
                                                                      id="item<?= str_replace(' ', '', $item) ?>"
                                                                      value="<?= $item ?>">
                                                                 <label class="form-check-label"><?= $item ?></label>
                                                            </div>
                                                            <?php endforeach; ?>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="row mb-2">
                                                  <div class="form-check" style="margin-left: 15px;">
                                                       <label class="col-sm-12 col-form-label">
                                                            <b>Bagian
                                                                 Kiri</b></label>
                                                       <!-- <label class="col-sm-12 col-form-label">
                                                            <input class="form-check-input" type="checkbox"
                                                                 name="bagian" id="bagian" value="Kiri" readonly>
                                                            <b>Bagian
                                                                 Kiri</b></label> -->
                                                  </div>
                                                  <div class="col-sm-10">
                                                       <div class="form-check form-check-inline">
                                                            <?php
                                                            $items = array(
                                                            "Ban",
                                                            "Roda/Velg",
                                                            "Body Kiri",
                                                            "LED Display",
                                                            "Kaca Kiri",
                                                            );
                                                       ?>

                                                            <?php foreach ($items as $item) : ?>
                                                            <div class="form-check">
                                                                 <input class="form-check-input" type="checkbox"
                                                                      name="item[]"
                                                                      id="item<?= str_replace(' ', '', $item) ?>"
                                                                      value="<?= $item ?>">
                                                                 <label class="form-check-label"><?= $item ?></label>
                                                            </div>
                                                            <?php endforeach; ?>

                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <hr>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-company">Bagian</label>
                                        <div class="col-sm-10" style="margin-top: 5px;">
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="bagian"
                                                       value="Depan" id="Depan" required>
                                                  <label class="form-check-label" for="Depan">Depan</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" id="Belakang" type="radio"
                                                       name="bagian" value="Belakang">
                                                  <label class="form-check-label" for="Belakang">Belakang</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="bagian"
                                                       value="Kanan" id="Kanan">
                                                  <label class="form-check-label" for="Kanan">Kanan</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="bagian"
                                                       value="Kiri" id="Kiri">
                                                  <label class="form-check-label" for="Kiri">Kiri</label>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-company">Kondisi</label>
                                        <div class="col-sm-10" style="margin-top: 5px;">
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="kondisi"
                                                       id="sesuai" value="Sesuai" required>
                                                  <label class="form-check-label" for="sesuai">Sesuai</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="kondisi"
                                                       id="tidak_sesuai" value="Tidak Sesuai">
                                                  <label class="form-check-label" for="tidak_sesuai">Tidak
                                                       Sesuai</label>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-email">Kategori</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-car"></i></span>
                                                  <input type="text" class="form-control" name="kategori"
                                                       value="Eksterior" readonly />
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-image"></i></span>
                                                  <input type="file" class="form-control" name="gambar[]"
                                                       accept="image/*" multiple />
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-company">Keterangan</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"></span>
                                                  <textarea style="height: 100px;" type="text" class="form-control"
                                                       name="keterangan"> </textarea>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save</button>
                         </div>
                    </div>



               </form>
          </div>
     </div>
</div>

<!-- TAMBAH DATA INTERIOR -->
<div class="modal fade" id="TambahRampcheckInterior" tabindex="-1" aria-labelledby="TambahRampcheckLabel"
     aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content" style="width: 100%;">
               <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>

               <form action="../controllers/RampcheckAdd.php?id=<?= $_GET['id'] ?>" method="POST"
                    enctype="multipart/form-data">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                         <li class="nav-item">
                              <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                   data-bs-target="#input-interior" aria-controls="input-interior" aria-selected="true">
                                   <i class="tf-icons bx bx-list-plus me-1"></i><span class="d-none d-sm-block">
                                        Input Interior</span>
                              </button>
                         </li>
                    </ul>

                    <!-- INPUT INTERIOR -->
                    <div class="tab-pane fade show active" id="input-interior" role="tabpanel">
                         <input type="text" class="form-control" name="id_fit" value="<?= $_GET['id'] ?>" hidden />
                         <div class="modal-body">
                              <div class="card-body">
                                   <div class="row">
                                        <div class="col-md-6">
                                             <div class="row mb-3">
                                                  <div class="form-check" style="margin-left: 15px;">
                                                       <label class="col-sm-12 col-form-label">
                                                            <b>Bagian
                                                                 Dalam</b></label>
                                                  </div>

                                                  <div class="col-sm-10">
                                                       <div class="form-check form-check-inline">
                                                            <?php
                                                            $items = array(
                                                            "Tanda Pengenal Pengemudi",
                                                            "Dokumen Perjalanan (SIM, STNK, KIR, Kartu Pengawasan Pengemudi, Kartu Flazz)",
                                                            "Indikator Lampu Peringatan",
                                                            "Rem Kaki",
                                                            "Rem Tangan",
                                                            "Indikator RPM Speedometer",
                                                            "Indikator Odometer",
                                                            "Kemudi Klakson",
                                                            "Voice Announcer",
                                                            "Lampu Darurat Pengemudi",
                                                            );
                                                       ?>

                                                            <?php foreach ($items as $item) : ?>
                                                            <div class="form-check">
                                                                 <input class="form-check-input" type="checkbox"
                                                                      name="item[]"
                                                                      id="item<?= str_replace(' ', '', $item) ?>"
                                                                      value="<?= $item ?>">
                                                                 <label class="form-check-label"
                                                                      for="item<?= str_replace(' ', '', $item) ?>"><?= $item ?></label>
                                                            </div>
                                                            <?php endforeach; ?>
                                                       </div>

                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="row mb-2">
                                                  <div class="form-check" style="margin-left: 15px;">
                                                       <label class="col-sm-12 col-form-label">
                                                            <b>Bagian
                                                                 Dalam</b></label>
                                                  </div>
                                                  <div class="col-sm-10">
                                                       <div class="form-check form-check-inline">
                                                            <?php
                                                            $items = array(
                                                            "CCTV Berfungsi",
                                                            "Lampu Senter",
                                                            "GPS",
                                                            "Air Conditioner (AC)",
                                                            "Kotak P3K",
                                                            "APAR",
                                                            "Lampu Penerangan Dalam",
                                                            "SOP Pengoprasian Kendaraan",
                                                            "SOP Penanganan Keadaan Darurat",
                                                            "Kursi Prioritas",
                                                            "Palu Pemecah Kaca",
                                                            "Tombol STOP",
                                                            );
                                                       ?>

                                                            <?php foreach ($items as $item) : ?>
                                                            <div class="form-check">
                                                                 <input class="form-check-input" type="checkbox"
                                                                      name="item[]"
                                                                      id="item<?= str_replace(' ', '', $item) ?>"
                                                                      value="<?= $item ?>">
                                                                 <label class="form-check-label"><?= $item ?></label>
                                                            </div>
                                                            <?php endforeach; ?>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>

                                   </div>
                                   <hr>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-company">Bagian</label>
                                        <div class="col-sm-10" style="margin-top: 5px;">
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="bagian"
                                                       value="Interior" id="Interior" required>
                                                  <label class="form-check-label" for="Interior">Interior</label>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-company">Kondisi</label>
                                        <div class="col-sm-10" style="margin-top: 5px;">
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="kondisi"
                                                       id="sesuai" value="Sesuai" required>
                                                  <label class="form-check-label" for="sesuai">Sesuai</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="kondisi"
                                                       id="tidak_sesuai" value="Tidak Sesuai">
                                                  <label class="form-check-label" for="tidak_sesuai">Tidak
                                                       Sesuai</label>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-email">Kategori</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-car"></i></span>
                                                  <input type="text" class="form-control" name="kategori"
                                                       value="Interior" readonly />
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-image"></i></span>
                                                  <input type="file" class="form-control" name="gambar[]"
                                                       accept="image/*" multiple />
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-company">Keterangan</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"></span>
                                                  <textarea style="height: 100px;" type="text" class="form-control"
                                                       name="keterangan"> </textarea>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save</button>
                         </div>
                    </div>



               </form>
          </div>
     </div>
</div>

<!-- LIHAT GAMBAR -->
<!-- <div class="modal fade" id="lihatGambarModal" tabindex="-1" aria-labelledby="lihatGambarModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="lihatGambarModalLabel">Lihat Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <img id="gambarModal" src="" alt="Gambar Rampcheck" class="img-fluid">
                    <?php if (!empty($userData['gambar'])): ?>
                    <center>
                         <img src="../uploads/<?= $userData['kategori'] ?>/<?= $userData['gambar'] ?>"
                              alt="Gambar Rampcheck" width="400px">
                    </center>
                    <?php else: ?>

                    None
                    <?php endif; ?>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
               </div>
          </div>
     </div>
</div> -->

<!-- Check All -->
<!-- <script>
document.addEventListener('DOMContentLoaded', function() {
     const selectAllCheckbox = document.getElementById('selectAllItems');
     const itemCheckboxes = document.querySelectorAll('input[name="item[]"]');

     selectAllCheckbox.addEventListener('change', function() {
          itemCheckboxes.forEach(function(checkbox) {
               checkbox.checked = selectAllCheckbox.checked;
          });
     });

     itemCheckboxes.forEach(function(checkbox) {
          checkbox.addEventListener('change', function() {
               selectAllCheckbox.checked = itemCheckboxes.length === document
                    .querySelectorAll('input[name="item[]"]:checked').length;
          });
     });

     // Modifikasi untuk memeriksa apakah kategori "Depan" dicentang
     const kategoriDepanCheckbox = document.getElementById('kategoriDepan');
     kategoriDepanCheckbox.addEventListener('change', function() {
          if (kategoriDepanCheckbox.checked) {
               itemCheckboxes.forEach(function(checkbox) {
                    // Hanya tandai checkbox jika termasuk kategori "Depan"
                    if (checkbox.value.includes('Depan')) {
                         checkbox.checked = true;
                    }
               });
          } else {
               itemCheckboxes.forEach(function(checkbox) {
                    // Hanya hapus tanda checkbox jika termasuk kategori "Depan"
                    if (checkbox.value.includes('Depan')) {
                         checkbox.checked = false;
                    }
               });
          }
     });
});
</script> -->


<script>
let table_eksterior = new DataTable('#myTableEksterior');
</script>

<script>
let table_interior = new DataTable('#myTableInterior');
</script>


<?php
include('../views/layout/footer.php');
?>