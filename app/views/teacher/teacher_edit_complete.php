<<<<<<< HEAD
<?php

    session_start();
    session_destroy();

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
            <div class="border border-primary col-sm-10 pt-4 text-center">
                <h4>Bạn đã chỉnh sửa thông tin thành công.</h4>
                <a href="index.php"><u><i>Trở về trang chủ</i></u></a>
            </div>
        </div>
    </div>
    <?php include_once('app/views/footer.php') ?>
</body>
</html>
=======
<body>
    <?php include_once('app/views/header.php'); session_start(); session_destroy(); ?>
    <div class="container text-center p-5">
        <h3>Bạn đã đăng ký thành công môn học.</h3>
        <a href="."><u>Trở về Trang chủ</u></a>
    </div>
    <?php include_once('app/views/footer.php'); ?>
</body>
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
