<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm New Teacher</title>
    <link rel="stylesheet" href="../../web/css/teacher_add_confirm.css">
</head>
<body>
<?php
session_start();
$specialized = array("0" => "",
                    "001" => "Khoa học máy tính",
                    "002" => "Khoa học dữ liệu",
                    "003" => "Hải dương học"
);

$degrees = array("0" => "",
                    "001" => "Cử nhân",
                    "002" => "Thạc sĩ",
                    "003" => "Tiến sĩ",
                    "004" => "Phó giáo sư",
                    "005" => "Giáo sư"
);
$_SESSION['count'] = 1;
?>

    <div class="container">
        <div class="form-input-line">
            <label class="input-label">
                Họ và tên
            </label>
            <input type="text" name="name" class="form-info" value="<?php echo $_SESSION["name"];?>" readonly>
        </div>
        <div class="form-input-line">
            <label class="input-label">
                Chuyên ngành
            </label>
            <input type="text" name="specialized" class="form-info" value="<?php echo $specialized[$_SESSION["specialized"]];?>" readonly>
        </div>
        <div class="form-input-line">
            <label class="input-label">
                Học vị
            </label>
            <input type="text" name="specialized" class="form-info" value="<?php echo $degrees[$_SESSION["degree"]];?>" readonly>
        </div>
        <div class="form-input-line" >
            <label class="input-label">
                Avatar
            </label>
            <div class="avatar">
                <?php
                    $dir = "../../web/avatar/";
                    $img_dir = $dir . basename($_SESSION['avatar']);
                    echo '<img src="';
                    echo $img_dir;
                    echo '" alt="avatar" style="width:100px;">';
                
                ?>
            </div>
        </div>
        <div class="form-input-line">
            <label class="input-label">
                Mô tả thêm
            </label>
            <textarea name="description" id="description" style="width: 350px; height: 100px; background-color: #e1eaf4;" readonly><?php echo $_SESSION["description"];?></textarea>
        </div>
        <div class="button-line">
            <form action="teacher_add_input.php" method="get">
                <input type="submit" class="submit-button" value="Sửa lại">
            </form>
            <form action="teacher_add_complete.php" method="post">
                <input class="submit-button" type="submit" value="Xác nhận">
            </form>
        </div>
    </div>
</body>
</html>