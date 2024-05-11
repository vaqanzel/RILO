<?php
include "../koneksi.php";

if(isset($_GET['idPelayan'])) {
    $id = $_GET['idPelayan'];
    $qPelayan = mysqli_query($con,"SELECT * FROM pelayan WHERE idPelayan ='$id'");
    $recPelayan = mysqli_fetch_array($qPelayan);
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
        <h6 class="navbar-brand ps-3" style="color :#AF06B8 " href="../home.php"><img src="../assets/img/Rilo.png" class="img-fluid rounded-circle me-2" style="height : 35px; padding-right : 1px; padding-bottom:1px;">RILO</h6>
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
                          <a class="nav-link" href="../dashboard.php">
                              <div class="sb-nav-link-icon" style="color :white "><i class="fas fa-tachometer-alt"></i></div>
                              Dashboard
                          </a>
                          <div class="sb-sidenav-menu-heading">Input</div>
                          <a class="nav-link" href="../Pembeli/pembeli.php">
                              <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-person"></i></div>
                              Pembeli
                          </a>
                          <a class="nav-link" href="pelayan.php">
                              <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-user"></i></div>
                              Pelayan
                          </a>
                          <a class="nav-link" href="../Pesanan/pesanan.php">
                              <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-cart-shopping"></i></div>
                              Pesanan
                          </a>
                          <a class="nav-link" href="../Pembayaran/metodePembayaran.php">
                              <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-money-bill"></i></div>
                              Metode Pembayaran
                          </a>
                          <a class="nav-link" href="../Menu/menu.php">
                              <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-mug-hot"></i></div>
                              Menu
                          </a>
                          <a class="nav-link" href="../Menu/kategoriMenu.php">
                              <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-keyboard"></i></div>
                              KategoriMenu
                          </a>
                </nav>
              </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h4 class="mt-4" style="color : #4F06B8;">Update Pelayan</h4>
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted mb-4">Update Pelayan</div>
                    </div>
                    
                    <!-- Page Wrapper -->
                    <div id="wrapper">
                        <div class="container-fluid">
                            <div class="row justify-content-md-center">
                                <div class="col col-lg-13">
                                <form action="../data.php" method="POST">
                                    <div class="mb-3">
                                        <label for="idPelayan" class="form-label">ID Pelayan</label>
                                        <input type="text" class="form-control" id="idPelayan" name="idPelayan" value="<?= $recPelayan['idPelayan'] ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $recPelayan['nama'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $recPelayan['alamat'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="noTelp" class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="noTelp" name="noTelp" value="<?= $recPelayan['noTelp'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="btnUpdatePelayan" value="Update Pelayan">Update Pelayan</button>
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
</body>
</html>
