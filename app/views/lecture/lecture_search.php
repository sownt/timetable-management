<body>
    <?php include_once('app/views/header.php');
    session_start(); ?>
    <div class="container p-5">
<<<<<<< HEAD
        <form method="POST" enctype="multipart/form-data" class="mb-5">
=======
        <form method="POST" class="mb-5">
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
            <div class="text-center mb-5">
                <h1>Tìm kiếm môn học</h1>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Khóa học</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="school-year">
<<<<<<< HEAD
                        <option selected>Chọn khóa</option>
=======
                        <option value="0" selected>Chọn khóa</option>
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
                        <option value="1">Năm 1</option>
                        <option value="2">Năm 2</option>
                        <option value="3">Năm 3</option>
                        <option value="3">Năm 4</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
<<<<<<< HEAD
                <label for="lectureName" class="col-sm-2 col-form-label">Từ khóa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lectureName" name="lecture-name" />
=======
                <label for="keywords" class="col-sm-2 col-form-label">Từ khóa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="keywords" name="keywords" />
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
                </div>
            </div>
            <?php
            require_once('app/models/subject.php');
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
=======
            $subjects = Subject::all();

            $id = 0;
            $current_lecture = null;
            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                Subject::delete($id);
                echo "<script>alert('Xóa thành công!');</script>";
                header("Location: ./?controller=lecture&action=search");
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
            }

            // Check if form is submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $school_year = "";
<<<<<<< HEAD
                $valid = true;

                if ($valid) {
                    header("Location: ./?controller=lecture&action=register_confirm");
                }
            }

            $subjects = Subject::all();
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
=======

                $name = $_POST['keywords'];
                $school_year = $_POST['school-year'];
                $subjects = Subject::find($school_year, $name);
            }
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Tìm kiếm</button>
>>>>>>> ec9e7b0352ce1378c10c2c2226bb97a19dfb9f02
            </div>
        </form>
        <div class="text-center mb-3">
            Số môn học tìm thấy: <?= count($subjects) ?>
        </div>
        <?php if (count($subjects) != 0) { ?>
<<<<<<< HEAD
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
=======
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên môn học</th>
                        <th scope="col">Khóa</th>
                        <th scope="col">Mô tả chi tiết</th>
                        <th scope="col" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($subjects); $i++) { ?>
                        <tr>
                            <th scope="row"><?= $i + 1 ?></th>
                            <td><?= $subjects[$i]->name ?></td>
                            <td><?= "Năm " . $subjects[$i]->school_year ?></td>
                            <td><?= $subjects[$i]->description ?></td>
                            <td class="text-center">
                                <a href="./?controller=lecture&action=search&delete=<?= $subjects[$i]->id ?>" class="btn btn-danger">Xóa</a>
                                <a href="./?controller=lecture&action=update&id=<?= $subjects[$i]->id ?>" class="btn btn-primary">Sửa</a>
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