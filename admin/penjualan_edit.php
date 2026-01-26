<?php
include 'header.php';
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM penjualan WHERE id_jual='$id'");
$d = mysqli_fetch_assoc($data);
?>

<div class="container" style="margin-top:70px;">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default" style="padding:20px;">

<h4>Edit Penjualan</h4>

<form method="POST" action="penjualan_update.php">

    <input type="hidden" name="id_jual" value="<?= $d['id_jual']; ?>">

    <div class="form-group">
        <label>Total Harga</label>
        <input type="number" name="total_harga" class="form-control"
               value="<?= $d['total_harga']; ?>" required>
    </div>

    <input type="submit" value="Update" class="btn btn-primary">
    <a href="penjualan.php" class="btn btn-default">Kembali</a>

</form>

</div>
</div>
</div>
