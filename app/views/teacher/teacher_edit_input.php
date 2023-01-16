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