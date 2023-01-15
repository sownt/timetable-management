<?php
// require_once('../common/define.php');
$YEAR = array("1", "2", "3", "4");
$WEEK_DAY = array("2", "3", "4", "5", "6", "7", "8");
$LESSION = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
$subject = array("001" => "Hải Dương Học", "002" => "Khoa Học Máy Tính", "003" => "Khoa Học Dữ Liệu");
$teachers = array("001" => "Hoang Nghia Phong", "002" => "Dinh Trong Phuc", "003" => "Hoang Ha Giang");
?>
<body>
    <script type="text/javascript">
    function setTextField(selectObj, nameField) {
        // console.log(selectObj, nameField)
        document.querySelector(`[name="${nameField}"]`).value = selectObj.options[selectObj.selectedIndex].text;
    }
    </script>
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
                    <option <?= isset($schedule_data['school_year']) && $schedule_data['school_year'] == $y ? 'selected' : '' ?> value="<?= $y ?>">
                        <?= $y ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <?php if (isset($errors['subject_id'])) : ?>
            <div class="error"><?= $errors['subject_id'] ?> </div>
            <?php endif; ?>
            <div class="form-item">
                <p>Môn học</p>
                <select name="subject_id" id="subject_id" onchange="setTextField(this, 'subject_text')">
                    <option disabled selected value></option>
                    <?php foreach ($subject as $id => $val) : ?>
                    <option <?= isset($schedule_data['subject_id']) && $schedule_data['subject_id'] == $id ? 'selected' : '' ?> value="<?= $id ?>">
                        <?= $val ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="subject_text" value="<?= isset($schedule_data['subject_text']) ? $schedule_data['subject_text'] : '' ?>">
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
                    <option <?= isset($schedule_data['teacher_id']) && $schedule_data['teacher_id'] == $id ? 'selected' : '' ?> value="<?= $id ?>">
                        <?= $val ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <input type="hidden" name="teacher_text" value="<?= isset($schedule_data['teacher_text']) ? $schedule_data['teacher_text'] : '' ?>">
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
                    <option <?= isset($schedule_data['week_day_id']) && $schedule_data['week_day_id'] == $val ? 'selected' : '' ?> value="<?= $val ?>">
                        <?= $val != 8 ? $val : "Chủ nhật" ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <?php if (isset($errors['lession_id'])) : ?>
            <div class="error"><?= $errors['lession_id'] ?> </div>
            <?php endif; ?>
            <div class="form-item">
                <p>Tiết</p>
                <div>
                    <?php foreach ($LESSION as $val) : ?>
                    <div style="display: inline-block; margin-right: 10px; line-height: 36px;">
                        <input <?= isset($schedule_data['lession_id']) && in_array($val, $schedule_data['lession_id']) ? 'checked' : '' ?>
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
                    <label for="notes">Chú ý</label>
                </p>
                <textarea name="notes" id="notes" rows="6"
                    cols="80"><?= isset($schedule_data) ? $schedule_data['notes'] : '' ?></textarea>
            </div>

            <div class="form-item submit-wrapper">
                <input type="submit" name="submit" value="Xác Nhận">
            </div>
        </form>
    </div>
    <?php include_once('app/views/footer.php'); ?>
</body>