<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    fieldset {
        width: 470px;
        margin: 12%;
        margin-left: 32%;
        border: 1px solid#4eb6c8;
    }

    .username {
        background-color: #4eb6c8;
        color: azure;
        padding: 10px 20px;
        margin-right: 25px;
        width: 100px;
        text-align: center;
        border: 1px solid #4eb6c8
    }

    .text {
        border: 1px solid #4eb6c8;
        padding: 10px;
        width: 278px;
    }

    .apartment {
        margin-top: 20px;

    }

    .course {
        width: 300px;
        border: 1px solid #4eb6c8;
    }

    .button {
        margin-left: 40%;
        width: 100px;
        margin-top: 30px;
        height: 30px;
        background-color: #4eb6c8;
        border: 1px solid #6aebf7;
        border-radius: 5px;
        color: white;
        transition-duration: 0.4s;

    }

    .action {
        width: 50px;
        margin-top: 10px;
        height: 30px;
        background-color: #4eb6c8;
        border: 1px solid #6aebf7;
        color: white;
        transition-duration: 0.4s;

    }

    .button:hover {
        opacity: 0.8;
    }

    .style {
        display: flex;
    }

    .text {
        border: 1px solid #4eb6c8;
    }

    .table {
        margin-top: 30px;
        border-collapse: separate;
        border-spacing: 5px 10px;
        width: 100%;
    }

    .search {
        margin-top: 20px;
    }
</style>

<body>
    <form method="post" action="">
        <fieldset>
            <div class="apartment">
                <div class="style">
                    <div class="username">
                        <label>
                            Khoá học <sup class="notnull">
                        </label>
                    </div>
                    <select class="course" name="course" id="course">
                        <?php $department = array('' => '', '1st' => 'Năm nhất', '2nd' => 'Năm hai','3nd' => 'Năm ba', '4nd' => 'Năm bốn' );
                        foreach ($department as $key => $value) {
                            echo " <option ";
                            echo isset($_POST['years']) && $_POST['years'] == $key ? " selected " : "";
                            echo " value='" . $key . "'>" . $value . "</option> ";
                        }
                        ?>
                    </select>
                </div>
                <div class="apartment">
                    <div class="style">
                        <div class="username">
                            <label>
                                Từ khóa <sup class="notnull">
                            </label>
                        </div>
                        <input type="text" class="text" id="tukhoa" name="diachi">
                    </div>
                </div>
            </div>
            <input type="submit" name="search" class="button" value="Tìm kiếm" />
            </div>
            <div>
                <div>
                    <div class="search">
                        <label>
                            Số môn học tìm thấy XXX
                        </label>
                </div>
            </div>
            <div>
                <table class="table">
                    <tr>
                        <th> No </th>
                        <th>Tên môn học</th>
                        <th>Khoá</th>
                        <th>Mô tả chi tiết</th>
                        <th>Action</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Đại số</td>
                        <td>Năm nhất</td>
                        <td></td>
                        <td> <input type="submit" name="search" class="action" value="Sửa"> </td>
                        <td> <input type="submit" name="search" class="action" value="Xóa"> </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>CSDL</td>
                        <td>Năm hai</td>
                        <td></td>
                        <td> <input type="submit" name="search" class="action" value="Sửa"> </td>
                        <td> <input type="submit" name="search" class="action" value="Xóa"> </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td> LT Web</td>
                        <td>Năm ba</td>
                        <td></td>
                        <td> <input type="submit" name="search" class="action" value="Sửa"> </td>
                        <td> <input type="submit" name="search" class="action" value="Xóa"> </td>

                    </tr>
                    <tr>
                        <td>4</td>
                        <td> Thuyết trình</td>
                        <td>Năm bốn</td>
                        <td></td>
                        <td> <input type="submit" name="search" class="action" value="Sửa"> </td>
                        <td> <input type="submit" name="search" class="action" value="Xóa"> </td>


                    </tr>
                </table>
            </div>
            </div>
    </form>
    </fieldset>
</body>

</html>