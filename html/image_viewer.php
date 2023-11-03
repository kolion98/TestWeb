<!DOCTYPE html>
<html>
<head>
    <title>Image Viewer</title>
</head>
<body>
    <?php
    if (isset($_GET['url'])) {
        $image_url = $_GET['url'];
        $image_info = getimagesize($image_url);
        if ($image_info !== false) {
            $image_type = $image_info[2];
            if ($image_type == IMAGETYPE_JPEG || $image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
                $image_data = file_get_contents($image_url);
                $image_base64 = base64_encode($image_data);
                $image_src = "data:$image_type;base64,$image_base64";
                include 'image_viewer.php';
                exit();
            }
        }
    }

    include 'image_viewer.php';
    ?>
</body>
</html>

