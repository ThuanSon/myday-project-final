<!DOCTYPE html>
<html>
<head>
    <title>Thông Tin Nhóm</title>
    <style>
        .image-row {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .image-container {
            text-align: center;
            margin: 0 10px;
        }
        .image {
            max-width: 80%; /* Ensure image doesn't exceed its container */
            height: auto; /* Maintain aspect ratio */
        }
        .image-info {
            /* font-size: 14px; */
            font-size: 38px; /* Kích thước chữ lớn hơn */
            margin-top: 8px; /* Điều chỉnh khoảng cách */
        }
    </style>
</head>
<body>
    <div class="image-row">
        <?php
        $imagesRow1 = [
            ['img/Picture1.jpg', 'Phan Hải Triều'],
            ['img/Picture2.jpg', 'Bùi Đức Hải'],
            ['img/Picture3.jpg', 'Trần Anh Dũng']
        ];
        foreach ($imagesRow1 as $imageInfo) {
            echo '<div class="image-container">';
            echo '<img src="' . $imageInfo[0] . '" class="image">';
            echo '<p class="image-info">' . $imageInfo[1] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
    <div class="image-row">
        <?php
        $imagesRow2 = [
            ['img/Picture4.jpg', 'Kinh Như Quỳnh'],
            ['img/Picture5.jpg', 'Sơn Minh Thuận'],
            ['img/Picture6.jpg', 'Võ Minh Tiến']
        ];
        foreach ($imagesRow2 as $imageInfo) {
            echo '<div class="image-container">';
            echo '<img src="' . $imageInfo[0] . '" class="image">';
            echo '<p class="image-info">' . $imageInfo[1] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
