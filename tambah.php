<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/koneksi.php';

if (isset($_POST['submit'])) {

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $query = "INSERT INTO siswa (nis, nama, kelas, jurusan)
              VALUES ('$nis', '$nama', '$kelas', '$jurusan')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        die("Gagal menambahkan data: " . mysqli_error($koneksi));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Siswa - StudentAPP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                StudentAPP
            </a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="tambah.php">
                            Tambah Siswa
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Form -->
    <div class="container my-5">

        <div class="card">

            <div class="card-header">
                Tambah Data Siswa
            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="text"
                               name="nis"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text"
                               name="nama"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <input type="text"
                               name="kelas"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>

                        <select name="jurusan" id="jurusan" class="form-select" required>
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="PPLG">PPLG</option>
                            <option value="TJKT">TJKT</option>
                            <option value="AKKUL">AKKUL</option>
                            <option value="MPLB">MPLB</option>
                            <option value="PS">PS</option>
                        </select>
                    </div>
                    </div>

                    <button type="submit"
                            name="submit"
                            class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="index.php"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>