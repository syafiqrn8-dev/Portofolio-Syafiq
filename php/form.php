<?php
// ob_start();
include 'koneksi.php';
// Select: Tampilkan semua data dari tabel peserta
// ob_clean();
// Jika button submit di klik
if (isset($_POST['submit'])) {
    // ambil data dari form dengan atribut name
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $tinggi = $_POST['tinggi'];

    $id = isset($_GET['edit']) ? $_GET['edit'] : null;
    if ($id) {
        // Update
        $update = mysqli_query($koneksi, "UPDATE peserta SET nama='$nama', umur='$umur', tinggi='$tinggi' WHERE id='$id'");
    } else {
        // Insert
        $insert = mysqli_query($koneksi, "INSERT INTO peserta (nama, umur, tinggi) VALUES('$nama', '$umur', '$tinggi')");
    }

    header("location:9.php");
    // fetch_assoc() = mengambil data dari hasil query dan menghasilkan sebagai array asosiatif
    // exit();
}

$id = isset($_GET['edit']) ? $_GET['edit'] : null;
if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM peserta WHERE id='$id'");
    $row = mysqli_fetch_assoc($query);
}


?>
<form action="" method="post" class="form-container">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan nama lengkap" required
            value="<?php echo isset($row['nama']) ? $row['nama'] : ''; ?>">
    </div>

    <div class="form-group">
        <label for="umur">Umur</label>
        <input type="number" name="umur" id="umur" min="0" max="120" placeholder="Contoh: 25" required>
    </div>

    <div class="form-group">
        <label for="tinggi">Tinggi (cm)</label>
        <input type="text" name="tinggi" id="tinggi" placeholder="Contoh: 170" required>
    </div>

    <div class="form-actions">
        <button type="submit" name="submit" class="btn-submit">Submit</button>
        <a href="9.php" class="btn-kembali">Kembali</a>
    </div>
</form>

<!-- 
Structure Query Language SQL :  Bahasa yang digunakan untuk mengelola dan memanipulasi basis data relasional.
 SQL memungkinkan pengguna untuk melakukan berbagai operasi pada basis data,
 termasuk membuat, membaca, memperbarui, dan menghapus data.
 
DDL : Data Definition Language (DDL)
 adalah bagian dari SQL yang digunakan untuk mendefinisikan struktur basis data.

DML : Data Manipulation Language (DML) 
 adalah bagian dari SQL yang digunakan untuk memanipulasi data dalam basis data.
    - Insert : digunakan untuk menambahkan data baru ke dalam tabel
    - Update : digunakan untuk memperbarui data yang sudah ada dalam tabel
    - Select : 
    - Delete : 
-->