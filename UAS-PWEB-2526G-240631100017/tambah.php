<?php include 'koneksi.php';
include 'header.php';
if (isset($_POST['simpan'])) {
    $n = $_POST['nama'];
    $nim = $_POST['nim'];
    $p = $_POST['prodi'];
    $i = $_POST['ipk'];
    mysqli_query($koneksi, "INSERT INTO mahasiswa(nim,nama,prodi,ipk) VALUES('$nim','$n','$p','$i')");
    header('Location:daftar.php');
} ?><form method='post'>NIM<input name='nim'><br>Nama<input name='nama'><br>Prodi<input name='prodi'><br>IPK<input name='ipk'><br><button name='simpan'>Simpan</button></form><?php include 'footer.php'; ?>