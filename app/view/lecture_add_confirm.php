<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New lecture | Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form>
            <div class="row mb-3">
                <label for="lectureName" class="col-sm-2 col-form-label">Tên môn học</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lectureName" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Khóa</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" disabled>
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
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="formFile" class="col-sm-2 col-form-label">Avatar</label>
                <div class="col-sm-10">
                    <img src="data:image/jpeg;base64,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">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
    </div>
</body>

</html>