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
            <tr>
                <form method="POST">
                    <td>1</td>
                    <td><input type="hidden" name='login_id'>Test01</td>
                    <td><input type="text" placeholder="Nhập mật khẩu mới" name='newPassword'></td>
                    <td>
                        <button style="background-color: #5392f8; height: 30px; width: 80px;cursor: pointer; border-style: none; border-radius: 4px;">
                            Reset
                        </button>
                    </td>
                </form>
            </tr>
        </table>
    </div>
</body>

</html>