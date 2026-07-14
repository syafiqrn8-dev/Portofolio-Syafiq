<?php

// if : logika percabangan yang digunakan untuk menentukan alur program
$nama = "Syafiq";
if ($nama == "Syafiq") {
    echo "Ya, nama saya adalah Syafiq";
} else {
    echo "Bukan, nama saya adalah Syafiq";
}

$nilai = 80;
if ($nilai >= 75) {
    echo "<br>";
    echo "Selamat, kamu lulus";
} else {
    echo "<br>";
    echo "Maaf, kamu tidak lulus";
}

$peserta = [
    [
        'nama' => 'Budiman',
        'umur' => 21,
        'tinggi' => 174.8,
        'jurusan' => "Desain",
    ],
    [
        'nama' => 'Chaerul',
        'umur' => 17,
        'tinggi' => 165.3,
        'jurusan' => "Junior Web Dev",
    ],
    [
        'nama' => 'Dzakwaan',
        'umur' => 16,
        'tinggi' => 168.7,
        'jurusan' => "Cyber Security",
    ],
    [
        'nama' => 'Fajar',
        'umur' => 18,
        'tinggi' => 172.1,
        'jurusan' => "Bahasa Inggris",
    ],
    [
        'nama' => 'Gibran',
        'umur' => 28,
        'tinggi' => 166.9,
        'jurusan' => "Teknik Komputer",
    ],
    [
        'nama' => 'Haykall',
        'umur' => 15,
        'tinggi' => 157.1,
        'jurusan' => "Perhotelan",
    ],
    [
        'nama' => 'Jason',
        'umur' => 25,
        'tinggi' => 181.6,
        'jurusan' => "Data Scientist",
    ],
];

$hari = "Senin";
switch($hari) {
    case "Senin";
        echo "Hari ini adalah hari Senin";
        break;
    case "Selasa";
        echo "Hari ini adalah hari Senin";
        break;
    default;
        echo "Hari ini bukan hari Senin ataupun Selasa";
        break;
}

function cekUmur (string $umur) {
    return ($umur >= 17) ? "Sudah Memiliki KTP" : "Belum Memliki KTP";
}
function cekKelas(string $jurusan){
    switch($jurusan) {
        case "Desain";
            echo "Desain Grafis";
            break;
        case "Junior Web Dev";
            echo "Junior Web Dev";
            break;
        case "Cyber Security";
            echo "Cyber Security";
            break;
        case "Bahasa Inggris";
            echo "Bahasa Inggris";
            break;
        case "Teknik Komputer";
            echo "Teknik Komputer";
            break;
        case "Perhotelan";
            echo "Perhotelan";
            break;
        case "Data Scientist";
            echo "Data Scientist";
            break;
        default;
            return "Jurusan Tidak Terdaftar";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Data PHP</title>
    <style>
        table {
            border: collapse;
            width: 80%;
        }

        th {
            background-color: darksalmon;
            color:blanchedalmond;
            border: 1px solid black;
            padding: 9px;
            text-align: center;
        }

        td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }

        tbody tr:nth-child(even) { /* Genap */
            background-color: #e7d3b885; 
        }
        
        tbody tr:nth-child(odd) { /* Ganjil */
            background-color: #f5f2d2;
        }
    </style>
</head>
<body>
    <h1>Belajar Table Data PHP</h1>
    <table border="1" align="center" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Tinggi</th>
                <th>Keterangan</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php foreach ($peserta as $index => $p){ ?>
                <tr>
                    <td style="color:red;"><?=  $index + 1 ?></td>
                    <td style="color:orange;"><?=  $p['nama']?></td>
                    <td style="color:green;"><?=  $p['umur']?></td>
                    <td style="color:blue;"><?=  $p['tinggi']?></td>
                    <td>
                        <?php echo cekUmur($p['umur']);?>
                    </td>
                    <td>
                        <?php echo cekKelas($p['jurusan']);?>
                    </td>
                </tr>
                <?php }?>
        </tbody>
    </table>
</body>
</html>

<!-- Baris 165 -->
<?php if($p['umur'] >= 17): ?>
    <span style="color: green; ">Sudah Memiliki KTP</span> 
<?php else: ?>
    <span style="color: red; ">Belum Memiliki KTP</span> 
<?php endif ?>
    <!-- Kondisi ringkas menggunakan Ternary -->
    <!-- <?php echo ($p['umur'] >= 17) ? 'Sudah Memiliki KTP' : 'Belum Memiliki KTP' ?> -->
    <!-- Hasil nya sama dengan kondisi if else, hanya saja code lebih ringkas -->