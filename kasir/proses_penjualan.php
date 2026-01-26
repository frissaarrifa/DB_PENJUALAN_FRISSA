<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_status'] != 2) {
    header("Location: ../login.php");
    exit;
}
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jumlah = (int)$_POST['jumlah'];
    $harga = (int)$_POST['harga'];
    $total = $jumlah * $harga;

    mysqli_query($koneksi, "INSERT INTO penjualan (user_id, nama_barang, jumlah, total_harga, tgl_jual)
         VALUES ('".$_SESSION['user_id']."', '$nama_barang', '$jumlah', '$total', NOW())");
    ?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Hasil Penjualan</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <h2>Penjualan Berhasil!</h2>
        <p>Barang: <?php echo $nama_barang; ?></p>
        <p>Jumlah: <?php echo $jumlah; ?></p>
        <p>Harga Satuan: <?php echo $harga; ?></p>
        <p>Total: <?php echo $total; ?></p>
        <a href="index.php">Kembali ke Form Penjualan</a>
    </body>
    </html>

<?php
}
?>
