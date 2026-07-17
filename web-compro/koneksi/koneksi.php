<?php

/** @var mysqli $koneksi */
$servername = "localhost";
$_username = "root";
$_password = "";
$_database = "db_cms_jwd";

$koneksi = mysqli_connect($servername, $_username, $_password, $_database);

if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}