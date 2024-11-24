<?php
session_start();
if (!isset($_SESSION['data'])) {
    die("Tidak ada data untuk ditampilkan.");
}

$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Hasil Pendaftaran</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Nama</th>
                <td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $data['email']; ?></td>
            </tr>
            <tr>
                <th>Umur</th>
                <td><?php echo $data['age']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $data['address']; ?></td>
            </tr>
            <tr>
                <th>Browser</th>
                <td><?php echo $data['userAgent']; ?></td>
            </tr>
        </table>

        <h2>Isi File</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Baris</th>
                <th>Isi</th>
            </tr>
            <?php foreach ($data['fileLines'] as $index => $line): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($line); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
