<?php
$servername = "localhost";
$username = "mpalsitekullanici";
$password = "PASSWORD";
$dbname = "DBNAME";

// MySQL bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Veritabanından verileri çekme
$sql = "SELECT * FROM videos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Veritabanından gelen verileri ekrana yazdırma
    while($row = $result->fetch_assoc()) {
        echo "Öğrenci: " . $row["isim"]. " " . $row["soyisim"]. " - Sınıf: " . $row["sinif"]. " - Video: " . $row["video_isim"]. "<br>";
    }
} else {
    echo "Veri bulunamadı.";
}

// MySQL bağlantısını kapat
$conn->close();
?>