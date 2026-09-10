<?php
define('HOST_NAME','localhost');
define('USER_NAME','root');
define('PASSWORD','');
define('DB_NAME','db_sekolah');
$koneksi = mysqli_connect(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}