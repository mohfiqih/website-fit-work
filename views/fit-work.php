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
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Fit to Work</h5>
                    <div class="row">
                         <div class="col-lg-12 mb-4 order-0">
                              <div class="card">
                                   <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                             <div class="card-body">
                                                  <h5 class="card-title" style="color: #31374C;">Welcome to fitur Fit
                                                       Work,
                                                       Kak <?php echo $_SESSION['username']; ?> 🎉</h5>
                                                  <p class="mb-4">
                                                       Hi min, ini form untuk Fit to Work ya silahkan sudah bisa
                                                       digunakan
                                                       by sistem, Jadi satu Fit Work Pramudi sudah terintegrasi dengan
                                                       Rampcheck
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
                         <div class="col-xl-6" style="margin-left: 20px;">
                              <div class="mt-3">
                                   <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                             data-bs-target="#exampleModal">
                                             <i class="tf-icons bx bx-plus" title="Fit to Work"></i> Fit to Work
                                        </button>
                                        <div class="btn-group" role="group">
                                             <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle"
                                                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                  style="background-color: #31374C;color: white;">
                                                  <i class="tf-icons bx bx-printer" title="Print"
                                                       style="margin-right: 10px;"></i> Print
                                             </button>
                                             <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                  <a class="dropdown-item" href="javascript:void(0);">
                                                       <i class="tf-icons bx bx-book" title="Print"
                                                            style="margin-right: 10px;"></i>Print to PDF</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="table-responsive text-nowrap">
                              <table class="table" id="example" style="padding: 20px;">
                                   <thead>
                                        <tr>
                                             <th>No</th>
                                             <th>Hari</th>
                                             <th>Tanggal</th>
                                             <th>No Body</th>
                                             <th>Pramudi</th>
                                             <th>No Induk</th>
                                             <th>Masuk</th>
                                             <th>Keluar</th>
                                             <th>Actions</th>
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
                                                  <?= $userData['hari'] ?>
                                             </td>
                                             <td>
                                                  <?= $userData['tanggal'] ?>
                                             </td>
                                             <td>
                                                  <?= $userData['no_body'] ?>
                                             </td>
                                             <td>
                                                  <?= $userData['pramudi'] ?>
                                             </td>
                                             <td>
                                                  <?= $userData['no_induk'] ?>
                                             </td>
                                             <td>
                                                  <?= $userData['jam_masuk'] ?>
                                             </td>
                                             <td>
                                                  <?= $userData['jam_keluar'] ?>
                                             </td>
                                             <td>
                                                  <div class="dropdown">
                                                       <div class="col-md-6 col-lg-4">
                                                            <div>
                                                                 <a
                                                                      href="../views/fit-work-detail.php?id=<?= $userData['id'] ?>&&pramudi=<?= $userData['pramudi'] ?>">
                                                                      <button type="button"
                                                                           class="btn btn-icon btn-primary"
                                                                           style="height: 30px;">
                                                                           <span class="tf-icons bx bx-zoom-in"
                                                                                title="Detail"></span>
                                                                      </button>
                                                                 </a>
                                                                 <a
                                                                      href="../views/fit-work-print.php?id=<?= $userData['id'] ?>&&pramudi=<?= $userData['pramudi'] ?>">
                                                                      <button type="button"
                                                                           class="btn btn-icon btn-success"
                                                                           style="height: 30px;">
                                                                           <span class="tf-icons bx bx-printer"
                                                                                title="Print"></span>
                                                                      </button>
                                                                 </a>
                                                            </div>
                                                            <div style="margin-top: 10px;">
                                                                 <a
                                                                      href="../views/fit-work-detail.php?id=<?= $userData['id'] ?>&&pramudi=<?= $userData['pramudi'] ?>">
                                                                      <button type="button"
                                                                           class="btn btn-icon btn-warning"
                                                                           style="height: 30px;">
                                                                           <span class="tf-icons bx bx-pencil"
                                                                                title="Edit"></span>
                                                                      </button>
                                                                 </a>
                                                                 <button type="button" class="btn btn-icon btn-danger"
                                                                      style="height: 30px;"
                                                                      onclick="if (confirm('Yakin ingin hapus data?')) window.location.href='../controllers/FitworkDelete.php?id=<?= $userData['id'] ?>';">
                                                                      <span class="tf-icons bx bx-trash"
                                                                           title="Hapus"></span>
                                                                 </button>
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

