<?php
include "./koneksi.php";

if(isset($_POST['update'])){
    $idKategoriMenu = $_POST['idKategoriMenu'];
    $namaKategori = $_POST['namaKategori'];
    
    $data = mysqli_query($con, "UPDATE kategorimenu SET idKategoriMenu='$idKategoriMenu', namaKategori='$namaKategori' WHERE idKategoriMenu='$idKategoriMenu'") or die ("data salah : ".mysqli_error($con));
    
    if ($data) {
        echo "Berhasil Update Data <br>";
        echo "<a href='index.php'>Kembali</a>";
    } else {
        echo "Gagal Input Data!!! <br>";
        echo "<a href='index.php'>Kembali</a>";
    }
}

?>