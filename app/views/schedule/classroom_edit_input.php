<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/web/css/edit.css">
</head>
<body>
    <main>
        <form 
            action="<?php echo $SERVER['PHP_SELF']; ?>",
            method="GET"
        >
        <div class="center">
            <div class="khoahoc">
                <div class="label">
                    <label for="khoahoc">Khóa học</label>
                </div>
                <select name="DSkhoahoc">
                    <option>Năm 1</option>
                    <option>Năm 2</option>
                    <option>Năm 3</option>
                    <option>Năm 4</option>
                </select>
            </div>

            <div class="monhoc">
                <div class="label">
                    <label for="monhoc">Môn học</label>
                </div>
                <select name="DSkhoahoc">
                    <option>Môn học 01</option>
                    <option>Môn học 02</option>
                    <option>Môn học 03</option>
                    <option>Môn học 04</option>
                </select>
            </div>

            <div class="giaovien">
                <div class="label">
                    <label for="giaovien">Giáo viên</label>
                </div>
                <select name="DSkhoahoc">
                    <option>Giáo viên 01</option>
                    <option>Giáo viên 02</option>
                    <option>Giáo viên 03</option>
                    <option>Giáo viên 04</option>
                </select>
            </div>

            <div class="thu">
                <div class="label">
                    <label for="thu">Thứ</label>
                </div>
                <select name="DSkhoahoc">
                    <option>Thứ hai</option>
                    <option>Thứ ba</option>
                    <option>Thứ tư</option>
                    <option>Thứ năm</option>
                    <option>Thứ sáu</option>
                    <option>Thứ bảy</option>
                    <option>Chủ Nhật</option>
                </select>
            </div>

            <div class="tiethoc">
                <div class="label">
                    <label for="tiethoc">Tiết học</label>
                </div>
                <div class="khung">
                    <div class="dong1">
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" />
                            <p>Tiết 1</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value=""/>
                            <p>Tiết 2</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value=""/>
                            <p>Tiết 3</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value=""/>
                            <p>Tiết 4</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value=""/>
                            <p>Tiết 5</p>
                        </span>
                    </div>
                    
                    <div class="dong2">
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value="" />
                            <p>Tiết 6</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value=""/>
                            <p>Tiết 7</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value=""/>
                            <p>Tiết 8</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value=""/>
                            <p>Tiết 9</p>
                        </span>
                        <span class="chontiethoc">
                            <input type="checkbox" name="" value=""/>
                            <p>Tiết 10</p>
                        </span>
                    </div>
                </div>
            </div>

            <div class="chuy">
                <div class="label">
                    <label for="chuy">Chú ý</label>
                </div>
                <textarea rows="5" cols="20" maxlength="20"></textarea>
            </div>

            <div class="button1">
                <input class="button" type="submit" name="" value="Xác nhận" />
            </div>
        </div>
        </form>
    </main>
</body>
</html>