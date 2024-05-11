<?php
include "../koneksi.php";

if(isset($_GET['idPesanan'])){
    //DEKLARASI VARIABEL
    $idPesanan = $_GET['idPesanan'];
    mysqli_query($con, "DELETE FROM pembayaran WHERE idPesanan = '$idPesanan' ");
    mysqli_query($con, "DELETE FROM pesanan WHERE idPesanan = '$idPesanan' ");
    header("location:pesanan.php");
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
                            <a class="nav-link" href="../pembeli.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Pembeli
                            </a>
                            <a class="nav-link" href="../pelayan.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Pelayan
                            </a>
                            <a class="nav-link" href="../pesanan.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Pesanan
                            </a>
                            <a class="nav-link" href="../pembayaran.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Pembayaran
                            </a>
                            <a class="nav-link" href="../menu.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Menu
                            </a>
                            <a class="nav-link" href="../metodePembayaran.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Metode Pembayaran
                            </a>
                            <a class="nav-link" href="../kategoriMenu.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input KategoriMenu
                            </a>
                            <a class="nav-link" href="../detailPesanan.php">
                                <div class="sb-nav-link-icon"style="color :#AF06B8 "><i class="fas fa-book-open"></i></div>
                                Input Detail Pesanan
                            </a>
                        </nav>
                    </div>
                  
                    <div id="layoutSidenav_content">
                        <main>
                            <div class="container-fluid px-4">
                                <h4 class="mt-4" style="color :#AF06B8 ">Tabel Pesanan</h4>
                                <div class="d-flex align-items-center justify-content-between small">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Input Pesanan
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Input Pesanan</h5>
                                      </div>
                                      <div class="modal-body">
                                      <form role="form" action="proses_pesanan.php" class="text-start" method="POST">
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label"></label>
                                            <input id="idPesanan" type="date" class="form-control" name="tanggalPesanan" autofocus>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label"></label>
                                            <select name="idPembeli" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" autofocus>
                                                <option selected>Pilih Pembeli</option>
                                                <?php 
                                                    $qkat = mysqli_query($con,"SELECT * FROM pembeli ORDER BY nama_pembeli ASC");
                                                    while ($rkat= mysqli_fetch_array($qkat)){
                                                ?>
                                                <option value="<?php echo $rkat['idPembeli'] ?>"><?php echo $rkat['nama_pembeli']  ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label"></label>
                                            <select name="idPelayan" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" autofocus>
                                                <option selected>Pilih Pelayan</option>
                                                <?php 
                                                    $dkat = mysqli_query($con,"SELECT * FROM pelayan ORDER BY nama ASC");
                                                    while ($bkat= mysqli_fetch_array($dkat)){
                                                ?>
                                                <option value="<?php echo $bkat['idPelayan'] ?>"><?php echo $bkat['nama']  ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label"></label>
                                            <select id="idMenu_<?php echo $index ?>" name="idMenu[]" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="hitungHargaSatuan(<?php echo $index?>)" autofocus>
                                                <option selected>Pilih Menu</option>
                                                <?php 
                                                    $dkat = mysqli_query($con,"SELECT * FROM menu ORDER BY namaMenu ASC");
                                                    while ($bkat= mysqli_fetch_array($dkat)){
                                                ?>
                                                <option value="<?php echo $bkat['idMenu'] ?>"><?php echo $bkat['namaMenu']  ?></option>
                                                <?php } ?>
                                            </select>
                                            <label class="form-label"></label>
                                            <input id="quantity" type="number" class="form-control mb-3" name="quantity[]" placeholder="Quantity" min="1" onchange="hitungHargaSatuan(<?php echo $index ?>)" autofocus>
                                        </div>
                                        <!-- <div id="additionalDropdowns"></div>
                                        <button type="button" id="tambahMenu" onclick="tambahDropdown()">Tambah Menu</button> -->
                                        <div class="modal-footer">
                                            <button type="submit" name="btnSimpanPesanan"  style="background-color : #AF06B8" class="btn float-end text-white me-1" ><i class="bi-save"></i>Simpan</button>
                                            <button type="button" class="btn btn-danger float-end" data-bs-dismiss="modal"><i class="bi-x-circle"></i> Batal</button>
                                        </div>
                                      </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </main>
                          <!-- Form Input -->
                        <div class="card-body">
                            <div class="row justify-content-md-left">
                                <div class="col col-lg-8">
                                    <form role="form" action="data.php" class="text-start" method="POST">
                        <!-- Tabel -->
                        <div class="row justify-content-md-left">
                            <div class="col col-lg-15">
                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">ID Pesanan</th>
                                            <th scope="col">Tanggal Pesanan</th>
                                            <th scope="col">Pembeli</th>
                                            <th scope="col">Pelayan</th>
                                            <th scope="col"colspan=2>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $qrec = mysqli_query($con, "SELECT pesanan.*, pembeli.nama_pembeli, pelayan.nama FROM pesanan LEFT JOIN pembeli ON pembeli.idPembeli = pesanan.idPembeli LEFT JOIN pelayan ON pelayan.idPelayan = pesanan.idPelayan");
                                            while ($rec = mysqli_fetch_array($qrec)) {            
                                        ?>
                                        <tr>
                                            <th scope="row"><?= $no ?></th>
                                            <td><?= $rec['idPesanan'] ?></td>
                                            <td><?= $rec['tanggalPesanan'] ?></td>
                                            <td><?= $rec['nama_pembeli'] ?></td>
                                            <td><?= $rec['nama'] ?></td>
                                            <td><a href="../Pembayaran/detailpesanan.php?idPesanan=<?= $rec['idPesanan']?>">Detail</a> </td>
                                            <td><a href="editgeneralpesanan.php?idPesanan=<?= $rec['idPesanan']?>">Edit</a> </td>
                                            <td><a href="pesanan.php?idPesanan=<?= $rec['idPesanan']?>">Delete </a> </td>
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
        <script src="../assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../assets/js/datatables-simple-demo.js"></script>
        <script></script>
    </body>
</html>
