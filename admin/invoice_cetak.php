<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laporan Penjualan</title>
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

$data = mysqli_query($koneksi, "
    SELECT penjualan.*, user.username, barang.nama_barang
    FROM penjualan
    JOIN user ON penjualan.user_id = user.user_id
    JOIN barang ON penjualan.id_barang = barang.id_barang
    ORDER BY id_jual ASC
");
?>

<div class="container">
    <center>
        <h2>TOKO RPL</h2>
        <p><i>Laporan Penjualan</i></p>
        <hr>
    </center>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Invoice</th>
            <th>Tanggal</th>
            <th>Kasir</th>
            <th>Barang</th>
            <th>Total Harga</th>
        </tr>

        <?php
        $no = 1;
        $grand_total = 0;

        while ($d = mysqli_fetch_assoc($data)) {
            $grand_total += $d['total_harga'];
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td>INV-<?= $d['id_jual']; ?></td>
            <td><?= $d['tgl_jual']; ?></td>
            <td><?= $d['username']; ?></td>
            <td><?= $d['nama_barang']; ?></td>
            <td>Rp <?= number_format($d['total_harga']); ?></td>
        </tr>
        <?php } ?>

        <tr>
            <th colspan="5" style="text-align:right">TOTAL PENJUALAN</th>
            <th>Rp <?= number_format($grand_total); ?></th>
        </tr>
    </table>

    <center>
        <i>"Laporan resmi sistem penjualan"</i>
    </center>
</div>

<script>
    window.print();
</script>

</body>
</html>