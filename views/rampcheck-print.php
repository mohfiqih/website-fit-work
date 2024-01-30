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

     .health-data,
     tr {
          margin-top: 5px;
          text-align: left;
     }

     .health-data h4 {
          margin: 5px 0;
     }

     .health-data table {
          margin-left: 10px;
     }

     .health-data td {
          padding: 5px;
     }

     @page {
          size: F4;
          margin: 0;
     }
     </style>

</head>

<body onload="window.print()">
     <br />
     <h1>PT. MAYASARI BAKTI</h1>
     <h2>LEMBAR PEMERIKSAAN SEBELUM OPERASI (LSPS0)</h2>
     <h2>PRAMUDI DIVISI BUSWAY</h2>

     <?php
          include '../database/Database.php';

          $connection = new Database();

          if (isset($_GET['id'])) {
               $id = $_GET['id'];
               $result = $connection->query("SELECT * FROM fit_work WHERE id=$id");

               if ($result) {
                    if ($result->num_rows > 0) {
                         $userData = $result->fetch_assoc(); ?>

     <div style="margin-left: 100px;">
          <table style="margin-top: 20px;">
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
          </table>
          <br />
          <div style="margin-left: 30px;">
               <div class="health-data">
                    <h4>A. <span style="text-decoration: underline; font-style: italic; margin-left: 20px;">KELENGKAPAN
                              SERAGAM
                         </span></h4>
                    <table style="margin-left: 30px;">
                         <tr>
                              <td width="500px;">- JAS</td>
                              <td><?= $userData['jas'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- DASI</td>
                              <td><?= $userData['dasi'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- PECI</td>
                              <td><?= $userData['peci'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- SEPATU PANTOFEL</td>
                              <td><?= $userData['pantofel'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- SERAGAM SESUAI HARI KERJA</td>
                              <td><?= $userData['seragam_kerja'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- ID CARD</td>
                              <td><?= $userData['id_card'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- KIP (KARTU IDENTITAS PRAMUDI)</td>
                              <td><?= $userData['kip'] ?></td>
                         </tr>
                    </table>
               </div>
               <br />
               <div class="health-data">
                    <h4>B. <span style="text-decoration: underline; font-style: italic; margin-left: 20px;">KELENGKAPAN
                              SURAT-SURAT
                         </span></h4>
                    <table style="margin-left: 30px;">
                         <tr>
                              <td width="500px;">- SIM</td>
                              <td><?= $userData['sim'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- STNK</td>
                              <td><?= $userData['stnk'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- KIR</td>
                              <td><?= $userData['kir'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- KP</td>
                              <td><?= $userData['kp'] ?></td>
                         </tr>
                    </table>
               </div>
               <br />
               <div class="health-data">
                    <h4>C. <span style="text-decoration: underline; font-style: italic; margin-left: 20px;">KELENGKAPAN
                              OPERASI
                         </span></h4>
                    <table style="margin-left: 30px;">
                         <tr>
                              <td width="500px;">- KARTU FLAZZ</td>
                              <td><?= $userData['flazz'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- P3K</td>
                              <td><?= $userData['p3k'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- HANDSANITIZER</td>
                              <td><?= $userData['handsanitizer'] ?></td>
                         </tr>
                         <tr>
                              <td width="500px;">- SENTER</td>
                              <td><?= $userData['senter'] ?></td>
                         </tr>
                    </table>
               </div>
               </br>
               <div class="health-data">
                    <h4>D. <span style="text-decoration: underline; font-style: italic; margin-left: 20px;">DATA
                              KESEHATAN
                         </span></h4>
                    <table style="margin-left: 30px;">
                         <tr>
                              <td width="500px;">- TEKANAN DARAH</td>
                              <th><?= $userData['tekanan_darah'] ?></th>
                         </tr>
                         <tr>
                              <td width="500px;">- SUHU BADAN</td>
                              <th><?= $userData['suhu_badan'] ?> &#8451;</th>
                         </tr>
                    </table>
               </div>
          </div>

          <div style="margin-top: 60px;margin-left: 30px;">
               <table>
                    <tr>
                         <td>(.....................................................)</td>
                         <td>(.....................................................)</td>
                    </tr>
                    <tr>
                         <td style="padding-left: 85px;">PETUGAS</td>
                         <td style="padding-left: 85px;">PRAMUDI</td>
                    </tr>
               </table>
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


     <div style="margin-top: 100px;">
          <span>
               <h1>PT. MAYASARI BAKTI</h1>
               <p><b>PRAMUDI DIVISI BUSWAY</b></p>
               <p>Jl. Raya Bogor Km. 24 No. 71 Jakarta Timur 13750 Telp.(021)8400923, 8400923, Fax.(021)8400562</p>
          </span>
     </div>


     <?php

          if (isset($_GET['id'])) {
               $id = $_GET['id'];
               $result = $connection->query("SELECT * FROM fit_work WHERE id=$id");

               if ($result) {
                    if ($result->num_rows > 0) {
                         $userData = $result->fetch_assoc(); ?>

     <hr>
     <div style="margin-top: 20px;padding-left: 20px;padding-right: 20px;">
          <table style="width:100%; text-align: left;">
               <tr>
                    <td width="150px" style="padding-left: 10px;">No. Body</td>
                    <td width="5px">:</td>
                    <td style="padding-left: 10px;"><?= $userData['no_body'] ?></td>

                    <td width="150px" style="padding-left: 10px;"><b>Km Akhir pada Odometer</b></td>
                    <td width="5px">:</td>
                    <td></td>
               </tr>
               <tr>
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
          <table style="width:100%; text-align: left;margin-top: 20px;   border: 1px solid black;
          border-collapse: collapse;">
               <thead>
                    <tr style="text-align: center;">
                         <th scope="col">NO</th>
                         <th scope="col">HAL YANG DIPERIKSA (ITEM)</th>
                         <th scope="col">KONDISI</th>
                         <th scope="col" style="text-align: center;">GAMBAR</th>
                         <th scope="col">KETERANGAN</th>
                    </tr>
               </thead>
               <tbody style="text-align: left;">
                    <?php if (empty($hasil)): ?>
                    <tr>
                         <td colspan="5" style="text-align: left;">Tidak Ada Data</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($hasil as $userData): ?>
                    <tr>
                         <td><?= $no++ ?></td>
                         <td><?= $userData['item'] ?></td>
                         <td><?= $userData['kondisi'] ?></td>
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
                         <td><?= $userData['keterangan'] ?></td>
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
          <table style="width:100%; text-align: left;margin-top: 20px;   border: 1px solid black;
          border-collapse: collapse;">
               <thead>
                    <tr style="text-align: center;">
                         <th scope="col">NO</th>
                         <th scope="col">HAL YANG DIPERIKSA (ITEM)</th>
                         <th scope="col">KONDISI</th>
                         <th scope="col" style="text-align: center;">GAMBAR</th>
                         <th scope="col">KETERANGAN</th>
                    </tr>
               </thead>
               <tbody style="text-align: left;">
                    <?php if (empty($hasil)): ?>
                    <tr>
                         <td colspan="5" style="text-align: left;">Tidak Ada Data</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($hasil as $userData): ?>
                    <tr>
                         <td><?= $no++ ?></td>
                         <td><?= $userData['item'] ?></td>
                         <td><?= $userData['kondisi'] ?></td>
                         <td>
                              <center>
                                   <?php if (!empty($userData['gambar'])): ?>
                                   <img src="../uploads/<?= $userData['kategori'] ?>/<?= $userData['gambar'] ?>"
                                        alt="Gambar Rampcheck" width="70">
                                   <?php else: ?>
                                   None
                                   <?php endif; ?>
                              </center>
                         </td>
                         <td><?= $userData['keterangan'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>

               </tbody>
          </table>
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