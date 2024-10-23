<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'database.php';
    
    $email = $_POST['email'];
    
    
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
     
        $reset_token = bin2hex(random_bytes(50)); 
        $reset_link = "https://example.com/reset_password.php?token=" . $reset_token;

        $sql = "UPDATE users SET reset_token = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $reset_token, $email);
        $stmt->execute();

       
        $to = $email;
        $subject = "Pemulihan Kata Sandi";
        $message = "Klik tautan berikut untuk mengatur ulang kata sandi Anda: " . $reset_link;
        $headers = "From: admin@hijabstore.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Tautan pemulihan telah dikirim ke email Anda.";
        } else {
            echo "Gagal mengirim email.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
}
?>
