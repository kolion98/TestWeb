<!DOCTYPE html>
<html>
<head>
    <title>데이터 수정</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php include('menu.php'); ?>
    <hr></hr>
        <?php
        // 사용자 입력 데이터 가져오기
        $id = $_GET['id'];
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

        // 수정할 데이터 조회
        $sql = "SELECT * FROM sample WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("쿼리 실패: " . mysqli_error($conn));
        }
        $row = mysqli_fetch_assoc($result);

        // 수정한 데이터 저장
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sql = "UPDATE sample SET name='$name', email='$email' WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<p>데이터가 성공적으로 수정되었습니다.</p>";
                echo "<form method='POST' action='data.php'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<input type='hidden' name='host' value='$host'>";
                echo "<input type='hidden' name='port' value='$port'>";
                echo "<input type='hidden' name='user' value='$user'>";
                echo "<input type='hidden' name='password' value='$password'>";
                echo "<input type='hidden' name='database' value='$database'>";
                echo "<td><button type='submit' name='submit' class='btn'>테이블조회페이지로</button></td>";
                echo "</form>";
                mysqli_close($conn);
                exit();
            } else {
                echo "쿼리 실패: " . mysqli_error($conn);
            }
        }

        // 입력 폼 출력
        ?>
        <h1>데이터 수정</h1>
        <form method="POST">
            <label>ID: </label><?php echo $row['id']; ?><br>
            <label>Name: </label><input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
            <label>Email: </label><input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
            <input type="submit" value="수정">
        </form>

        <?php
        // MySQL 연결 종료
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
