<?php
// require_once('../common/define.php');
$YEAR = array("1", "2", "3", "4");
$WEEK_DAY = array("2", "3", "4", "5", "6", "7", "8");
$LESSION = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
$subject = array("001" => "Hải Dương Học", "002" => "Khoa Học Máy Tính", "003" => "Khoa Học Dữ Liệu");
$teachers = array("001" => "Hoang Nghia Phong", "002" => "Dinh Trong Phuc", "003" => "Hoang Ha Giang");
?>
<body>
    <?php include_once('app/views/header.php'); ?>
    <script type="text/javascript">
    function setTextField(selectObj, nameField) {
        // console.log(selectObj, nameField)
        document.querySelector(`[name="${nameField}"]`).value = selectObj.options[selectObj.selectedIndex].text;
    }
    </script>
    <div class="container p-5">
        <form method="POST">
            <div class="text-center mb-5"><h1>Đăng ký thời khóa biểu</h1></div>
            <?php if (isset($errors['school_year'])) : ?>
            <div class="text-danger"><?= $errors['school_year'] ?> </div>
            <?php endif; ?>
            <div class="row mb-3">
                <label for="school_year" class="col-sm-2 col-form-label">Khóa</label>
                <div class="col-sm-10">
                    <select class="form-select" name="school_year" id="school_year">
                        <option disabled selected value>Chọn năm học</option>
                        <?php foreach ($YEAR as $y) : ?>
                        <option <?= isset($schedule_data['school_year']) && $schedule_data['school_year'] == $y ? 'selected' : '' ?> value="<?= $y ?>">
                            Năm <?= $y ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <?php if (isset($errors['subject_id'])) : ?>
            <div class="text-danger"><?= $errors['subject_id'] ?> </div>
            <?php endif; ?>
            <div class="row mb-3">
                <label for="subject_id" class="col-sm-2 col-form-label">Môn học</label>
                <div class="col-sm-10">
                    <select class="form-select" name="subject_id" id="subject_id" onchange="setTextField(this, 'subject_text')">
                        <option disabled selected value>Chọn môn học</option>
                        <?php foreach ($subject as $id => $val) : ?>
                        <option <?= isset($schedule_data['subject_id']) && $schedule_data['subject_id'] == $id ? 'selected' : '' ?> value="<?= $id ?>">
                            <?= $val ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="subject_text" value="<?= isset($schedule_data['subject_text']) ? $schedule_data['subject_text'] : '' ?>">
                </div>
                
            </div>

            <?php if (isset($errors['teacher_id'])) : ?>
            <div class="text-danger"><?= $errors['teacher_id'] ?> </div>
            <?php endif; ?>
            <div class="row mb-3">
                <label for="teacher_id" class="col-sm-2 col-form-label">Giáo viên</label>
                <div class="col-sm-10">
                    <select class="form-select" name="teacher_id" id="teacher_id" onchange="setTextField(this,'teacher_text')">
                        <option disabled selected value>Chọn giáo viên</option>
                        <?php foreach ($teachers as $id => $val) : ?>
                        <option <?= isset($schedule_data['teacher_id']) && $schedule_data['teacher_id'] == $id ? 'selected' : '' ?> value="<?= $id ?>">
                            <?= $val ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="teacher_text" value="<?= isset($schedule_data['teacher_text']) ? $schedule_data['teacher_text'] : '' ?>">
                </div>
                
            </div>

            <?php if (isset($errors['week_day_id'])) : ?>
            <div class="text-danger"><?= $errors['week_day_id'] ?> </div>
            <?php endif; ?>
            <div class="row mb-3">
                <label for="week_day_id" class="col-sm-2 col-form-label">Thứ</label>
                <div class="col-sm-10">
                    <select class="form-select" name="week_day_id" id="week_day_id" onchange="setTextField(this)">
                        <option disabled selected value>Chọn thứ</option>
                        <?php foreach ($WEEK_DAY as $val) : ?>
                        <option <?= isset($schedule_data['week_day_id']) && $schedule_data['week_day_id'] == $val ? 'selected' : '' ?> value="<?= $val ?>">
                            <?= $val != 8 ? $val : "Chủ nhật" ?>
                        </option>
                        <?php endforeach; ?>
                    </select>    
                </div>
            </div>

            <?php if (isset($errors['lession_id'])) : ?>
            <div class="text-danger"><?= $errors['lession_id'] ?> </div>
            <?php endif; ?>
            <div class="row mb-3">
                <label for="lession_id[]" class="col-sm-2 col-form-label">Tiết</label>
                <div class="col-sm-10">
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
            <div class="text-danger"><?= $errors['notes'] ?> </div>
            <?php endif; ?>
            <div class="row mb-3">
                <label for="notes" class="col-sm-2 col-form-label">Chú ý</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="notes" id="notes" rows="4"><?= isset($schedule_data) ? $schedule_data['notes'] : '' ?></textarea>
                </div>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" name="submit" value="Xác Nhận">
            </div>
        </form>
    </div>
    <?php include_once('app/views/footer.php'); ?>
</body>