<?php
include 'header.php';
include '../koneksi.php';

$id = $_GET['id'];

$penjualan = mysqli_query($koneksi,"
    SELECT * FROM penjualan 
    WHERE id_jual='$id'
");
$p = mysqli_fetch_assoc($penjualan);
?>

<div class="container">
    <br><br><br>
    <div class="col-md-6 col-md-offset-3">

        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Data Penjualan</h4>
            </div>

            <div class="panel-body">

                <form method="POST" action="penjualan_update.php">

                    <input type="hidden" name="id_jual" value="<?php echo $p['id_jual']; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $p['user_id']; ?>">

                    <div class="form-group">
                        <label>Barang</label>
                        <select name="id_barang" class="form-control" required>
                            <?php
                            $barang = mysqli_query($koneksi,"SELECT * FROM barang");
                            while($b = mysqli_fetch_assoc($barang)){
                                $selected = ($b['id_barang'] == $p['id_barang']) ? "selected" : "";
                            ?>
                                <option value="<?php echo $b['id_barang']; ?>" <?php echo $selected; ?>>
                                    <?php echo $b['nama_barang']; ?> (Stok: <?php echo $b['stok']; ?>)
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" min="1" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Jual</label>
                        <input type="date" name="tgl_jual" class="form-control" 
                               value="<?php echo $p['tgl_jual']; ?>" required>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Update">
                    <a href="penjualan.php" class="btn btn-default">Kembali</a>

                </form>

            </div>
        </div>

    </div>
</div>