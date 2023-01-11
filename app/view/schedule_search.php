<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="schedule_confirm" href="/web/css/schedule_confirm.css">
</head>
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
                        <?php $course = array('' => '', '1st' => 'Năm nhất', '2nd' => 'Năm hai','3nd' => 'Năm ba', '4nd' => 'Năm bốn' );
                        foreach ($course as $key => $value) {
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
                            Môn học <sup class="notnull">
                        </label>
                    </div>
                    <select class="subject" name="subject" id="subject">
                        <?php $subject = array('' => '', 'ĐS' => 'Đại số', 'CSDL' => 'Cơ sở dữ liệu','Web' => 'Lập trình Web', 'TT' => 'Thuyết trình' );
                        foreach ($subject as $key => $value) {
                            echo " <option ";
                            echo isset($_POST['sub']) && $_POST['sub'] == $key ? " selected " : "";
                            echo " value='" . $key . "'>" . $value . "</option> ";
                        }
                        ?>
                    </select>
                </div>
                <div class="apartment">
                    <div class="style">
                        <div class="username">
                            <label>
                               Giáo viên <sup class="notnull">
                            </label>
                        </div>
                        <select class="teacher" name="teacher" id="teacher">
                        <?php $teacher = array('' => '', 'A' => 'Trần Văn A', 'B' => 'Trần Văn B','C' => 'Nguyễn Thị C' );
                        foreach ($teacher as $key => $value) {
                            echo " <option ";
                            echo isset($_POST['name']) && $_POST['name'] == $key ? " selected " : "";
                            echo " value='" . $key . "'>" . $value . "</option> ";
                        }
                        ?>
                    </select>
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
                        <th>Khóa</th>
                        <th>Môn học</th>
                        <th>Giáo viên</th>
                        <th>Thứ</th>
                        <th>Tiết học</th>
                        <th>Action</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Năm nhất</td>
                        <td>Đại số</td>
                        <td>Trần Văn A</td>
                        <td>Thứ 2</td>
                        <td>1,2</td>
                        <td> <input type="submit" name="search" class="action" value="Sửa"> </td>
                        <td> <input type="submit" name="delete" class="action" value="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa thời khóa biểu ?')"> </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Năm hai</td>
                        <td>CSDL</td>
                        <td>Trần Văn B</td>
                        <td>Thứ 3</td>
                        <td>3,6</td>
                        <td> <input type="submit" name="search" class="action" value="Sửa"> </td>
                        <td> <input type="submit" name="delete" class="action" value="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa thời khóa biểu ?')"> </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Năm ba</td>
                        <td>Lập trình web</td>
                        <td>Nguyễn Thị C</td>
                        <td>Thứ 4</td>
                        <td>1,2,3,4,5</td>
                        <td> <input type="submit" name="search" class="action" value="Sửa"> </td>
                        <td> <input type="submit" name="delete" class="action" value="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa thời khóa biểu ?')"> </td>

                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Năm bốn</td>
                        <td> Thuyết trình</td>
                        <td>Nguyễn Thị C</td>
                        <td>Thứ 5</td>
                        <td>6,7</td>
                        <td> <input type="submit" name="search" class="action" value="Sửa"> </td>
                        <td> <input type="submit" name="delete" class="action" value="Xóa" onclick="return confirm('Bạn chắc chắn muón xóa thời khóa biểu ?')"> </td>


                    </tr>
                </table>
            </div>
            </div>
    </form>
    </fieldset>
</body>

</html>



                    </tr>
                </table>
            </div>
            </div>
    </form>
    </fieldset>
</body>

</html>
