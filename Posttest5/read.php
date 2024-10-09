<?php
require 'config.php';

$sql = "SELECT * FROM produk";
$stmt = $pdo->query($sql);

echo "<h2>Daftar Produk</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nama Produk</th><th>Deskripsi</th><th>Harga</th><th>Stok</th><th>Kategori</th><th>Gambar</th></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['ID_produk'] . "</td>";
    echo "<td>" . $row['nama_produk'] . "</td>";
    echo "<td>" . $row['deskripsi'] . "</td>";
    echo "<td>" . $row['harga'] . "</td>";
    echo "<td>" . $row['stok'] . "</td>";
    echo "<td>" . $row['kategori'] . "</td>";
    echo "<td><img src='" . $row['gambar'] . "' width='100'></td>";
    echo "</tr>";
}

echo "</table>";
?>
