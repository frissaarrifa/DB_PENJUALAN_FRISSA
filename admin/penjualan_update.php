<?php
include '../koneksi.php';

$id_jual     = $_POST['id_jual'];
$id_barang   = $_POST['id_barang'];
$total_harga = $_POST['total_harga'];
$tgl_jual    = $_POST['tgl_jual'];

mysqli_query($koneksi,"UPDATE penjualan SET
    id_barang='$id_barang',
    total_harga='$total_harga',
    tgl_jual='$tgl_jual'
    WHERE id_jual='$id_jual'
");

header("location:penjualan.php");
