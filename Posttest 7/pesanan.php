<?php
// Include file konfigurasi
include 'config.php';

// Ambil data dari form
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$bukti_pembayaran = $_FILES['bukti_pembayaran'];

// Generate nama file
$tanggal_waktu = date('Y-m-d_H-i-s');
$ekstensi = pathinfo($bukti_pembayaran['name'], PATHINFO_EXTENSION);
$nama_file = "$tanggal_waktu.$ekstensi";

// Simpan file ke direktori uploads
move_uploaded_file($bukti_pembayaran['tmp_name'], "uploads/$nama_file");

// Simpan data ke database
$sql = "INSERT INTO pemesanan (nama, jumlah, tanggal, bukti_pembayaran) VALUES ('$nama', '$jumlah', '$tanggal', '$nama_file')";
if (mysqli_query($conn, $sql)) {
    echo "Pemesanan berhasil!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>