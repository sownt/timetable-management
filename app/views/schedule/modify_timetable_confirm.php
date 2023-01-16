<?php
session_start();
$schedule_data = $_SESSION['schedule_data'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //insert db..
    header('Location: ./schedule_edit_complete.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thời khóa biểu (confirm)</title>
    <link rel="stylesheet" href="./edit.css">
</head>
<body>
    <main>
        <form 
            action="<?php echo $SERVER['PHP_SELF']; ?>",
            method="POST"
        >
        <div class="center">
            <div class="khoahoc">
                <div class="label">
                    <label for="khoahoc">Khóa học</label>
                </div>
                <select class= "cf" disabled="disabled" name="school_year" id="school_year">
                    <option disabled selected value="<?= $schedule_data['school_year'] ?>">
                        <?= $schedule_data['school_year'] ?></option>
                </select>
            </div>

            <div class="monhoc">
                <div class="label">
                    <label for="monhoc">Môn học</label>
                </div>
                <select  disabled="disabled" name="subject_id" id="subject_id">
                    <option disabled selected value="<?= $schedule_data['subject_id'] ?>">
                        <?= $schedule_data['subject_id'] ?></option>
                </select>
            </div>

            <div class="giaovien">
                <div class="label">
                    <label for="giaovien">Giáo viên</label>
                </div>
                <select class= "cf" disabled="disabled" name="teachers_id" id="teachers_id">
                    <option disabled selected value="<?= $schedule_data['teachers_id'] ?>">
                        <?= $schedule_data['teachers_id'] ?></option>
                </select>
            </div>

            <div class="thu">
                <div class="label">
                    <label for="thu">Thứ</label>
                </div>
                <select class= "cf" disabled="disabled" name="week_day_id" id="week_day_id">
                    <option disabled selected value="<?= $schedule_data['week_day_id'] ?>">
                        <?= $schedule_data['week_day_id'] ?></option>
                </select>
            </div>

            <div class="tiethoc">
                <div class="label">
                    <label for="tiethoc">Tiết học</label>
                </div>
                <div>
                    <?php foreach ($schedule_data['lession_id'] as $val) : ?>
                    <div style="display: inline-block; margin-right: 10px; line-height: 36px;">
                        <input id="lession_<?= $val ?>" type="hidden" name="lession_id[]" value="<?= $val ?>">
                        <label for="lession_<?= $val ?>">Tiết <?= $val ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="chuy">
                <div class="label">
                    <label for="chuy">Chú ý</label>
                </div>
                <textarea disabled name="notes" id="notes" rows="6" cols="80"><?= $schedule_data['notes'] ?></textarea>
            </div>

            <div class="button1">
                <input class="button" formaction="./schedule_edit_input.php?edit=true" type="submit" name="submit" value="Sửa lại" />
                <input class="button" type="submit" name="submit" value="Sửa" />
            </div>
        </div>
        </form>
    </main>
</body>
</html>