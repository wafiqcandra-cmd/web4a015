<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM data_mhs WHERE id = '$id'";

if(mysqli_query($koneksi, $query)) {
    $_SESSION['pesan'] = 'hapus_sukses'; 
    header("Location: index.php");
} else {
    echo "Gagal menghapus data.";
}
?>