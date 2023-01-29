<<<<<<< HEAD
<?php

    if (!isset($_GET["id"])) {
        // header('Location: index.php');
        $teacher_id = 1;
    }
    else {
        $teacher_id = $_GET["id"];
    }
    require_once('app/models/teacher.php');
    $teacher_z = Teacher::get($teacher_id);
    $teacher = array();
    $teacher["id"] = $teacher_z->id;
    $teacher["name"] = $teacher_z->name;
    $teacher["specialization"] = $teacher_z->specialized;
    $teacher["degree"] = $teacher_z->degree;
    $teacher["avatar"] = $teacher_z->avatar;
    $teacher["description"] = $teacher_z->description;

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
                $_SESSION["original_new_avatar_name"] = $_FILES["avatar"]["name"];
            }
            header("Location: ./?controller=teacher&action=update_confirm");
        }
        header("Location: app/views/teacher/teacher_edit_confirm.php");
    }
    else {
        if (array_key_exists("is_back", $_SESSION)) {
            if (strcmp($_SESSION["is_back"], "1") === 0) {
                $_SESSION["is_back"] = "0";
                if (array_key_exists("is_change_avatar", $_SESSION) && strcmp($_SESSION["is_change_avatar"], "1") === 0) {
                    $selected_image_path = $_SESSION["original_new_avatar_name"];
                }
            }
            else {
                session_destroy();
            }
        } else {
            session_destroy();
        }
    } else {
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
    <?php include_once('app/views/header.php') ?>
    <div class="container">
        <div class="row justify-content-center mb-4">
            <form class="border col-sm-10 pt-4" action="" method="POST" enctype="multipart/form-data">

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
                                } else {
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
                                } else {
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
=======
<body>
    <?php
    include_once('app/views/header.php');
    require_once('app/models/teacher.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $id = 0; $teacher = null;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $teacher = Teacher::get($id);
    } else {
        header("Location: ./?controller=teacher&action=register");
    }

    function isSelect($value, $current_value)
    {
        if ($value == $current_value) {
            echo "selected";
        }
        echo "";
    }
    ?>
    <div class="container p-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="text-center mb-5">
                <h1>Sửa giáo viên</h1>
            </div>
            <div class="row mb-3">
                <label for="fullName" class="col-sm-2 col-form-label">Họ và tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullName" name="fullName" value="<?= $teacher->name ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="specialized" class="col-sm-2 col-form-label">Bộ môn</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="specialized" id="specialized">
                        <option value="0" <?php isSelect($teacher->specialized, 0) ?>>Chọn bộ môn</option>
                        <option value="001" <?php isSelect($teacher->specialized, "001") ?>>Khoa học máy tinh</option>
                        <option value="002" <?php isSelect($teacher->specialized, "002") ?>>Khoa học dữ liệu</option>
                        <option value="003" <?php isSelect($teacher->specialized, "003") ?>>Hải dương học</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="degree" class="col-sm-2 col-form-label">Học vị</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="degree" id="degree">
                        <option value="0">Chọn học vị</option>
                        <option value="001" <?php isSelect($teacher->degree, "001") ?>>Cử nhân</option>
                        <option value="002" <?php isSelect($teacher->degree, "002") ?>>Thạc sĩ</option>
                        <option value="003" <?php isSelect($teacher->degree, "003") ?>>Tiến sĩ</option>
                        <option value="004" <?php isSelect($teacher->degree, "004") ?>>Phó giáo sư</option>
                        <option value="005" <?php isSelect($teacher->degree, "005") ?>>Giáo sư</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <img src="<?= $teacher->avatar ?>" alt="avatar" height="100px">
                    <input class="form-control" type="file" id="avatar" name="avatar">
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Mô tả thêm</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="3"><?= $teacher->description ?></textarea>
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
                </div>
            </div>
            <?php
            require_once('app/models/teacher.php');
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            /**
             * Display error message
             *
             * @param string $message
             * @return void
             */
            function onError($message)
            {
                echo "<div class=\"row mb-3\"><div class=\"alert alert-danger\" role=\"alert\">$message</div></div>";
            }

            // Check if form is submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $target_file = $school_year = "";
                $valid = true;

                // Validate name
                if (isset($_POST['fullName']) && $valid) {
                    $name = $_POST['fullName'];
                    $_SESSION['fullName'] = $name;
                    if (strlen($name) == 0) {
                        onError("Hãy nhập tên giáo viên.");
                        $valid = false;
                    }
                    if (strlen($name) > 100) {
                        onError("Không nhập quá 100 ký tự.");
                        $valid = false;
                    }
                }

<<<<<<< HEAD
            </form>
        </div>
    </div>
    <?php include_once('app/views/footer.php') ?>

    <script type="application/javascript">
        // Show the file name of selected image
        var fileName = null;
        $('input[type="file"]').change(function(e) {
            fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        // Prevent from resubmitting form
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href );
        }
    </script>

</body>

</html>
=======
                // Validate specialized
                if (isset($_POST['specialized']) && $valid) {
                    $specialized = $_POST['specialized'];
                    $_SESSION['specialized'] = $specialized;
                    if ($specialized == 0) {
                        onError("Hãy chọn bộ môn.");
                        $valid = false;
                    }
                }

                // Validate degree
                if (isset($_POST['degree']) && $valid) {
                    $degree = $_POST['degree'];
                    $_SESSION['degree'] = $degree;
                    if ($degree == 0) {
                        onError("Hãy chọn bằng cấp.");
                        $valid = false;
                    }
                }

                // Validate description
                if (isset($_POST['description']) && $valid) {
                    $description = $_POST['description'];
                    $_SESSION['description'] = $description;
                    if (strlen($description) == 0) {
                        onError("Hãy nhập mô tả chi tiết.");
                        $valid = false;
                    }
                    if (strlen($description) > 1000) {
                        onError("Không nhập quá 1000 ký tự.");
                        $valid = false;
                    }
                }

                if ($valid) {
                    if ($_FILES["avatar"]["size"] > 0) {
                        $target_dir = "web/uploads/";
                        $uploaded = pathinfo($_FILES["avatar"]["name"]);
                        $target_file = $target_dir . $uploaded['filename'] . "_" . date("YmdHis") . "." . $uploaded['extension'];
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $check = getimagesize($_FILES["avatar"]["tmp_name"]);

                        // Create uploads folder if not exists
                        if (!is_dir($target_dir)) {
                            if (!@mkdir($target_dir, 0777, true)) {
                                $error = error_get_last();
                                $valid = false;
                            }
                        }

                        if ($check !== false) {
                            $uploadOk = 1;
                        } else {
                            $valid = false;
                            $uploadOk = 0;
                        }


                        if ($uploadOk != 0 && $valid) {
                            echo "<script>console.log(\"" . $target_file . "\")</script>";
                            if (@move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                                echo "<script>console.log(\"The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.\")</script>";
                                $_SESSION['avatar'] = $target_file;
                            } else {
                                $valid = false;
                                echo "<script>console.log(\"Sorry, there was an error uploading your file.\")</script>";
                            }
                        }
                    } else {
                        onError("Hãy chọn avatar.");
                        $valid = false;
                    }
                }

                if ($valid) {
                    header("Location: ./?controller=teacher&action=register_confirm");
                }
            }
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
    <?php include_once('app/views/footer.php'); ?>
</body>
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
