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
                    <h5 class="py-2 mb-2"><span class="text-muted fw-light">App / Data Users /</span> Update User</h5>
                    <div class="card">
                         <?php
                              include '../database/Database.php';

                              $connection = new Database();

                              if (isset($_GET['id'])) {
                              $id = $_GET['id'];
                              $result = $connection->query("SELECT * FROM users WHERE id=$id");

                              if ($result) {
                                   if ($result->num_rows > 0) {
                                        $userData = $result->fetch_assoc(); ?>

                         <form action="../controllers/UpdateUser.php?id=<?= $userData['id']; ?>" method="POST">
                              <div class="modal-body">
                                   <div class="card-body">

                                        <div class="row mb-3">
                                             <label class="col-sm-2 col-form-label"
                                                  for="basic-icon-default-fullname">Nama
                                                  Lengkap</label>
                                             <div class="col-sm-10">
                                                  <div class="input-group input-group-merge">
                                                       <span id="basic-icon-default-fullname2"
                                                            class="input-group-text"><i class="bx bx-user"></i></span>
                                                       <input type="text" class="form-control" name="full_name"
                                                            value="<?= $userData['full_name'] ?>" />
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row mb-3">
                                             <label class="col-sm-2 col-form-label"
                                                  for="basic-icon-default-company">Username</label>
                                             <div class="col-sm-10">
                                                  <div class="input-group input-group-merge">
                                                       <span id="basic-icon-default-company2"
                                                            class="input-group-text"><i
                                                                 class="bx bx-buildings"></i></span>
                                                       <input type="text" class="form-control" name="username"
                                                            value="<?= $userData['username'] ?>" readonly />
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row mb-3">
                                             <label class="col-sm-2 col-form-label"
                                                  for="basic-icon-default-email">Email</label>
                                             <div class="col-sm-10">
                                                  <div class="input-group input-group-merge">
                                                       <span class="input-group-text"><i
                                                                 class="bx bx-envelope"></i></span>
                                                       <input type="text" class="form-control" name="email"
                                                            value="<?= $userData['email'] ?>" />
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="row mb-3">
                                             <label class="col-sm-2 col-form-label"
                                                  for="basic-icon-default-email">Status</label>
                                             <div class="col-sm-10">
                                                  <div class="input-group input-group-merge">
                                                       <span class="input-group-text"><i class="bx bx-check"></i></span>
                                                       <!-- Replace the text input with a select element -->
                                                       <select class="form-select" name="status">
                                                            <option value="Active"
                                                                 <?php if ($userData['status'] == 'Active') echo 'selected'; ?>>
                                                                 Active</option>
                                                            <option value="Nonaktif"
                                                                 <?php if ($userData['status'] == 'Nonaktif') echo 'selected'; ?>>
                                                                 Nonaktif</option>
                                                       </select>
                                                  </div>
                                             </div>
                                        </div>



                                   </div>
                              </div>

                              <div class="modal-footer">
                                   <a href="../views/user-data.php">
                                        <button type="button" class="btn btn-secondary"
                                             data-bs-dismiss="modal">Back</button>
                                   </a>
                                   <button style="margin-left: 10px;" type="submit"
                                        class="btn btn-primary">Save</button>
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
</div>

<?php
include('../views/layout/footer.php');
?>