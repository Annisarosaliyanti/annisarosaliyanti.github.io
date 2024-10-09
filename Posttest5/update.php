<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['ID_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
    $gambar = $_POST['gambar'];

    $sql = "UPDATE produk SET nama_produk = :nama_produk, deskripsi = :deskripsi, 
            harga = :harga, stok = :stok, kategori = :kategori, gambar = :gambar 
            WHERE ID_produk = :id";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':nama_produk' => $nama_produk,
        ':deskripsi' => $deskripsi,
        ':harga' => $harga,
        ':stok' => $stok,
        ':kategori' => $kategori,
        ':gambar' => $gambar,
        ':id' => $id
    ]);

    echo "Produk berhasil diperbarui!";
}
?>

<form method="POST">
    ID Produk: <input type="number" name="ID_produk"><br>
    Nama Produk: <input type="text" name="nama_produk"><br>
    Deskripsi: <textarea name="deskripsi"></textarea><br>
    Harga: <input type="number" name="harga"><br>
    Stok: <input type="number" name="stok"><br>
    Kategori: <input type="text" name="kategori"><br>
    Gambar: <input type="text" name="gambar"><br>
    <button type="submit">Perbarui Produk</button>
</form>
