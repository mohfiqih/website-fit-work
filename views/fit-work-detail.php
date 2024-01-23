<?php
include('../views/layout/header.php');

if (isset($_SESSION['success_update'])) {
     echo '<script>alert("' . $_SESSION['success_update'] . '");</script>';
     unset($_SESSION['success_update']);
}
?>

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

<form action="../controllers/FitworkUpdate.php?id=<?= $userData['id'] ?>" method="POST">
     <div class="content-wrapper">
          <div class="row">
               <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                         <h5 class="py-2 mb-2"><span class="text-muted fw-light">App / Fit to Work /</span> Detail</h5>

                         <div class="row">
                              <div class="col-md-6">
                                   <div class="card">
                                        <div class="mt-3" style="margin-left: 20px;">
                                             <div class="btn-group" role="group"
                                                  aria-label="Button group with nested dropdown">
                                                  <a href="../views/fit-work.php">
                                                       <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#editFit">
                                                            <i class="tf-icons bx bx-arrow-back" title="Edit Data"
                                                                 style="margin-right: 10px;"></i> Back
                                                       </button>
                                                  </a>

                                                  <a href="../views/rampcheck-add.php?id=<?= $userData['id'] ?>"
                                                       style="margin-left: 10px;">
                                                       <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#rampcheckModal">
                                                            <i class="tf-icons bx bx-plus" title="Fit to Work"></i>
                                                            Rampcheck
                                                       </button>
                                                  </a>
                                             </div>
                                        </div>
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                             <h5 class="mb-0">Data Pramudi</h5>
                                             <small class="text-muted float-end">Pramudi:
                                                  <?= $userData['pramudi']; ?></small>
                                        </div>
                                        <div class="card-body">
                                             <div class="col-xl">
                                                  <div class="mb-4">

                                                       <div class="mb-3">
                                                            <label class="form-label"
                                                                 for="basic-default-fullname">Hari</label>
                                                            <input type="text" class="form-control" name="hari"
                                                                 value="<?= $userData['hari']; ?>" readonly />
                                                       </div>
                                                       <div class="mb-3">
                                                            <label class="form-label"
                                                                 for="basic-default-company">Tanggal</label>
                                                            <input type="text" class="form-control" name="tanggal"
                                                                 value="<?= $userData['tanggal']; ?>" readonly />
                                                       </div>
                                                       <div class="mb-3">
                                                            <label class="form-label" for="basic-default-company">No.
                                                                 Body</label>
                                                            <input type="text" class="form-control" name="no_body"
                                                                 value="<?= $userData['no_body']; ?>" readonly />
                                                       </div>
                                                       <div class="mb-3">
                                                            <label class="form-label"
                                                                 for="basic-default-company">Pramudi</label>
                                                            <input type="text" class="form-control" name="pramudi"
                                                                 value="<?= $userData['pramudi']; ?>" readonly />
                                                       </div>
                                                       <div class="mb-3">
                                                            <label class="form-label" for="basic-default-company">No.
                                                                 Induk</label>
                                                            <input type="text" class="form-control" name="no_induk"
                                                                 value="<?= $userData['no_induk']; ?>" readonly />
                                                       </div>
                                                       <div class="mb-3">
                                                            <label class="form-label" for="basic-default-company">Jam
                                                                 Masuk</label>
                                                            <?php
                                                                 $formattedJamMasuk = date("H:i", strtotime($userData['jam_masuk']));
                                                            ?>
                                                            <input type="time" class="form-control" name="jam_masuk"
                                                                 value="<?= $formattedJamMasuk; ?>" readonly />
                                                       </div>

                                                       <div class="mb-3">
                                                            <label class="form-label" for="basic-default-company">Jam
                                                                 Keluar</label>
                                                            <input type="time" class="form-control" name="jam_keluar"
                                                                 value="<?= $userData['jam_keluar'] ?>" required />
                                                       </div>


                                                       <button type="button" class="btn btn-warning"
                                                            style="margin-left: 10px;margin-top: 10px;"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="tf-icons bx bx-pencil" title="Edit Data"
                                                                 style="margin-right: 10px;"></i> Edit
                                                            Fit work
                                                       </button>

                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>

                              <!-- FIT WORK -->
                              <div class="col-md-6">
                                   <div class="nav-align-top mb-4">
                                        <ul class="nav nav-tabs nav-fill" role="tablist">
                                             <li class="nav-item">
                                                  <button type="button" class="nav-link active" role="tab"
                                                       data-bs-toggle="tab" data-bs-target="#navs-justified-home"
                                                       aria-controls="navs-justified-home" aria-selected="true">
                                                       <i class="tf-icons bx bx-user me-1"></i><span
                                                            class="d-none d-sm-block"> Seragam</span>
                                                       <span
                                                            class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">7
                                                       </span>
                                                  </button>
                                             </li>
                                             <li class="nav-item">
                                                  <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                       data-bs-target="#navs-justified-profile"
                                                       aria-controls="navs-justified-profile" aria-selected="false">
                                                       <i class="tf-icons bx bx-book me-1"></i><span
                                                            class="d-none d-sm-block"> Surat</span>
                                                       <span
                                                            class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">4
                                                       </span>
                                                  </button>
                                             </li>
                                        </ul>
                                        <div class="tab-content">
                                             <div class="tab-pane fade show active" id="navs-justified-home"
                                                  role="tabpanel">
                                                  <!-- KELENGKAPAN SERAGAM -->
                                                  <label class="col-sm-8 col-form-label"><strong>A. Kelengkapan
                                                            Seragam</strong></label>
                                                  <div class="table-responsive text-nowrap">
                                                       <table class="table">
                                                            <thead>
                                                                 <tr>
                                                                      <th width="5px;">No</th>
                                                                      <th>Kelengkapan Seragam</th>
                                                                      <th width="5px;">Check</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody class="table-border-bottom-0">
                                                                 <?php
                                                                 $kelengkapanSeragam = [
                                                                      'jas'               => 'Jas',
                                                                      'dasi'              => 'Dasi',
                                                                      'peci'              => 'Peci',
                                                                      'pantofel'          => 'Sepatu Pantofel',
                                                                      'seragam_kerja'     => 'Seragam Sesuai Hari Kerja',
                                                                      'id_card'           => 'ID Card',
                                                                      'kip'               => 'KIP (Kartu Identitas Pramudi)',
                                                                 ];

                                                                 // Urutkan array berdasarkan kodenya
                                                                 ksort($kelengkapanSeragam);
                                                                 $no = 1;

                                                                 foreach ($kelengkapanSeragam as $itemCode => $itemDescription) :
                                                                 ?>
                                                                 <tr>
                                                                      <td><?= $no++ ?></td>
                                                                      <td><?= $itemDescription ?></td>
                                                                      <td>
                                                                           <input type="text"
                                                                                class="badge bg-label-primary me-1"
                                                                                name="<?= $itemCode ?>"
                                                                                value="<?= $userData[$itemCode] ?>"
                                                                                readonly>
                                                                           <span class="badge bg-label-primary me-1"
                                                                                name="<?= $itemCode ?>"
                                                                                value="<?= $userData[$itemCode] ?>">
                                                                                <?= $userData[$itemCode] ?>
                                                                           </span>
                                                                      </td>
                                                                 </tr>
                                                                 <?php endforeach; ?>

                                                            </tbody>
                                                       </table>

                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                                                  <!-- KELENGKAPAN SURAT-SURAT -->
                                                  <label class="col-sm-8 col-form-label"><strong>B. Kelengkapan
                                                            Surat</strong></label>
                                                  <div class="table-responsive text-nowrap">
                                                       <table class="table">
                                                            <thead>
                                                                 <tr>
                                                                      <th width="5px;">No</th>
                                                                      <th>Kelengkapan Surat</th>
                                                                      <th width="5px;">Check</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody class="table-border-bottom-0">

                                                                 <?php
                                                                      $kelengkapanSurat = [
                                                                           'sim'     => 'SIM',
                                                                           'stnk'    => 'STNK',
                                                                           'kir'     => 'KIR',
                                                                           'kp'      => 'KP',
                                                                      ];

                                                                      // Urutkan array berdasarkan kodenya
                                                                      ksort($kelengkapanSurat);

                                                                      $no = 1; // Inisialisasi variabel $no

                                                                      foreach ($kelengkapanSurat as $itemCode => $itemDescription) :
                                                                 ?>
                                                                 <tr>
                                                                      <td><?= $no++ ?></td>
                                                                      <td><?= $itemDescription ?></td>
                                                                      <td>
                                                                           <input type="text"
                                                                                class="badge bg-label-primary me-1"
                                                                                name="<?= $itemCode ?>"
                                                                                value="<?= $userData[$itemCode] ?>"
                                                                                readonly>
                                                                           <span class="badge bg-label-primary me-1"
                                                                                name="<?= $itemCode ?>"
                                                                                value="<?= $userData[$itemCode] ?>">
                                                                                <?= $userData[$itemCode] ?>
                                                                           </span>
                                                                      </td>
                                                                 </tr>
                                                                 <?php endforeach; ?>

                                                            </tbody>
                                                       </table>

                                                  </div>

                                             </div>

                                        </div>
                                   </div>
                                   <!-- Operasi dan Kesehatan -->
                                   <div class="col-md-12">
                                        <div class="nav-align-top mb-4">
                                             <ul class="nav nav-tabs nav-fill" role="tablist">

                                                  <li class="nav-item">
                                                       <button type="button" class="nav-link" role="tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#navs-justified-messages"
                                                            aria-controls="navs-justified-messages"
                                                            aria-selected="false">
                                                            <i class="tf-icons bx bx-id-card me-1"></i><span
                                                                 class="d-none d-sm-block"> Operasi</span>
                                                            <span
                                                                 class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">4
                                                            </span>
                                                       </button>
                                                  </li>
                                                  <li class="nav-item">
                                                       <button type="button" class="nav-link" role="tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#navs-justified-kesehatan"
                                                            aria-controls="navs-justified-messages"
                                                            aria-selected="false">
                                                            <i class="tf-icons bx bx-shield-plus me-1"></i><span
                                                                 class="d-none d-sm-block"> Kesehatan</span>
                                                            <span
                                                                 class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">2
                                                            </span>
                                                       </button>
                                                  </li>
                                             </ul>
                                             <div class="tab-content">

                                                  <div class="tab-pane fade" id="navs-justified-messages"
                                                       role="tabpanel">
                                                       <!-- KELENGKAPAN OPERASI -->
                                                       <label class="col-sm-8 col-form-label"><strong>C. Kelengkapan
                                                                 Operasi</strong></label>
                                                       <div class="table-responsive text-nowrap">
                                                            <table class="table">
                                                                 <thead>
                                                                      <tr>
                                                                           <th width="5px;">No</th>
                                                                           <th>Kelengkapan Operasi</th>
                                                                           <th width="5px;">Check</th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody class="table-border-bottom-0">

                                                                      <?php
                                                                      $kelengkapanOperasi = [
                                                                           'flazz' => 'Kartu Flazz',
                                                                           'p3k' => 'P3K',
                                                                           'handsanitizer' => 'Handsanitizer',
                                                                           'senter' => 'Senter',
                                                                      ];

                                                                      // Urutkan array berdasarkan kodenya
                                                                      ksort($kelengkapanOperasi);

                                                                      $no = 1; // Inisialisasi variabel $no

                                                                      foreach ($kelengkapanOperasi as $itemCode => $itemDescription) :
                                                                      ?>
                                                                      <tr>
                                                                           <td><?= $no++ ?></td>
                                                                           <td><?= $itemDescription ?></td>
                                                                           <td>
                                                                                <input type="text"
                                                                                     class="badge bg-label-primary me-1"
                                                                                     name="<?= $itemCode ?>"
                                                                                     value="<?= $userData[$itemCode] ?>"
                                                                                     readonly>
                                                                                <span class="badge bg-label-primary me-1"
                                                                                     name="<?= $itemCode ?>"
                                                                                     value="<?= $userData[$itemCode] ?>">
                                                                                     <?= $userData[$itemCode] ?>
                                                                                </span>
                                                                           </td>
                                                                      </tr>
                                                                      <?php endforeach; ?>

                                                                 </tbody>
                                                            </table>

                                                       </div>
                                                  </div>

                                                  <div class="tab-pane fade" id="navs-justified-kesehatan"
                                                       role="tabpanel">
                                                       <!-- DATA KESEHATAN -->
                                                       <label class="col-sm-8 col-form-label"><strong>D. Data
                                                                 Kesehatan</strong></label>
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

                                                                      <?php
                                                                      $dataKesehatan = [
                                                                           'tekanan_darah' => 'Tekanan Darah',
                                                                           'suhu_badan' => 'Suhu Badan',
                                                                      ];

                                                                      // Urutkan array berdasarkan kodenya
                                                                      ksort($dataKesehatan);

                                                                      $no = 1; // Inisialisasi variabel $no

                                                                      foreach ($dataKesehatan as $itemCode => $itemDescription) :
                                                                      ?>
                                                                      <tr>
                                                                           <td><?= $no++ ?></td>
                                                                           <td><?= $itemDescription ?></td>
                                                                           <td>
                                                                                <input type="text"
                                                                                     class="badge bg-label-primary me-1"
                                                                                     name="<?= $itemCode ?>"
                                                                                     value="<?= $userData[$itemCode] ?>"
                                                                                     readonly>
                                                                                <span class="badge bg-label-primary me-1"
                                                                                     name="<?= $itemCode ?>"
                                                                                     value="<?= $userData[$itemCode] ?>">
                                                                                     <?= $userData[$itemCode] ?>
                                                                                </span>
                                                                           </td>
                                                                      </tr>
                                                                      <?php endforeach; ?>

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
</form>

