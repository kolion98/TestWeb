<!DOCTYPE html>
<html>
<head>
  <title>My Website</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Welcome to My Website</h1>
    <h1>현재 웹 서버의 IP 주소: <?php echo $_SERVER['SERVER_ADDR']; ?></h1>
    <button onclick="location.href='stress.php'" class="btn">Stress Test</button>
    <button onclick="location.href='database.php'" class="btn">Database</button>
  </div>
</body>
</html>

