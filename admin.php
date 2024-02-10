<?php
session_start();

// Kullanıcı adı ve şifre
$correct_username = "ADMIN";
$correct_password = "ADMIN123";

// Form gönderildi mi kontrol et
if(isset($_POST['submit'])) {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Kullanıcı adı ve şifre kontrolü
    if($input_username === $correct_username && $input_password === $correct_password) {
        $_SESSION['loggedin'] = true; // Oturumu başlat
        header('Location: yonetim.php'); // Yönetim sayfasına yönlendir
        exit();
    } else {
        echo "<p>Hatalı kullanıcı adı veya şifre.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Yönetici Girişi</title>
    <style>
        /* Genel stil */
        body {
            font-family: Arial, sans-serif; /* Varsayılan font */
            background-color: #f2f2f2; /* Arka plan rengi */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Giriş kutusu stil */
        .login-box {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 10px);
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Yönetici Girişi</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Kullanıcı Adı" required><br>
            <input type="password" name="password" placeholder="Şifre" required><br>
            <input type="submit" name="submit" value="Giriş Yap">
        </form>
    </div>
</body>
</html>
