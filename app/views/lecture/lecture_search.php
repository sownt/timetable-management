<body>
    <?php include_once('app/views/header.php');
    session_start(); ?>
    <div class="container p-5">
        <form method="POST" enctype="multipart/form-data" class="mb-5">
            <div class="text-center mb-5">
                <h1>Tìm kiếm môn học</h1>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Khóa học</label>
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
                <label for="lectureName" class="col-sm-2 col-form-label">Từ khóa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lectureName" name="lecture-name" />
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
            Số môn học tìm thấy: <?= count($subjects) ?>
        </div>
        <?php if (count($subjects) != 0) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên môn học</th>
                    <th scope="col">Khóa</th>
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
        <?php } ?>
    </div>
    <?php include_once('app/views/footer.php'); ?>
</body>