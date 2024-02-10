<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muratpaşa Anadolu Ödev Sitesi</title>
    <style>
        /* Genel stil */
        body {
            font-family: Arial, sans-serif; /* Varsayılan font */
            background-color: #f2f2f2; /* Arka plan rengi */
            margin: 0;
            padding: 0;
        }

        /* Header */
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 36px;
            margin: 0;
        }

        /* Main */
        main {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        /* Form ve Hoş Geldiniz kutusu */
        .welcome-container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            width: 70%;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label,
        input {
            display: block;
            margin-bottom: 10px;
            width: 70%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: auto;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
        }
        /* Genel stil */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        /* Sağ üst köşe butonu */
        .admin-button {
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: #ff0000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <a href="admin.php" class="admin-button">Admin Girişi</a>
    <header>
        <h1>Muratpaşa Anadolu Ödev Sitesi</h1>
    </header>

    <main>
        <div class="welcome-container">
            <h2>Hoş Geldiniz!</h2>
            <p>Ödev teslim etmek için aşağıdaki bilgileri doldurunuz:</p>
			<p>Video boyutu büyük ise Biraz bekleyiniz bu sayfada</p>
            <form action="postaction.php" method="post" enctype="multipart/form-data">
				<label for="isim">İsim:</label>
				<input type="text" id="isim" name="isim" required>

				<label for="soyisim">Soyisim:</label>
				<input type="text" id="soyisim" name="soyisim" required>

				<label for="sinif">Sınıf:</label>
				<input type="text" id="sinif" name="sinif" required>

				<label for="video">Video Yükle:</label>
				<input type="file" id="video" name="video" accept="video/*" required>

				<input type="submit" value="Gönder">
			</form>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Muratpaşa Anadolu Ödev Sitesi (Made My Batu)</p>
    </footer>
	</body>
	</html>