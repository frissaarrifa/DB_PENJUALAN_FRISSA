<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Penjualan Barang</title>

    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
    <script type="text/javascript" src="../asset/js/jquery.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.js"></script>
</head>

<body style="background:#f0f0f0">

<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit();
}
?>

<nav class="navbar navbar-inverse" style="border-radius:0px;">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                data-toggle="collapse" data-target="#menu"
                aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php">
                Penjualan Barang
            </a>
        </div>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav">

                <li>
                    <a href="index.php">
                        <i class="glyphicon glyphicon-home"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="barang.php">
                        <i class="glyphicon glyphicon-th-large"></i> Barang
                    </a>
                </li>

                <li>
                    <a href="penjualan.php">
                        <i class="glyphicon glyphicon-shopping-cart"></i> Penjualan
                    </a>
                </li>

                <?php if ($_SESSION['user_status'] == 1) { ?>
                <li>
                    <a href="user.php">
                        <i class="glyphicon glyphicon-user"></i> User
                    </a>
                </li>
                <?php } ?>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <?= $_SESSION['username']; ?>
                        <b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="ganti_password.php">
                                <i class="glyphicon glyphicon-lock"></i> Ganti Password
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php">
                                <i class="glyphicon glyphicon-log-out"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
