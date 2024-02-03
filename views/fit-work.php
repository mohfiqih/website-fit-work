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
                                                       style="margin-right: 10px;"></i> Export Full
                                             </button>
                                             <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                  <a class="dropdown-item" href="../views/print-full-fitwork.php">
                                                       <i class="tf-icons bx bx-book" title="Print"
                                                            style="margin-right: 10px;"></i> PDF</a>
                                                  <a class="dropdown-item" href="../views/excel-fitwork.php">
                                                       <i class="tf-icons bx bx-printer" title="Print"
                                                            style="margin-right: 10px;"></i> Excel</a>
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
                                                                 <!-- <a
                                                                      href="../views/rampcheck-add.php?id=<?= $userData['id'] ?>">
                                                                      <button type="button"
                                                                           class="btn btn-icon btn-primary"
                                                                           style="height: 30px;">
                                                                           <span class="tf-icons bx bx-zoom-in"
                                                                                title="Detail"></span>
                                                                      </button>
                                                                 </a> -->
                                                                 <a
                                                                      href="../views/fit-work-detail.php?id=<?= $userData['id'] ?>">
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
                                                                 <!-- <a
                                                                      href="../views/fit-work-print.php?id=<?= $userData['id'] ?>">
                                                                      <button type="button"
                                                                           class="btn btn-icon btn-success"
                                                                           style="height: 30px;">
                                                                           <span class="tf-icons bx bx-printer"
                                                                                title="Print"></span>
                                                                      </button>
                                                                 </a> -->


                                                            </div>
                                                            <div style="margin-top: 10px;">
                                                                 <div class="btn-group" role="group">
                                                                      <button id="btnGroupDrop1" type="button"
                                                                           class="btn dropdown-toggle"
                                                                           data-bs-toggle="dropdown"
                                                                           aria-haspopup="true" aria-expanded="false"
                                                                           style="background-color: #31374C;color: white;">
                                                                           <i class="tf-icons bx bx-printer"
                                                                                title="Print"
                                                                                style="margin-right: 10px;"></i>
                                                                      </button>
                                                                      <div class="dropdown-menu"
                                                                           aria-labelledby="btnGroupDrop1">
                                                                           <a class="dropdown-item"
                                                                                href="../views/fit-work-print.php?id=<?= $userData['id'] ?>">
                                                                                <i class="tf-icons bx bx-book"
                                                                                     title="Print"
                                                                                     style="margin-right: 10px;"></i>
                                                                                PDF</a>
                                                                           <a class="dropdown-item"
                                                                                href="../views/excel-fit-rampcheck.php?id=<?= $userData['id'] ?>">
                                                                                <i class="tf-icons bx bx-printer"
                                                                                     title="Print"
                                                                                     style="margin-right: 10px;"></i>
                                                                                Excel</a>
                                                                      </div>
                                                                 </div>
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
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Depo</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-building"></i></span>
                                             <select class="form-select" id="exampleFormControlSelect1"
                                                  aria-label="Default select example" name="depo">
                                                  <option selected>Pilih Depo</option>
                                                  <option value="Depo Cijantung">Depo Cijantung</option>
                                                  <option value="Depo Cibubur (Bus Listrik) ">Depo Cibubur
                                                       (Bus Listrik)</option>
                                                  <option value="Depo Klender (Bus Gandeng)">Depo
                                                       Klender (Bus Gandeng)</option>
                                             </select>
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

                                             <?php
                                             $kelengkapanSeragam = [
                                                  'Jas',
                                                  'Dasi',
                                                  'Peci',
                                                  'Sepatu Pantofel',
                                                  'Seragam Sesuai Hari Kerja',
                                                  'ID Card',
                                                  'KIP (Kartu Identitas Pramudi)',
                                             ];

                                             // Urutkan array berdasarkan nomor urut
                                             sort($kelengkapanSeragam);

                                             $no = 1; // Inisialisasi variabel $no

                                             foreach ($kelengkapanSeragam as $itemDescription) :
                                             ?>
                                             <tr>
                                                  <td><?= $no++ ?></td>
                                                  <td><?= $itemDescription ?></td>
                                                  <td>
                                                       <input class="form-check-input" type="radio"
                                                            name="<?= strtolower(str_replace(' ', '_', $itemDescription)) ?>"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio"
                                                            name="<?= strtolower(str_replace(' ', '_', $itemDescription)) ?>"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <?php endforeach; ?>

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

                                             <?php
                                             $kelengkapanSurat = [
                                                  'SIM',
                                                  'STNK',
                                                  'KIR',
                                                  'KP',
                                             ];

                                             // Urutkan array berdasarkan nomor urut
                                             sort($kelengkapanSurat);

                                             $no = 1; // Inisialisasi variabel $no

                                             foreach ($kelengkapanSurat as $itemDescription) :
                                             ?>
                                             <tr>
                                                  <td><?= $no++ ?></td>
                                                  <td><?= $itemDescription ?></td>
                                                  <td>
                                                       <input class="form-check-input" type="radio"
                                                            name="<?= strtolower(str_replace(' ', '_', $itemDescription)) ?>"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio"
                                                            name="<?= strtolower(str_replace(' ', '_', $itemDescription)) ?>"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <?php endforeach; ?>

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

                                             <?php
                                             $kelengkapanOperasi = [
                                                  'Kartu Flazz',
                                                  'P3K',
                                                  'Handsanitizer',
                                                  'Senter',
                                             ];

                                             // Urutkan array berdasarkan nomor urut
                                             sort($kelengkapanOperasi);

                                             $no = 1; // Inisialisasi variabel $no

                                             foreach ($kelengkapanOperasi as $itemDescription) :
                                             ?>
                                             <tr>
                                                  <td><?= $no++ ?></td>
                                                  <td><?= $itemDescription ?></td>
                                                  <td>
                                                       <input class="form-check-input" type="radio"
                                                            name="<?= strtolower(str_replace(' ', '_', $itemDescription)) ?>"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="radio"
                                                            name="<?= strtolower(str_replace(' ', '_', $itemDescription)) ?>"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <?php endforeach; ?>

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

                                             <?php
                                             $dataKesehatan = [
                                                  'Tekanan Darah',
                                                  'Suhu Badan',
                                             ];

                                             // Urutkan array berdasarkan nomor urut
                                             sort($dataKesehatan);

                                             $no = 1; // Inisialisasi variabel $no

                                             foreach ($dataKesehatan as $itemDescription) :
                                             ?>
                                             <tr>
                                                  <td><?= $no++ ?></td>
                                                  <td><?= $itemDescription ?></td>
                                                  <td>
                                                       <input style="width: 150px;" type="text" class="form-control"
                                                            name="<?= strtolower(str_replace(' ', '_', $itemDescription)) ?>"
                                                            placeholder="<?= $itemDescription ?>" required />
                                                  </td>
                                             </tr>
                                             <?php endforeach; ?>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
<script>
function exportToExcel() {
     const table = document.getElementById('data-table');
     const ws = XLSX.utils.table_to_sheet(table);
     const wb = XLSX.utils.book_new();
     XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

     const wbout = XLSX.write(wb, {
          bookType: 'xlsx',
          type: 'blob',
          mimeType: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
     });

     const fileName = 'export-fitwork.xlsx';
     saveAs(new Blob([wbout], {
          type: 'application/octet-stream'
     }), fileName);
}

function saveAs(blob, fileName) {
     const link = document.createElement('a');
     link.href = URL.createObjectURL(blob);
     link.download = fileName;
     document.body.appendChild(link);
     link.click();
     document.body.removeChild(link);
}
</script>

<?php
include('../views/layout/footer.php');
?>