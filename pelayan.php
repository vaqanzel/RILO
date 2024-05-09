
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
                      <h4 class="mt-4" style="color :#AF06B8 ">Input Pelayan</h4>
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted mb-4">Input Pelayan</div>
                        </div></main>
                          <!-- Form Input -->
                    <div class="card-body">
                    <div class="row justify-content-md-left">
                     <div class="col col-lg-8">
              <form role="form" action="data.php" class="text-start" method="POST">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input id="idPelayan" type="text" class="form-control" name="idPelayan" placeholder="ID Pelayan" autofocus>
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Pelayan" autofocus>
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input id="alamat" type="text" class="form-control" name="alamat" placeholder="Alamat" autofocus>
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input id="noTelp" type="text" class="form-control" name="noTelp" placeholder="No Telp" autofocus>
                </div>
                
                <div class="footer mb-5">
                    <button type="reset" class="btn btn-danger float-end"><i class="bi-x-circle"></i>
                        Batal</button>
                    <button type="submit" name="btnSimpanPelayan"  style="background-color : #AF06B8" class="btn float-end text-white me-1" ><i class="bi-save"></i>
                        Simpan</button>
                </div>

                    <!-- Tabel -->
            <div class="row justify-content-md-left">
        <div class="col col-lg-15">
        <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">NO</th>
            <th scope="col">ID Pelayan</th>
            <th scope="col">Nama Pelayan</th>
            <th scope="col">Alamat</th>
            <th scope="col">No Telp</th>
            <th scope="col"colspan=2>Opsi</th>
            </tr>
           </thead>
        <tbody>
            <?php 
                include "./koneksi.php";
                $no = 1;
                $qrec = mysqli_query($con, "SELECT * FROM pelayan");
                while ($rec = mysqli_fetch_array($qrec))
                {            
            ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $rec['idPelayan'] ?></td>
                <td><?= $rec['nama'] ?></td>
                <td><?= $rec['alamat'] ?></td>
                <td><?= $rec['noTelp'] ?></td>
                <td><a href="updatepelayan.php?idPelayan=<?= $rec["idPelayan"] ?>"> Edit</a> </td>
                <td><a href="data.php?idPelayan=<?= $rec["idPelayan"] ?>"> Delete </a> </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
        </table>
            </div>
                 </div>
                </div>
            </form>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="assets/js/datatables-simple-demo.js"></script>
    </body>
</html>