<!-- Popup Modal Fit to Work -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Fit to Work</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="../controllers/FitworkAdd.php" method="POST">
                    <div class="modal-body">
                         <div class="card-body">
                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Hari</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                             <!-- <input type="text" class="form-control" name="hari"
                                                  placeholder="Masukan Hari" required /> -->
                                             <select class="form-select" id="exampleFormControlSelect1"
                                                  aria-label="Default select example" name="hari">
                                                  <option selected>Pilih Hari</option>
                                                  <option value="Senin">Senin</option>
                                                  <option value="Selasa">Selasa</option>
                                                  <option value="Rabu">Rabu</option>
                                                  <option value="Kamis">Kamis</option>
                                                  <option value="Jum'at">Jum'at</option>
                                                  <option value="Sabtu">Sabtu</option>
                                                  <option value="Minggu">Minggu</option>
                                             </select>
                                        </div>
                                        <!-- <div class="mb-3">
                                             <label for="exampleFormControlSelect1" class="form-label">Example
                                                  select</label>
                                             <select class="form-select" id="exampleFormControlSelect1"
                                                  aria-label="Default select example">
                                                  <option selected>Open this select menu</option>
                                                  <option value="1">One</option>
                                                  <option value="2">Two</option>
                                                  <option value="3">Three</option>
                                             </select>
                                        </div> -->
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-company">Tanggal</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                             <input type="date" class="form-control" name="tanggal"
                                                  placeholder="Masukan Tanggal" required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">No
                                        Body</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-company2" class="input-group-text"><i
                                                       class="bx bx-id-card"></i></span>
                                             <input type="text" class="form-control" name="no_body"
                                                  placeholder="Masukan No Induk" required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-fullname">Pramudi</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                       class="bx bx-user"></i></span>
                                             <input type="text" class="form-control" name="pramudi"
                                                  placeholder="Masukan Pramudi" required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">No
                                        Induk</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-company2" class="input-group-text"><i
                                                       class="bx bx-id-card"></i></span>
                                             <input type="text" class="form-control" name="no_induk"
                                                  placeholder="Masukan No Induk" required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Jam
                                        Masuk</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-company2" class="input-group-text"><i
                                                       class="bx bx-time"></i></span>
                                             <input type="time" class="form-control" name="jam_masuk"
                                                  placeholder="Jam Masuk" required />
                                        </div>
                                   </div>
                              </div>
                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Jam
                                        Keluar</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span id="basic-icon-default-company2" class="input-group-text"><i
                                                       class="bx bx-time"></i></span>
                                             <input type="time" class="form-control" name="jam_keluar"
                                                  placeholder="Jam Keluar" value="" />
                                        </div>
                                   </div>
                              </div>
                              <!-- KELENGKAPAN SERAGAM -->
                              <label class="col-sm-8 col-form-label"><strong>A. Kelengkapan Seragam</strong></label>
                              <div class="table-responsive text-nowrap">
                                   <table class="table">
                                        <thead>
                                             <tr>
                                                  <th width="5px;">No</th>
                                                  <th>Kelengkapan Seragam</th>
                                                  <th width="5px;">Ya</th>
                                                  <th width="5px;">Tidak</th>
                                             </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                             <tr>
                                                  <td>
                                                       1.
                                                  </td>
                                                  <td>
                                                       Jas
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="jas"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>

                                                  <td>
                                                       <input class="form-check-input" type="radio" name="jas"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       2.
                                                  </td>
                                                  <td>
                                                       Dasi
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="dasi"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="dasi"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       3.
                                                  </td>
                                                  <td>
                                                       Peci
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="peci"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="peci"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       4.
                                                  </td>
                                                  <td>
                                                       Sepatu Pantofel
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="pantofel"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="pantofel"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       5.
                                                  </td>
                                                  <td>
                                                       Seragam Sesuai Hari Kerja
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="seragam_kerja"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>

                                                  <td>
                                                       <input class="form-check-input" type="radio" name="seragam_kerja"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       6.
                                                  </td>
                                                  <td>
                                                       ID Card
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="id_card"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="id_card"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       7.
                                                  </td>
                                                  <td>
                                                       KIP (Kartu Identitas Pramudi)
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="kip"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="kip"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                        </tbody>
                                   </table>
                              </div>

                              <!-- KELENGKAPAN SURAT-SURAT -->
                              <label class="col-sm-8 col-form-label"><strong>B. Kelengkapan Surat</strong></label>
                              <div class="table-responsive text-nowrap">
                                   <table class="table">
                                        <thead>
                                             <tr>
                                                  <th width="5px;">No</th>
                                                  <th>Kelengkapan Surat</th>
                                                  <th width="5px;">Ya</th>
                                                  <th width="5px;">Tidak</th>
                                             </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                             <tr>
                                                  <td>
                                                       1.
                                                  </td>
                                                  <td>
                                                       SIM
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="sim"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="sim"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       2.
                                                  </td>
                                                  <td>
                                                       STNK
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="stnk"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="stnk"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       3.
                                                  </td>
                                                  <td>
                                                       KIR
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="kir"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="kir"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       4.
                                                  </td>
                                                  <td>
                                                       KP
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="kp" value="Ya"
                                                            id="defaultCheck1" style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="kp"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                        </tbody>
                                   </table>
                              </div>

                              <!-- KELENGKAPAN OPERASI -->
                              <label class="col-sm-8 col-form-label"><strong>C. Kelengkapan Operasi</strong></label>
                              <div class="table-responsive text-nowrap">
                                   <table class="table">
                                        <thead>
                                             <tr>
                                                  <th width="5px;">No</th>
                                                  <th>Kelengkapan Operasi</th>
                                                  <th width="5px;">Ya</th>
                                                  <th width="5px;">Tidak</th>
                                             </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                             <tr>
                                                  <td>
                                                       1.
                                                  </td>
                                                  <td>
                                                       Kartu Flazz
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="flazz"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="flazz"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>

                                             <tr>
                                                  <td>
                                                       2.
                                                  </td>
                                                  <td>
                                                       P3K
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="p3k"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="p3k"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>

                                             <tr>
                                                  <td>
                                                       3.
                                                  </td>
                                                  <td>
                                                       Handsanitizer
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="handsanitizer"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="handsanitizer"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>

                                             <tr>
                                                  <td>
                                                       4.
                                                  </td>
                                                  <td>
                                                       Senter
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="senter"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="senter"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                        </tbody>
                                   </table>
                              </div>

                              <!-- DATA KESEHATAN -->
                              <label class="col-sm-8 col-form-label"><strong>D. Data Kesehatan</strong></label>
                              <div class="table-responsive text-nowrap">
                                   <table class="table">
                                        <thead>
                                             <tr>
                                                  <th width="5px;">No</th>
                                                  <th>Data Kesehatan</th>
                                                  <th width="5px;">Check</th>
                                             </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                             <tr>
                                                  <td>
                                                       1.
                                                  </td>
                                                  <td>
                                                       Tekanan Darah
                                                  </td>
                                                  <td>
                                                       <input style="width: 150px;" type="text" class="form-control"
                                                            name="tekanan_darah" placeholder="Tekanan Darah" required />
                                                  </td>
                                             </tr>

                                             <tr>
                                                  <td>
                                                       2.
                                                  </td>
                                                  <td>
                                                       Suhu Badan
                                                  </td>
                                                  <td>
                                                       <input style="width: 150px;" type="text" class="form-control"
                                                            name="suhu_badan" placeholder="Suhu Badan" required />
                                                  </td>
                                             </tr>
                                        </tbody>
                                   </table>
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