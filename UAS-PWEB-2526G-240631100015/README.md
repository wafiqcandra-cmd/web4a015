# Sistem Pendataan Mahasiswa

> UAS Pemrograman Web — Penilaian Berbasis Proyek

---

## Identitas Mahasiswa

| Bidang | Detail |
| :--- | :--- |
| **Nama** | Wafiq Candra Kurniawan |
| **NIM** | 240631100015 |
| **Mata Kuliah** | Pemrograman Web |
| **Judul Aplikasi** | Sistem Pendataan Mahasiswa |

---

## Deskripsi Aplikasi

**Sistem Pendataan Mahasiswa** adalah aplikasi web sederhana untuk mengelola data akademik mahasiswa Universitas Trunojoyo Madura. Aplikasi ini memungkinkan pengguna untuk menambah, melihat, mengedit, dan menghapus data mahasiswa secara mudah, efisien, dan aman karena telah dilengkapi dengan autentikasi pengguna.

**Fitur utama:**
* Keamanan akses halaman dengan fitur Login dan Logout pengguna
* Beranda yang menampilkan daftar seluruh data mahasiswa dalam tabel terstruktur
* Tambah data mahasiswa baru dengan validasi keamanan (mencegah input kosong)
* Edit atau pembaruan data mahasiswa secara efisien
* Hapus data mahasiswa yang dilengkapi dengan pop-up konfirmasi keamanan
* Notifikasi *pop-up* interaktif yang estetis (berhasil/peringatan) menggunakan SweetAlert2
* Desain antarmuka (UI) yang bersih, rapi, dan *aesthetic* menggunakan CSS murni

---

## Struktur Basis Data

**Basis data:** `pendataan_mahasiswa`

**Tabel:** `data_mhs`

| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id` | INT AUTO_INCREMENT | Kunci Utama (Primary Key) |
| `nim` | VARCHAR(20) | Nomor Induk Mahasiswa |
| `nama` | VARCHAR(100) | Nama lengkap mahasiswa |
| `program_studi` | VARCHAR(50) | Program studi mahasiswa |
| `angkatan` | INT | Tahun angkatan mahasiswa |

**Tabel:** `admin` *(Untuk Keamanan Akses)*

| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id` | INT AUTO_INCREMENT | Kunci Utama (Primary Key) |
| `username` | VARCHAR(50) | Username untuk akses login |
| `password` | VARCHAR(255) | Password login (dienkripsi MD5) |

---

## Berkas Struktur

* `index.php` — Halaman Beranda & Daftar Mahasiswa (Read)
* `tambah.php` — Halaman Tambah Data (Create)
* `edit.php` — Halaman Edit Data (Update)
* `hapus.php` — Halaman Hapus Data (Delete)
* `koneksi.php` — Koneksi database & fungsi kustom
* `login.php` — Halaman autentikasi masuk
* `logout.php` — Skrip proses keluar sesi
* `database.sql` — File SQL struktur & data awal database
* `css/style.css` — Stylesheet eksternal aesthetic
* `README.md` — Dokumentasi proyek

---

## Cara Menjalankan Aplikasi

Pastikan aplikasi web server lokal seperti XAMPP atau Laragon sudah terinstal dan berjalan di komputer/laptop Anda. Aktifkan modul **Apache** dan **MySQL**.

**Langkah-langkah**

1. **Kloning / Unduh Repositori**
   ```bash
   git clone [https://github.com/WafiqCandra/UAS-PWEB-2526G-240631100015.git](https://github.com/WafiqCandra/UAS-PWEB-2526G-240631100015.git)
Pindah ke folder server

XAMPP: pindah atau ekstrak folder ke C:/xampp/htdocs/

Laragon: pindah atau ekstrak folder ke C:/laragon/www/

Impor Basis Data

Buka phpMyAdmin di browser: http://localhost/phpmyadmin

Buat basis data baru dengan nama pendataan_mahasiswa

Klik Impor → pilih file database.sql dari folder project

Klik Lanjutkan / Impor

Akses Aplikasi
Buka browser dan ketikkan alamat: http://localhost/UAS-PWEB-2526G-240631100015

Akses Login Default:
Username: admin | Password: 123

Daftar Periksa Spesifikasi
HTML

[x] Struktur HTML5 yang benar (<!DOCTYPE html>, meta tag)

[x] Minimal 4 halaman: Beranda, Tambah, Edit, Hapus (+ Login/Logout)

CSS

[x] CSS eksternal (css/style.css)

[x] Tampilan rapi, elegan, dan aesthetic (Gradient UI)

[x] CSS Kustom murni (tanpa Bootstrap)

PHP

[x] Variabel ($koneksi, $nim, $nama, dll)

[x] Percabangan (if/else, validasi form, autentikasi sesi)

[x] Perulangan (while untuk array data tabel)

[x] Pemrosesan Form (GET dan POST)

[x] Implementasi include atau require

[x] Fungsi Minimal 2 di koneksi.php:

bersihkanInput()

formatTeksAkademis()

MySQL

[x] Fungsionalitas CRUD berjalan 100%

[x] Terdapat 1 Database & 2 Tabel

[x] Memiliki minimal 5 data awal bawaan

[x] Menyertakan file database.sql

Aplikasi Tangkapan Layar

## Aplikasi Tangkapan Layar

**Halaman Login:**



Pernyataan Penggunaan GenAI
Jika proyek ini dikembangkan dengan menggunakan Perangkat Kecerdasan Artifisial (GenAI), maka harus dinyatakan di dalam GitHub dan Video YouTube.

Deklarasi: Saya menyatakan bahwa proyek ini dikembangkan dengan memanfaatkan bantuan Generative AI secara proporsional. AI digunakan untuk efisiensi penulisan kerangka struktur tabel MySQL pada database.sql, generate dummy data, referensi logika perulangan array, serta modifikasi library SweetAlert2. Selebihnya, perancangan desain antarmuka, fungsionalitas CRUD inti, keamanan session, dan integrasi alur program disesuaikan secara mandiri. Kode yang menggunakan bantuan AI telah ditandai dengan komentar khusus di dalam source code
