<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pemesan = $_POST['nama_pemesan'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $produk_hijab = $_POST['produk_hijab'];
    $jumlah = $_POST['jumlah'];
    $bukti_pembayaran = '';

    
    $maxFileSize = 2 * 1024 * 1024; // 2 MB
    if (isset($_FILES['bukti_pembayaran']) && $_FILES['bukti_pembayaran']['error'] == 0) {
        if ($_FILES['bukti_pembayaran']['size'] <= $maxFileSize) {
            $uploadDir = 'uploads/';
            $fileExt = pathinfo($_FILES['bukti_pembayaran']['name'], PATHINFO_EXTENSION);
            $newFileName = date('Y-m-d H.i.s') . '.' . $fileExt;
            $uploadFile = $uploadDir . $newFileName;

            if (move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], $uploadFile)) {
                $bukti_pembayaran = $uploadFile;
            } else {
                echo "Gagal mengupload bukti pembayaran.";
            }
        } else {
            echo "Ukuran file terlalu besar. Maksimal 2MB.";
        }
    }

    $sql = "INSERT INTO pemesanan (nama_pemesan, alamat, no_hp, produk_hijab, jumlah, bukti_pembayaran) 
            VALUES (:nama_pemesan, :alamat, :no_hp, :produk_hijab, :jumlah, :bukti_pembayaran)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->execute([
        ':nama_pemesan' => $nama_pemesan,
        ':alamat' => $alamat,
        ':no_hp' => $no_hp,
        ':produk_hijab' => $produk_hijab,
        ':jumlah' => $jumlah,
        ':bukti_pembayaran' => $bukti_pembayaran
    ]);

    echo "Pemesanan berhasil ditambahkan!";
}
?>

<form method="POST" enctype="multipart/form-data">
    Nama Pemesan: <input type="text" name="nama_pemesan" required><br>
    Alamat: <textarea name="alamat" required></textarea><br>
    No HP: <input type="text" name="no_hp" required><br>
    Produk Hijab: <input type="text" name="produk_hijab" required><br>
    Jumlah: <input type="number" name="jumlah" required><br>
    Bukti Pembayaran: <input type="file" name="bukti_pembayaran" required><br>
    <button type="submit">Tambah Pemesanan</button>
</form>
