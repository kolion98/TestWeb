<!DOCTYPE html>
<html>
<head>
    <title>Stress 테스트 페이지</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php include('menu.php'); ?>
    <hr></hr>
    <h1>Stress 테스트 페이지</h1>
    <p>Stress 테스트를 시작하거나 중지하려면 아래 버튼을 누르세요.</p>
    <p id="status"></p>
    <button onclick="startStress()" class="btn">Stress 시작</button>
    <button onclick="stopStress()" class="btn">Stress 중지</button>
    <script>
        function startStress() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "stress_exec.php?start=1", true);
            xhr.send();
            document.getElementById("status").innerHTML = "Stress 테스트 중입니다.";
        }
        function stopStress() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "stress_exec.php?stop=1", true);
            xhr.send();
            document.getElementById("status").innerHTML = "Stress 테스트가 정지되었습니다.";
        }
    </script>
    </div>
</body>
</html>

