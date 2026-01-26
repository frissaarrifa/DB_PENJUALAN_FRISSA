<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container" style="margin-top:70px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Data User</h4>
        </div>

        <div class="panel-body">
            <a href="user_tambah.php" class="btn btn-info btn-sm pull-right">
                <i class="glyphicon glyphicon-plus"></i> Tambah User
            </a>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>

                <?php
                $no = 1;
                $data = mysqli_query($koneksi,"SELECT * FROM user ORDER BY user_id DESC");
                while($d = mysqli_fetch_assoc($data)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['username']; ?></td>
                    <td><?= $d['user_nama']; ?></td>
                    <td>
                        <?= ($d['user_status']==1) ? 'Admin' : 'User'; ?>
                    </td>
                    <td>
                        <a href="user_edit.php?id=<?= $d['user_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="user_delete.php?id=<?= $d['user_id']; ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus user ini?')">
                           Hapus
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
