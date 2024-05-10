<?php
// Koneksi ke database
include '../koneksi.php';

function generateRandomId($length = 10) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $idPesanan = '';
    for ($i = 0; $i < $length; $i++) {
        $idPesanan .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $idPesanan;
}

if (isset($_POST['btnSimpanPesanan'])){
    $tanggalPesanan = $_POST['tanggalPesanan'];
    $idPembeli      = $_POST['idPembeli'];
    $idPelayan      = $_POST['idPelayan'];
    
    $qinput = mysqli_query($con,"INSERT INTO pesanan (tanggalPesanan, idPembeli, idPelayan) VALUES ('$tanggalPesanan', '$idPembeli', '$idPelayan')");
    // Inisialisasi array untuk menyimpan data detail pesanan
    if ($qinput) {

        $detailPesanan = array();
        $idPesananBaru = mysqli_insert_id($con);

        // Looping untuk mengisi array detail pesanan
        foreach ($_POST['idMenu'] as $index => $idMenu) {
            $quantity = $_POST['quantity'][$index];
            $idMenu = $_POST['idMenu'][$index];

            // Mengambil harga dari database berdasarkan idMenu
            $qharga = mysqli_query($con, "SELECT harga FROM menu WHERE idMenu = '$idMenu'");
            $row = mysqli_fetch_assoc($qharga);
            $hargaSatuan = $row['harga'] * $quantity;
            $totalHarga += $hargaSatuan;

            // Menambahkan data detail pesanan ke array
            $detailPesanan[] = "('$idPesananBaru', '$idMenu', $hargaSatuan, $quantity)";
        }
    
        // Gabungkan semua data detail pesanan menjadi satu string
        $values = implode(",", $detailPesanan);

        // Query untuk menyimpan semua detail pesanan sekaligus
        $qinput_detail = mysqli_query($con, "INSERT INTO detailpesanan (idPesanan, idMenu, hargaSatuan, quantity) VALUES $values");

        $idPembayaran = generateRandomId(10);
        $bayar = $_POST['bayar'];
        $kembalian = $bayar - $totalHarga;
        $idMetodePembayaran = $_POST['idMetodePembayaran'];

        $qinput_pembayaran = mysqli_query($con, "INSERT INTO pembayaran (idPembayaran, totalHarga, bayar, kembalian, idMetodePembayaran, idPesanan) VALUES ('$idPembayaran', $totalHarga, $bayar, $kembalian, '$idMetodePembayaran', $idPesananBaru)");


        // Jika penyimpanan detail pesanan berhasil, lanjutkan dengan menyimpan pesanan
        if($qinput_detail){
            // Notifikasi berhasil
            echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href=""; </script>';
            header("location:../pembayaran/pembayaran.php?idPesanan=$idPesananBaru");
        } else {
            // Notifikasi gagal
            echo '<script> window.alert("Data Gagal Disimpan"); window.location.href=""; </script>';
            header("location:pesanan.php");
        }
    } else {
        echo '<script> window.alert("Data Gagal Disimpan"); window.location.href=""; </script>';
        header("location:pesanan.php");
    }
} 

?>
