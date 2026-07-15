<?php

include 'koneksi.php'; {
    // Select: Tampilkan semua data dari tabel peserta

    // $insert = mysqli_query($koneksi, "INSERT INTO peserta (nama, umur, tinggi) VALUES('$nama', '$umur', '$tinggi')");
    $query = mysqli_query($koneksi, "SELECT * FROM peserta"); // belum menghasilkan data baru total data
    // fetch_assoc() = mengambil data dari hasil query dan menghasilkan sebagai array asosiatif
    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

    // Jika parameter delete ada / tidak kosong
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = mysqli_query($koneksi, "DELETE FROM peserta WHERE id='$id'");
        header('location:9.php?hapus=berhasil');
    }
}
?>
<div class="tombol-tambah-data" align="right" style="margin-bottom: 10px;">
    <a href="9.php?tambah" class="btn-tambah-data">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="currentColor">
            <path d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2z" />
        </svg>
        <span>Tambah Data</span>
    </a>
</div>
<table border="1" align="center" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Tinggi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody align="center">
        <?php foreach ($rows as $index => $row) { ?>
            <tr>
                <td><?php echo $index + 1 ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['umur'] ?></td>
                <td><?php echo $row['tinggi'] ?></td>
                <td><a href="9.php?edit=<?php echo $row['id'] ?>" class="btn-edit">Edit</a> |
                    <a onclick="return confirm('apakah kamu yakin akan menghapus data ini?')"
                        href="table.php?delete=<?php echo $row['id'] ?>" class="btn-delete">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>