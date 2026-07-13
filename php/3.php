<!-- Array: Tipe data yang bisa menampung banyak nilai dan bisa di panggil satu-persatu data di dalam tampungan Array tersebut -->
<!-- Array dapat menampung berbagai Tipe Data: String, Integer, Boolean -->

<?php 

$kerangjangBuah = array("Apel", "Berry", "Jeruk", "Mangga", "Pisang");
$kerangjangBuah = ["Apel", "Berry", "Jeruk", "Mangga", "Pisang"];
// Karena index dihitung dari 0 jadi nilai pertama 0 = Apel
echo $kerangjangBuah[0];
echo "<br>";
echo $kerangjangBuah[2];
foreach($kerangjangBuah as $tempatBuah);
echo "<br>";

// Array assosiative menggunakan string/kalimat sebagai index
$siswa = [
    "nama" => "Anto Siregar",
    "umur" => 20,
    "tinggi" => 172.5,
    "alamat" => " Jl. Jerman (Jendral soedirman)"
];
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
        'umur' => 19,
        'tinggi' => 165.3,
    ],
    [
        'nama' => 'Fajar',
        'umur' => 19,
        'tinggi' => 165.3,
    ],
];

echo "Nama Siswa: " . $siswa['nama'];
echo "<br>";
echo "peserta 1 :" . $peserta [0]['nama'];
echo "<br>";
echo "peserta 1 :" . $peserta [1]['nama'];

foreach($peserta as $index => $value){
    echo "<br>";
    echo " Peserta ke-" . ($index + 1) . " : " . $value['nama'];
}
