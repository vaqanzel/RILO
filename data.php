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


// INPUT PELAYAN
if (isset($_POST['btnSimpan'])){
  //DEKLARASI VARIABLE
  $idPelayan = $_POST['idPelayan'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $noTelp = $_POST['noTelp'];

  //QUERY PERINTAH INPUT DATA
  $qinput = mysqli_query($con,"INSERT INTO pelayan VALUES('$idPelayan','$nama', '$alamat', '$noTelp')");
  header("location:pelayan.php");
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
        