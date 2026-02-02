<?php
include 'header.php';
include '../koneksi.php';

if(!isset($_GET['id'])){
    header("location:penjualan.php");
    exit;
}

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
        <label>Barang</label>
        <select name="id_barang" class="form-control" required>
            <?php
            $barang = mysqli_query($koneksi,"SELECT * FROM barang");
            while($b = mysqli_fetch_assoc($barang)){
                $selected = ($b['id_barang'] == $d['id_barang']) ? "selected" : "";
                echo "<option value='$b[id_barang]' $selected>
                        $b[nama_barang] | Harga: Rp ".number_format($b['harga_jual'])."
                      </option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Total Harga</label>
        <input type="number" name="total_harga" class="form-control"
               value="<?= $d['total_harga']; ?>" required>
    </div>

    <div class="form-group">
        <label>Tanggal Jual</label>
        <input type="date" name="tgl_jual" class="form-control"
               value="<?= $d['tgl_jual']; ?>" required>
    </div>

    <input type="submit" value="Update" class="btn btn-primary">
    <a href="penjualan.php" class="btn btn-default">Kembali</a>

</form>

</div>
</div>
</div>
