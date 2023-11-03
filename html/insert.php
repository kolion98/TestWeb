<!DOCTYPE html>
<html>
<head>
    <title>새 데이터 추가</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php include('menu.php'); ?>
    <hr></hr>
    <?php
    // 사용자 입력 데이터 가져오기
    $host = $_GET['host'];
    $port = $_GET['port'];
    $user = $_GET['user'];
    $password = $_GET['password'];
    $database = $_GET['database'];

    // MySQL 연결
    $conn = mysqli_connect($host, $user, $password, $database, $port);
    if (!$conn) {
        die("연결 실패: " . mysqli_connect_error());
    }

    // 데이터 추가
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "INSERT INTO sample (name, email) VALUES ('$name', '$email')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("쿼리 실패: " . mysqli_error($conn));
        } else {
            echo "<p>새 데이터가 추가되었습니다.</p>";
    echo "<form method='POST' action='data.php'>";
    echo "<input type='hidden' name='host' value='$host'>";
    echo "<input type='hidden' name='port' value='$port'>";
    echo "<input type='hidden' name='user' value='$user'>";
    echo "<input type='hidden' name='password' value='$password'>";
    echo "<input type='hidden' name='database' value='$database'>";
    echo "<td><button type='submit' name='submit' class='btn'>테이블조회페이지로</button></td>";
    echo "</form>";
        }
    }

    // MySQL 연결 종료
    mysqli_close($conn);
    ?>
    <h1>새 데이터 추가</h1>
    <form method="POST">
        <div class="form-group">
            <label for="name">NAME:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">EMAIL:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <button type="submit" name="submit" class="btn">추가</button>
    </form>
    <br>
    </div>
</body>
</html>

