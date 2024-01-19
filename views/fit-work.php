<?php
include('../views/layout/header.php');
?>

<div class="content-wrapper">
     <div class="row">
          <div class="content-wrapper">
               <div class="container-xxl flex-grow-1 container-p-y">
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App /</span> Fit to Work</h5>
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
                                                  Print
                                             </button>
                                             <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                  <a class="dropdown-item" href="javascript:void(0);">Print to PDF</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <br />

                         <div class="table-responsive text-nowrap">
                              <table class="table">
                                   <thead>
                                        <tr>
                                             <th>No</th>
                                             <th>Pramudi</th>
                                             <th>No Induk</th>
                                             <th>Hari</th>
                                             <th>Tanggal</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                                   <tbody class="table-border-bottom-0">
                                        <tr>
                                             <td>

                                             </td>
                                             <td>
                                                  <span class="fw-medium"></span>
                                             </td>
                                             <td></td>
                                             <td>

                                             </td>
                                             <td><span class="badge bg-label-primary me-1"></span></td>
                                             <td>
                                                  <div class="dropdown">
                                                       <div class="col-md-6 col-lg-4">
                                                            <button type="button" class="btn btn-icon btn-primary"
                                                                 style="height: 30px;">
                                                                 <span class="tf-icons bx bx-detail"
                                                                      title="Detail"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-success"
                                                                 style="height: 30px;">
                                                                 <span class="tf-icons bx bx-printer"
                                                                      title="Print"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-warning"
                                                                 style="height: 30px;">
                                                                 <span class="tf-icons bx bx-pencil"
                                                                      title="Edit"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-icon btn-danger"
                                                                 style="height: 30px;">
                                                                 <span class="tf-icons bx bx-trash"
                                                                      title="Hapus"></span>
                                                            </button>
                                                       </div>
                                                  </div>
                                             </td>
                                        </tr>
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
               <form action="#" method="POST">
                    <div class="modal-body">
                         <div class="card-body">
                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Hari</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                             <input type="text" class="form-control" name="" placeholder="Masukan Hari"
                                                  required />
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-3">
                                   <label class="col-sm-2 col-form-label"
                                        for="basic-icon-default-company">Tanggal</label>
                                   <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                             <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                             <input type="date" class="form-control" name=""
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
                                                       class="bx bx-buildings"></i></span>
                                             <input type="text" class="form-control" name=""
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
                                             <input type="text" class="form-control" name=""
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
                                                       class="bx bx-buildings"></i></span>
                                             <input type="text" class="form-control" name=""
                                                  placeholder="Masukan No Induk" required />
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
                                                       <input class="form-check-input" type="checkbox" name="jas"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>

                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="jas"
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
                                                       <input class="form-check-input" type="checkbox" name="dasi"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="dasi"
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
                                                       <input class="form-check-input" type="checkbox" name="peci"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="peci"
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
                                                       <input class="form-check-input" type="checkbox" name="pantofel"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="pantofel"
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
                                                       <input class="form-check-input" type="checkbox"
                                                            name="seragam_kerja" value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>

                                                  <td>
                                                       <input class="form-check-input" type="checkbox"
                                                            name="seragam_kerja" value="Tidak" id="defaultCheck1"
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
                                                       <input class="form-check-input" type="checkbox" name="id_card"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="id_card"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       7.
                                                  </td>
                                                  <td>
                                                       KTP (Kartu Tanda Penduduk)
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="ktp"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="ktp"
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
                                                       <input class="form-check-input" type="checkbox" name="sim"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="sim"
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
                                                       <input class="form-check-input" type="checkbox" name="stnk"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="stnk"
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
                                                       <input class="form-check-input" type="checkbox" name="kir"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="kir"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                             </tr>
                                             <tr>
                                                  <td>
                                                       4.
                                                  </td>
                                                  <td>
                                                       KTP (Kartu Tanda Penduduk)
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="kp"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="kp"
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
                                                       <input class="form-check-input" type="checkbox" name="flazz"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="flazz"
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
                                                       <input class="form-check-input" type="checkbox" name="p3k"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="p3k"
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
                                                       <input class="form-check-input" type="checkbox"
                                                            name="handsanitizer" value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox"
                                                            name="handsanitizer" value="Tidak" id="defaultCheck1"
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
                                                       <input class="form-check-input" type="checkbox" name="senter"
                                                            value="Ya" id="defaultCheck1"
                                                            style="border-color: #000000;">
                                                  </td>
                                                  <td>
                                                       <input class="form-check-input" type="checkbox" name="senter"
                                                            value="Tidak" id="defaultCheck1"
                                                            style="border-color: #000000;">
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
include('../views/layout/footer.php');
?>