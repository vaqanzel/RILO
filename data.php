<?php 
include "./koneksi.php";

function generateRandomId($length = 3) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $idPesanan = '';
    for ($i = 0; $i < $length; $i++) {
        $idPesanan .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $idPesanan;
}

// INPUT PEMBELI
if (isset($_POST['btnSimpanPembeli'])){
    //DEKLARASI VARIABLE
    // $idPembeli = $_POST['idPembeli'];
    $nama_pembeli = $_POST['nama_pembeli'];

    //QUERY PERINTAH INPUT DATA
    $qinput = mysqli_query($con,"INSERT INTO pembeli VALUES('$idPembeli','$nama_pembeli')");
    header("location:./Pembeli/pembeli.php");
    //NOTIFIKASI
    if($qinput)
    {
        // NOTIF BERHASIL
        echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href=""; </script>';
    } else
    {
        //NOTIF GAGAL
        echo '<script> window.alert("Data Gagal Disimpan"); window.location.href=""; </script>';
    }
}
// DELETE PEMBELI
if(isset($_GET['idPembeli'])){
  //DEKLARASI VARIABEL
  $id = $_GET['idPembeli'];
  mysqli_query($con, "DELETE FROM pembeli WHERE idPembeli = $id ");
  header("location:./Pembeli/pembeli.php");
}
// UPDATE PEMBELI
if(isset($_POST['UpPembeli'])){
  $recPembeli = $_POST['nama_pembeli'];
  $id = $_POST['idPembeli'];

 mysqli_query($con, "UPDATE pembeli SET nama_pembeli = '$recPembeli' WHERE idPembeli = $id ");
 header("location: ./Pembeli/pembeli.php");
}


