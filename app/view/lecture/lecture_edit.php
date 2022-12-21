<!DOCTYPE html>
<html lang='en'>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- <link rel="stylesheet" href="web/css/style.css" /> -->
    </script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
        .confirm-form {
            width: 100%;
            height: 100%;
            max-width: 500px;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #e0de4d;
        }

        .button {
            background-color: #e0de4d;
            padding: 15px 45px;
            margin-top: 30px;
            margin-left: 25%;
            border-radius: 10px;
            border: 1px solid #fbff00;
        }

        .button:hover {
            opacity: 0.8;
        }

        .form {
            margin-left: 5%;
        }

        .title {
            display: flex;
            margin-bottom: 10px;
        }

        .input-text {
            background-color: #e0de4d;
            padding: 10px 47px 10px 7px;
            margin-right: 25px;
            border: 1px solid #e0de4d;
            width: 35%;
        }

        .select {
            border: 1px solid #e0de4d;
            width: 50%;
        }

        .sup {
            color: rgb(255, 0, 0);
        }
    </style>

    <title>Sửa môn học</title>
</head>

<body>
    <?php
    session_start();
    // Code PHP xử lý validate
    $error = array();
    $data = array();
    $action = '';
    $date = date("YmdHis");
    $_SESSION = $_POST;

    if (!empty($_POST['confirm'])) {
        // Lấy dữ liệu
        $_SESSION['subject_name'] = isset($_POST['subject_name']) ? $_POST['subject_name'] : '';
        $_SESSION['course'] = isset($_POST['course']) ? $_POST['course'] : '--course--';
        $_SESSION['detail'] = isset($_POST['detail']) ? $_POST['detail'] : '';

        // Kiểm tra định dạng dữ liệu
        if (empty($_POST['subject_name'])) {
            $error['subject_name'] = 'Hãy nhập tên môn học.';
        }

        if ((strlen($_POST['subject_name'])) > 100) {
            $error['subject_name'] = 'Độ dài quá 100 kí tự';
        }

        if ((strlen($_POST['detail'])) > 100) {
            $error['detail'] = 'Độ dài quá 100 kí tự';
        }

        if (empty($_POST['course']) || $_POST['course'] == '----') {
            $error['course'] = 'Hãy chọn khóa.';
        }

        if (empty($_POST['detail'])) {
            $error['detail'] = 'Hãy nhập mô tả chi tiết';
        }

        //Thư mục bạn sẽ lưu file upload
        $target_dir    = "web/avatar/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir);
        }
        $filename = $_FILES["avatar"]["tmp_name"];
        $prod = "img";
        $extension = pathinfo(basename($_FILES["avatar"]["name"]), PATHINFO_EXTENSION); // jpg
        $newfilename = $prod . "_" . $date . "." . $extension;
        //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
        $target_file   = $target_dir . basename($newfilename);

        // Lưu dữ liệu
        if (empty($error)) {
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
            $_SESSION['avatar'] = $target_file;
            header("Location: ./lecture_edit_comfirm.php ");
        }
    }
    ?>
    <form method="post" action="" enctype="multipart/form-data" action=?#?>
        <fieldset class="confirm-form">
            <div class="form">
                <?php echo isset($error['subject_name']) ? $error['subject_name'] : ''; ?> <br />
                <?php echo isset($error['course']) ? $error['course'] : ''; ?> <br />
                <?php echo isset($error['gender']) ? $error['gender'] : ''; ?> <br />

                <div class="title">
                    <div class="input-text">
                        Tên môn học<sup class="sup">*</sup></div>
                    <input type='text' id='subject_name' name='subject_name' class="select">

                </div>

                <div class="title">
                    <div class="input-text">
                        Khóa<sup class="sup">*</sup></div>
                    <select class="select" name="course">
                        <option>----</option>
                        <?php $course = array("0" => "Năm 1", "1" => "Năm 2", "2" =>"Năm 3", "3" => "Năm 4");
                        foreach ($course as $key => $value) { ?>
                            <option value="<?= $value ?>"><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="title">
                    <div class="input-text">
                        Mô tả chi tiết<sup class="sup">*</sup></div>
                    <input type='text' id='detail' name='detail' class="select">
                </div>

                <div class="title">
                    <label for="show-avatar" class="input-text">Avatar</label>
                    <div class="col-sm-10">
                        <?php
                        $avatar_path = null;
                        echo "<img src=\"$avatar_path\" alt=\Avatar of teacher\" class=\"img-thumbnail\" id=\"show-avatar\" style=\"width:260px;height:224px;\">";
                        ?>
                        <div class="custom-file mt-3">
                            <input type="file" class="form-control custom-file-input" id="avatar" name="avatar" accept="image/*">
                            <label for="avatar" class="custom-file-label">Browse</label>
                        </div>
                    </div>
                </div>

                <input type='submit' class="button" name="confirm" value='Xác nhận' />
            </div>

        </fieldset>
    </form>
    <script>
        function showImage(src, target) {
            var fr = new FileReader();
            fr.onload = function(e) {
                target.src = this.result;
            };
            src.addEventListener("change", function() {
                fr.readAsDataURL(src.files[0]);
            });
        }
        var src = document.getElementById("avatar");
        var target = document.getElementById("show-avatar");
        showImage(src, target);
    </script>
</body>

</html>