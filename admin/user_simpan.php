<?php
include '../koneksi.php';

$nama     = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$status   = $_POST['status'];

mysqli_query($koneksi,"
    INSERT INTO user (username,password,user_nama,user_status)
    VALUES ('$username','$password','$nama','$status')
");

header("location:user.php");
