<?php
include '../koneksi.php';
session_start();

$id_barang = $_POST['id_barang'];
$jumlah   = $_POST['jumlah'];
$tgl_jual = $_POST['tgl_jual'];
$user_id  = $_SESSION['user_id'];

$barang = mysqli_query($koneksi,"SELECT harga_jual, stok FROM barang WHERE id_barang='$id_barang'");
$b = mysqli_fetch_assoc($barang);

if ($jumlah > $b['stok']) {
    echo "<script>
        alert('Stok tidak mencukupi!');
        window.location='penjualan_tambah.php';
    </script>";
    exit;
}

$total_harga = $jumlah * $b['harga_jual'];

mysqli_query($koneksi,"
    INSERT INTO penjualan (id_barang, tgl_jual, total_harga, user_id)
    VALUES ('$id_barang','$tgl_jual','$total_harga','$user_id')
");

mysqli_query($koneksi,"
    UPDATE barang SET stok = stok - $jumlah
    WHERE id_barang = '$id_barang'
");

header("location:penjualan.php");
?>
