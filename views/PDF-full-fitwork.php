<?php
          include '../database/Database.php';

          $connection = new Database();
          $result = $connection->query("SELECT * FROM fit_work");
     ?>

<?php foreach ($result as $userData) { ?>

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
                    <th width="150px;">DEPO</th>
                    <td width="5px">:</td>
                    <td><?= $userData['depo'] ?></td>
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


</body>

</html>
<?php } ?>