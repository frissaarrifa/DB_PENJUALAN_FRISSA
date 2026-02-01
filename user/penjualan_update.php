<?php
include '../koneksi.php';

$id_jual     = $_POST['id_jual'];
$total_harga = $_POST['total_harga'];

mysqli_query($koneksi,"
    UPDATE penjualan SET total_harga='$total_harga'
    WHERE id_jual='$id_jual'
");

header("location:penjualan.php");
?>
