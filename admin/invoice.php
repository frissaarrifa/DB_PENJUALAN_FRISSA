<!DOCTYPE html>
<html lang="en">
<head>
    <title>Invoice Penjualan</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
</head>
<body>

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}

include '../koneksi.php';

if (!isset($_GET['id'])) {
    die("ID penjualan tidak ditemukan");
}

$id = $_GET['id'];

$penjualan = mysqli_query($koneksi, "
    SELECT penjualan.*, barang.nama_barang, barang.harga_jual, user.user_nama
    FROM penjualan
    JOIN barang ON penjualan.id_barang = barang.id_barang
    JOIN user ON penjualan.user_id = user.user_id
    WHERE penjualan.id_jual = '$id'
");

$p = mysqli_fetch_array($penjualan);

if (!$p) {
    die("Data penjualan tidak ditemukan");
}
?>

<div class="col-md-10 col-md-offset-1">

    <center>
        <h2>TOKO RPL</h2>
    </center>

    <table class="table">
        <tr>
            <th width="20%">No. Invoice</th>
            <th>:</th>
            <th>INV-<?php echo $p['id_jual']; ?></th>
        </tr>
        <tr>
            <th>Tanggal Jual</th>
            <th>:</th>
            <th><?php echo $p['tgl_jual']; ?></th>
        </tr>
        <tr>
            <th>Nama Kasir</th>
            <th>:</th>
            <th><?php echo $p['user_nama']; ?></th>
        </tr>
    </table>

    <br>

    <h4 class="text-center">Detail Penjualan</h4>
    <table class="table table-bordered table-striped">
        <tr>
            <th>Nama Barang</th>
            <th width="20%">Harga Jual</th>
            <th width="20%">Total Harga</th>
        </tr>
        <tr>
            <td><?php echo $p['nama_barang']; ?></td>
            <td>Rp. <?php echo number_format($p['harga_jual']); ?></td>
            <td>Rp. <?php echo number_format($p['total_harga']); ?></td>
        </tr>
    </table>

    <br>
    <p class="text-center"><i>"Terima Kasih Atas Pembelian Anda"</i></p>

</div>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>