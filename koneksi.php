<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_listrik";

$koneksi  = mysqli_connect($hostname, $username, $password, $database);

if( ! $koneksi) {
    die('Gagal konek ke database');
}
// buka ->  localhost/aplikasi_listrik/koneksi.php
// kalau halamannya kosong, artinya berhasil