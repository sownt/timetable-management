<?php
session_start();
$schedule_data = $_SESSION['schedule_data'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //insert db..
    header('Location: ./schedule_complete.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Confirm</title>
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

    .submit-wrapper div {
        width: 50%;
        display: flex;
        justify-content: space-around;
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
</head>

<body>
    <div class="wrapper">
        <div id="error-box">
        </div>
        <form method="POST">
            <div class="form-item">
                <p>
                    Khóa
                </p>
                <select disabled name="school_year" id="school_year">
                    <option disabled selected value="<?= $schedule_data['school_year'] ?>">
                        <?= $schedule_data['school_year'] ?></option>
                </select>
            </div>
            <div class="form-item">
                <p>
                    Môn học
                </p>
                <select disabled name="subject_id" id="subject_id">
                    <option disabled selected value="<?= $schedule_data['subject_id'] ?>">
                        <?= $schedule_data['subject_text'] ?></option>
                </select>
            </div>

            <div class="form-item">
                <p>
                    Giáo viên
                </p>
                <select disabled name="teacher_id" id="teacher_id">
                    <option disabled selected value="<?= $schedule_data['teacher_id'] ?>">
                        <?= $schedule_data['teacher_text'] ?></option>
                </select>
            </div>
            <div class="form-item">
                <p>
                    Thứ
                </p>
                <select disabled name="week_day_id" id="week_day_id">
                    <option disabled selected value="<?= $schedule_data['week_day_id'] ?>">
                        <?= $schedule_data['week_day_id'] ?></option>
                </select>
            </div>

            <div class="form-item">
                <p>
                    Tiết
                </p>
                <div>
                    <?php foreach ($schedule_data['lession_id'] as $val) : ?>
                    <div style="display: inline-block; margin-right: 10px; line-height: 36px;">
                        <input id="lession_<?= $val ?>" type="hidden" name="lession_id[]" value="<?= $val ?>">
                        <label for="lession_<?= $val ?>">Tiết <?= $val ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="form-item">
                <p>
                    <label for="notes">
                        Chú ý
                    </label>
                </p>
                <textarea disabled name="notes" id="notes" rows="6" cols="80"><?= $schedule_data['notes'] ?></textarea>
            </div>

            <div class="form-item submit-wrapper">
                <div>
                    <input type="submit" formaction="./schedule_input.php?edit=true" name="edit_input" value="Sửa lại">
                    <input type="submit" name="schedule_register" value="Đăng ký">
                </div>
            </div>
        </form>
    </div>
</body>

</html>