<?php
require 'database.php';
$searchTerm = $_GET['query'];

$sql = "SELECT * FROM products WHERE name LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$searchTerm%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div>{$row['name']} - Rp {$row['price']}</div>";
}
?>
