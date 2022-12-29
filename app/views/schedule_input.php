<?php
require_once('../common/define.php');
$subject = array("001" => "Hải Dương Học", "002" => "Khoa Học Máy Tính", "003" => "Khoa Học Dữ Liệu");
$teachers = array("001" => "Hoang Nghia Phong", "002" => "Dinh Trong Phuc", "003" => "Hoang Ha Giang");
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
    if (!isset($data_schedule['teacher_id'])) {
        $errors['teacher_id'] = "Hãy chọn giáo viên";
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
        header("location: schedule_confirm.php");
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
    <title>Schedule Input</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    p {
        margin: 0;
    }

    .wrapper {
        display: flex;
        flex-direction: column;
        width: 80%;
        margin: auto;
        /* margin-top: 100px; */
        padding: 50px 100px;
        /* background-color: #999;
            */
        border: solid 2px #007bc7;
    }

    .form-item {
        font-size: 18px;
        width: 100%;
        display: flex;
        margin-bottom: 12px;
        /* border: 1px solid #999; */

    }

    .form-item p {
        width: 15%;
        padding: 12px 10px 5px 10px;
        border: solid 2px #007bc7;
        background-color: #4ba3ff;
        margin-right: 15px;
        color: white;
        text-align: center;
    }

    input[type="text"] {
        width: 50%;
        border: solid 2px #007bc7;
        outline: none;
    }

    input[type="date"] {
        border: solid 2px #007bc7;
        outline: none;
    }

    input[type="radio"] {
        margin-right: 12px;
    }

    .sex {
        display: flex;
        align-items: center;
        margin-left: 10px;
    }

    select {
        border: solid 2px #007bc7;
        width: 30%;
        outline: none;
        font-size: 16px;
    }

    .submit-wrapper {
        justify-content: center;
        margin-top: 45px;
    }

    input[type="submit"] {
        padding: 12px 30px;
        background-color: #39bc64;
        border-radius: 10px;
        border: solid 2px #007bc7;
        cursor: pointer;
        color: white;
        font-size: 17px;
    }

    input[type="file"] {
        margin-top: 10px;
    }

    i {
        color: red;
    }

    .error {
        margin-bottom: 8px;
        font-size: 18px;
        color: red;
    }
    </style>
    <script type="text/javascript">
    function setTextField(selectObj, nameField) {
        // console.log(selectObj, nameField)
        document.querySelector(`[name="${nameField}"]`).value = selectObj.options[selectObj.selectedIndex].text;
    }
    </script>
</head>

<body>
    <div class="wrapper">
        <div id="error-box">
        </div>
        <form method="POST">
            <?php if (isset($errors['school_year'])) : ?>
            <div class="error"><?= $errors['school_year'] ?> </div>
            <?php endif; ?>
            <div class="form-item">
                <p>
                    Khóa
                </p>
                <select name="school_year" id="school_year">
                    <option disabled selected value></option>
                    <?php foreach ($YEAR as $y) : ?>
                    <option <?= $edit && $schedule_data['school_year'] == $y ? 'selected' : '' ?> value="<?= $y ?>">
                        <?= $y ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php if (isset($errors['subject_id'])) : ?>
            <div class="error"><?= $errors['subject_id'] ?> </div>
            <?php endif; ?>
            <div class="form-item">
                <p>
                    Môn học
                </p>
                <select name="subject_id" id="subject_id" onchange="setTextField(this, 'subject_text')">
                    <option disabled selected value></option>
                    <?php foreach ($subject as $id => $val) : ?>
                    <option <?= $edit && $schedule_data['subject_id'] == $id ? 'selected' : '' ?> value="<?= $id ?>">
                        <?= $val ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="subject_text" value="<?= $edit ? $schedule_data['subject_text'] : '' ?>">
            </div>
            <?php if (isset($errors['teacher_id'])) : ?>
            <div class="error"><?= $errors['teacher_id'] ?> </div>
            <?php endif; ?>
            <div class="form-item">
                <p>
                    Giáo viên
                </p>
                <select name="teacher_id" id="teacher_id" onchange="setTextField(this,'teacher_text')">
                    <option disabled selected value></option>
                    <?php foreach ($teachers as $id => $val) : ?>
                    <option <?= $edit && $schedule_data['teacher_id'] == $id ? 'selected' : '' ?> value="<?= $id ?>">
                        <?= $val ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="teacher_text" value="<?= $edit ? $schedule_data['teacher_text'] : '' ?>">
            </div>
            <?php if (isset($errors['week_day_id'])) : ?>
            <div class="error"><?= $errors['week_day_id'] ?> </div>
            <?php endif; ?>
            <div class="form-item">
                <p>
                    Thứ
                </p>
                <select name="week_day_id" id="week_day_id" onchange="setTextField(this)">
                    <option disabled selected value></option>
                    <?php foreach ($WEEK_DAY as $val) : ?>
                    <option <?= $edit && $schedule_data['week_day_id'] == $val ? 'selected' : '' ?> value="<?= $val ?>">
                        <?= $val != 8 ? $val : "Chủ nhật" ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php if (isset($errors['lession_id'])) : ?>
            <div class="error"><?= $errors['lession_id'] ?> </div>
            <?php endif; ?>
            <div class="form-item">
                <p>
                    Tiết
                </p>
                <div>
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
            <div class="form-item">
                <p>
                    <label for="notes">
                        Chú ý
                    </label>
                </p>
                <textarea name="notes" id="notes" rows="6"
                    cols="80"><?= $edit ? $schedule_data['notes'] : '' ?></textarea>
            </div>

            <div class="form-item submit-wrapper">
                <input type="submit" name="submit" value="Xác Nhận">
            </div>
        </form>
    </div>
</body>

</html>