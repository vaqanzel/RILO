<?php
include "./koneksi.php";

if(isset($_GET['idPembeli'])) {
   $id = $_GET['idPembeli'];
$qPembeli = mysqli_query($con,"SELECT * FROM pembeli WHERE idPembeli ='$id'");
$recPembeli = mysqli_fetch_array($qPembeli);
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
        <link rel="shortcut icon" href="./assets/img/Rilo.png" type="image/x-icon">  
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <h6 class="navbar-brand ps-3" style="color :#AF06B8 " href="home.php"><img src="./assets/img/Rilo.png" class="img-fluid rounded-circle me-2" style="height : 35px; padding-right : 1px; padding-bottom:1px;">RILO</h6>
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
                      <h4 class="mt-4" style="color : #4F06B8;">Update Pembeli</h4>
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted mb-4">Update Pembeli</div>
                        </div>
                        
        <!-- Page Wrapper -->
    <div id="wrapper">
    
    <div class="container-fluid">
        <div class="row justify-content-md-center">
        <div class="col col-lg-13">

        <form action="data.php" method="POST" >
                
                <!-- <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input type="text" name="idPembeli" id="" class="form-control" placeholder="" value="<?= $recPembeli['idPembeli'] ?>">
              </div>    -->
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input type="text" name="nama_pembeli" id="" class="form-control" placeholder="" value="<?= $recPembeli['nama_pembeli'] ?>">
                </div>
                <input type="hidden" name="idPembeli" value="<?= $recPembeli['idPembeli'] ?>" />

                <input type="submit" style="background-color : #4F06B8;" class="btn float-end text-white" name="UpPembeli" value="Update Pembeli" >
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
<script src="js/scripts.js"></script>
<!-- end script -->
</body>

</html>