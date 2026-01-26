<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $user = mysqli_fetch_assoc($query);

    if ($user) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_status'] = (int)$user['user_status'];

        if ($_SESSION['user_status'] == 1) {
            header("Location: admin/index.php");
            exit;
        } elseif ($_SESSION['user_status'] == 2) {
            header("Location: kasir/index.php");
            exit;
        } else {
            echo "Role tidak dikenali!";
            exit;
        }
    } else {
        echo "<p>Username atau password salah!</p>";
        echo "<a href='login.php'>Kembali ke login</a>";
    }
}
?>
