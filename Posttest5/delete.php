<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['ID_produk'];

    $sql = "DELETE FROM produk WHERE ID_produk = :id";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([':id' => $id]);

    echo "Produk berhasil dihapus!";
}
?>


<form method="POST">
    ID Produk: <input type="number" name="ID_produk"><br>
    <button type="submit">Hapus Produk</button>
</form>
