<?php
$school_year = array("1", "2", "3", "4");
$WEEK_DAY = array("2", "3", "4", "5", "6", "7");
$LESSION = array( "1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
$subject = array("001" => "Hải Dương Học", 
                "002" => "Khoa Học Máy Tính", 
                "003" => "Khoa Học Dữ Liệu");
$teachers = array("001" => "Hoang Nghia Phong", 
                "002" => "Dinh Trong Phuc", 
                "003" => "Hoang Ha Giang");

$edit = false;
if (isset($_GET['edit']) && $_GET['edit']) {
    session_start();
    $schedule_data = isset($_SESSION['schedule_data']) ? $_SESSION['schedule_data'] : null;
    $edit = $schedule_data ? true : false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $data_schedule = $_POST;
    $errors = array();
    if (!isset($data_schedule['school_year'])) {
        $errors['school_year'] = "Hãy chọn năm học";
    }
    if (!isset($data_schedule['subject_id'])) {
        $errors['subject_id'] = "Hãy chọn môn học";
    }
    if (!isset($data_schedule['teachers_id'])) {
        $errors['teachers_id'] = "Hãy chọn giáo viên";
    }
    if (!isset($data_schedule['week_day_id'])) {
        $errors['week_day_id'] = "Hãy chọn thứ";
    }
    if (!isset($data_schedule['lession_id'])) {
        $errors['lession_id'] = "Hãy chọn tiết học";
    }
    if (!isset($data_schedule['notes']) || strlen($_POST['notes']) == 0) {
        $errors['notes'] = "Hãy nhập chú ý";
    }

    if (count($errors) == 0) {
        session_start();
        $_SESSION['schedule_data'] = $_POST;
        header("location: modify_timetable_confirm.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thời khóa biểu (input)</title>
    <link rel="stylesheet" href="/web/css/edit.css">
    <script type="text/javascript">
    function setTextField(selectObj, nameField) {
        // console.log(selectObj, nameField)
        document.querySelector(`[name="${nameField}"]`).value = selectObj.options[selectObj.selectedIndex].text;
    }
    </script>
</head>
<body>
    <main>
        <form action="", method="POST" >
        <div class="center">
            <?php if (isset($errors['school_year'])) : ?>
                <div class="error"><?= $errors['school_year'] ?> </div>
            <?php endif; ?>
            <div class="khoahoc">
                <div class="label">
                    <label for="khoahoc">Khóa học</label>
                </div>
                <select name="school_year", id="school_year">
                    <option disabled selected value></option>
                    <?php foreach ($school_year as $y) : ?>
                    <option <?= $edit && $schedule_data['school_year'] == $y ? 'selected' : '' ?> value="<?= $y ?>">
                        <?= $y ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <script type="text/javascript">
                document.getElementById('school_year').value = "<?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        echo $_POST['school_year'];
                    } else {
                        echo $_SESSION['school_year'];
                    }
                ?>";
            </script>

            <?php if (isset($errors['subject_id'])) : ?>
                <div class="error"><?= $errors['subject_id'] ?> </div>
            <?php endif; ?>
            <div class="monhoc">
                <div class="label">
                    <label for="monhoc">Môn học</label>
                </div>
                <select name="subject_id", id="subject_id">
                    <option disabled selected value></option>
                    <?php foreach ($subject as $id => $val) : ?>
                    <option <?= $edit && $schedule_data['subject_id'] == $id ? 'selected' : '' ?> value="<?= $id ?>">
                        <?= $val ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <script type="text/javascript">
                document.getElementById('subject_id').value = "<?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        echo $_POST['subject_id'];
                    } else {
                        echo $_SESSION['subject_id'];
                    }
                ?>";
            </script>


            <?php if (isset($errors['teachers_id'])) : ?>
                <div class="error"><?= $errors['teachers_id'] ?> </div>
            <?php endif; ?>
            <div class="giaovien">
                <div class="label">
                    <label for="giaovien">Giáo viên</label>
                </div>
                <select name="teachers_id", id="teachers_id">
                <option disabled selected value></option>
                    <?php foreach ($teachers as $id => $val) : ?>
                    <option <?= $edit && $schedule_data['teachers_id'] == $id ? 'selected' : '' ?> value="<?= $id ?>">
                        <?= $val ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <script type="text/javascript">
                document.getElementById('teachers_id').value = "<?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        echo $_POST['teachers_id'];
                    } else {
                        echo $_SESSION['teachers_id'];
                    }
                ?>";
            </script>

            <?php if (isset($errors['week_day_id'])) : ?>
                <div class="error"><?= $errors['week_day_id'] ?> </div>
            <?php endif; ?>
            <div class="thu">
                <div class="label">
                    <label for="thu">Thứ</label>
                </div>
                <select name="week_day_id", id="week_day_id">
                <option disabled selected value></option>
                    <?php foreach ($WEEK_DAY as $val) : ?>
                    <option <?= $edit && $schedule_data['week_day_id'] == $val ? 'selected' : '' ?> value="<?= $val ?>">
                        <?= $val ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <script type="text/javascript">
                document.getElementById('week_day_id').value = "<?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        echo $_POST['week_day_id'];
                    } else {
                        echo $_SESSION['week_day_id'];
                    }
                ?>";
            </script>

            <?php if (isset($errors['lession_id'])) : ?>
                <div class="error"><?= $errors['lession_id'] ?> </div>
            <?php endif; ?>
            <div class="tiethoc">
                <div class="label">
                    <label for="tiethoc">Tiết học</label>
                </div>
                <div class="khung">
                    <?php foreach ($LESSION as $val) : ?>
                        <div style="display: inline-block; margin-right: 10px; line-height: 36px;">
                            <input <?= $edit && in_array($val, $schedule_data['lession_id']) ? 'checked' : '' ?>
                                id="lession_<?= $val ?>" type="checkbox" name="lession_id[]" value="<?= $val ?>">
                            <label for="lession_<?= $val ?>">Tiết <?= $val ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <?php if (isset($errors['notes'])) : ?>
                <div class="error"><?= $errors['notes'] ?> </div>
            <?php endif; ?>
            <div class="chuy">
                <div class="label">
                    <label for="chuy">Chú ý</label>
                </div>
                <textarea name="notes" id="notes" rows="5" cols="20" maxlength="20"></textarea>
            </div>
            <script type="text/javascript">
                document.getElementById('notes').value = "<?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        echo $_POST['notes'];
                    } else {
                        echo $_SESSION['notes'];
                    }
                ?>";
            </script>

            <div class="button1">
                <input class="button" type="submit" name="submit" value="Xác nhận" />
            </div>
        </div>
        </form>
    </main>
</body>
</html>