<!-- Popup Modal EDIT Fit to Work -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Fit to Work</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="../controllers/FitworkUpdate.php?id=<?= $userData['id'] ?>" method="POST">
                    <div class="modal-body">
                         <div class="card-body">
                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Hari</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-calendar"></i></span>

                                             <select class="form-select" id="exampleFormControlSelect1"
                                                  aria-label="Default select example" name="hari">
                                                  <option
                                                       <?php echo ($userData['hari'] == 'Senin') ? 'selected' : ''; ?>
                                                       value="Senin">Senin</option>
                                                  <option
                                                       <?php echo ($userData['hari'] == 'Selasa') ? 'selected' : ''; ?>
                                                       value="Selasa">Selasa</option>
                                                  <option <?php echo ($userData['hari'] == 'Rabu') ? 'selected' : ''; ?>
                                                       value="Rabu">Rabu</option>
                                                  <option
                                                       <?php echo ($userData['hari'] == 'Kamis') ? 'selected' : ''; ?>
                                                       value="Kamis">Kamis</option>
                                                  <option
                                                       <?php echo ($userData['hari'] == "Jum'at") ? 'selected' : ''; ?>
                                                       value="Jum'at">Jum'at</option>
                                                  <option
                                                       <?php echo ($userData['hari'] == 'Sabtu') ? 'selected' : ''; ?>
                                                       value="Sabtu">Sabtu</option>
                                                  <option
                                                       <?php echo ($userData['hari'] == 'Minggu') ? 'selected' : ''; ?>
                                                       value="Minggu">Minggu</option>
                                             </select>
                                        </div>

                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-company">Tanggal</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                             <input type="date" class="form-control" name="tanggal"
                                                  value="<?= $userData['tanggal'] ?>" required />
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
                                                  value="<?= $userData['no_body'] ?>" required />
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
                                                  value="<?= $userData['pramudi'] ?>" required />
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
                                                  value="<?= $userData['no_induk'] ?>" required />
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
                                                  value="<?= $userData['jam_masuk'] ?>" required />
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
                                                  value="<?= $userData['jam_keluar'] ?>" value="" />
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
                                                            value="Ya"
                                                            <?php echo ($userData['jas'] == 'Ya') ? 'checked' : ''; ?>
                                                            id="radioYaJas" style="border-color: #000000;">
                                                  </td>

                                                  <td>
                                                       <input class="form-check-input" type="radio" name="jas"
                                                            value="Tidak"
                                                            <?php echo ($userData['jas'] == 'Tidak') ? 'checked' : ''; ?>
                                                            id="radioTidakJas" style="border-color: #000000;">
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
                                                            value="Ya"
                                                            <?php echo ($userData['dasi'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="dasi"
                                                            value="Tidak"
                                                            <?php echo ($userData['dasi'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['peci'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="peci"
                                                            value="Tidak"
                                                            <?php echo ($userData['peci'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['pantofel'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="pantofel"
                                                            value="Tidak"
                                                            <?php echo ($userData['pantofel'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['seragam_kerja'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>

                                                  <td>
                                                       <input class="form-check-input" type="radio" name="seragam_kerja"
                                                            value="Tidak"
                                                            <?php echo ($userData['seragam_kerja'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['id_card'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="id_card"
                                                            value="Tidak"
                                                            <?php echo ($userData['id_card'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['kip'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="kip"
                                                            value="Tidak"
                                                            <?php echo ($userData['kip'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['sim'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="sim"
                                                            value="Tidak"
                                                            <?php echo ($userData['sim'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['stnk'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="stnk"
                                                            value="Tidak"
                                                            <?php echo ($userData['stnk'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['kir'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="kir"
                                                            value="Tidak"
                                                            <?php echo ($userData['kir'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            <?php echo ($userData['kp'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="kp"
                                                            value="Tidak"
                                                            <?php echo ($userData['kp'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['flazz'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="flazz"
                                                            value="Tidak"
                                                            <?php echo ($userData['flazz'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['p3k'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="p3k"
                                                            value="Tidak"
                                                            <?php echo ($userData['p3k'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['handsanitizer'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="handsanitizer"
                                                            value="Tidak"
                                                            <?php echo ($userData['handsanitizer'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            value="Ya"
                                                            <?php echo ($userData['senter'] == 'Ya') ? 'checked' : ''; ?>
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio" name="senter"
                                                            value="Tidak"
                                                            <?php echo ($userData['senter'] == 'Tidak') ? 'checked' : ''; ?>
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
                                                            name="tekanan_darah"
                                                            value="<?= $userData['tekanan_darah'] ?>" required />
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
                                                            name="suhu_badan" value="<?= $userData['suhu_badan'] ?>"
                                                            required />
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

<?php
include('../views/layout/footer.php');
?>