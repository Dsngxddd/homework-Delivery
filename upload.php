<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Yükleme Formu</title>
</head>
<body>
    <form enctype="multipart/form-data" action="upload.php" method="POST">
    <input type="file" name="video" accept="video/*" required>
    <input type="submit" value="Gönder">
</form>

</body>
</html>
