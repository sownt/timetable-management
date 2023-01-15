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

?>

<?php

    if (!isset($is_access)) {
        header('Location: ../home/error.php');
    }

    // Validate

    // Requirements
    $is_empty_name = false;
    $is_empty_specialization = false;
    $is_empty_degree = false;
    $is_epmty_description = false;
    $is_name_exceed_length_limit = false;
    $is_desc_exceed_length_limit = false;
    $name_length_limit = 100;
    $desc_length_limit = 1000;

    session_start();
    $selected_image_path = "Chọn ảnh";

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $_SESSION = $_POST;
        $_SESSION["avatar"] = $teacher["avatar"];
        if ($_FILES["avatar"]["error"] === 0) {
            $_SESSION["is_change_avatar"] = "1";
        }
        else {
            $_SESSION["is_change_avatar"] = "0";
        }
        
        $teacher["name"] = $_SESSION["name"];
        $teacher["specialization"] = $_SESSION["specialization"];
        $teacher["degree"] = $_SESSION["degree"];
        $teacher["description"] = $_SESSION["description"];
        
        if (!isset($_POST["name"]) || empty($_POST["name"])) {
            $is_empty_name = true;
        }
        if (!isset($_POST["specialization"]) || empty($_POST["specialization"])) {
            $is_empty_specialization = true;
        }
        if (!isset($_POST["degree"]) || empty($_POST["degree"])) {
            $is_empty_degree = true;
        }
        if (!isset($_POST["description"]) || empty($_POST["description"])) {
            $is_epmty_description = true;
        }
        if (!$is_empty_name) {
            if (strlen(htmlspecialchars($_POST["name"])) > $name_length_limit) {
                $is_name_exceed_length_limit = true;
            }
        }
        if (!$is_epmty_description) {
            if (strlen(htmlspecialchars($_POST["description"])) > $desc_length_limit) {
                $is_desc_exceed_length_limit = true;
            }
        }
        if (
            !$is_empty_name && 
            !$is_empty_specialization && 
            !$is_empty_degree && 
            !$is_epmty_description && 
            !$is_name_exceed_length_limit && 
            !$is_desc_exceed_length_limit
        ) {
            if (strcmp($_SESSION["is_change_avatar"], "1") === 0) {
                $info = pathinfo($_FILES["avatar"]["name"]);
                $filename = $info["filename"];
                $stime = date("YmdHis");
                $teacher_id = $_SESSION["id"];
                $ext = $info["extension"];
                $new_name = "{$filename}_{$stime}_{$teacher_id}.{$ext}";
                $new_avatar = "web/avatar/tmp/$new_name";
                $moved = move_uploaded_file($_FILES["avatar"]["tmp_name"], $new_avatar);
                $_SESSION["new_avatar"] = $new_avatar;
            }
            header("Location: app/views/teacher/teacher_edit_confirm.php");
        }
    }
    else {
        if (array_key_exists("is_back", $_SESSION)) {
            if (strcmp($_SESSION["is_back"], "1") === 0) {
                $_SESSION["is_back"] = "0";
                if (array_key_exists("is_change_avatar", $_SESSION) && strcmp($_SESSION["is_change_avatar"], "1") === 0) {
                    $selected_image_path = $_SESSION["avatar"]["name"];
                }
            }
            else {
                session_destroy();
            }
        }
        else {
            session_destroy();
        }
    }

?>

<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit teacher</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mb-4">
            <form class="border border-primary col-sm-10 pt-4" action="" method="POST" enctype="multipart/form-data">

                <!-- Name -->
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Họ và Tên</label>
                    <div class="col-sm-10">
                        <?php
                            $teacher_id = $teacher["id"];
                            echo "<input type=\"hidden\" id=\"id\" name=\"id\" value=\"$teacher_id\">";
                            $teacher_name = $teacher["name"];
                            echo "<input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" value=\"$teacher_name\">";
                            if ($is_empty_name) {
                                echo "<p class=\"text-danger\">Hãy nhập tên giáo viên.</p>";
                            }
                            if ($is_name_exceed_length_limit) {
                                echo "<p class=\"text-danger\">Không nhập quá 100 ký tự.</p>";
                            }
                        ?>
                    </div>
                </div>

                <!-- Specialization -->
                <div class="form-group row">
                    <label for="specialization" class="col-sm-2 col-form-label">Bộ môn</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="specialization" name="specialization">
                        <?php
                            foreach ($specializations as $key => $value) {
                                if (strcmp($key, $teacher["specialization"]) === 0) {
                                    echo "<option value=\"$key\" selected>$value</option>";
                                }
                                else {
                                    echo "<option value=\"$key\">$value</option>";
                                }
                            }
                        ?>
                        </select>
                        <?php
                            if ($is_empty_specialization) {
                                echo "<p class=\"text-danger\">Hãy chọn bộ môn.</p>";
                            }
                        ?>
                    </div>
                </div>
                
                <!-- Degree -->
                <div class="form-group row">
                    <label for="degreee" class="col-sm-2 col-form-label">Học vị</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="degree" name="degree">
                        <?php
                            foreach ($degrees as $key => $value) {
                                if (strcmp($key, $teacher["degree"]) === 0) {
                                    echo "<option value=\"$key\" selected>$value</option>";
                                }
                                else {
                                    echo "<option value=\"$key\">$value</option>";
                                }
                            }
                        ?>
                        </select>
                        <?php
                            if ($is_empty_degree) {
                                echo "<p class=\"text-danger\">Hãy chọn bằng cấp.</p>";
                            }
                        ?>
                    </div>
                </div>
                
                <!-- Avatar -->
                <div class="form-group row">
                    <label for="show-avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                    <?php
                        $avatar_path = $teacher["avatar"];
                        echo "<img src=\"$avatar_path\" alt=\"Avatar of teacher\" class=\"img-thumbnail\" id=\"show-avatar\" style=\"width:260px;height:224px;\">";
                    ?>
                        <div class="custom-file mt-3">
                            <input type="file" class="form-control custom-file-input" id="avatar" name="avatar" accept="image/*">
                            <?php
                                echo "<label for=\"avatar\" class=\"custom-file-label\">$selected_image_path</label>";
                            ?>
                        </div>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Mô tả thêm</label>
                    <div class="col-sm-10">
                    <?php
                        $desc_content = $teacher["description"];
                        echo "<textarea class=\"form-control\" id=\"description\" name=\"description\" rows=\"5\">$desc_content</textarea>";
                        if ($is_epmty_description) {
                            echo "<p class=\"text-danger\">Hãy nhập mô tả thêm.</p>";
                        }
                        if ($is_desc_exceed_length_limit) {
                            echo "<p class=\"text-danger\">Không nhập quá 100 ký tự.</p>";
                        }
                    ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mx-auto d-block mt-3 mb-2">Xác nhận</button>

            </form>
        </div>
    </div>

    <script type="application/javascript">

        // Show the file name of selected image
        var fileName = null;
        $('input[type="file"]').change(function(e){
            fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        // Prevent from resubmitting form
        if (window.history.replaceState) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

</body>
</html>