<?php

// bahasa pemrograman berbasis server-side scripting yang 
// digunakan untuk pengembangan web dan dapat disisipkan ke dalam HTML.
// PHP awalnya dibuat oleh Rasmus Lerdorf pada tahun 1994. PHP adalah singkatan dari "PHP: Hypertext Prepocessor".

// echo ""; //string : admin@gmail.com
// echo ""; //string 

echo "Hallo Dok";

// Variabel: penampunagn data yang dapat berubah-ubah selama program berjalan

$variabel = "Ini adalah variabel"; //string
echo "<br>"; // <br> untuk memberikan batas untuk baris baru
$aku = "Syafiq"; //String

echo $variabel; // output: Ini aadalah variabel
echo "<br>";
echo $aku; // output: Syafiq
echo "<br>";

$namaDepan = "Syafiq Raihan"; //string
$namaBelakang = "Nafis"; //string
// concatination : penggabungan dua string atau lebih menjadi satu string
echo $namaDepan . " " . $namaBelakang; // output: Syafiq Raihan Nafis
echo "<br>";
$welcomeMessage = "Selamat Datang";
echo $welcomeMessage . ", " . $aku;

$umur = 18; //integer
$tinggi = 169.5; //float
echo "<br>";
echo "Umur saya adalah " . $umur . " tahun";
echo "<br>";
echo "Tinggi saya adalah " . $tinggi . "cm";

?>