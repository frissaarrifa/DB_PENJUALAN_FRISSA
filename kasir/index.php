<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_status'] != 2) {
    header("Location: ../login.php");
    exit;
}
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Kasir</title>
        <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
        <script type="text/javascript" src="asset/js/jquery.js"></script>
        <script type="text/javascript" src="asset/js/bootstrap.js"></script>
</head>
<body>
    <h1>Selamat Datang, Kasir <?php echo $_SESSION['username']; ?>!</h1>
    <a href="../logout.php">Logout</a>

    <h2>Form Penjualan</h2>
    <form action="proses_penjualan.php" method="POST">
        <label>Nama Barang:</label>
        <input type="text" name="nama_barang" required>

        <label>Jumlah:</label>
        <input type="number" name="jumlah" required>

        <label>Harga Satuan:</label>
        <input type="number" name="harga" required>

        <button type="submit">Proses Penjualan</button>
    </form>
</body>
</html>
