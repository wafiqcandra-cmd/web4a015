<?php include 'koneksi.php';
include 'functions.php';
include 'header.php';
$d = mysqli_query(
    $koneksi,
    "SELECT * FROM mahasiswa ORDER BY nim+0 ASC"
); ?><table>

    <td>
        <a class="btn-edit"
            href="edit.php?id=<?= $r['id'] ?>">
            Edit
        </a>

        <a class="btn-hapus"
            href="hapus.php?id=<?= $r['id'] ?>">
            Hapus
        </a>
    </td>
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>IPK</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr><?php while ($r = mysqli_fetch_assoc($d)) { ?><tr>
            <td><?= $r['nim'] ?></td>
            <td><?= $r['nama'] ?></td>
            <td><?= $r['prodi'] ?></td>
            <td><?= $r['ipk'] ?></td>
            <td><?= statusMahasiswa($r['ipk']) ?></td>
            <td><a href='edit.php?id=<?= $r['id'] ?>'>Edit</a> | <a href='hapus.php?id=<?= $r['id'] ?>'>Hapus</a></td>
        </tr><?php } ?>
</table><?php include 'footer.php';
        ?>