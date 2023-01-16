<?php 
    // require_once('./db/dbhelper.php');
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $new_date = date("Y-m-d H:i:s");
    $err =[];
    $login_id = $newPassword = '';
    if(!empty($_POST)) {
        $newPassword = $_POST['newPassword'];
        $login_id = $_POST['login_id'];
        if(empty($newPassword)) {
            $err['err_newPassword'] = 'Hãy nhập mật khẩu mới';
        }
        if(!empty($newPassword) && strlen($newPassword) <6) {
            $err['err_size_newPassword']= 'Hãy nhập mật khẩu tối thiểu 6 ký tự'; 
        }
        if(sizeof($err) ==0) {
            $sql = "update admins set reset_password_token = ' ', password ='$newPassword', updated = '$new_date'  where login_id = $login_id";
            // execute($sql);
            unset($_POST); //unsetting $_POST Array
            header("Location: ".$_SERVER['REQUEST_URI']);//This will let your uri parameters to still exist
            exit;
        }
        
    }
     // Lấy db nếu có yêu cầu reset password
     $sql_check = 'select * from admins where reset_password_token != "" ';
    //  $result = executeResult($sql_check);
    
    

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
    .main {
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
        margin-top: -20px;
    }

    .main_content {
        text-align: center;
        width: 80%;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        background-color: #fff;
        align-items: center;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
</head>

<body>
    <div class="main">
        <div class="main_content">
            <h2>Danh sách gửi request reset password</h2>
            <?php 
            echo(isset($err['err_newPassword']) ? '<p style ="color:red;width: 80%;text-align: left;margin-left: 22%; padding-top: 20px, hidden ">'.$err['err_newPassword'].'</p>':'');
            echo(isset($err['err_size_newPassword']) ? '<p style ="color:red;width: 80%;text-align: left;margin-left: 22%; padding-top: 20px, hidden">'.$err['err_size_newPassword'].'</p>':'');
            ?>
            <table class="table table-striped" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID</th>
                        <th scope="col">Mật khẩu mới</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form method="POST">
                            <td>1</td>
                            <td><input type="hidden" name='login_id'>0001
                            </td>
                            <td>
                                <input type="text" class="form-control" aria-describedby="basic-addon1"
                                    placeholder="Nhập mật khẩu mới" name='newPassword'>

                            </td>
                            <td>
                                <button
                                    style="background-color: #0d6efd; height: 30px; width: 80px;cursor: pointer; border-style: none; border-radius: 4px; color: #fff;">
                                    Reset
                                </button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <form method="POST">
                            <td>1</td>
                            <td><input type="hidden" name='login_id'>0002
                            </td>
                            <td>
                                <input type="text" class="form-control" aria-describedby="basic-addon1"
                                    placeholder="Nhập mật khẩu mới" name='newPassword'>

                            </td>
                            <td>
                                <button
                                    style="background-color: #0d6efd; height: 30px; width: 80px;cursor: pointer; border-style: none; border-radius: 4px; color: #fff;">
                                    Reset
                                </button>
                            </td>
                        </form>
                    </tr>

                    <!-- <?php 
                $count = 1;
                foreach($result as $item): 
                ?>
                    <tr>
                        <form method="POST">
                            <td><?=$count++?></td>
                            <td><input type="hidden" name='login_id'
                                    value="<?=$item['login_id']?>"><?=$item['login_id']?>
                            </td>
                            <td>
                                <input type="text" class="form-control" aria-describedby="basic-addon1"
                                    placeholder="Nhập mật khẩu mới" name='newPassword'>

                            </td>
                            <td>
                                <button
                                    style="background-color: #0d6efd; height: 30px; width: 80px;cursor: pointer; border-style: none; border-radius: 4px; color: #fff;">
                                    Reset
                                </button>
                            </td>
                        </form>
                    </tr>

                    <?php endforeach;?> -->
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>