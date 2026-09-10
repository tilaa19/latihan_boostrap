<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/koneksi.php';

if (!isset($_GET['id'])) {
    die("ID siswa tidak ditemukan.");
}

$id = $_GET['id'];

$query = "DELETE FROM siswa WHERE id = $id";

$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: index.php");
    exit;
} else {
    die("Gagal menghapus data: " . mysqli_error($koneksi));
}
?>