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
<html>
<head>
    <title>Form Pemesanan Hijab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h1>Form Pemesanan Hijab</h1>
        <form action="proses_pemesanan.php" method="post" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            <br>
            <label for="jumlah">Jumlah Hijab:</label>
            <input type="number" id="jumlah" name="jumlah" required>
            <br>
            <label for="tanggal">Tanggal Pemesanan:</label>
            <input type="date" id="tanggal" name="tanggal" required>
            <br>
            <label for="bukti_pembayaran">Upload Bukti Pembayaran:</label>
            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" required>
            <br>
            <button type="submit">Pesan</button>
        </form>
    </div>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>File Upload</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        </tbody>
</table>

<section id="form" class="form-section">
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        
    <script src="script.js"></script>
    

</body>
</html>