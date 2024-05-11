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
                                <div class="sb-nav-link-icon" style="color :white "><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Input</div>
                            <a class="nav-link" href="Pembeli/pembeli.php">
                                <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-person"></i></div>
                                Pembeli
                            </a>
                            <a class="nav-link" href="Pelayan/pelayan.php">
                                <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-user"></i></div>
                                Pelayan
                            </a>
                            <a class="nav-link" href="Pesanan/pesanan.php">
                                <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-cart-shopping"></i></div>
                                Pesanan
                            </a>
                            <a class="nav-link" href="Pembayaran/metodePembayaran.php">
                                <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-money-bill"></i></div>
                                Metode Pembayaran
                            </a>
                            <a class="nav-link" href="Menu/menu.php">
                                <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-mug-hot"></i></div>
                                Menu
                            </a>
                            <a class="nav-link" href="Menu/kategoriMenu.php">
                                <div class="sb-nav-link-icon"style="color :white "><i class="fa-solid fa-keyboard"></i></div>
                                Kategori Menu
                            </a>
                      </nav>
                  </div>
                  
                  <div id="layoutSidenav_content">
                    <main>
                    <div class="container-fluid px-4">
                      <h4 class="mt-4" style="color :#AF06B8 ">Dashboard</h4>
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted mb-4">Dashboard</div>
                        </div></main>
                        <!-- <div class="page-header min-vh-100" style="background-image: url('./assets/img/dash2.png');" loading="lazy">
</div> -->

        
 <!-- Content Row -->
<div class="container">
    
                    <div id="carousel" class="slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item ">
      <img src="cover.png" class="img-fluid" class="d-block w-100" alt="..." >
      <div class="carousel-caption d-none d-md-block">      
        
      </div>
    </div>
    <div class="carousel-item active">
      <img src="index.png" class="img-fluid" cllass="d-block w-100" alt="..." >
      <div class="carousel-caption d-none d-md-block">
        <h5></h5>
      </div>
    </div>
</div>

<br></br>
<div class="row">
   

<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/scripts.js"></script>
<!-- end script -->

</body>
</html>
