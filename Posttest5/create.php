<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
    $gambar = $_POST['gambar'];

    $sql = "INSERT INTO produk (nama_produk, deskripsi, harga, stok, kategori, gambar) 
            VALUES (:nama_produk, :deskripsi, :harga, :stok, :kategori, :gambar)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':nama_produk' => $nama_produk,
        ':deskripsi' => $deskripsi,
        ':harga' => $harga,
        ':stok' => $stok,
        ':kategori' => $kategori,
        ':gambar' => $gambar
    ]);

    echo "Produk berhasil ditambahkan!";
}
?>

<form method="POST">
    Nama Produk: <input type="text" name="nama_produk"><br>
    Deskripsi: <textarea name="deskripsi"></textarea><br>
    Harga: <input type="number" name="harga"><br>
    Stok: <input type="number" name="stok"><br>
    Kategori: <input type="text" name="kategori"><br>
    Gambar: <input type="text" name="gambar"><br>
    <button type="submit">Tambah Produk</button>
</form>
