<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Filter Laporan Penjualan</h4>
        </div>
        <div class="panel-body">
            <form method="get">
                <table class="table table-bordered">
                    <tr>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><input type="date" name="tgl_dari" class="form-control" required></td>
                        <td><input type="date" name="tgl_sampai" class="form-control" required></td>
                        <td><input type="submit" value="Filter" class="btn btn-primary"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php if (isset($_GET['tgl_dari'])) { 
    $dari = $_GET['tgl_dari'];
    $sampai = $_GET['tgl_sampai'];
?>
    <div class="panel">
        <div class="panel-heading">
            <h4>Laporan Penjualan  
                <b><?php echo $dari; ?></b> s/d <b><?php echo $sampai; ?></b>
            </h4>
        </div>
        <div class="panel-body">

        <a target="_blank" href="invoice_cetak.php"class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Cetak </a>

            <br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Kasir</th>
                    <th>Total Harga</th>
                </tr>

                <?php
                $no = 1;
                $data = mysqli_query($koneksi,"
                    SELECT * FROM penjualan 
                    JOIN barang ON penjualan.id_barang = barang.id_barang
                    JOIN user ON penjualan.user_id = user.user_id
                    WHERE tgl_jual BETWEEN '$dari' AND '$sampai'
                    ORDER BY id_jual DESC
                ");

                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>INV-<?php echo $d['id_jual']; ?></td>
                    <td><?php echo $d['tgl_jual']; ?></td>
                    <td><?php echo $d['nama_barang']; ?></td>
                    <td><?php echo $d['user_nama']; ?></td>
                    <td><?php echo "Rp. ".number_format($d['total_harga']); ?></td>
                </tr>
                <?php } ?>
            </table>

        </div>
    </div>
<?php } ?>
</div>