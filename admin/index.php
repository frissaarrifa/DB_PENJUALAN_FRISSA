<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">

    <div class="alert alert-info text-center">
        <h4 style="margin-bottom:0;">
            <b>Selamat Datang!</b> Sistem Informasi Penjualan Barang
        </h4>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Dashboard</h4>
        </div>

        <div class="panel-body">
<div class="row">

    <!-- USER -->
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-user"></i>
                    <span class="pull-right">
                        <?php
                        echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM user"));
                        ?>
                    </span>
                </h1>
                Jumlah User
            </div>
        </div>
    </div>

    <!-- BARANG -->
    <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-th-large"></i>
                    <span class="pull-right">
                        <?php
                        echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM barang"));
                        ?>
                    </span>
                </h1>
                Jumlah Barang
            </div>
        </div>
    </div>

    <!-- PENJUALAN -->
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                    <span class="pull-right">
                        <?php
                        echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM penjualan"));
                        ?>
                    </span>
                </h1>
                Total Penjualan
            </div>
        </div>
    </div>

    <!-- TOTAL PENDAPATAN -->
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-usd"></i>
                    <span class="pull-right">
                        <?php
                        $total = mysqli_query($koneksi,
                            "SELECT SUM(total_harga) AS total FROM penjualan");
                        $t = mysqli_fetch_assoc($total);
                        echo "Rp " . number_format($t['total'], 0, ',', '.');
                        ?>
                    </span>
                </h1>
                Total Pendapatan
            </div>
        </div>
    </div>

</div>

    <!-- RIWAYAT PENJUALAN -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Riwayat Penjualan Terakhir</h4>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Barang</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                </tr>

                <?php
                $data = mysqli_query($koneksi,"SELECT * FROM penjualan JOIN user ON penjualan.user_id = user.user_id
                    JOIN barang ON penjualan.id_barang = barang.id_barang ORDER BY id_jual DESC LIMIT 10");

                $no = 1;
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['username']; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td><?= $d['tgl_jual']; ?></td>
                    <td><?= $d['total_harga']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</div>
