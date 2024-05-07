<?php
include "./koneksi.php";

class UpdateMenu {
    public function __construct() {
        $this->koneksi = new mysqli("localhost", "root", "", "rilo"); 
    }

    public function getMenu($idMenu) {
        $queryMenu = "SELECT * FROM menu WHERE idMenu = $idMenu";
        $resultMenu = $this->koneksi->query($queryMenu);

        if ($resultMenu->num_rows > 0) {
            return $resultMenu->fetch_assoc();
        } else {
            echo "Menu tidak ditemukan.";
            exit();
        }
    }

    public function updateMenu($idMenu, $namaMenu, $harga, $idKategoriMenu) {
        $queryUpdate = "UPDATE menu SET namaMenu = '$namaMenu', Harga = '$harga', idKategoriMenu = '$idKategoriMenu' WHERE idMenu = $idMenu";
        $resultUpdate = $this->koneksi->query($queryUpdate);

        if ($resultUpdate) {
            header("Location: menu.php");
            exit();
        } else {
            echo "Gagal mengupdate data menu.";
        }
    }
}

$updateMenu = new UpdateMenu();

if (isset($_GET['idMenu'])) {
    $idMenu = $_GET['idMenu'];
    $menu = $updateMenu->getMenu($idMenu);
}

if (isset($_POST['btnSimpanMenu'])) {
    $namaMenu = $_POST['namaMenu'];
    $harga = $_POST['Harga'];
    $idKategoriMenu = $_POST['idKategoriMenu'];

    $updateMenu->updateMenu($idMenu, $namaMenu, $harga, $idKategoriMenu);
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
                        <!-- Sidebar content -->
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h4 class="mt-4" style="color : #4F06B8;">Update Menu</h4>
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted mb-4">Update Menu</div>
                    </div>
                    <div id="wrapper">
                        <div class="container-fluid">
                            <div class="row justify-content-md-center">
                                <div class="col col-lg-13">
                                    <form action="" method="POST" >
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label"></label>
                                            <input type="text" name="namaMenu" class="form-control" placeholder="Nama Menu" value="<?= $menu['namaMenu'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label"></label>
                                            <input type="text" name="Harga" class="form-control" placeholder="Harga" value="<?= $menu['Harga'] ?>">
                                        </div>
                                        <!-- <div class="input-group input-group-outline mb-3">
                                            <label class="form-label"></label>
                                            <input type="text" name="idKategoriMenu" class="form-control" placeholder="ID Kategori Menu" value="<?= $menu['idKategoriMenu'] ?>">
                                        </div> -->
                                        <div class="input-group input-group-outline mb-3">
    <select name="idKategoriMenu" class="form-select">
        <?php
        $queryKategori = "SELECT * FROM kategorimenu";
        $resultKategori = mysqli_query($con, $queryKategori);

        if (mysqli_num_rows($resultKategori) > 0) {
            while ($rowKategori = mysqli_fetch_assoc($resultKategori)) {
                $selected = ($rowKategori['idKategoriMenu'] == $menu['idKategoriMenu']) ? "selected" : "";
                echo "<option value='{$rowKategori['idKategoriMenu']}' $selected>{$rowKategori['namaKategori']}</option>";
            }
        } else {
            echo "<option value=''>Tidak ada kategori</option>";
        }
        ?>
    </select>
</div>

                                        <input type="hidden" name="idMenu" value="<?= $idMenu ?>" />
                                        <input type="submit" style="background-color : #4F06B8;" class="btn float-end text-white" name="btnSimpanMenu" value="Update Menu" >
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Rilo</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
