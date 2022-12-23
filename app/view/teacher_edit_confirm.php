<?php
    // session_start();

    $fake_teacher_db = array(
        "id" => "1",
        "name" => "Nguyễn Văn A",
        "specialization" => "001",
        "degree" => "003",
        "avatar" => "../../web/avatar/1_fat-cat1_20221217153903.png",
        "description" => "Tôi năm nay 29 tuổi, lấy bằng tiến sĩ ở Đại học bôn ba. Sở thích của tôi là đọc báo, chơi game và nghe nhạc. Tôi nuôi 100 con chó và 100 con mèo. Mỗi loại một nửa là béo, một nữa là gầy. Tôi gõ VNI nên đôi khi nhầm thanh hõi với thanh ngả. Siuuuuuuuu...."
    );

    $fake_teacher = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fake_teacher = $_POST;
        $teacher_id = $fake_teacher["id"];
        if ($_FILES["avatar"]["error"] != 0) {
            $fake_teacher["avatar"] = $fake_teacher_db["avatar"];
        }
        else {
            $info = pathinfo($_FILES["avatar"]["name"]);
            $new_name = $info["filename"] . "_" . date("YmdHis") . ".";
            $ext = $info["extension"];
            $new_avatar = "../../web/avatar/tmp/$teacher_id/" . $new_name . $ext;
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $new_avatar);
            $fake_teacher["avatar"] = $new_avatar;
        }
    }
    else {
        header("location: ./teacher_edit_input.php");
    }
    
    $specializations = array(
        "001" => "Khoa học máy tính",
        "002" => "Khoa học dữ liệu",
        "003" => "Hải dương học"
    );

    $degrees = array(
        "001" => "Cử nhân",
        "002" => "Thạc sĩ",
        "003" => "Tiến sĩ",
        "004" => "Phó giáo sư",
        "005" => "Giáo sư"
    );
?>

<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit teacher</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mb-4">
            <form class="border border-primary col-sm-10 pt-4" action="./teacher_edit_complete.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Họ và Tên</label>
                    <div class="col-sm-10">
                        <?php
                            $teacher_name = $fake_teacher["name"];
                            echo "<label class=\"col-form-label\">$teacher_name</label>";
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="specialization" class="col-sm-2 col-form-label">Bộ môn</label>
                    <div class="col-sm-10">
                        <?php
                            $teacher_specialization = $specializations[$fake_teacher["specialization"]];
                            echo "<label class=\"col-form-label\">$teacher_specialization</label>";
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="degreee" class="col-sm-2 col-form-label">Học vị</label>
                    <div class="col-sm-10">
                        <?php
                            $teacher_degree = $degrees[$fake_teacher["degree"]];
                            echo "<label class=\"col-form-label\">$teacher_degree</label>";
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="show-avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <?php
                            $avatar = $fake_teacher["avatar"];
                            echo "<img src=\"$avatar\" alt=\Avatar of teacher\" class=\"img-thumbnail\" id=\"show-avatar\" style=\"width:260px;height:224px;\">";
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Mô tả thêm</label>
                    <div class="col-sm-10">
                    <?php
                        $teaher_desc = $fake_teacher["description"];
                        echo "<label class=\"col-form-label\">$teaher_desc</label>";
                    ?>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary ml-auto mr-1 d-block mt-3 mb-2">Sửa lại</button>
                    <button type="submit" class="btn btn-primary mr-auto ml-1 d-block mt-3 mb-2">Hoàn thành</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>