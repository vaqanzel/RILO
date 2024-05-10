function hitungHargaSatuan(index) {
    var harga = document.getElementById('harga_'+index).value;
    var quantity = document.getElementById('quantity_'+index).value;
    hargaSatuan = harga * quan
    document.getElementById('harga_'+index).value = hargaSatuan;
}
var index = <?php echo $index ?>; // Menggunakan variabel $index untuk menentukan indeks dropdown
function tambahDropdown() {
    index++; // Meningkatkan indeks untuk dropdown baru
    var newDiv = document.createElement("div"); // Membuat elemen div baru
    newDiv.className = "input-group input-group-outline mb-3"; // Menetapkan kelas baru
    newDiv.innerHTML = `
        <label class="form-label"></label>
        <select id="idMenu_${index}" name="idMenu[]" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="hitungHargaSatuan(${index})" autofocus>
            <option selected>Pilih Menu</option>
            <?php 
                $dkat = mysqli_query($con,"SELECT * FROM menu ORDER BY namaMenu ASC");
                while ($bkat= mysqli_fetch_array($dkat)){
            ?>
            <option value="<?php echo $bkat['idMenu'] ?>"><?php echo $bkat['namaMenu'] ?></option>
            <?php } ?>
        </select>
        <label class="form-label"></label>
        <input id="quantity_${index}" type="number" class="form-control mb-3" name="quantity[]" placeholder="Quantity" min="1" onchange="hitungHargaSatuan(${index})" autofocus>
    `;
    document.body.insertBefore(newDiv, document.getElementById("tambahMenu")); // Menyisipkan elemen baru sebelum tombol "Tambah Menu"
}