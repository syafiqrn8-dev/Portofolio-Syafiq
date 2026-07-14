<!-- function: Sekumpulan kode yang dapat digunakan berulang kali -->

<?php

function salam()
{
    return "Hallo, selamat datang di PHP <br>";
}

echo salam(); // Memanggil fungi salam
echo salam(); // Memanggil fungi salam

echo "<br>";

function salamSyafiq(string $nama) { 
    return "Hallo <span style='color: red;'>" . $nama . "</span>, selamat datang di PHP <br>"; 
} 

echo salamSyafiq("Syafiq"); // Memanggil fungsi salam dengan argumen Syafiq
echo salamSyafiq("Syafiq"); // Memanggil fungsi salam dengan argumen Syafiq
