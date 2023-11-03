<!DOCTYPE html>
<html>
<head>
    <title>데이터베이스 연결 정보 입력</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php include('menu.php'); ?>
    <hr></hr>
    <h1>데이터베이스 연결 정보 입력</h1>
    <form action="data.php" method="post">
        <p>
            <label for="host">호스트 주소:</label>
            <input type="text" id="host" name="host">
        </p>
        <p>
            <label for="port">포트:</label>
            <input type="text" id="port" name="port">
        </p>
        <p>
            <label for="user">DB User:</label>
            <input type="text" id="user" name="user">
        </p>
        <p>
            <label for="password">DB 패스워드:</label>
            <input type="password" id="password" name="password">
        </p>
        <p>
            <label for="database">데이터베이스:</label>
            <input type="text" id="database" name="database">
        </p>
        <button type="submit" class="btn">접속</button>
    </form>
    </div>
</body>
</html>
