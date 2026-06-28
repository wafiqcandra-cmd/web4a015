<?php
session_start();
require 'koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = bersihkanInput($_POST['username']);
    $password = md5(bersihkanInput($_POST['password']));

    $cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
    
    if (mysqli_num_rows($cek) === 1) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username; 
        $_SESSION['pesan'] = 'login_sukses'; 
        header("Location: index.php");
        exit;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Pendataan Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
    <style>.login-container { max-width: 400px; margin: 100px auto; }</style>
</head>
<body>
    <div class="container login-container">
        <h2>Login Sistem</h2>
        <div class="header-text">Silakan masuk untuk mengelola data</div>
        
        <?php if (isset($error)) : ?>
            <p style="color: red; text-align: center; font-size:14px; font-weight:bold;">Username atau password salah!</p>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required placeholder="Masukkan username Anda">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Masukkan password Anda">
            </div>
            <button type="submit" name="login" class="btn btn-primary" style="width: 100%;">Masuk</button>
        </form>
    </div>
</body>
</html>