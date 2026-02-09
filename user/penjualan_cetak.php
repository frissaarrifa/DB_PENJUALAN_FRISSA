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
    echo "<h3>ID penjualan tidak ditemukan</h3>";
    exit;
}

$id = $_GET['id'];

$data = mysqli_query($koneksi, "
    SELECT penjualan.*, user.username, barang.nama_barang
    FROM penjualan
    JOIN user ON penjualan.user_id = user.user_id
    JOIN barang ON penjualan.id_barang = barang.id_barang
    WHERE penjualan.id_jual = '$id'
");

$d = mysqli_fetch_assoc($data);

if (!$d) {
    echo "<h3>Data penjualan tidak ditemukan</h3>";
    exit;
}
?>

<div class="container">
    <center>
        <h2>TOKO RPL</h2>
        <p><i>Invoice Penjualan</i></p>
        <hr>
    </center>

    <table class="table">
        <tr>
            <th width="30%">No Invoice</th>
            <th>:</th>
            <td>INV-<?= $d['id_jual']; ?></td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <th>:</th>
            <td><?= $d['tgl_jual']; ?></td>
        </tr>
        <tr>
            <th>Kasir</th>
            <th>:</th>
            <td><?= $d['username']; ?></td>
        </tr>
        <tr>
            <th>Barang</th>
            <th>:</th>
            <td><?= $d['nama_barang']; ?></td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <th>:</th>
            <td>Rp <?= number_format($d['total_harga']); ?></td>
        </tr>
    </table>

    <br>
    <center>
        <i>"Terima kasih atas pembelian Anda"</i>
    </center>
</div>

<script>
    window.print();
</script>

</body>
</html>