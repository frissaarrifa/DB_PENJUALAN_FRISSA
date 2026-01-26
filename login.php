<?php
session_start();
if (isset($_SESSION['user_status'])) {
    if ($_SESSION['user_status'] == 1) {
        header("Location: admin/index.php");
        exit;
    } elseif ($_SESSION['user_status'] == 2) {
        header("Location: kasir/index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login Sistem Penjualan</h2>
    <form action="login_proses.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
