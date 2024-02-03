<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Users.xls");
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Export Data User | PT. Mayasari Bakti</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

     <style>
     @page {
          size: landscape;
          margin: 0;
     }

     body {
          text-align: center;
          font-family: Arial, sans-serif;
          margin: 0;
     }

     h1 {
          font-size: 23px;
          font-weight: bold;
          text-decoration: underline;
          margin: 5px 0;
     }

     h2 {
          font-size: 15px;
          margin: 5px 0;
     }

     table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 20px;
     }

     .h4 {
          text-decoration: underline;
          font-style: italic;
     }

     th,
     td {
          border: none;
          text-align: left;
          font-size: 15px;
     }
     </style>

</head>

<body onload="window.print()">
     <br />
     <h1>PT. MAYASARI BAKTI</h1>
     <h2>DATA USER ADMIN | WEBSITE FIT WORK</h2>

     <?php
    include '../controllers/User.php';

    $connection = new User();
    $hasil = $connection->getUserData();

    $no = 1;

    ?>
     <div class="content-wrapper" style="margin-top: 20px;">
          <div class="row">
               <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                         <div class="card">
                              <div class="table-responsive text-nowrap" style="margin-left: 30px;">
                                   <table class="table">
                                        <thead>
                                             <tr>
                                                  <th>No</th>
                                                  <!-- <th>Foto</th> -->
                                                  <th>Nama</th>
                                                  <th>Username</th>
                                                  <th>Email</th>
                                                  <th>Status</th>
                                                  <th>Tanggal</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php foreach ($hasil as $userData) { ?>
                                             <tr>
                                                  <td>
                                                       <?php echo $no++; ?>
                                                  </td>
                                                  <!-- <td>
                                                       <div class="row mb-3" style="width: 100px;">
                                                            <?php if (!empty($userData['gambar'])): ?>
                                                            <img src="../uploads/profil/<?= $userData['gambar'] ?>"
                                                                 alt="Foto Profil" width="50px">
                                                            <?php else: ?>
                                                            <center>
                                                                 <div class="card"
                                                                      style="border-radius: 5px;border-color: black;height: 100px;">
                                                                      <p style="margin-top: 40px;">None</p>
                                                                 </div>
                                                            </center>
                                                            <?php endif; ?>
                                                       </div>
                                                  </td> -->
                                                  <td>
                                                       <?= $userData['full_name'] ?>
                                                  </td>
                                                  <td>
                                                       <?= $userData['username'] ?>
                                                  </td>
                                                  <td>
                                                       <?= $userData['email'] ?>
                                                  </td>
                                                  <td>
                                                       <?= $userData['status'] ?>
                                                  </td>
                                                  <td>
                                                       <?= $userData['timestamp'] ?>
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

</body>

</html>