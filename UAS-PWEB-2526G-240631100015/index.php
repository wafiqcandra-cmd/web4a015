<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Pendidikan Informatika UTM</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div style="text-align: right;">
            <a href="#" class="btn btn-danger" onclick="konfirmasiAksi(event, 'logout.php', 'logout')">Logout</a>
        </div>
        
        <h2>Sistem Pendataan Mahasiswa</h2>
        <div class="header-text">Program Studi Pendidikan Informatika - Universitas Trunojoyo Madura</div>
        
        <a href="tambah.php" class="btn btn-primary">+ Tambah Data Mahasiswa</a>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM data_mhs ORDER BY id DESC";
                $result = mysqli_query($koneksi, $query);

                // --- BEGIN GEN-AI: Logika perulangan array untuk memecah data dari database ---
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . formatTeksAkademis($row['program_studi']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['angkatan']) . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                            <a href='#' class='btn btn-danger' onclick='konfirmasiAksi(event, \"hapus.php?id=" . $row['id'] . "\", \"hapus\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                // --- END GEN-AI ---
                ?>
            </tbody>
        </table>
    </div>

    <script>
    function konfirmasiAksi(event, url, aksi) {
        event.preventDefault(); 
        
        let judul = '';
        let pesan = '';
        let warnaTombol = '';
        let teksTombol = '';

        if (aksi === 'logout') {
            judul = 'Yakin ingin keluar?';
            pesan = 'Sesi Anda akan diakhiri dan harus login kembali.';
            warnaTombol = '#be123c'; 
            teksTombol = 'Ya, Logout!';
        } else if (aksi === 'hapus') {
            judul = 'Hapus Data Ini?';
            pesan = 'Data yang sudah dihapus tidak dapat dikembalikan!';
            warnaTombol = '#be123c'; 
            teksTombol = 'Ya, Hapus!';
        }

        Swal.fire({
            title: judul,
            text: pesan,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: warnaTombol,
            cancelButtonColor: '#94a3b8', 
            confirmButtonText: teksTombol,
            cancelButtonText: 'Tidak, Batal',
            background: '#ffffff',
            backdrop: 'rgba(76, 29, 149, 0.4)'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
    </script>
    <?php if (isset($_SESSION['pesan'])) : ?>
        <script>
            let pesanAction = '<?= $_SESSION['pesan']; ?>';
            let namaUser = '<?= isset($_SESSION['username']) ? ucfirst($_SESSION['username']) : "Admin"; ?>';
            
            if (pesanAction === 'login_sukses') {
                Swal.fire({
                    title: 'Login Berhasil!',
                    text: 'Selamat datang kembali, ' + namaUser + '!',
                    icon: 'success',
                    confirmButtonColor: '#7e22ce',
                    backdrop: 'rgba(76, 29, 149, 0.4)'
                });
            } else if (pesanAction === 'tambah_sukses') {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data mahasiswa baru berhasil ditambahkan.',
                    icon: 'success',
                    confirmButtonColor: '#7e22ce',
                    backdrop: 'rgba(76, 29, 149, 0.4)'
                });
            } else if (pesanAction === 'edit_sukses') {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data mahasiswa berhasil diperbarui.',
                    icon: 'success',
                    confirmButtonColor: '#7e22ce',
                    backdrop: 'rgba(76, 29, 149, 0.4)'
                });
            } else if (pesanAction === 'hapus_sukses') {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data mahasiswa telah dihapus.',
                    icon: 'success',
                    confirmButtonColor: '#7e22ce',
                    backdrop: 'rgba(76, 29, 149, 0.4)'
                });
            }
        </script>
        <?php unset($_SESSION['pesan']); ?>
    <?php endif; ?>
</body>
</html>