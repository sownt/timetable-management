<?php
session_start();
$schedule_data = $_SESSION['schedule_data'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //insert db..
    header('Location: ./schedule_complete.php');
}
?>

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