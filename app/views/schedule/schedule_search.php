<body>
    <?php include_once('app/views/header.php');
    session_start(); ?>
    <div class="container p-5">
        <form method="POST" enctype="multipart/form-data" class="mb-5">
            <div class="text-center mb-5">
                <h1>Tìm kiếm TKB</h1>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Khóa</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="school-year">
                        <option selected>Chọn khóa</option>
                        <option value="1">Năm 1</option>
                        <option value="2">Năm 2</option>
                        <option value="3">Năm 3</option>
                        <option value="3">Năm 4</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Môn học</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="school-year">
                        <option selected>Chọn khóa</option>
                        <option value="1">Năm 1</option>
                        <option value="2">Năm 2</option>
                        <option value="3">Năm 3</option>
                        <option value="3">Năm 4</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Giáo viên</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="school-year">
                        <option selected>Chọn khóa</option>
                        <option value="1">Năm 1</option>
                        <option value="2">Năm 2</option>
                        <option value="3">Năm 3</option>
                        <option value="3">Năm 4</option>
                    </select>
                </div>
            </div>
            <?php
<<<<<<< HEAD
            require_once('app/models/subject.php');
=======
            require_once('app/models/schedule.php');
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
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
                $name = $school_year = "";
                $valid = true;

                if ($valid) {
                    header("Location: ./?controller=lecture&action=register_confirm");
                }
            }

<<<<<<< HEAD
            $subjects = Subject::all();
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
        <div class="text-center mb-3">
            Số giáo viên tìm thấy: <?= count($subjects) ?>
        </div>
        <?php if (count($subjects) != 0) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên giáo viên</th>
                    <th scope="col">Bộ môn</th>
                    <th scope="col">Mô tả chi tiết</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($subjects); $i++) { ?>
                <tr>
                    <th scope="row"><?= $i + 1 ?></th>
                    <td><?= $subjects[$i]->name ?></td>
                    <td><?= $subjects[$i]->school_year ?></td>
                    <td><?= $subjects[$i]->description ?></td>
                    <td></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
=======
            $schedules = Schedule::all();
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Tìm kiếm</button>
            </div>
        </form>
        <div class="text-center mb-3">
            Số giáo viên tìm thấy: <?= count($schedules) ?>
        </div>
        <?php if (count($schedules) != 0) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Khóa</th>
                        <th scope="col">Môn học</th>
                        <th scope="col">Giáo viên</th>
                        <th scope="col">Thứ</th>
                        <th scope="col">Tiết học</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($schedules); $i++) { ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $schedules[$i]->school_year ?></td>
                            <td><?= $schedules[$i]->subject_id ?></td>
                            <td><?= $schedules[$i]->teacher_id ?></td>
                            <td><?= $schedules[$i]->week_day ?></td>
                            <td><?= $schedules[$i]->lesson ?></td>
                            <td class="text-center">
                                <a href="./?controller=schedule&action=search&delete=<?= $schedules[$i]->id ?>" class="btn btn-danger">Xóa</a>
                                <a href="./?controller=schedule&action=update&id=<?= $schedules[$i]->id ?>" class="btn btn-primary">Sửa</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
        <?php } ?>
    </div>
    <?php include_once('app/views/footer.php'); ?>
</body>