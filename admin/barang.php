<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container" style="margin-top:70px;">

    <div class="panel panel-default" style="padding:20px; background-color:white; box-shadow:0 0 10px rgba(0,0,0,0.1);">

        <div class="panel-heading">
            <h4>Data Barang</h4>
        </div>

        <div class="panel-body">

            <a href="barang_tambah.php" class="btn btn-sm btn-info pull-right" style="margin-bottom:10px;">
                <i class="glyphicon glyphicon-plus"></i> Tambah Barang
            </a>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width="20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_barang DESC");
                    $no = 1;

                    while ($d = mysqli_fetch_assoc($data)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_barang']; ?></td>
                        <td>Rp <?php echo number_format($d['harga_beli']); ?></td>
                        <td>Rp <?php echo number_format($d['harga_jual']); ?></td>
                        <td>
                            <?php
                            if ($d['stok'] > 0) {
                                echo "<span class='label label-success'>".$d['stok']."</span>";
                            } else {
                                echo "<span class='label label-danger'>Habis</span>";
                            }
                            ?>
                        </td>

                        <td>
                            <a href="barang_edit.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-sm btn-warning">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>

                            <a href="barang_delete.php?id=<?php echo $d['id_barang']; ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                <i class="glyphicon glyphicon-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>

</div>
