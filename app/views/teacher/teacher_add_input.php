<body>
    <?php include_once('app/views/header.php'); session_start(); ?>
    <div class="container p-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="text-center mb-5">
                <h1>Thêm mới giáo viên</h1>
            </div>
            <div class="row mb-3">
<<<<<<< HEAD
                <label for="lectureName" class="col-sm-2 col-form-label">Họ và tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lectureName" name="lecture-name" value="<?= $_SESSION['name'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Bộ môn</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="school-year">
                        <option selected>Chọn khóa</option>
                        <option value="1">Năm 1</option>
                        <option value="2">Năm 2</option>
                        <option value="3">Năm 3</option>
                        <option value="3">Năm 4</option>
=======
                <label for="fullName" class="col-sm-2 col-form-label">Họ và tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullName" name="fullName" value="<?= $_SESSION['name'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="specialized" class="col-sm-2 col-form-label">Bộ môn</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="specialized" id="specialized">
                        <option value="0" selected>Chọn bộ môn</option>
                        <option value="001">Khoa học máy tinh</option>
                        <option value="002">Khoa học dữ liệu</option>
                        <option value="003">Hải dương học</option>
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
                    </select>
                </div>
            </div>
            <div class="row mb-3">
<<<<<<< HEAD
                <label for="" class="col-sm-2 col-form-label">Học vị</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="school-year">
                        <option selected>Chọn khóa</option>
                        <option value="1">Năm 1</option>
                        <option value="2">Năm 2</option>
                        <option value="3">Năm 3</option>
                        <option value="3">Năm 4</option>
=======
                <label for="degree" class="col-sm-2 col-form-label">Học vị</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="degree" id="degree">
                        <option value="0" selected>Chọn học vị</option>
                        <option value="001">Cử nhân</option>
                        <option value="002">Thạc sĩ</option>
                        <option value="003">Tiến sĩ</option>
                        <option value="004">Phó giáo sư</option>
                        <option value="005">Giáo sư</option>
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="avatar" name="avatar">
                </div>
            </div>
            <div class="row mb-3">
<<<<<<< HEAD
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Mô tả thêm</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"><?= $_SESSION['description'] ?></textarea>
                </div>
            </div>
            <?php
            require_once('app/models/subject.php');
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
                if (isset($_POST['lecture-name']) && $valid) {
                    $name = $_POST['lecture-name'];
                    $_SESSION['name'] = $name;
                    if (strlen($name) == 0) {
                        onError("Hãy nhập tên môn học.");
                        $valid = false;
                    }
                    if (strlen($name) > 100) {
                        onError("Không nhập quá 100 ký tự.");
                        $valid = false;
                    }
                }

                // Validate school year
                if (isset($_POST['school-year']) && $valid) {
                    $school_year = $_POST['school-year'];
                    $_SESSION['school_year'] = $school_year;
                    if ($school_year == 0) {
                        onError("Hãy nhập khóa học.");
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
=======
                <label for="description" class="col-sm-2 col-form-label">Mô tả thêm</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="3"><?= $_SESSION['description'] ?></textarea>
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
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
                        $valid = false;
                    }
                }

<<<<<<< HEAD
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
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
                        $valid = false;
                    }
                }

                if ($valid) {
<<<<<<< HEAD
                    header("Location: ./?controller=lecture&action=register_confirm");
                }
=======
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
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
            }
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
    <?php include_once('app/views/footer.php'); ?>
</body>