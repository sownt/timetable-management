<?php 
    // require_once('./db/dbhelper.php');
 
    $err = [];
    
    if(!empty($_POST)) {
        $login_id = $_POST['login_id'];
        
        if(empty($login_id) ) {
            $err['empty_login'] = 'Hãy nhập id';
        }
        if(!empty($login_id) && strlen($login_id) < 4) {
            $err['err_size_login'] = 'Hãy nhập tối thiểu 4 ký tự';
        } 
       
        if ($login_id != '' && sizeof($err) == 0) {
            
            $sql = 'select * from admins where login_id = '.$login_id.'';
            // lấy tất cả dữ liệu của id
            // $result = executeResult($sql,true);
            if($result === null) {
                $err['err_id_login'] = 'Login id không tồn tại trong hệ thống';
            }
            // lấy ID đã gửi yêu cầu reset trước đó
            $sql_exist = 'select reset_password_token from admins where login_id = '.$login_id.'';
            // $check_exist = executeResult($sql_exist, false);
            foreach($check_exist as $item) {
                if ($result['login_id'] === $login_id) {
                    if(strlen($item['reset_password_token']) !== 1) {
                        $err['err_id_exist'] = 'Login id đã gửi yêu cầu trước đó';
                    } else {
                        $sql = 'update admins set reset_password_token ='.microtime(true).' where login_id = '.$login_id.'';
                        // execute($sql);
                        header('Location: login.php');
                    }
                } 
                }
            } 
    }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    .content {
        width: 50%;
        height: 50%;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 1px 1px 1px 2px;
    }
    </style>
</head>

<body>
    <div style="
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;">
        <div class="p-5 bg-info bg-opacity-10 border border-info border-start rounded">
            <form method="POST">
                <?php 
                echo (isset($err['empty_login']) ? '<p style ="color:red">'.$err['empty_login'].'</p>': '');
                echo (isset($err['err_size_login']) ? '<p style ="color:red">'.$err['err_size_login'].'</p>': '');
                echo(isset($err['err_id_login']) ? '<p style ="color:red">'.$err['err_id_login'].'</p>':'');
                echo(isset($err['err_id_exist']) ? '<p style ="color:red">'.$err['err_id_exist'].'</p>':'');
                ?>
                <div class="input-group">
                    <span class="input-group-text">Người dùng</span>
                    <div class="form-floating" id="floatingInputGroup1">
                        <input type="number" class="form-control" placeholder="Username" name="login_id">
                        <label for="floatingInputGroup1">ID</label>
                    </div>
                </div>
                <div style="display: flex; justify-content: end;">
                    <button style="margin-top: 20px;cursor: pointer; width: 220px;" class="btn btn-primary">Gửi yêu cầu
                        reset password</button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>