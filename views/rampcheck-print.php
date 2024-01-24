<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Print Fit Work | PT. Mayasari Bakti</title>

     <style>
     @page {
          size: F4;
          margin: 0;
     }

     body {
          text-align: center;
          font-family: Arial, sans-serif;
          margin: 0;
          /* Tambahkan ini untuk menghilangkan margin body */
     }

     h1 {
          font-size: 23px;
          font-weight: bold;
          text-decoration: underline;
          margin: 5px 0;
     }

     p {
          font-size: 15px;
          margin: 5px 0;
     }



     .h4 {
          text-decoration: underline;
          font-style: italic;
     }

     table,
     th,
     td {
          border: 1px solid black;
          border-collapse: collapse;

     }

     /* hr {
          border: 10px;
     } */
     </style>

</head>

<body onload="window.print()">
     <div>
          <!-- <img src="../assets/images/mayasari-icon.png" alt="Logo" style="width: 100px;"> -->
          <span>
               <h1>PT. MAYASARI BAKTI</h1>
               <p><b>PRAMUDI DIVISI BUSWAY</b></p>
               <p>Jl. Raya Bogor Km. 24 No. 71 Jakarta Timur 13750 Telp.(021)8400923, 8400923, Fax.(021)8400562</p>
          </span>
     </div>


     <?php
          include '../database/Database.php';

          $connection = new Database();

          if (isset($_GET['id'])) {
               $id = $_GET['id'];
               $result = $connection->query("SELECT * FROM fit_work WHERE id=$id");

               if ($result) {
                    if ($result->num_rows > 0) {
                         $userData = $result->fetch_assoc(); ?>

     <hr>
     <div style="margin-top: 20px;padding-left: 20px;padding-right: 20px;">
          <table style="width:100%; text-align: left;">
               <tr style="height: 40px;">
                    <td width="150px" style="padding-left: 10px;">No. Body</td>
                    <td width="5px">:</td>
                    <td style="padding-left: 10px;"><?= $userData['no_body'] ?></td>

                    <td width="150px" style="padding-left: 10px;"><b>Km Akhir pada Odometer</b></td>
                    <td width="5px">:</td>
                    <td></td>
               </tr>
               <tr style="height: 40px;">
                    <td width="150px" style="padding-left: 10px;">Pramudi</td>
                    <td width="5px">:</td>
                    <td style="padding-left: 10px;"><?= $userData['pramudi'] ?></td>

                    <td width="200px" style="padding-left: 10px;">
                         <p sty>Tanggal Pemeriksaan</p>
                    </td>
                    <td width="5px">:</td>
                    <td style="padding-left: 10px;"><?= $userData['tanggal'] ?></td>
               </tr>
          </table>

          <h4 style="text-align: left;">A. BAGIAN EKSTERIOR</h4>
          <?php
               include '../controllers/Rampcheck.php';             
               $connection = new Rampcheck();
               $hasil = $connection->getRampcheckEksterior();
          
               $no = 1;
          
          ?>
          <table style="width:100%; text-align: left;margin-top: 20px;">
               <thead>
                    <tr style="text-align: center;">
                         <th scope="col">NO</th>
                         <th scope="col">HAL YANG DIPERIKSA (ITEM)</th>
                         <th scope="col">KONDISI</th>
                         <th scope="col">GAMBAR</th>
                         <th scope="col">KETERANGAN</th>
                    </tr>
               </thead>
               <tbody>
                    <?php if (empty($hasil)): ?>
                    <tr>
                         <td colspan="5" style="text-align: center;">Tidak Ada Data</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($hasil as $userData): ?>
                    <tr>
                         <td style="padding-left: 10px;"><?= $no++ ?></td>
                         <td style="padding-left: 10px;"><?= $userData['item'] ?></td>
                         <td style="padding-left: 10px;"><?= $userData['kondisi'] ?></td>
                         <td>
                              <center>
                                   <?php if (!empty($userData['gambar'])): ?>
                                   <img src="../uploads/<?= $userData['kategori'] ?>/<?= $userData['gambar'] ?>"
                                        alt="Gambar Rampcheck" width="100">
                                   <?php else: ?>
                                   None
                                   <?php endif; ?>
                              </center>
                         </td>
                         <td style="padding-left: 10px;"><?= $userData['keterangan'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>

               </tbody>
          </table>

          <h4 style="text-align: left;">B. BAGIAN INTERIOR</h4>
          <?php            
               $connection = new Rampcheck();
               $hasil = $connection->getRampcheckInterior();
          
               $no = 1;
          
          ?>
          <table style="width:100%; text-align: left;margin-top: 20px;">
               <thead>
                    <tr style="text-align: center;">
                         <th scope="col">NO</th>
                         <th scope="col">HAL YANG DIPERIKSA (ITEM)</th>
                         <th scope="col">KONDISI</th>
                         <th scope="col">GAMBAR</th>
                         <th scope="col">KETERANGAN</th>
                    </tr>
               </thead>
               <tbody>
                    <?php if (empty($hasil)): ?>
                    <tr>
                         <td colspan="5" style="text-align: center;">Tidak Ada Data</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($hasil as $userData): ?>
                    <tr>
                         <td style="padding-left: 10px;"><?= $no++ ?></td>
                         <td style="padding-left: 10px;"><?= $userData['item'] ?></td>
                         <td style="padding-left: 10px;"><?= $userData['kondisi'] ?></td>
                         <td>
                              <center>
                                   <?php if (!empty($userData['gambar'])): ?>
                                   <img src="../uploads/<?= $userData['kategori'] ?>/<?= $userData['gambar'] ?>"
                                        alt="Gambar Rampcheck" width="100">
                                   <?php else: ?>
                                   None
                                   <?php endif; ?>
                              </center>
                         </td>
                         <td style="padding-left: 10px;"><?= $userData['keterangan'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>

               </tbody>
          </table>
          <!-- <table style="margin-top: 20px;">
               <tr>
                    <th width="150px;">HARI</th>
                    <td width="5px">:</td>
                    <td><?= $userData['hari'] ?></td>
               </tr>
               <tr>
                    <th width="150px;">TANGGAL</th>
                    <td width="5px">:</td>
                    <td><?= $userData['tanggal'] ?></td>
               </tr>
               <tr>
                    <th width="150px;">NO BODY</th>
                    <td width="5px">:</td>
                    <td><?= $userData['no_body'] ?></td>
               </tr>
               <tr>
                    <th width="150px;">PRAMUDI</th>
                    <td width="5px">:</td>
                    <td><?= $userData['pramudi'] ?></td>
               </tr>
               <tr>
                    <th width="150px;">NO INDUK</th>
                    <td width="5px">:</td>
                    <td><?= $userData['no_induk'] ?></td>
               </tr>
               <tr>
                    <th width="150px;">JAM MASUK</th>
                    <td width="5px">:</td>
                    <td><?= $userData['jam_masuk'] ?></td>
               </tr>
               <tr>
                    <th width="150px;">JAM KELUAR</th>
                    <td width="5px">:</td>
                    <td><?= $userData['jam_keluar'] ?></td>
               </tr>
          </table> -->
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
</body>

</html>