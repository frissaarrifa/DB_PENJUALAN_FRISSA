<?php
include '../koneksi.php';

$id       = $_POST['id'];
$nama     = $_POST['nama'];
$username = $_POST['username'];
$status   = $_POST['status'];

mysqli_query($koneksi,"
    UPDATE user SET 
    user_nama='$nama',
    username='$username',
    user_status='$status'
    WHERE user_id='$id'
");

header("location:user.php");
