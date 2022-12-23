<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./edit.css">
</head>
<body>
    <main>
        <form 
            action="<?php echo $SERVER['PHP_SELF']; ?>",
            method="GET"
        >
            <div class="center">
                <div class="complete">
                    <div>Bạn đã đăng ký thành công</div>
                    <div><a href="">Trở về trang chủ</a></div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>