<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    
    $file = 'users.txt';
    $userData = "$name,$email,$password\n";

    if (file_put_contents($file, $userData, FILE_APPEND)) {
        echo "Registrasi berhasil!";
    } else {
        echo "Terjadi kesalahan saat mendaftar.";
    }
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    
    $file = 'users.txt';
    $users = file($file);

    foreach ($users as $user) {
        list($name, $userEmail, $hashedPassword) = explode(",", trim($user));
        
        if ($userEmail === $email && password_verify($password, $hashedPassword)) {
            echo "Login berhasil! Selamat datang, $name.";
            exit;
        }
    }
    echo "Email atau kata sandi salah.";
}
?>
