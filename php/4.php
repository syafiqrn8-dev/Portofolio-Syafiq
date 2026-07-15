<?php
$peserta = [
    [
        'nama' => 'Budiman',
        'umur' => 21,
        'tinggi' => 174.8,
    ],
    [
        'nama' => 'Chaerul',
        'umur' => 19,
        'tinggi' => 165.3,
    ],
    [
        'nama' => 'Dzakwaan',
        'umur' => 18,
        'tinggi' => 168.7,
    ],
    [
        'nama' => 'Fajar',
        'umur' => 20,
        'tinggi' => 172.1,
    ],
    [
        'nama' => 'Gibran',
        'umur' => 28,
        'tinggi' => 166.9,
    ],
    [
        'nama' => 'Haykall',
        'umur' => 15,
        'tinggi' => 157.1,
    ],
    [
        'nama' => 'Jason',
        'umur' => 25,
        'tinggi' => 181.6,
    ],
];
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
            color: blanchedalmond;
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
            </tr>
        </thead>
        <tbody align="center">
            <?php foreach ($peserta as $index => $p) { ?>
                <tr>
                    <td style="background-color:;"><?= $index + 1 ?></td>
                    <td style="background-color:;"><?= $p['nama'] ?></td>
                    <td style="background-color:;"><?= $p['umur'] ?></td>
                    <td style="background-color:;"><?= $p['tinggi'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>