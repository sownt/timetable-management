<?php
// require_once('../common/define.php');
require_once('app/models/schedule.php');
require_once('app/models/subject.php');
require_once('app/models/teacher.php');
$YEAR = array("1", "2", "3", "4");
$WEEK_DAY = array("2", "3", "4", "5", "6", "7", "8");
$LESSION = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
// $subject = array("001" => "Hải Dương Học", "002" => "Khoa Học Máy Tính", "003" => "Khoa Học Dữ Liệu");
// $teachers = array("001" => "Hoang Nghia Phong", "002" => "Dinh Trong Phuc", "003" => "Hoang Ha Giang");
$subjects = Subject::all();
$teachers = Teacher::all();
?>
<body>
    <?php include_once('app/views/header.php');
    session_start(); ?>
    <div class="container p-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="text-center mb-5">
                <h1>Sửa TKB</h1>
            </div>
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
                        <?php foreach ($subjects as $subject) : ?>
                            <option <?= isset($schedule_data['subject_id']) && $schedule_data['subject_id'] == $subject->id ? 'selected' : '' ?> value="<?= $subject->id ?>">
                                <?= $subject->description ?>
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
                        <?php foreach ($teachers as $teacher) : ?>
                            <option <?= isset($schedule_data['teacher_id']) && $schedule_data['teacher_id'] == $teacher->id ? 'selected' : '' ?> value="<?= $teacher->id ?>">
                                <?= $teacher->name ?>
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
                            <input <?= isset($schedule_data['lession_id']) && in_array($val, $schedule_data['lession_id']) ? 'checked' : '' ?> id="lession_<?= $val ?>" type="checkbox" name="lession_id[]" value="<?= $val ?>">
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
            <?php
            require_once('app/models/subject.php');
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            /**
             * Display error message
             *
             * @param string $message
             * @return void
             */
            function onError($message)
            {
                echo "<div class=\"row mb-3\"><div class=\"alert alert-danger\" role=\"alert\">$message</div></div>";
            }

            // Check if form is submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $school_year = $subject_id = $teacher_id = $week_day = $lession = $note = "";
                $valid = true;

                // Validate school year
                if (isset($_POST['school_year']) && $valid) {
                    $school_year = $_POST['school_year'];
                    $_SESSION['school_year'] = $school_year;
                    if ($school_year == 0) {
                        onError("Hãy nhập khóa học.");
                        $valid = false;
                    }
                }

                // Validate subject 
                if (isset($_POST['subject_id']) && $valid) {
                    $subject_id = $_POST['subject_id'];
                    $_SESSION['subject_id'] = $subject_id;
                    if ($subject_id == 0) {
                        onError("Hãy nhập môn học.");
                        $valid = false;
                    }
                }

                // Validate teacher
                if (isset($_POST['teacher_id']) && $valid) {
                    $teacher_id = $_POST['teacher_id'];
                    $_SESSION['teacher_id'] = $teacher_id;
                    if ($teacher_id == 0) {
                        onError("Hãy nhập giảng viên.");
                        $valid = false;
                    }
                }

                // Validate week day
                if (isset($_POST['week_day_id']) && $valid) {
                    $week_day = $_POST['week_day_id'];
                    $_SESSION['week_day'] = $week_day;
                    if ($week_day == 0) {
                        onError("Hãy nhập thứ.");
                        $valid = false;
                    }
                }

                // Validate lession
                if (isset($_POST['lession_id']) && $valid) {
                    $l = $_POST['lession_id'];
                    $lession = '';
                    foreach ($l as $lession_id) {
                        $lession .= $lession_id . ',';
                    }
                    $_SESSION['lession'] = $lession;
                    if ($lession == 0) {
                        onError("Hãy nhập tiết.");
                        $valid = false;
                    }
                }

                // Validate note
                if (isset($_POST['note']) && $valid) {
                    $note = $_POST['note'];
                    $_SESSION['note'] = $note;
                }

                if ($valid) {
                    Schedule::update($_GET['id'], $school_year, $subject_id, $teacher_id, $week_day, $lession, $note);
                    header("Location: ./?controller=schedule&action=update_complete");
                }
            }
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
    <?php include_once('app/views/footer.php'); ?>
</body>