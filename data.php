<?php 
include "./koneksi.php";

// INPUT PEMBELI
if (isset($_POST['btnSimpan'])){
    //DEKLARASI VARIABLE
    // $idPembeli = $_POST['idPembeli'];
    $nama_pembeli = $_POST['nama_pembeli'];

    //QUERY PERINTAH INPUT DATA
    $qinput = mysqli_query($con,"INSERT INTO pembeli VALUES('$idPembeli','$nama_pembeli')");
    header("location:pembeli.php");
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
  header("location:pembeli.php");
}
// UPDATE PEMBELI
if(isset($_POST['UpPembeli'])){
  $recPembeli = $_POST['nama_pembeli'];
  $id = $_POST['idPembeli'];

 mysqli_query($con, "UPDATE pembeli SET nama_pembeli = '$recPembeli' WHERE idPembeli = $id ");
 header("location: pembeli.php");
}


// Tambah data pelayan
if(isset($_POST['btnSimpanPelayan'])) {
    $idPelayan = $_POST['idPelayan'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noTelp = $_POST['noTelp'];

    $query = mysqli_query($con, "INSERT INTO pelayan (idPelayan, nama, alamat, noTelp) VALUES ('$idPelayan', '$nama', '$alamat', '$noTelp')");
    header("location:pelayan.php");
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
    header("location: pelayan.php");
}

// Delete Pelayan
if(isset($_GET['idPelayan'])) {
  //DEKLARASI VARIABEL
  $idPelayan = $_GET['idPelayan'];
  mysqli_query($con, "DELETE FROM pelayan WHERE idPelayan = '$idPelayan' ");
  header("location:pelayan.php");
}

// mysqli_close($con);


//Menghapus Menu
if(isset($_GET['idMenu'])){
  $id = $_GET['idMenu'];
  mysqli_query($con, "DELETE FROM menu WHERE idMenu = $id ");
  header("location:menu.php");
}

// Input Menu
if (isset($_POST['btnSimpanMenu'])){
  $idKategoriMenu = $_POST['idKategoriMenu']; 
  $namaMenu = $_POST['namaMenu'];
  $Harga = $_POST['Harga'];

  // Query untuk memasukkan data menu ke database
  $qinput = mysqli_query($con,"INSERT INTO menu (namaMenu, Harga, idKategoriMenu) VALUES ('$namaMenu', '$Harga', '$idKategoriMenu')");
  header("location:menu.php");
  // NOTIFIKASI
  if($qinput){
      // Notifikasi berhasil
      echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href=""; </script>';
  } else {
      // Notifikasi gagal
      echo '<script> window.alert("Data Gagal Disimpan"); window.location.href=""; </script>';
  }
}

// Tambah data kategori menu
if (isset($_POST['btnSimpanKategori'])) {
    //DEKLARASI VARIABLE
    $idKategoriMenu = $_POST['idKategoriMenu'];
    $namaKategori = $_POST['namaKategori'];

    //QUERY PERINTAH INPUT DATA
    $qinput = mysqli_query($con,"INSERT INTO kategorimenu (idKategoriMenu, namaKategori) VALUES ('$idKategoriMenu','$namaKategori')");
    header("location:kategorimenu.php");
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

// DELETE Kategori Menu
if(isset($_GET['idKategoriMenu'])){
    //DEKLARASI VARIABEL
    $idKategoriMenu = $_GET['idKategoriMenu'];
    mysqli_query($con, "DELETE FROM kategorimenu WHERE idKategoriMenu = '$idKategoriMenu' ");
    header("location:kategorimenu.php");
}
// UPDATE Kategori Menu
if(isset($_POST['UpKategori'])){
  $idKategoriMenu = $_POST['idKategoriMenu'];
  $namaKategori = $_POST['namaKategori'];

 mysqli_query($con, "UPDATE kategorimenu SET namaKategori = '$namaKategori' WHERE idKategoriMenu = '$idKategoriMenu' ");
 header("location: kategorimenu.php");
}

if(isset($_GET['idKategoriMenu'])){
    //DEKLARASI VARIABEL
    $id = $_GET['idKategoriMenu'];
    mysqli_query($con, "DELETE FROM kategorimenu WHERE idKategoriMenu = $id ");
    header("location:kategorimenu.php");
  }

// INPUT Metode
if (isset($_POST['btnSimpanMetode'])){
    //DEKLARASI VARIABLE
    $idMetodePembayaran = $_POST['idMetodePembayaran'];
    $metodePembayaran = $_POST['metodePembayaran'];

    //QUERY PERINTAH INPUT DATA
    $qinput = mysqli_query($con,"INSERT INTO metodepembayaran VALUES('$idMetodePembayaran','$metodePembayaran')");
    header("location:metodepembayaran.php");
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

?>