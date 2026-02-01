<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container" style="margin-top:70px;">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default" style="padding:20px;">

<h4>Tambah Penjualan</h4>

<form method="POST" action="penjualan_simpan.php">

    <div class="form-group">
        <label>Barang</label>
        <select name="id_barang" class="form-control" required>
            <option value="">-- Pilih Barang --</option>
            <?php
            $barang = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok > 0");
            while($b = mysqli_fetch_assoc($barang)){
                echo "<option value='$b[id_barang]'>
                        $b[nama_barang] | Harga: Rp ".number_format($b['harga_jual'])." | Stok: $b[stok]
                      </option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Jumlah Beli</label>
        <input type="number" name="jumlah" class="form-control" min="1" required>
    </div>

    <div class="form-group">
        <label>Tanggal Jual</label>
        <input type="date" name="tgl_jual" class="form-control" required>
    </div>

    <input type="submit" value="Simpan" class="btn btn-primary">
    <a href="penjualan.php" class="btn btn-default">Kembali</a>

</form>

</div>
</div>
</div>
