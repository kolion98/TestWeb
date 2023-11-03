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
fclose($handle)
