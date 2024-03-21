<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Fitwork.xls");
?>

<div class="card">
     <h1>Export Excel Data Fit Work</h1><br />
     <div class="table-responsive text-nowrap">
          <table class="table" id="example" style="padding: 20px;">
               <thead>
                    <tr>
                         <th>No</th>
                         <th>Hari</th>
                         <th>Tanggal</th>
                         <th>No Body</th>
                         <th>No Polisi</th>
                         <th>Start Lokasi</th>
                         <th>Koridor</th>
                         <th>Shift</th>
                         <th>Pramudi</th>
                         <th>Depo</th>
                         <th>No Induk</th>
                         <th>Masuk</th>
                         <th>Keluar</th>
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
                              <?= $userData['no_polisi'] ?>
                         </td>
                         <td>
                              <?= $userData['lokasi_start'] ?>
                         </td>
                         <td>
                              <?= $userData['koridor'] ?>
                         </td>
                         <td>
                              <?= $userData['shift'] ?>
                         </td>
                         <td>
                              <?= $userData['pramudi'] ?>
                         </td>
                         <td>
                              <?= $userData['depo'] ?>
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
                    </tr>
                    <?php } ?>
               </tbody>
          </table>
     </div>
</div>

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