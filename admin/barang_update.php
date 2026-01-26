<?php
include '../koneksi.php';

// ambil data dari form
$id_barang   = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga_beli  = $_POST['harga_beli'];
$harga_jual  = $_POST['harga_jual'];
$stok        = $_POST['stok'];

// validasi sederhana
if ($id_barang == "" || $nama_barang == "" || $harga_beli == "" || $harga_jual == "" || $stok == "") {
    echo "<script>alert('Data tidak boleh kosong!'); window.location='barang.php';</script>";
    exit;
}

// update data barang
mysqli_query($koneksi, "
    UPDATE barang SET
        nama_barang = '$nama_barang',
        harga_beli  = '$harga_beli',
        harga_jual  = '$harga_jual',
        stok        = '$stok'
    WHERE id_barang = '$id_barang'
");

// notifikasi & redirect
echo "<script>
    alert('Data barang berhasil diperbarui');
    window.location='barang.php';
</script>";
?>
