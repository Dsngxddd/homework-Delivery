<?php
session_start();

// Giriş yapılmış mı kontrol et
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin.php'); // Giriş yapılmadıysa yönlendir
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Yönetim Sayfası</title>
    <style>
        /* Genel stil */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h2 {
            margin-bottom: 20px;
        }

        /* Video kutusu stil ayarları */
        .video-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-gap: 20px;
            max-width: 1200px;
            margin-top: 20px;
        }

        .video-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
        }

        video {
            width: 100%;
            border-radius: 8px;
        }

        form {
            margin-top: 10px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            border: none;
            background-color: #ff4d4d;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Öğrenci Videoları</h2>

    <div class="video-container">
        <?php
        // Veritabanı bağlantısı
        $servername = "localhost";
        $username = "USERNAME";
        $password = "PASSWORD";
        $dbname = "DBNAME";

        // MySQL bağlantısını oluştur
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Bağlantı hatası: " . $conn->connect_error);
        }

        // Videoları getirme sorgusu
        $sql = "SELECT * FROM videos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='video-item'>";
                echo "<p>Öğrenci: " . $row["isim"]. " " . $row["soyisim"]. " - Sınıf: " . $row["sinif"]. "</p>";
                echo "<video width='320' height='240' controls>";
                echo "<source src='uploads/" . $row["video_isim"] . "' type='video/mp4'>";
                echo "Tarayıcınız video etiketini desteklemiyor.";
                echo "</video>";

                // Silme butonu
                echo "<form method='post' action='delete.php'>";
                echo "<input type='hidden' name='video_id' value='" . $row["id"] . "'>"; // Silinecek video ID'si
                echo "<input type='submit' value='Sil'>";
                echo "</form>";

                echo "</div>";
            }
        } else {
            echo "<p>Veri bulunamadı.</p>";
        }
        ?>
    </div>
</body>
</html>
