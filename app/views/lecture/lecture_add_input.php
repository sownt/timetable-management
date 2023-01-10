<body>
    <?php include_once('app/views/header.php'); ?>
    <div class="container p-5">
        <form>
            <div class="text-center mb-5"><h1>Đăng ký môn học</h1></div>
            <div class="row mb-3">
                <label for="lectureName" class="col-sm-2 col-form-label">Tên môn học</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lectureName">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Khóa</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Chọn khóa</option>
                        <option value="1">Năm 1</option>
                        <option value="2">Năm 2</option>
                        <option value="3">Năm 3</option>
                        <option value="3">Năm 4</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Mô tả chi tiết</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="formFile" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
    <?php include_once('app/views/footer.php'); ?>
</body>