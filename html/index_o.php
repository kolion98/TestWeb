<!DOCTYPE html>
<html>
<head>
    <title>웹 서버 IP 주소 확인</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>현재 웹 서버의 IP 주소: <?php echo $_SERVER['SERVER_ADDR']; ?></h1>
    <button onclick="location.href='stress.html'">Stress Test</button>
    <button onclick="location.href='database.php'">Database</button>
</body>
</html>