// Tambah data pelayan
if(isset($_POST['btnSimpanPelayan'])) {
    $idPelayan = $_POST['idPelayan'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noTelp = $_POST['noTelp'];

    $query = mysqli_query($con, "INSERT INTO pelayan (idPelayan, nama, alamat, noTelp) VALUES ('$idPelayan', '$nama', '$alamat', '$noTelp')");
    header("location:./Pelayan/pelayan.php");
    //NOTIFIKASI
    if($query)
    {
        // NOTIF BERHASIL
        echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href=""; </script>';
    } else
    {
        //NOTIF GAGAL
        echo '<script> window.alert("Data Gagal Disimpan"); window.location.href=""; </script>';
    }
}
// Update Pelayan
if(isset($_POST['btnUpdatePelayan'])) {
  $idPelayan = $_POST['idPelayan'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $noTelp = $_POST['noTelp'];

    mysqli_query($con, "UPDATE pelayan SET nama='$nama', alamat='$alamat', noTelp='$noTelp' WHERE idPelayan = '$idPelayan' ");
    header("location: ./Pelayan/pelayan.php");
}

// Delete Pelayan
if(isset($_GET['idPelayan'])) {
  //DEKLARASI VARIABEL
  $idPelayan = $_GET['idPelayan'];
  mysqli_query($con, "DELETE FROM pelayan WHERE idPelayan = '$idPelayan' ");
  header("location:./Pelayan/pelayan.php");
}

// mysqli_close($con);

// Input Menu
if (isset($_POST['btnSimpanMenu'])){
  //DEKLARASI VARIABLE
  $idMenu = generateRandomId(3);
  $idKategoriMenu = $_POST['idKategoriMenu']; 
  $namaMenu = $_POST['namaMenu'];
  $Harga = $_POST['Harga'];

  // Query untuk memasukkan data menu ke database
  $qinput = mysqli_query($con,"INSERT INTO menu (idMenu, namaMenu, Harga, idKategoriMenu) VALUES ('$idMenu','$namaMenu', '$Harga', '$idKategoriMenu')");
  // NOTIFIKASI
  if($qinput){
      // Notifikasi berhasil
      echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href="./Menu/menu.php"; </script>';
  } else {
      // Notifikasi gagal
      echo '<script> window.alert("Data Gagal Disimpan"); window.location.href="./Menu/menu.php"; </script>';
  }
}

if(isset($_POST['btnUpdateMenu'])) {
    $idMenu = $_POST['idMenu'];
    $namaMenu = $_POST['namaMenu'];
    $Harga = $_POST['Harga'];
    $idKategoriMenu = $_POST['idKategoriMenu'];
  
    $qupdate = mysqli_query($con, "UPDATE menu SET namaMenu='$namaMenu', Harga='$Harga', idKategoriMenu='$idKategoriMenu' WHERE idMenu = '$idMenu' ");
      
      if($qupdate){
        // Notifikasi berhasil
        echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href="./Menu/menu.php"; </script>';
    } else {
        // Notifikasi gagal
        echo '<script> window.alert("Data Gagal Disimpan"); window.location.href="./Menu/menu.php"; </script>';
    }
}

// Tambah data kategori menu
if (isset($_POST['btnSimpanKategori'])) {
    //DEKLARASI VARIABLE
    $idKategoriMenu = $_POST['idKategoriMenu'];
    $namaKategori = $_POST['namaKategori'];

    //QUERY PERINTAH INPUT DATA
    $qinput = mysqli_query($con,"INSERT INTO kategorimenu (idKategoriMenu, namaKategori) VALUES ('$idKategoriMenu','$namaKategori')");
    //NOTIFIKASI
    if($qinput)
    {
        // NOTIF BERHASIL
        echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href="./Menu/kategorimenu.php"; </script>';
    } else
    {
        //NOTIF GAGAL
        echo '<script> window.alert("Data Gagal Disimpan"); window.location.href="./Menu/kategorimenu.php"; </script>';
    }
}

// UPDATE Kategori Menu
if(isset($_POST['UpKategoriMenu'])){
  $idKategoriMenu = $_POST['idKategoriMenu'];
  $namaKategori = $_POST['namaKategori'];

 mysqli_query($con, "UPDATE kategorimenu SET namaKategori = '$namaKategori' WHERE idKategoriMenu = '$idKategoriMenu' ");
 header("location: ./Menu/kategorimenu.php");
}

if(isset($_GET['idKategoriMenu'])){
    //DEKLARASI VARIABEL
    $id = $_GET['idKategoriMenu'];
    mysqli_query($con, "DELETE FROM kategorimenu WHERE idKategoriMenu = $id ");
    header("location:./Menu/kategorimenu.php");
  }

// INPUT Metode
if (isset($_POST['btnSimpanMetode'])){
    //DEKLARASI VARIABLE
    $idMetodePembayaran = $_POST['idMetodePembayaran'];
    $metodePembayaran = $_POST['metodePembayaran'];

    //QUERY PERINTAH INPUT DATA
    $qinput = mysqli_query($con,"INSERT INTO metodepembayaran VALUES('$idMetodePembayaran','$metodePembayaran')");
    header("location:./Pembayaran/metodepembayaran.php");
    //NOTIFIKASI
    if($qinput)
    {
        // NOTIF BERHASIL
        echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href=""; </script>';
    } else
    {
        //NOTIF GAGAL
        echo '<script> window.alert("Data Gagal Disimpan"); window.location.href=""; </script>';
    }
}

if(isset($_POST['btnUpdateMetode'])) {
    $idMetodePembayaran = $_POST['idMetodePembayaran'];
    $metodePembayaran = $_POST['metodePembayaran'];
  
    $qupdate = mysqli_query($con, "UPDATE metodepembayaran SET metodePembayaran='$metodePembayaran' WHERE idMetodePembayaran = '$idMetodePembayaran' ");
      
      if($qupdate){
        // Notifikasi berhasil
        echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href="./Pembayaran/metodepembayaran.php"; </script>';
    } else {
        // Notifikasi gagal
        echo '<script> window.alert("Data Gagal Disimpan"); window.location.href="./Pembayaran/metodepembayaran.php"; </script>';
    }
}

?>