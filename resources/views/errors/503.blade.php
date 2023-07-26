<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 Service Unavailable</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .error-code {
            font-size: 100px;
            color: #e74c3c;
        }
        .error-message {
            font-size: 24px;
            color: #444;
            margin-bottom: 20px;
        }
        .retry-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .retry-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">503</div>
        <div class="error-message">Layanan Tidak Tersedia</div>
        <p>Mohon maaf atas ketidaknyamannya, tapi server sedang tidak bisa menangani permintaan.</p>
        <p>Mohon coba lagi nanti.</p>
        <button class="retry-button" onclick="window.location.reload();">Coba Lagi</button>
    </div>
</body>
</html>
