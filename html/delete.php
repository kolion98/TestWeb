<!DOCTYPE html>
<html>
<head>
    <title>데이터 삭제</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
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

    // 삭제할 레코드 ID 가져오기
    $id = $_GET['id'];

    // 데이터 삭제
    $sql = "DELETE FROM sample WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("데이터 삭제 실패: " . mysqli_error($conn));
    } else {
        echo "데이터가 성공적으로 삭제되었습니다.";
        echo "<form method='POST' action='data.php'>";
        echo "<input type='hidden' name='host' value='$host'>";
        echo "<input type='hidden' name='port' value='$port'>";
        echo "<input type='hidden' name='user' value='$user'>";
        echo "<input type='hidden' name='password' value='$password'>";
        echo "<input type='hidden' name='database' value='$database'>";
        echo "<td><button type='submit' name='submit' class='btn'>테이블조회페이지로</button></td>";
        echo "</form>";
    }

    // MySQL 연결 종료
    mysqli_close($conn);
    ?>
    </div>
</body>
</html>

