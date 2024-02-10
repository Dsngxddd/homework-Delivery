<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "mpalsitekullanici";
$password = "PASSWORD";
$dbname = "DBNAME";

// Silinecek video ID'sini al
if(isset($_POST['video_id'])) {
    $video_id = $_POST['video_id'];

    // MySQL bağlantısını oluştur
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    // Silme sorgusu
    $sql = "DELETE FROM videos WHERE id = '$videos'"; // 'videos' tablo adınıza göre güncelleyin
    if ($conn->query($sql) === TRUE) {
        echo "Video başarıyla silindi.";
    } else {
        echo "Hata oluştu: " . $conn->error;
    }

    // MySQL bağlantısını kapat
    $conn->close();
} else {
    echo "Video ID'si alınamadı.";
}
?>
