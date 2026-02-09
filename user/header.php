<?php
session_start();

if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}


if ($_SESSION['user_status'] != 2) {
    header("location:../admin/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kasir | Sistem Penjualan</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
    <script type="text/javascript" src="../asset/js/jquery.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.js"></script>
</head>

<body style="background:#f0f0f0">

<nav class="navbar navbar-inverse" style="border-radius:0;">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                KASIR PENJUALAN
            </a>
        </div>

        <ul class="nav navbar-nav">
            <li class="active">
                <a href="index.php">
                    <i class="glyphicon glyphicon-shopping-cart"></i> Penjualan
                </a>
            </li>

            <li><a href="laporan.php"><i class="glyphicon glyphicon-list-alt"></i>Laporan</a></li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="logout.php">
                    <i class="glyphicon glyphicon-log-out"></i> Logout
                </a>
            </li>
        </ul>

    </div>
</nav>
