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

    $query = "INSERT INTO pelayan (idPelayan, nama, alamat, noTelp) VALUES ('$idPelayan', '$nama', '$alamat', '$noTelp')";
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

// Update Pelayan
if(isset($_POST['btnUpdatePelayan'])) {
  $id = $_POST['idPelayan'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $noTelp = $_POST['noTelp'];

  // Query untuk melakukan update data pelayan
  $query = "UPDATE pelayan SET nama='$nama', alamat='$alamat', noTelp='$noTelp' WHERE idPelayan='$id'";
  
  if(mysqli_query($con, $query)) {
      echo "Data pelayan berhasil diupdate.";
  } else {
      echo "Gagal melakukan update data pelayan: " . mysqli_error($con);
  }
}

// Delete Pelayan
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['idPelayan'])) {
  $id = $_GET['idPelayan'];

  // Query untuk melakukan delete data pelayan
  $query = "DELETE FROM pelayan WHERE idPelayan='$id'";
  
  if(mysqli_query($con, $query)) {
      echo "Data pelayan berhasil dihapus.";
  } else {
      echo "Gagal menghapus data pelayan: " . mysqli_error($con);
  }
}

mysqli_close($con);


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
?>