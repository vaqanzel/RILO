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

        <form action="proses_pesanan.php" method="POST" class="portlet light bordered">
                <div class="input-group input-group-outline mb-3">
                <label  class="control-label col-md-3">Tanggal Pesanan: </label>
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="date" class="form-control" id="idPesanan" name="tanggalPesanan" value="<?= $recPesanan['tanggalPesanan'] ?>" autofocus>
                    </div>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="control-label col-md-3">Nama Pemesan: </label>
                    <select name="idPembeli" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" autofocus>
                        <?php 
                            $dkat = mysqli_query($con,"SELECT * FROM pembeli WHERE idPembeli = '$idPembeli'");
                            while ($bkat= mysqli_fetch_array($dkat)){
                        ?>
                        <option selected><?= $bkat['nama_pembeli'] ?></option>
                        <?php } ?>
                        <?php 
                            $qkat = mysqli_query($con,"SELECT * FROM pembeli ORDER BY nama_pembeli ASC");
                            while ($rkat= mysqli_fetch_array($qkat)){
                        ?>
                        <option value="<?php echo $rkat['idPembeli'] ?>"><?php echo $rkat['nama_pembeli']  ?></option>
                        <?php } ?>
                    </select>
                    <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
                    <label class="control-label col-md-3">Nama Pelayan: </label>
                    <select name="idPelayan" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" autofocus>
                        <?php 
                            $dkat = mysqli_query($con,"SELECT * FROM pelayan WHERE idPelayan = '$idPelayan'");
                            while ($bkat= mysqli_fetch_array($dkat)){
                        ?>
                        <option selected><?= $bkat['nama'] ?></option>
                        <?php } ?>
                        <?php 
                            $qkat = mysqli_query($con,"SELECT * FROM pelayan ORDER BY nama ASC");
                            while ($rkat= mysqli_fetch_array($qkat)){
                        ?>
                        <option value="<?php echo $rkat['idPelayan'] ?>"><?php echo $rkat['nama']  ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="control-label col-md-3">Menu Dipesan: </label>
                    <select id="idMenu_<?php echo $index ?>" name="idMenu[]" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" autofocus>
                        <?php 
                            $dkat = mysqli_query($con,"SELECT * FROM menu WHERE idMenu = '$idMenu'");
                            while ($bkat= mysqli_fetch_array($dkat)){
                        ?>
                        <option selected><?= $bkat['namaMenu'] ?></option>
                        <?php } ?>
                        <?php 
                            $qkat = mysqli_query($con,"SELECT * FROM menu ORDER BY namaMenu ASC");
                            while ($rkat= mysqli_fetch_array($qkat)){
                        ?>
                        <option value="<?php echo $rkat['idMenu'] ?>"><?php echo $rkat['namaMenu']  ?></option>
                        <?php } ?>
                    </select>
                    <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</p>
                    <?php 
                        $dkat = mysqli_query($con,"SELECT * FROM detailpesanan WHERE idPesanan = '$idPesanan'");
                        while ($bkat= mysqli_fetch_array($dkat)){
                    ?>
                        <label  class="control-label col-md-3">Quantity: </label>
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="number" class="form-control" id="quantity" name="quantity[]" value="<?= $bkat['quantity'] ?>" autofocus>
                        </div>
                    <?php } ?>
                </div>
                <input type="hidden" name="idPesanan" value="<?= $recPesanan['idPesanan'] ?>" />

                <input type="submit" style="background-color : #4F06B8;" class="btn float-end text-white" name="btnUpdateGeneralPesanan" value="Update Pesanan" >
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