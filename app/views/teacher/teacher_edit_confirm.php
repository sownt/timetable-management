<?php

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

    session_start();

    $_SESSION["is_back"] = "1";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["is_back"] = "0";
        $new_path = $_SESSION["avatar"];
        if (strcmp($_SESSION["is_change_avatar"], "1") === 0) {
            $splitted = explode("/", $_SESSION["new_avatar"]);
            $last = array_pop($splitted);
            $second_last = array_pop($splitted);
            array_push($splitted, $last);
            $new_path = join("/", $splitted);
            rename($_SESSION["new_avatar"], $new_path);
            unlink($_SESSION["avatar"]);
        }

        require_once('app/models/teacher.php');
        Teacher::update($_SESSION["id"], $_SESSION["name"], $_SESSION["specialization"], $_SESSION["degree"], $new_path, $_SESSION["description"]);
        header('Location: ./?controller=teacher&action=update_complete');
    }

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
    <?php include_once('app/views/header.php') ?>
    <div class="container">
        <div class="row justify-content-center mb-4">
            <form class="border col-sm-10 pt-4" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Họ và Tên</label>
                    <div class="col-sm-10">
                        <?php
                            $teacher_name = $_SESSION["name"];
                            echo "<label class=\"col-form-label\">$teacher_name</label>";
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="specialization" class="col-sm-2 col-form-label">Bộ môn</label>
                    <div class="col-sm-10">
                        <?php
                            $teacher_specialization = $specializations[$_SESSION["specialization"]];
                            echo "<label class=\"col-form-label\">$teacher_specialization</label>";
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="degreee" class="col-sm-2 col-form-label">Học vị</label>
                    <div class="col-sm-10">
                        <?php
                            $teacher_degree = $degrees[$_SESSION["degree"]];
                            echo "<label class=\"col-form-label\">$teacher_degree</label>";
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="show-avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <?php
                            if (strcmp($_SESSION["is_change_avatar"], "1") === 0) {
                                $avatar = $_SESSION["new_avatar"];
                            }
                            else {
                                $avatar = $_SESSION["avatar"];
                            }
                            echo "<img src=\"$avatar\" alt=\Avatar of teacher\" class=\"img-thumbnail\" id=\"show-avatar\" style=\"width:260px;height:224px;\">";
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Mô tả thêm</label>
                    <div class="col-sm-10">
                    <?php
                        $teaher_desc = $_SESSION["description"];
                        echo "<label class=\"col-form-label\">$teaher_desc</label>";
                    ?>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-secondary ml-auto mr-1 mt-3 mb-2" onclick="history.go(-1)">Sửa lại</button>
                    <button type="submit" class="btn btn-primary mr-auto ml-1 mt-3 mb-2">Hoàn thành</button>
                </div>
            </form>
        </div>
    </div>
    <?php include_once('app/views/footer.php') ?>
</body>
</html>