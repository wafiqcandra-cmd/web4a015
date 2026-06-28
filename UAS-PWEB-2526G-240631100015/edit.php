<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$id = $_GET['id'];
$query_ambil = "SELECT * FROM data_mhs WHERE id = '$id'";
$result = mysqli_query($koneksi, $query_ambil);
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = bersihkanInput($_POST['nim']);
    $nama = bersihkanInput($_POST['nama']);
    $prodi = bersihkanInput($_POST['program_studi']);
    $angkatan = bersihkanInput($_POST['angkatan']);

    // --- BEGIN GEN-AI: Syntax penulisan query UPDATE data MySQL ---
    $query_update = "UPDATE data_mhs SET nim='$nim', nama='$nama', program_studi='$prodi', angkatan='$angkatan' WHERE id='$id'";
    $hasil = mysqli_query($koneksi, $query_update);
    // --- END GEN-AI ---

    if ($hasil) {
        $_SESSION['pesan'] = 'edit_sukses';
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal update data!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>
        <br>
        <form id="formMahasiswa" action="" method="POST" onsubmit="validasiDanKirim(event)">
            <div class="form-group">
                <label>NIM:</label>
                <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']); ?>">
            </div>
            <div class="form-group">
                <label>Nama Lengkap:</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>">
            </div>
            <div class="form-group">
                <label>Program Studi:</label>
                <input type="text" name="program_studi" value="<?= htmlspecialchars($data['program_studi']); ?>">
            </div>
            <div class="form-group">
                <label>Angkatan:</label>
                <input type="number" name="angkatan" value="<?= htmlspecialchars($data['angkatan']); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="index.php" class="btn btn-warning" style="margin-left: 10px;">Batal</a>
        </form>
    </div>

    <script>
    function validasiDanKirim(event) {
        event.preventDefault(); 

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
            title: 'Yakin Menyimpan Perubahan?',
            text: 'Data mahasiswa yang lama akan ditimpa dengan data baru ini.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#7e22ce',
            cancelButtonColor: '#94a3b8',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal',
            backdrop: 'rgba(76, 29, 149, 0.4)'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); 
            }
        });
    }
    </script>
    </body>
</html>