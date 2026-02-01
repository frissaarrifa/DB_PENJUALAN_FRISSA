<?php
include '../koneksi.php';
include 'header.php';
?>


<div class="container" style="margin-top:70px;">
    <div class="panel panel-default" style="padding:20px;background:#fff;">

        <div class="panel-heading">
            <h4>Data Penjualan</h4>
        </div>

        <div class="panel-body">

            <a href="penjualan_tambah.php" class="btn btn-info pull-right" style="margin-bottom:10px;">
                <i class="glyphicon glyphicon-plus"></i> Tambah Penjualan
            </a>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Jual</th>
                        <th>Tanggal</th>
                        <th>User</th>
                        <th>Barang</th>
                        <th>Total Harga</th>
                        <th width="20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($koneksi,"
                        SELECT * FROM penjualan
                        JOIN user ON penjualan.user_id = user.user_id
                        JOIN barang ON penjualan.id_barang = barang.id_barang
                        ORDER BY id_jual DESC
                    ");
                    $no = 1;
                    while($d = mysqli_fetch_assoc($data)){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['id_jual']; ?></td>
                        <td><?= $d['tgl_jual']; ?></td>
                        <td><?= $d['username']; ?></td>
                        <td><?= $d['nama_barang']; ?></td>
                        <td>Rp <?= number_format($d['total_harga']); ?></td>
                        <td>
                            <a href="penjualan_edit.php?id=<?= $d['id_jual']; ?>" class="btn btn-warning btn-sm">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                            <a href="penjualan_delete.php?id=<?= $d['id_jual']; ?>" class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin hapus data ini?')">
                                <i class="glyphicon glyphicon-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
