<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Confirm infomation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
$subject = array("0" => "",
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

<div class="container" style="border:1px solid; margin: 0 auto; height: 500px; width: 700px;">
<h2 style="text-align:center"> Xác nhận thông tin</h2>
    <form class="form-horizontal" action=""  enctype="multipart/form-data">
        <!-- Họ và tên -->
        <div class="form-group">
            <label class="control-label col-sm-4">Họ và tên</label>
            <div class="col-sm-6">
                <input type="text" name="name" class="form-control" value="<?php echo $_SESSION["name"];?>" readonly>
            </div>
        </div>    

        <!-- Bộ môn -->
        <div class="form-group">
            <label class="control-label col-sm-4">Bộ môn</label>
            <div class="col-sm-6">
                <input type="text" name="subject" class="form-control" value="<?php echo $subject[$_SESSION["subject"]];?>" readonly>          
            </div>
        </div>

        <!-- Học vị -->
        <div class="form-group">
            <label class="control-label col-sm-4">Học vị</label>
            <div class="col-sm-6">
                <input type="text" name="degree" class="form-control" value="<?php echo $degrees[$_SESSION["degree"]];?>" readonly>
            </div>
        </div>  

        <!-- Avatar -->
        <div class="form-group" >
            <label class="control-label col-sm-4">Avatar</label>
            <div class="col-sm-6">
                <?php
                    $dir = "../../web/avatar/";
                    $img_dir = $dir . basename($_SESSION['avatar']);
                    echo '<img src="' . $img_dir . '" alt="avatar" style="width:100px;">';               
                ?>
            </div>
        </div>

        <!-- Mô tả -->
        <div class="form-group">
            <label class="control-label col-sm-4">Mô tả</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="description" id="description" readonly><?php echo $_SESSION["description"];?></textarea>
            </div>
        </div>

    </form>

    <!-- Xác nhận và Sửa lại -->
    <div class="col-sm-6" style="text-align:right">
        <form action="teacher_add_input.php" method="get">
            <input type="submit" class="btn btn-default" value="Sửa lại">
        </form>
    </div>

    <div class="col-sm-6" style="text-align:left">
        <form action="teacher_add_complete.php" method="post">
            <input type="submit" class="btn btn-default" value="Xác nhận">
        </form>
    </div>

</div>
</body>
</html>