<?php 
    // require_once('./db/dbhelper.php');
 
    // $err = [];
    
    // if(!empty($_POST)) {
    //     $login_id = $_POST['login_id'];
        
    //     if(empty($login_id) ) {
    //         $err['empty_login'] = 'Hãy nhập id';
    //     }
    //     if(!empty($login_id) && strlen($login_id) < 4) {
    //         $err['err_size_login'] = 'Hãy nhập tối thiểu 4 ký tự';
    //     } 
    //     if($login_id != '' && sizeof($err) == 0) {
    //         $sql = 'select * from admins where login_id = '.$login_id.'';
    //         $result = executeResult($sql,true);
    //         if($result && $result['login_id'] === $login_id) {
    //             $sql = 'update admins set reset_password_token ='.microtime(true).' where login_id = '.$login_id.'';
    //             execute($sql);
    //             header('Location: login.php');
    //         } else {
    //             $err['err_id_login'] = 'Login id không tồn tại trong hệ thống';
    //         }
    //     }

        
    // }
    // echo (isset($err['empty_login']) ? '<p style ="color:red">'.$err['empty_login'].'</p>': '');
    // echo (isset($err['err_size_login']) ? '<p style ="color:red">'.$err['err_size_login'].'</p>': '');
    // echo(isset($err['err_id_login']) ? '<p style ="color:red">'.$err['err_id_login'].'</p>':'');

   
     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;">
        <form method="POST">
            <div>
                <label>Người dùng</label>
                <input style="margin-left: 10px;" type="text" name="login_id" id="">
            </div>
            <div style="display: flex; justify-content: end;">
                <button
                    style="margin-top: 20px; background-color: #5392f8; height: 30px; cursor: pointer; border-style: none; border-radius: 4px;">
                    <span>Gửi yêu cầu reset password</span>
                </button>
            </div>
        </form>
    </div>
</body>

</html>