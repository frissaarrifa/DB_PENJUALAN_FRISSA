<?php
include 'header.php';
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM user WHERE user_id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<div class="container">
    <div class="col-md-5 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Edit User</h4>
            </div>

            <div class="panel-body">
                <form method="post" action="user_update.php">
                    <input type="hidden" name="id" value="<?= $d['user_id']; ?>">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control"
                               value="<?= $d['user_nama']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"
                               value="<?= $d['username']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" <?= $d['user_status']==1?'selected':''; ?>>Admin</option>
                            <option value="0" <?= $d['user_status']==0?'selected':''; ?>>User</option>
                        </select>
                    </div>

                    <input type="submit" value="Update" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
