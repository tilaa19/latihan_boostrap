<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/koneksi.php';

if (!isset($_GET['id'])) {
    die("ID siswa tidak ditemukan.");
}

$id = $_GET['id'];

// Ambil data siswa berdasarkan ID
$query = "SELECT * FROM siswa WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Data siswa tidak ditemukan.");
}

// Proses update
if (isset($_POST['submit'])) {

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $query = "UPDATE siswa SET
                nis = '$nis',
                nama = '$nama',
                kelas = '$kelas',
                jurusan = '$jurusan'
              WHERE id = $id";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        die("Gagal mengubah data: " . mysqli_error($koneksi));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Siswa - StudentAPP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            <h4>Edit Data Siswa</h4>
        </div>

        <div class="card-body">

            <form method="POST">

                <!-- NIS -->
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>

                    <input type="text"
                           name="nis"
                           id="nis"
                           class="form-control"
                           value="<?= htmlspecialchars($row['nis']) ?>"
                           required>
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>

                    <input type="text"
                           name="nama"
                           id="nama"
                           class="form-control"
                           value="<?= htmlspecialchars($row['nama']) ?>"
                           required>
                </div>

                <!-- Kelas -->
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>

                    <input type="text"
                           name="kelas"
                           id="kelas"
                           class="form-control"
                           value="<?= htmlspecialchars($row['kelas']) ?>"
                           required>
                </div>

                <!-- Jurusan -->
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>

                    <select name="jurusan"
                            id="jurusan"
                            class="form-select"
                            required>

                        <option value="">-- Pilih Jurusan --</option>

                        <option value="PPLG"
                            <?= $row['jurusan'] == 'PPLG' ? 'selected' : '' ?>>
                            PPLG
                        </option>

                        <option value="TJKT"
                            <?= $row['jurusan'] == 'TJKT' ? 'selected' : '' ?>>
                            TJKT
                        </option>

                        <option value="AKKUL"
                            <?= $row['jurusan'] == 'AKKUL' ? 'selected' : '' ?>>
                            AKKUL
                        </option>

                        <option value="MPLB"
                            <?= $row['jurusan'] == 'MPLB' ? 'selected' : '' ?>>
                            MPLB
                        </option>

                        <option value="PS"
                            <?= $row['jurusan'] == 'PS' ? 'selected' : '' ?>>
                            PS
                        </option>

                    </select>
                </div>

                <button type="submit"
                        name="submit"
                        class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="index.php"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>