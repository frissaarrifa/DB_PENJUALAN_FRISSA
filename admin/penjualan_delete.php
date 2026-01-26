<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,"SELECT id_barang FROM penjualan WHERE id_jual='$id'");
$d = mysqli_fetch_assoc($data);

mysqli_query($koneksi,"
    UPDATE barang SET stok = stok + 1
    WHERE id_barang = '$d[id_barang]'
");

mysqli_query($koneksi,"DELETE FROM penjualan WHERE id_jual='$id'");

header("location:penjualan.php");
?>
