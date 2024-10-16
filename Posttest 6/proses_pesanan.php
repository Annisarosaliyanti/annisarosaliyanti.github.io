<?php
// config.php
$host = "localhost";
$username = "root";
$password = "";
$database = "toko_hijab";

// Koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proses_pemesanan</title>
</head>
<body>
<h2>Form Pemesanan</h2>
<form method="post" action="proses_pemesanan.php">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required><br>
    <label for="jumlah_tiket">Jumlah Tiket:</label>
    <input type="number" id="jumlah_tiket" name="jumlah_tiket" required><br>   

    <input type="submit" value="Pesan">
</form>
</body>
</html>