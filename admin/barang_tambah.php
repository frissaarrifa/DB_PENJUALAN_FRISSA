<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container" style="margin-top:70px;">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default" style="padding:20px;">
<h4>Tambah Barang</h4>

<form method="POST" action="barang_simpan.php">

    <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Harga Beli</label>
        <input type="number" name="harga_beli" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Harga Jual</label>
        <input type="number" name="harga_jual" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <input type="submit" value="Simpan" class="btn btn-primary">
    <a href="barang.php" class="btn btn-default">Kembali</a>

</form>

</div>
</div>
</div>
