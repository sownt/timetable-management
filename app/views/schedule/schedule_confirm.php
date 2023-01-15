<body>
    <?php include_once('app/views/header.php'); ?>
    <div class="container p-5">
        <form method="POST">
            <div class="text-center mb-5"><h1>Xác nhận đăng ký thời khóa biểu</h1></div>
            <div class="row mb-3">
                <label for="school_year" class="col-sm-2 col-form-label">Khóa</label>
                <div class="col-sm-10">
                    <select class="form-select" readonly name="school_year" id="school_year">
                        <option selected value="<?= $schedule_data['school_year'] ?>">
                            <?= $schedule_data['school_year'] ?>
                        </option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="subject_id" class="col-sm-2 col-form-label">Môn học</label>
                <div class="col-sm-10">
                    <select class="form-select" readonly name="subject_id" id="subject_id">
                        <option selected value="<?= $schedule_data['subject_id'] ?>">
                            <?= $schedule_data['subject_text'] ?></option>
                    </select>
                    <input type="hidden" name="subject_text" value="<?= $schedule_data['subject_text'] ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="teacher_id" class="col-sm-2 col-form-label">Giáo viên</label>
                <div class="col-sm-10">
                    <select class="form-select" readonly name="teacher_id" id="teacher_id">
                        <option selected value="<?= $schedule_data['teacher_id'] ?>">
                            <?= $schedule_data['teacher_text'] ?></option>
                    </select>
                    <input type="hidden" name="teacher_text" value="<?= $schedule_data['teacher_text'] ?>">
                </div>
                
            </div>
            <div class="row mb-3">
                <label for="week_day_id" class="col-sm-2 col-form-label">Thứ</label>
                <div class="col-sm-10">
                    <select class="form-select" readonly name="week_day_id" id="week_day_id">
                        <option  selected value="<?= $schedule_data['week_day_id'] ?>">
                            <?= $schedule_data['week_day_id'] ?>
                        </option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="lession_id[]" class="col-sm-2 col-form-label">Tiết</label>
                <div class="col-sm-10">
                    <?php foreach ($schedule_data['lession_id'] as $val) : ?>
                    <div style="display: inline-block; margin-right: 10px; line-height: 36px;">
                        <input id="lession_<?= $val ?>" type="hidden" name="lession_id[]" value="<?= $val ?>">
                        <label for="lession_<?= $val ?>">Tiết <?= $val ?></label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row mb-3">
                <label for="notes" class="col-sm-2 col-form-label">Chú ý</label>
                <div class="col-sm-10">
                    <textarea class="form-control" readonly name="notes" id="notes" rows="4"><?= $schedule_data['notes'] ?></textarea>
                </div>
            </div>

            <div class="text-center">
                <div>
                    <input style="width: 10%;" class="btn btn-secondary" type="submit" name="edit_input" value="Sửa lại">
                    <input style="width: 10%;" class="btn btn-primary" type="submit" name="schedule_register" value="Đăng ký">
                </div>
            </div>
        </form>
    </div>
</body>