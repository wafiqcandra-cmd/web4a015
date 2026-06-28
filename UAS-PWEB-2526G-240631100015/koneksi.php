<?php
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "pendataan_mahasiswa";

// [GenAI] Blok koneksi database ini di-generate oleh AI
$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

/* =========================================================
[GenAI] FUNGSI TAMBAHAN (Memenuhi Syarat 2 Fungsi PHP) 
=========================================================
*/

function bersihkanInput($data) {
    global $koneksi;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($koneksi, $data);
}

function formatTeksAkademis($teks) {
    return ucwords(strtolower($teks));
}
?>