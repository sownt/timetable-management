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

    <title>Xác nhận môn học</title>
</head>

<body>
    <?php
    session_start();
    if (!empty($_POST['back'])) {
        header("Location: ./lecture_edit.php ");
    } else if (!empty($_POST['edit'])) {
        header("Location: ./lecture_edit_complete.php ");
    }
    ?>
    <form method="post" enctype="multipart/form-data" action="">
        <fieldset class="confirm-form">
            <div class="form">
                <div class="title">
                    <div class="input-text">
                        Tên môn học<sup class="sup">*</sup></div>
                    <div>
                        <?php echo $_SESSION['subject_name']; ?>
                    </div>
                </div>

                <div class="title">
                    <div class="input-text">
                        Khóa<sup class="sup">*</sup></div>
                    <div>
                        <?php echo $_SESSION['course']; ?>
                    </div>
                </div>

                <div class="title">
                    <div class="input-text">
                        Mô tả chi tiết</div>
                    <div>
                        <?php echo $_SESSION['detail']; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="show-avatar" class="col-sm-2 col-form-label">Avatar</label>
                    <div class="col-sm-10">
                        <?php
                        $avatar = $_SESSION["avatar"];
                        echo "<img src=\"$avatar\" alt=\Avatar of teacher\" class=\"img-thumbnail\" id=\"show-avatar\" style=\"width:260px;height:224px;\">";
                        ?>
                    </div>
                </div>

                <div>
                    <input type='submit' class="button" name="back" value='Sửa lại' />
                    <input type='submit' class="button" name="edit" value='Sửa' />
                </div>
            </div>

        </fieldset>
    </form>
</body>

</html>