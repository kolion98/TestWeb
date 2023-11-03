<!DOCTYPE html>
<html>
<head>
    <title>데이터베이스 조회 결과</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php include('menu.php'); ?>
    <hr></hr>
    <?php
    // 사용자 입력 데이터 가져오기
    $host = $_POST['host'];
    $port = $_POST['port'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $database = $_POST['database'];
    // 샘플데이터 입력
    $mysql_command = "mysql -u $user -p$password -h $host -P $port $database < sample.sql";
    echo exec($mysql_command);
    $rds_conf_file = 'rds.conf.php';
            $handle = fopen($rds_conf_file, 'w') or die('Cannot open file:  '.$rds_conf_file);
            $data = "<?php \$RDS_URL='" . $host . "'; \$RDS_DB='" . $database . "'; \$RDS_user='" . $user . "'; \$RDS_pwd='" . $password . "'; ?>";
            fwrite($handle, $data);
            fclose($handle);
    // MySQL 연결
    $conn = mysqli_connect($host, $user, $password, $database, $port);
    if (!$conn) {
        die("연결 실패: " . mysqli_connect_error());
    }

    // 샘플 데이터 조회
    $sql = "SELECT * FROM sample";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("쿼리 실패: " . mysqli_error($conn));
    }

    // 결과 출력
    echo "<h1>샘플 데이터</h1>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>수정</th><th>삭제</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$email</td>";
        echo "<td><a href='update.php?id=$id&host=$host&port=$port&user=$user&password=$password&database=$database'>수정</a></td>";
        echo "<td><a href='delete.php?id=$id&host=$host&port=$port&user=$user&password=$password&database=$database'>삭제</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    // MySQL 연결 종료
    mysqli_close($conn);
    ?>
    <button class="btn" onclick="location.href='insert.php?host=<?php echo $host ?>&port=<?php echo $port ?>&user=<?php echo $user ?>&password=<?php echo $password ?>&database=<?php echo $database ?>'">새 데이터 추가</button>
    <br></br>
    <a href="database.php">데이터베이스 접속 정보 입력 페이지로 이동</a
    </div>
</body>
</html>
