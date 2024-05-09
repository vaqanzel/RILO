<?php
// Koneksi ke database
include '../koneksi.php';

function generateRandomIdPesanan($length = 5) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $idPesanan = '';
    for ($i = 0; $i < $length; $i++) {
        $idPesanan .= $characters[rand(0, strlen($characters) - 1)];
    }
    $idPesanan = $_POST['idPesanan'];
    return $idPesanan;

}

if (isset($_POST['btnSimpanPesanan'])){
    $idPesanan = generateRandomIdPesanan(); 
    $tanggalPesanan = $_POST['tanggalPesanan'];
    $idPembeli      = $_POST['idPembeli'];
    $idPelayan      = $_POST['idPelayan'];
  
    // Query untuk memasukkan data menu ke database
    $qinput = mysqli_query($con,"INSERT INTO pesanan (idPesanan, tanggalPesanan, idPembeli, idPelayan) VALUES ('$idPesanan','$tanggalPesanan', '$idPembeli', '$idPelayan')");
    header("location:pesanan.php");
    // NOTIFIKASI
    if($qinput){
        // Notifikasi berhasil
        echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href=""; </script>';
    } else {
        // Notifikasi gagal
        echo '<script> window.alert("Data Gagal Disimpan"); window.location.href=""; </script>';
    }
}

?>
