<?php
include '../koneksi.php';

$nama  = $_POST['nama_barang'];
$beli  = $_POST['harga_beli'];
$jual  = $_POST['harga_jual'];
$stok  = $_POST['stok'];

$query = mysqli_query($koneksi, "
    INSERT INTO barang 
    (nama_barang, harga_beli, harga_jual, stok) 
    VALUES 
    ('$nama', '$beli', '$jual', '$stok')
");

if ($query) {
    echo "<script>
        alert('Barang berhasil ditambahkan');
        window.location='barang.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal menambahkan barang');
        history.back();
    </script>";
}
?>
