<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>
<body>
    <h1>BELAJAR PHP</h1>
    <?php
    $namaDepan = "Syafiq Raihan";
    $namaBelakang = "Nafis";
    $umur = 18;
    $tinggi = 169.5;
    echo "<p>Nama Depan Ku : " . $namaDepan . "</p>";
    echo "<p>Nama Belakang Ku : " . $namaBelakang . "</p>";
    echo "<p>Umur Ku : " . $umur . "</p>";
    echo "<p>Tinggi Ku : " . $tinggi . "</p>";
    ?>
    <p>Nama Depan Saya : <?php echo $namaDepan ?></p>
    <p>Nama Belakang Saya : <?php echo $namaBelakang ?></p>
    <p>Umur Saya : <?php echo $umur ?></p>
    <p>Tinggi Saya : <?php echo $tinggi ?></p>
    <br>

    <?php
    function myTestStatic() {
    static $x = 1;
    static $string = "TestFunction";
    echo $x;
    echo "<br>";
    echo $string;
    $x++;
    $string = str_increment($string); // Menggantikan $x++
    }
    echo "Ini Hasil kata kunci Statis";
    echo "<br>";
    myTestStatic();
    echo "<br>";
    myTestStatic();
    echo "<br>";
    myTestStatic();
    echo "<br>";
    echo "<br>";
    ?> 

    <?php
    $x = 5;
    $y = 10;

    function myTestGlobal() {
    global $x, $y;
    $y = $x + $y;
    }

    myTestGlobal();
    echo "<p> Ini hasil kata kunci Global: " . $y; "</p>"; // outputs 15
    ?>

</body>
</html>