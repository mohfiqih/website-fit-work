<?php
session_start();
include('../database/Database.php');

$connection = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        'hari'           => $_POST['hari'],
        'tanggal'        => $_POST['tanggal'],
        'no_body'        => $_POST['no_body'],
        'pramudi'        => $_POST['pramudi'],
        'depo'           => $_POST['depo'],
        'no_induk'       => $_POST['no_induk'],
        'jam_masuk'      => $_POST['jam_masuk'],
        'jam_keluar'     => $_POST['jam_keluar'],
        
        // A. Seragam
        'jas'            => $_POST['jas'],
        'dasi'           => $_POST['dasi'],
        'peci'           => $_POST['peci'],
        'pantofel'       => $_POST['pantofel'],
        'seragam_kerja'  => $_POST['seragam_kerja'],
        'id_card'        => $_POST['id_card'],
        'kip'            => $_POST['kip'],

        // B. Kelengkapan Surat
        'sim'            => $_POST['sim'],
        'stnk'           => $_POST['stnk'],
        'kir'            => $_POST['kir'],
        'kp'             => $_POST['kp'],

        // C. Kelengkapan Operasi
        'flazz'          => $_POST['flazz'],
        'p3k'            => $_POST['p3k'],
        'handsanitizer'  => $_POST['handsanitizer'],
        'senter'         => $_POST['senter'],

        // D. Data Kesehatan
        'tekanan_darah'  => $_POST['tekanan_darah'],
        'suhu_badan'     => $_POST['suhu_badan'],
    );
    
    $id = $_GET['id'];

    $update_data = "";
    foreach ($data as $key => $value) {
        $update_data .= "$key = '$value', ";
    }
    $update_data = rtrim($update_data, ", ");

    $sql = "UPDATE fit_work SET $update_data WHERE id = $id";

    if ($connection->getConnection()->query($sql) === TRUE) {
          $_SESSION['success_update'] = "Data fit work berhasil diupdate!";
          header("Location: ../views/fit-work-detail.php?id='$id'");
     } else {
          $_SESSION['error_message'] = "Error: " . $sql . "<br>" . mysqli_error($connection->getConnection());
     }
}

?>