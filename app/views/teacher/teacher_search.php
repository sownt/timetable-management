<body>
    <?php include_once('app/views/header.php');
    session_start(); ?>
    <div class="container p-5">
        <form method="POST" enctype="multipart/form-data" class="mb-5">
            <div class="text-center mb-5">
                <h1>Tìm kiếm giáo viên</h1>
            </div>

            <div class="row mb-3">
<<<<<<< HEAD
                <label for="" class="col-sm-2 col-form-label">Bộ môn</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="school-year">
                        <option selected>Chọn khóa</option>
                        <option value="1">Năm 1</option>
                        <option value="2">Năm 2</option>
                        <option value="3">Năm 3</option>
                        <option value="3">Năm 4</option>
=======
                <label for="specialized" class="col-sm-2 col-form-label">Bộ môn</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="specialized">
                        <option value="0" selected>Chọn bộ môn</option>
                        <option value="001">Khoa học máy tinh</option>
                        <option value="002">Khoa học dữ liệu</option>
                        <option value="003">Hải dương học</option>
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
                    </select>
                </div>
            </div>
            <div class="row mb-3">
<<<<<<< HEAD
                <label for="lectureName" class="col-sm-2 col-form-label">Từ khóa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lectureName" name="lecture-name" />
                </div>
            </div>
            <?php
            require_once('app/models/subject.php');
=======
                <label for="keywords" class="col-sm-2 col-form-label">Từ khóa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="keywords" name="keywords" />
                </div>
            </div>
            <?php
            require_once('app/models/teacher.php');
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

<<<<<<< HEAD
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
            // Check if form is submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $school_year = "";
                $valid = true;

                if ($valid) {
                    header("Location: ./?controller=teacher&action=register_confirm");
                }
            }

            $teachers = Teacher::all();
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Tìm kiếm</button>
            </div>
        </form>
        <div class="text-center mb-3">
            Số giáo viên tìm thấy: <?= count($teachers) ?>
        </div>
        <?php if (count($teachers) != 0) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên giáo viên</th>
                        <th scope="col">Bộ môn</th>
                        <th scope="col">Mô tả chi tiết</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($teachers); $i++) { ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $teachers[$i]->name ?></td>
                            <td><?= $teachers[$i]->specialized ?></td>
                            <td><?= $teachers[$i]->description ?></td>
                            <td class="text-center">
                                <a href="./?controller=teacher&action=search&delete=<?= $teachers[$i]->id ?>" class="btn btn-danger">Xóa</a>
                                <a href="./?controller=teacher&action=update&id=<?= $teachers[$i]->id ?>" class="btn btn-primary">Sửa</a>
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