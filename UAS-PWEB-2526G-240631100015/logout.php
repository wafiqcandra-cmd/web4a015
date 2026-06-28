<?php
session_start();
// Hapus semua session
$_SESSION = [];
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Logout - Berhasil</title>
    <link rel="stylesheet" href="css/style.css"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        Swal.fire({
            title: 'Berhasil Logout!',
            text: 'Anda telah keluar dari sistem secara aman.',
            icon: 'success',
            confirmButtonColor: '#7e22ce', // Ungu primary
            confirmButtonText: 'Kembali ke Halaman Login',
            background: '#ffffff',
            backdrop: 'rgba(76, 29, 149, 0.4)'
        }).then((result) => {
            // Setelah klik OK, lempar ke login.php
            window.location.href = 'login.php';
        });
    </script>
</body>
</html>