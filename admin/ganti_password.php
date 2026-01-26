<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Ganti Password</h4>
        </div>

        <div class="panel-body">

            <form method="post">
                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" name="password_lama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password_baru" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="konfirmasi_password" class="form-control" required>
                </div>

                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                <a href="index.php" class="btn btn-danger">Kembali</a>
            </form>

        </div>
    </div>

</div>

<?php
if (isset($_POST['submit'])) {

    $password_lama = md5($_POST['password_lama']);
    $password_baru = md5($_POST['password_baru']);
    $konfirmasi    = md5($_POST['konfirmasi_password']);

    $id = $_SESSION['user_id'];

    $cek = mysqli_query($koneksi,
        "SELECT * FROM user WHERE user_id='$id' AND password='$password_lama'");

    if (mysqli_num_rows($cek) == 0) {
        echo "<script>alert('Password lama salah');</script>";
    } else {

        if ($password_baru != $konfirmasi) {
            echo "<script>alert('Konfirmasi password tidak sama');</script>";
        } else {

            mysqli_query($koneksi,
                "UPDATE user SET password='$password_baru' WHERE user_id='$id'");

            echo "<script>alert('Password berhasil diganti');window.location='index.php';</script>";
        }
    }
}
?>
