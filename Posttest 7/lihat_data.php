<?php
include 'config.php';
// Query untuk mengambil semua data pemesanan
$sql = "SELECT * FROM pemesanan";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        // ... (dan seterusnya untuk kolom lainnya)
        echo "<td>
            <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
            <a href='hapus.php?id=" . $row['id'] . "'>Hapus</a>
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada data pemesanan.</td></tr>";
}

