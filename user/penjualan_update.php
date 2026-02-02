<?php
include '../koneksi.php';

$id_jual   = $_POST['id_jual'];
$id_barang = $_POST['id_barang'];
$jumlah    = $_POST['jumlah'];
$tgl_jual  = $_POST['tgl_jual'];
$user_id   = $_POST['user_id'];

$lama = mysqli_query($koneksi,"
    SELECT * FROM penjualan WHERE id_jual='$id_jual'
");
$l = mysqli_fetch_assoc($lama);

$barang_lama = mysqli_query($koneksi,"
    SELECT * FROM barang WHERE id_barang='".$l['id_barang']."'
");
$bl = mysqli_fetch_assoc($barang_lama);

$stok_kembali = $bl['stok'] + ($l['total_harga'] / $bl['harga_jual']);
mysqli_query($koneksi,"
    UPDATE barang SET stok='$stok_kembali'
    WHERE id_barang='".$l['id_barang']."'
");

$barang = mysqli_query($koneksi,"
    SELECT * FROM barang WHERE id_barang='$id_barang'
");
$b = mysqli_fetch_assoc($barang);

if($jumlah > $b['stok']){
    echo "<script>
        alert('Stok tidak mencukupi!');
        window.location='penjualan_edit.php?id=$id_jual';
    </script>";
    exit;
}

$total_harga = $b['harga_jual'] * $jumlah;

$stok_baru = $b['stok'] - $jumlah;
mysqli_query($koneksi,"
    UPDATE barang SET stok='$stok_baru'
    WHERE id_barang='$id_barang'
");

mysqli_query($koneksi,"
    UPDATE penjualan SET
        id_barang='$id_barang',
        user_id='$user_id',
        total_harga='$total_harga',
        tgl_jual='$tgl_jual'
    WHERE id_jual='$id_jual'
");

header("location:penjualan.php");