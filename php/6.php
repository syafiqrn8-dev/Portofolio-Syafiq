<!-- Looping di PHP -->

<?php

for ($i = 0; $i < 10; $i++) {
    echo "perulangan ke-$i <br>"; // Perulangan for
}

$j = 1;
while ($j <= 10) {
    echo "Perulangan ke-$j <br>"; // Perulangan while
    $j++;
}

$k = 1;
do {
    echo "Perulangan ke-$k <br>"; // Perulangan do-while
    $k++;
} while ($k <= 10);

// Tipe Data Array
$buah = ["Apel", "Berry", "Durian", "Jeruk"];
// Index = Apel[0], Berry[1], Durian[2], Jeruk[3]
$buah[] = "Pisang"; // Menambahkan Data Array
foreach ($buah as $key => $item) {
    echo "Index: $key, Nilai: $item";
}