<?php
session_start();
// Cek apakah sudah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

// PERBAIKAN: Menggunakan REQUEST_METHOD agar 100% terdeteksi saat form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = bersihkanInput($_POST['nim']);
    $nama = bersihkanInput($_POST['nama']);
    $prodi = bersihkanInput($_POST['program_studi']);
    $angkatan = bersihkanInput($_POST['angkatan']);

    $query = "INSERT INTO data_mhs (nim, nama, program_studi, angkatan) VALUES ('$nim', '$nama', '$prodi', '$angkatan')";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        $_SESSION['pesan'] = 'tambah_sukses';
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal menambah data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h2>Tambah Data Baru</h2>
        <br>
        <form id="formMahasiswa" action="" method="POST" onsubmit="validasiDanKirim(event)">
            <div class="form-group">
                <label>NIM:</label>
                <input type="text" name="nim">
            </div>
            <div class="form-group">
                <label>Nama Lengkap:</label>
                <input type="text" name="nama">
            </div>
            <div class="form-group">
                <label>Program Studi:</label>
                <input type="text" name="program_studi">
            </div>
            <div class="form-group">
                <label>Angkatan:</label>
                <input type="number" name="angkatan">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="index.php" class="btn btn-warning" style="margin-left: 10px;">Kembali</a>
        </form>
    </div>

    <script>
    function validasiDanKirim(event) {
        event.preventDefault(); // Tahan form agar tidak langsung terkirim

        let form = document.getElementById('formMahasiswa');
        let nim = document.querySelector('input[name="nim"]').value.trim();
        let nama = document.querySelector('input[name="nama"]').value.trim();
        let prodi = document.querySelector('input[name="program_studi"]').value.trim();
        let angkatan = document.querySelector('input[name="angkatan"]').value.trim();

        if (nim === '' || nama === '' || prodi === '' || angkatan === '') {
            Swal.fire({
                title: 'Data Kurang Lengkap!',
                text: 'Pastikan semua kolom sudah diisi ya.',
                icon: 'warning',
                confirmButtonColor: '#f59e0b',
                backdrop: 'rgba(76, 29, 149, 0.4)'
            });
            return; 
        }

        Swal.fire({
            title: 'Yakin Menambahkan Data?',
            text: 'Data mahasiswa baru akan disimpan ke sistem.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#7e22ce',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Ya, Tambahkan!',
            cancelButtonText: 'Batal',
            backdrop: 'rgba(76, 29, 149, 0.4)'
        }).then((result) => {
            if (result.isConfirmed) {
                // PERBAIKAN: Langsung submit form-nya
                form.submit(); 
            }
        });
    }
    </script>
</body>
</html>