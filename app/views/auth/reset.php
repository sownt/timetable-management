<?php
// require_once('./db/dbhelper.php');
// date_default_timezone_set("Asia/Ho_Chi_Minh");
// $new_date = date("Y-m-d H:i:s");

// $err =[];
// $login_id = $newPassword = '';
// if(!empty($_POST)) {
//     $newPassword = $_POST['newPassword'];
//     $login_id = $_POST['login_id'];
//     if(empty($newPassword)) {
//         $err['err_newPassword'] = 'Hãy nhập mật khẩu mới';
//     }
//     if(!empty($newPassword) && strlen($newPassword) <6) {
//         $err['err_size_newPassword']= 'Hãy nhập mật khẩu tối thiểu 6 ký tự'; 
//     }
//     if(sizeof($err) ==0) {
//         $sql = "update admins set reset_password_token = ' ', password ='$newPassword', updated = '$new_date'  where login_id = $login_id";
//         execute($sql);
//     }
// }

// // Lấy db nếu có yêu cầu reset password
// $sql = 'select * from admins where reset_password_token != "" ';
// $result = executeResult($sql);


// echo(isset($err['err_newPassword']) ? '<p style ="color:red">'.$err['err_newPassword'].'</p>':'');
// echo(isset($err['err_size_newPassword']) ? '<p style ="color:red">'.$err['err_size_newPassword'].'</p>':'');

require_once('app/models/admin.php');
$result = Admin::resetList();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
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
    <div>
        <h2>Danh sách gửi request reset password</h2>

        <table style="width: 600px;">
            <tr>
                <th>No</th>
                <th>Tên người dùng</th>
                <th>Mật khẩu</th>
                <th>Action</th>
            </tr>
            <?php
            $count = 1;
            foreach ($result as $item) {
            ?>
                <tr>
                    <form method="POST">
                        <?php
                        require_once('app/models/admin.php');
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['login_id'];
                            $newPassword = $_POST['newPassword'];
                            Admin::newPassword($username, $newPassword);
                        }
                        ?>
                        <td><?= $count++ ?></td>
                        <td><input name='login_id' value="<?= $item->login_id ?>" disabled></td>
                        <td><input type="text" placeholder="Nhập mật khẩu mới" name='newPassword'></td>
                        <td>
                            <button style="background-color: #5392f8; height: 30px; width: 80px;cursor: pointer; border-style: none; border-radius: 4px;">
                                Reset
                            </button>
                        </td>
                    </form>
                </tr>

            <?php } ?>

        </table>
    </div>
</body>

</html>