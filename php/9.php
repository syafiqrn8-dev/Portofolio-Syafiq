<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta</title>
    <style>
        table {
            /* margin: 20px; */
            border: collapse;
            width: 95%;
        }

        th {
            background-color: #275700;
            /* Hijau gelap bawaan */
            color: #ffffff;
            border: 1px solid black;
            padding: 9px;
            text-align: center;
        }

        td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            /* Genap */
            background-color: #e7d3b885;
        }

        tbody tr:nth-child(odd) {
            /* Ganjil */
            background-color: #ced38a;
        }

        .btn-tambah-data {
            margin-right: 15px;
            align-items: center;
            /* Membuat ikon dan teks sejajar lurus secara vertikal */
            gap: 6px;
            display: inline-flex;
            text-decoration: none;
            background-color: #275700;
            /* Hijau gelap bawaan */
            color: #ffffff;
            border-radius: 4px;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 300;
            border: 1px solid #1e4200;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Efek dimensi halus */
            transition: all 0.2s ease-in-out;
            /* Animasi transisi lebih lancar */
        }

        .btn-tambah-data:hover {
            background-color: #347300;
            /* Warna hijau sedikit lebih terang */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            /* Bayangan lebih tebal saat di-hover */
            transform: translateY(-1px);
            /* Tombol sedikit terangkat naik */
        }

        .btn-tambah-data:active {
            background-color: #1e4200;
            transform: translateY(0);
            /* Tombol kembali ke posisi semula */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .text-information {
            color: #347300;
            text-decoration: none;
        }

        /* Container Utama (Sudah disatukan & disesuaikan) */
        .form-container {
            max-width: 500px;
            /* Ukuran ideal, tidak terlalu lebar/sempit */
            margin: 8px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        form.form-container:hover {
            border: 0.5px solid #4b556383;
        }

        /* Header Halaman (Diubah ke tema hijau agar serasi) */
        .form-header {
            background: linear-gradient(135deg, #275700, #418704);
            padding: 1.5rem 2rem;
            color: #ffffff;
        }

        .form-header h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .form-header p {
            margin: 0.5rem 0 0 0;
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Area Isi Form */
        .form-body {
            padding: 1rem;
            background-color: #ffffff;
        }

        /* Pengaturan Jarak Baris */
        .form-group {
            margin: 20px;
        }

        /* Desain Label/Teks Petunjuk */
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #333333;
        }

        /* Desain Kotak Input */
        .form-group input {
            width: 100%;
            padding: 11px 14px;
            font-size: 14px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            box-sizing: border-box;
            /* Memastikan padding tidak merusak lebar input */
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        /* Efek Saat Kotak Input Diklik (Fokus) */
        .form-group input:focus {
            outline: none;
            border-color: #275700;
            box-shadow: 0 0 0 3px rgba(39, 87, 0, 0.15);
        }

        .form-group input:hover {
            background-color: #f0f8e5c0;
        }

        /* Kontainer Tombol Aksi */
        .form-actions {
            display: flex;
            gap: 12px;
            /* Jarak antar tombol */
            margin-top: 24px;
        }

        /* Tombol Submit (Hijau) */
        .btn-submit {
            flex: 1;
            padding: 8px;
            margin: 0px 0px 10px 20px;
            background-color: #275700;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-submit:hover {
            background-color: #347300;
        }

        /* Tombol Kembali (Abu-abu Netral) */
        .btn-kembali {
            flex: 1;
            padding: 8px;
            margin: 0px 20px 10px 0px;
            background-color: #f3f4f6;
            color: #4b5563;
            text-align: center;
            text-decoration: none;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-kembali:hover {
            background-color: #e5e7eb;
            color: #1f2937;
        }

        /* Container pembungkus judul */
        .table-header-section {
            margin: 2rem 0 1.5rem 0;
            /* Jarak atas dan bawah area judul */
            padding-bottom: 10px;
            border-bottom: 2px solid #e5e7eb;
            /* Garis abu-abu tipis pembatas */
            position: relative;
        }

        /* Desain Utama Judul */
        .main-title {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            /* Warna abu-abu sangat gelap, lebih modern dari hitam pekat */
            margin: 0;
            letter-spacing: -0.5px;
            /* Merapatkan huruf sedikit agar terlihat premium */
            position: relative;
            display: inline-block;
        }

        /* Desain Tombol Edit (Biru Modern) */
        .btn-edit {
            display: inline-block;
            text-decoration: none;
            background-color: #509e10;
            /* Biru */
            color: #ffffff !important;
            /* Memaksa warna teks tetap putih */
            padding: 2px 8px;
            font-size: 10px;
            font-weight: 600;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .btn-edit:hover {
            background-color: #086403;
            /* Biru lebih gelap saat disentuh */
        }

        /* Desain Tombol Delete (Merah Tegas) */
        .btn-delete {
            display: inline-block;
            text-decoration: none;
            background-color: #d63636;
            /* Merah */
            color: #ffffff !important;
            /* Memaksa warna teks tetap putih */
            padding: 2px 8px;
            font-size: 10px;
            font-weight: 600;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .btn-delete:hover {
            background-color: #7e0000;
            /* Merah lebih gelap saat disentuh */
        }
    </style>
</head>

<body>

    <?php if (isset($_GET['tambah'])): ?>
        <!-- Pembungkus untuk Halaman Tambah -->
        <div class="form-container">
            <div class="form-header">
                <h1>Tambah Data Peserta</h1>
                <p>Silakan isi formulir di bawah ini dengan data yang valid.</p>
            </div>
            <div class="form-body">
                <?php include 'form.php'; ?>
            </div>
        </div>

    <?php elseif (isset($_GET['edit'])): ?>
        <!-- Pembungkus untuk Halaman Edit -->
        <div class="form-container">
            <div class="form-header">
                <h1>Edit Data Peserta</h1>
                <p>Silakan isi formulir di bawah ini dengan data yang valid.</p>
            </div>
            <div class="form-body">
                <?php include 'form.php'; ?>
            </div>
        </div>

    <?php else: ?>
        <!-- Pembungkus untuk Halaman Utama/Tabel -->
        <div class="table-header-section">
            <h2 class="main-title">Data Peserta</h2>
        </div>
        <?php include 'table.php'; ?>

    <?php endif; ?>


</body>

</html>