<?php
if (isset($_POST['isim']) && isset($_POST['soyisim']) && isset($_POST['sinif'])) {
    // Formdan gelen verileri al
    $isim = $_POST["isim"];
    $soyisim = $_POST["soyisim"];
    $sinif = $_POST["sinif"];

    // Videonun yüklendiği geçici dosya yolu
    $videoTmpPath = $_FILES["video"]["tmp_name"];

    // Videonun orijinal adı
    $videoName = $_FILES["video"]["name"];

    // Videonun yükleneceği klasör
    $uploadsDir = "uploads/";

    // Videonun yeni adı (rastgele bir isim oluşturabilirsiniz)
    $newVideoName = $isim . "-" . $soyisim . "-" . $sinif;

    // Videonun hedef klasöre taşınması
    $targetPath = $uploadsDir . $newVideoName;

    // Veritabanı bağlantısı (gerekirse bağlantı bilgilerinizi güncelleyin)
    $servername = "localhost";
    $username = "mpalsitekullanici";
    $password = "PASSWORD";
    $dbname = "DBNAME";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Veritabanı bağlantı hatası kontrolü
    if ($conn->connect_error) {
        die("Veritabanı bağlantı hatası: " . $conn->connect_error);
    }

    // Verileri veritabanına ekleme
    $sql = "INSERT INTO videos (isim, soyisim, sinif, video_isim) VALUES ('$isim', '$soyisim', '$sinif', '$newVideoName')";

    if ($conn->query($sql) === TRUE) {
        // Videoyu hedef klasöre taşıma
		echo "Başarıyla eklendi ve video yüklendi. " . $_FILES["video"]["name"];
		if (move_uploaded_file($videoTmpPath, $targetPath)) {
        	echo "Başarıyla eklendi ve video yüklendi. " . $videoTmpPath;
		}
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
}
?>