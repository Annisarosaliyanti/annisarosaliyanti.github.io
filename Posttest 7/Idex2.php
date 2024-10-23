<?php
include 'read.php'; // Memanggil data pesanan
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pemesanan Hijab</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>CRUD Pemesanan Hijab</h1>
    
    <h2>Tambah Pesanan Baru</h2>
    <form method="POST" action="create.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="create">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>
        <label for="jenis_hijab">Jenis Hijab:</label>
        <input type="text" name="jenis_hijab" required><br>
        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" required><br>
        <label for="alamat">Alamat:</label>
        <textarea name="alamat" required></textarea><br>
        <label for="file_upload">Upload File:</label>
        <input type="file" name="file_upload"><br>
        <button type="submit">Tambah Pesanan</button>
    </form>
    
    <h2>Daftar Pesanan</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Hijab</th>
            <th>Jumlah</th>
            <th>Alamat</th>
            <th>File</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?php echo $order["id"]; ?></td>
            <td><?php echo $order["nama"]; ?></td>
            <td><?php echo $order["jenis_hijab"]; ?></td>
            <td><?php echo $order["jumlah"]; ?></td>
            <td><?php echo $order["alamat"]; ?></td>
            <td><?php echo $order["file_name"] ? '<a href="uploads/'.$order["file_name"].'">Download</a>' : 'Tidak ada file'; ?></td>
            <td>
                <form method="POST" action="delete.php" style="display: inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $order["id"]; ?>">
                    <button type="submit">Hapus</button>
                </form>
                <button onclick="editOrder(<?php echo $order['id']; ?>)">Edit</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <script>
    function editOrder(id) {
        // Ambil data pesanan dari server menggunakan AJAX
        alert("Edit pesanan dengan ID: " + id);
        // Implementasi form edit bisa ditambahkan di sini
    }
    </script>

    
</body>
</html>
