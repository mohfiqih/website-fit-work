<?php

include('../views/layout/header.php');

// if (isset($_SESSION['success_update'])) {
//      echo '<script>alert("' . $_SESSION['success_update'] . '");</script>';
//      unset($_SESSION['success_update']);
// }
?>

<div class="content-wrapper">
     <div class="row">
          <div class="content-wrapper">
               <div class="container-xxl flex-grow-1 container-p-y">
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App / Fit to Work / Detail /</span>
                         Rampcheck</h5>

                    <?php
                         include '../database/Database.php';

                         $connection = new Database();

                         $id = $_GET['id'];

                         if (isset($_GET['id_ramp'])) {
                         $id_ramp = $_GET['id_ramp'];
                         $result = $connection->query("SELECT * FROM rampcheck2 WHERE id_ramp=$id_ramp");

                         if ($result) {
                              if ($result->num_rows > 0) {
                              $userData = $result->fetch_assoc(); 
                    ?>

                    <form action="../controllers/RampcheckUpdate.php?id=<?= $userData['id_fit'] ?>&&id_ramp=<?= $userData['id_ramp'] ?>"
                         method="POST">
                         <div class="card">
                              <div class="card-body">
                                   <input type="text" class="form-control" name="id_ramp"
                                        value="<?= $userData['id_ramp'] ?>" hidden />
                                   <input type="text" class="form-control" name="id_fit"
                                        value="<?= $userData['id_fit'] ?>" hidden />

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-company">Item</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-book"></i></span>
                                                  <input type="text" class="form-control" name="item"
                                                       value="<?= $userData['item'] ?>" />
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-email">Bagian</label>
                                        <div class="col-sm-10">
                                             <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><i class="bx bx-car"></i></span>
                                                  <select class="form-select" name="kategori">
                                                       <option>Pilih Eksterior / Interior</option>
                                                       <option value="Eksterior"
                                                            <?php echo ($userData['kategori'] == 'Eksterior') ? 'selected' : ''; ?>>
                                                            Eksterior
                                                       </option>
                                                       <option value="Interior"
                                                            <?php echo ($userData['kategori'] == 'Interior') ? 'selected' : ''; ?>>
                                                            Interior
                                                       </option>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label"
                                             for="basic-icon-default-company">Kondisi</label>
                                        <div class="col-sm-10">
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="kondisi"
                                                       id="sesuai" value="Sesuai"
                                                       <?php echo ($userData['kondisi'] == 'Sesuai') ? 'checked' : ''; ?>
                                                       required>
                                                  <label class="form-check-label" for="sesuai">Sesuai</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="kondisi"
                                                       id="tidak_sesuai" value="Tidak Sesuai"
                                                       <?php echo ($userData['kondisi'] == 'Tidak Sesuai') ? 'checked' : ''; ?>>
                                                  <label class="form-check-label" for="tidak_sesuai">Tidak
                                                       Sesuai</label>
                                             </div>
                                        </div>
                                   </div>

                                   <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                                        <div class="col-sm-10">
                                             <input type="text" class="form-control" name="gambar[]"
                                                  value="<?php echo $userData['gambar']; ?>" accept="image/*" multiple
                                                  readonly />
                                             <div class="input-group input-group-merge" style="margin-top: 10px;">
                                                  <span class="input-group-text"><i class="bx bx-image"></i></span>
                                                  <input type="file" class="form-control" name="gambar[]"
                                                       accept="image/*" multiple
                                                       value="<?php echo $userData['gambar']; ?>" />
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
                                                       name="keterangan"><?php echo $userData['keterangan']; ?></textarea>
                                             </div>
                                        </div>
                                   </div>

                              </div>
                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        onclick="window.location.href='../views/rampcheck-add.php?id=<?= $userData['id_fit'] ?>';">Kembali</button>
                                   <button type="submit" class="btn btn-primary"
                                        style="margin-left: 10px;">Save</button>
                              </div>
                         </div>

                    </form>

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
               </div>
          </div>
     </div>
</div>

<?php
include('../views/layout/footer.php');
?>