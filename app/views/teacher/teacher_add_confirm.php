<body>
    <?php include_once('app/views/header.php');
    session_start(); ?>
    <div class="container p-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="text-center mb-5">
                <h1>Thêm mới giáo viên</h1>
            </div>
            <div class="row mb-3">
                <label for="fullName" class="col-sm-2 col-form-label">Họ và tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullName" name="fullName" value="<?= $_SESSION['fullName'] ?>" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="specialized" class="col-sm-2 col-form-label">Bộ môn</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="specialized" id="specialized" disabled>
                        <?php
                        $sp = array(
                            '001' => 'Khoa học máy tinh',
                            '002' => 'Khoa học dữ liệu',
                            '003' => 'Hải dương học'
                        );
                        ?>
                        <option selected><?= $sp[$_SESSION['specialized']] ?></option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="degree" class="col-sm-2 col-form-label">Học vị</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="degree" id="degree" disabled>
                        <?php
                        $dg = array(
                            '001' => 'Cử nhân',
                            '002' => 'Thạc sĩ',
                            '003' => 'Tiến sĩ',
                            '004' => 'Phó giáo sư',
                            '005' => 'Giáo sư'
                        );
                        ?>
                        <option selected><?= $dg[$_SESSION['degree']] ?></option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <img src="<?= $_SESSION['avatar'] ?>" height="100">
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Mô tả thêm</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="3"><?= $_SESSION['description'] ?></textarea>
                </div>
            </div>
            <?php
            require_once('app/models/teacher.php');
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            // Check if form is submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                Teacher::add($_SESSION['fullName'], $_SESSION['specialized'], $_SESSION['degree'], $_SESSION['avatar'], $_SESSION['description']);
                header("Location: ./?controller=teacher&action=register_complete");
            }
            ?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
    <?php include_once('app/views/footer.php'); ?>
</body>