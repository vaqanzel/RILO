<?php
include "../koneksi.php";
include "../Pesanan/proses_pesanan.php";

if(isset($_GET['idPesanan'])) {
    $idPesanan = $_GET['idPesanan'];
    $qPesanan = mysqli_query($con,"SELECT * FROM pesanan WHERE idPesanan ='$idPesanan'");
    $recPesanan = mysqli_fetch_array($qPesanan);
    $idPembeli = $recPesanan['idPembeli'];
    $idPelayan = $recPesanan['idPelayan'];

    $qDtlPsn = mysqli_query($con, "SELECT * FROM detailpesanan WHERE idPesanan = '$idPesanan'");
    $recDtlPsn = mysqli_fetch_array($qDtlPsn);
    $idMenu = $recDtlPsn['idMenu'];
    $hrgSatuan = $recDtlPsn['hargaSatuan'];

    $qPembayaran = mysqli_query($con, "SELECT * FROM pembayaran WHERE idPesanan = '$idPesanan'");
    $recPembayaran = mysqli_fetch_array($qPembayaran);
    $idMetodePembayaran = $recPembayaran['idMetodePembayaran'];

    if(isset($_POST['btnUpdatePembayaran'])) {
        $totalHarga += $hrgSatuan;
        $bayar = $_POST['bayar'];
        $kembalian = $bayar - $totalHarga;
        $idMetodePembayaran = $_POST['idMetodePembayaran'];

        $idPembayaran = $recPembayaran['idPembayaran'];

        $qinput_pembayaran = mysqli_query($con, "UPDATE pembayaran SET totalHarga=$totalHarga, bayar=$bayar, kembalian=$kembalian, idMetodePembayaran='$idMetodePembayaran' WHERE idPesanan = '$idPesanan' ");
        if($qinput_pembayaran)
        {
            // NOTIF BERHASIL
            echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href=""; </script>';
            header("location:../pembayaran/detailpesanan.php?idPesanan=$idPesanan");
        } else
        {
            //NOTIF GAGAL
            echo '<script> window.alert("Data Gagal Disimpan"); window.location.href=""; </script>';
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Rilo Coffee</title>
        <link rel="shortcut icon" href="../assets/img/Rilo.png" type="image/x-icon">  
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <h6 class="navbar-brand ps-3" style="color :#AF06B8 " href="home.php"><img src="../assets/img/Rilo.png" class="img-fluid rounded-circle me-2" style="height : 35px; padding-right : 1px; padding-bottom:1px;">RILO</h6>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon" style="color :#AF06B8 "><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Input</div>
                            <a class="nav-link" href="pembeli.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Pembeli
                            </a>
                            <a class="nav-link" href="pelayan.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Pelayan
                            </a>
                            <a class="nav-link" href="pesanan.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Pesanan
                            </a>
                            <a class="nav-link" href="pembayaran.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Pembayaran
                            </a>
                            <a class="nav-link" href="menu.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Menu
                            </a>
                            <a class="nav-link" href="metodePembayaran.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Metode Pembayaran
                            </a>
                            <a class="nav-link" href="kategoriMenu.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input KategoriMenu
                            </a>
                            <a class="nav-link" href="detailPesanan.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Detail Pesanan
                            </a>
                      </nav>
                  </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h4 class="mt-4" style="color : #4F06B8;">Detail Pesanan</h4>
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted mb-4">Struk Digital</div>
                        </div>
                        
        <!-- Page Wrapper -->
    <div id="wrapper">
    
    <div class="container-fluid">
        <div class="row justify-content-md-center">
        <div class="col col-lg-13">

        <form action="editpembayaran.php?idPesanan=<?php echo $idPesanan ?>" method="POST" class="portlet light bordered">
                <div class="input-group input-group-outline mb-3">
                  <label class="control-label col-md-3">Tanggal Pesanan: </label>
                  <p class="form-control-static"><?= $recPesanan['tanggalPesanan'] ?></p>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <?php 
                        $dkat = mysqli_query($con,"SELECT * FROM pembeli WHERE idPembeli = '$idPembeli'");
                        while ($bkat= mysqli_fetch_array($dkat)){
                    ?>
                    <label class="control-label col-md-3">Nama Pemesan: </label>
                    <p class="form-control-static"><?= $bkat['nama_pembeli'] ?></p>
                    <?php } ?>
                    <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
                    <?php 
                        $dkat = mysqli_query($con,"SELECT * FROM pelayan WHERE idPelayan = '$idPelayan'");
                        while ($bkat= mysqli_fetch_array($dkat)){
                    ?>
                        <label class="control-label col-md-3">Nama Pelayan: </label>
                        <p class="form-control-static"><?= $bkat['nama'] ?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <?php 
                        $dkat = mysqli_query($con,"SELECT * FROM menu WHERE idMenu = '$idMenu'");
                        while ($bkat= mysqli_fetch_array($dkat)){
                    ?>
                      <label class="control-label col-md-3">Menu Dipesan: </label>
                      <p class="form-control-static"><?= $bkat['namaMenu'] ?> &ensp; / &ensp; Rp. <?= $bkat['Harga'] ?></p>
                    <?php } ?>
                    <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
                    <?php 
                        $dkat = mysqli_query($con,"SELECT * FROM detailpesanan WHERE idPesanan = '$idPesanan'");
                        while ($bkat= mysqli_fetch_array($dkat)){
                    ?>
                      <label class="control-label col-md-3">Quantity: </label>
                      <p class="form-control-static"><?= $bkat['quantity'] ?></p>
                    <?php } ?>
                </div>
                <?php 
                    $dkat = mysqli_query($con,"SELECT * FROM detailpesanan WHERE idPesanan = '$idPesanan'");
                    while ($bkat= mysqli_fetch_array($dkat)){
                ?>
                <div class="input-group input-group-outline mb-3">
                  <label class="control-label col-md-3">Total Harga: </label>
                  <p class="form-control-static">Rp. <?= $bkat['hargaSatuan'] ?></p>
                </div>
                <?php } ?>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <select name="idMetodePembayaran" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" autofocus>
                        <?php 
                            $dkat = mysqli_query($con,"SELECT * FROM metodepembayaran WHERE idMetodePembayaran = '$idMetodePembayaran'");
                            while ($bkat= mysqli_fetch_array($dkat)){
                        ?>
                        <option selected><?= $bkat['metodePembayaran'] ?></option>
                        <?php } ?>
                        <?php 
                            $dkat = mysqli_query($con,"SELECT * FROM metodepembayaran ORDER BY metodePembayaran ASC");
                            while ($bkat= mysqli_fetch_array($dkat)){
                        ?>
                        <option value="<?php echo $bkat['idMetodePembayaran'] ?>"><?php echo $bkat['metodePembayaran']  ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                    </div>
                    <input id="bayar" type="text" class="form-control" name="bayar" value="<?= $recPembayaran['bayar'] ?>" style="width: 75px;" autofocus>
                </div>
                <input type="hidden" name="idPesanan" value="<?= $recPesanan['idPesanan'] ?>" />

                <input type="submit" style="background-color : #4F06B8;" class="btn float-end text-white" name="btnUpdatePembayaran" value="Update Pembayaran" >
                </form>
            </div>
        </div>
    </div>
    </div>
        </div>
            </main>
        <!--Footer  -->
        <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Rilo</div>
                            <div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                      
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                      
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


   <!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="../assets/js/scripts.js"></script>
<!-- end script -->
</body>

</html>