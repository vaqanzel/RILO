<?php 
include '../assets/header.php';

function getPelayanOptions($koneksi) {
    $result = mysqli_query($koneksi, "SELECT * FROM pelayan");
    $options = "";
    while ($row = mysqli_fetch_array($result)) {
        $options .= '<option value="'. $row['idPelayan']. '">'. $row['nama'] . '</option>';
    }
    return $options;
}
?>

<div id="layoutSidenav">
    <?php include '../assets/sidebar.php' ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
            <h4 class="mt-4" style="color :#AF06B8 ">Data Pesanan</h4>
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
                      <form role="form" action="data.php" class="text-start" method="POST">
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label"></label>
                            <input id="idPembeli" type="text" class="form-control" name="nama_pembeli" placeholder="Nama Pembeli" autofocus>
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label"></label>
                            <select name="idPelayan" class="form-select" aria-placeholder="Pilih Pelayan">
                                <?php echo getPelayanOptions($con); ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btnSimpan"  style="background-color : #AF06B8" class="btn float-end text-white me-1" ><i class="bi-save"></i>Simpan</button>
                            <button type="button" class="btn btn-danger float-end" data-bs-dismiss="modal"><i class="bi-x-circle"></i> Batal</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-md-left">
                    <div class="col col-lg-15">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                <th scope="col">NO</th>
                                <th scope="col">ID Pesanan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">ID Pelayan</th>
                                <th scope="col">ID Pembeli</th>
                                <th scope="col"colspan=2>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                                     include "../koneksi.php";
                                     $no = 1;
                                     $qrec = mysqli_query($con, "SELECT * FROM pesanan");
                                     while ($rec = mysqli_fetch_array($qrec))
                                     {            
                                 ?>
                                <tr>
                                    <th scope="row"><?= $no ?></th>
                                    <td><?= $rec['idPesanan'] ?></td>
                                    <td><?= $rec['tanggalPesanan'] ?></td>
                                    <td><?= $rec['idPelayan'] ?></td>
                                    <td><?= $rec['idPembeli'] ?></td>
                                    <td><a href="#"> Detail Pesanan </a></td>
                                    <td><a href="updatepembeli.php?idPembeli=<?= $rec["idPembeli"] ?>"> Edit</a> </td>
                                    <td><a href="data.php?idPembeli=<?= $rec["idPembeli"] ?>"> Delete </a> </td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php include '../assets/footer.php' ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="http://localhost/rilo/assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="http://localhost/rilo/assets/demo/chart-area-demo.js"></script>
<script src="http://localhost/rilo/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="http://localhost/rilo/assets/js/datatables-simple-demo.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

