<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/koneksi.php';

$query = "SELECT * FROM siswa";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!doctype html>
<html lang="en">

<head>
    <style>
    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    .container {
        flex: 1;
    }

    .footer {
        background-color: #2c3e50;
        color: white;
        text-align: center;
        padding: 25px 0;
        margin-top: 50px;
    }

    .footer p {
        margin: 0;
        font-size: 15px;
    }
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>STUDENT APP</title>

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

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            <h4>Data Siswa</h4>
        </div>      

        <div class="card-body">

            <a href="tambah.php" class="btn btn-primary mb-3">
                Tambah Siswa
            </a>

            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>JURUSAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>
                        <td><?= $no++ ?></td>

                        <td><?= $row['nis'] ?></td>

                        <td><?= $row['nama'] ?></td>

                         <td><?= $row['kelas'] ?></td>

                        <td><?= $row['jurusan'] ?></td>

                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="hapus.php?id=<?= $row['id'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
    <footer class="footer">
            <p>&copy; 2025 StudentAPP. All rights reserved.</p>
        </footer> 
</body>
</html>