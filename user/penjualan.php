<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Penjualan</h4>
        </div>

        <div class="panel-body">

            <a href="penjualan_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            <br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Id Jual</th>
                    <th>Tanggal Jual</th>
                    <th>User</th>
                    <th>Barang</th>
                    <th>Total Harga</th>
                    <th>Opsi</th>
                </tr>

                <?php
                $no = 1;
                $data = mysqli_query($koneksi, "
                    SELECT penjualan.*, user.username, barang.nama_barang
                    FROM penjualan
                    JOIN user ON penjualan.user_id = user.user_id
                    JOIN barang ON penjualan.id_barang = barang.id_barang
                    ORDER BY penjualan.id_jual DESC
                ");

                while ($d = mysqli_fetch_assoc($data)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['id_jual']; ?></td>
                    <td><?= $d['tgl_jual']; ?></td>
                    <td><?= $d['username']; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td>Rp <?= number_format($d['total_harga']); ?></td>
                    <td>
                        <a href="penjualan_edit.php?id=<?= $d['id_jual']; ?>" 
                           class="btn btn-info btn-sm">Edit</a>

                        <a href="penjualan_delete.php?id=<?= $d['id_jual']; ?>" 
                           onclick="return confirm('Yakin ingin menghapus?')" 
                           class="btn btn-danger btn-sm">Hapus</a>

                        <a href="penjualan_cetak.php?id=<?= $d['id_jual']; ?>" 
                           target="_blank" 
                           class="btn btn-primary btn-sm">
                           Cetak
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>

        </div>
    </div>
</div>